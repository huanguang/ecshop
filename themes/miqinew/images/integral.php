<?php
//APP获取积分商城接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');


$action = $_REQUEST['action']?$_REQUEST['action']:"index";//获取操作方法
$http = str_replace('api3/integral.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 
/* 查看订单列表 
	需要参数
	user_id 会员ID
	cat_id  分类ID 可选不填为所有积分商品
	integral_max 最大积分
	integral_min 最小积分
	page 页数，可选不填为 1
	size 第页显示个数 ，可选不填为 10
	sort 排序字段 默认为1  1按时间排 2按积分排
	order 排序 默认为1  1倒序 2正序
*/
if($action == "index"){
	$user_id = $_REQUEST['user_id'];//用户的ID
	if (!isset($user_id) || $user_id == 0)
	{
		ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请登陆', 'data' => array()));
	}
	$cat_id = intval($_REQUEST['cat_id'])?intval($_REQUEST['cat_id']):0;
	$integral_max = isset($_REQUEST['integral_max']) && intval($_REQUEST['integral_max']) > 0 ? intval($_REQUEST['integral_max']) : 0;
	$integral_min = isset($_REQUEST['integral_min']) && intval($_REQUEST['integral_min']) > 0 ? intval($_REQUEST['integral_min']) : 0;
	$page         = isset($_REQUEST['page'])   && intval($_REQUEST['page'])  > 0 ? intval($_REQUEST['page'])  : 1;
	$size         = isset($_CFG['page_size'])  && intval($_CFG['page_size']) > 0 ? intval($_CFG['page_size']) : 10;
	
	$sort         = intval($_REQUEST['sort']) ? intval($_REQUEST['sort']) : 1;
	$order        = intval($_REQUEST['order']) ? intval($_REQUEST['order']) : 1;
	$limit = array();
	$limit['sort'] = array('1'=>'add_time','2'=>'exchange_integral');
	$limit['order'] = array('1'=>'desc','2'=>'asc');
	$sort = $limit['sort'][$sort]?$limit['sort'][$sort]: $limit['sort'][1];
	$order = $limit['order'][$sort]?$limit['order'][$order]: $limit['order'][1];
	
	$children = get_children($cat_id);

	$count = get_exchange_goods_count($children, $integral_min, $integral_max);
	$max_page = ($count> 0) ? ceil($count / $size) : 1;
	if ($page > $max_page)
	{
		$page = $max_page;
	}


	$goods = exchange_get_goods($children,$integral_min,$integral_max,"", $size,$page,$sort,$order,'');
    
	$integral = $db->getOne("select pay_points FROM ".$ecs->table("users")." where user_id = $user_id");//用户消费积分

    //积分首页轮播图广告
    $sql = 'SELECT ad_link,ad_code FROM '.$ecs->table("ad").' WHERE position_id = 38 AND enabled = 1 LIMIT 1';
    $ad = $db->getRow($sql);
    $ad['ad_code'] = $http.'data/afficheimg/'.$ad['ad_code'];
	$list = array('goodslist'=>$goods,'integral'=>$integral,'count'=>$max_page,'page'=>$page,'ad'=>$ad);

	ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' =>$list));
	
}
/*------------------------------------------------------
//-- 积分兑换商品详情
	需要参数
	action 操作方法 view 
	goods_id 积分商品Id
	page  评论页数 可选不填为 1
------------------------------------------------------ */
elseif ($action == 'view')
{
	$goods_id = isset($_REQUEST['goods_id'])  ? intval($_REQUEST['goods_id']) : 0;
	$page = isset($_REQUEST['page'])  ? intval($_REQUEST['page']) : 1;//评论页数
	
	!$goods_id && ajaxReturn(array('ret_code' => 0, 'msg' => '参数丢失', 'data' => array()));
	
	/* 获得商品的信息 */
    $goods = get_exchange_goods_info($goods_id);

	$at = get_goods_properties($goods_id);// 获得商品的规格和属性
	$attr = $at['pro']['属性'];//商品属性
	
	$count = $db->getOne('SELECT COUNT(*) FROM ' .$ecs->table('comment')." WHERE id_value = '$goods_id' AND comment_type = '0' AND status = 1 AND parent_id = 0");//商品评论总数
	$goods['comment_count'] = $count;
	
	$comment = assign_comment($goods_id,0,$page);//商品评论

	foreach($comment['comments'] as $k=>$v ){
		$v['head_portrait'] =  $http.'data/'.$v['head_portrait'];
		$comment['comments'][$k] = $v;
	}
	$photo = get_goods_gallery($goods_id);//商品相册
    //显示是否已经收藏该商品
    $user_id = isset($_REQUEST['user_id'])  ? intval($_REQUEST['user_id']) : 0;
    if(!empty($user_id)){
        //查询该商品是否已经收藏
        /* 检查是否已经存在于用户的收藏夹 */
        $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ecs']->table('collect_goods') .
            " WHERE user_id='$user_id' AND goods_id = '$goods_id'";
        if ($GLOBALS['db']->GetOne($sql) > 0)
        {
            $sql = "SELECT rec_id FROM " .$GLOBALS['ecs']->table('collect_goods') .
            " WHERE user_id='$user_id' AND goods_id = '$goods_id'";
            $shouc_id = $GLOBALS['db']->getOne($SQL);
            $shouc = 1;
        }else{
            $shouc_id = 0;
            $shouc = 0;
        }
    }else{
        $shouc_id = 0;
        $shouc = 3;
    }

	foreach($photo as $k=>$v){
		$v['img_url'] = $http.$v['img_url'];
		$v['thumb_url'] = $http.$v['thumb_url'];
		$photo[$k] = $v;
	}

	if(!$goods){
		ajaxReturn(array('ret_code' => 0, 'msg' => '没有获取到数据', 'data' => array()));
	}

	$goodsinfo = array("info"=>$goods,"attr"=>$attr,"comment"=>$comment['comments'],'comment_page'=>$page,"photo"=>$photo,'is_shouc'=>$shouc,'rec_id'=>$shouc_id);

	ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' =>$goodsinfo));
}
/*
	兑换商品
	需要参数
	action 操作方法 buy 
	user_id 会员ID
	goods_id 商品ID
*/
elseif($action == "buy"){
	
	$user_id = $_REQUEST['user_id'];
	
	!$user_id && ajaxReturn(array('ret_code' => 0, 'msg' => '兑换需要登陆', 'data' => array()));
	
	$goods_id = $_REQUEST['goods_id'];
	
	!$goods_id && ajaxReturn(array('ret_code' => 0, 'msg' => '参数丢失', 'data' => array()));
	
	$goods = get_exchange_goods_info($goods_id);
	
	if(empty($goods)){
		ajaxReturn(array('ret_code' => 0, 'msg' => '没有找到该商品', 'data' => array()));
	}
	
	/* 查询：检查兑换商品是否是取消 */
    if ($goods['is_exchange'] == 0)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '该商品已不能兑换', 'data' => array()));
    }
	$user_info   = get_user_info($user_id);
    $user_points = $user_info['pay_points']; // 用户的积分总数
    if ($goods['exchange_integral'] > $user_points)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '您的积分不足已兑换该商品', 'data' => array()));
    }
	$product_info = array('product_number' => '', 'product_id' => 0);
	$specs = '';
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
        'user_id'        => $_SESSION['user_id'],
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
	
	if($db->autoExecute($ecs->table('cart'), $cart, 'INSERT')){

		/* 记录购物流程类型：团购 */
		$_SESSION['flow_type'] = CART_EXCHANGE_GOODS;
		$_SESSION['extension_code'] = 'exchange_goods';
		$_SESSION['extension_id'] = $goods_id;
		ajaxReturn(array('ret_code' => 1, 'msg' => '操作成功', 'data' => array()));
	}else{
		ajaxReturn(array('ret_code' => 0, 'msg' => '兑换失败', 'data' => array()));
	}
	
}




/**
 * 获得分类下的商品
 *
 * @access  public
 * @param   string  $children
 * @return  array
 */
function exchange_get_goods($children, $min, $max, $ext, $size, $page, $sort, $order,$jifen='')
{
    $http = str_replace('api3/integral.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 
	
	$display = $GLOBALS['display'];
    $where = "eg.is_exchange = 1 AND g.is_delete = 0 AND ".
             "($children OR " . get_extension_goods($children) . ')';

    if ($min > 0)
    {
        $where .= " AND eg.exchange_integral >= $min ";
    }

    if ($max > 0)
    {
        $where .= " AND eg.exchange_integral <= $max ";
    }
    if($jifen != ''){
        $where .= "and eg.exchange_integral < $jifen ";
    }

    /* 获得商品列表 */
    $sql = 'SELECT g.goods_id, g.goods_name, g.goods_name_style, eg.exchange_integral, ' .
                'g.goods_type, g.goods_brief, g.goods_thumb , g.goods_img, eg.is_hot ' .
            'FROM ' . $GLOBALS['ecs']->table('exchange_goods') . ' AS eg, ' .$GLOBALS['ecs']->table('goods') . ' AS g ' .
            "WHERE eg.goods_id = g.goods_id AND $where $ext ORDER BY $sort $order";
    $res = $GLOBALS['db']->selectLimit($sql, $size, ($page - 1) * $size);

    $arr = array();
    $arrs = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        /* 处理商品水印图片 */
        $watermark_img = '';

//        if ($row['is_new'] != 0)
//        {
//            $watermark_img = "watermark_new_small";
//        }
//        elseif ($row['is_best'] != 0)
//        {
//            $watermark_img = "watermark_best_small";
//        }
//        else
        if ($row['is_hot'] != 0)
        {
            $watermark_img = 'watermark_hot_small';
        }

        if ($watermark_img != '')
        {
            $arr['watermark_img'] =  $watermark_img;
        }

        $arr['goods_id']          = $row['goods_id'];
        if($display == 'grid')
        {
            $arr['goods_name']    = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        }
        else
        {
            $arr['goods_name']    = $row['goods_name'];
        }
        $arr['name']              = $row['goods_name'];
        $arr['goods_brief']       = $row['goods_brief'];
        $arr['goods_style_name']  = add_style($row['goods_name'],$row['goods_name_style']);
        $arr['exchange_integral'] = $row['exchange_integral'];
        $arr['type']              = $row['goods_type'];
        $arr['goods_thumb']       = $http.get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $arr['goods_img']         = $http.get_image_path($row['goods_id'], $row['goods_img']);
        $arr['url']               = build_uri('exchange_goods', array('gid'=>$row['goods_id']), $row['goods_name']);
        $arrs[] = $arr;
    }

    return $arrs;
}
/**
 * 获得分类下的商品总数
 *
 * @access  public
 * @param   string     $cat_id
 * @return  integer
 */
function get_exchange_goods_count($children, $min = 0, $max = 0, $ext='')
{
    $where  = "eg.is_exchange = 1 AND g.is_delete = 0 AND ($children OR " . get_extension_goods($children) . ')';


    if ($min > 0)
    {
        $where .= " AND eg.exchange_integral >= $min ";
    }

    if ($max > 0)
    {
        $where .= " AND eg.exchange_integral <= $max ";
    }

    $sql = 'SELECT COUNT(*) FROM ' . $GLOBALS['ecs']->table('exchange_goods') . ' AS eg, ' .
           $GLOBALS['ecs']->table('goods') . " AS g WHERE eg.goods_id = g.goods_id AND $where $ext";

    /* 返回商品总数 */
    return $GLOBALS['db']->getOne($sql);
}

/**
 * 获得积分兑换商品的详细信息
 *
 * @access  public
 * @param   integer     $goods_id
 * @return  void
 */
function get_exchange_goods_info($goods_id)
{
    $http = str_replace('api3/integral.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 
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
        $row['goods_img']   = $http.get_image_path($goods_id, $row['goods_img']);
        $row['goods_thumb'] = $http.get_image_path($goods_id, $row['goods_thumb'], true);

        return $row;
    }
    else
    {
        return false;
    }
}

