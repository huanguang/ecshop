<?php
//APP删除在线咨询列表

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');

$user_id = $_REQUEST['user_id'];//用户的ID
if(empty($user_id)){
	ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请登陆', 'data' => array()));
}

$news_id = $_REQUEST['news_id'];
if(empty($news_id)){
	ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
}

$sql = "DELETE FROM " .$ecs->table('news'). " where id in($news_id)";
if($db->query($sql)){
	ajaxReturn(array('ret_code' => 1, 'msg' => '删除成功', 'data' => array()));
}
ajaxReturn(array('ret_code' => 0, 'msg' => '删除失败', 'data' => array()));