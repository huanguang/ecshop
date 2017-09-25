<?php
//APP获取商品列表接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');

$http = str_replace('api3/user.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 

$action = $_REQUEST['action'];//获取操作方法

$user_id = $_REQUEST['user_id'];//用户的ID

if (!isset($user_id) || $user_id == 0)
{
	ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请登陆', 'data' => array()));
}

/* 收藏商品
	需要参数
	user_id 会员ID
	action 操作方法 collect
	goods_id 商品ID
 */
if ($action == 'collect')//收藏商品
{
   
    $goods_id = $_REQUEST['goods_id'];//商品ID

    if (!isset($user_id) || $user_id == 0)
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，不能收藏商品', 'data' => array()));
    }
    else
    {
        /* 检查是否已经存在于用户的收藏夹 */
        $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ecs']->table('collect_goods') .
            " WHERE user_id='$user_id' AND goods_id = '$goods_id'";
        if ($GLOBALS['db']->GetOne($sql) > 0)
        {
            ajaxReturn(array('ret_code' => 0, 'msg' => '您已经收藏过该商品', 'data' => array()));
        }
        else
        {
            $time = gmtime();
            $sql = "INSERT INTO " .$GLOBALS['ecs']->table('collect_goods'). " (user_id, goods_id, add_time)" .
                    "VALUES ('$user_id', '$goods_id', '$time')";

            if ($GLOBALS['db']->query($sql) === false)
            {
                ajaxReturn(array('ret_code' => 0, 'msg' => '收藏失败', 'data' => array()));
            }
            else
            {
                ajaxReturn(array('ret_code' => 1, 'msg' => '收藏成功', 'data' => array()));
            }
        }
    }
}
/* 显示收藏商品列表
	需要参数
	user_id 会员ID
	action 操作方法 collect_list
	page 页码 默认为 1
 */
elseif ($action == 'collect_list')
{
    include_once(ROOT_PATH . 'includes/lib_clips.php');

    $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;//收藏列表翻页
	
    $record_count = $db->getOne("SELECT COUNT(*) FROM " .$ecs->table('collect_goods').
                                " WHERE user_id='$user_id' ORDER BY add_time DESC");

    $pager = get_pager('user.php', array('act' => $action), $record_count, $page);

    $collection_list = get_collection_goods2($user_id, $pager['size'], $pager['start']);
	
	foreach($collection_list as $k=>$v){
		$v['goods_img'] = $v['goods_img']?$http.$v['goods_img']:"";
		$v['price'] = $v['promote_price']?$v['promote_price']:$v['shop_price'];//实际价格
		$v['discount'] =  sprintf('%.1f', $v['price']/$v['market_price']*10); //折扣
		$collection_list[$k] = $v;
	}
	
	if(!$collection_list){
		ajaxReturn(array('ret_code' => 1, 'msg' => '没有收藏过商品', 'data' => array()));
	}else{
		
		$list = array("list"=>$collection_list,"page"=>$page,'total_page'=>ceil($record_count/10));
		ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $list));
		//echo json_encode(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $list));exit;
	}

}
/* 删除收藏的商品 
	需要参数
	user_id 会员ID
	action 操作方法 delete_collect
	collect_id 收藏的ID 多个ID以逗号格开 如： 1,2,3 当$conllect_id 等于 all 时删除所有收藏商品
 */
elseif ($action == 'delete_collect')
{
	
    include_once(ROOT_PATH . 'includes/lib_clips.php');

    $collect_id = $_REQUEST['collect_id'];//收藏的ID 多个ID以逗号格开 如： 1,2,3 当$conllect_id 等于 all 时删除所有收藏商品
	

	if($collect_id){
		if($collect_id == 'all'){
			$db->query('DELETE FROM ' .$ecs->table('collect_goods'). " WHERE user_id ='$user_id'" );
			
		}else{

			$db->query('DELETE FROM ' .$ecs->table('collect_goods'). " WHERE rec_id in ($collect_id) AND user_id ='$user_id'" );
		}
		ajaxReturn(array('ret_code' => 1, 'msg' => '删除成功', 'data' => array()));
	}else{
		ajaxReturn(array('ret_code' => 0, 'msg' => '删除失败', 'data' => array()));
	}
	
}
/*优惠卷
	需要参数
	user_id 会员ID
	action 操作方法 exchange
	status 状态  1全部 2未使用 3已使用 4已过期
 */
elseif($action == 'exchange'){

	include_once(ROOT_PATH . 'includes/lib_clips.php');
	$page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;//优惠券列表翻页
    


	$status = $_REQUEST['status']; //1全部 2未使用 3已使用 4已过期
	$status = $status?$status:1;
	if(empty($status)){
		ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
	}
	$where = '';
	if($status == 4){		
		$type_info = $db->getAll('SELECT type_id FROM '.$ecs->table("bonus_type").' WHERE type_id > 9 and use_end_date < '.gmtime());
		$type_ids = array();
		foreach($type_info as $v){
			$type_ids[] = $v['type_id'];
		}
		if(empty($type_ids)){
			ajaxReturn(array('ret_code' => 1, 'msg' => '没有已过期的优惠卷', 'data' => array()));
		}else{

				$where = ' and bonus_type_id in ('.implode(',',$type_ids).') and used_time = 0 ';
		}
	}elseif($status == 3){
		$where = ' and used_time > 0 ';
		
	}elseif($status == 2){
		
		$type_info = $db->getAll('SELECT type_id FROM '.$ecs->table("bonus_type").' WHERE type_id > 9 and use_start_date < '.gmtime().' and use_end_date > '.gmtime());
		$type_ids = array();
		foreach($type_info as $v){
			$type_ids[] = $v['type_id'];
		}
		$where = ' and bonus_type_id in ('.implode(',',$type_ids).') and used_time = 0';
		
	}else{
		$where = ' ';
		$type_info = $db->getAll('SELECT * FROM '.$ecs->table("bonus_type").' WHERE type_id > 9 and use_start_date < '.gmtime().' and use_end_date > '.gmtime());
		
	}

    $record_count = $db->getOne('SELECT count(*) FROM '.$ecs->table("user_bonus").' WHERE user_id = '.$user_id . $where);

			$pager = get_pager('user.php', array('act' => $action), $record_count, $page);
			$count_page = ceil($record_count/$pager['size']);  //总页数
			

			//var_dump($record_count);die;
	    $exchange_list = coupon($user_id, $pager['size'], $pager['start'],$where);
	    


	if($status ==1){
			foreach ($type_info as $key => $value) {
				# code...
				$type_info[$key]['send_start_date'] = local_date('m-d',$value['send_start_date']);
				$type_info[$key]['send_end_date'] = local_date('m-d',$value['send_end_date']);
				$type_info[$key]['use_start_date'] = local_date('m-d',$value['use_start_date']);
				$type_info[$key]['use_end_date'] = local_date('m-d',$value['use_end_date']);
				//$type_info[$key]['send_start_date'] = local_date('m-d',$value['send_start_date']);
			}

			$sdd = array('type_info'=>$type_info,'type_info_list'=>$exchange_list,'record_count'=>$count_page,'page'=>$page);

		ajaxReturn(array('ret_code' =>1, 'msg' => '获取成功', 'data' => $sdd));
	}else{
		if(empty($exchange_list)){
			ajaxReturn(array('ret_code' =>1, 'msg' => '当前优惠券为空', 'data' => array()));
		}else{
			ajaxReturn(array('ret_code' =>1, 'msg' => '获取成功', 'data' => $exchange_list,'record_count'=>$count_page,'page'=>$page));
		}
	}
}
/*领取优惠卷
	需要参数
	user_id 会员ID
	action 操作方法 user_exchange
	type_id 领取优惠卷ID  
 */
elseif($action == "user_exchange"){
	$type_id = $_REQUEST['type_id'];//领取优惠卷ID
	$integral = $db->getOne("select pay_points FROM ".$ecs->table("users")." where user_id = $user_id");//用户消费积分
	$bonus = $db->getRow("select * FROM ".$ecs->table("bonus_type")." where type_id = $type_id");//用户消费积分
	$duihuanjifen = $bonus['duihuanjifen'];

	if(checkuserpoint($user_id,$duihuanjifen,'积分兑换优惠券') == "-1"){
		ajaxReturn(array('ret_code' => 0, 'msg' => '您的消费积分不足以领取该优惠卷', 'data' => array()));
	}
	$change_desc = "用于领取《".$bonus['type_name']."》的优惠卷！";
	$time = gmtime();
	$sql = "insert into ".$ecs->table('user_bonus')."(bonus_type_id,bonus_sn,user_id,used_time,order_id,emailed,add_time) values($type_id,0,$user_id,0,0,1,$time)";
	if($db->query($sql)){
		//log_account_change($user_id,0,0,0,-$duihuanjifen, $change_desc);//消费积分记录
		
		ajaxReturn(array('ret_code' => 1, 'msg' => '领取优惠卷成功', 'data' => array()));
	}else{
		ajaxReturn(array('ret_code' => 1, 'msg' => '领取优惠卷失败', 'data' => array()));
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
 *  获取指定用户的收藏商品列表
 *
 * @access  public
 * @param   int     $user_id        用户ID
 * @param   int     $num            列表最大数量
 * @param   int     $start          列表其实位置
 *
 * @return  array   $arr
 */
function get_collection_goods2($user_id, $num = 10, $start = 0)
{
    $sql = 'SELECT g.goods_id, g.goods_name, g.market_price,g.goods_img, g.shop_price AS org_price, '.
                "IFNULL(mp.user_price, g.shop_price * '$_SESSION[discount]') AS shop_price, ".
                'g.promote_price, g.promote_start_date,g.promote_end_date, c.rec_id, c.is_attention' .
            ' FROM ' . $GLOBALS['ecs']->table('collect_goods') . ' AS c' .
            " LEFT JOIN " . $GLOBALS['ecs']->table('goods') . " AS g ".
                "ON g.goods_id = c.goods_id ".
            " LEFT JOIN " . $GLOBALS['ecs']->table('member_price') . " AS mp ".
                "ON mp.goods_id = g.goods_id AND mp.user_rank = '$_SESSION[user_rank]' ".
            " WHERE c.user_id = '$user_id' ORDER BY c.rec_id DESC";
    $res = $GLOBALS['db'] -> selectLimit($sql, $num, $start);

    $goods_list = array();
    $ass = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        if ($row['promote_price'] > 0)
        {
            $promote_price = bargain_price($row['promote_price'], $row['promote_start_date'], $row['promote_end_date']);
        }
        else
        {
            $promote_price = 0;
        }
       
        $goods_list['rec_id']        = $row['rec_id'];
        $goods_list['goods_img']  = $row['goods_img'];
        $goods_list['is_attention']  = $row['is_attention'];
        $goods_list['goods_id']      = $row['goods_id'];
        $goods_list['goods_name']    = $row['goods_name'];
        $goods_list['market_price']  = price_format($row['market_price']);
        $goods_list['shop_price']    = price_format($row['shop_price']);
        $goods_list['promote_price'] = ($promote_price > 0) ? price_format($promote_price) : '';
        $goods_list['url']           = build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);

        $ass[] = $goods_list;

    }
    
    return $ass;
}


/**
 *  获取指定用户的优惠券列表
 *
 * @access  public
 * @param   int     $user_id        用户ID
 * @param   int     $num            列表最大数量
 * @param   int     $start          列表其实位置
 *
 * @return  array   $arr
 */
function coupon($user_id, $num = 10, $start = 0,$where)
{

    $sql = 'SELECT * FROM '.$GLOBALS['ecs']->table("user_bonus").' WHERE user_id = '.$user_id . $where;
    $res = $GLOBALS['db'] -> selectLimit($sql, $num, $start);

    $goods_list = array();
    $ass = array();
    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        
       
        $goods_list['bonus_id']        = $row['bonus_id'];
        $goods_list['bonus_type_id']  = $row['bonus_type_id'];
        $goods_list['bonus_sn']  = $row['bonus_sn'];
        $goods_list['user_id']      = $row['user_id'];
        $goods_list['used_time']    = local_date('m-d',$row['used_time']);
        $goods_list['order_id']  = $row['order_id'];
        $goods_list['emailed']      = $row['emailed'];
        $goods_list['add_time']    = local_date('m-d',$row['add_time']);

        //查询优惠券的信息
        $sql = 'SELECT * FROM '.$GLOBALS['ecs']->table("bonus_type").' WHERE type_id = '.$row['bonus_type_id'];
        $yy = $GLOBALS['db']->getRow($sql);
        //var_dump($yy);die;
        $goods_list['type_id']    = $yy['type_id'];
        $goods_list['duihuanjifen']    = $yy['duihuanjifen'];
        $goods_list['youhui_img']    = $http.$yy['youhui_img'];
        $goods_list['type_name']    = $yy['type_name'];
        $goods_list['type_money']    = $yy['type_money'];
        $goods_list['send_type']    = $yy['send_type'];
        $goods_list['min_amount']    = $yy['min_amount'];
        $goods_list['send_start_date']    = local_date('m-d',$yy['send_start_date']);
        $goods_list['send_end_date']    = local_date('m-d',$yy['send_end_date']);
        $goods_list['use_start_date']    = local_date('m-d',$yy['use_start_date']);
        $goods_list['use_end_date']    = $yy['use_end_date'];
        $goods_list['min_goods_amount']    = $yy['min_goods_amount'];

        if($goods_list['used_time'] == '' && $goods_list['use_end_date'] > gmtime()){//未使用
					$goods_list['zhaungt'] = 2;
				}elseif($goods_list['used_time'] > 0){ //已经使用
					$goods_list['zhaungt'] = 3;
				}elseif($goods_list['used_time'] == '' && $goods_list['use_end_date'] < gmtime()){ //已经过期
					$goods_list['zhaungt'] = 4;
				}else{ //其他
					$goods_list['zhaungt'] = 0;
				}
		$goods_list['use_end_date']    = local_date('m-d',$yy['use_end_date']);


        // $goods_list['market_price']  = price_format($row['market_price']);
        // $goods_list['shop_price']    = price_format($row['shop_price']);
        // $goods_list['promote_price'] = ($promote_price > 0) ? price_format($promote_price) : '';
        // $goods_list['url']           = build_uri('goods', array('gid'=>$row['goods_id']), $row['goods_name']);
        $ass[] = $goods_list;

    }
    
    return $ass;
}