<?php
//APP优惠券使用接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(ROOT_PATH . 'includes/lib_order.php');

$user_id = $_REQUEST['user_id'];

/*------------------------------------------------------ */
    //-- 改变红包
    /*------------------------------------------------------ */
    //include_once('includes/cls_json.php');
    //$result = array('error' => '', 'content' => '');

    /* 取得购物类型 */
    $flow_type = isset($_SESSION['flow_type']) ? intval($_SESSION['flow_type']) : CART_GENERAL_GOODS;

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

        /* 取得购物流程设置 */
        $smarty->assign('config', $_CFG);

        /* 取得订单信息 */
        $order = flow_order_info();

        $bonus = bonus_info(intval($_REQUEST['bonus']));

        if ((!empty($bonus) && $bonus['user_id'] == $user_id) || $_REQUEST['bonus'] == 0)
        {
            $order['bonus_id'] = intval($_REQUEST['bonus']);
        }
        else
        {
            $order['bonus_id'] = 0;
            //$result['error'] = $_LANG['invalid_bonus'];
            ajaxReturn(array('ret_code' => 0, 'msg' => '优惠券错误', 'data' => array()));
        }

        /* 计算订单的费用 */
        $total = order_fee($order, $cart_goods, $consignee);
        $smarty->assign('total', $total);

        /* 团购标志 */
        if ($flow_type == CART_GROUP_BUY_GOODS)
        {
            $smarty->assign('is_group_buy', 1);
        }
        //$result['content'] = $smarty->fetch('library/order_total.lbi');
    }

     ajaxReturn(array('ret_code' => 1, 'msg' => '使用成功', 'data' => $total));

    // $json = new JSON();
    // die($json->encode($result));