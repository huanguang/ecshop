<?php
//APP获取广告接口
//type=1 单广告 type=2 多广告
define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */

$advid = $_REQUEST['advid'];
$type = $_REQUEST['type'];
$type = $type?$type:1;
$http = str_replace('api3/advert.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 

!$advid && ajaxReturn(array('ret_code' => 0, 'msg' => '参数丢失', 'data' => array()));

$sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = '.$advid.' AND enabled = 1 ';

if($type == 1){
    $ad = $db->getRow($sql);
	$ad['ad_code'] = $http."data/afficheimg/".$ad['ad_code'];
	if(!preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is',$ad['ad_link'])){
		$ad['ad_link'] = $http.$ad['ad_link'];
	}
}else{
	$ad = $db->getAll($sql);
	foreach($ad as $k => $v){
		$v['ad_code'] = $http."data/afficheimg/".$v['ad_code'];
		if(!preg_match('/http:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is',$v['ad_link'])){
			$v['ad_link'] = $http.$v['ad_link'];
		}
		$ad[$k] = $v;
	}
}

if(!$ad){
	ajaxReturn(array('ret_code' => 0, 'msg' => '没有获取到广告', 'data' => array()));
}

ajaxReturn(array('ret_code' => 1, 'msg' => '获取到广告', 'data' =>$ad));


