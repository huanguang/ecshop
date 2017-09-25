<?php
//APP获取商品列表接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */

$http = str_replace('api3/goods.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 

$goods_id =  $_REQUEST['goods_id'];//商品ID

!$goods_id && ajaxReturn(array('ret_code' => 0, 'msg' => '参数丢失', 'data' => array()));

//$page = isset($_REQUEST['page'])  ? intval($_REQUEST['page']) : 1;//评论页数

$goods = $db->getRow('SELECT goods_id,market_price,shop_price,promote_price,goods_desc,goods_name,promote_start_date,promote_end_date FROM '. $ecs->table("goods").' WHERE goods_id = '.$goods_id);

if($goods['promote_start_date']< time() && $goods['promote_end_date'] > time()){
	$goods['price'] = $goods['promote_price'];//促销价
}else{
	$goods['price'] = $goods['shop_price'];//本店价
}
$goods['rank'] = get_goods_rank($goods_id);


//获取商品的销量

$goods['xiaoliang'] = get_buy_sum_s($goods_id);


if(empty($goods['xiaoliang'])){
    $goods['xiaoliang'] = 0;
}

//$at = get_goods_properties($goods_id);

//$attr = $at['pro']['商品属性'];//商品属性


//$count = $db->getOne('SELECT COUNT(*) FROM ' .$ecs->table('comment')." WHERE id_value = '$goods_id' AND comment_type = '0' AND status = 1 AND parent_id = 0");//商品评论总数
//$goods['comment_count'] = $count;
//$comment = assign_comment($goods_id,0,$page);//商品评论
// foreach($comment['comments'] as $k=>$v ){
// 	$v['head_portrait'] =  $http.'data/'.$v['head_portrait'];
// 	$comment['comments'][$k] = $v;
// }
$photo = get_goods_gallery($goods_id);//商品相册


foreach($photo as $k=>$v){
	$v['img_url'] = $http.$v['img_url'];
	$v['thumb_url'] = $http.$v['thumb_url'];
	$photo[$k] = $v;
}



//显示是否已经收藏该商品
    $user_id = isset($_REQUEST['user_id'])  ? intval($_REQUEST['user_id']) : 0;
    if(!empty($user_id)){
        //查询该商品是否已经收藏
        /* 检查是否已经存在于用户的收藏夹 */
        $sql = "SELECT COUNT(*) FROM " .$GLOBALS['ecs']->table('collect_goods') .
            " WHERE user_id='$user_id' AND goods_id = '$goods_id'";
        if ($GLOBALS['db']->getOne($sql) > 0)
        {

            $sql = "SELECT rec_id FROM " .$GLOBALS['ecs']->table('collect_goods') .
            " WHERE user_id='$user_id' AND goods_id = '$goods_id'";
            $shouc_id = $GLOBALS['db']->getOne($sql);

            $shouc = 1;
        }else{
            $shouc_id = 0;
            $shouc = 0;
        }
    }else{
        $shouc_id = 0;
        $shouc = 3;
    }


$fitting = get_goods_fittings(array($goods_id));// 配件套餐
//var_dump($fitting);die;

foreach ($fitting as $key => $value) {
    # code...
    $fitting[$key]['goods_thumb'] = $http.$value['goods_thumb'];
    $fitting[$key]['goods_img'] = $http.$value['goods_img'];
}

if(!$goods){
	ajaxReturn(array('ret_code' => 0, 'msg' => '没有获取到数据', 'data' => array()));
}

$goodsinfo = array("info"=>$goods,"photo"=>$photo,'is_shouc'=>$shouc,'rec_id'=>$shouc_id,'fitting'=>$fitting);

ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' =>$goodsinfo));


/**
 * 获得指定商品的销售排名
 *
 * @access  public
 * @param   integer     $goods_id
 * @return  integer
 */
function get_goods_rank($goods_id)
{
    /* 统计时间段 */
    $period = intval($GLOBALS['_CFG']['top10_time']);
    if ($period == 1) // 一年
    {
        $ext = " AND o.add_time > '" . local_strtotime('-1 years') . "'";
    }
    elseif ($period == 2) // 半年
    {
        $ext = " AND o.add_time > '" . local_strtotime('-6 months') . "'";
    }
    elseif ($period == 3) // 三个月
    {
        $ext = " AND o.add_time > '" . local_strtotime('-3 months') . "'";
    }
    elseif ($period == 4) // 一个月
    {
        $ext = " AND o.add_time > '" . local_strtotime('-1 months') . "'";
    }
    else
    {
        $ext = '';
    }

    /* 查询该商品销量 */
    $sql = 'SELECT IFNULL(SUM(g.goods_number), 0) ' .
        'FROM ' . $GLOBALS['ecs']->table('order_info') . ' AS o, ' .
            $GLOBALS['ecs']->table('order_goods') . ' AS g ' .
        "WHERE o.order_id = g.order_id " .
        "AND o.order_status = '" . OS_CONFIRMED . "' " .
        "AND o.shipping_status " . db_create_in(array(SS_SHIPPED, SS_RECEIVED)) .
        " AND o.pay_status " . db_create_in(array(PS_PAYED, PS_PAYING)) .
        " AND g.goods_id = '$goods_id'" . $ext;
    $sales_count = $GLOBALS['db']->getOne($sql);

    if ($sales_count > 0)
    {
        /* 只有在商品销售量大于0时才去计算该商品的排行 */
        $sql = 'SELECT DISTINCT SUM(goods_number) AS num ' .
                'FROM ' . $GLOBALS['ecs']->table('order_info') . ' AS o, ' .
                    $GLOBALS['ecs']->table('order_goods') . ' AS g ' .
                "WHERE o.order_id = g.order_id " .
                "AND o.order_status = '" . OS_CONFIRMED . "' " .
                "AND o.shipping_status " . db_create_in(array(SS_SHIPPED, SS_RECEIVED)) .
                " AND o.pay_status " . db_create_in(array(PS_PAYED, PS_PAYING)) . $ext .
                " GROUP BY g.goods_id HAVING num > $sales_count";
        $res = $GLOBALS['db']->query($sql);

        $rank = $GLOBALS['db']->num_rows($res) + 1;

        if ($rank > 10)
        {
            $rank = 0;
        }
    }
    else
    {
        $rank = 0;
    }

    return $rank;
}


function get_buy_sum_s($goods_id) 
{

$sql = "select sum(goods_number) from " . $GLOBALS['ecs']->table('order_goods') . " AS g ,".$GLOBALS['ecs']->table('order_info') . " AS o WHERE o.order_id=g.order_id and g.goods_id = " . $goods_id  ;
return $GLOBALS['db']->getOne($sql);

}

