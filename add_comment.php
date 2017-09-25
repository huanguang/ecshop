<?php
//APP提交评价内容

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');









$user_id = $_REQUEST['user_id'];
$content = $_REQUEST['content'];
$comment_rank = $_REQUEST['comment_rank'];
$id = $_REQUEST['id'];
$type_lei = $_REQUEST['type_lei']; //是否是匿名评价（1，匿名；2，不是匿名；默认不是匿名2）
$type = 0;


//获取用户的邮箱

$sql = "select email,user_name from ecs_users where user_id = $user_id";
$user = $db->getRow($sql);


$cmt['type'] = $type;
$cmt['id'] = $id;
$cmt['rank'] = $comment_rank;
$cmt['content'] = $content;
$cmt['user_name'] = $user['user_name'];
$cmt['email'] = $user['email'];
$cmt['user_id'] = $user_id;

if($type_lei ==1){
 $cmt['user_name'] = '匿名';   
}

if(empty($user_id)){
    ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请先登录', 'data' => array()));
}
if(empty($content)){
    ajaxReturn(array('ret_code' => 0, 'msg' => '请输入评价内容', 'data' => array()));
}
if(empty($comment_rank)){
    ajaxReturn(array('ret_code' => 0, 'msg' => '请选择评价等级', 'data' => array()));
}
if(empty($id)){
    ajaxReturn(array('ret_code' => 0, 'msg' => '请选择要评价的商品', 'data' => array()));
}




/* 没有验证码时，用时间来限制机器人发帖或恶意发评论 */
            if (!isset($_SESSION['send_time']))
            {
                $_SESSION['send_time'] = 0;
            }
            
            $cur_time = gmtime();
            if (($cur_time - $_SESSION['send_time']) < 30) // 小于30秒禁止发评论
            {

                ajaxReturn(array('ret_code' => 0, 'msg' => '服务器错误，请稍后再来', 'data' => array()));
            }
            else
            {

                $factor = intval($_CFG['comment_factor']);
                $factor = COMMENT_BOUGHT;
                
                if ($type == 0 && $factor > 0)
                {
                    /* 只有商品才检查评论条件 */
                    switch ($factor)
                    {
                        case COMMENT_LOGIN :
                            if ($user_id == 0)
                            {

                                ajaxReturn(array('ret_code' => 0, 'msg' => '此商品需要登录后才能评价', 'data' => array()));
                            }
                            

                        case COMMENT_CUSTOM :
                            if ($user_id > 0)
                            {
                                $sql = "SELECT o.order_id FROM " . $ecs->table('order_info') . " AS o ".
                                       " WHERE user_id = '" . $user_id . "'".
                                       " AND (o.order_status = '" . OS_CONFIRMED . "' or o.order_status = '" . OS_SPLITED . "') ".
                                       " AND (o.pay_status = '" . PS_PAYED . "' OR o.pay_status = '" . PS_PAYING . "') ".
                                       " AND (o.shipping_status = '" . SS_SHIPPED . "' OR o.shipping_status = '" . SS_RECEIVED . "') ".
                                       " LIMIT 1";


                                 $tmp = $db->getOne($sql);
                                 if (empty($tmp))
                                 {

                                    ajaxReturn(array('ret_code' => 0, 'msg' => '评论失败。只有在本店购买过商品的注册会员才能发表评论。', 'data' => array()));
                                 }
                            }
                            else
                            {
                                ajaxReturn(array('ret_code' => 0, 'msg' => '评论失败。只有在本店购买过商品的注册会员才能发表评论。', 'data' => array()));
                            }
                            

                        case COMMENT_BOUGHT :
                            if ($user_id > 0)
                            {
                                $sql = "SELECT o.order_id".
                                       " FROM " . $ecs->table('order_info'). " AS o, ".
                                       $ecs->table('order_goods') . " AS og ".
                                       " WHERE o.order_id = og.order_id".
                                       " AND o.user_id = '" . $user_id . "'".
                                       " AND og.goods_id = '" . $id . "'".
                                       " AND (o.order_status = '" . OS_CONFIRMED . "' or o.order_status = '" . OS_SPLITED . "') ".
                                       " AND (o.pay_status = '" . PS_PAYED . "' OR o.pay_status = '" . PS_PAYING . "') ".
                                       " AND (o.shipping_status = '" . SS_SHIPPED . "' OR o.shipping_status = '" . SS_RECEIVED . "') ".
                                       " LIMIT 1";
                                 $tmp = $db->getOne($sql);
                                 if (empty($tmp))
                                 {
                                    
                                    
                                    ajaxReturn(array('ret_code' => 0, 'msg' => '评论失败。只有购买过此商品的注册用户才能评论该商品', 'data' => array()));
                                 }
                            }
                            else
                            {
                                
                                ajaxReturn(array('ret_code' => 0, 'msg' => '评论失败。只有购买过此商品的注册用户才能评论该商品', 'data' => array()));
                            }
                            
                    }
                }
                else{
                    
                    ajaxReturn(array('ret_code' => 0, 'msg' => '当前不能进行评价', 'data' => array()));  
                }

                /* 无错误就保存留言 */


                //获取接收的图片
                

                //接收传过来的图片
                if(!empty($_FILES)){
                    include_once(ROOT_PATH . 'includes/cls_image.php');
                    $image = new cls_image($_CFG['bgcolor']);//实力化
                    $arr = array();
                    $arrs = array();
                    foreach ($_FILES as $key => $value) {
                        # code...
                        /* 处理图片 */
                        $dd = date("Y-m/d");
                        $litpic = basename($image->upload_image($_FILES[$key],'pinglun/'.$dd));
                        //$litpic = upload_file($_FILES['file'],'litpic/'.$dd);
                        $arr['lujing'] = $http.'pinglun/'.$dd.'/'.$litpic;
                        $arrs[] = $arr;
                        }
                    }

                    if(add_comment($cmt, $arrs)){
                        $_SESSION['send_time'] = $cur_time;
                        ajaxReturn(array('ret_code' => 1, 'msg' => '评价成功', 'data' => array())); 
                    }else{
                       ajaxReturn(array('ret_code' => 0, 'msg' => '评价失败', 'data' => array()));  
                    }
                    
                

            }



/**
 * 添加评论内容
 *
 * @access  public
 * @param   object  $cmt
 * @return  void
 */
function add_comment($cmt,$datas = array())
{
    /* 评论是否需要审核 */
    $status = 1 - $GLOBALS['_CFG']['comment_check'];

    $type = $cmt['type'];
    $user_id = $cmt['user_id'];
    $email = $cmt['email'];
    $user_name = $cmt['user_name'];
    $content = $cmt['content'];
    $rank = $cmt['rank'];
    $id = $cmt['id'];

    /* 保存评论内容 */
    $sql = "INSERT INTO " .$GLOBALS['ecs']->table('comment') .
           "(comment_type, id_value, email, user_name, content, comment_rank, add_time, ip_address, status, parent_id, user_id) VALUES " .
           "('" .$type. "', '" .$id. "', '$email', '$user_name', '" .$content."', '".$rank."', ".gmtime().", '".real_ip()."', '$status', '0', '$user_id')";

    $result = $GLOBALS['db']->query($sql);
    $id = mysql_insert_id();
    
    //插入评论图片
    foreach ($datas as $key => $value) {
        $sql = "INSERT INTO " .$GLOBALS['ecs']->table('comment_img') .
           "(img, comment_id) VALUES " .
           "('$value[lujing]',$id)";

    $GLOBALS['db']->query($sql);
    }
        return true;
}