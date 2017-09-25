<?php
//APP会员签到接口
/*
*$user_id  会员id
**/
define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */

$user_id = isset($_REQUEST['user_id'])? $_REQUEST['user_id']:0;


 
//    $today = date("Y-m-d");
//    $day=getthemonth($today);

//    $kaishi = strtotime("$day[0]");
//    $end = strtotime("$day[1] 23:59:59"); //当前月最后一天时间戳

// //统计该用户的签到天数
//    $count_day = $db->getAll("select change_time from ecs_account_log where change_type = 0 and user_id = '$user_id' and change_time > '$kaishi' and change_time < '$end'");
   
// foreach ($count_day as $key => $value) {
//     # code...
//     $count_day[$key]['change_time'] = local_date('Y-m-d',$value['change_time']);
// }


 // $BeginDate=date('Y-m-01', strtotime(date("Y-m-d")));
 //   echo $BeginDate;
 //   echo "<br/>";
 //   echo strtotime("$BeginDate +1 month -1 day");
 //   echo date('Y-m-d H:i:s', strtotime("$BeginDate +1 month -1 day"));
 //   echo "<br/>";die;  
if(empty($user_id)){
   
        ajaxReturn(array('ret_code' => 0, 'msg' => '未登录', 'data' => array()));
    }else{
        //判断用户是否是连续登录签到
        $sql = " select * from ".$ecs->table('account_log')." where change_time < ".strtotime(date("Y-m-d"))." and change_time > ".(strtotime(date("Y-m-d"))-86400)." and change_type = 0 and user_id = ".$user_id;
        $shijian = $db->getRow($sql);
        //var_dump($shijian);die;
        if($shijian){
                //连续签到
                //查询今天是否签到，如果已经签到则不予签到
                    $sql = " select * from ".$ecs->table('account_log')." where change_time > ".strtotime(date("Y-m-d"))." and change_time < ".(strtotime(date("Y-m-d"))+86400)." and change_type = 0 and user_id = ".$user_id;
                    $qiandao = $db->getRow($sql);

                if(!$qiandao){
                    //连续签到积分进行累加的方式
                    $jifen = $qiandao['pay_points']+$_CFG['jifen_l'];
                    if($jifen > $_CFG['jifen_f']){
                       $jifen  =  $_CFG['jifen_s'];
                    }
                    $shi = time();
                    $sql =" insert into ".$ecs->table('account_log')."(user_id,pay_points,change_type,change_desc,change_time) values('$user_id','$jifen',0,'登录签到获得积分','$shi')";
                    $db->query($sql);
                    //记录签到总积分

                    $sql = " select * from ".$ecs->table('sign')." where user_id = ".$user_id;
                    $user_ids = $db->getRow($sql);
                    //修改总积分
                    $sql = " update ".$ecs->table('sign')." set sign_z = ".($user_ids['sign_z']+$jifen)." where user_id = ".$user_id;
                    $db->query($sql);
                    $jifen_s['zong'] = $user_ids['sign_z']+$jifen;
                    $jifen_s['jin'] = $jifen;
                    $jifen_s['error'] = '1';

                    ajaxReturn(array('ret_code' => 1, 'msg' => '签到成功', 'data' =>$jifen_s));
                }else{
                    //已经签到的处理
                    $jifen_s['error'] = '2';
                        ajaxReturn(array('ret_code' => 0, 'msg' => '已经签到！', 'data' => array()));
                }
        
            }else{

                //断开签到
                //查询今天是否签到，如果已经签到则不予签到
                $sql = " select * from ".$ecs->table('account_log')." where change_time > ".strtotime(date("Y-m-d"))." and change_time < ".(strtotime(date("Y-m-d"))+86400)." and change_type = 0 and user_id = ".$user_id;
                $qiandao = $db->getRow($sql);
                if(!$qiandao){
                        $shi = time();

                        $sql =" insert into ".$ecs->table('account_log')."(user_id,pay_points,change_type,change_desc,change_time) values('$user_id','$_CFG[jifen_s]',0,'登录签到获得积分','$shi')";
                        $db->query($sql);
                        //记录签到总积分

                        $sql = " select * from ".$ecs->table('sign')." where user_id = ".$user_id;
                        $user_ids = $db->getRow($sql);
                        //修改总积分
                        //查询积分记录表是否有用户的签到记录
                        $sql =" select * from ".$ecs->table('sign'). " where user_id = ".$user_id;
                        $sign = $db->getRow($sql);
                        if($sign){


                        $sql = " update ".$ecs->table('sign')." set sign_z = ".($user_ids['sign_z']+$_CFG['jifen_s'])." where user_id = ".$user_id;
                    }else{
                        $sql = "insert into  ".$ecs->table('sign')."(user_id,sign_z) values($user_id,'$_CFG[jifen_s]')";
                    }
                        $db->query($sql);
                        $jifen_s['zong'] = $user_ids['sign_z']+$_CFG['jifen_s'];
                        $jifen_s['jin'] = $_CFG['jifen_s'];
                         $jifen_s['error'] = '1';
                         ajaxReturn(array('ret_code' => 1, 'msg' => '签到成功', 'data' =>$jifen_s));
                    }else{
                    //已经签到的处理
                    ajaxReturn(array('ret_code' => 0, 'msg' => '已经签到！', 'data' => array()));
                    }
            }
            
    
    }



?>