<?php
//APP搜索关键词模块接口
/*
*$where 条件
*$keyword 关键词
*$type 搜索类型 1,关键词；2,商品模糊查询名称
**/
define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */

$where = " is_delete = 0 ";

$type = isset($_REQUEST['type'])? $_REQUEST['type']:1;

if($type == '1'){
	//查询所有的关键词
	$sql = " select value from ". $ecs->table("shop_config"). " where code = 'search_keywords'";
	$k = $db->getOne($sql);
	$goodslist = explode(',',$k);

}elseif($type == '2'){
	$keyword = $_REQUEST['keyword']; //获取关键词

	if($keyword){
		$where .= "and (goods_name LIKE '%".$keyword."%' or keywords LIKE '%".$keyword."%')";
	}else{
		$where .= '';
	}
		$sql = 'SELECT * FROM '. $ecs->table("goods").' WHERE '.$where.' ';
		$goodslist = $db->getAll($sql);

}
if(!$goodslist){
	ajaxReturn(array('ret_code' => 0, 'msg' => '没有搜索到内容', 'data' => array()));
}

ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' =>$goodslist));
?>