<?php
/**
 * *****app购物车接口
*/
	define('IN_ECS', true);
require(dirname(__FILE__) . '/../includes/init.php');
require(dirname(__FILE__) . '/../includes/lib_order.php');
$user_id = $_REQUEST['user_id'];
if($user_id){
$http = str_replace('api3/cart.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 
$page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;//购物车列表翻页
$record_count = $db->getOne("SELECT count(*) " .
            "FROM " . $GLOBALS['ecs']->table('cart') .
            " AS c LEFT JOIN ".$GLOBALS['ecs']->table('goods').
            " AS g ON c.goods_id = g.goods_id WHERE user_id = $user_id " .
            "AND rec_type = 0");

			$pager = get_pager('cart.php', array('act' => 'index'), $record_count, $page);
			$count_page = ceil($record_count/$pager['size']);  //总页数


			//var_dump($record_count);die;
	    //$exchange_list = coupon($user_id, $pager['size'], $pager['start'],$where);
	$goods_cart = cart_goods2(CART_GENERAL_GOODS,$user_id,$pager['size'], $pager['start']);//获取购物车商品
	
	$arr = array();
	if($goods_cart){
		foreach ($goods_cart as $key => $value) {
			$goods_cart[$key]['goods_thumb'] = $http.$value['goods_thumb'];
			if($goods_cart[$key]['group_id']){
				$arr[$goods_cart[$key]['group_id']][] = $goods_cart[$key];
				unset($goods_cart[$key]);
			}
		}
		$add = array();
		foreach ($goods_cart as $key => $value) {
			# code...
			$add[][] = $value;
		}
		
		foreach ($arr as $key => $value) {
			$add[] = $value;
		}

		$goods_cart  = array_values($add);
		
		

		
		
		ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' =>$goods_cart,'record_count'=>$count_page,'page'=>$page));
	}else{
		ajaxReturn(array('ret_code' => 1, 'msg' => '购物车为空', 'data' =>array()));
	}
}else{
	ajaxReturn(array('ret_code' => 0, 'msg' => '请先登录', 'data' =>array()));
}


?>