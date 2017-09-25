<?php
//APP获取商品分数接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */

$cateid = $_REQUEST['cateid'];

$cateid = $cateid?$cateid :0;

$http = str_replace('api3/category.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 


$sql = 'SELECT cat_id,cat_name,cat_img FROM '. $ecs->table("category").' WHERE parent_id = '.$cateid.' AND is_show = 1 ';


$category = $db->getAll($sql);
foreach($category as $k => $v){
	$v['cat_img'] = $http."data/category/".$v['cat_img'];
	$category[$k] = $v;
}
if(!$category){
	ajaxReturn(array('ret_code' => 1, 'msg' => '该分类不存在', 'data' => array()));
}
//var_dump($category);die;
ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' =>$category));


