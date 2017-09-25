<?php
//APP获取积分抽奖

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');

$res['lg'] = $_REQUEST['lg'];//获取抽奖的等级

$user_id = $_REQUEST['user_id'];

if(empty($user_id)){
    ajaxReturn(array('ret_code' => 0, 'msg' => '请登录', 'data' => array()));
}
if(intval($_REQUEST['lg']) <= 0){
    ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
}

//获取积分抽奖所需要的积分
    $sql = "select value from ecs_shop_config where id = 913";
    $jifen_chou = $db->getOne($sql);

checkuserpoint($user_id,$jifen_chou,'积分抽奖');

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
            ajaxReturn(array('ret_code' => 1, 'msg' => '恭喜您，获得了1等奖', 'data' => array()));


        }

        //二等奖    用户抽奖中的是实物奖品（精美礼品）
        if($res['lg'] == '2'){
            //精美礼品有客户后台自行发货，不需要任何操作
            ajaxReturn(array('ret_code' => 1, 'msg' => '恭喜您，获得了2等奖', 'data' => array()));
        }

        //三等奖    用户抽奖中的是实物奖品（优惠券20）
        if($res['lg'] == '3'){
            //给用户添加优惠券
            $sql =" insert into ".$GLOBALS['ecs']->table('user_bonus'). " (bonus_type_id,user_id,emailed) values(22,$user_id,1)";
            $GLOBALS['db']->query($sql);
            ajaxReturn(array('ret_code' => 1, 'msg' => '恭喜您，获得了3等奖', 'data' => array()));
        }
        //四等奖    用户抽奖中的是实物奖品（优惠券10）
        if($res['lg'] == '4'){
            //给用户添加优惠券
            $sql =" insert into ".$GLOBALS['ecs']->table('user_bonus'). " (bonus_type_id,user_id,emailed) values(21,$user_id,1)";
            $GLOBALS['db']->query($sql);
            ajaxReturn(array('ret_code' => 1, 'msg' => '恭喜您，获得了4等奖', 'data' => array()));
        }
        //五等奖    用户抽奖中的是实物奖品（积分30）
        if($res['lg'] == '5'){
            //修改用户积分总额度
            get_exchange_lntegral_winningt($user_id,30);
            ajaxReturn(array('ret_code' => 1, 'msg' => '恭喜您，获得了5等奖', 'data' => array()));
        }

        //六等奖    用户抽奖中的是实物奖品（积分20）
        if($res['lg'] == '6'){

            get_exchange_lntegral_winningt($user_id,20);
            ajaxReturn(array('ret_code' => 10, 'msg' => '恭喜您，获得了6等奖', 'data' => array()));
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