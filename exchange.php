<?php

/**
 * ECSHOP 积分商城
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: exchange.php 17217 2011-01-19 06:29:08Z liubo $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}

/*------------------------------------------------------ */
//-- act 操作项的初始化
/*------------------------------------------------------ */
if (empty($_REQUEST['act']))
{
    $_REQUEST['act'] = 'list';
}

$sql_u = 'SELECT COUNT(user_id) AS total_user FROM '.$ecs->table('users');
$total_user_num = $db->getOne($sql_u);
$smarty->assign('total_user_num', $total_user_num);//当前会员总数
   //首页全部产品分类三张
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 28 AND enabled = 1 ';
    $ad_all_fl = $db->getAll($sql);
    $smarty->assign('ad_all_fl',$ad_all_fl);
    $smarty->assign('weixin_erweoma',           $_CFG['weixin_erweoma']);       // 顶部二维码
     $smarty->assign('shouji_erweoma',           $_CFG['shouji_erweoma']);       // 顶部二维码


     $sql = 'SELECT * FROM '. $ecs->table("article").' WHERE article_id = 95';
    $wangzhan = $db->getRow($sql);
    $smarty->assign('wangzhan',$wangzhan);
    $sql = 'SELECT * FROM '. $ecs->table("article").' WHERE article_id = 94'; 
    $fuwu = $db->getRow($sql);
    $smarty->assign('fuwu',$fuwu);
    $smarty->assign('helps_footer',           get_shop_help_footer());       // 网店帮助

/*------------------------------------------------------ */
//-- PROCESSOR
/*------------------------------------------------------ */

/*------------------------------------------------------ */
//-- 积分兑换商品列表
/*------------------------------------------------------ */
if ($_REQUEST['act'] == 'list')
{
    /* 初始化分页信息 */
    $page         = isset($_REQUEST['page'])   && intval($_REQUEST['page'])  > 0 ? intval($_REQUEST['page'])  : 1;
    $size         = isset($_CFG['page_size'])  && intval($_CFG['page_size']) > 0 ? intval($_CFG['page_size']) : 10;
    $cat_id       = isset($_REQUEST['cat_id']) && intval($_REQUEST['cat_id']) > 0 ? intval($_REQUEST['cat_id']) : 0;
    $integral_max = isset($_REQUEST['integral_max']) && intval($_REQUEST['integral_max']) > 0 ? intval($_REQUEST['integral_max']) : 0;
    $integral_min = isset($_REQUEST['integral_min']) && intval($_REQUEST['integral_min']) > 0 ? intval($_REQUEST['integral_min']) : 0;

    /* 排序、显示方式以及类型 */
    $default_display_type      = $_CFG['show_order_type'] == '0' ? 'list' : ($_CFG['show_order_type'] == '1' ? 'grid' : 'text');
    $default_sort_order_method = $_CFG['sort_order_method'] == '0' ? 'DESC' : 'ASC';
    $default_sort_order_type   = $_CFG['sort_order_type'] == '0' ? 'goods_id' : ($_CFG['sort_order_type'] == '1' ? 'exchange_integral' : 'last_update');

    $sort    = (isset($_REQUEST['sort'])  && in_array(trim(strtolower($_REQUEST['sort'])), array('goods_id', 'exchange_integral', 'last_update'))) ? trim($_REQUEST['sort'])  : $default_sort_order_type;
    $order   = (isset($_REQUEST['order']) && in_array(trim(strtoupper($_REQUEST['order'])), array('ASC', 'DESC')))                              ? trim($_REQUEST['order']) : $default_sort_order_method;
    $display = (isset($_REQUEST['display']) && in_array(trim(strtolower($_REQUEST['display'])), array('list', 'grid', 'text'))) ? trim($_REQUEST['display'])  : (isset($_COOKIE['ECS']['display']) ? $_COOKIE['ECS']['display'] : $default_display_type);
    $display  = in_array($display, array('list', 'grid', 'text')) ? $display : 'text';
    setcookie('ECS[display]', $display, gmtime() + 86400 * 7);

    /* 页面的缓存ID */
    $cache_id = sprintf('%X', crc32($cat_id . '-' . $display . '-' . $sort  .'-' . $order  .'-' . $page . '-' . $size . '-' . $_SESSION['user_rank'] . '-' .
        $_CFG['lang'] . '-' . $integral_max . '-' .$integral_min));

    if (!$smarty->is_cached('exchange.dwt', $cache_id))
    {
        /* 如果页面没有被缓存则重新获取页面的内容 */

        $children = get_children($cat_id);

        $cat = get_cat_info($cat_id);   // 获得分类的相关信息

        if (!empty($cat))
        {
            $smarty->assign('keywords',    htmlspecialchars($cat['keywords']));
            $smarty->assign('description', htmlspecialchars($cat['cat_desc']));
        }

        assign_template();

        $position = assign_ur_here('exchange');
        $smarty->assign('page_title',       $position['title']);    // 页面标题
        $smarty->assign('ur_here',          $position['ur_here']);  // 当前位置
        $smarty->assign('helps_footer',           get_shop_help_footer());       // 网店帮助
        $smarty->assign('categories',       get_categories_tree());        // 分类树
		$smarty->assign('categories_pro',  get_categories_tree_pro()); // 分类树加强版
        $smarty->assign('helps',            get_shop_help());              // 网店帮助
        $smarty->assign('top_goods',        get_top10());                  // 销售排行
        $smarty->assign('promotion_info',   get_promotion_info());         // 促销活动信息

        //2015-11-24 积分商城广告
    $sql = 'SELECT * FROM '.$ecs->table("ad").' WHERE position_id = 38 AND enabled = 1 LIMIT 1';
    $ad = $db->getRow($sql);
    $smarty->assign('ad',$ad);

        /* 调查 */
        $vote = get_vote();
        if (!empty($vote))
        {
            $smarty->assign('vote_id',     $vote['id']);
            $smarty->assign('vote',        $vote['content']);
        }

        $ext = ''; //商品查询条件扩展

        //$smarty->assign('best_goods',      get_exchange_recommend_goods('best', $children, $integral_min, $integral_max));
        //$smarty->assign('new_goods',       get_exchange_recommend_goods('new',  $children, $integral_min, $integral_max));
        $smarty->assign('hot_goods',       get_exchange_recommend_goods('hot',  $children, $integral_min, $integral_max));


        $count = get_exchange_goods_count($children, $integral_min, $integral_max);
        $max_page = ($count> 0) ? ceil($count / $size) : 1;
        if ($page > $max_page)
        {
            $page = $max_page;
        }
        $sousuo = '';
        if(!empty($_POST['sech'])){
            $sousuo = $_POST['sech'];
        }
        $goodslist = exchange_get_goods($children, $integral_min, $integral_max, $ext, $size, $page, $sort, $order,$sousuo);
        if($display == 'grid')
        {
            if(count($goodslist) % 2 != 0)
            {
                $goodslist[] = array();
            }
        }
        $where = '';
        if($_SESSION['user_id']){
            $where = ' where a.user_id = ' .$_SESSION['user_id'];
        }
        //查询最新中奖记录
        $sql = " select a.user_id,b.goods_id from ".$ecs->table("lottery_user")." as a left JOIN ".$ecs->table("lottery"). " as b on a.lid = b.id" .$where. " ORDER BY a.id desc";
        $zhongjiang = $db->getAll($sql);
        foreach ($zhongjiang as $key => $value) {
            $sql = " select user_name from ".$ecs->table("users")." where user_id = ".$value['user_id'];
            $user = $db->getOne($sql);
            $zhongjiang[$key]['user_name'] = $user;
            //查询获奖的商品名称
            $sql = " select goods_name from ".$ecs->table("goods")." where goods_id = ".$value['goods_id'];
            $goods = $db->getOne($sql);
            $zhongjiang[$key]['goods_name'] = $goods;
        }
        
        $smarty->assign('zhongjiang',       $zhongjiang);
        $smarty->assign('goods_list',       $goodslist);
        $smarty->assign('category',         $cat_id);
        $smarty->assign('integral_max',     $integral_max);
        $smarty->assign('integral_min',     $integral_min);
         $smarty->assign('user_id', $_SESSION['user_id']);

        assign_pager('exchange',            $cat_id, $count, $size, $sort, $order, $page, '', '', $integral_min, $integral_max, $display); // 分页
        assign_dynamic('exchange_list'); // 动态内容
    }

    $sousuo_e = '';
        if(!empty($_POST['sech'])){
            $sousuo_q = $_POST['sech'];
            $sousuo_e = "and duihuanjifen < '$sousuo_q'";
            $smarty->assign('sech',$sousuo_q);
        }
        //查询优惠券类型
    $sql =" select * from ".$ecs->table('bonus_type'). " where type_id > 9 ".$sousuo_e;
    $type = $db->getAll($sql);
    $smarty->assign('type',$type);

    $smarty->assign('feed_url',         ($_CFG['rewrite'] == 1) ? "feed-typeexchange.xml" : 'feed.php?type=exchange'); // RSS URL
    $smarty->display('exchange_list.dwt', $cache_id);
}
elseif ($_REQUEST['act'] == 'duihuan')
{
    $type_id = $_POST['type_id'];
    $user_id = $_SESSION['user_id'];
    $time = time();
    if($user_id <= '0'){
        $add =  array('error' => '0', );
        echo json_encode($add);die;
    }
    //查询该用户是否有足够的积分兑换该优惠券
    $sql = " select pay_points from ".$ecs->table('users'). " where user_id = ".$user_id;
    $pay_points = $db->getOne($sql);
    //查询该用户是否有足够的积分兑换该优惠券
    $sql = " select duihuanjifen from ".$ecs->table('bonus_type'). " where type_id = ".$type_id;
    $duihuanjifen = $db->getOne($sql);
    if($pay_points < $duihuanjifen){
        $add =  array('error' => '1', );
        echo json_encode($add);die;

    }
    //查询用户本月是否有兑换过该优惠券
    //获取当前月份
    $days = date("m");
    $nian = date("Y");
    //获取当前月份的天数
    $tianshu = cal_days_in_month(CAL_GREGORIAN, $days, $nian);
    //判断用户有没有兑换优惠券
    //拿到本月第一天的
     $kaishi = strtotime(date('Y-m'));
     $jiesu = $kaishi+(60*60*24*$tianshu);
    $sql = " select * from ".$ecs->table('user_bonus'). " where bonus_type_id = $type_id and add_time > $kaishi and add_time < $jiesu";
    $shi = $db->getRow($sql);
    if($shi){
        $add =  array('error' => '4', );
        echo json_encode($add);die;
    }
    //条件满足，为用户添加优惠券
    $sql = "insert into ".$ecs->table('user_bonus')."(bonus_type_id,bonus_sn,user_id,used_time,order_id,emailed,add_time) values($type_id,0,$user_id,0,0,1,$time)";
    if($db->query($sql)){
        //增加消费记录
        if(checkuserpoint($user_id,$duihuanjifen,'积分兑换优惠券') == "-1")
        {
            echo json_encode($res = array('error' => '-1'));die;
        }
        $add =  array('error' => '2', );
        echo json_encode($add);die;

    }else{
        $add =  array('error' => '3', );
        echo json_encode($add);die;
    }
}
/*------------------------------------------------------ */
//-- 积分兑换商品详情
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'view')
{
    $goods_id = isset($_REQUEST['id'])  ? intval($_REQUEST['id']) : 0;

    $cache_id = $goods_id . '-' . $_SESSION['user_rank'] . '-' . $_CFG['lang'] . '-exchange';
    $cache_id = sprintf('%X', crc32($cache_id));
    $linked_goods = get_linked_goods($goods_id);
    if (!$smarty->is_cached('exchange_goods.dwt', $cache_id))
    {
        $smarty->assign('image_width',  $_CFG['image_width']);
        $smarty->assign('image_height', $_CFG['image_height']);
        $smarty->assign('helps',        get_shop_help()); // 网店帮助
        $smarty->assign('id_a',           $goods_id);
        $smarty->assign('type',         0);
        $smarty->assign('cfg',          $_CFG);

        /* 获得商品的信息 */
        $goods = get_exchange_goods_info($goods_id);

        if ($goods === false)
        {
            /* 如果没有找到任何记录则跳回到首页 */
            ecs_header("Location: ./\n");
            exit;
        }
        else
        {
            if ($goods['brand_id'] > 0)
            {
                $goods['goods_brand_url'] = build_uri('brand', array('bid'=>$goods['brand_id']), $goods['goods_brand']);
            }
            $properties = get_goods_properties($goods_id);  // 获得商品的规格和属性
            $goods['goods_style_name'] = add_style($goods['goods_name'], $goods['goods_name_style']);
            //var_dump($goods);die;
            //统计该商品的所有品论信息
            $sql =" select count(comment_id) from ".$ecs->table('comment')." where id_value = ".$goods_id;
            $id = $db->getOne($sql);
            $smarty->assign('goods_commen',              $id);
            $smarty->assign('goods',              $goods);
            $smarty->assign('comment_percent',     comment_percent($goods_id));
            $smarty->assign('xiaoliang', get_goods_count($goods_id));
            //var_dump($goods);die;
            $smarty->assign('specification',       $properties['spe']);      
            $smarty->assign('goods_id',           $goods['goods_id']);
            $smarty->assign('categories',         get_categories_tree());  // 分类树

            //统计用户购买了这个商品之后还购买了店里的其他商品
    $sql = " select distinct(b.user_id) from ".$ecs->table('order_goods'). " as a left JOIN ".$ecs->table('order_info')." as b on a.order_id = b.order_id where a.goods_id = '$goods_id'";
    $user_id = $db->getAll($sql);
    
    foreach ($user_id as $key => $value) {
        //查询用户还购买的其他的
        $sql = " select distinct(a.goods_id) from ".$ecs->table('order_goods'). " as a left JOIN ".$ecs->table('order_info')." as b on a.order_id = b.order_id where a.goods_id != '$goods_id' and b.user_id = ".$value['user_id'];
        //$sql = " select goods_id from " .$ecs->table('order_goods'). " where u_id = ".$value['user_id'];
        $ids = $db->getAll($sql);
        foreach ($ids as $keys => $value) {
            $sql = " select * from ".$ecs->table('goods')." where goods_id = ".$value['goods_id'];
            $goods_list = $db->getAll($sql);
            $ids[$keys]['goods_list'] = $goods_list;
        }
        $user_id[$key]['ass'] = $ids;
        
    }
    //var_dump($user_id[0]['ass'][0]['goods_list']);die;
    $smarty->assign('user_id', $user_id);

            /* meta */
            $smarty->assign('keywords',           htmlspecialchars($goods['keywords']));
            $smarty->assign('description',        htmlspecialchars($goods['goods_brief']));

            assign_template();

            /* 上一个商品下一个商品 */
            $sql = "SELECT eg.goods_id FROM " .$ecs->table('exchange_goods'). " AS eg," . $GLOBALS['ecs']->table('goods') . " AS g WHERE eg.goods_id = g.goods_id AND eg.goods_id > " . $goods['goods_id'] . " AND eg.is_exchange = 1 AND g.is_delete = 0 LIMIT 1";
            $prev_gid = $db->getOne($sql);
            if (!empty($prev_gid))
            {
                $prev_good['url'] = build_uri('exchange_goods', array('gid' => $prev_gid), $goods['goods_name']);
                $smarty->assign('prev_good', $prev_good);//上一个商品
            }

            $sql = "SELECT max(eg.goods_id) FROM " . $ecs->table('exchange_goods') . " AS eg," . $GLOBALS['ecs']->table('goods') . " AS g WHERE eg.goods_id = g.goods_id AND eg.goods_id < ".$goods['goods_id'] . " AND eg.is_exchange = 1 AND g.is_delete = 0";
            $next_gid = $db->getOne($sql);
            if (!empty($next_gid))
            {
                $next_good['url'] = build_uri('exchange_goods', array('gid' => $next_gid), $goods['goods_name']);
                $smarty->assign('next_good', $next_good);//下一个商品
            }

            /* current position */
            $position = assign_ur_here('exchange', $goods['goods_name']);
            $smarty->assign('page_title',          $position['title']);                    // 页面标题
            $smarty->assign('ur_here',             $position['ur_here']);                  // 当前位置
            $smarty->assign('related_goods',       $linked_goods);                                   // 关联商品

            $properties = get_goods_properties($goods_id);  // 获得商品的规格和属性
            $smarty->assign('properties',          $properties['pro']);                              // 商品属性
            $smarty->assign('specification',       $properties['spe']);                              // 商品规格
            //var_dump(get_goods_gallery($goods_id));die;
            $smarty->assign('pictures',            get_goods_gallery($goods_id));                    // 商品相册

            assign_dynamic('exchange_goods');
        }
    }

    $smarty->display('exchange_goods.dwt',      $cache_id);
}
/*------------------------------------------------------ */
//--  抽奖
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'try')
{ 
include_once('includes/lib_clips.php');
    include_once('includes/lib_payment.php'); 
    include_once('includes/lib_order.php');
    //判断用户积分是否足够
    $user_id = $_SESSION['user_id'];
    //用户抽中的实物奖品，直接给用户插入一条已付款订单
            
            

    if(checkuserpoint($user_id,10,'积分抽奖') == "-1")
        {
            echo json_encode($res = array('error' => '-1'));die;
        }
        
            //var_dump(mysql_insert_id());die;
    $sql = "SELECT l.*,(select goods_name from ".$GLOBALS['ecs']->table('goods')." as g where g.goods_id=l.goods_id) as goods_name ".
            ",(select goods_thumb from ".$GLOBALS['ecs']->table('goods')." as g where g.goods_id=l.goods_id) as goods_thumb ".
            "FROM ".$GLOBALS['ecs']->table('lottery'). " as l left join ".$GLOBALS['ecs']->table('lottery_group')." as lg on l.lg=lg.id where l.status=1 and  (l.total-l.outnum)>0";
    $goods = $db->getAll($sql);
    
    $as = "";


    
    $user_id = isset($_SESSION['user_id'])?$_SESSION['user_id']:0;;

    //查询中奖信息
        foreach ($goods as $key => $value) {
            $suiji = rand(1,$value['pro']);
            if($value['winnum'] == $suiji){
                $num = ReduceNumber($value['id'], $_SESSION['user_id']);
                if($num == "0"){
                    echo json_encode($res = array('error' => 0));die;
                }

                $res = $value;
                break;
            }
        }
        if(empty($res)){
            $res['error'] = 1;
        }else{
            $res['error'] = 2;
        }
        

        switch($res['lg']){
            case 1: 
                
                $d = rand(55,85);
                $res["info"] = array("type"=>1,"jiaodu"=>$d,"xinxi"=>$res['goods_name']);
                break;
            case 2: 
                $dd[1] = rand(57,89);
                $dd[2] = rand(272,302);
                $d = rand(1,2);
                $res["info"] = array("type"=>2,"jiaodu"=>$dd[$d],"xinxi"=>$res['goods_name']);
                break;
            case 3: 
                $d = rand(93,120);
                $res["info"] = array("type"=>3,"jiaodu"=>$d,"xinxi"=>$res['goods_name']);
                break;
            case 4: 
                $d = rand(310,340);
                $res["info"] = array("type"=>4,"jiaodu"=>$d,"xinxi"=>$res['goods_name']);
                break;
            case 5: 
                $d = rand(344 ,360);
                $res["info"] = array("type"=>5,"jiaodu"=>$d,"xinxi"=>$res['goods_name']);
                break;
            case 6: 
                $d = rand(203 ,230);
                $res["info"] = array("type"=>6,"jiaodu"=>$d,"xinxi"=>$res['goods_name']);
                break;
            default:
                $dd[1] = rand(131,162);
                $dd[2] = rand(18,40);
                $dd[3] = rand(229,259);
                $d = rand(1 ,3);
                $res["info"] = array("type"=>0,"jiaodu"=>$dd[$d],"xinxi"=>'谢谢参与');
        }
        //判断抽中的奖品是虚拟的还是实物
        //一等奖    用户抽奖中的是实物奖品
        if($res['lg'] == '1'){
            //用户抽中的实物奖品，直接给用户插入一条已付款订单
            
            //查询用户默认地址
            $sql = " select * from " .$GLOBALS['ecs']->table('user_address'). " where user_id = ".$user_id." LIMIT 1"; //查询用户收货地址
            $address = $GLOBALS['db']->getRow($sql);
            //$address = $GLOBALS['db']->getRow($sql);
            
            $order = $address;
            $order['order_sn'] = get_order_sn();//生成一个新的订单号
            $order['order_status'] = '1';
            $order['pay_time'] = time();
            $order['confirm_time'] = time();
            $order['add_time'] = time();
            $order['shipping_status'] = '0';
            $order['pay_status'] = '2';
            $order['user_id'] = $user_id;
        $GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('order_info'), $order, 'INSERT'); //插入订单表
            $inesrt_id = mysql_insert_id();//获取刚插入行的自增id
            //插入订单商品
            $sql = " select goods_name,goods_id,goods_sn,market_price,goods_price, from ".$GLOBALS['ecs']->table('goods')." where goods_id = ".$res['goods_id'];
            $goods = $GLOBALS['db']->getRow($sql);
            $goods['order_id'] = $inesrt_id;
            $GLOBALS['db']->autoExecute($GLOBALS['ecs']->table('order_goods'), $goods, 'INSERT'); //插入订单商品


        }
        //二等奖    用户抽奖中的是实物奖品（精美礼品）
        if($res['lg'] == '2'){
            //精美礼品有客户后台自行发货，不需要任何操作
        }
        //三等奖    用户抽奖中的是实物奖品（优惠券20）
        if($res['lg'] == '3'){
            //给用户添加优惠券
            $sql =" insert into ".$GLOBALS['ecs']->table('user_bonus'). " (bonus_type_id,user_id,emailed) values(22,$user_id,1)";
            $GLOBALS['db']->query($sql);
        }
        //四等奖    用户抽奖中的是实物奖品（优惠券10）
        if($res['lg'] == '4'){
            //给用户添加优惠券
            $sql =" insert into ".$GLOBALS['ecs']->table('user_bonus'). " (bonus_type_id,user_id,emailed) values(21,$user_id,1)";
            $GLOBALS['db']->query($sql);
        }
        //五等奖    用户抽奖中的是实物奖品（积分30）
        if($res['lg'] == '5'){
            //修改用户积分总额度
            get_exchange_lntegral_winningt($user_id,30);
        }
        //六等奖    用户抽奖中的是实物奖品（积分20）
        if($res['lg'] == '6'){
            get_exchange_lntegral_winningt($user_id,20);
        }

    echo json_encode($res);die;

        
    // require(ROOT_PATH . 'includes/cls_json.php');
    // $json   = new JSON;
    // $result = array('error' => 0, 'message' => '', 'content' => '', 'id' => 0, 'credit' => 0,'win'=>0);
    // $_REQUEST['cmt'] = json_str_iconv($_REQUEST['cmt']);
    // $cmt  = $json->decode($_REQUEST['cmt']);
    // $id = $cmt->id;
    // $pro = $cmt->pro;
    // $winnum = $cmt->winnum;
    // $user_id = $cmt->user_id;
    // $point = $cmt->point;
    
    // if($pro <= 0 || $winnum <= 0 || $winnum > $pro || $user_id < 1)
    // {
    //     $result['error']   = 1;
    //     $result['message'] = "服务器感到很大压力,出问题了.";
    // }
    // else
    // {
    //     //检测用户是否拥有足够的积分
    //     if(checkuserpoint($user_id, $point) == "-1")
    //     {
    //         $result['error']   = -1;
    //         $content = "<br/><br/><br/><font size=\"+5\" color=\"#0033CC\">你的积分不足拉,快去挣取积分吧...</font><br/><br/><br/><br/>";
    //     }
    //     else
    //     {
    //         srand(seed());
            
    //         $randnum = rand(1, $pro);           
    //         if($randnum == $winnum)//中奖了
    //         {   
    //             //先检查库存,再减少库存
    //             $num = ReduceNumber($id, $user_id);
    //             if($num == "0")
    //             {
    //                 $randnum = $randnum + 1;
    //                 //$content = "你的号码:".$randnum."<br/>";
    //                 $result['error']   = 1;
    //                 $content = "没有中奖唉~";
    //             }
    //             else
    //             {
    //                 //$content = "你的号码:".$randnum."<br/>";
    //                 $result['error']   = 0; 
    //                 $result['wid']   = $num;        
    //                 $content = "恭喜您中奖了!!写下您获奖感言索取奖品吧..<br/>
    //                 ";
    //             }
    //             clear_cache_files('lottery');
    //         }
    //         else
    //         {
    //             //$content = "你的号码:".$randnum."<br/>";
    //             $result['error']   = 1;
    //             $content = "没有中奖唉~";
    //         }
    //         $content .="<br/>";
    //         $sql = "update ".$GLOBALS['ecs']->table('lottery')." set click=click+1 where id='".$id."'";
    //         $GLOBALS['db']->query($sql);
    //     }
    //     $result['credit'] = getusercredit($user_id);
    // //  $result['content'] = $content;
    //     $result['message'] = $content;
    //     $result['id'] = $id;
    // }
    // die($json->encode($result));

    //echo 1;
}

/*------------------------------------------------------ */
//--  兑换
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'buy')
{
    /* 查询：判断是否登录 */
    if (!isset($back_act) && isset($GLOBALS['_SERVER']['HTTP_REFERER']))
    {
        $back_act = strpos($GLOBALS['_SERVER']['HTTP_REFERER'], 'exchange') ? $GLOBALS['_SERVER']['HTTP_REFERER'] : './index.php';
    }

    /* 查询：判断是否登录 */
    if ($_SESSION['user_id'] <= 0)
    {
        show_message($_LANG['eg_error_login'], array($_LANG['back_up_page']), array($back_act), 'error');
    }

    /* 查询：取得参数：商品id */
    $goods_id = isset($_POST['goods_id']) ? intval($_POST['goods_id']) : 0;
    if ($goods_id <= 0)
    {
        ecs_header("Location: ./\n");
        exit;
    }

    /* 查询：取得兑换商品信息 */
    $goods = get_exchange_goods_info($goods_id);
    if (empty($goods))
    {
        ecs_header("Location: ./\n");
        exit;
    }
    /* 查询：检查兑换商品是否有库存 */
    if($goods['goods_number'] == 0 && $_CFG['use_storage'] == 1)
    {
        show_message($_LANG['eg_error_number'], array($_LANG['back_up_page']), array($back_act), 'error');
    }
    /* 查询：检查兑换商品是否是取消 */
    if ($goods['is_exchange'] == 0)
    {
        show_message($_LANG['eg_error_status'], array($_LANG['back_up_page']), array($back_act), 'error');
    }

    $user_info   = get_user_info($_SESSION['user_id']);
    $user_points = $user_info['pay_points']; // 用户的积分总数
    if ($goods['exchange_integral'] > $user_points)
    {
        show_message($_LANG['eg_error_integral'], array($_LANG['back_up_page']), array($back_act), 'error');
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
    if((!is_spec($specs)) && ($product_info['product_number'] == 0) && ($_CFG['use_storage'] == 1))
    {
        //echo 24234;die;
        show_message($_LANG['eg_error_number'], array($_LANG['back_up_page']), array($back_act), 'error');
    }

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
    $db->autoExecute($ecs->table('cart'), $cart, 'INSERT');

    /* 记录购物流程类型：团购 */
    $_SESSION['flow_type'] = CART_EXCHANGE_GOODS;
    $_SESSION['extension_code'] = 'exchange_goods';
    $_SESSION['extension_id'] = $goods_id;

    /* 进入收货人页面 */
    ecs_header("Location: ./flow.php?step=checkout\n");
    exit;
}

/*------------------------------------------------------ */
//-- PRIVATE FUNCTION
/*------------------------------------------------------ */

/**
 * 获得分类的信息
 *
 * @param   integer $cat_id
 *
 * @return  void
 */
function get_cat_info($cat_id)
{
    return $GLOBALS['db']->getRow('SELECT keywords, cat_desc, style, grade, filter_attr, parent_id FROM ' . $GLOBALS['ecs']->table('category') .
        " WHERE cat_id = '$cat_id'");
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
            $arr[$row['goods_id']]['watermark_img'] =  $watermark_img;
        }

        $arr[$row['goods_id']]['goods_id']          = $row['goods_id'];
        if($display == 'grid')
        {
            $arr[$row['goods_id']]['goods_name']    = $GLOBALS['_CFG']['goods_name_length'] > 0 ? sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        }
        else
        {
            $arr[$row['goods_id']]['goods_name']    = $row['goods_name'];
        }
        $arr[$row['goods_id']]['name']              = $row['goods_name'];
        $arr[$row['goods_id']]['goods_brief']       = $row['goods_brief'];
        $arr[$row['goods_id']]['goods_style_name']  = add_style($row['goods_name'],$row['goods_name_style']);
        $arr[$row['goods_id']]['exchange_integral'] = $row['exchange_integral'];
        $arr[$row['goods_id']]['type']              = $row['goods_type'];
        $arr[$row['goods_id']]['goods_thumb']       = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $arr[$row['goods_id']]['goods_img']         = get_image_path($row['goods_id'], $row['goods_img']);
        $arr[$row['goods_id']]['url']               = build_uri('exchange_goods', array('gid'=>$row['goods_id']), $row['goods_name']);
    }

    return $arr;
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
 * 获取用户积分，并增加中奖积分，添加积分记录
 *
 * @access  public
 * @param   string     $cat_id
 * @return  integer
 */
function get_exchange_lntegral_winningt($user_id,$jifen)
{
    //查询用户积分
    $sql = " select pay_points from ". $GLOBALS['ecs']->table('users') ." where user_id = ".$user_id;
    $user = $GLOBALS['db']->getRow($sql);
    //增加用户获奖的积分
    //用户积分总额
    $zong = $user['pay_points'] + $jifen;
    $sql = "update ". $GLOBALS['ecs']->table('users') . " set pay_points = ".$zong." where user_id = ".$user_id;
    $GLOBALS['db']->query($sql);
    //增加积分记录
    $shijian = time();
    $sql = "insert into ".$GLOBALS['ecs']->table('account_log')." (user_id,pay_points,change_time,change_desc,change_type) values($user_id,'$jifen',$shijian,'积分抽奖中奖',2)";
        $GLOBALS['db']->query($sql);

    /* 返回商品总数 */
    return 1;
}

/**
 * 获得指定分类下的推荐商品
 *
 * @access  public
 * @param   string      $type       推荐类型，可以是 best, new, hot, promote
 * @param   string      $cats       分类的ID
 * @param   integer     $min        商品积分下限
 * @param   integer     $max        商品积分上限
 * @param   string      $ext        商品扩展查询
 * @return  array
 */
function get_exchange_recommend_goods($type = '', $cats = '', $min =0,  $max = 0, $ext='')
{
    $price_where = ($min > 0) ? " AND g.shop_price >= $min " : '';
    $price_where .= ($max > 0) ? " AND g.shop_price <= $max " : '';

    $sql =  'SELECT g.goods_id, g.goods_name, g.goods_name_style, eg.exchange_integral, ' .
                'g.goods_brief, g.goods_thumb, goods_img, b.brand_name ' .
            'FROM ' . $GLOBALS['ecs']->table('exchange_goods') . ' AS eg ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('goods') . ' AS g ON g.goods_id = eg.goods_id ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('brand') . ' AS b ON b.brand_id = g.brand_id ' .
            'WHERE eg.is_exchange = 1 AND g.is_delete = 0 ' . $price_where . $ext;
    $num = 0;
    $type2lib = array('best'=>'exchange_best', 'new'=>'exchange_new', 'hot'=>'exchange_hot');
    $num = get_library_number($type2lib[$type], 'exchange_list');

    switch ($type)
    {
        case 'best':
            $sql .= ' AND eg.is_best = 1';
            break;
        case 'new':
            $sql .= ' AND eg.is_new = 1';
            break;
        case 'hot':
            $sql .= ' AND eg.is_hot = 1';
            break;
    }

    if (!empty($cats))
    {
        $sql .= " AND (" . $cats . " OR " . get_extension_goods($cats) .")";
    }
    $order_type = $GLOBALS['_CFG']['recommend_order'];
    $sql .= ($order_type == 0) ? ' ORDER BY g.sort_order, g.last_update DESC' : ' ORDER BY RAND()';
    $res = $GLOBALS['db']->selectLimit($sql, $num);

    $idx = 0;
    $goods = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $goods[$idx]['id']                = $row['goods_id'];
        $goods[$idx]['name']              = $row['goods_name'];
        $goods[$idx]['brief']             = $row['goods_brief'];
        $goods[$idx]['brand_name']        = $row['brand_name'];
        $goods[$idx]['short_name']        = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                                sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        $goods[$idx]['exchange_integral'] = $row['exchange_integral'];
        $goods[$idx]['thumb']             = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $goods[$idx]['goods_img']         = get_image_path($row['goods_id'], $row['goods_img']);
        $goods[$idx]['url']               = build_uri('exchange_goods', array('gid' => $row['goods_id']), $row['goods_name']);

        $goods[$idx]['short_style_name']  = add_style($goods[$idx]['short_name'], $row['goods_name_style']);
        $idx++;
    }

    return $goods;
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

/**
 *获取抽奖商品
 *$lg 所在组别
*/
function getlotterylist($type = 0)
{
    if($type > 0)
    {
        $sql = "SELECT l.*,(select goods_name from ".$GLOBALS['ecs']->table('goods')." as g where g.goods_id=l.goods_id) as goods_name ".
            ",(select goods_thumb from ".$GLOBALS['ecs']->table('goods')." as g where g.goods_id=l.goods_id) as goods_thumb ".
            "FROM ".$GLOBALS['ecs']->table('lottery'). " as l left join ".$GLOBALS['ecs']->table('lottery_group')." as lg on l.lg=lg.id where l.status=1 and  (l.total-l.outnum)>0 and lg.type='".$type."'";
    }
    else
    {
        $sql = "SELECT l.*,(select goods_name from ".$GLOBALS['ecs']->table('goods')." as g where g.goods_id=l.goods_id) as goods_name ".
            ",(select goods_thumb from ".$GLOBALS['ecs']->table('goods')." as g where g.goods_id=l.goods_id) as goods_thumb ".
            "FROM ".$GLOBALS['ecs']->table('lottery'). " as l left join ".$GLOBALS['ecs']->table('lottery_group')." as lg on l.lg=lg.id  where l.status=1 and  (l.total-l.outnum)>0";
    }
    $res = $GLOBALS['db']->getAll($sql);
    $lottery_list = array();
    foreach ($res AS $row)
    {
        $row['shop_price']   = price_format($row['shop_price']);
        $row['thumb']        = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $row['url']          = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
        $row['proper'] = round(floatval(1.00/$row['pro'])*100,3);
        $lottery_list[] = $row;
    }
    return $lottery_list;
}
/**
 *获取中奖列表
*/
function getwinlist($size = 3, $page = 1)
{
    $sql = "select lu.*,l.goods_id,l.shop_price,(select goods_name from ".$GLOBALS['ecs']->table('goods')." as g where g.goods_id=l.goods_id) as goods_name ".
        ",(select goods_thumb from ".$GLOBALS['ecs']->table('goods')." as g where g.goods_id=l.goods_id) as goods_thumb ".
        ",(select user_name from ".$GLOBALS['ecs']->table('users')." as u where u.user_id=lu.user_id) as user_name ".
        " from ".$GLOBALS['ecs']->table('lottery_user') . "as lu left join " .$GLOBALS['ecs']->table('lottery') . " as l on l.id=lu.lid where 1=1 order by lu.id desc ";
    $res = $GLOBALS['db']->selectLimit($sql, $size, ($page - 1) * $size);
    $win_list = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $row['wintime'] = local_date("Y-m-d H:i:s", $row['wintime']);
        $row['gettime'] = local_date("Y-m-d H:i:s", $row['gettime']);
        $row['goods_thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $row['speech'] = $row['speech'] == "" ? "无" : $row['speech'];
        $win_list[] = $row;
    }
    return $win_list;
}
/**
 *中奖了,,减少库存,,加入中奖列表,返回0表示抽奖完毕了
*/
function ReduceNumber($id, $user_id)
{
    //先检查库存是否正确
    $sql = "select 1 from ".$GLOBALS['ecs']->table('lottery')." where id='".$id."' and (total-outnum)>0 and status=1";
    $num = $GLOBALS['db']->getOne($sql);
    if($num)
    {
        $sql = "update ".$GLOBALS['ecs']->table('lottery')." set outnum=outnum+1 where id='".$id."'";
        $GLOBALS['db']->query($sql);
        $sql = "insert into ".$GLOBALS['ecs']->table('lottery_user')." (lid, user_id, status, remark,speech,wintime) values('".$id."','".$user_id."','0','','无','".local_strtotime(date("Y-m-d H:i:s", time()+8*3600))."')";
        $GLOBALS['db']->query($sql);
        $id = $GLOBALS['db']->insert_id();
        //是否还有抽奖数量
        $sql = "select 1 from ".$GLOBALS['ecs']->table('lottery')." where id='".$id."' and total=outnum";
        $num = $GLOBALS['db']->getOne($sql);
        if($num)
        {
            $sql = "update ".$GLOBALS['ecs']->table('lottery')." set status=2 where id='".$id."'";
            $GLOBALS['db']->query($sql);
        }
        return $id;
    }
    else
    {
        return "0";
    }
    
}
/**
 *检测用户是否拥有足够的积分
*/
function checkuserpoint($user_id, $point,$msg)
{
    $sql = "select 1 from ".$GLOBALS['ecs']->table('users')." where user_id='$user_id' and pay_points>=$point";
    $num = $GLOBALS['db']->getOne($sql);
    if($num)
    {   
        //足够的话要减少积分
        $sql = "update ".$GLOBALS['ecs']->table('users')." set pay_points=pay_points-$point where user_id='$user_id'";
        $GLOBALS['db']->query($sql);
        //并增加消费记录
        $shijian = time();
        $sql = "insert into ".$GLOBALS['ecs']->table('account_log')." (user_id,pay_points,change_time,change_desc,change_type) values($user_id,-$point,$shijian,'$msg',2)";
        $GLOBALS['db']->query($sql);
        return "1";
    }
    return "-1";
}
/**
 *获取用户拥有的积分
*/
function getusercredit($user_id)
{
    $sql = "select pay_points from ".$GLOBALS['ecs']->table('users')." where user_id='$user_id'";
    return $GLOBALS['db']->getOne($sql);
}
/**
 *获取中奖用户总数
*/
function gettotallu()
{
    $sql = "select count(*) from ".$GLOBALS['ecs']->table('lottery_user');
    return $GLOBALS['db']->getOne($sql);
}
/**
 *提交获奖感言
*/
function submitmyspeech($cmt, $user_id)
{
    require_once(ROOT_PATH . 'includes/lib_order.php');
    
    $id       = $cmt->id;
    $speech   = $cmt->speech;
    $address  = $cmt->address;
    $tel      = $cmt->tel;
    $name     = $cmt->name;
    $province = $cmt->province;
    $city     = $cmt->city;
    $district = $cmt->district;
    $email    = $cmt->email;
    $goods_id = $cmt->goods_id;
    
    //下订单
    $order_sn = get_order_sn();
    $shipping_id = 8;
    $shipping_name = "圆通快递";
    $shipping_fee = 0.00;
    $order_amount = $shipping_fee;
    $pay_id = 1;
    $pay_name = "余额支付";
    $sql = 'INSERT INTO '.$GLOBALS['ecs']->table('order_info').' (`order_sn`, `user_id`,`consignee`, `country`, `province`,`city`, `district`, `address`,  '.
           '`tel`, `email`,`shipping_id`, `shipping_name`,`pay_id`, `pay_name`, `how_oos`, `goods_amount`,'.
           ' `shipping_fee`,`order_amount`,`referer`, `add_time`) VALUES ("'.
            $order_sn.'",'.$user_id.',"'.$name.'",1,'.$province.','.$city.','.$district.',"'.$address.'","'.$tel.'","'.$email.'",'.$shipping_id.',"'.$shipping_name.'",'.
           $pay_id.',"'.$pay_name.'","等待所有商品备齐后再发",0.00,'.$shipping_fee.','.$order_amount.',"本站",'.gmtime().')';
    $GLOBALS['db']->query($sql);
    
    $sql = 'select max(order_id) from '.$GLOBALS['ecs']->table('order_info');
    $order_id = $GLOBALS['db']->getOne($sql);
        
    $sql = 'select * from '.$GLOBALS['ecs']->table('goods').' where goods_id = '.$goods_id;
    $goods = $GLOBALS['db']->getRow($sql); //获奖商品信息
        
    $sql = 'INSERT INTO '.$GLOBALS['ecs']->table('order_goods').' (`order_id`, `goods_id`, `goods_name`, `goods_sn`, `market_price`, `goods_price`, `is_real`) VALUES ('.
               $order_id.','.$goods_id.',"'.$goods['goods_name'].'（抽奖获奖品）","'.$goods['goods_sn'].'",'.$goods['market_price'].',0.00,1)';
    $GLOBALS['db']->query($sql);
    
    $province = get_region_name($province);
    $city     = get_region_name($city);
    $district = get_region_name($district);
    $address  = $name.','.$address.','.$email;
    $address1 = $province.$city.$district;
    //修改获奖状态为已申请
    $sql = "update ".$GLOBALS['ecs']->table('lottery_user').
    " set speech='$speech', address1='$address1',address='$address', tel='$tel' ,order_id = '$order_id',gettime='".gmtime()."',ip = '".real_ip().
    "',applystatus=1 where id='$id' and user_id='$user_id'";
    $GLOBALS['db']->query($sql);
    
    return "1";
}
//seed用户自定义函数以微秒作为种子
function seed() 
{
list($msec, $sec) = explode(' ', microtime());
return (float) $sec;
}

function index_get_links()
{
    $sql = 'SELECT link_logo, link_name, link_url FROM ' . $GLOBALS['ecs']->table('friend_link') . ' ORDER BY show_order';
    $res = $GLOBALS['db']->getAll($sql);

    $links['img'] = $links['txt'] = array();

    foreach ($res AS $row)
    {
        if (!empty($row['link_logo']))
        {
            $links['img'][] = array('name' => $row['link_name'],
                                    'url'  => $row['link_url'],
                                    'logo' => $row['link_logo']);
        }
        else
        {
            $links['txt'][] = array('name' => $row['link_name'],
                                    'url'  => $row['link_url']);
        }
    }

    return $links;
}

/**
 * 获得指定商品的关联商品
 *
 * @access  public
 * @param   integer     $goods_id
 * @return  array
 */
function get_linked_goods($goods_id)
{
    $sql = 'SELECT g.goods_id, g.goods_name, g.goods_thumb, g.goods_img, g.shop_price AS org_price, ' .
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
                'g.market_price, g.promote_price, g.promote_start_date, g.promote_end_date ' .
            'FROM ' . $GLOBALS['ecs']->table('link_goods') . ' lg ' .
            'LEFT JOIN ' . $GLOBALS['ecs']->table('goods') . ' AS g ON g.goods_id = lg.link_goods_id ' .
            "LEFT JOIN " . $GLOBALS['ecs']->table('member_price') . " AS mp ".
                    "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
            "WHERE lg.goods_id = '$goods_id' AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
            "LIMIT " . $GLOBALS['_CFG']['related_goods_number'];
    $res = $GLOBALS['db']->query($sql);

    $arr = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $arr[$row['goods_id']]['goods_id']     = $row['goods_id'];
        $arr[$row['goods_id']]['goods_name']   = $row['goods_name'];
        $arr[$row['goods_id']]['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
            sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
        $arr[$row['goods_id']]['goods_thumb']  = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $arr[$row['goods_id']]['goods_img']    = get_image_path($row['goods_id'], $row['goods_img']);
        $arr[$row['goods_id']]['market_price'] = price_format($row['market_price']);
        $arr[$row['goods_id']]['shop_price']   = price_format($row['shop_price']);
        $arr[$row['goods_id']]['url']          = build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);

        if ($row['promote_price'] > 0)
        {
            $arr[$row['goods_id']]['promote_price'] = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
            $arr[$row['goods_id']]['formated_promote_price'] = price_format($arr[$row['goods_id']]['promote_price']);
        }
        else
        {
            $arr[$row['goods_id']]['promote_price'] = 0;
        }
    }

    return $arr;
}

?>
