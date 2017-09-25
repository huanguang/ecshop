<?php
//APP获取关键字索引

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');

//获取关键字
$k = $_REQUEST['kk'];

if($k == ''){
	ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));


}

$sql = "select DISTINCT(keyword) from ecs_keywords where keyword LIKE '%$k%'";
$kk = $db->getAll($sql);
if(empty($kk)){
	ajaxReturn(array('ret_code' => 1, 'msg' => '当前索引为空', 'data' => array()));
}

ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $kk));