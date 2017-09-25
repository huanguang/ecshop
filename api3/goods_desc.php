<?php
//APP获取商品列表接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */

$http = str_replace('api3/goods.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 
$action = !empty($_REQUEST['action']) ? $_REQUEST['action']:'desc';



$goods_id =  $_REQUEST['goods_id'];//商品ID

!$goods_id && ajaxReturn(array('ret_code' => 0, 'msg' => '参数丢失', 'data' => array()));

//$page = isset($_REQUEST['page'])  ? intval($_REQUEST['page']) : 1;//评论页数

$goods = $db->getRow('SELECT goods_desc FROM '. $ecs->table("goods").' WHERE goods_id = '.$goods_id);

//if($goods['promote_start_date']< time() && $goods['promote_end_date'] > time()){
	//$goods['price'] = $goods['promote_price'];//促销价
//}else{
	//$goods['price'] = $goods['shop_price'];//本店价
//}
$goods['rank'] = get_goods_rank($goods_id);

$at = get_goods_properties($goods_id);
$attr = $at['pro']['商品属性'];//商品属性
$str = '<table style="border-left: 0px; border-right:0px;" cellpadding="6" width="100%" border="1" cellspacing="0" >';
foreach ($attr as $key => $value) {
    $str .= '<tr style="color:#999;width:100%;font-size:1em" >
        <td style="border-left:none; border-right:none; color:#999; padding: 10px 0px;">'.$value['name'].'</td>
        <td style="border-left:none; border-right:none; color:#000; padding: 10px 0px;">'.$value['value'].'</td>
      </tr>'
      ;
}
$str .= '</table>';


  




//$count = $db->getOne('SELECT COUNT(*) FROM ' .$ecs->table('comment')." WHERE id_value = '$goods_id' AND comment_type = '0' AND status = 1 AND parent_id = 0");//商品评论总数
//$goods['comment_count'] = $count;
//$comment = assign_comment($goods_id,0,$page);//商品评论
//foreach($comment['comments'] as $k=>$v ){
	//$v['head_portrait'] =  $http.'data/'.$v['head_portrait'];
	//$comment['comments'][$k] = $v;
//}
//$photo = get_goods_gallery($goods_id);//商品相册

// foreach($photo as $k=>$v){
// 	$v['img_url'] = $http.$v['img_url'];
// 	$v['thumb_url'] = $http.$v['thumb_url'];
// 	$photo[$k] = $v;
// }

//$fitting = get_goods_fittings(array($goods_id));// 配件套餐

// if(!$goods){
// 	ajaxReturn(array('ret_code' => 0, 'msg' => '没有获取到数据', 'data' => array()));
// }

$goodsinfo = array("info"=>$goods,"attr"=>$str);
$dd = '<div style="width:100%">';
$cc = '</div>';
if($action == 'desc'){
    echo $dd.$goods['goods_desc'].$cc;
}else{
    echo $str;
}
//ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' =>$goodsinfo));


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
