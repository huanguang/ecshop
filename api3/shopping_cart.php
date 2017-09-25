<?php
/**
 * $number: 商品数量
 * $spec: 	规格值对应的id数组
* $goods_id: 	商品id
* $goods_recommend: 	商品推荐
* $parent: 	基本件
* $quick: 	块
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(dirname(__FILE__) . '/../includes/lib_order.php');
    $quick =  $_REQUEST['quick'];
    $spec =  $_REQUEST['spec'];
    $goods_id =  $_REQUEST['goods_id'];
    $number =  $_REQUEST['number'];
    $goods_recommend =  $_REQUEST['goods_recommend'];
    $script_name =  $_REQUEST['script_name'];
    $parent =  $_REQUEST['parent'];
    $user_id = $_REQUEST['user_id'];
    $way  = $_REQUEST['way'];//购买方式（2,一步购物）
    $whether = $_REQUEST['whether'];
	if (empty($user_id))
    {

        ajaxReturn(array('ret_code' => 0, 'msg' => '请先登录', 'data' =>array()));
    }
	
    if (empty($goods_id))
    {

        ajaxReturn(array('ret_code' => 0, 'msg' => '获取商品失败', 'data' =>array()));
    }
    if(!empty($whether)){
        ajaxReturn(array('ret_code' => 0, 'msg' => '请执行第二次操作', 'data' =>array()));
    }

	
	if(!empty($script_name))
	{
			
		$script_name = $script_name;
	}
	else
	{
		$script_name = 0;
	}
	
	if(!empty($goods_recommend))
	{
			
		$goods_recommend = $goods_recommend;
	}
	else
	{
		$goods_recommend = '';
	}

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
			if(!empty($script_name))
			{		
				$result['script_name'] = $script_name;
			}
			else
			{
				$result['script_name'] = 0;
			}
            //var_dump($result);die;
            ajaxReturn(array('ret_code' => 1, 'msg' => '请选择商品属性', 'data' => $result));
        }
    }
    
    /* 更新：如果是一步购物，先清空购物车 */

    
    /* 检查：商品数量是否合法 */
    if (!is_numeric($number) || intval($number) <= 0)
    {

        ajaxReturn(array('ret_code' => 1, 'msg' => '商品数量不对', 'data' => array()));
    }
    /* 更新：购物车 */
    else
    {
        if ($way == 2)
        {

            $rec_id = addto_cart3($goods_id, $number, $spec, $parent,$user_id);
            //clear_cart();

            if(!empty($rec_id)){
                ajaxReturn(array('ret_code' => 10, 'msg' => '获取成功', 'data' => $rec_id));
            }
        }

        // 更新：添加到购物车
        
        if (addto_cart2($goods_id, $number, $spec, $parent,$user_id))
        {
            ajaxReturn(array('ret_code' => 1, 'msg' => '成功加入购物车', 'data' => array()));
        }
        else
        {
        	//var_dump($goods_id);die;
            ajaxReturn(array('ret_code' => 0, 'msg' => '加入购物车失败', 'data' => array()));
        }
    }

?>