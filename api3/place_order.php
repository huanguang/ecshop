<?php
//APP订单提交接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(ROOT_PATH . 'includes/lib_order.php');

$http = str_replace('api3/place_order.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));	

/*------------------------------------------------------ */
    //-- 订单确认
    /*------------------------------------------------------ */
include_once(ROOT_PATH . 'includes/lib_transaction.php');

$user_id = $_REQUEST['user_id'];
if(empty($user_id)){
    ajaxReturn(array('ret_code' => 0, 'msg' => '请先登录', 'data' => array()));
}

    /* 取得国家列表、商店所在国家、商店所在国家的省列表 */
        $smarty->assign('country_list',       get_regions());
        
        //var_dump(get_regions());die;
        $smarty->assign('shop_country',       $_CFG['shop_country']);
        $smarty->assign('shop_province_list', get_regions(1, $_CFG['shop_country']));



        //获取用户的默认收货地址
        $sql = "select address_id from " .$ecs->table('users'). " where user_id = '$user_id'";
        $moren = $db->getOne($sql);


        $user_moren = $db->getRow("select * from " .$ecs->table('user_address') . " where address_id = '$moren'");
        

            $user_moren['country'] = huoqudiqu($user_moren['country']);
            $user_moren['province']     = huoqudiqu($user_moren['province']);
            $user_moren['city'] = huoqudiqu($user_moren['city']);
            $user_moren['district'] = huoqudiqu($user_moren['district']);
            $user_moren['xiangxi'] =    $user_moren['country'].$user_moren['province'].$user_moren['city'].$user_moren['district'].$user_moren['address'];

            

        /* 获得用户所有的收货人信息 */
        if ($user_id > 0)
        {
            $consignee_list = get_consignee_list($user_id);

            if (count($consignee_list) < 5)
            {
                /* 如果用户收货人信息的总数小于 5 则增加一个新的收货人信息 */
                $consignee_list[] = array('country' => $_CFG['shop_country'], 'email' => isset($_SESSION['email']) ? $_SESSION['email'] : '');
            }
        }
        else
        {
            if (isset($_SESSION['flow_consignee'])){
                $consignee_list = array($_SESSION['flow_consignee']);
            }
            else
            {
                $consignee_list[] = array('country' => $_CFG['shop_country']);
            }
        }

        /* 取得每个收货地址的省市区列表 */
        $province_list = array();
        $city_list = array();
        $district_list = array();
        foreach ($consignee_list as $region_id => $consignee)
        {
            $consignee['country']  = isset($consignee['country'])  ? intval($consignee['country'])  : 0;
            $consignee['province'] = isset($consignee['province']) ? intval($consignee['province']) : 0;
            $consignee['city']     = isset($consignee['city'])     ? intval($consignee['city'])     : 0;

            $province_list[$region_id] = get_regions(1, $consignee['country']);
            $city_list[$region_id]     = get_regions(2, $consignee['province']);
            $district_list[$region_id] = get_regions(3, $consignee['city']);

        }


        foreach ($consignee_list as $key => $value) {
            if($moren == $value['address_id']){
                $consignee_list[$key]['moren'] = 1;
            }else{
                $consignee_list[$key]['moren'] = 0;
            }
            $consignee_list[$key]['country'] = huoqudiqu($value['country']);
            $consignee_list[$key]['province'] = huoqudiqu($value['province']);
            $consignee_list[$key]['city'] = huoqudiqu($value['city']);
           $consignee_list[$key]['district'] = huoqudiqu($value['district']);
           if(empty($consignee_list[$key]['address_id'])){
            unset($consignee_list[$key]);
           }
        }





    /* 取得购物类型 */
    $flow_type = isset($_REQUEST['flow_type']) ? intval($_REQUEST['flow_type']) : CART_GENERAL_GOODS;

    /* 团购标志 */
    if ($flow_type == CART_GROUP_BUY_GOODS)
    {
        $smarty->assign('is_group_buy', 1);
    }
    /* 积分兑换商品 */
    elseif ($flow_type == CART_EXCHANGE_GOODS)
    {
        $smarty->assign('is_exchange_goods', 1);
    }
    else
    {
        //正常购物流程  清空其他购物流程情况
        $_SESSION['flow_order']['extension_code'] = '';
    }
    if($_REQUEST['way'] == 2){
        /* 检查购物车中是否有商品 */
    $sql = "SELECT COUNT(*) FROM " . $ecs->table('cart_info') .
        " WHERE user_id = '" . $user_id . "' " .
        "AND parent_id = 0 AND is_gift = 0 AND rec_type = '$flow_type'";
    }else{
    /* 检查购物车中是否有商品 */
    $sql = "SELECT COUNT(*) FROM " . $ecs->table('cart') .
        " WHERE user_id = '" . $user_id . "' " .
        "AND parent_id = 0 AND is_gift = 0 AND rec_type = '$flow_type'";
        }

    if ($db->getOne($sql) == 0)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '您的购物车中没有商品', 'data' => array()));
    }

    /*
     * 检查用户是否已经登录
     * 如果用户已经登录了则检查是否有默认的收货地址
     * 如果没有登录则跳转到登录和注册页面
     */
    // if (empty($_SESSION['direct_shopping']) && $_SESSION['user_id'] == 0)
    // {
    //      用户没有登录且没有选定匿名购物，转向到登录页面 
    //     ecs_header("Location: flow.php?step=login\n");
    //     exit;
    // }

    // $consignee = get_consignee($_SESSION['user_id']);
    // $sql =" select * from ".$GLOBALS['ecs']->table('user_address')." where  user_id = ".$_SESSION['user_id'];
    // $dizhi = $GLOBALS['db']->getAll($sql);
    // foreach ($dizhi as $key => $value) {

    //     $sql = "select region_name from ".$GLOBALS['ecs']->table('region')."where region_id =".$value['district'];
    //     $dizhi[$key]['district'] = $GLOBALS['db']->getOne($sql);
    //     $sql = "select region_name from ".$GLOBALS['ecs']->table('region')."where region_id =".$value['province'];
    //     $dizhi[$key]['province'] = $GLOBALS['db']->getOne($sql);
    //     $sql = "select region_name from ".$GLOBALS['ecs']->table('region')."where region_id =".$value['city'];
    //     $dizhi[$key]['city'] = $GLOBALS['db']->getOne($sql);


    // }

    // $smarty->assign('dizhi',$dizhi);

    /* 检查收货人信息是否完整 */
    // if (!check_consignee_info($consignee, $flow_type))
    // {
    //      如果不完整则转向到收货人信息填写界面 
    //     ecs_header("Location: flow.php?step=checkout\n");
    //     exit;
    // }

    $_SESSION['flow_consignee'] = $consignee;
    $smarty->assign('consignee', $consignee);

    $rec_id = $_REQUEST['rec_id'];

    /* 对商品信息赋值 */
    if($_REQUEST['way'] == 2){
        
        $cart_goods = cart_goods3($flow_type,$rec_id);
    }else{
        $cart_goods = cart_goods4($flow_type,$user_id,$rec_id); // 取得商品列表，计算合计
    }
    
    if(empty($cart_goods)){
        ajaxReturn(array('ret_code' => 0, 'msg' => '请选择要提交的商品', 'data' => array()));
    }
   
    foreach ($cart_goods as $key => $value) {
    	# code...
    	//$cart_goods[$key]['goods_img'] = $http.$value['goods_img'];
    	$cart_goods[$key]['goods_thumb'] = $http.$value['goods_thumb'];
    }
    //商品的列表
    //var_dump($cart_goods);die;

        $smarty->assign('goods_list', $cart_goods);

    /* 对是否允许修改购物车赋值 */
    if ($flow_type != CART_GENERAL_GOODS || $_CFG['one_step_buy'] == '1')
    {
        $smarty->assign('allow_edit_cart', 0);
    }
    else
    {
        $smarty->assign('allow_edit_cart', 1);
    }

    /*
     * 取得购物流程设置
     */
    $smarty->assign('config', $_CFG);
    /*
     * 取得订单信息
     */
    $order = flow_order_info();


    /* 计算折扣 */
    if ($flow_type != CART_EXCHANGE_GOODS && $flow_type != CART_GROUP_BUY_GOODS)
    {
        $discount = compute_discount();
        $smarty->assign('discount', $discount['discount']);
        $favour_name = empty($discount['name']) ? '' : join(',', $discount['name']);
        $smarty->assign('your_discount', sprintf($_LANG['your_discount'], $favour_name, price_format($discount['discount'])));
    }

    /*
     * 计算订单的费用
     */
    if($_REQUEST['way'] == 2){
        $total = order_fee2($order, $cart_goods, $consignee,$user_id);
    }else{
        $total = order_fee($order, $cart_goods, $consignee);
    }
    $smarty->assign('total', $total);
    $smarty->assign('shopping_money', sprintf($_LANG['shopping_money'], $total['formated_goods_price']));
    $smarty->assign('market_price_desc', sprintf($_LANG['than_market_price'], $total['formated_market_price'], $total['formated_saving'], $total['save_rate']));

    /* 取得配送列表 */
    $region            = array($consignee['country'], $consignee['province'], $consignee['city'], $consignee['district']);
    $shipping_list     = available_shipping_list($region);
    $cart_weight_price = cart_weight_price($flow_type);
    $insure_disabled   = true;
    $cod_disabled      = true;

    // 查看购物车中是否全为免运费商品，若是则把运费赋为零
    $sql = 'SELECT count(*) FROM ' . $ecs->table('cart') . " WHERE `session_id` = '" . SESS_ID. "' AND `extension_code` != 'package_buy' AND `is_shipping` = 0";
    $shipping_count = $db->getOne($sql);

    foreach ($shipping_list AS $key => $val)
    {
        $shipping_cfg = unserialize_config($val['configure']);
        $shipping_fee = ($shipping_count == 0 AND $cart_weight_price['free_shipping'] == 1) ? 0 : shipping_fee($val['shipping_code'], unserialize($val['configure']),
        $cart_weight_price['weight'], $cart_weight_price['amount'], $cart_weight_price['number']);

        $shipping_list[$key]['format_shipping_fee'] = price_format($shipping_fee, false);
        $shipping_list[$key]['shipping_fee']        = $shipping_fee;
        $shipping_list[$key]['free_money']          = price_format($shipping_cfg['free_money'], false);
        $shipping_list[$key]['insure_formated']     = strpos($val['insure'], '%') === false ?
            price_format($val['insure'], false) : $val['insure'];

        /* 当前的配送方式是否支持保价 */
        if ($val['shipping_id'] == $order['shipping_id'])
        {
            $insure_disabled = ($val['insure'] == 0);
            $cod_disabled    = ($val['support_cod'] == 0);
        }
    }
    
    // $smarty->assign('shipping_list',   $shipping_list);
    // $smarty->assign('url','1');
    // $smarty->assign('insure_disabled', $insure_disabled);
    // $smarty->assign('cod_disabled',    $cod_disabled);

    /* 取得支付列表 */
    if ($order['shipping_id'] == 0)
    {
        $cod        = true;
        $cod_fee    = 0;
    }
    else
    {
        $shipping = shipping_info($order['shipping_id']);
        $cod = $shipping['support_cod'];

        if ($cod)
        {
            /* 如果是团购，且保证金大于0，不能使用货到付款 */
            if ($flow_type == CART_GROUP_BUY_GOODS)
            {
                $group_buy_id = $_SESSION['extension_id'];
                if ($group_buy_id <= 0)
                {
                    show_message('error group_buy_id');
                }
                $group_buy = group_buy_info($group_buy_id);
                if (empty($group_buy))
                {
                    show_message('group buy not exists: ' . $group_buy_id);
                }

                if ($group_buy['deposit'] > 0)
                {
                    $cod = false;
                    $cod_fee = 0;

                    /* 赋值保证金 */
                    $smarty->assign('gb_deposit', $group_buy['deposit']);
                }
            }

            if ($cod)
            {
                $shipping_area_info = shipping_area_info($order['shipping_id'], $region);
                $cod_fee            = $shipping_area_info['pay_fee'];
            }
        }
        else
        {
            $cod_fee = 0;
        }
    }

    // 给货到付款的手续费加<span id>，以便改变配送的时候动态显示
    // $payment_list = available_payment_list(1, $cod_fee);
    // //var_dump($payment_list);die;
    // if(isset($payment_list))
    // {
    //     foreach ($payment_list as $key => $payment)
    //     {
    //         if ($payment['is_cod'] == '1')
    //         {
    //             $payment_list[$key]['format_pay_fee'] = '<span id="ECS_CODFEE">' . $payment['format_pay_fee'] . '</span>';
    //         }
    //         /* 如果有易宝神州行支付 如果订单金额大于300 则不显示 */
    //         if ($payment['pay_code'] == 'yeepayszx' && $total['amount'] > 300)
    //         {
    //             unset($payment_list[$key]);
    //         }
    //         /* 如果有余额支付 */
    //         if ($payment['pay_code'] == 'balance')
    //         {
    //             /* 如果未登录，不显示 */
    //             if ($_SESSION['user_id'] == 0)
    //             {
    //                 unset($payment_list[$key]);
    //             }
    //             else
    //             {
    //                 if ($_SESSION['flow_order']['pay_id'] == $payment['pay_id'])
    //                 {
    //                     $smarty->assign('disable_surplus', 1);
    //                 }
    //             }
    //         }
    //     }
    // }
   // var_dump($payment_list);die;
    //$smarty->assign('payment_list', $payment_list);

   

    $user_info = user_info($user_id);

    /* 如果使用余额，取得用户余额 */
    if ((!isset($_CFG['use_surplus']) || $_CFG['use_surplus'] == '1')
        && $_SESSION['user_id'] > 0
        && $user_info['user_money'] > 0)
    {
        // 能使用余额
        $smarty->assign('allow_use_surplus', 1);
        $smarty->assign('your_surplus', $user_info['user_money']);
    }

    /* 如果使用积分，取得用户可用积分及本订单最多可以使用的积分 */
    if ((!isset($_CFG['use_integral']) || $_CFG['use_integral'] == '1')
        && $user_id > 0
        && $user_info['pay_points'] > 0
        && ($flow_type != CART_GROUP_BUY_GOODS && $flow_type != CART_EXCHANGE_GOODS))
    {
        // 能使用积分
        //用户本单可以使用的积分
        if($_REQUEST['way'] == 2){
            $jifen = flow_available_points2($user_id,$rec_id);
        }else{
         $jifen = flow_available_points($user_id,$rec_id);
         }
         
        
    }else{
        $jifen = 0;
    }

    /* 如果使用红包，取得用户可以使用的红包及用户选择的红包 */
    if ((!isset($_CFG['use_bonus']) || $_CFG['use_bonus'] == '1')
        && ($flow_type != CART_GROUP_BUY_GOODS && $flow_type != CART_EXCHANGE_GOODS))
    {
        // 取得用户可用红包
        $user_bonus = user_bonus($user_id, $total['goods_price']);
        if (!empty($user_bonus))
        {
            foreach ($user_bonus AS $key => $val)
            {
                $user_bonus[$key]['bonus_money_formated'] = price_format($val['type_money'], false);
                $user_bonus[$key]['use_end_date']  = local_date('m-d',$val['use_end_date']);
            }
            
            $smarty->assign('bonus_list', $user_bonus);
        }

        // 能使用红包
        $smarty->assign('allow_use_bonus', 1);
    }else{
       
        $user_bonus = array();
    }

    /* 如果使用缺货处理，取得缺货处理列表 */
    if (!isset($_CFG['use_how_oos']) || $_CFG['use_how_oos'] == '1')
    {
        if (is_array($GLOBALS['_LANG']['oos']) && !empty($GLOBALS['_LANG']['oos']))
        {
            $smarty->assign('how_oos_list', $GLOBALS['_LANG']['oos']);
        }
    }

    /* 如果能开发票，取得发票内容列表 */
    if ((!isset($_CFG['can_invoice']) || $_CFG['can_invoice'] == '1')
        && isset($_CFG['invoice_content'])
        && trim($_CFG['invoice_content']) != '' && $flow_type != CART_EXCHANGE_GOODS)
    {
        $inv_content_list = explode("\n", str_replace("\r", '', $_CFG['invoice_content']));
        $smarty->assign('inv_content_list', $inv_content_list);

        $inv_type_list = array();
        foreach ($_CFG['invoice_type']['type'] as $key => $type)
        {
            if (!empty($type))
            {
                $inv_type_list[$type] = $type . ' [' . floatval($_CFG['invoice_type']['rate'][$key]) . '%]';
            }
        }
        $smarty->assign('inv_type_list', $inv_type_list);
    }
    $shippinglist = array();
    $ass = array();
    foreach ($shipping_list as $key => $value) {
        $shippinglist['shipping_id'] = $value['shipping_id'];
        $shippinglist['shipping_name'] = $value['shipping_name'];
        $ass[] = $shippinglist;
    }
    $jine = array();
    $jine['shipping_fee_formated'] = $total['shipping_fee_formated']; //配送费用
    $jine['amount_formated'] = $total['amount_formated'];//实际付款金额
    $jine['goods_price_formated'] = $total['goods_price_formated'];//商品总金额
    $jine['bonus_formated'] = $total['bonus_formated']; //优惠券抵用的金额
    $jine['integral_formated'] = $total['integral_formated']; //积分抵用的金额
    
    $add = array('user_bonus'=>$user_bonus,'jifen'=>$jifen,'shipping_list'=>$ass,'total'=>$jine,'cart_goods'=>$cart_goods,'consignee_list'=>$consignee_list);
    
ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $add));
    /* 保存 session */
    $_SESSION['flow_order'] = $order;


    //获取城市名称
function huoqudiqu($id){
        $sql = " select region_name from "  .$GLOBALS['ecs']->table('region'). " where region_id = '$id'";
        $dizhi = $GLOBALS['db']->getOne($sql);
        return $dizhi;
    }

    /**
 * 获得用户的可用积分
 *
 * @access  private
 * @return  integral
 */
function flow_available_points($user_id,$rec_id)
{
    $sql = "select * from " .$GLOBALS['ecs']->table('cart'). "where user_id = '$user_id' and rec_id in($rec_id)";
                    $dd = $GLOBALS['db']->getAll($sql);
                    foreach ($dd as $key => $value) {
                        if($value['group_id'] && $value['parent_id'] == 0){
                            $sql = "select rec_id from " .$GLOBALS['ecs']->table('cart'). "where user_id = '$user_id' and parent_id in($value[goods_id])";
                            $goodsid[] = $GLOBALS['db']->getAll($sql);
                        }
                    }
                    if(!empty($goodsid)){
                        foreach ($goodsid as $key => $value) {
                        foreach ($value as $k => $v) {
                            foreach ($v as $ke => $val) {
                                $rec[] = $val;
                                }
                            
                            }
                        }
                        $sss = implode(',', $rec);
                        $a = ','.$rec_id;
                        $aaa = " and c.rec_id in($sss".$a.") ";
                    }else{
                        $aaa = " and c.rec_id in($rec_id) ";
                    }
                    
    $sql = "SELECT SUM(g.integral * c.goods_number) ".
            "FROM " . $GLOBALS['ecs']->table('cart') . " AS c, " . $GLOBALS['ecs']->table('goods') . " AS g " .
            "WHERE c.user_id = '" . $user_id . "' $aaa AND c.goods_id = g.goods_id AND c.is_gift = 0 AND g.integral > 0 " .
            "AND c.rec_type = '" . CART_GENERAL_GOODS . "'";

    $val = intval($GLOBALS['db']->getOne($sql));
    
    return integral_of_value($val);
}

/**
 * 获得用户的可用积分
 *
 * @access  private
 * @return  integral
 */
function flow_available_points2($user_id,$rec_id)
{
    if(strstr($rec_id,"m_goods_1_")){
        $aaa = " and c.group_id = '$rec_id' "; 
    }else{
        $aaa = " and c.rec_id = '$rec_id' "; 
    }

    $sql = "SELECT SUM(g.integral * c.goods_number) ".
            "FROM " . $GLOBALS['ecs']->table('cart_info') . " AS c, " . $GLOBALS['ecs']->table('goods') . " AS g " .
            "WHERE c.user_id = '" . $user_id . "' $aaa AND c.goods_id = g.goods_id AND c.is_gift = 0 AND g.integral > 0 " .
            "AND c.rec_type = '" . CART_GENERAL_GOODS . "'";

    $val = intval($GLOBALS['db']->getOne($sql));
    return integral_of_value($val);
}