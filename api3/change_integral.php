<?php
//APP积分使用接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(ROOT_PATH . 'includes/lib_order.php');

/*------------------------------------------------------ */
    //-- 积分使用
    /*------------------------------------------------------ */
include_once(ROOT_PATH . 'includes/lib_transaction.php');

$user_id = $_REQUEST['user_id'];

/*------------------------------------------------------ */
    //-- 改变积分
    /*------------------------------------------------------ */
    include_once('includes/cls_json.php');

    $points    = floatval($_REQUEST['points']);
    $user_info = user_info($user_id);

    /* 取得订单信息 */
    $order = flow_order_info();

    $flow_points = flow_available_points();  // 该订单允许使用的积分
    $user_points = $user_info['pay_points']; // 用户的积分总数

    if ($points > $user_points)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '用户的积分不够', 'data' => array()));
    }
    elseif ($points > $flow_points)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '超过当前最多使用积分', 'data' => array()));
    }
    else
    {
        /* 取得购物类型 */
        $flow_type = isset($_SESSION['flow_type']) ? intval($_SESSION['flow_type']) : CART_GENERAL_GOODS;

        $order['integral'] = $points;

        /* 获得收货人信息 */
        $consignee = get_consignee($user_id);

        /* 对商品信息赋值 */
        $cart_goods = cart_goods($flow_type); // 取得商品列表，计算合计

        if (empty($cart_goods) || !check_consignee_info($consignee, $flow_type))
        {
            ajaxReturn(array('ret_code' => 0, 'msg' => '购物车没有商品', 'data' => array()));
        }
        else
        {
            /* 计算订单的费用 */
            $total = order_fee($order, $cart_goods, $consignee);


            /* 团购标志 */
            if ($flow_type == CART_GROUP_BUY_GOODS)
            {
                $smarty->assign('is_group_buy', 1);
            }

            // $result['content'] = $smarty->fetch('library/order_total.lbi');
            // $result['error'] = '';
        }
    }

   ajaxReturn(array('ret_code' => 1, 'msg' => '使用成功', 'data' => $total));


        /**
 * 获得用户的可用积分
 *
 * @access  private
 * @return  integral
 */
function flow_available_points()
{
    $sql = "SELECT SUM(g.integral * c.goods_number) ".
            "FROM " . $GLOBALS['ecs']->table('cart') . " AS c, " . $GLOBALS['ecs']->table('goods') . " AS g " .
            "WHERE c.session_id = '" . SESS_ID . "' AND c.goods_id = g.goods_id AND c.is_gift = 0 AND g.integral > 0 " .
            "AND c.rec_type = '" . CART_GENERAL_GOODS . "'";

    $val = intval($GLOBALS['db']->getOne($sql));

    return integral_of_value($val);
}