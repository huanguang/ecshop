<?php
//APP获取积分商城兑换商品记录

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');
$http = str_replace('api3/integrai_exchange.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));	
$sql = "SELECT a.add_time,a.user_id,b.* FROM " . $GLOBALS['ecs']->table('order_info') .
            " as a left join " . $GLOBALS['ecs']->table('exchange_goods') .
            " as b on a.extension_id = b.goods_id WHERE a.extension_code = 'exchange_goods'";

    $goods = $GLOBALS['db']->getAll($sql);
   //查询商品的信息

    foreach ($goods as $key => $value) {
    	$goods[$key]['add_time'] = local_date('Y-m-d H:i:s', $value['add_time']);

    	$sql = "SELECT goods_name,goods_img FROM " . $GLOBALS['ecs']->table('goods') .
            " WHERE goods_id = '$value[goods_id]'";

    $goods_list = $GLOBALS['db']->getRow($sql);

    $goods[$key]['goods_name'] = $goods_list['goods_name'];
    $goods[$key]['goods_img'] = $http.$goods_list['goods_img'];

    //查询用户名
    $sql = "SELECT user_name FROM " . $GLOBALS['ecs']->table('users') .
            " WHERE user_id = '$value[user_id]'";

    $user_name = $GLOBALS['db']->getOne($sql);

    $goods[$key]['user_name'] = $user_name;


    }

    if(empty($goods)){
    	ajaxReturn(array('ret_code' => 1, 'msg' => '暂时没有兑换记录', 'data' => array()));
    }
    ajaxReturn(array('ret_code' => 1, 'msg' => '兑换成功', 'data' => $goods));