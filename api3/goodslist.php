<?php
//APP获取商品列表接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */

$where = " is_delete = 0 ";

$cat_id = $_REQUEST['cat_id'];//分类id
if($cat_id){
	$cat_ids = getcategoryid($cat_id);
	$cat_ids[] = $cat_id;
	$where .= " and cat_id in (".implode(',',$cat_ids).") ";
}

$hot = $_REQUEST['hot'];//热卖

$hot && $where .= " and is_hot = ".$hot;

$new = $_REQUEST['new'];//新品

$new && $where .= " and is_new = ".$new;

$best = $_REQUEST['best'];//推荐

$best && $where .= " and is_best = ".$best;

$order = $_REQUEST['order'];//排序字段
$order = $order?$order:"goods_id";

$sort = $_REQUEST['sort'];//正序还是反序

$sort = $sort?$sort:"desc";



$http = str_replace('api3/goodslist.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 

$record_count = $db->getOne("SELECT COUNT(*) FROM " .$ecs->table('goods'). " WHERE " .$where);//统计总数
  
  $page = !empty($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;//获得页码
 $size = !empty($_REQUEST['size']) ? intval($_REQUEST['size']) : 10;//每页大小
 
 $pager  = get_pager('goods.php', array('act'=>'actions'), $record_count, $page,10);//分页处理
  
$sql = 'SELECT goods_id,market_price,shop_price,promote_price,goods_img,goods_name,promote_start_date,promote_end_date FROM '. $ecs->table("goods").' WHERE '.$where.' order by '.$order.' '.$sort;

$res = $db->selectLimit($sql, $size,$pager['start']);
//获取总页数
$count = ceil($record_count/$size);//总页数
$goodslist = array();
$goodss = array();

while ($row = $GLOBALS['db']->fetchRow($res))
    {
    	
    	$goodslist['goods_id'] = $row['goods_id'];
    	$goodslist['market_price'] = $row['market_price'];
    	$goodslist['shop_price'] = $row['shop_price'];
    	$goodslist['goods_img'] = $row['goods_img']?$http.$row['goods_img']:'';
    	$goodslist['goods_name'] = $row['goods_name'];
    	$goodslist['promote_start_date'] = $row['promote_start_date'];
    	$goodslist['promote_end_date'] = $row['promote_end_date'];
        
        if($goodslist['promote_start_date']< time() && $goodslist['promote_end_date'] > time()){
			$goodslist['price'] = $goodslist['promote_price'];//促销价
		}else{
			$goodslist['price'] = $goodslist['shop_price'];//本店价
		}

		$goodss[] = $goodslist;
    }

if(!$goodss){
	ajaxReturn(array('ret_code' => 0, 'msg' => '没有商城分类', 'data' => array()));
}
//20150216
// if($record_count){
// 	$goodss['record_count']  = $record_count;
// }
$pages = array('count'=>$count,'dqym'=>$pager['start']);//把当前页码和总页数反回给app
$goods  = array('goodslist'=>$goodss,'total_page'=>$count,'page'=>$page);

ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' =>$goods));


function getcategoryid($parent_id = 0){
	$check = $GLOBALS['db']->getRow('SELECT * FROM '.$GLOBALS['ecs']->table("category").' WHERE parent_id = '.$parent_id.' AND is_show = 1');
	$ids = array();
	if($check){
		$data = $GLOBALS['db']->getAll('SELECT cat_id FROM '.$GLOBALS['ecs']->table("category").' WHERE parent_id = '.$parent_id.' AND is_show = 1');
		foreach($data as $v){
			$ids[] = $v['cat_id'];
			$ids = array_merge($ids,getcategoryid($v['cat_id']));
		}
	}
	return $ids;
}