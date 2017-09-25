<?php

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');


include_once(ROOT_PATH . 'includes/lib_passport.php');

    $old_password = isset($_REQUEST['old_password']) ? trim($_REQUEST['old_password']) : null; //当前密码
    $new_password = isset($_REQUEST['new_password']) ? trim($_REQUEST['new_password']) : '';   //新密码
    $new_passwords = isset($_REQUEST['comfirm_password']) ? trim($_REQUEST['comfirm_password']) : '';//q确认新密码
    $user_id      = isset($_REQUEST['uid'])  ? intval($_REQUEST['uid']) : $user_id;
    $code         = isset($_REQUEST['code']) ? trim($_REQUEST['code'])  : '';
    
    if($new_password != $new_passwords){
    	
		ajaxReturn(array('ret_code' => 0, 'msg' => '两次输入密码不相同', 'data' => array()));	
	}
    
    if (strlen($new_password) < 6)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '新密码不能小于六位数', 'data' => array()));
    }
    
    $user_info = $user->get_profile_by_id($user_id); //论坛记录

    if(!$user->check_user($user_info['user_name'], $old_password)){
    	
    	ajaxReturn(array('ret_code' => 0, 'msg' => '原密码输入错误', 'data' => array()));
    }

		
        if ($user->edit_user(array('username'=> (empty($code) ? $user_info['user_name'] : $user_info['user_name']), 'old_password'=>$old_password, 'password'=>$new_password), empty($code) ? 0 : 1))
        {
			$sql="UPDATE ".$ecs->table('users'). "SET `ec_salt`='0' WHERE user_id= '".$user_id."'";
			$db->query($sql);
            $user->logout();
            ajaxReturn(array('ret_code' => 1, 'msg' => '密码重置成功', 'data' => array()));
        }
        else
        {
        	echo 234234;die;
            ajaxReturn(array('ret_code' => 0, 'msg' => '密码重置失败', 'data' => array()));
        }


