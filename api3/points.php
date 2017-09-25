<?php
/**
 * 订单积分抵换app接口
 * $user_id: 会员id
 * $points: 抵换的积分
*/
define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(dirname(__FILE__) . '/../includes/lib_order.php');


/* 载入语言文件 */

	$points    = floatval($_REQUEST['points']);
	$user_id    = $_REQUEST['user_id'];
    $user_info = user_info($user_id);

    if(empty($user_info)){
    	ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误！', 'data' => array()));
    }
    if(empty($user_id)){
    	ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误！', 'data' => array()));
    }
    /* 取得订单信息 */
    $order = flow_order_info();

    $flow_points = flow_available_points();  // 该订单允许使用的积分
    
    $user_points = $user_info['pay_points']; // 用户的积分总数
    
        if ($points > $user_points)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '积分不足', 'data' => array()));
    }
    elseif ($points > $flow_points)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '本单商品不能使用太多积分', 'data' => array()));

    }
    else
    {
        /* 取得购物类型 */
        $flow_type = isset($_SESSION['flow_type']) ? intval($_SESSION['flow_type']) : CART_GENERAL_GOODS;

        $order['integral'] = $points;

        /* 获得收货人信息 */
        $consignee = get_consignee($_SESSION['user_id']);

        /* 对商品信息赋值 */
        $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计

        if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
        {
            ajaxReturn(array('ret_code' => 0, 'msg' => '本类型商品不能使用积分抵扣', 'data' => array()));
        }
        else
        {
            /* 计算订单的费用 */
            $total = order_fee($order, $cart_goods, $consignee);
            
            // $smarty->assign('total',  $total);
            // $smarty->assign('config', $_CFG);

            /* 团购标志 */
            if ($flow_type == CART_GROUP_BUY_GOODS)
            {
                $smarty->assign('is_group_buy', 1);
            }
            ajaxReturn(array('ret_code' => 1, 'msg' => '成功', 'data' => $total));
            // var_dump($result);die;
            // $result['content'] = $smarty->fetch('library/order_total.lbi');
            // $result['error'] = '';
        }
    }

    //$json = new JSON();
    /**
 * 获得用户的可用积分
 *
 * @access  private
 * @return  integral
 */
function flow_available_points($rec_id='')
{
	if($rec_id){
		$where =" and c.rec_id in($rec_id)";
	}
    $sql = "SELECT SUM(g.integral * c.goods_number) ".
            "FROM " . $GLOBALS['ecs']->table('cart') . " AS c, " . $GLOBALS['ecs']->table('goods') . " AS g " .
            "WHERE c.session_id = '" . SESS_ID . "' AND c.goods_id = g.goods_id AND c.is_gift = 0 AND g.integral > 0 " .
            "AND c.rec_type = '" . CART_GENERAL_GOODS . "' $where ";

    $val = intval($GLOBALS['db']->getOne($sql));
    
    return integral_of_value($val);
}
?>