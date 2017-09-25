<?php
//APP删除购物车商品

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(ROOT_PATH . 'includes/lib_order.php');

$user_id = $_REQUEST['user_id'];
if(empty($user_id)){
		ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请先登录', 'data' => array()));
	}
$rec_id = intval($_REQUEST['id']);
if(empty($rec_id)){
		ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
	}

    flow_drop_cart_goods($rec_id);

ajaxReturn(array('ret_code' => 1, 'msg' => '成功删除', 'data' => array()));
    