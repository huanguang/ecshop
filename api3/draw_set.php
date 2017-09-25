<?php
//APP获取积分抽奖设置

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');

// $user_id = $_REQUEST['user_id'];
// if(empty($user_id)){
// 	ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请登陆', 'data' => array()));
// }

//查询各个抽奖商品的概率
$sql = "SELECT lg_name,lg_pro FROM " . $GLOBALS['ecs']->table('lottery_group');
$goods = $GLOBALS['db']->getAll($sql);
if(empty($goods)){
	ajaxReturn(array('ret_code' => 1, 'msg' => '抽奖还没有开始', 'data' => array()));
}
ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $goods));