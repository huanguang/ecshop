<?php
//APP获取系统消息

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');

$user_id = $_REQUEST['user_id'];//用户的ID
if(empty($user_id)){
	ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请登陆', 'data' => array()));
}


//查询用户的在线咨询消息
$sql = "select * from ".$ecs->table('news')." where type != 1 order by add_time desc limit 10";



    $zhengji = $db->getAll($sql);
    
    foreach ($zhengji as $key => $value) {
        # code...
        
        $zhengji[$key]['add_time'] = local_date('m-d',$value['add_time']);



    }
	
    if(empty($zhengji)){
    	ajaxReturn(array('ret_code' => 1, 'msg' => '当前消息为空', 'data' => array()));
    }else{
    	ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $zhengji));
    }