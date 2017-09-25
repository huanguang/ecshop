<?php
//APP订单提交接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(ROOT_PATH . 'includes/lib_order.php');

$user_id = $_REQUEST['user_id'];
$code = $_REQUEST['code'];
if(empty($user_id)){
	ajaxReturn(array('ret_code' => 0, 'msg' => '请先登录', 'data' => $rec_id));
}
if(empty($code)){
	ajaxReturn(array('ret_code' => 0, 'msg' => '请输入条形码', 'data' => $rec_id));
}	
$sql = "select goods_id from " .$ecs->table('goods'). " where goods_sn = '$code'";
$id = $db->getOne($sql);
if(empty($id)){
	ajaxReturn(array('ret_code' => 0, 'msg' => '数据为空', 'data' => array()));
}
ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $id));