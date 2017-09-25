<?php
//APP获取品牌特卖商品列表接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
$http = str_replace('api3/brand.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));





//获取所有的品牌下的促销商品
        $sqls = 'SELECT * FROM ' . $GLOBALS['ecs']->table('brand') . " order by sort_order asc";

    $brand_lists = $GLOBALS['db']->getAll($sqls);
    foreach ($brand_lists as $key => $value) {

    	$brand_lists[$key]['brand_tupian'] = $http.'data/brand_tupian/'.$value['brand_tupian'];
        $sql = " select * from "  . $GLOBALS['ecs']->table('goods') . " where promote_end_date > 0 and promote_start_date > 0 and brand_id = ".$value['brand_id']. " and is_delete = 0";
        //$brand_list = $GLOBALS['db']->getAll($sql);
        $brand_lists[$key]['goods'] = $GLOBALS['db']->getAll($sql);

        //给商品添加折扣
        if(empty($brand_lists[$key]['goods'])){
        	unset($brand_lists[$key]);
        }
        unset($brand_lists[$key]['goods']);
        // foreach ($brand_lists[$key]['goods'] as $ke => $value) {
        //     //本店价格折扣
        //     $brand_lists[$key]['goods'][$ke]['zhekou1'] = number_format($value['promote_price']/$value['market_price'],2);
        //     $brand_lists[$key]['goods'][$ke]['zhekou2'] = number_format($value['shop_price']/$value['market_price'],2);
        // }
        
    }
$ass = array();
    foreach ($brand_lists as $k => $v) {
	$ass[] = $v;
}
ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $ass));
    