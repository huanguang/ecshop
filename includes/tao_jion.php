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
	$number = !empty($_REQUEST['number']) ? $_REQUEST['number'] : 1;

	$group = 'm_goods_1';
	$goods = $_REQUEST['goods_id'];


    //var_dump($_POST['goods']);die;
    if (empty($_REQUEST['goods_id']))
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '数据不完整', 'data' => array()));   
         }

    //$goods = $json->decode($_POST['goods']);
    $group = $group ."_". $goods;//套餐组
    //批量加入购物车
    $sql = "SELECT rec_id FROM " . $GLOBALS['ecs']->table('cart_combo') . " WHERE " .
            " group_id = '". $group ."' ORDER BY parent_id limit 1";
    $res = $GLOBALS['db']->getAll($sql);
  
    if($res){
        //清空购物车中的原有数据
        $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart_info') . " WHERE ".
                " user_id = '$user_id' and group_id = '" . $group . "'";
        $GLOBALS['db']->query($sql);
        //插入新的数据
        $sql = "INSERT INTO " . $GLOBALS['ecs']->table('cart_info') . " SELECT * FROM " . $GLOBALS['ecs']->table('cart_combo') . " WHERE ".
                "  group_id = '" . $group . "'";
        $GLOBALS['db']->query($sql);
        //插入更新购物车商品数量
        $sql = "UPDATE " . $GLOBALS['ecs']->table('cart_info') . " set goods_number = '$number' WHERE ".
                "  group_id = '" . $group . "'";
        $GLOBALS['db']->query($sql);
        //清空套餐临时数据
        $sql = "DELETE FROM " . $GLOBALS['ecs']->table('cart_combo') . " WHERE ".
                "  group_id = '" . $group . "'";
        $GLOBALS['db']->query($sql);
    }else{
        ajaxReturn(array('ret_code' => 0, 'msg' => '没有数据可以提交', 'data' => array()));   
    }
    if($_REQUEST['way'] == 2){
    	ajaxReturn(array('ret_code' => 1, 'msg' => '加入成功', 'data' => $group));	
    }else{
    	ajaxReturn(array('ret_code' => 1, 'msg' => '加入成功', 'data' => array()));
    }