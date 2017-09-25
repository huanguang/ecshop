<?php
/*
*   接收app在线发送的消息接口

*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');

$user_id = $_REQUEST['user_id'];

if(!$user_id || intval($user_id) == 0){
	ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请先登录', 'data' => array()));
}

$msg = $_REQUEST['msg'];

if(!$msg){
	ajaxReturn(array('ret_code' => 0, 'msg' => '请输入要发送的内容', 'data' => array()));
}


$sql = "INSERT INTO ecs_news (f_user_id,add_time,type,content,is_kan) VALUES('$user_id',".time().",1,'$msg',0)";

    if($db->query($sql)){
        ajaxReturn(array('ret_code' => 1, 'msg' => '发送成功', 'data' => array()));
    }else{
        ajaxReturn(array('ret_code' => 0, 'msg' => '发送失败', 'data' => array()));
    }