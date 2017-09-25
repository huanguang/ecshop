<?php
//APP获取商品评论列表

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */

$http = str_replace('api3/comment.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 
$user_id = $_REQUEST['user_id'];
!$user_id && ajaxReturn(array('ret_code' => 0, 'msg' => '请先登录', 'data' => array()));

$page = isset($_REQUEST['page'])  ? intval($_REQUEST['page']) : 1;//评论页数
$rank = isset($_REQUEST['rank'])  ? intval($_REQUEST['rank']) : 0;//评论等级

$ranks = '';
if($rank == 1){
	$ranks = ' and comment_rank = 5';
}elseif($rank == 2){
	$ranks = ' and (comment_rank = 4 || comment_rank = 3)';
}elseif($rank == 3){
	
	$ranks = ' and (comment_rank = 2 || comment_rank = 1)';
}
$goods_id =  $_REQUEST['goods_id'];//商品ID


!$goods_id && ajaxReturn(array('ret_code' => 0, 'msg' => '参数丢失', 'data' => array()));
$count = $db->getOne('SELECT COUNT(*) FROM ' .$ecs->table('comment')." WHERE id_value = '$goods_id' $ranks AND comment_type = '0' AND status = 1 AND parent_id = 0");//商品评论总数


$comment = assign_comment2($goods_id,0,$page,$ranks);//商品评论
foreach($comment['comments'] as $k=>$v ){
	$v['head_portrait'] =  $http.'data/'.$v['head_portrait'];
	$comment['comments'][$k] = $v;
	//unset($comment['comments'][$k]['img']);
}

$goodsinfo = array("comment"=>$comment['comments'],'comment_page'=>$page,"count"=>ceil($count/$GLOBALS['_CFG']['comments_number']));
if($comment['comments']){
	ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $goodsinfo));
}else{
	ajaxReturn(array('ret_code' => 1, 'msg' => '暂时还没有任何评论', 'data' => $goodsinfo));
}