<?php
/*
*   城市地址app接口
*	$region_id          城市id
*	$region_type        类型，属于省市区中的一种
*/
define('IN_ECS', true);
session_start();
require(dirname(__FILE__) . './../includes/init.php');
$region_id = $_REQUEST['region_id'];//获取城市id
$region_type = $_REQUEST['region_type'];//获取城市类型
if($region_id && $region_type){
		$sql = 'SELECT region_id FROM ' . $ecs->table('region') . ' WHERE region_id = '.$region_id;
		$id = $db->getOne($sql);//获取当前城市的上级城市

		$sql = 'SELECT * FROM ' . $ecs->table('region') . ' WHERE parent_id = '.$id.' AND region_type = '.$region_type;  //查出下级城市名称
		$dizhi = $db->getAll($sql);
		
		ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $dizhi));
	}else{
		ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
	}