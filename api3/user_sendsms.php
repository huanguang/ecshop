
<?php

//APP获取短信接口
//type = 1 不用检测手机号码是否已注册
//type = 2 需要没有注册过的手机号码
//type = 3 需要手机号码已注册过
define('IN_ECS', true);
@session_start();
require(dirname(__FILE__) . '/../includes/init.php');



	$phone = $_REQUEST['phone'];	
	$type = $_REQUEST['type'];
	$type = $type?$type:2;
	if(empty($phone)){
		ajaxReturn(array('ret_code' => 0, 'msg' => '请输入正确的手机号码', 'data' => array()));
	}
	$old_user_id = $db -> getOne('SELECT user_id FROM ' . $ecs->table('users') . ' WHERE user_name = "'.$phone.'"');
	if($type == 2){
		if($old_user_id){
			ajaxReturn(array('ret_code' => 0, 'msg' => '手机号码已被注册', 'data' => array()));
		}
	}elseif($type == 3){
		if(!$old_user_id){
			ajaxReturn(array('ret_code' => 0, 'msg' => '没有找到该手机号码', 'data' => array()));
		}
	}

	$code = rand(100000, 999999);
	$_SESSION['sms_phone_code'] = $code;
	$_SESSION['sms_phone'] = $phone;
	
	$msg = $code;
	$url = "http://dx.10659com.com:83/ApiService.asmx/Send";
	$data = array(
		'account' => 'xiudangwang',
		'pwd' => '789789',
		'product' => '15',
		'mobile' => $phone,
		'message' => iconv('UTF-8','GB2312','您好！您的验证码是'.$code.'。【国安】')
	);
	$post = is_post($url,$data);//封装函数，post的方式去访问接口地址
	preg_match('/(.*)>(\d+),(.*)/',$post,$arr);
	if($arr[2] == 200){//000是接口的返回值
		$add = array();
		if($type == 4){
			$add['uid'] = $old_user_id;
			$add['code'] = $code;
		}
		ajaxReturn(array('ret_code' => 1, 'msg' => '发送成功', 'data' => $add));
	}else{
		ajaxReturn(array('ret_code' => 0, 'msg' => '发送失败', 'data' => array()));
	}
	
	function is_post($url,$data){
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $url);
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		curl_setopt ( $ch, CURLOPT_HEADER, 0 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, http_build_query($data) );
		$return = curl_exec ( $ch );
		curl_close ( $ch );
		return $return;
	}