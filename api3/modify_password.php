<?php
/*
*   修改密码app接口
*	$user_id           会员id
*	$old_password      会员当前密码 
*	$new_password      会员新密码 
*	$comfirm_password  会员确认新密码 
*/
	define('IN_ECS', true);
	require(dirname(__FILE__) . '/../includes/init.php');

	include_once(ROOT_PATH . 'includes/lib_passport.php'); //修改密码加载文件

	$old_password = isset($_REQUEST['old_password']) ? trim($_REQUEST['old_password']) : null;//原密码
    $new_password = isset($_REQUEST['new_password']) ? trim($_REQUEST['new_password']) : '';//新密码
    $comfirm_password = isset($_REQUEST['comfirm_password']) ? trim($_REQUEST['comfirm_password']) : '';//确认新密码
    $user_id      = isset($_REQUEST['uid'])  ? intval($_REQUEST['uid']) : $user_id;
    $code         = isset($_REQUEST['code']) ? trim($_REQUEST['code'])  : '';

    if (strlen($new_password) < 6)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '密码太过简短', 'data' => array()));
    }

		$user_info = $user->get_profile_by_id($user_id); //论坛记录
	   
		if (($user_info && (!empty($code) && md5($user_info['user_id'] . $_CFG['hash_code'] . $user_info['reg_time']) == $code)) || ($user->check_user($_SESSION['user_name'], $old_password)))
    {
			 
	    if ($user->edit_user(array('username'=> $user_info['user_name'], 'old_password'=>$old_password, 'password'=>$new_password), empty($code) ? 0 : 1))
	    {	
	    	//密码修改成功，修改对应的状态
			$sql="UPDATE ".$ecs->table('users'). "SET `ec_salt`='0' WHERE user_id= '".$user_id."'";
			$db->query($sql);
	        
	        ajaxReturn(array('ret_code' => 1, 'msg' => '密码修改成功', 'data' => array()));
	    }
	    else
	    {
	        ajaxReturn(array('ret_code' => 0, 'msg' => '密码修改成功', 'data' => array()));
	    }
    }else{
    	ajaxReturn(array('ret_code' => 0, 'msg' => '原密码输入错误', 'data' => array()));
    }

?>