<?php
//APP获取某个订单详情

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');

$user_id = $_REQUEST['user_id'];
if(empty($user_id)){
	ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请先登录', 'data' => array()));
}
$http = str_replace('api3/order_detail.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));


include_once(ROOT_PATH . 'includes/lib_transaction.php');
    include_once(ROOT_PATH . 'includes/lib_payment.php');
    include_once(ROOT_PATH . 'includes/lib_order.php');
    include_once(ROOT_PATH . 'includes/lib_clips.php');

    $order_id = !empty($_REQUEST['order_id']) ? intval($_REQUEST['order_id']) : 0;

    if(empty($order_id)){
    	ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
    }
    
    /* 订单详情 */
    $order = get_order_detail($order_id, $user_id);

    if ($order === false)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '订单错误', 'data' => array()));
    }



    /* 订单商品 */
    $goods_list = order_goods($order_id);
    $goodslist = array(); 
    $goods = array();
    foreach ($goods_list AS $key => $value)
    {
        $goods_list[$key]['market_price'] = price_format($value['market_price'], false);
        $goods_list[$key]['goods_price']  = price_format($value['goods_price'], false);
        $goods_list[$key]['subtotal']     = price_format($value['subtotal'], false);
        $goodslist['subtotal'] = price_format($value['subtotal'], false);
        $goodslist['goods_img'] = $http.$value['goods_img'];
        $goodslist['goods_name'] = $value['goods_name'];
        $goodslist['goods_number'] = $value['goods_number'];
        $goodslist['goods_id'] = $value['goods_id'];
        $goods[] = $goodslist;
    }

     /* 设置能否修改使用余额数 */
    // if ($order['order_amount'] > 0)
    // {
    //     if ($order['order_status'] == OS_UNCONFIRMED || $order['order_status'] == OS_CONFIRMED)
    //     {
    //         $user = user_info($order['user_id']);
    //         if ($user['user_money'] + $user['credit_line'] > 0)
    //         {
    //             $smarty->assign('allow_edit_surplus', 1);
    //             $smarty->assign('max_surplus', sprintf($_LANG['max_surplus'], $user['user_money']));
    //         }
    //     }
    // }

    /* 未发货，未付款时允许更换支付方式 */
    // if ($order['order_amount'] > 0 && $order['pay_status'] == PS_UNPAYED && $order['shipping_status'] == SS_UNSHIPPED)
    // {
    //     $payment_list = available_payment_list(false, 0, true);

    //     /* 过滤掉当前支付方式和余额支付方式 */
    //     if(is_array($payment_list))
    //     {
    //         foreach ($payment_list as $key => $payment)
    //         {
    //             if ($payment['pay_id'] == $order['pay_id'] || $payment['pay_code'] == 'balance')
    //             {
    //                 unset($payment_list[$key]);
    //             }
    //         }
    //     }
    //     $smarty->assign('payment_list', $payment_list);
    // }

    $orders = array();
    
    	$orders['order_sn'] = $order['order_sn'];  //订单单号
    	$orders['total_fee'] = $order['total_fee'];//订单总计
    	$orders['pay_name'] = $order['pay_name']; //支付方式
    	$orders['postscript'] = $order['postscript'];  //客户留言
    	$orders['shipping_name'] = $order['shipping_name'];  //配送方式
    	$orders['shipping_fee'] = $order['shipping_fee'];  //配送费用
    	$orders['integral_money'] = $order['integral_money']; //积分抵用金额
    	$orders['bonus'] = $order['bonus'];     //使用红包金额
    	$orders['add_time'] = local_date('Y-m-d H:i:s',$order['add_time']);//订单生成时间
    	$orders['money_paid'] = $order['money_paid']; //已经付款金额
    	$orders['dizhi'] = huoqudiqu($value['province']).huoqudiqu($order['city']).huoqudiqu($order['district']).$order['address'];
    	$orders['mobile'] = $order['mobile'];  //收货人的手机 
    	$orders['consignee'] = $order['consignee'];  //收货人的姓名
    	
    	# code...

    $info = array('goods'=>$goods,'order'=>$orders);
    ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $info));






    //获取城市名称
function huoqudiqu($id){
        $sql = " select region_name from "  .$GLOBALS['ecs']->table('region'). " where region_id = '$id'";
        $dizhi = $GLOBALS['db']->getOne($sql);
        return $dizhi;
    }