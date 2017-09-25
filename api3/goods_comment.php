<?php
//APP获取商品列表接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */

$http = str_replace('api3/goods_comment.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 

$goods_id =  $_REQUEST['goods_id'];//商品ID

$page = $_REQUEST['page'];//翻页页数

$comment = assign_comment($goods_id,0,$page);//商品评论
foreach($comment['comments'] as $k=>$v ){
	$v['head_portrait'] =  $http.'data/'.$v['head_portrait'];
	$comment['comments'][$k] = $v;
}

$comment_list = $comment['comments'];

if(!$comment_list){
	ajaxReturn(array('ret_code' => 0, 'msg' => '没有获取到数据', 'data' => array()));
}

ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' =>$comment_list));



