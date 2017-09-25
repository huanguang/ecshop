<?php

/**
 * ECSHOP 文章分类
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: article_cat.php 17217 2011-01-19 06:29:08Z liubo $
*/


define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

if ((DEBUG_MODE & 2) != 2)
{
    $smarty->caching = true;
}
$sql_u = 'SELECT COUNT(user_id) AS total_user FROM '.$ecs->table('users');
$total_user_num = $db->getOne($sql_u);
$smarty->assign('total_user_num', $total_user_num);//当前会员总数

$sql = 'SELECT * FROM '. $ecs->table("article").' WHERE article_id = 95';
    $wangzhan = $db->getRow($sql);
    $smarty->assign('wangzhan',$wangzhan);
    $sql = 'SELECT * FROM '. $ecs->table("article").' WHERE article_id = 94'; 
    $fuwu = $db->getRow($sql);
    $smarty->assign('fuwu',$fuwu);

    $smarty->assign('weixin_erweoma',           $_CFG['weixin_erweoma']);       // 顶部二维码
     $smarty->assign('shouji_erweoma',           $_CFG['shouji_erweoma']);       // 顶部二维码
/* 清除缓存 */
clear_cache_files();

/*------------------------------------------------------ */
//-- INPUT
/*------------------------------------------------------ */


/* 获得当前页码 */
$page   = !empty($_REQUEST['page'])  && intval($_REQUEST['page'])  > 0 ? intval($_REQUEST['page'])  : 1;

/*------------------------------------------------------ */
//-- PROCESSOR
/*------------------------------------------------------ */

    /* 如果页面没有被缓存则重新获得页面的内容 */

    if($_REQUEST['act'] == 'tijiao'){
        $shijian = time();
        $sql = "insert into ". $ecs->table('solicitation') ."(school_name,sontact_person,contact_information,parent_name,recommended_reason,tuijian_lianxi,add_time,name,content)  values('$_POST[school_name]','$_POST[sontact_person]','$_POST[contact_information]','$_POST[parent_name]','$_POST[recommended_reason]','$_POST[tuijian_lianxi]','$shijian','$_POST[name]','$_POST[content]')";
        if($db->query($sql)){
            show_message('提交成功');
        }else{
            show_message('提交失败');
        }
    }

    assign_template('a', array($cat_id));
    $position = assign_ur_here($cat_id);
    $smarty->assign('page_title',           $position['title']);     // 页面标题
    $smarty->assign('ur_here',              $position['ur_here']);   // 当前位置

    $smarty->assign('categories',           get_categories_tree(0)); // 分类树
    $smarty->assign('article_categories',   article_categories_tree($cat_id)); //文章分类树
    //$smarty->assign('helps',                get_shop_help());        // 网店帮助
    $smarty->assign('helps_footer',                get_shop_help_footer());        // 网店帮助
    $smarty->assign('helps_left',                get_shop_help_left());        // 网店帮助
    $smarty->assign('top_goods',            get_top10());            // 销售排行

    $smarty->assign('best_goods',           get_recommend_goods('best'));
    $smarty->assign('new_goods',            get_recommend_goods('new'));
    $smarty->assign('hot_goods',            get_recommend_goods('hot'));
    $smarty->assign('promotion_goods',      get_promote_goods());
    $smarty->assign('promotion_info', get_promotion_info());
    
    $smarty->assign('cat_id', $cat_id);

    $smarty->assign('compare.dwt');


//查询征集列表的内容
include_once(ROOT_PATH . 'includes/lib_transaction.php');
$where = '';
if($_POST){
    $ke = $_POST['ke'];
    $where = "and name LIKE '%$ke%' ";
    $smarty->assign('ke',$ke);
}

 $record_count = $db->getOne("SELECT COUNT(*) FROM " .$ecs->table('solicitation'). " WHERE is_show = 0 $where");
    
    $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;

    
    $pager  = get_pager('zhengji_list.php',array('act' => 'list'), $record_count, $page);
    //var_dump($pager);die;
    $zhengji_list = get_zhengji($pager['size'], $pager['start'],$where);

    $smarty->assign('zhengji',$zhengji_list);
    //print_r($orders);die;
    //var_dump($zhengji_list);die;
    $smarty->assign('pager',  $pager);
$smarty->display('zhengji_list.dwt');


?>