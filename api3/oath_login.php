<?php
//APP第三方登录接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');
include_once(ROOT_PATH . 'includes/website/jntoo.php');

$type = empty($_REQUEST['type']) ?  '' : $_REQUEST['type'];




$users = $_REQUEST['user'];
$user_img = $_REQUEST['user_img'];
$token = $_REQUEST['token'];

	
		//$access = $c->getAccessToken();

		// if(!$access)
		// {
		// 	show_message( $c->get_error() , '首页', $ecs->url() , 'error');
		// }
		// $c->setAccessToken($access);
		// $info = $c->getMessage();
		//var_dump($info);die;
		// if(!$info)
		// {
		// 	show_message($c->get_error() , '首页' , $ecs->url() , 'error' , false);
		// }
		// if(!$info['user_id'])
		// 	show_message($c->get_error() , '首页' , $ecs->url() , 'error' , false);


		$info_user_id = $type .'_'.$token; //  加个标识！！！防止 其他的标识 一样  // 以后的ID 标识 将以这种形式 辨认
		$users = str_replace("'" , "" , $users); // 过滤掉 逗号 不然出错  很难处理   不想去  搞什么编码的了
		// if(!$info['user_id'])
		// 	show_message($c->get_error() , '首页' , $ecs->url() , 'error' , false);


		$sql = 'SELECT user_name,password,aite_id FROM '.$ecs->table('users').' WHERE aite_id = \''.$info_user_id.'\' OR aite_id=\''.$token.'\'';

		$count = $db->getRow($sql);
		if(!$count)   // 没有当前数据
		{
			if($user->check_user($users))  // 重名处理
			{
				$user = $users.'_'.$type.(rand(10000,99999));
			}
			$user_pass = $user->compile_password(array('password'=>$info_user_id));
			$sql = 'INSERT INTO '.$ecs->table('users').'(user_name , password, aite_id , sex , reg_time, is_validated) VALUES '.
					"('$users' , '$user_pass' , '$info_user_id' , '0' , '".gmtime()."' , '1')" ;
			$db->query($sql);
			$id = mysql_insert_id();

		}
		else
		{
			$sql = '';
			if($count['aite_id'] == $token)
			{
				$sql = 'UPDATE '.$ecs->table('users')." SET aite_id = '$info_user_id' WHERE aite_id = '$count[aite_id]'";
				$db->query($sql);

				$sql = 'select user_id from '.$ecs->table('users')." WHERE aite_id = '$count[aite_id]'";
				$id= $ecs->getOne($sql);
			}
			if($user != $count['user_name'])   // 这段可删除
			{
				if($user->check_user($users))  // 重名处理
				{
					$users = $users.'_'.$type.(rand()*1000);
				}
				$sql = 'UPDATE '.$ecs->table('users')." SET user_name = '$users' WHERE aite_id = '$info_user_id'";
				$db->query($sql);
				$sql = 'select user_id from '.$ecs->table('users')." WHERE aite_id = '$info_user_id'";
				$id= $db->getOne($sql);


			}
		}
		$add = array('id'=>$id);
		ajaxReturn(array('ret_code' => 1, 'msg' => '登录成功', 'data' =>$add));
		// $user->set_session($info['name']);
		// $user->set_cookie($info['name']);
		// update_user_info();
		// recalculate_price();

		// if(!empty($_REQUEST['open']))
		// {
		// 	die('<script>window.opener.window.location.reload(); window.close();</script>');
		// }
		// else
		// {
		// 	ecs_header('Location: '.$_REQUEST['callblock']);

		// }
