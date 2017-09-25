<?php
//APP获取某个会员的在线咨询列表

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');

$user_id = $_REQUEST['user_id'];//用户的ID
if(empty($user_id)){
	ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请登陆', 'data' => array()));
}
$page = isset($_REQUEST['page']) ? $_REQUEST['page']: 1;
$size = 10;
if($page == 1){
    $page = 0;
}else{
    $page = (($page-1)*$size)+1;
}

$sql = "select count(*) from ".$ecs->table('news')." where (f_user_id = '$user_id' || j_user_id = '$user_id') and type = 1";//统计总数
$count = $db->getOne($sql);

$count_page = ceil($count/$size);

//查询用户的在线咨询消息
$sql = "select * from ".$ecs->table('news')." where (f_user_id = '$user_id' || j_user_id = '$user_id') and type = 1 order by add_time desc limit $page,$size";



    $zhengji = $db->getAll($sql);
    
    foreach ($zhengji as $key => $value) {
        # code...
        if(!empty($zhengji[$key]['f_user_id'])){
            $ids = $zhengji[$key]['f_user_id'];
            $zhengji[$key]['huifu'] = '0';
        }
        if(!empty($zhengji[$key]['j_user_id'])){
            $ids = $zhengji[$key]['j_user_id'];
            $zhengji[$key]['huifu'] = '1';
        }

        //查询用户的信息
        $sql = "select user_name,nickname from ".$ecs->table('users'). "where user_id = $user_id";
        $user = $db->getRow($sql);
        $zhengji[$key]['user_name'] = $user['user_name'];
        $zhengji[$key]['nickname'] = $user['nickname'];
        $zhengji[$key]['add_time'] = local_date('m-d',$value['add_time']);


    }
    
	$list = array('list'=>$zhengji,'page'=>$page,'count_page'=>$count_page);
    if(empty($zhengji)){
    	ajaxReturn(array('ret_code' => 1, 'msg' => '当前消息为空', 'data' => array()));
    }else{
    	ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $list));
    }