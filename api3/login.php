<?php
	
define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');

$mobile = $_REQUEST['mobile'];
$password = $_REQUEST['password'];

//判断手机号码是否正确
//if(!preg_match('/^(13[0-9]|15[0-9]|18[0-9]|17[0-9])\d{8}$/',$mobile)){
//	ajaxReturn(array('ret_code' => 0, 'msg' => '手机号码格式有误', 'data' => array()));
//}

if(!$mobile){
	ajaxReturn(array('ret_code' => 0, 'msg' => '请输入用户名', 'data' => array()));
}

//密码是否正确格式
if (strlen($password) < 6)
{
	ajaxReturn(array('ret_code' => 0, 'msg' => $_LANG['passport_js']['password_shorter'], 'data' => array()));
}

if($user->login($mobile, $password)){
	///print_r($_SESSION);exit();
	ajaxReturn(array('ret_code' => 1, 'msg' => '登录成功', 'data' => array('id'=>$_SESSION['user_id'],'name'=>$_SESSION['user_name'],'token' => '')));
	
}else{
	ajaxReturn(array('ret_code' => 0, 'msg' => '用户名或密码错误', 'data' => array()));	
}

