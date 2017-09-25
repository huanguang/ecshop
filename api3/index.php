<?php
//APP获取首页数据

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');
$http = str_replace('api3/index.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));	

//获取首页轮播图广告
	$sql = 'SELECT ad_link,ad_code FROM '. $ecs->table("ad").' WHERE position_id = 14 AND enabled = 1 ';
    
    $ad = $db->getAll($sql);

    foreach ($ad as $key => $value) {
    	$ad[$key]['ad_code'] = $http.'data/afficheimg/'.$value['ad_code'];
    }

    

 //获取所有的热卖商品
    $goodslist = get_recommend_goods_bak('hot');
    //ajaxReturn($goodslist);die;

    foreach ($goodslist as $key => $value) {
    	# code...
    	$goodslist[$key]['thumb'] = $http.$value['thumb'];
    	$goodslist[$key]['goods_img'] = $http.$value['goods_img'];
    }


    //获取分类
    $category = get_categories_tree_api();
    

    //返回三组数据
    $ads = array();
    foreach ($category as $key => $value) {
    	# code...
    	if($value['id'] == 211 || $value['id'] == 212 || $value['id'] == 213){
    		unset($category[$key]);
    	}
    	$ads[] = $value;
    }

    $list = array('ad'=>$ad,'goodslist'=>$goodslist,'category'=>$ads);



    
    
    ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $list));




    /**
 * 获得指定分类同级的所有分类以及该分类下的子分类
 *
 * @access  public
 * @param   integer     $cat_id     分类编号
 * @return  array
 */
function get_categories_tree_api($cat_id = 0)
{
	$http = str_replace('api3/index.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));
    if ($cat_id > 0)
    {
        $sql = 'SELECT parent_id FROM ' . $GLOBALS['ecs']->table('category') . " WHERE cat_id = '$cat_id'";
        $parent_id = $GLOBALS['db']->getOne($sql);
    }
    else
    {
        $parent_id = 0;
    }

    /*
     判断当前分类中全是是否是底级分类，
     如果是取出底级分类上级分类，
     如果不是取当前分类及其下的子分类
    */
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('category') . " WHERE parent_id = '$parent_id' AND is_show = 1 ";
    if ($GLOBALS['db']->getOne($sql) || $parent_id == 0)
    {
        /* 获取当前分类及其子分类 */
        $sql = 'SELECT cat_id,cat_name ,parent_id,is_show,cat_img ' .
                'FROM ' . $GLOBALS['ecs']->table('category') .
                "WHERE parent_id = '$parent_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";

        $res = $GLOBALS['db']->getAll($sql);
        $arr = array();
        foreach ($res AS $row)
        {
            if ($row['is_show'])
            {
                $cat_arr['id']   = $row['cat_id'];
                $cat_arr['name'] = $row['cat_name'];
                $cat_arr['cat_img'] = $http.'data/category/'.$row['cat_img'];
                //$cat_arr['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);

                if (isset($row['cat_id']) != NULL)
                {
                    $cat_arr['cat_id'] = get_child_tree($row['cat_id']);
                }
                $arr[] = $cat_arr;
            }
        }
    }
    if(isset($cat_arr))
    {
        return $arr;
    }
}