<?php
//APP猜你喜欢接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(ROOT_PATH . 'includes/lib_order.php');

$http = str_replace('api3/guessyoulike.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));

$ass = get_recommend_goods('best');

foreach ($ass as $key => $value) {
	# code...
	$ass[$key]['goods_img'] = $http.$value['goods_img'];
	$ass[$key]['thumb'] = $http.$value['thumb'];
}

if(!empty($ass)){
	ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $ass));
}else{
	ajaxReturn(array('ret_code' => 1, 'msg' => '暂时没有推荐商品', 'data' => array()));
}