<?php

/**
 * ECSHOP 会员等级管理程序
 * ============================================================================
 * * 版权所有 2005-2012 上海商派网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecshop.com；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * $Author: liubo $
 * $Id: user_rank.php 17217 2011-01-19 06:29:08Z liubo $
*/

define('IN_ECS', true);

require(dirname(__FILE__) . '/includes/init.php');

$exc = new exchange($ecs->table("user_rank"), $db, 'rank_id', 'rank_name');
$exc_user = new exchange($ecs->table("users"), $db, 'user_rank', 'user_rank');

/*------------------------------------------------------ */
//-- 会员等级列表
/*------------------------------------------------------ */

if ($_REQUEST['act'] == 'list')
{
    $ranks = array();
    $ranks = $db->getAll("SELECT a.*,b.user_name FROM " .$ecs->table('news'). " as a left join " .$ecs->table('users'). " as b on a.f_user_id = b.user_id where a.f_user_id > 0 group by a.f_user_id order by a.id desc");
    $smarty->assign('ur_here','在线咨询列表');
    $smarty->assign('action_link',  array('text' => '发送系统消息', 'href'=>'news.php?act=xitong'));
    $smarty->assign('full_page',    1);

    $smarty->assign('user_ranks',   $ranks);

    assign_query_info();
    $smarty->display('news_list.htm');
}

/*------------------------------------------------------ */
//-- 翻页，排序
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'query')
{
    $ranks = array();
    $ranks = $db->getAll("SELECT * FROM " .$ecs->table('user_rank'));

    $smarty->assign('user_ranks',   $ranks);
    make_json_result($smarty->fetch('user_rank.htm'));
}

/*------------------------------------------------------ */
//-- 添加会员等级
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'add')
{
    admin_priv('user_rank');

    $rank['rank_id']      = 0;
    $rank['rank_special'] = 0;
    $rank['show_price']   = 1;
    $rank['min_points']   = 0;
    $rank['max_points']   = 0;
    $rank['discount']     = 100;

    $form_action          = 'insert';

    $smarty->assign('rank',        $rank);
    $smarty->assign('ur_here',     $_LANG['add_user_rank']);
    $smarty->assign('action_link', array('text' => $_LANG['05_user_rank_list'], 'href'=>'user_rank.php?act=list'));
    $smarty->assign('ur_here',     $_LANG['add_user_rank']);
    $smarty->assign('form_action', $form_action);

    assign_query_info();
    $smarty->display('user_rank_info.htm');
}

elseif ($_REQUEST['act'] == 'xitong')
{
    admin_priv('user_rank');

    // $rank['rank_id']      = 0;
    // $rank['rank_special'] = 0;
    // $rank['show_price']   = 1;
    // $rank['min_points']   = 0;
    // $rank['max_points']   = 0;
    // $rank['discount']     = 100;

    // $form_action          = 'insert';

    // $smarty->assign('rank',        $rank);
    // $smarty->assign('ur_here',     $_LANG['add_user_rank']);
    // $smarty->assign('action_link', array('text' => $_LANG['05_user_rank_list'], 'href'=>'user_rank.php?act=list'));
    // $smarty->assign('ur_here',     $_LANG['add_user_rank']);
    // $smarty->assign('form_action', $form_action);

    // assign_query_info();
    $smarty->display('news_xitong.htm');
}

/*------------------------------------------------------ */
//-- 增加会员等级到数据库
/*------------------------------------------------------ */

elseif ($_REQUEST['act'] == 'insert')
{
    //require(dirname(__FILE__) . '/../includes/function.php');
    $id = $_POST['id'];
    $content = $_POST['content'];
    // $add = array(
    //     'j_user_id' => $id,
    //     'add_time' => time(), 
    //     'type' => 1,
    //     'content' => $content,
    //     'is_kan' => 0,
    //     );
    if($_POST['type'] == 2){
        $sql = "INSERT INTO ecs_news (j_user_id,add_time,type,content,is_kan) VALUES(0,".gmtime().",2,'$content',0)";

                if($db->query($sql)){
                    //获取会员用户名
                    $sql = "select user_name from ecs_users where user_id = '$id'";
                    $username = $db->getOne($sql);
                    // $jpush = new ApipostAction();

                    // $jpush->send($username,'秀当网',$content);
                    // 
                    require_once(dirname(__FILE__) . "./../jpushapi/src/JPush/JPush.php");

            $br = '<br/>';
            $app_key = 'a9cedb1750cbd8a95be84b0d';
            $master_secret = '9adea0d8dd6474f789a5f18f';

            // 初始化
            $client = new JPush($app_key, $master_secret);

            // 简单推送示例
            $result = $client->push()
                ->setPlatform('all')
               // ->addAllAudience()
                ->addAlias(array($username))
                ->setNotificationAlert($content)
                ->addAndroidNotification('Hi, android notification', '您有一条新信息', 1, array("key1"=>"value1", "key2"=>"value2"))
                ->addIosNotification("Hi, iOS notification", 'iOS sound', JPush::DISABLE_BADGE, true, 'iOS category', array("key1"=>"value1", "key2"=>"value2"))
                ->setMessage("$content", '您有一条新信息', '1', array("key1"=>"value1", "key2"=>"value2"))
                ->setOptions(100000, 3600, null, false)
                ->send();


            //echo 'Result=' . json_encode($result) . $br;die;

            // 完整的推送示例,包含指定Platform,指定Alias,Tag,指定iOS,Android notification,指定Message等
            // $result = $client->push()
            //     ->setPlatform(array('ios', 'android'))
            //     ->addAlias($username)
            //     ->addTag(array($username))
            //     ->setNotificationAlert($content)
                // ->addAndroidNotification('Hi, android notification', '您有一条新信息', 1, array("key1"=>"value1", "key2"=>"value2"))
                // ->addIosNotification("Hi, iOS notification", 'iOS sound', JPush::DISABLE_BADGE, true, 'iOS category', array("key1"=>"value1", "key2"=>"value2"))
                // ->setMessage("$content", '您有一条新信息', '1', array("key1"=>"value1", "key2"=>"value2"))
            //     ->setOptions(100000, 3600, null, false)
            //     ->send();

            // echo 'Result=' . json_encode($result) . $br;die;


                    sys_msg('发送成功');
                }else{
                    sys_msg('发送失败');
                }
    }else{

     $sql = "INSERT INTO ecs_news (j_user_id,add_time,type,content,is_kan) VALUES('$id',".gmtime().",1,'$content',0)";

                if($db->query($sql)){
                    //获取会员用户名
                    $sql = "select user_name from ecs_users where user_id = '$id'";
                    $username = $db->getOne($sql);
                    // $jpush = new ApipostAction();

                    // $jpush->send($username,'秀当网',$content);
                    // 
                    require_once(dirname(__FILE__) . "./../jpushapi/src/JPush/JPush.php");

            $br = '<br/>';
            $app_key = 'a9cedb1750cbd8a95be84b0d';
            $master_secret = '9adea0d8dd6474f789a5f18f';

            // 初始化
            $client = new JPush($app_key, $master_secret);

            // 简单推送示例
            $result = $client->push()
                ->setPlatform('all')
               // ->addAllAudience()
                ->addAlias(array($username))
                ->setNotificationAlert($content)
                ->addAndroidNotification('Hi, android notification', '您有一条新信息', 1, array("key1"=>"value1", "key2"=>"value2"))
                ->addIosNotification("Hi, iOS notification", 'iOS sound', JPush::DISABLE_BADGE, true, 'iOS category', array("key1"=>"value1", "key2"=>"value2"))
                ->setMessage("$content", '您有一条新信息', '1', array("key1"=>"value1", "key2"=>"value2"))
                ->setOptions(100000, 3600, null, false)
                ->send();


            //echo 'Result=' . json_encode($result) . $br;die;

            // 完整的推送示例,包含指定Platform,指定Alias,Tag,指定iOS,Android notification,指定Message等
            // $result = $client->push()
            //     ->setPlatform(array('ios', 'android'))
            //     ->addAlias($username)
            //     ->addTag(array($username))
            //     ->setNotificationAlert($content)
                // ->addAndroidNotification('Hi, android notification', '您有一条新信息', 1, array("key1"=>"value1", "key2"=>"value2"))
                // ->addIosNotification("Hi, iOS notification", 'iOS sound', JPush::DISABLE_BADGE, true, 'iOS category', array("key1"=>"value1", "key2"=>"value2"))
                // ->setMessage("$content", '您有一条新信息', '1', array("key1"=>"value1", "key2"=>"value2"))
            //     ->setOptions(100000, 3600, null, false)
            //     ->send();

            // echo 'Result=' . json_encode($result) . $br;die;


                    sys_msg('发送成功');
                }else{
                    sys_msg('发送失败');
                }
    }
    
}

/*------------------------------------------------------ */
//-- 删除会员等级
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'remove')
{
    check_authz_json('user_rank');

    $id = intval($_GET['id']);
    $sql = "delete from ".$ecs->table('solicitation')." where id = '$id'";
    if($db->query($sql)){
    	sys_msg('删除成功');
    }else{
    	sys_msg('删除失败');
    }
    

}

/*------------------------------------------------------ */
//-- 查看会员消息列表
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'edit')
{
    //check_authz_json('user_rank');

    $id = intval($_GET['id']);
    $sql = "select * from ".$ecs->table('news')." where (f_user_id = '$id' || j_user_id = '$id')";



    $zhengji = $db->getAll($sql);
    
    foreach ($zhengji as $key => $value) {
        # code...
        if(!empty($zhengji[$key]['f_user_id'])){
            $ids = $zhengji[$key]['f_user_id'];
            $zhengji[$key]['huifu'] = '0';
        }
        if(!empty($zhengji[$key]['j_user_id'])){
            $ids = $zhengji[$key]['j_user_id'];
            $zhengji[$key]['huifu'] = '1';
        }

        //查询用户的信息
        $sql = "select user_name from ".$ecs->table('users'). "where user_id = $ids";
        $zhengji[$key]['user_name'] = $db->getOne($sql);
        $zhengji[$key]['add_time'] = local_date('Y-m-d H:i:s',$value['add_time']);


    }

    
    $smarty->assign('zhengji',$zhengji);
    $smarty->assign('id',$id);
    $smarty->display('news_edit.htm');

}

/*------------------------------------------------------ */
//-- 查看征集列表
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'update')
{
    //check_authz_json('user_rank');

    $id = intval($_GET['id']);
    $sql = "update ".$ecs->table('solicitation')." set school_name='$_POST[school_name]',sontact_person='$_POST[sontact_person]',contact_information='$_POST[contact_information]',recommended_reason='$_POST[recommended_reason]' where id = '$id'";
    if($db->query($sql)){
    	sys_msg('修改成功');
    }else{
    	sys_msg('修改失败');
    }

}
/*
 *  编辑会员等级名称
 */
elseif ($_REQUEST['act'] == 'edit_name')
{
    $id = intval($_REQUEST['id']);
    $val = empty($_REQUEST['val']) ? '' : json_str_iconv(trim($_REQUEST['val']));
    check_authz_json('user_rank');
    if ($exc->is_only('rank_name', $val, $id))
    {
        if ($exc->edit("rank_name = '$val'", $id))
        {
            /* 管理员日志 */
            admin_log($val, 'edit', 'user_rank');
            clear_cache_files();
            make_json_result(stripcslashes($val));
        }
        else
        {
            make_json_error($db->error());
        }
    }
    else
    {
        make_json_error(sprintf($_LANG['rank_name_exists'], htmlspecialchars($val)));
    }
}

/*
 *  ajax编辑积分下限
 */
elseif ($_REQUEST['act'] == 'edit_min_points')
{
    check_authz_json('user_rank');

    $rank_id = empty($_REQUEST['id']) ? 0 : intval($_REQUEST['id']);
    $val = empty($_REQUEST['val']) ? 0 : intval($_REQUEST['val']);

    $rank = $db->getRow("SELECT max_points, special_rank FROM " . $ecs->table('user_rank') . " WHERE rank_id = '$rank_id'");
    if ($val >= $rank['max_points'] && $rank['special_rank'] == 0)
    {
        make_json_error($_LANG['js_languages']['integral_max_small']);
    }

    if ($rank['special_rank'] ==0 && !$exc->is_only('min_points', $val, $rank_id))
    {
        make_json_error(sprintf($_LANG['integral_min_exists'], $val));
    }

    if ($exc->edit("min_points = '$val'", $rank_id))
    {
        $rank_name = $exc->get_name($rank_id);
        admin_log(addslashes($rank_name), 'edit', 'user_rank');
        make_json_result($val);
    }
    else
    {
        make_json_error($db->error());
    }
}

/*
 *  ajax修改积分上限
 */
elseif ($_REQUEST['act'] == 'edit_max_points')
{
     check_authz_json('user_rank');

    $rank_id = empty($_REQUEST['id']) ? 0 : intval($_REQUEST['id']);
    $val = empty($_REQUEST['val']) ? 0 : intval($_REQUEST['val']);

    $rank = $db->getRow("SELECT min_points, special_rank FROM " . $ecs->table('user_rank') . " WHERE rank_id = '$rank_id'");

    if ($val <= $rank['min_points'] && $rank['special_rank'] == 0)
    {
        make_json_error($_LANG['js_languages']['integral_max_small']);
    }

    if ($rank['special_rank'] ==0 && !$exc->is_only('max_points', $val, $rank_id))
    {
        make_json_error(sprintf($_LANG['integral_max_exists'], $val));
    }
    if ($exc->edit("max_points = '$val'", $rank_id))
    {
        $rank_name = $exc->get_name($rank_id);
        admin_log(addslashes($rank_name), 'edit', 'user_rank');
        make_json_result($val);
    }
    else
    {
        make_json_error($db->error());
    }
}

/*
 *  修改折扣率
 */
elseif ($_REQUEST['act'] == 'edit_discount')
{
    check_authz_json('user_rank');

    $rank_id = empty($_REQUEST['id']) ? 0 : intval($_REQUEST['id']);
    $val = empty($_REQUEST['val']) ? 0 : intval($_REQUEST['val']);

    if ($val < 1 || $val > 100)
    {
        make_json_error($_LANG['js_languages']['discount_invalid']);
    }

    if ($exc->edit("discount = '$val'", $rank_id))
    {
        $rank_name = $exc->get_name($rank_id);
         admin_log(addslashes($rank_name), 'edit', 'user_rank');
         clear_cache_files();
         make_json_result($val);
    }
    else
    {
        make_json_error($val);
    }
}

/*------------------------------------------------------ */
//-- 切换是否是特殊会员组
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'toggle_special')
{
    check_authz_json('user_rank');

    $rank_id       = intval($_POST['id']);
    $is_special    = intval($_POST['val']);

    if ($exc->edit("special_rank = '$is_special'", $rank_id))
    {
        $rank_name = $exc->get_name($rank_id);
        admin_log(addslashes($rank_name), 'edit', 'user_rank');
        make_json_result($is_special);
    }
    else
    {
        make_json_error($db->error());
    }
}
/*------------------------------------------------------ */
//-- 切换是否显示价格
/*------------------------------------------------------ */
elseif ($_REQUEST['act'] == 'toggle_showprice')
{
    check_authz_json('user_rank');

    $rank_id       = intval($_POST['id']);
    $is_show    = intval($_POST['val']);

    if ($exc->edit("show_price = '$is_show'", $rank_id))
    {
        $rank_name = $exc->get_name($rank_id);
        admin_log(addslashes($rank_name), 'edit', 'user_rank');
        clear_cache_files();
        make_json_result($is_show);
    }
    else
    {
        make_json_error($db->error());
    }
}

?>