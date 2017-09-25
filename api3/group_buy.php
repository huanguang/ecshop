<?php
//APP获取团购商品列表商品列表接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
$http = str_replace('api3/group_buy.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));
$goods = get_categories_tree_pro3(); // 分类树加强版

$ass = array();
foreach ($goods as $key => $value) {
	$goods[$key]['cat_img'] = $http.'data/category/'.$value['cat_img'];
	if(empty($value['goods_tg'])){
	unset($goods[$key]);
	}
	
	if(empty($value['cat_img'])){
		unset($goods[$key]);
	}

	unset($goods[$key]['cat_id']);
	unset($goods[$key]['brands']);
	unset($goods[$key]['goods_tg']);
	unset($goods[$key]['articles']);
	
	

}
foreach ($goods as $key => $value) {
	# code...
	$ass[] = $value;
}




ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $ass));