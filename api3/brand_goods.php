<?php
//APP获取某个品牌下的商品

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');

$brand_id = !empty($_REQUEST['brand_id']) ? intval($_REQUEST['brand_id']) : 0;//获得分类id

//商品排序条件

//排序字段，salesnum 商品销量排序 ，shop_price 价格排序
$paixi = !empty($_REQUEST['paixi']) ? $_REQUEST['paixi'] : 'salesnum';
//排序方式  desc 倒序 ， asc 升系
$order = !empty($_REQUEST['order']) ? $_REQUEST['order'] : 'desc';

$where = 'order by ' . $paixi .' ' . $order;
if(empty($brand_id)){
	ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
}
$http = str_replace('api3/group_buy_goods.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));

$sql = " select count(*) from "  . $GLOBALS['ecs']->table('goods') . " where promote_end_date > 0 and promote_start_date > 0 and brand_id = ".$brand_id. " and is_delete = 0 $where";

$record_count = $db->getOne($sql);//统计总数
  
  $page = !empty($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;//获得页码
 $size = !empty($_REQUEST['size']) ? intval($_REQUEST['size']) : 10;//每页大小
 $pager  = get_pager('goods.php', array('act'=>'actions'), $record_count, $page,10);//分页处理
//获取总页数
$count = ceil($record_count/$size);//总页数

$sql = " select * from "  . $GLOBALS['ecs']->table('goods') . " where promote_end_date > 0 and promote_start_date > 0 and brand_id = ".$brand_id. " and is_delete = 0 $where" ;
        //$brand_list = $GLOBALS['db']->getAll($sql);
        $res = $db->selectLimit($sql, $size,$pager['start']);

        //给商品添加折扣
        // foreach ($brand_lists[$key]['goods'] as $ke => $value) {
        //     //本店价格折扣
        //     $brand_lists[$key]['goods'][$ke]['zhekou1'] = number_format($value['promote_price']/$value['market_price'],2);
        //     $brand_lists[$key]['goods'][$ke]['zhekou2'] = number_format($value['shop_price']/$value['market_price'],2);
        // }


$goods = array();
$goodss = array();
while ($row = $GLOBALS['db']->fetchRow($res))
    {

    	     $goods['zhekou1'] = number_format($row['promote_price']/$row['market_price'],2);
             $goods['zhekou2'] = number_format($row['shop_price']/$row['market_price'],2);

    	
   //  		$goods['zhekou'] = sprintf('%.2f',$row['shop_price']/$row['market_price']);
			// $goods['jianjiage'] = $row['market_price'] - $res['shop_price'];
			// $goods['ext_info'] = unserialize($row['ext_info']);
			$goods['goods_img'] = $http.$row['goods_img'];
			$goods['goods_id'] = $http.$row['goods_id'];
			$goods['goods_name'] = $row['goods_name'];
			$goods['shop_price'] = $row['shop_price'];
			$goods['market_price'] = $row['market_price'];
			$goods['promote_price'] = $row['promote_price'];

			// $goods['tongji'] = group_buy_stats2($row['act_id'],$goods['ext_info']['deposit']);
			// $goods['shengyu'] = $row['ext_info']['restrict_amount'] - $row['tongji']['valid_goods'];

		$goodss[] = $goods;
    }

    
//获取团购页面的广告

    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 41 AND enabled = 1 ';
    $ad = $db->getAll($sql);

    foreach ($ad as $key => $value) {
    	$ad[$key]['ad_code'] = $http.'data/afficheimg/'.$value['ad_code'];
    }

$goods  = array('goodslist'=>$goodss,'total_page'=>$count,'page'=>$page,'ad'=>$ad);
ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $goods));