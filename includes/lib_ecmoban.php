<?php

/**
 * ECSHOP EC模板堂二次开发函数库
 * ============================================================================
 * * 版权所有 2005-2013 上海商创网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.ecmoban.com；
 * ----------------------------------------------------------------------------
 * ============================================================================
 * $Id: lib_ecmoban.php 1.0 2013-10-30 $
*/

if (!defined('IN_ECS'))
{
    die('Hacking attempt');
}
 
/**
 * 获得指定分类同级的所有分类以及该分类下的子分类
 *
 * @access  public
 * @param   integer     $cat_id     分类编号
 * @return  array
 */
function get_categories_tree_pro($cat_id = 0)
{
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
        $sql = 'SELECT cat_id,cat_name ,cat_desc,keywords,parent_id,is_show,cat_img ' .
                'FROM ' . $GLOBALS['ecs']->table('category') .
                "WHERE parent_id = '$parent_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";

        $res = $GLOBALS['db']->getAll($sql);

        foreach ($res AS $row)
        {
			$cat_id = $row['cat_id'];
			$children = get_children($cat_id);
			$cat = $GLOBALS['db']->getRow('SELECT cat_name, keywords, cat_desc, style, grade, filter_attr, parent_id FROM ' . $GLOBALS['ecs']->table('category') .
        " WHERE cat_id = '$cat_id'");

			/* 获取分类下文章 */
			$sql = 'SELECT a.article_id, a.title, ac.cat_name, a.add_time, a.file_url, a.open_type FROM '.$GLOBALS['ecs']->table('article_cat').' AS ac RIGHT JOIN '.$GLOBALS['ecs']->table('article')." AS a ON a.cat_id=ac.cat_id AND a.is_open = 1 WHERE ac.cat_name='$row[cat_name]' ORDER BY a.article_type,a.article_id DESC LIMIT 4 "	;
			
			$articles = $GLOBALS['db']->getAll($sql);
			
			foreach($articles as $key=>$val)
			{
				 $articles[$key]['url']         = $val['open_type'] != 1 ?
          		  build_uri('article', array('aid'=>$val['article_id']), $val['title']) : trim($val['file_url']);
			}
		
			
		

			/* 获取分类下品牌 */
			$sql = "SELECT b.brand_id, b.brand_name,  b.brand_logo, COUNT(*) AS goods_num, IF(b.brand_logo > '', '1', '0') AS tag ".
					"FROM " . $GLOBALS['ecs']->table('brand') . "AS b, ".
						$GLOBALS['ecs']->table('goods') . " AS g LEFT JOIN ". $GLOBALS['ecs']->table('goods_cat') . " AS gc ON g.goods_id = gc.goods_id " .
					"WHERE g.brand_id = b.brand_id AND ($children OR " . 'gc.cat_id ' . db_create_in(array_unique(array_merge(array($cat_id), array_keys(cat_list($cat_id, 0, false))))) . ") AND b.is_show = 1 " .
					" AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
					"GROUP BY b.brand_id HAVING goods_num > 0 ORDER BY b.sort_order, b.brand_id ASC";
		
			$brands = $GLOBALS['db']->getAll($sql);
			/* 获取分类下商品 */


			

				$sql = " select a.act_name,a.ext_info,a.end_time,a.act_desc,b.shop_price,a.act_desc2,b.market_price,a.act_id,b.goods_img from ".$GLOBALS['ecs']->table('goods_activity'). " as a LEFT JOIN ".$GLOBALS['ecs']->table('goods'). " as b on a.goods_id = b.goods_id where b.cat_id = ".$cat_id;
					 $ass = $GLOBALS['db']->getAll($sql);
					foreach ($ass as $key => $value) {
						$ass[$key]['zhekou'] = sprintf('%.2f',$value['shop_price']/$value['market_price']);
						$ass[$key]['jianjiage'] = $value['market_price'] - $value['shop_price'];
						$ass[$key]['ext_info'] = unserialize($value['ext_info']);
						$ass[$key]['tongji'] = group_buy_stats($value['act_id'],$value['ext_info']['deposit']);
						$ass[$key]['shengyu'] = $ass[$key]['ext_info']['restrict_amount'] - $ass[$key]['tongji']['valid_goods'];
					}

					$cat_arr[$row['cat_id']]['goods_tg'] = $ass;


			
			foreach ($brands AS $key => $val)
			{
				$temp_key = $key + 1;
				$brands[$temp_key]['brand_name'] = $val['brand_name'];
				$brands[$temp_key]['url'] = build_uri('category', array('cid' => $cat_id, 'bid' => $val['brand_id'], 'price_min'=>$price_min, 'price_max'=> $price_max, 'filter_attr'=>$filter_attr_str), $cat['cat_name']);
		
				/* 判断品牌是否被选中 */
				if ($brand == $brands[$key]['brand_id'])
				{
					$brands[$temp_key]['selected'] = 1;
				}
				else
				{
					$brands[$temp_key]['selected'] = 0;
				}
			}
			unset($brands[0]);
			$cat_arr[$row['cat_id']]['brands'] = $brands;
			$cat_arr[$row['cat_id']]['articles'] = $articles;

            if ($row['is_show'])
            {
                $cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
                $cat_arr[$row['cat_id']]['goods']   = $cat_id_er;
                $cat_arr[$row['cat_id']]['keywords']   = $row['keywords'];
                $cat_arr[$row['cat_id']]['cat_desc']   = $row['cat_desc'];
                $cat_arr[$row['cat_id']]['cat_img']   = $row['cat_img'];
                $cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
                $cat_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);

                if (isset($row['cat_id']) != NULL)
                {
                    $cat_arr[$row['cat_id']]['cat_id'] = get_child_tree_pro($row['cat_id']);
                    //var_dump(get_child_tree_pro($row['cat_id']));
                }
            }
        }
    }
    if(isset($cat_arr))
    {
        return $cat_arr;
    }

}





/**
 * 获得指定分类同级的所有分类以及该分类下的子分类
 *
 * @access  public
 * @param   integer     $cat_id     分类编号
 * @return  array
 */
function get_categories_tree_pro2($cat_id = 0)
{
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
        $sql = 'SELECT cat_id,cat_name ,parent_id,is_show ' .
                'FROM ' . $GLOBALS['ecs']->table('category') .
                "WHERE parent_id = '$parent_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";

        $res = $GLOBALS['db']->getAll($sql);
        $ass = '';
        foreach ($res AS $row)
        {
			$cat_id = $row['cat_id'];
			$children = get_children($cat_id);
			$cat = $GLOBALS['db']->getRow('SELECT cat_name, keywords, cat_desc, style, grade, filter_attr, parent_id FROM ' . $GLOBALS['ecs']->table('category') .
        " WHERE cat_id = '$cat_id'");

			/* 获取分类下文章 */
			$sql = 'SELECT a.article_id, a.title, ac.cat_name, a.add_time, a.file_url, a.open_type FROM '.$GLOBALS['ecs']->table('article_cat').' AS ac RIGHT JOIN '.$GLOBALS['ecs']->table('article')." AS a ON a.cat_id=ac.cat_id AND a.is_open = 1 WHERE ac.cat_name='$row[cat_name]' ORDER BY a.article_type,a.article_id DESC LIMIT 4 "	;
			
			$articles = $GLOBALS['db']->getAll($sql);
			
			foreach($articles as $key=>$val)
			{
				 $articles[$key]['url']         = $val['open_type'] != 1 ?
          		  build_uri('article', array('aid'=>$val['article_id']), $val['title']) : trim($val['file_url']);
			}
		
			
		

			/* 获取分类下品牌 */
			// $sql = "SELECT b.brand_id, b.brand_name,  b.brand_logo, COUNT(*) AS goods_num, IF(b.brand_logo > '', '1', '0') AS tag ".
			// 		"FROM " . $GLOBALS['ecs']->table('brand') . "AS b, ".
			// 			$GLOBALS['ecs']->table('goods') . " AS g LEFT JOIN ". $GLOBALS['ecs']->table('goods_cat') . " AS gc ON g.goods_id = gc.goods_id " .
			// 		"WHERE g.brand_id = b.brand_id AND ($children OR " . 'gc.cat_id ' . db_create_in(array_unique(array_merge(array($cat_id), array_keys(cat_list($cat_id, 0, false))))) . ") AND b.is_show = 1 " .
			// 		" AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
			// 		"GROUP BY b.brand_id HAVING goods_num > 0 ORDER BY b.sort_order, b.brand_id ASC";
		
			// $brands = $GLOBALS['db']->getAll($sql);
		
			// foreach ($brands AS $key => $val)
			// {
			// 	$temp_key = $key + 1;
			// 	$brands[$temp_key]['brand_name'] = $val['brand_name'];
			// 	$brands[$temp_key]['url'] = build_uri('category', array('cid' => $cat_id, 'bid' => $val['brand_id'], 'price_min'=>$price_min, 'price_max'=> $price_max, 'filter_attr'=>$filter_attr_str), $cat['cat_name']);
		
			// 	/* 判断品牌是否被选中 */
			// 	if ($brand == $brands[$key]['brand_id'])
			// 	{
			// 		$brands[$temp_key]['selected'] = 1;
			// 	}
			// 	else
			// 	{
			// 		$brands[$temp_key]['selected'] = 0;
			// 	}
			// }
			// unset($brands[0]);
			// $cat_arr[$row['cat_id']]['brands'] = $brands;
			// $cat_arr[$row['cat_id']]['articles'] = $articles;

            if ($row['is_show'])
            {
                $cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
                $cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
                $cat_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);
                //$ass[] = $row['cat_id'];
                //$ass .= $row['cat_id'].',';
                if (isset($row['cat_id']) != NULL)
                {
                    $cat_arr[$row['cat_id']]['cat_id'] = get_child_tree_pro($row['cat_id']);
                    
                }
            }
        }
    }
    
    if(isset($cat_arr))
    {	
    	
        return $cat_arr;
    }

}



/**
 * 获得指定分类同级的所有分类以及该分类下的子分类
 *
 * @access  public
 * @param   integer     $cat_id     分类编号
 * @return  array
 */
function get_categories_tree_pro3($cat_id = 0)
{
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
        $sql = 'SELECT cat_id,cat_name ,cat_desc,keywords,parent_id,is_show,cat_img ' .
                'FROM ' . $GLOBALS['ecs']->table('category') .
                "WHERE parent_id = '$parent_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";

        $res = $GLOBALS['db']->getAll($sql);

        foreach ($res AS $row)
        {
			$cat_id = $row['cat_id'];
			$children = get_children($cat_id);
			$cat = $GLOBALS['db']->getRow('SELECT cat_name, keywords, cat_desc, style, grade, filter_attr, parent_id FROM ' . $GLOBALS['ecs']->table('category') .
        " WHERE cat_id = '$cat_id'");

			/* 获取分类下文章 */
			// $sql = 'SELECT a.article_id, a.title, ac.cat_name, a.add_time, a.file_url, a.open_type FROM '.$GLOBALS['ecs']->table('article_cat').' AS ac RIGHT JOIN '.$GLOBALS['ecs']->table('article')." AS a ON a.cat_id=ac.cat_id AND a.is_open = 1 WHERE ac.cat_name='$row[cat_name]' ORDER BY a.article_type,a.article_id DESC LIMIT 4 "	;
			
			// $articles = $GLOBALS['db']->getAll($sql);
			
			// foreach($articles as $key=>$val)
			// {
			// 	 $articles[$key]['url']         = $val['open_type'] != 1 ?
   //        		  build_uri('article', array('aid'=>$val['article_id']), $val['title']) : trim($val['file_url']);
			// }
		
			
		

			/* 获取分类下品牌 */
			// $sql = "SELECT b.brand_id, b.brand_name,  b.brand_logo, COUNT(*) AS goods_num, IF(b.brand_logo > '', '1', '0') AS tag ".
			// 		"FROM " . $GLOBALS['ecs']->table('brand') . "AS b, ".
			// 			$GLOBALS['ecs']->table('goods') . " AS g LEFT JOIN ". $GLOBALS['ecs']->table('goods_cat') . " AS gc ON g.goods_id = gc.goods_id " .
			// 		"WHERE g.brand_id = b.brand_id AND ($children OR " . 'gc.cat_id ' . db_create_in(array_unique(array_merge(array($cat_id), array_keys(cat_list($cat_id, 0, false))))) . ") AND b.is_show = 1 " .
			// 		" AND g.is_on_sale = 1 AND g.is_alone_sale = 1 AND g.is_delete = 0 ".
			// 		"GROUP BY b.brand_id HAVING goods_num > 0 ORDER BY b.sort_order, b.brand_id ASC";
		
			// $brands = $GLOBALS['db']->getAll($sql);
			/* 获取分类下商品 */


			

				$sql = " select a.act_name,a.ext_info,a.end_time,a.act_desc,b.shop_price,a.act_desc2,b.market_price,a.act_id,b.goods_img from ".$GLOBALS['ecs']->table('goods_activity'). " as a LEFT JOIN ".$GLOBALS['ecs']->table('goods'). " as b on a.goods_id = b.goods_id where b.cat_id = ".$cat_id;
					 $ass = $GLOBALS['db']->getAll($sql);
					foreach ($ass as $key => $value) {
						$ass[$key]['zhekou'] = sprintf('%.2f',$value['shop_price']/$value['market_price']);
						$ass[$key]['jianjiage'] = $value['market_price'] - $value['shop_price'];
						$ass[$key]['ext_info'] = unserialize($value['ext_info']);
						$ass[$key]['tongji'] = group_buy_stats($value['act_id'],$value['ext_info']['deposit']);
						$ass[$key]['shengyu'] = $ass[$key]['ext_info']['restrict_amount'] - $ass[$key]['tongji']['valid_goods'];
					}

					$cat_arr[$row['cat_id']]['goods_tg'] = $ass;


			
			foreach ($brands AS $key => $val)
			{
				$temp_key = $key + 1;
				$brands[$temp_key]['brand_name'] = $val['brand_name'];
				$brands[$temp_key]['url'] = build_uri('category', array('cid' => $cat_id, 'bid' => $val['brand_id'], 'price_min'=>$price_min, 'price_max'=> $price_max, 'filter_attr'=>$filter_attr_str), $cat['cat_name']);
		
				/* 判断品牌是否被选中 */
				if ($brand == $brands[$key]['brand_id'])
				{
					$brands[$temp_key]['selected'] = 1;
				}
				else
				{
					$brands[$temp_key]['selected'] = 0;
				}
			}
			unset($brands[0]);
			$cat_arr[$row['cat_id']]['brands'] = $brands;
			$cat_arr[$row['cat_id']]['articles'] = $articles;

            if ($row['is_show'])
            {
                $cat_arr[$row['cat_id']]['id']   = $row['cat_id'];
                $cat_arr[$row['cat_id']]['goods']   = $cat_id_er;
                $cat_arr[$row['cat_id']]['keywords']   = $row['keywords'];
                $cat_arr[$row['cat_id']]['cat_desc']   = $row['cat_desc'];
                $cat_arr[$row['cat_id']]['cat_img']   = $row['cat_img'];
                $cat_arr[$row['cat_id']]['name'] = $row['cat_name'];
                $cat_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);

                if (isset($row['cat_id']) != NULL)
                {
                    $cat_arr[$row['cat_id']]['cat_id'] = get_child_tree_pro($row['cat_id']);
                    //var_dump(get_child_tree_pro($row['cat_id']));
                }
            }
        }
    }
    if(isset($cat_arr))
    {
        return $cat_arr;
    }

}

function tuangou_goods($cat_id){
	$sql = " select a.act_name,a.ext_info,a.end_time,a.act_desc,b.shop_price,a.act_desc2,b.market_price,a.act_id,b.goods_img from ".$GLOBALS['ecs']->table('goods_activity'). " as a LEFT JOIN ".$GLOBALS['ecs']->table('goods'). " as b on a.goods_id = b.goods_id where b.cat_id = ".$cat_id;
		 $ass = $GLOBALS['db']->getAll($sql);
		foreach ($ass as $key => $value) {
			$ass[$key]['zhekou'] = sprintf('%.2f',$value['shop_price']/$value['market_price']);
			$ass[$key]['jianjiage'] = $value['market_price'] - $value['shop_price'];
			$ass[$key]['ext_info'] = unserialize($value['ext_info']);
			$ass[$key]['tongji'] = group_buy_stats($value['act_id'],$value['ext_info']['deposit']);
			$ass[$key]['shengyu'] = $ass[$key]['ext_info']['restrict_amount'] - $ass[$key]['tongji']['valid_goods'];
		}

		return $ass;
}



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
function group_buy_stats($group_buy_id, $deposit)
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

function get_child_tree_pro($tree_id = 0)
{
    $three_arr = array();
    $sql = 'SELECT count(*) FROM ' . $GLOBALS['ecs']->table('category') . " WHERE parent_id = '$tree_id' AND is_show = 1 ";
    if ($GLOBALS['db']->getOne($sql) || $tree_id == 0)
    {
        $child_sql = 'SELECT cat_id, cat_name, parent_id, is_show ' .
                'FROM ' . $GLOBALS['ecs']->table('category') .
                "WHERE parent_id = '$tree_id' AND is_show = 1 ORDER BY sort_order ASC, cat_id ASC";
        $res = $GLOBALS['db']->getAll($child_sql);
        foreach ($res AS $row)
        {
            if ($row['is_show'])

               $three_arr[$row['cat_id']]['id']   = $row['cat_id'];
               $three_arr[$row['cat_id']]['name'] = $row['cat_name'];
               $three_arr[$row['cat_id']]['url']  = build_uri('category', array('cid' => $row['cat_id']), $row['cat_name']);

               if (isset($row['cat_id']) != NULL)
                   {
                       $three_arr[$row['cat_id']]['cat_id'] = get_child_tree($row['cat_id']);

            }
        }
    }
    return $three_arr;
}

/*获取折扣和节省*/
function get_discount($goods_id)
{
	
		$sql = 'SELECT market_price,shop_price,promote_price FROM '.$GLOBALS['ecs']->table('goods')." WHERE goods_id = $goods_id ";
		
		
		$row = $GLOBALS['db']->getRow($sql);
		
		$price=$row['market_price']; //原价 
		if($row['promote_price'] > 0) //如果促销价大于0则现价为促销价
		{
			$nowprice=$row['promote_price']; //现价 
		}
		else //否则为本店价
		{
			$nowprice=$row['shop_price']; //现价 
		}
		
		$jiesheng=$price-$nowprice; //节省金额 
		
		$arr['jiesheng'] = $jiesheng; 
		
		
		//$discount折扣计算 
		if ( $nowprice > 0 ) 
		{ 
			$arr['discount'] = round(10 / ($price / $nowprice), 1); 
		} 
		else 
		{ 
			$arr['discount'] = 0; 
		} 
	
		if ($arr['discount'] <= 0 )
		{
			$arr['discount'] = 0; 
		}
	
		
	return $arr;
	
}

/*评论百分比*/
function comment_percent($goods_id)
{
	$sql = 'SELECT COUNT(*) AS haoping FROM '.$GLOBALS['ecs']->table('comment')." WHERE id_value = '$goods_id' AND comment_type=0 AND status = 1 AND parent_id = 0 AND (comment_rank = 4 OR comment_rank = 5)";
	$haoping_count = $GLOBALS['db']->getOne($sql); 	
	
	$sql = 'SELECT COUNT(*) AS zhongping FROM '.$GLOBALS['ecs']->table('comment')." WHERE id_value = '$goods_id' AND comment_type=0 AND status = 1 AND parent_id = 0 AND (comment_rank = 2 OR comment_rank = 3)";
	$zhongping_count = $GLOBALS['db']->getOne($sql); 
	
	$sql = 'SELECT COUNT(*) AS chaping FROM '.$GLOBALS['ecs']->table('comment')." WHERE id_value = '$goods_id' AND comment_type=0 AND status = 1 AND parent_id = 0 AND comment_rank = 1";
	$chaping_count = $GLOBALS['db']->getOne($sql); 
	
	$sql = 'SELECT COUNT(*) AS comment_count FROM '.$GLOBALS['ecs']->table('comment')." WHERE id_value = '$goods_id' AND comment_type=0 AND status = 1 AND parent_id = 0";
	$comment_count = $GLOBALS['db']->getOne($sql); 
	
	$arr['haoping_percent'] = substr(number_format(($haoping_count/$comment_count)*100, 2, '.', ''), 0, -1);
	$arr['zhongping_percent'] = substr(number_format(($zhongping_count/$comment_count)*100, 2, '.', ''), 0, -1); 
	$arr['chaping_percent'] = substr(number_format(($chaping_count/$comment_count)*100, 2, '.', ''), 0, -1); 
	
	if($comment_count == 0)
	{
		$arr['haoping_percent'] = 100;
	}
	
	foreach($arr as $key => $val)
	{
		if($val == 0.0)
		{
			$arr[$key] = 0;
		}
	}
	
	
	
	return $arr;
	
}

?>