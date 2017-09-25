<?php


//获取用户的所有信息，包括发送的和接收的
//postscript  获取用户的留言
define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(ROOT_PATH . 'includes/lib_order.php');
include_once(ROOT_PATH . 'includes/lib_clips.php');
    include_once(ROOT_PATH . 'includes/lib_payment.php');
$http = str_replace('api3/guessyoulike.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));

$user_id = $_REQUEST['user_id'];

if(empty($user_id)){
    ajaxReturn(array('ret_code' => 0, 'msg' => '请先登录', 'data' => array()));
}
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
//查询用户的所有信息
$count = $db->getOne("select count(*) from " .$ecs->table('news'). " where (f_user_id = '$user_id' or j_user_id = '$user_id') and type = 1");
$sell = ceil($count/10);
$sql = "select * from " .$ecs->table('news'). " where (f_user_id = '$user_id' or j_user_id = '$user_id') and type = 1 order by add_time limit ".$page.",1";
$msg = $db->getAll($sql);
foreach ($msg as $key => $value) {
	# code...
	if($value['f_user_id'] > 0){
		$msg[$key]['msg_type'] = 'user';
	}
	if($value['j_user_id'] > 0){
		$msg[$key]['msg_type'] = 'admin';
	}
}
$list = array('page' =>$page,'count_page'=>$sell,'msg'=>$msg);
if(empty($msg)){
ajaxReturn(array('ret_code' => 1, 'msg' => '数据为空', 'data' => array()));
}else{
ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $list));
}