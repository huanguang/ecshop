<?php
/*
*   套餐加入购物车接口
*	$goods_id          商品id  多个
*	$spec              商品属性，多个
*	$number            商品数量
*	$user_id           会员id
*	$parent            所属套餐i商品id
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(dirname(__FILE__) . '/../includes/lib_order.php');

$user_id = $_REQUEST['user_id'];
if(!$user_id || intval($user_id) == 0){
	ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请先登录', 'data' => array()));
}
$goods_id = $_REQUEST['goods_id'];
$group = 'm_goods_1';
$number = 1;


    if (empty($_REQUEST['user_id']))
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '数据不完整', 'data' => array()));
    }

    $group = $group ."_". $goods_id;//套餐组
    
    //批量加入购物车
    $sql = "SELECT rec_id FROM " . $GLOBALS['ecs']->table('cart_combo') . " WHERE session_id = '" . SESS_ID . "'" .
            " AND group_id = '". $group ."' ORDER BY parent_id limit 1";
    $res = $GLOBALS['db']->query($sql);
    
    if($res){
        //清空购物车中的原有数据
        $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart') . " WHERE ".
                " session_id='" . SESS_ID . "' AND group_id = '" . $group . "'";
        $GLOBALS['db']->query($sql);
        //插入新的数据
        $sql = "INSERT INTO " . $GLOBALS['ecs']->table('cart') . " SELECT * FROM " . $GLOBALS['ecs']->table('cart_combo') . " WHERE ".
                " session_id='" . SESS_ID . "' AND group_id = '" . $group . "'";
        $GLOBALS['db']->query($sql);
        //插入更新购物车商品数量
        $sql = "UPDATE " . $GLOBALS['ecs']->table('cart') . " set goods_number = '$number' WHERE ".
                " session_id='" . SESS_ID . "' AND group_id = '" . $group . "'";
        $GLOBALS['db']->query($sql);
        //清空套餐临时数据
        $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart_combo') . " WHERE ".
                " session_id='" . SESS_ID . "' AND group_id = '" . $group . "'";
        $GLOBALS['db']->query($sql);
    }else{
        ajaxReturn(array('ret_code' => 0, 'msg' => '没有商品可以加入购物车', 'data' => array()));
    }

ajaxReturn(array('ret_code' => 0, 'msg' => '套餐加入购物车成功', 'data' => array()));