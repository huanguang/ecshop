<?php
/*
*   省地址app接口
*/
define('IN_ECS', true);
require(dirname(__FILE__) . './../includes/init.php');


		$sql = 'SELECT * FROM ' . $ecs->table('region') . ' WHERE parent_id = 1 ';   //所有省级
		$dizhi = $db->getAll($sql);
		
		if($dizhi){
		ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $dizhi));
	}else{
		ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
	}