<?php
/**
 * $rec_id: 购物车id
 * $goods_number: 	购物车数量
*/
define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(dirname(__FILE__) . '/../includes/lib_order.php');
	
    if (isset($_REQUEST['rec_id']) &&isset($_REQUEST['goods_number']))
    {
        $key = $_REQUEST['rec_id'];
        $val = $_REQUEST['goods_number'];
        $val = intval(make_semiangle($val));
        //if ($val <= 0 &&!is_numeric($key))
        if ($val <= 0 &&!is_numeric($key))
        {          
            ajaxReturn(array('ret_code' => 0, 'msg' => '数量不能为零', 'data' =>array()));
        }
 
        //查询：
        $sql = "SELECT `goods_id`, `goods_attr_id`,`product_id`, `extension_code` FROM" .$GLOBALS['ecs']->table('cart').
               " WHERE rec_id='$key' AND session_id='" . SESS_ID . "'";
        $goods =$GLOBALS['db']->getRow($sql);
 
        $sql = "SELECT g.goods_name,g.goods_number ".
                "FROM ".$GLOBALS['ecs']->table('goods'). " AS g, ".
                   $GLOBALS['ecs']->table('cart'). " AS c ".
                "WHERE g.goods_id =c.goods_id AND c.rec_id = '$key'";
        $row = $GLOBALS['db']->getRow($sql);
 
        //查询：系统启用了库存，检查输入的商品数量是否有效
        if(intval($GLOBALS['_CFG']['use_storage']) > 0 &&$goods['extension_code'] != 'package_buy')
        {
            if ($row['goods_number'] < $val)
            {
                $result['error'] = 1;
                $result['message'] =sprintf($GLOBALS['_LANG']['stock_insufficiency'], $row['goods_name'],$row['goods_number'], $row['goods_number']);
                //die($json->encode($result));
                ajaxReturn(array('ret_code' => 0, 'msg' => '无效数量', 'data' =>array()));
            }
            /* 是货品*/
            $goods['product_id'] = trim($goods['product_id']);
            if (!empty($goods['product_id']))
            {
                $sql = "SELECT product_number FROM " .$GLOBALS['ecs']->table('products'). " WHERE goods_id = '" . $goods['goods_id'] . "' AND product_id = '" .$goods['product_id'] . "'";
 
                $product_number =$GLOBALS['db']->getOne($sql);
                if ($product_number < $val)
                {
                    $result['error'] = 2;
                    $result['message'] =sprintf($GLOBALS['_LANG']['stock_insufficiency'], $row['goods_name'],
                   $product_number['product_number'], $product_number['product_number']);
                   ajaxReturn(array('ret_code' => 0, 'msg' => '无效参数', 'data' =>array()));
                }
            }
        }
        elseif (intval($GLOBALS['_CFG']['use_storage'])> 0 && $goods['extension_code'] == 'package_buy')
        {
        	
            if(judge_package_stock($goods['goods_id'], $val))
            {
                $result['error'] = 3;
                $result['message'] =$GLOBALS['_LANG']['package_stock_insufficiency'];
                ajaxReturn(array('ret_code' => 0, 'msg' => '无效参数', 'data' =>array()));
            }
        }
 
        /* 查询：检查该项是否为基本件 以及是否存在配件*/
        /* 此处配件是指添加商品时附加的并且是设置了优惠价格的配件 此类配件都有parent_idgoods_number为1 */
        $sql = "SELECT b.goods_number,b.rec_id
                FROM ".$GLOBALS['ecs']->table('cart') . " a, ".$GLOBALS['ecs']->table('cart') . " b
                WHERE a.rec_id = '$key'
                AND a.extension_code <>'package_buy'
                AND b.parent_id = a.goods_id";
 
        $offers_accessories_res =$GLOBALS['db']->query($sql);
 
        //订货数量大于0
        if ($val > 0)
        {
            /* 判断是否为超出数量的优惠价格的配件 删除*/
            $row_num = 1;
            while ($offers_accessories_row =$GLOBALS['db']->fetchRow($offers_accessories_res))
            {
                if ($row_num > $val)
                {
                    $sql = "DELETE FROM" . $GLOBALS['ecs']->table('cart') .
                            " WHERE session_id = '" . SESS_ID . "' " .
                            "AND rec_id ='" . $offers_accessories_row['rec_id'] ."' LIMIT 1";
                   $GLOBALS['db']->query($sql);
                }
 
                $row_num ++;
            }
 
            /* 处理超值礼包*/
            if ($goods['extension_code'] =='package_buy')
            {
                //更新购物车中的商品数量
                $sql = "UPDATE ".$GLOBALS['ecs']->table('cart').
                        " SET goods_number= '$val' WHERE rec_id='$key' AND session_id='" . SESS_ID . "'";
            }
            /* 处理普通商品或非优惠的配件*/
            else
            {
                $attr_id    = empty($goods['goods_attr_id']) ? array(): explode(',', $goods['goods_attr_id']);
                $goods_price =get_final_price($goods['goods_id'], $val, true, $attr_id);
 
                //更新购物车中的商品数量

                $sql = "UPDATE ".$GLOBALS['ecs']->table('cart').
                        " SET goods_number= '$val' WHERE rec_id='$key'";
                        $GLOBALS['db']->query($sql);
                        //查询该商品是否是套餐
                $sql = "select parent_id,group_id,goods_id from " .$ecs->table('cart'). " where rec_id = '$key'";
                $goods = $db->getRow($sql);
                if($goods['group_id'] && empty($goods['parent_id'])){
                    
                    $sql = "select rec_id from " .$ecs->table('cart'). " where parent_id = '$goods[goods_id]'";
                    $gg = $db->getAll($sql);
                    foreach ($gg as $key => $value) {
                        # code...
                        $sql = "UPDATE ".$GLOBALS['ecs']->table('cart').
                        " SET goods_number= '$val' WHERE rec_id='$value[rec_id]'";
                        $GLOBALS['db']->query($sql);
                    }
                }
            }
        }
        //订货数量等于0
        else
        {
            /* 如果是基本件并且有优惠价格的配件则删除优惠价格的配件*/
            while ($offers_accessories_row =$GLOBALS['db']->fetchRow($offers_accessories_res))
            {
                $sql = "DELETE FROM ". $GLOBALS['ecs']->table('cart') .
                        " WHERE  " .
                        "AND rec_id ='" . $offers_accessories_row['rec_id'] ."' LIMIT 1";
                $GLOBALS['db']->query($sql);
            }
 
            $sql = "DELETE FROM ".$GLOBALS['ecs']->table('cart').
                " WHERE rec_id='$key'";
        }
 
        $GLOBALS['db']->query($sql);
 
        /* 删除所有赠品*/
        $sql = "DELETE FROM " .$GLOBALS['ecs']->table('cart') . " WHERE session_id = '" .SESS_ID."' AND is_gift <> 0";
        $GLOBALS['db']->query($sql);
        
        $result['rec_id'] = $key;
        $result['goods_number'] = $val;        
        $result['goods_subtotal'] = '';
        $result['total_desc'] = '';     
        $result['cart_info'] =insert_cart_info_number();  
		
        /* 计算合计*/
        $cart_goods = get_cart_goods();
        foreach ($cart_goods['goods_list'] as $goods)
        {
            if ($goods['rec_id'] == $key)
            {
                $result['goods_subtotal'] =$goods['subtotal'];
                break;
            }
        }
		/* 返回购物车信息 */
		$result['flow_info'] =insert_flow_info($cart_goods['total']['goods_price'],$cart_goods['total']['market_price'],$cart_goods['total']['saving'],$cart_goods['total']['save_rate'],$cart_goods['total']['goods_amount'],$cart_goods['total']['real_goods_count']); 
		ajaxReturn(array('ret_code' => 1, 'msg' => '获取数据成功', 'data' =>$result));          
    }
    else
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '添加数量失败', 'data' =>array()));
    }
?>