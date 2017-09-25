<?php
//app重置密码接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
include_once(ROOT_PATH . 'includes/lib_passport.php');

//手机验证码/用户账号
$mobile = $_REQUEST['mobile'];




    $old_password = isset($_REQUEST['old_password']) ? trim($_REQUEST['old_password']) : null;
    $new_password = isset($_REQUEST['new_password']) ? trim($_REQUEST['new_password']) : '';  //新密码
    $new_passwords = isset($_REQUEST['new_passwords']) ? trim($_REQUEST['new_passwords']) : '';//q确认新密码
    $user_id      = isset($_REQUEST['uid'])  ? intval($_REQUEST['uid']) : $user_id;
    $code         = isset($_REQUEST['code']) ? trim($_REQUEST['code'])  : '';
    $shoujiyzm = isset($_REQUEST['shoujiyzm']) ? trim($_REQUEST['shoujiyzm']) : '';
    $codes = isset($_REQUEST['codes']) ? trim($_REQUEST['codes']) : '';
    
    
    if($shoujiyzm == ''){
    	ajaxReturn(array('ret_code' => 0, 'msg' => '请输入手机验证码', 'data' => array()));
    }
    if($shoujiyzm != $codes){
    	
    	ajaxReturn(array('ret_code' => 0, 'msg' => '验证码不正确', 'data' => array()));
    }

    if($new_password != $new_passwords){
    	
		ajaxReturn(array('ret_code' => 0, 'msg' => '两次输入密码不相同', 'data' => array()));	
	}
    if (strlen($new_password) < 6)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '新密码不能小于六位数', 'data' => array()));
    }


    
    $user_info = $user->get_profile_by_id($user_id); //论坛记录
    

    // if (($user_info && (!empty($code) && md5($user_info['user_id'] . $_CFG['hash_code'] . $user_info['reg_time']) == $code)) || ($_SESSION['user_id']>0 && $_SESSION['user_id'] == $user_id && $user->check_user($_SESSION['user_name'], $old_password)))
    // {
		
        if ($user->edit_user(array('username'=> (empty($code) ? $mobile : $user_info['user_name']), 'old_password'=>$old_password, 'password'=>$new_password), empty($code) ? 0 : 1))
        {
			$sql="UPDATE ".$ecs->table('users'). "SET `ec_salt`='0' WHERE user_id= '".$user_id."'";
			$db->query($sql);
            $user->logout();
            ajaxReturn(array('ret_code' => 1, 'msg' => '密码重置成功', 'data' => array()));
        }
        else
        {
            ajaxReturn(array('ret_code' => 0, 'msg' => '密码重置失败', 'data' => array()));
        }
    // }
    // else
    // {
    //     show_message($_LANG['edit_password_failure'], $_LANG['back_page_up'], '', 'info');
    // }