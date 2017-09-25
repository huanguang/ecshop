<?php

/**
 * ECSHOP 首页文件
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: index.php 17217 2011-01-19 06:29:08Z liubo $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');

if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}
$ua = strtolower($_SERVER['HTTP_USER_AGENT']);

$uachar = "/(nokia|sony|ericsson|mot|samsung|sgh|lg|philips|panasonic|alcatel|lenovo|cldc|midp|mobile)/i";

if(($ua == '' || preg_match($uachar, $ua))&& !strpos(strtolower($_SERVER['REQUEST_URI']),'wap'))
{
    $Loaction = 'mobile/';

    if (!empty($Loaction))
    {
        ecs_header("Location: $Loaction\n");

        exit;
    }

}
$sql_u = 'SELECT COUNT(user_id) AS total_user FROM '.$ecs->table('users');
$total_user_num = $db->getOne($sql_u);
$smarty->assign('total_user_num', $total_user_num);//当前会员总数

/*------------------------------------------------------ */
//-- Shopex系统地址转换
/*------------------------------------------------------ */
if (!empty($_GET['gOo']))
{
    if (!empty($_GET['gcat']))
    {
        /* 商品分类。*/
        $Loaction = 'category.php?id=' . $_GET['gcat'];
    }
    elseif (!empty($_GET['acat']))
    {
        /* 文章分类。*/
        $Loaction = 'article_cat.php?id=' . $_GET['acat'];
    }
    elseif (!empty($_GET['goodsid']))
    {
        /* 商品详情。*/
        $Loaction = 'goods.php?id=' . $_GET['goodsid'];
    }
    elseif (!empty($_GET['articleid']))
    {
        /* 文章详情。*/
        $Loaction = 'article.php?id=' . $_GET['articleid'];
    }

    if (!empty($Loaction))
    {
        ecs_header("Location: $Loaction\n");

        exit;
    }
}

//判断是否有ajax请求
$act = !empty($_GET['act']) ? $_GET['act'] : '';
if ($act == 'cat_rec')
{
    $rec_array = array(1 => 'best', 2 => 'new', 3 => 'hot');
    $rec_type = !empty($_REQUEST['rec_type']) ? intval($_REQUEST['rec_type']) : '1';
    $cat_id = !empty($_REQUEST['cid']) ? intval($_REQUEST['cid']) : '0';
    include_once('includes/cls_json.php');
    $json = new JSON;
    $result   = array('error' => 0, 'content' => '', 'type' => $rec_type, 'cat_id' => $cat_id);

    $children = get_children($cat_id);
    $smarty->assign($rec_array[$rec_type] . '_goods',      get_category_recommend_goods($rec_array[$rec_type], $children));    // 推荐商品
    $smarty->assign('cat_rec_sign', 1);
    $result['content'] = $smarty->fetch('library/recommend_' . $rec_array[$rec_type] . '.lbi');
    die($json->encode($result));
}

/*------------------------------------------------------ */
//-- 判断是否存在缓存，如果存在则调用缓存，反之读取相应内容
/*------------------------------------------------------ */
/* 缓存编号 */
$cache_id = sprintf('%X', crc32($_SESSION['user_rank'] . '-' . $_CFG['lang']));

if (!$smarty->is_cached('index.dwt', $cache_id))
{
    assign_template();

    $position = assign_ur_here();
    $smarty->assign('page_title',      $position['title']);    // 页面标题
    $smarty->assign('ur_here',         $position['ur_here']);  // 当前位置

    /* meta information */
    $smarty->assign('keywords',        htmlspecialchars($_CFG['shop_keywords']));
    $smarty->assign('description',     htmlspecialchars($_CFG['shop_desc']));
    $smarty->assign('flash_theme',     $_CFG['flash_theme']);  // Flash轮播图片模板

    $smarty->assign('feed_url',        ($_CFG['rewrite'] == 1) ? 'feed.xml' : 'feed.php'); // RSS URL

    //print_R(get_categories_tree());die;
    //print_r(get_categories_tree());die;
    $smarty->assign('categories',      get_categories_tree()); // 分类树
	
	$smarty->assign('categories_pro',  get_categories_tree_pro()); // 分类树加强版
     /**小图 start**/
	/*打开页面即可执行，仅执行一次，随即删掉*/
		
	for($i=1;$i<=$_CFG['auction_ad'];$i++){
			$ad_arr .= "'c".$i.",";
		}
	$smarty->assign('adarr',       $ad_arr); // 分类广告位
	/**小图 end**/


    //$smarty->assign('helps',           get_shop_help());       // 网店帮助
    $smarty->assign('helps_footer',           get_shop_help_footer());       // 网店帮助
    $smarty->assign('top_goods',       get_top10());           // 销售排行
    $smarty->assign('top_goods_6f',       get_top10_6f());           // 销售排行

    $smarty->assign('best_goods',      get_recommend_goods('best'));    // 推荐商品
    $smarty->assign('new_goods',       get_recommend_goods_bak('new'));     // 最新商品
    //var_dump(get_recommend_goods_bak('new'));die;
    $smarty->assign('hot_goods',       get_recommend_goods_bak('hot'));     // 热卖商品
    //print_r(get_recommend_goods_bak('hot'));die;


    /**  获得6F婚宴专区       开始  */
    $sql = 'SELECT cat_id, goods_id, goods_name, market_price, shop_price, goods_img  FROM '.$ecs->table('goods').' WHERE cat_id = 158 ORDER BY cat_id ASC';
    //SELECT * FROM `ecshop_miqi`.`ecs_goods` WHERE cat_id = 158 ORDER BY cat_id ASC
    $goods_6fhy = $db->getAll($sql);

    foreach($goods_6fhy as $k => $v){

        $goods_6fhy[$k]['url'] = build_uri('goods', array('gid' => $v['goods_id']), $v['goods_name']);
        $goods_6fhy[$k]['goods_img'] = get_image_path($v['goods_id'], $v['goods_img'], true);
        $goods_6fhy[$k]['id'] = $v['goods_id'];
        $goods_6fhy[$k]['market_price'] = intval($v['market_price']);
        $goods_6fhy[$k]['shop_price'] = substr($v['shop_price'],0,20);
        $goods_6fhy[$k]['goods_style_name'] = add_style($v['goods_name'], $v['goods_name_style']);
        $goods_6fhy[$k]['goods_count'] = get_goods_count($v['goods_id']);
        //添加好评字段
        $sql =" select count(*) from " .$GLOBALS['ecs']->table('comment'). " where comment_rank = 5 and id_value = ".$v['goods_id'];
             $count_comment_hao = $GLOBALS['db']->getOne($sql);
             $sql =" select count(*) from " .$GLOBALS['ecs']->table('comment'). " where id_value = ".$v['goods_id'];
             $count_comment_zong = $GLOBALS['db']->getOne($sql);
             $goods_6fhy[$k]['count_comment'] = ($count_comment_hao/$count_comment_zong)*100;

    }
    $smarty->assign('goods_6fhy', $goods_6fhy);
    /**  获得6F婚宴专区       结束  */



    /**  获得7F礼盒馈赠       开始  */
    $sql = 'SELECT cat_id, goods_id, goods_name, market_price, shop_price, goods_img  FROM '.$ecs->table('goods').' WHERE cat_id = 159 ORDER BY cat_id ASC';
    //SELECT * FROM `ecshop_miqi`.`ecs_goods` WHERE cat_id = 158 ORDER BY cat_id ASC
    $goods_7flh = $db->getAll($sql);

    foreach($goods_7flh as $k => $v){

        $goods_7flh[$k]['url'] = build_uri('goods', array('gid' => $v['goods_id']), $v['goods_name']);
        $goods_7flh[$k]['goods_img'] = get_image_path($v['goods_id'], $v['goods_img'], true);
        $goods_7flh[$k]['id'] = $v['goods_id'];
        $goods_7flh[$k]['market_price'] = intval($v['market_price']);
        $goods_7flh[$k]['shop_price'] = substr($v['shop_price'],0,20);
        $goods_7flh[$k]['goods_style_name'] = add_style($v['goods_name'], $v['goods_name_style']);
        $goods_7flh[$k]['goods_count'] = get_goods_count($v['goods_id']);
        //添加好评字段
        $sql =" select count(*) from " .$GLOBALS['ecs']->table('comment'). " where comment_rank = 5 and id_value = ".$v['goods_id'];
             $count_comment_hao = $GLOBALS['db']->getOne($sql);
             $sql =" select count(*) from " .$GLOBALS['ecs']->table('comment'). " where id_value = ".$v['goods_id'];
             $count_comment_zong = $GLOBALS['db']->getOne($sql);
             $goods_7flh[$k]['count_comment'] = ($count_comment_hao/$count_comment_zong)*100;

    }
    $smarty->assign('goods_7flh', $goods_7flh);
    /**  获得7F礼盒馈赠        结束  */
  // var_dump($goods_7flh);die;

    /**  获得8F整箱分类，组合和整箱数据       开始  */
    $sql = 'SELECT goods_name, goods_id, shop_price, market_price, goods_img  FROM '.$ecs->table('goods') .' WHERE cat_id IN(153, 154) ';
    $goods_8f = $db->getAll($sql);

    foreach($goods_8f as $idx => $row){

         $goods_8f[$idx]['url']   = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
         $goods_8f[$idx]['goods_img']  = get_image_path($row['goods_id'], $row['goods_img'], true);
         $goods_8f[$idx]['id']           = $row['goods_id'];
         $goods_8f[$idx]['market_price'] = intval($row['market_price']);
         $goods_8f[$idx]['shop_price']   = substr($row['shop_price'],0,20);
         $goods_8f[$idx]['goods_style_name']   = add_style($row['goods_name'], $row['goods_name_style']);
         //print_R($goods[$idx]['market_price']);die;
         $goods_8f[$idx]['goods_count'] = get_goods_count($row['goods_id']);
         //添加好评字段
        $sql =" select count(*) from " .$GLOBALS['ecs']->table('comment'). " where comment_rank = 5 and id_value = ".$row['goods_id'];
             $count_comment_hao = $GLOBALS['db']->getOne($sql);
             $sql =" select count(*) from " .$GLOBALS['ecs']->table('comment'). " where id_value = ".$row['goods_id'];
             $count_comment_zong = $GLOBALS['db']->getOne($sql);
             $goods_8f[$idx]['count_comment'] = ($count_comment_hao/$count_comment_zong)*100;

    }
    $smarty->assign('hot_goods_8f',   $goods_8f   );     
    /**  获得8F整箱分类，组合和整箱数据       结束  */


    $smarty->assign('promotion_goods', get_promote_goods()); // 特价商品
    //print_r(get_promote_goods());die;
    $smarty->assign('brand_list',      get_brands());
    $smarty->assign('promotion_info',  get_promotion_info()); // 增加一个动态显示所有促销信息的标签栏

    $smarty->assign('invoice_list',    index_get_invoice_query());  // 发货查询
    
    //查询首页文章分类
/*
    $sql = 'SELECT a.article_id, a.title, ac.cat_name, a.add_time, a.file_url, a.open_type, ac.cat_id, ac.cat_name ' .
        ' FROM ' . $GLOBALS['ecs']->table('article') . ' AS a, ' .
            $GLOBALS['ecs']->table('article_cat') . ' AS ac' .
        ' WHERE a.is_open = 1 AND a.cat_id = ac.cat_id AND ac.cat_type = 1 AND ac.cat_id IN ( 19, 20, 21 )' .
        ' ORDER BY a.article_type DESC, a.add_time DESC LIMIT 3';  
    */   
    $sql = 'SELECT * FROM '.$GLOBALS['ecs']->table('article_cat').' WHERE parent_id = 28 ORDER BY sort_order DESC LIMIT 3';
    $act_cat = $db->getAll($sql);
    foreach($act_cat as $idx => $row){

        $act_cat[$idx]['cat_url']     = build_uri('article_cat', array('acid' => $row['cat_id']), $row['cat_name']);

        //print_R($act_cat[$idx]['cat_id']);die;

    }
    $smarty->assign('act_cat',$act_cat);
    //var_dump(index_get_new_articles_bak(19));die;
   // $smarty->assign('new_articles',    index_get_new_articles_bak());   // 最新文章
    $smarty->assign('media_new_articles',    index_get_new_articles_bak(21));//媒体报道文章 
    $smarty->assign('sales_new_articles',    index_get_new_articles_bak(20));//促销活动文章 
    $smarty->assign('new_articles',    index_get_new_articles_bak(19));//最新公告文章 


    //print_r(index_get_group_buy());die;
    $smarty->assign('group_buy_goods', index_get_group_buy());      // 团购商品
    //var_dump(index_get_group_buy());die;


    //查询首页5f酒具商品
    $sql = 'SELECT add_time, cat_id, goods_img, goods_name, goods_desc, market_price, shop_price, promote_start_date, promote_end_date, goods_id  FROM '.$ecs->table('goods').' WHERE cat_id = 157 ORDER BY add_time DESC LIMIT 0,1';
    //SELECT add_time, cat_id, goods_img, goods_name, goods_desc, market_price, shop_price, promote_start_date, promote_end_date, goods_id FROM `ecshop_miqi`.`ecs_goods` WHERE cat_id = 157 ORDER BY add_time DESC LIMIT 0,2

    $pro_5f_jj_02 = $db->getAll($sql);
    foreach($pro_5f_jj_02 as $idx => $row){

         $pro_5f_jj_02[$idx]['url']   = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
         $pro_5f_jj_02[$idx]['goods_img']  = get_image_path($row['goods_id'], $row['goods_img'], true);
         $pro_5f_jj_02[$idx]['id']           = $row['goods_id'];
         $pro_5f_jj_02[$idx]['market_price'] = intval($row['market_price']);
         $pro_5f_jj_02[$idx]['shop_price']   = substr($row['shop_price'],0,20);
         $pro_5f_jj_02[$idx]['goods_style_name']   = add_style($row['goods_name'], $row['goods_name_style']);

        //添加产地 口感属性 
        $sql = 'SELECT g.goods_id, a.goods_id, a.attr_value  FROM '.$GLOBALS['ecs']->table('goods').'AS g LEFT JOIN '.$GLOBALS['ecs']->table('goods_attr').' AS a ON g.goods_id = a.goods_id WHERE a.goods_id = '.$row['goods_id'];
        $attr_result = $GLOBALS['db']->getAll($sql);
        $attr_arr = array($attr_result[0]['attr_value'], $attr_result[1]['attr_value']);

        //赋值到一个新的字段
         $pro_5f_jj_02[$idx]['attr'] = $attr_arr;
         //print_R($pro_5f_zh);die;
    }
    //print_R($pro_5f_jj_02);
    $smarty->assign('pro_5f_jj_02', $pro_5f_jj_02);


    //查询首页5f酒具商品
    $sql = 'SELECT add_time, cat_id, goods_img, goods_name, goods_desc, market_price, shop_price, promote_start_date, promote_end_date, goods_id  FROM '.$ecs->table('goods').' WHERE cat_id = 157 ORDER BY add_time DESC LIMIT 2,1';
    //SELECT add_time, cat_id, goods_img, goods_name, goods_desc, market_price, shop_price, promote_start_date, promote_end_date, goods_id FROM `ecshop_miqi`.`ecs_goods` WHERE cat_id = 157 ORDER BY add_time DESC LIMIT 0,2

    $pro_5f_jj_04 = $db->getAll($sql);
    foreach($pro_5f_jj_04 as $idx => $row){

         $pro_5f_jj_04[$idx]['url']   = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
         $pro_5f_jj_04[$idx]['goods_img']  = get_image_path($row['goods_id'], $row['goods_img'], true);
         $pro_5f_jj_04[$idx]['id']           = $row['goods_id'];
         $pro_5f_jj_04[$idx]['market_price'] = intval($row['market_price']);
         $pro_5f_jj_04[$idx]['shop_price']   = substr($row['shop_price'],0,20);
         $pro_5f_jj_04[$idx]['goods_style_name']   = add_style($row['goods_name'], $row['goods_name_style']);

        //添加产地 口感属性 
        $sql = 'SELECT g.goods_id, a.goods_id, a.attr_value  FROM '.$GLOBALS['ecs']->table('goods').'AS g LEFT JOIN '.$GLOBALS['ecs']->table('goods_attr').' AS a ON g.goods_id = a.goods_id WHERE a.goods_id = '.$row['goods_id'];
        $attr_result = $GLOBALS['db']->getAll($sql);
        $attr_arr = array($attr_result[0]['attr_value'], $attr_result[1]['attr_value']);

        //赋值到一个新的字段
         $pro_5f_jj_04[$idx]['attr'] = $attr_arr;
         //print_R($pro_5f_zh);die;
    }
    //print_R($pro_5f_jj_04);die;
    $smarty->assign('pro_5f_jj_04', $pro_5f_jj_04);

    $smarty->assign('auction_list',    index_get_auction());        // 拍卖活动
    $smarty->assign('shop_notice',     $_CFG['shop_notice']);       // 商店公告
	/*jdy add 0816 添加首页幻灯插件*/
    $smarty->assign("flash",get_flash_xml());
    $smarty->assign('flash_count',count(get_flash_xml()));

    //4f品酒师推荐查询分类文章     促销活动查询              开始    
    $sql = 'SELECT cat_id, content, title, article_id FROM '.$ecs->table('article').' WHERE cat_id = 22 LIMIT 1';
    $art_cat_4f = $db->getRow($sql);
    $smarty->assign('art_cat_4f', $art_cat_4f);

    $time = gmtime();

    //查询促销商品列表 
    $sql = 'SELECT add_time, cat_id,goods_brief, goods_img, goods_name, goods_desc, market_price, shop_price, promote_start_date, promote_end_date, goods_id  FROM '.$ecs->table('goods').' WHERE cat_id = 156 ORDER BY add_time DESC LIMIT 2';
    $pro_2f_cx = $db->getAll($sql);
    foreach($pro_2f_cx as $idx => $row){

         $pro_2f_cx[$idx]['url']   = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
         $pro_2f_cx[$idx]['goods_img']  = get_image_path($row['goods_id'], $row['goods_img'], true);
         $pro_2f_cx[$idx]['id']           = $row['goods_id'];
         $pro_2f_cx[$idx]['goods_brief']           = $row['goods_brief'];
         $pro_2f_cx[$idx]['market_price'] = intval($row['market_price']);
         $pro_2f_cx[$idx]['promote_end_date'] = intval($row['promote_end_date']);
         $pro_2f_cx[$idx]['promote_start_date'] = intval($row['promote_start_date']);
         $pro_2f_cx[$idx]['shop_price']   = substr($row['shop_price'],0,20);
         $pro_2f_cx[$idx]['goods_style_name']   = add_style($row['goods_name'], $row['goods_name_style']);

    }
    $smarty->assign('pro_2f_cx', $pro_2f_cx);
        //4f品酒师推荐查询分类文章     促销活动查询              结束 


    //5f精品酒具    组合商品列表
    $sql = 'SELECT add_time, cat_id, goods_img, goods_name, goods_desc, market_price, shop_price, promote_start_date, promote_end_date, goods_id  FROM '.$ecs->table('goods').' WHERE cat_id = 157 ORDER BY add_time DESC LIMIT 3';
    $pro_5f_zh = $db->getAll($sql);
    foreach($pro_5f_zh as $idx => $row){

         $pro_5f_zh[$idx]['url']   = build_uri('goods', array('gid' => $row['goods_id']), $row['goods_name']);
         $pro_5f_zh[$idx]['goods_img']  = get_image_path($row['goods_id'], $row['goods_img'], true);
         $pro_5f_zh[$idx]['id']           = $row['goods_id'];
         $pro_5f_zh[$idx]['fittings']     =     get_goods_fittings_bak(array($row['goods_id']));
         //统计原套餐的总价格,现在套餐价格，优惠总价格
         foreach ($pro_5f_zh[$idx]['fittings'] as $key => $value) {
             $pro_5f_zh[$idx]['yuanjia'] += $value['shop_price_ori'];
             $pro_5f_zh[$idx]['youjia'] += $value['spare_price_ori'];
             $pro_5f_zh[$idx]['xianzjia'] += $value['fittings_price_ori'];
         }
         //var_dump(get_goods_fittings(array($row['goods_id'])));die;
         $pro_5f_zh[$idx]['market_price'] = intval($row['market_price']);
         $pro_5f_zh[$idx]['promote_end_date'] = intval($row['promote_end_date']);
         $pro_5f_zh[$idx]['promote_start_date'] = intval($row['promote_start_date']);
         $pro_5f_zh[$idx]['shop_price']   = substr($row['shop_price'],0,20);
         $pro_5f_zh[$idx]['goods_style_name']   = add_style($row['goods_name'], $row['goods_name_style']);
         $pro_5f_zh[$idx]['xianzjia'] = $pro_5f_zh[$idx]['xianzjia'] + $pro_5f_zh[$idx]['shop_price'];
         $pro_5f_zh[$idx]['yuanjia'] = $pro_5f_zh[$idx]['yuanjia'] + $pro_5f_zh[$idx]['market_price'];
         //$pro_5f_zh[$idx]['xianzjia'] = $pro_5f_zh[$idx]['xianzjia'] + $pro_5f_zh[$idx]['shop_price'];
        //添加产地 口感属性 
        $sql = 'SELECT g.goods_id, a.goods_id, a.attr_value  FROM '.$GLOBALS['ecs']->table('goods').'AS g LEFT JOIN '.$GLOBALS['ecs']->table('goods_attr').' AS a ON g.goods_id = a.goods_id WHERE a.goods_id = '.$row['goods_id'];
        $attr_result = $GLOBALS['db']->getAll($sql);
        $attr_arr = array($attr_result[0]['attr_value'], $attr_result[1]['attr_value']);

        //赋值到一个新的字段
         $pro_5f_zh[$idx]['attr'] = $attr_arr;
         //print_R($pro_5f_zh);die;
    }
    //print_r($pro_5f_zh);die;
    $smarty->assign('pro_5f_zh', $pro_5f_zh);
    $smarty->assign('fittings',            get_goods_fittings(array($row['goods_id']))); 

    /* 首页主广告设置 20151030 */
        //顶部首页广告轮播图
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 14 AND enabled = 1 ';
    //SELECT ad_link,ad_code FROM `ecshop_miqi`.`ecs_ad` WHERE position_id = 14 AND enabled = 1
    $ad = $db->getAll($sql);
    $smarty->assign('ad',$ad);
    // var_dump($ad);die;
    //echo json_encode($ad);die;
    // alert(kdjklsdjklsd);die;
    //test;

        //首页6F广告位
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 15 AND enabled = 1 ';
    $ad6 = $db->getAll($sql);
    $smarty->assign('ad6',$ad6);

        //首页8F广告位
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 16 AND enabled = 1 ';
    $ad8 = $db->getAll($sql);
    $smarty->assign('ad8',$ad8);

        //首页1F一周热卖排行
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 17 AND enabled = 1 ';
    $ad_hots1f = $db->getRow($sql);
    $smarty->assign('ad_hots1f',$ad_hots1f);

        //首页3F品牌专区右
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 18 AND enabled = 1 ';
    $ad_3f = $db->getRow($sql);
    $smarty->assign('ad_3f',$ad_3f);

        //首页5F精品酒具右
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 19 AND enabled = 1 ';
    $ad_5f = $db->getAll($sql);
    $smarty->assign('ad_5f',$ad_5f);

        //首页6F婚宴专区左
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 20 AND enabled = 1 ';
    $ad_6f_left = $db->getRow($sql);
    $smarty->assign('ad_6f_left',$ad_6f_left);


        //首页7F礼盒馈赠三张
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 21 AND enabled = 1 ';
    $ad_7f_3 = $db->getAll($sql);
    $smarty->assign('ad_7f_3',$ad_7f_3);

        //首页8F整箱/组合左
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 22 AND enabled = 1 ';
    $ad_8f_left = $db->getRow($sql);
    $smarty->assign('ad_8f_left',$ad_8f_left);

        //首页2F下
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 23 AND enabled = 1 ';
    $ad_2fb = $db->getRow($sql);
    $smarty->assign('ad_2fb',$ad_2fb);

        //首页4F下
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 24 AND enabled = 1 ';
    $ad_4fb = $db->getRow($sql);
    $smarty->assign('ad_4fb',$ad_4fb);

        //首页5F下
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 25 AND enabled = 1 ';
    $ad_5fb = $db->getRow($sql);
    $smarty->assign('ad_5fb',$ad_5fb);

        //首页6F下
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 26 AND enabled = 1 ';
    $ad_6fb = $db->getRow($sql);
    $smarty->assign('ad_6fb',$ad_6fb);

        //首页7F下
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 27 AND enabled = 1 ';
    $ad_7fb = $db->getRow($sql);
    $smarty->assign('ad_7fb',$ad_7fb);

        //首页全部产品分类三张
    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 28 AND enabled = 1 ';
    $ad_all_fl = $db->getAll($sql);
    $smarty->assign('ad_all_fl',$ad_all_fl);
    /* 首页主广告设置 20151030*/

    //2015-11-14 首页优酷视频 
    $sql = 'SELECT * FROM '.$ecs->table("ad").' WHERE position_id = 33 AND enabled = 1 LIMIT 1';
    $youku = $db->getRow($sql);
    $smarty->assign('youku',$youku);


    // $smarty->assign('index_ad',     $_CFG['index_ad']);
    // if ($_CFG['index_ad'] == 'cus')
    // {
    //     $sql = 'SELECT ad_type, content, url FROM ' . $ecs->table("ad_custom") . ' WHERE ad_status = 1';
    //     $ad = $db->getRow($sql, true);
    //     $smarty->assign('ad', $ad);
    // }

    /* links */
    $links = index_get_links();
    $smarty->assign('img_links',       $links['img']);
    $smarty->assign('txt_links',       $links['txt']);
    $smarty->assign('data_dir',        DATA_DIR);       // 数据目录

    /* 首页推荐分类 */
    $cat_recommend_res = $db->getAll("SELECT c.cat_id, c.cat_name, cr.recommend_type FROM " . $ecs->table("cat_recommend") . " AS cr INNER JOIN " . $ecs->table("category") . " AS c ON cr.cat_id=c.cat_id");
    //print_R($cat_recommend_res);die;

    if (!empty($cat_recommend_res))
    {
        $cat_rec_array = array();
        foreach($cat_recommend_res as $cat_recommend_data)
        {
            $cat_rec[$cat_recommend_data['recommend_type']][] = array('cat_id' => $cat_recommend_data['cat_id'], 'cat_name' => $cat_recommend_data['cat_name']);
        }
       // print_r($cat_rec);die;
        $smarty->assign('cat_rec', $cat_rec);
    }


    //8f整箱分类，取出组合和整箱数据
    if (!empty($cat_recommend_res))
    {
        $cat_rec_array = array();
        foreach($cat_recommend_res as $cat_recommend_data)
        {
            $cat_rec8f[$cat_recommend_data['recommend_type']][] = array('cat_id' => $cat_recommend_data['cat_id'], 'cat_name' => $cat_recommend_data['cat_name']);
        }
        unset($cat_rec8f[3][0]);
        //print_R($cat_rec8f);die;
        $smarty->assign('cat_rec8f', $cat_rec8f);
    }

    /* 页面中的动态内容 */
    assign_dynamic('index');
}

$smarty->display('index.dwt', $cache_id);

/*------------------------------------------------------ */
//-- PRIVATE FUNCTIONS
/*------------------------------------------------------ */

/**
 * 调用发货单查询
 *
 * @access  private
 * @return  array
 */
function index_get_invoice_query()
{
    $sql = 'SELECT o.order_sn, o.invoice_no, s.shipping_code FROM ' . $GLOBALS['ecs']->table('order_info') . ' AS o' .
            ' LEFT JOIN ' . $GLOBALS['ecs']->table('shipping') . ' AS s ON s.shipping_id = o.shipping_id' .
            " WHERE invoice_no > '' AND shipping_status = " . SS_SHIPPED .
            ' ORDER BY shipping_time DESC LIMIT 10';
    $all = $GLOBALS['db']->getAll($sql);

    foreach ($all AS $key => $row)
    {
        $plugin = ROOT_PATH . 'includes/modules/shipping/' . $row['shipping_code'] . '.php';

        if (file_exists($plugin))
        {
            include_once($plugin);

            $shipping = new $row['shipping_code'];
            $all[$key]['invoice_no'] = $shipping->query((string)$row['invoice_no']);
        }
    }

    clearstatcache();

    return $all;
}


/**
 * 获得最新的文章列表。
 *
 * @access  private
 * @return  array
 */
function index_get_new_articles_bak($cat_id)
{
   
    $sql = 'SELECT a.article_id, a.title, ac.cat_name, a.add_time, a.file_url, a.open_type, ac.cat_id, ac.cat_name ' .
        ' FROM ' . $GLOBALS['ecs']->table('article') . ' AS a, ' .
            $GLOBALS['ecs']->table('article_cat') . ' AS ac' .
        ' WHERE a.is_open = 1 AND a.cat_id = ac.cat_id AND ac.cat_type = 1 AND a.cat_id = '.$cat_id.
        ' ORDER BY a.article_type DESC, a.add_time DESC LIMIT 4'; 

    $res = $GLOBALS['db']->getAll($sql);

    $arr = array();
    foreach ($res AS $idx => $row)
    {
        $arr[$idx]['id']          = $row['article_id'];
        $arr[$idx]['title']       = $row['title'];
        $arr[$idx]['short_title'] = $GLOBALS['_CFG']['article_title_length'] > 0 ?
                                        sub_str($row['title'], $GLOBALS['_CFG']['article_title_length']) : $row['title'];
        $arr[$idx]['cat_name']    = $row['cat_name'];
        $arr[$idx]['add_time']    = local_date($GLOBALS['_CFG']['date_format'], $row['add_time']);
        $arr[$idx]['url']         = $row['open_type'] != 1 ?
                                        build_uri('article', array('aid' => $row['article_id']), $row['title']) : trim($row['file_url']);
        $arr[$idx]['cat_url']     = build_uri('article_cat', array('acid' => $row['cat_id']), $row['cat_name']);
    }
    //print_R($arr);die;
    return $arr;

}


/**
 * 获得最新的文章列表。
 *
 * @access  private
 * @return  array
 */
function index_get_new_articles()
{
    $sql = 'SELECT a.article_id, a.title, ac.cat_name, a.add_time, a.file_url, a.open_type, ac.cat_id, ac.cat_name ' .
            ' FROM ' . $GLOBALS['ecs']->table('article') . ' AS a, ' .
                $GLOBALS['ecs']->table('article_cat') . ' AS ac' .
            ' WHERE a.is_open = 1 AND a.cat_id = ac.cat_id AND ac.cat_type = 1' .
            ' ORDER BY a.article_type DESC, a.add_time DESC LIMIT ' . $GLOBALS['_CFG']['article_number'];
    $res = $GLOBALS['db']->getAll($sql);

    $arr = array();
    foreach ($res AS $idx => $row)
    {
        $arr[$idx]['id']          = $row['article_id'];
        $arr[$idx]['title']       = $row['title'];
        $arr[$idx]['short_title'] = $GLOBALS['_CFG']['article_title_length'] > 0 ?
                                        sub_str($row['title'], $GLOBALS['_CFG']['article_title_length']) : $row['title'];
        $arr[$idx]['cat_name']    = $row['cat_name'];
        $arr[$idx]['add_time']    = local_date($GLOBALS['_CFG']['date_format'], $row['add_time']);
        $arr[$idx]['url']         = $row['open_type'] != 1 ?
                                        build_uri('article', array('aid' => $row['article_id']), $row['title']) : trim($row['file_url']);
        $arr[$idx]['cat_url']     = build_uri('article_cat', array('acid' => $row['cat_id']), $row['cat_name']);
    }

    return $arr;
}

/**
 * 获得最新的团购活动
 *
 * @access  private
 * @return  array
 */
function index_get_group_buy()
{   //echo 123;die;
    $time = gmtime();
    $limit = get_library_number('group_buy', 'index');

    $group_buy_list = array();
    if ($limit > 0)
    {
        $sql = 'SELECT gb.act_id AS group_buy_id, gb.goods_id, gb.ext_info, gb.goods_name, gb.start_time, gb.end_time, g.goods_thumb, g.goods_img, g.market_price , g.shop_price ' .
                'FROM ' . $GLOBALS['ecs']->table('goods_activity') . ' AS gb, ' .
                    $GLOBALS['ecs']->table('goods') . ' AS g ' .
                "WHERE gb.act_type = '" . GAT_GROUP_BUY . "' " .
                "AND g.goods_id = gb.goods_id " .
                "AND gb.start_time <= '" . $time . "' " .
                "AND gb.end_time >= '" . $time . "' " .
                "AND g.is_delete = 0 " .
                "ORDER BY gb.act_id DESC " .
                "LIMIT $limit" ;
             
             //echo $sql;die;   
        $res = $GLOBALS['db']->query($sql);

        while ($row = $GLOBALS['db']->fetchRow($res))
        {
            /* 如果缩略图为空，使用默认图片 */
            $row['goods_img'] = get_image_path($row['goods_id'], $row['goods_img']);
            $row['thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);

            /* 根据价格阶梯，计算最低价 */
            $ext_info = unserialize($row['ext_info']);
		
	
            $price_ladder = $ext_info['price_ladder'];
            if (!is_array($price_ladder) || empty($price_ladder))
            {
                $row['last_price'] = price_format(0);
            }
            else
            {
                foreach ($price_ladder AS $amount_price)
                {
                    $price_ladder[$amount_price['amount']] = $amount_price['price'];
                }
            }
            ksort($price_ladderp);
						
            $row['last_price'] = price_format(end($price_ladder));
			
			/*团购节省和折扣计算 by ecmoban start*/
			$price    = $row['market_price']; //原价 
			$nowprice = $row['last_price']; //现价
			$row['jiesheng'] = $price-$nowprice; //节省金额 
			if($nowprice > 0)
			{
				$row['zhekou'] = round(10 / ($price / $nowprice), 1);
			}
			else 
			{ 
				$row['zhekou'] = 0;
			}

			$activity_row = $GLOBALS['db']->getRow($sql);
			$stat = group_buy_stat($row['act_id'], $ext_info['deposit']);
            // 反序列化函数unserialize  序列化函数serialize
			$row['ext_info'] = unserialize($row['ext_info']);
			$row['cur_amount'] = $stat['valid_goods'];         // 当前数量
			$row['start_time'] = $row['start_time'];         // 开始时间
			$row['end_time'] = $row['end_time'];         // 结束时间

			 	
			/*团购节省和折扣计算 by ecmoban end*/
            $row['url'] = build_uri('group_buy', array('gbid' => $row['group_buy_id']));
            $row['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                           sub_str($row['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $row['goods_name'];
            $row['short_style_name']   = add_style($row['short_name'],'');
            $group_buy_list[] = $row;
			
        }
    }

    return $group_buy_list;
}

/**
 * 取得拍卖活动列表
 * @return  array
 */
function index_get_auction()
{
    $now = gmtime();
    $limit = get_library_number('auction', 'index');
    $sql = "SELECT a.act_id, a.goods_id, a.goods_name, a.ext_info, g.goods_thumb ".
            "FROM " . $GLOBALS['ecs']->table('goods_activity') . " AS a," .
                      $GLOBALS['ecs']->table('goods') . " AS g" .
            " WHERE a.goods_id = g.goods_id" .
            " AND a.act_type = '" . GAT_AUCTION . "'" .
            " AND a.is_finished = 0" .
            " AND a.start_time <= '$now'" .
            " AND a.end_time >= '$now'" .
            " AND g.is_delete = 0" .
            " ORDER BY a.start_time DESC" .
            " LIMIT $limit";
    $res = $GLOBALS['db']->query($sql);

    $list = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $ext_info = unserialize($row['ext_info']);
        $arr = array_merge($row, $ext_info);
        $arr['formated_start_price'] = price_format($arr['start_price']);
        $arr['formated_end_price'] = price_format($arr['end_price']);
        $arr['thumb'] = get_image_path($row['goods_id'], $row['goods_thumb'], true);
        $arr['url'] = build_uri('auction', array('auid' => $arr['act_id']));
        $arr['short_name']   = $GLOBALS['_CFG']['goods_name_length'] > 0 ?
                                           sub_str($arr['goods_name'], $GLOBALS['_CFG']['goods_name_length']) : $arr['goods_name'];
        $arr['short_style_name']   = add_style($arr['short_name'],'');
        $list[] = $arr;
    }

    return $list;
}

/**
 * 获得所有的友情链接
 *
 * @access  private
 * @return  array
 */
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


function get_flash_xml()
{
    $flashdb = array();
    if (file_exists(ROOT_PATH . DATA_DIR . '/flash_data.xml'))
    {
        // 兼容v2.7.0及以前版本
        if (!preg_match_all('/item_url="([^"]+)"\slink="([^"]+)"\stext="([^"]*)"\ssort="([^"]*)"/', file_get_contents(ROOT_PATH . DATA_DIR . '/flash_data.xml'), $t, PREG_SET_ORDER))
        {
            preg_match_all('/item_url="([^"]+)"\slink="([^"]+)"\stext="([^"]*)"/', file_get_contents(ROOT_PATH . DATA_DIR . '/flash_data.xml'), $t, PREG_SET_ORDER);
        }
        if (!empty($t))
        {
            foreach ($t as $key => $val)
            {
                $val[4] = isset($val[4]) ? $val[4] : 0;
                $flashdb[] = array('src'=>$val[1],'url'=>$val[2],'text'=>$val[3],'sort'=>$val[4]);
//print_r($flashdb);
            }
        }
    }
    return $flashdb;
}


?>