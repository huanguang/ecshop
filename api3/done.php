<?php


//生成订单app接口
//postscript  获取用户的留言
define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(ROOT_PATH . 'includes/lib_order.php');
include_once(ROOT_PATH . 'includes/lib_clips.php');
    include_once(ROOT_PATH . 'includes/lib_payment.php');
$http = str_replace('api3/guessyoulike.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));


$user_id = $_REQUEST['user_id'];
if(empty($user_id)){
    ajaxReturn(array('ret_code' => 0, 'msg' => '请先登录', 'data' => array()));
}
$rec_id = $_REQUEST['rec_id'];
    //var_dump($_POST);die;
    $bankItem = isset($_POST['bankItem']) ? $_POST['bankItem']:'';
    //var_dump($_POST['bankItem']);die;
    /* 取得购物类型 */
    $flow_type = isset($_REQUEST['flow_type']) ? intval($_REQUEST['flow_type']) : CART_GENERAL_GOODS;

    /* 检查购物车中是否有商品 */
    // $sql = "SELECT COUNT(*) FROM " . $ecs->table('cart') .
    //     " WHERE user_id = '" . $user_id . "' " .
    //     "AND parent_id = 0 AND is_gift = 0 AND rec_type = '$flow_type'";
    // if ($db->getOne($sql) == 0)
    // {
    //     ajaxReturn(array('ret_code' => 0, 'msg' => '您的购物车中没有商品', 'data' => array()));
    // }

    /* 检查商品库存 */
    /* 如果使用库存，且下订单时减库存，则减少库存 */
    if ($_CFG['use_storage'] == '1' && $_CFG['stock_dec_time'] == SDT_PLACE)
    {
        $cart_goods_stock = get_cart_goods();
        $_cart_goods_stock = array();
        foreach ($cart_goods_stock['goods_list'] as $value)
        {
            $_cart_goods_stock[$value['rec_id']] = $value['goods_number'];
        }
        flow_cart_stock($_cart_goods_stock);
        unset($cart_goods_stock, $_cart_goods_stock);
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

    $consignee = get_consignee($user_id);

    /* 检查收货人信息是否完整 */
    // if (!check_consignee_info($consignee, $flow_type))
    // {
    //      //如果不完整则转向到收货人信息填写界面 
    //     ecs_header("Location: flow.php?step=consignee\n");
    //     exit;
    // }

    $_POST['how_oos'] = isset($_POST['how_oos']) ? intval($_POST['how_oos']) : 0;
    $_POST['card_message'] = isset($_POST['card_message']) ? compile_str($_POST['card_message']) : '';
    $_POST['inv_type'] = !empty($_POST['inv_type']) ? compile_str($_POST['inv_type']) : '';
    $_POST['inv_payee'] = isset($_POST['inv_payee']) ? compile_str($_POST['inv_payee']) : '';
    $_POST['inv_content'] = isset($_POST['inv_content']) ? compile_str($_POST['inv_content']) : '';
    $_POST['postscript'] = isset($_POST['postscript']) ? compile_str($_POST['postscript']) : '';

    $order = array(
        'shipping_id'     => intval($_POST['shipping_id']),
        'pay_id'          => intval($_POST['payment']),
        'pack_id'         => isset($_POST['pack']) ? intval($_POST['pack']) : 0,
        'card_id'         => isset($_POST['card']) ? intval($_POST['card']) : 0,
        'card_message'    => trim($_POST['card_message']),
        'surplus'         => isset($_POST['surplus']) ? floatval($_POST['surplus']) : 0.00,
        'integral'        => isset($_POST['integral']) ? intval($_POST['integral']) : 0,
        'bonus_id'        => isset($_REQUEST['bonus']) ? intval($_REQUEST['bonus']) : 0,
        'need_inv'        => empty($_POST['need_inv']) ? 0 : 1,
        'inv_type'        => $_POST['inv_type'],
        'inv_payee'       => trim($_POST['inv_payee']),
        'inv_content'     => $_POST['inv_content'],
        'postscript'      => trim($_POST['postscript']),
        'how_oos'         => isset($_LANG['oos'][$_POST['how_oos']]) ? addslashes($_LANG['oos'][$_POST['how_oos']]) : '',
        'need_insure'     => isset($_POST['need_insure']) ? intval($_POST['need_insure']) : 0,
        'user_id'         => $user_id,
        'add_time'        => gmtime(),
        'order_status'    => OS_UNCONFIRMED,
        'shipping_status' => SS_UNSHIPPED,
        'pay_status'      => PS_UNPAYED,
        'agency_id'       => get_agency_by_regions(array($consignee['country'], $consignee['province'], $consignee['city'], $consignee['district']))
        );

    /* 扩展信息 */
    if (isset($_SESSION['flow_type']) && intval($_SESSION['flow_type']) != CART_GENERAL_GOODS)
    {
        $order['extension_code'] = $_SESSION['extension_code'];
        $order['extension_id'] = $_SESSION['extension_id'];
    }
    else
    {
        $order['extension_code'] = '';
        $order['extension_id'] = 0;
    }

    /* 检查积分余额是否合法 */
    //$user_id = $_SESSION['user_id'];
    if ($user_id > 0)
    {
        $user_info = user_info($user_id);

        $order['surplus'] = min($order['surplus'], $user_info['user_money'] + $user_info['credit_line']);
        if ($order['surplus'] < 0)
        {
            $order['surplus'] = 0;
        }

        // 查询用户有多少积分
        $flow_points = flow_available_points();  // 该订单允许使用的积分
        $user_points = $user_info['pay_points']; // 用户的积分总数

        $order['integral'] = min($order['integral'], $user_points, $flow_points);
        if ($order['integral'] < 0)
        {
            $order['integral'] = 0;
        }
    }
    else
    {
        $order['surplus']  = 0;
        $order['integral'] = 0;
    }

    /* 检查红包是否存在 */

    if ($order['bonus_id'] > 0)
    {
        $bonus = bonus_info($order['bonus_id']);
        //var_dump(cart_amount(true, $flow_type));die;
        // || $bonus['min_goods_amount'] > cart_amount(true, $flow_type)
        if (empty($bonus) || $bonus['user_id'] != $user_id || $bonus['order_id'] > 0)
        {
            $order['bonus_id'] = 0;
        }
    }
    elseif (isset($_POST['bonus_sn']))
    {
        $bonus_sn = trim($_POST['bonus_sn']);
        $bonus = bonus_info(0, $bonus_sn);
        $now = gmtime();
        if (empty($bonus) || $bonus['user_id'] > 0 || $bonus['order_id'] > 0 || $bonus['min_goods_amount'] > cart_amount(true, $flow_type) || $now > $bonus['use_end_date'])
        {
        }
        else
        {
            if ($user_id > 0)
            {
                $sql = "UPDATE " . $ecs->table('user_bonus') . " SET user_id = '$user_id' WHERE bonus_id = '$bonus[bonus_id]' LIMIT 1";
                $db->query($sql);
            }
            $order['bonus_id'] = $bonus['bonus_id'];
            $order['bonus_sn'] = $bonus_sn;
        }
    }

    /* 订单中的商品 */
    if($_REQUEST['way'] == 2){
        
        $cart_goods = cart_goods3($flow_type,$rec_id);
    }else{
        $cart_goods = cart_goods4($flow_type,$user_id,$rec_id);
    }



    if (empty($cart_goods))
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '您的订单中没有商品', 'data' => array()));
    }

    /* 检查商品总额是否达到最低限购金额 */
    if ($flow_type == CART_GENERAL_GOODS && cart_amount(true, CART_GENERAL_GOODS) < $_CFG['min_goods_amount'])
    {
        ajaxReturn(array('ret_code' => 1, 'msg' => '您的订单商品总额没有达到最低限购金额', 'data' => array()));
    }
    

    //获取收货地址
    $address = $_REQUEST['address_id'];
    if(empty($address)){
    	ajaxReturn(array('ret_code' => 0, 'msg' => '请选择收货地址', 'data' => array()));
    }
    $sql = " select * from ecs_user_address where address_id = '$address'";
    $consignee = $db->getRow($sql);
    
    /* 收货人信息 */
    foreach ($consignee as $key => $value)
    {
        $order[$key] = addslashes($value);
    }
    if(!empty($_POST['Best_time'])){
        $order['best_time'] = $_POST['Best_time'];
    }
   /* 判断是不是实体商品 */
    foreach ($cart_goods AS $val)
    {
        /* 统计实体商品的个数 */
        if ($val['is_real'])
        {
            $is_real_good=1;
        }
    }
    // if(isset($is_real_good))
    // {
    //     $sql="SELECT shipping_id FROM " . $ecs->table('shipping') . " WHERE shipping_id=".$order['shipping_id'] ." AND enabled =1"; 
    //     if(!$db->getOne($sql))
    //     {
    //        show_message($_LANG['flow_no_shipping']);
    //     }
    // }
    /* 订单中的总额 */
    $total = order_fee($order, $cart_goods, $consignee);
    
    $order['bonus']        = $total['bonus'];
    $order['goods_amount'] = $total['goods_price'];
    $order['discount']     = $total['discount'];
    $order['surplus']      = $total['surplus'];
    $order['tax']          = $total['tax'];
    
    // 购物车中的商品能享受红包支付的总额
    $discount_amout = compute_discount_amount();
    
    // 红包和积分最多能支付的金额为商品总额
    $temp_amout = $order['goods_amount'] - $discount_amout;
    if ($temp_amout <= 0)
    {
        $order['bonus_id'] = 0;
    }

    /* 配送方式 */
    if ($order['shipping_id'] > 0)
    {
        $shipping = shipping_info($order['shipping_id']);
        $order['shipping_name'] = addslashes($shipping['shipping_name']);
    }
    $order['shipping_fee'] = $total['shipping_fee'];
    $order['insure_fee']   = $total['shipping_insure'];
    if($bankItem != ''){
        $order['pay_id'] = 6;
    }
	
    /* 支付方式 */
    if ($order['pay_id'] > 0)
    {
        $payment = payment_info($order['pay_id']);
        $order['pay_name'] = addslashes($payment['pay_name']);
    }
    
    $order['pay_fee'] = $total['pay_fee'];
    $order['cod_fee'] = $total['cod_fee'];

    /* 商品包装 */
    if ($order['pack_id'] > 0)
    {
        $pack               = pack_info($order['pack_id']);
        $order['pack_name'] = addslashes($pack['pack_name']);
    }
    $order['pack_fee'] = $total['pack_fee'];

    /* 祝福贺卡 */
    if ($order['card_id'] > 0)
    {
        $card               = card_info($order['card_id']);
        $order['card_name'] = addslashes($card['card_name']);
    }
    $order['card_fee']      = $total['card_fee'];

    $order['order_amount']  = number_format($total['amount'], 2, '.', '');

    /* 如果全部使用余额支付，检查余额是否足够 */
    if ($payment['pay_code'] == 'balance' && $order['order_amount'] > 0)
    {
        if($order['surplus'] >0) //余额支付里如果输入了一个金额
        {
            $order['order_amount'] = $order['order_amount'] + $order['surplus'];
            $order['surplus'] = 0;
        }
        if ($order['order_amount'] > ($user_info['user_money'] + $user_info['credit_line']))
        {
            show_message($_LANG['balance_not_enough']);
        }
        else
        {
            $order['surplus'] = $order['order_amount'];
            $order['order_amount'] = 0;
        }
    }

    /* 如果订单金额为0（使用余额或积分或红包支付），修改订单状态为已确认、已付款 */
    if ($order['order_amount'] <= 0)
    {
        $order['order_status'] = OS_CONFIRMED;
        $order['confirm_time'] = gmtime();
        $order['pay_status']   = PS_PAYED;
        $order['pay_time']     = gmtime();
        $order['order_amount'] = 0;
    }

    $order['integral_money']   = $total['integral_money'];
    $order['integral']         = $total['integral'];

    if ($order['extension_code'] == 'exchange_goods')
    {
        $order['integral_money']   = 0;
        $order['integral']         = $total['exchange_integral'];
    }

    $order['from_ad']          = !empty($_SESSION['from_ad']) ? $_SESSION['from_ad'] : '0';
    $order['referer']          = !empty($_SESSION['referer']) ? addslashes($_SESSION['referer']) : '';

    /* 记录扩展信息 */
    if ($flow_type != CART_GENERAL_GOODS)
    {
        $order['extension_code'] = $_SESSION['extension_code'];
        $order['extension_id'] = $_SESSION['extension_id'];
    }

    $affiliate = unserialize($_CFG['affiliate']);
    if(isset($affiliate['on']) && $affiliate['on'] == 1 && $affiliate['config']['separate_by'] == 1)
    {
        //推荐订单分成
        $parent_id = get_affiliate();
        if($user_id == $parent_id)
        {
            $parent_id = 0;
        }
    }
    elseif(isset($affiliate['on']) && $affiliate['on'] == 1 && $affiliate['config']['separate_by'] == 0)
    {
        //推荐注册分成
        $parent_id = 0;
    }
    else
    {
        //分成功能关闭
        $parent_id = 0;
    }
    $order['parent_id'] = $parent_id;
    $order['user_id'] = $user_id;
    
    /* 插入订单表 */
    $error_no = 0;
    do
    {
        $order['order_sn'] = get_order_sn(); //获取新订单号
        $GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('order_info'), $order, 'INSERT');

        $error_no = $GLOBALS['db']->errno();

        if ($error_no > 0 && $error_no != 1062)
        {
            die($GLOBALS['db']->errorMsg());
        }
    }
    while ($error_no == 1062); //如果是订单号重复则重新提交数据

    $new_order_id = $db->insert_id();

    $order['order_id'] = $new_order_id;
    $rec = explode(',',$rec_id);
    if($_REQUEST['way'] == 2){
            if(strstr($rec_id,"m_goods_1_")){
           $aaa = " and group_id = '$rec_id' "; 
        
            }else{
                $aaa = " and rec_id = $rec_id ";
            }
    }else{
    
            // if(count($rec) < 2){
            //     $aaa = " and rec_id = $rec_id ";
                
            // }else
            if(count($rec) > 0){
                //查询该商品是否是套餐
                    $sql = "select * from " .$ecs->table('cart'). "where user_id = '$user_id' and rec_id in($rec_id)";
                    $dd = $db->getAll($sql);
                    foreach ($dd as $key => $value) {
                        if($value['group_id'] && $value['parent_id'] == 0){
                            $sql = "select rec_id from " .$ecs->table('cart'). "where user_id = '$user_id' and parent_id in($value[goods_id])";
                            $goodsid[] = $db->getAll($sql);
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
                        $aaa = " and rec_id in($sss) ";
                    }else{
                        $aaa = " and rec_id in($rec_id) ";
                    }
            
                
            }elseif(strstr($rec_id,"m_goods_1_")){
               $aaa = " and group_id = '$rec_id' "; 
            
            }
    }

    if($_REQUEST['way'] == 2){
        $table = 'ecs_cart_info';
    }else{
        $table = 'ecs_cart';
    }
    
    /* 插入订单商品 */
    $sql = "INSERT INTO " . $ecs->table('order_goods') . "( " .
                "order_id, goods_id, goods_name, goods_sn, product_id, goods_number, market_price, ".
                "goods_price, goods_attr, is_real, extension_code, parent_id, is_gift, goods_attr_id) ".
            " SELECT '$new_order_id', goods_id, goods_name, goods_sn, product_id, goods_number, market_price, ".
                "goods_price, goods_attr, is_real, extension_code, parent_id, is_gift, goods_attr_id".
            " FROM " . $table .
            " WHERE user_id = '".$user_id."' AND rec_type = '$flow_type' $aaa";
    $db->query($sql);
    /* 修改拍卖活动状态 */
    if ($order['extension_code']=='auction')
    {
        $sql = "UPDATE ". $ecs->table('goods_activity') ." SET is_finished='2' WHERE act_id=".$order['extension_id'];
        $db->query($sql);
    }

    /* 处理余额、积分、红包 */
    if ($order['user_id'] > 0 && $order['surplus'] > 0)
    {

        log_account_change($order['user_id'], $order['surplus'] * (-1), 0, 0, 0, sprintf($_LANG['pay_order'], $order['order_sn']));
    }

    if ($order['user_id'] > 0 && $_REQUEST['integral'] > 0)
    {
        
        log_account_change($order['user_id'], 0, 0, 0, $_REQUEST['integral'] * (-1), sprintf('订单支付('.$order['order_sn'].')', $order['order_sn']));
    }


    if ($order['bonus_id'] > 0 && $temp_amout > 0)
    {
        use_bonus($order['bonus_id'], $new_order_id);
    }

    /* 如果使用库存，且下订单时减库存，则减少库存 */
    if ($_CFG['use_storage'] == '1' && $_CFG['stock_dec_time'] == SDT_PLACE)
    {
        change_order_goods_storage($order['order_id'], true, SDT_PLACE);
    }

    /* 给商家发邮件 */
    /* 增加是否给客服发送邮件选项 */
    if ($_CFG['send_service_email'] && $_CFG['service_email'] != '')
    {
        $tpl = get_mail_template('remind_of_new_order');
        $smarty->assign('order', $order);
        $smarty->assign('goods_list', $cart_goods);
        $smarty->assign('shop_name', $_CFG['shop_name']);
        $smarty->assign('send_date', date($_CFG['time_format']));
        $content = $smarty->fetch('str:' . $tpl['template_content']);
        send_mail($_CFG['shop_name'], $_CFG['service_email'], $tpl['template_subject'], $content, $tpl['is_html']);
    }

    /* 如果需要，发短信 */
    if ($_CFG['sms_order_placed'] == '1' && $_CFG['sms_shop_mobile'] != '')
    {
        include_once('includes/cls_sms.php');
        $sms = new sms();
        $msg = $order['pay_status'] == PS_UNPAYED ?
            $_LANG['order_placed_sms'] : $_LANG['order_placed_sms'] . '[' . $_LANG['sms_paid'] . ']';
        $sms->send($_CFG['sms_shop_mobile'], sprintf($msg, $order['consignee'], $order['tel']),'', 13,1);
    }

    /* 如果订单金额为0 处理虚拟卡 */
    if ($order['order_amount'] <= 0)
    {
        $sql = "SELECT goods_id, goods_name, goods_number AS num FROM ".
               $GLOBALS['ecs']->table('cart') .
                " WHERE is_real = 0 AND extension_code = 'virtual_card'".
                " AND session_id = '".SESS_ID."' AND rec_type = '$flow_type'";

        $res = $GLOBALS['db']->getAll($sql);

        $virtual_goods = array();
        foreach ($res AS $row)
        {
            $virtual_goods['virtual_card'][] = array('goods_id' => $row['goods_id'], 'goods_name' => $row['goods_name'], 'num' => $row['num']);
        }

        if ($virtual_goods AND $flow_type != CART_GROUP_BUY_GOODS)
        {
            /* 虚拟卡发货 */
            if (virtual_goods_ship($virtual_goods,$msg, $order['order_sn'], true))
            {
                /* 如果没有实体商品，修改发货状态，送积分和红包 */
                $sql = "SELECT COUNT(*)" .
                        " FROM " . $ecs->table('order_goods') .
                        " WHERE order_id = '$order[order_id]' " .
                        " AND is_real = 1";
                if ($db->getOne($sql) <= 0)
                {
                    /* 修改订单状态 */
                    update_order($order['order_id'], array('shipping_status' => SS_SHIPPED, 'shipping_time' => gmtime()));

                    /* 如果订单用户不为空，计算积分，并发给用户；发红包 */
                    if ($order['user_id'] > 0)
                    {
                        /* 取得用户信息 */
                        $user = user_info($order['user_id']);

                        /* 计算并发放积分 */
                        $integral = integral_to_give($order);
                        log_account_change($order['user_id'], 0, 0, intval($integral['rank_points']), intval($integral['custom_points']), sprintf($_LANG['order_gift_integral'], $order['order_sn']));

                        /* 发放红包 */
                        send_order_bonus($order['order_id']);
                    }
                }
            }
        }

    }
    //var_dump($order);die;

    /* 清空购物车 */
    clear_cart($flow_type);
    /* 清除缓存，否则买了商品，但是前台页面读取缓存，商品数量不减少 */
    clear_all_files();

    /* 插入支付日志 */
   // $order['log_id'] = insert_pay_log($new_order_id, $order['order_amount'], PAY_ORDER);

    /* 取得支付信息，生成支付代码 */
    // if ($order['order_amount'] > 0)
    // {
    //     $payment = payment_info($order['pay_id']);

    //     include_once(ROOT_PATH . 'includes/modules/payment/' . $payment['pay_code'] . '.php');

    //     $pay_obj    = new $payment['pay_code'];
    //     //var_dump($bankItem);die;
    //     if($bankItem != ''){
    //         $pay_online = $pay_obj->get_code($order, unserialize_config($payment['pay_config']),$bankItem);
    //     }else{
    //         $pay_online = $pay_obj->get_code($order, unserialize_config($payment['pay_config']));
    //     }
    //     $order['pay_desc'] = $payment['pay_desc'];

    //     $smarty->assign('pay_online', $pay_online);
    // }
    if(!empty($order['shipping_name']))
    {
        $order['shipping_name']=trim(stripcslashes($order['shipping_name']));
    }

    /* 订单信息 */
    //把地址配置成连接起来的详细地址
    $order['province'] = $GLOBALS['db']->getOne('select region_name from ' .$GLOBALS['ecs']->table('region'). ' where region_id = '.$order['province']);
    $order['city'] = $GLOBALS['db']->getOne('select region_name from ' .$GLOBALS['ecs']->table('region'). ' where region_id = '.$order['city']);
    $order['district'] = $GLOBALS['db']->getOne('select region_name from ' .$GLOBALS['ecs']->table('region'). ' where region_id = '.$order['district']);
    $order['country'] = $GLOBALS['db']->getOne('select region_name from ' .$GLOBALS['ecs']->table('region'). ' where region_id = '.$order['country']);
    $order['dizhi'] = $order['country'].$order['province'].$order['city'].'市'.$order['district'].$order['address'];
    //$smarty->assign('order',      $order);
    //$smarty->assign('url','2');
    //$smarty->assign('total',      $total);


    //$smarty->assign('goods_list', $cart_goods);
    //$smarty->assign('order_submit_back', sprintf($_LANG['order_submit_back'], $_LANG['back_home'], $_LANG['goto_user_center'])); // 返回提示

    user_uc_call('add_feed', array($order['order_id'], BUY_GOODS)); //推送feed到uc
    unset($_SESSION['flow_consignee']); // 清除session中保存的收货人信息
    unset($_SESSION['flow_order']);
    unset($_SESSION['direct_shopping']);
    
    $sql = "select parent_id,group_id,goods_id from " .$ecs->table('cart'). " where user_id = '$user_id' $aaa";
                $goods = $db->getRow($sql);

                
                if($goods['group_id'] && empty($goods['parent_id'])){
                    
                    $sql = "select rec_id from " .$ecs->table('cart'). " where user_id = $user_id and parent_id = '$goods[goods_id]'";
                    $gg = $db->getAll($sql);
                    
                    foreach ($gg as $key => $value) {
                        # code...
                       
                        $sql = "DELETE FROM ".$GLOBALS['ecs']->table('cart').
                        "  WHERE user_id = $user_id and rec_type = $flow_type and  rec_id= ".$value['rec_id'];
                        $GLOBALS['db']->query($sql);
                    }
                }

/* 删除购物车中的已经结算的订单商品 */
    $sql = "DELETE FROM " .$ecs->table('cart') .
            " WHERE user_id = '".$user_id."' AND rec_type = '$flow_type' $aaa";
    $db->query($sql);

    //查询该商品是否是套餐







    ajaxReturn(array('ret_code' => 10, 'msg' => '提交成功', 'data' => array()));















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
?>

