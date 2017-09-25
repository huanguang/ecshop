<?php
/*
*   删除套餐购物车接口
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
$parent = 1;
$group = 'm_goods_1_'.$goods_id;


    if (!empty($_REQUEST['goods_id']) && empty($_POST['goods']))
    {
        if (!is_numeric($_REQUEST['goods_id']) || intval($_REQUEST['goods_id']) <= 0)
        {
            ajaxReturn(array('ret_code' => 0, 'msg' => '商品不存在', 'data' => array()));
        }
        $goods_id = intval($_REQUEST['goods_id']);
        
    }


    if (empty($goods_id))
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '商品不存在', 'data' => array()));
    }

    
    if($parent == 0){
        //更新临时购物车（删除基本件）
        $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart_combo') . " WHERE session_id='" . SESS_ID . "'".
                " AND goods_id = '" . $goods_id . "' AND group_id = '" . $group . "'";
        $GLOBALS['db']->query($sql);
        //更新临时购物车（删除配件）
        $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart_combo') . " WHERE session_id='" . SESS_ID . "'".
                " AND parent_id = '".$goods_id."' AND group_id = '" . $group . "'";
        $GLOBALS['db']->query($sql);
    }else{
        //更新临时购物车（删除配件）
        $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart_combo') . " WHERE session_id='" . SESS_ID . "'".
                " AND goods_id = '" . $goods_id . "' AND group_id = '" . $group . "'";
        $GLOBALS['db']->query($sql);
    }

    $result['error'] = 0;
    $result['group'] = substr($group, 0, strrpos($group, "_"));
    $result['parent'] = $parent;
    
    ajaxReturn(array('ret_code' => 1, 'msg' => '套餐取消成功', 'data' => array()));