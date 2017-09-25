<?php
//APP获取个人账户接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');

$http = str_replace('api3/user_info.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 

$user_id = $_REQUEST['user_id'];

if(empty($user_id)){
	ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请登陆', 'data' => array()));
}

$sql = " select head_portrait,user_name,nickname,birthday,sex from ecs_users where user_id = '$user_id'";
$user = $db->getRow($sql);
ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $user));