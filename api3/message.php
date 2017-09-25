<?php
//APP获取商品列表接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');

$user_id = $_REQUEST['user_id'];//用户的ID

$action = $_REQUEST['action']?$_REQUEST['action']:"list";//获取操作方法

$http = str_replace('api3/message.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 
echo strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]);die;
if (!isset($user_id) || $user_id == 0)
{
	ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请登陆', 'data' => array()));
}
/*
	站内信列表
	需要参数
	user_id 会员ID
*/
if($action == "list"){
	$sql = "SELECT * FROM " .$ecs->table('letter'). " WHERE user_id = '$user_id' order by add_time desc";
	$list = $db->getAll($sql);
	foreach($list as $k=>$v){
		if($v['type'] == 2){
			$v['url'] = strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])."?action=info&mid=".$v['id'];
		}
		$list[$k] = $v;
	}
	if($list){
		ajaxReturn(array('ret_code' =>1, 'msg' => '获取成功', 'data' => $list));
	}else{
		ajaxReturn(array('ret_code' =>0, 'msg' => '没有获取到信息', 'data' => array()));
	}
}
/*
	站内信详情
	需要参数
	action 操作方法
	mid 站内信ID
*/
elseif($action == "info"){
	$mid = intval($_REQUEST['mid']);
	if($mid){
		ajaxReturn(array('ret_code' =>0, 'msg' => '缺少参数', 'data' => array()));
	}
	$sql = "SELECT * FROM " .$ecs->table('letter'). " WHERE id = '$mid'";
	$info = $db->getRow($sql);
	if($info){
		ajaxReturn(array('ret_code' =>1, 'msg' => '获取成功', 'data' => $info));
	}else{
		ajaxReturn(array('ret_code' =>0, 'msg' => '获取失败', 'data' => array()));
	}
}
/*
	客服
	需要参数
	action 操作方法
	user_id 用户ID
*/
elseif($action == "service"){
	$sql = "SELECT * FROM " .$ecs->table('message'). " WHERE user_id = '$user_id' order by add_time desc";
	$list = $db->getAll($sql);
	if($list){
		ajaxReturn(array('ret_code' =>1, 'msg' => '获取成功', 'data' => $list));
	}else{
		ajaxReturn(array('ret_code' =>0, 'msg' => '获取失败', 'data' => array()));
	}
}
