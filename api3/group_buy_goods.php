<?php
//APP获取某个分类里面的团购商品

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');

$cat_id = !empty($_REQUEST['cat_id']) ? intval($_REQUEST['cat_id']) : 0;//获得分类id

if(empty($cat_id)){
	ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
}
$http = str_replace('api3/group_buy_goods.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));

$sql = " select count(*) from ".$GLOBALS['ecs']->table('goods_activity'). " as a LEFT JOIN ".$GLOBALS['ecs']->table('goods'). " as b on a.goods_id = b.goods_id where b.cat_id = ".$cat_id;

$record_count = $db->getOne($sql);//统计总数
  
  $page = !empty($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;//获得页码
 $size = !empty($_REQUEST['size']) ? intval($_REQUEST['size']) : 10;//每页大小
 $pager  = get_pager('goods.php', array('act'=>'actions'), $record_count, $page,10);//分页处理
//获取总页数
$count = ceil($record_count/$size);//总页数

$sql = " select a.act_name,a.ext_info,b.goods_id,a.end_time,a.act_desc,b.shop_price,a.act_desc2,b.market_price,a.act_id,b.goods_img,b.goods_name from ".$GLOBALS['ecs']->table('goods_activity'). " as a LEFT JOIN ".$GLOBALS['ecs']->table('goods'). " as b on a.goods_id = b.goods_id where b.cat_id = ".$cat_id;
$res = $db->selectLimit($sql, $size,$pager['start']);

$goods = array();
$goodss = array();
while ($row = $GLOBALS['db']->fetchRow($res))
    {
    	
    		$goods['zhekou'] = sprintf('%.2f',$row['shop_price']/$row['market_price']);
			$goods['jianjiage'] = $row['market_price'] - $res['shop_price'];
			$goods['ext_info'] = unserialize($row['ext_info']);
			$goods['goods_img'] = $http.$row['goods_img'];
			$goods['goods_name'] = $row['goods_name'];
			$goods['shop_price'] = $row['shop_price'];
			$goods['market_price'] = $row['market_price'];
            $goods['goods_id'] = $row['goods_id'];
            $goods['end_time'] = local_date('Y-m-d H:i:s',$row['end_time']);
            $cle = round(($row['end_time']-gmtime()));
            
            $d = floor($cle/3600/24);
            $h = floor(($cle%(3600*24))/3600);  //%取余
            $m = floor(($cle%(3600*24))%3600/60);
            $s = floor(($cle%(3600*24))%60);
            
            $goods['shengytime'] = "剩余 $d 天 $h 小时 $m 分 $s 秒";

            $goods['start_time'] = local_date('Y-m-d H:i:s',$row['start_time']);

			$goods['tongji'] = group_buy_stats2($row['act_id'],$goods['ext_info']['deposit']);
            $row['ext_info'] = unserialize($row['ext_info']);
            $row['tongji'] = unserialize($row['tongji']);
            
			$goods['shengyu'] = $row['ext_info']['restrict_amount'] - $row['tongji']['valid_goods'];

            

		$goodss[] = $goods;
    }
//获取团购页面的广告

    $sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 40 AND enabled = 1 ';
    $ad = $db->getAll($sql);

    foreach ($ad as $key => $value) {
    	$ad[$key]['ad_code'] = $http.'data/afficheimg/'.$value['ad_code'];
    }

$goods  = array('goodslist'=>$goodss,'total_page'=>$count,'page'=>$page,'ad'=>$ad);
ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $goods));










/*
 * 取得某团购活动统计信息
 * @param   int     $group_buy_id   团购活动id
 * @param   float   $deposit        保证金
 * @return  array   统计信息
 *                  total_order     总订单数
 *                  total_goods     总商品数
 *                  valid_order     有效订单数
 *                  valid_goods     有效商品数
 */
function group_buy_stats2($group_buy_id, $deposit)
{
    $group_buy_id = intval($group_buy_id);

    /* 取得团购活动商品ID */
    $sql = "SELECT goods_id " .
           "FROM " . $GLOBALS['ecs']->table('goods_activity') .
           "WHERE act_id = '$group_buy_id' " .
           "AND act_type = '" . GAT_GROUP_BUY . "'";
    $group_buy_goods_id = $GLOBALS['db']->getOne($sql);

    /* 取得总订单数和总商品数 */
    $sql = "SELECT COUNT(*) AS total_order, SUM(g.goods_number) AS total_goods " .
            "FROM " . $GLOBALS['ecs']->table('order_info') . " AS o, " .
                $GLOBALS['ecs']->table('order_goods') . " AS g " .
            " WHERE o.order_id = g.order_id " .
            "AND o.extension_code = 'group_buy' " .
            "AND o.extension_id = '$group_buy_id' " .
            "AND g.goods_id = '$group_buy_goods_id' " .
            "AND (order_status = '" . OS_CONFIRMED . "' OR order_status = '" . OS_UNCONFIRMED . "')";
    $stat = $GLOBALS['db']->getRow($sql);
    if ($stat['total_order'] == 0)
    {
        $stat['total_goods'] = 0;
    }

    /* 取得有效订单数和有效商品数 */
    $deposit = floatval($deposit);
    if ($deposit > 0 && $stat['total_order'] > 0)
    {
        $sql .= " AND (o.money_paid + o.surplus) >= '$deposit'";
        $row = $GLOBALS['db']->getRow($sql);
        $stat['valid_order'] = $row['total_order'];
        if ($stat['valid_order'] == 0)
        {
            $stat['valid_goods'] = 0;
        }
        else
        {
            $stat['valid_goods'] = $row['total_goods'];
        }
    }
    else
    {
        $stat['valid_order'] = $stat['total_order'];
        $stat['valid_goods'] = $stat['total_goods'];
    }

    return $stat;
}