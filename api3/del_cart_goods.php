<?php
//APP删除购物车商品

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(ROOT_PATH . 'includes/lib_order.php');

$user_id = $_REQUEST['user_id'];
if(empty($user_id)){
		ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请先登录', 'data' => array()));
	}
$rec_id = $_REQUEST['id'];

if($_REQUEST['way'] == 2){
    //删除多个
    $recid = explode(',',$rec_id);
    $reg = array();
    foreach ($recid as $key => $value) {
        # code...
        if(!flow_drop_cart_goods($value,$user_id)){
            $reg[] = '订单'.$value.'删除失败';
        }
    }

    if(empty($reg)){
        ajaxReturn(array('ret_code' => 1, 'msg' => '成功删除', 'data' => array()));
    }else{
        ajaxReturn(array('ret_code' => 0, 'msg' => '删除失败', 'data' => $reg));
    }
}
if(empty($rec_id)){
		ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
	}


    if(flow_drop_cart_goods($rec_id,$user_id)){



ajaxReturn(array('ret_code' => 1, 'msg' => '成功删除', 'data' => array()));

}
 else
 {
 	ajaxReturn(array('ret_code' => 0, 'msg' => '删除失败', 'data' => array()));
 }   


    /**
 * 删除购物车中的商品
 *
 * @access  public
 * @param   integer $id
 * @return  void
 */
function flow_drop_cart_goods($id,$user_id)
{
    /* 取得商品id */
    $sql = "SELECT * FROM " .$GLOBALS['ecs']->table('cart'). " WHERE rec_id = '$id'";
    $row = $GLOBALS['db']->getRow($sql);
    if ($row)
    {

        //如果是超值礼包
        if ($row['extension_code'] == 'package_buy')
        {

            $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart') .
                    " WHERE session_id = '" . SESS_ID . "' " .
                    "AND rec_id = '$id' LIMIT 1";
        }

        //如果是普通商品，同时删除所有赠品及其配件
        elseif ($row['parent_id'] == 0 && $row['is_gift'] == 0)
        {

            /* 检查购物车中该普通商品的不可单独销售的配件并删除 */
            $sql = "SELECT c.rec_id
                    FROM " . $GLOBALS['ecs']->table('cart') . " AS c, " . $GLOBALS['ecs']->table('group_goods') . " AS gg, " . $GLOBALS['ecs']->table('goods'). " AS g
                    WHERE gg.parent_id = '" . $row['goods_id'] . "'
                    AND c.goods_id = gg.goods_id
                    AND c.parent_id = '" . $row['goods_id'] . "'
                    AND c.extension_code <> 'package_buy'
                    AND gg.goods_id = g.goods_id
                    AND g.is_alone_sale = 0 AND c.group_id='".$row['group_id']."'";//by mike add
            $res = $GLOBALS['db']->query($sql);
            $_del_str = $id . ',';
            while ($id_alone_sale_goods = $GLOBALS['db']->fetchRow($res))
            {
                $_del_str .= $id_alone_sale_goods['rec_id'] . ',';
            }
            $_del_str = trim($_del_str, ',');

            $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart') .
                    " WHERE  " .
                    " (rec_id IN ($_del_str) OR parent_id = '$row[goods_id]' OR is_gift <> 0) AND group_id='".$row['group_id']."'";
        }

        //如果不是普通商品，只删除该商品即可
        else
        {
            
            $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart') .
                    " WHERE  " .
                    "rec_id = '$id' LIMIT 1";
        }
        if($GLOBALS['db']->query($sql)){
            return true;
        }else{
            return false;
        }

        
    }

    
    
    flow_clear_cart_alone($user_id);
}

/**
 * 删除购物车中不能单独销售的商品
 *
 * @access  public
 * @return  void
 */
function flow_clear_cart_alone()
{
    /* 查询：购物车中所有不可以单独销售的配件 */
    $sql = "SELECT c.rec_id, gg.parent_id
            FROM " . $GLOBALS['ecs']->table('cart') . " AS c
                LEFT JOIN " . $GLOBALS['ecs']->table('group_goods') . " AS gg ON c.goods_id = gg.goods_id
                LEFT JOIN" . $GLOBALS['ecs']->table('goods') . " AS g ON c.goods_id = g.goods_id
            WHERE 
            c.extension_code <> 'package_buy'
            AND gg.parent_id > 0
            AND g.is_alone_sale = 0";
    $res = $GLOBALS['db']->query($sql);
    $rec_id = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $rec_id[$row['rec_id']][] = $row['parent_id'];
    }

    if (empty($rec_id))
    {
        
        return;
    }

    /* 查询：购物车中所有商品 */
    $sql = "SELECT DISTINCT goods_id
            FROM " . $GLOBALS['ecs']->table('cart') . "
            WHERE user_id = '" . $user_id . "'
            AND extension_code <> 'package_buy'";
    $res = $GLOBALS['db']->query($sql);
    $cart_good = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $cart_good[] = $row['goods_id'];
    }

    if (empty($cart_good))
    {
        return;
    }

    /* 如果购物车中不可以单独销售配件的基本件不存在则删除该配件 */
    $del_rec_id = '';
    foreach ($rec_id as $key => $value)
    {
        foreach ($value as $v)
        {
            if (in_array($v, $cart_good))
            {
                continue 2;
            }
        }

        $del_rec_id = $key . ',';
    }
    $del_rec_id = trim($del_rec_id, ',');

    if ($del_rec_id == '')
    {
        return;
    }

    /* 删除 */
    $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart') ."
            WHERE user_id = '" . $user_id . "'
            AND rec_id IN ($del_rec_id)";
    $GLOBALS['db']->query($sql);
    return true;
}