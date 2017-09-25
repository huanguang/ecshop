<?php
//APP积分兑换接口接口

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



    /* 查询：判断是否登录 */
    if ($user_id <= 0)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '请先登录', 'data' => array()));
    }

    /* 查询：取得参数：商品id */
    $goods_id = isset($_REQUEST['goods_id']) ? intval($_REQUEST['goods_id']) : 0;
    if ($goods_id <= 0)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
    }

    /* 查询：取得兑换商品信息 */
    $goods = get_exchange_goods_info($goods_id);
    if (empty($goods))
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '该商品不是积分兑换商品', 'data' => array()));
    }
    
    /* 查询：检查兑换商品是否有库存 */
    if($goods['goods_number'] == 0 && $_CFG['use_storage'] == 1)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '商品库存不足', 'data' => array()));
    }
    /* 查询：检查兑换商品是否是取消 */
    if ($goods['is_exchange'] == 0)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '该商品不是积分兑换商品', 'data' => array()));
    }

    $user_info   = get_user_info($user_id);
    $user_points = $user_info['pay_points']; // 用户的积分总数
    if ($goods['exchange_integral'] > $user_points)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '您的积分不足', 'data' => array()));
    }

    /* 查询：取得规格 */
    $specs = '';
    foreach ($_POST as $key => $value)
    {
        if (strpos($key, 'spec_') !== false)
        {
            $specs .= ',' . intval($value);
        }
    }
    $specs = trim($specs, ',');

    /* 查询：如果商品有规格则取规格商品信息 配件除外 */
    if (!empty($specs))
    {
        $_specs = explode(',', $specs);

        $product_info = get_products_info($goods_id, $_specs);
    }
    if (empty($product_info))
    {
        $product_info = array('product_number' => '', 'product_id' => 0);
    }

    //查询：商品存在规格 是货品 检查该货品库存
    // if((!empty($specs)) && ($product_info['product_number'] == 0) && ($_CFG['use_storage'] == 1))
    // {
    //     show_message($_LANG['eg_error_number'], array($_LANG['back_up_page']), array($back_act), 'error');
    // }
    
    // if((!is_spec($specs)) && ($product_info['product_number'] == 0) && ($_CFG['use_storage'] == 1))
    // {
    //     //echo 24234;die;
    //     ajaxReturn(array('ret_code' => 0, 'msg' => '商品库存不足', 'data' => array()));
    // }

    /* 查询：查询规格名称和值，不考虑价格 */
    $attr_list = array();
    $sql = "SELECT a.attr_name, g.attr_value " .
            "FROM " . $ecs->table('goods_attr') . " AS g, " .
                $ecs->table('attribute') . " AS a " .
            "WHERE g.attr_id = a.attr_id " .
            "AND g.goods_attr_id " . db_create_in($specs);
    $res = $db->query($sql);
    while ($row = $db->fetchRow($res))
    {
        $attr_list[] = $row['attr_name'] . ': ' . $row['attr_value'];
    }
    $goods_attr = join(chr(13) . chr(10), $attr_list);

    /* 更新：清空购物车中所有团购商品 */
    include_once(ROOT_PATH . 'includes/lib_order.php');
    clear_cart(CART_EXCHANGE_GOODS);

    /* 更新：加入购物车 */
    $number = 1;
    $cart = array(
        'user_id'        => $user_id,
        'session_id'     => SESS_ID,
        'goods_id'       => $goods['goods_id'],
        'product_id'     => $product_info['product_id'],
        'goods_sn'       => addslashes($goods['goods_sn']),
        'goods_name'     => addslashes($goods['goods_name']),
        'market_price'   => $goods['market_price'],
        'goods_price'    => 0,//$goods['exchange_integral']
        'goods_number'   => $number,
        'goods_attr'     => addslashes($goods_attr),
        'goods_attr_id'  => $specs,
        'is_real'        => $goods['is_real'],
        'extension_code' => addslashes($goods['extension_code']),
        'parent_id'      => 0,
        'rec_type'       => CART_EXCHANGE_GOODS,
        'is_gift'        => 0
    );
    $db->autoExecute($ecs->table('cart_info'), $cart, 'INSERT');
    $sql = "select max(rec_id) from " .$ecs->table('cart_info');
    $rec_id = $db->getOne($sql);
    ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $rec_id));
    /* 记录购物流程类型：团购 */
    // $_SESSION['flow_type'] = CART_EXCHANGE_GOODS;
    // $_SESSION['extension_code'] = 'exchange_goods';
    // $_SESSION['extension_id'] = $goods_id;

    // /* 进入收货人页面 */
    // ecs_header("Location: ./flow.php?step=checkout\n");
    // exit;


    /**
 * 获得积分兑换商品的详细信息
 *
 * @access  public
 * @param   integer     $goods_id
 * @return  void
 */
function get_exchange_goods_info($goods_id)
{
    $time = gmtime();
    $sql = 'SELECT g.*, c.measure_unit, b.brand_id, b.brand_name AS goods_brand, eg.exchange_integral, eg.is_exchange ' .
            'FROM ' . $GLOBALS['ecs']->table('goods') . ' AS g ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('exchange_goods') . ' AS eg ON g.goods_id = eg.goods_id ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('category') . ' AS c ON g.cat_id = c.cat_id ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('brand') . ' AS b ON g.brand_id = b.brand_id ' .
            "WHERE g.goods_id = '$goods_id' AND g.is_delete = 0 " .
            'GROUP BY g.goods_id';

    $row = $GLOBALS['db']->getRow($sql);

    if ($row !== false)
    {
        /* 处理商品水印图片 */
        $watermark_img = '';

        if ($row['is_new'] != 0)
        {
            $watermark_img = "watermark_new";
        }
        elseif ($row['is_best'] != 0)
        {
            $watermark_img = "watermark_best";
        }
        elseif ($row['is_hot'] != 0)
        {
            $watermark_img = 'watermark_hot';
        }

        if ($watermark_img != '')
        {
            $row['watermark_img'] =  $watermark_img;
        }

        /* 修正重量显示 */
        $row['goods_weight']  = (intval($row['goods_weight']) > 0) ?
            $row['goods_weight'] . $GLOBALS['_LANG']['kilogram'] :
            ($row['goods_weight'] * 1000) . $GLOBALS['_LANG']['gram'];

        /* 修正上架时间显示 */
        $row['add_time']      = local_date($GLOBALS['_CFG']['date_format'], $row['add_time']);

        /* 修正商品图片 */
        $row['goods_img']   = get_image_path($goods_id, $row['goods_img']);
        $row['goods_thumb'] = get_image_path($goods_id, $row['goods_thumb'], true);

        return $row;
    }
    else
    {
        return false;
    }
}