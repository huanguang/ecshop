<?php
/*
*   套餐选择接口
*	$goods_id          商品id  多个
*	$spec              商品属性，多个
*	$number            商品数量
*	$user_id           会员id
*	$parent            所属套餐i商品id
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(dirname(__FILE__) . '/../includes/lib_order.php');
// goods.quick    = quick;
//   goods.spec     = spec_arr;
//   goods.goods_id = goodsId;
//   goods.number   = number;
//   goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
//   goods.group = group + '_' + group_item;//组名



$user_id = $_REQUEST['user_id'];
if(!$user_id || intval($user_id) == 0){
	ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请先登录', 'data' => array()));
}
$goods_id = $_REQUEST['goods_id'];//套餐数组商品id array

$id = explode(',', $goods_id);



$spec = $_REQUEST['spec']; //商品属性的选择 array  暂时忽略


$user_id = $_REQUEST['user_id'];

$quick = $_REQUEST['quick']; 


$number = $_REQUEST['number'];//商品数量
$parent = $_REQUEST['parent'];//主商品的id
$number = 1;
$group = 'm_goods_1_'.$id[0];

$goodss = array();

foreach ($id as $key => $value) { //循环加入购物车
    

	if($key == 0){
		$parent = 0;
		$quick = 1;
	}else{
		$parent = $id[0];
		$quick = 0;
	}


if (!empty($value))
    {
        if (!is_numeric($value) || intval($value) <= 0)
        {

            //ajaxReturn(array('ret_code' => 0, 'msg' => '商品不存在', 'data' => array()));
            $goodss['goods'][] = $value;

        }
        $goods_id = intval($value);
        
    }

    $result = array('error' => 0, 'message' => '', 'content' => '', 'goods_id' => '');

    // if (empty($_POST['goods']))
    // {
    //     $result['error'] = 1;
    //     ajaxReturn(array('ret_code' => 0, 'msg' => '商品不存在', 'data' => array()));
    //     //die($json->encode($result));
    // }

    //$goods = $json->decode($_POST['goods']);
    
    /* 检查：如果商品有规格，而post的数据没有规格，把商品的规格属性通过JSON传到前台 */
    if (empty($spec) AND empty($quick))
    {
        $sql = "SELECT a.attr_id, a.attr_name, a.attr_type, ".
            "g.goods_attr_id, g.attr_value, g.attr_price " .
        'FROM ' . $GLOBALS['ecs']->table('goods_attr') . ' AS g ' .
        'LEFT JOIN ' . $GLOBALS['ecs']->table('attribute') . ' AS a ON a.attr_id = g.attr_id ' .
        "WHERE a.attr_type != 0 AND g.goods_id = '" . $goods_id . "' " .
        'ORDER BY a.sort_order, g.attr_price, g.goods_attr_id';

        $res = $GLOBALS['db']->getAll($sql);

        if (!empty($res))
        {
            $spe_arr = array();
            foreach ($res AS $row)
            {
                $spe_arr[$row['attr_id']]['attr_type'] = $row['attr_type'];
                $spe_arr[$row['attr_id']]['name']     = $row['attr_name'];
                $spe_arr[$row['attr_id']]['attr_id']     = $row['attr_id'];
                $spe_arr[$row['attr_id']]['values'][] = array(
                                                            'label'        => $row['attr_value'],
                                                            'price'        => $row['attr_price'],
                                                            'format_price' => price_format($row['attr_price'], false),
                                                            'id'           => $row['goods_attr_id']);
            }
            $i = 0;
            $spe_array = array();
            foreach ($spe_arr AS $row)
            {
                $spe_array[]=$row;
            }
            $result['error']   = ERR_NEED_SELECT_ATTR;
            $result['goods_id'] = $goods_id;
            $result['parent'] = $parent;
            $result['message'] = $spe_array;
            $result['group'] = $group;
            $eee[] = $value; 
            //ajaxReturn(array('ret_code' => 0, 'msg' => '请选择商品规格', 'data' => array()));
            $goodss['goods_attr'][] = $value;
        }
    }

    /* 更新：如果是一步购物，先清空购物车 */
    // if ($_CFG['one_step_buy'] == '1')
    // {
    //     clear_cart();
    // }

    /* 检查：商品数量是否合法 */
    if (!is_numeric($number) || intval($number) <= 0)
    {
        //ajaxReturn(array('ret_code' => 0, 'msg' => '商品数量不对', 'data' => array()));
        $goodss['goods_number'][] = $value;
    }
    /* 更新：购物车 */
    else
    {
        // 更新：添加到购物车
        if (addto_cart_combo2($value, $number, $spec, $parent, $group,$user_id))
        {
            if ($_CFG['cart_confirm'] > 2)
            {
                $result['message'] = '';
            }
            else
            {
                $result['message'] = $_CFG['cart_confirm'] == 1 ? $_LANG['addto_cart_success_1'] : $_LANG['addto_cart_success_2'];
            }

            $result['group']    = $group;
            $result['goods_id'] = stripslashes($value);
            $result['content'] = insert_cart_info();
            $result['one_step_buy'] = $_CFG['one_step_buy'];
            
            //返回 原价，配件价，库存信息
            $combo_goods_info = get_combo_goods_info($value, $number, $spec, $parent, $user_id);
            $result['fittings_price'] = $combo_goods_info['fittings_price'];
            $result['spec_price']   = $combo_goods_info['spec_price'];
            $result['goods_price'] = $combo_goods_info['goods_price'];
            $result['stock'] = $combo_goods_info['stock'];
            $result['parent'] = $parent;
        }
        else
        {
            //$result['message']  = $err->last_message();
            
            $result['group']    = $group;
            $result['goods_id'] = stripslashes($value);
            if (is_array($spec))
            {
                $result['product_spec'] = implode(',', $spec);
            }
            else
            {
                $result['product_spec'] = $spec;
            }
        }
    }


    
}
if(empty($goodss)){
    ajaxReturn(array('ret_code' => 1, 'msg' => '加入成功', 'data' => array()));
}else{
    ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
}


   