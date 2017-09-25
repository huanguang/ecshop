<?php
//APP会员签到接口
/*
*$user_id  会员id
**/
define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */

$user_id = isset($_REQUEST['user_id'])? $_REQUEST['user_id']:0;

if(empty($user_id)){
   
        ajaxReturn(array('ret_code' => 0, 'msg' => '未登录', 'data' => array()));
    }
 
   $today = date("Y-m-d");
   $day=getthemonth($today);

   $kaishi = strtotime("$day[0]");
   $end = strtotime("$day[1] 23:59:59"); //当前月最后一天时间戳

//统计该用户的签到天数
   $count_day = $db->getAll("select change_time from ecs_account_log where change_type = 0 and user_id = '$user_id' and change_time > '$kaishi' and change_time < '$end'");
  if(empty($count_day)){
  	ajaxReturn(array('ret_code' => 1, 'msg' => '本月还没有签到记录', 'data' => array()));
  }

foreach ($count_day as $key => $value) {
    # code...
    $count_day[$key]['change_time'] = local_date('Y-m-d',$value['change_time']);
}

ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $count_day));







function getthemonth($date)
   {
   $firstday = date('Y-m-01', strtotime($date));
   $lastday = date('Y-m-d', strtotime("$firstday +1 month -1 day"));
   return array($firstday,$lastday);
   }