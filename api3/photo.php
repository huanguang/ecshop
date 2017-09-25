<?php
//APP获取商品相册

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');
$http = str_replace('api3/photo.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 
$goods_id = $_REQUEST['goods_id']; //获取商品id
if($goods_id){
	$photo = get_goods_gallery($goods_id);//商品相册
	if($photo){
		
		foreach ($photo as $key => $value) {
			$photo[$key]['img_url'] = $http.$value['img_url'];
			$photo[$key]['thumb_url'] = $http.$value['thumb_url'];
		}
		ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' =>$photo));
	}else{
		ajaxReturn(array('ret_code' => 0, 'msg' => '没有图片', 'data' =>array()));
	}
	
}else{
	ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' =>array()));
}
