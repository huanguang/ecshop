<?php
//APP获取商品列表接口

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');

$user_id = $_REQUEST['user_id'];//用户的ID
if (!isset($user_id) || $user_id == 0)
{
	ajaxReturn(array('ret_code' => 0, 'msg' => '您还没有登录，请登陆', 'data' => array()));
}
$action = $_REQUEST['action']?$_REQUEST['action']:"index";//获取操作方法
$http = str_replace('api3/order.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 
/* 查看订单列表 
	需要参数
	user_id 会员ID
	status  订单状态 5：退货中 4：待收货 3：待评论 2：待发货 1：待付款 0：全部
*/
if($action == "index"){
	
	$where = "";
	$status = $_REQUEST['status'];

	if($status){
		if($status == 5){
                $where .= "order_status = 4 and shipping_status = 0 and pay_status = 0  and ";
		}elseif($status == 4){//待收货
			$where .= "order_status = 2 and shipping_status = 1 and pay_status = 2  and ";
		}elseif($status == 3){//待评论
			$where .= "order_status = 5 and shipping_status = 2 and pay_status = 2  and ";
		}elseif($status == 2){//待发货
			$where .= "((order_status = 1 and shipping_status = 0 and pay_status = 2) or (order_status = 1 and shipping_status = 3 and pay_status = 2) or (order_status = 5 and shipping_status = 5 and pay_status = 2))  and ";
		}elseif($status == 1){//待付款
			$where .= "((order_status = 0 and shipping_status = 0 and pay_status = 0) or (order_status = 1 and shipping_status = 0 and pay_status = 0))  and ";
		}else{
			$where = " order_status != 2 and ";
		}
	}

	
	$record_count = $db->getOne("SELECT COUNT(*) FROM " .$ecs->table('order_info'). " WHERE " .$where. "user_id = '$user_id'");

	$page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;//页数

	$pager  = get_pager('user.php', array('act' => $action), $record_count, $page);

	$orders = user_orders($user_id, $pager['size'], $pager['start'],$where);
	$ass = array();
	// foreach ($orders as $key => $value) {
	// 	# code...
	// 	if($orders[$key]['order_status'] == 2 && $orders[$key]['pay_status'] == 0 && $orders[$key]['shipping_status'] == 0){
	// 		unset($orders[$key]);
	// 	}

	// }
	
	foreach ($orders as $key => $value) {
		# code...
		$ass[] = $value;
	}
	
	if($ass){
		$list = array("list"=>$ass,"page"=>$page,'count'=>ceil($record_count/10));
		ajaxReturn(array('ret_code' =>1, 'msg' => '获取成功', 'data' => $list));
	}else{
		ajaxReturn(array('ret_code' =>1, 'msg' => '没有获取到相应订单', 'data' =>array()));
	}
}
/* 取消订单 
	需要参数
	user_id 会员ID
	action 操作方法 cancel_order
	order_id 订单ID
*/
elseif ($action == 'cancel_order')
{
    include_once(ROOT_PATH . 'includes/lib_transaction.php');
    include_once(ROOT_PATH . 'includes/lib_order.php');
    $order_id = isset($_REQUEST['order_id']) ? intval($_REQUEST['order_id']) : 0;
    if (cancel_order($order_id, $user_id))
    {
        ajaxReturn(array('ret_code' =>1, 'msg' => '取消订单成功', 'data' => array()));
    }
    else
    {
        ajaxReturn(array('ret_code' =>0, 'msg' => '取消订单失败', 'data' => array()));
    }
}
/* 确认收货
	需要参数
	user_id 会员ID
	action 操作方法 affirm_received
	order_id 订单ID
 */
elseif ($action == 'affirm_received')
{
    include_once(ROOT_PATH . 'includes/lib_transaction.php');

    $order_id = isset($_REQUEST['order_id']) ? intval($_REQUEST['order_id']) : 0;

    if (affirm_received($order_id, $user_id))
    {
        ajaxReturn(array('ret_code' =>1, 'msg' => '确认收货成功', 'data' => array()));
    }
    else
    {
        ajaxReturn(array('ret_code' =>0, 'msg' => '确认收货失败', 'data' => array()));
    }
}
/* 快递查询
	需要参数
	user_id 会员ID
	action 操作方法 affirm_received
	order_id 订单ID
 */
elseif($action == "kuaidi"){
	include_once(ROOT_PATH . 'includes/lib_transaction.php');
    include_once(ROOT_PATH . 'includes/lib_order.php');
	
	$order_id = isset($_REQUEST['order_id']) ? intval($_REQUEST['order_id']) : 0;
	/* 订单详情 */
    $order = get_order_detail($order_id, $user_id);
	//$order['invoice_no'] = "3304208731306";
	$getcom = $order['shipping_name'];
	include_once("../plugins/kuaidi100/kuaidi100_config.php");
	
	$url = "http://wap.kuaidi100.com/wap_result.jsp?rand=".date("Ymd")."&id=".$postcom."&fromWeb=null&&postid=".$order['invoice_no'];
	$post = curl_get($url);

	$post = get_sub_content($post,'<form action="wap_result.jsp" method="get" >','</form>');
	$post = explode('<div class="clear"></div>',$post);
	$str = $post[2];
	$pattern = "/<p>.*?<\/p>/m";
	preg_match_all($pattern,$str,$data);
	$data = $data[0];
	unset($data[0]);
	unset($data[1]);
	$num = count($data);
	$kuaidi = array();
	$ass = array();

	foreach($data as $k=>$v){
		$vv = explode("<br />",$v);
		$kuaidi['time'] = substr($vv[0],3);
		$kuaidi['time'] = substr($kuaidi['time'],8);
		$kuaidi['content'] = substr($vv[1],0,-4);
		$ass[] = $kuaidi; 
	}
	//var_dump($kuaidi);die;
	$sdd = array('list'=>$ass,'invoice_no'=>$order['invoice_no'],'order_sn'=>$order['shipping_name']);
	if ($ass)
    {
        ajaxReturn(array('ret_code' =>1, 'msg' => '获取成功', 'data' =>$sdd));
    }
    else
    {
		ajaxReturn(array('ret_code' =>0, 'msg' => '获取失败', 'data' =>array()));
	}
}

function user_orders($user_id, $num = 10, $start = 0,$where = '')
{
    $http = str_replace('api3/order.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"])); 
	include_once(ROOT_PATH . 'includes/lib_clips.php');
    /* 取得订单列表 */
    $arr    = array();
    include_once(ROOT_PATH . 'includes/lib_order.php');
    $sql = "SELECT order_id, order_sn, order_status,pay_name,is_comment,invoice_no,shipping_name, shipping_status, pay_status, add_time, " .
            "(goods_amount + shipping_fee + insure_fee + pay_fee + pack_fee + card_fee + tax - discount) AS total_fee ".
           " FROM " .$GLOBALS['ecs']->table('order_info') .
            " WHERE ".$where." user_id = '$user_id' ORDER BY add_time DESC";
            
    //$sql = "SELECT o.pay_id, o.order_amount,o.order_id,o.is_comment,o.invoice_no,o.shipping_name,o.extension_code,o.order_status,o. order_sn,o.pay_name, o.shipping_status, o.pay_status, o.add_time, " .
    //      "(o.goods_amount + o.shipping_fee + o.insure_fee + o.pay_fee + o.pack_fee + o.card_fee + o.tax - o.discount) AS total_fee ".
    //       " FROM " .$GLOBALS['ecs']->table('order_info') .
    //       " as o  WHERE o.user_id = '$user_id'  $sql_add ORDER BY add_time DESC";
    $res = $GLOBALS['db']->SelectLimit($sql, $num, $start);

    while ($row = $GLOBALS['db']->fetchRow($res))
    {
        $asss = $row['order_status'];
        //$row['shipping_status'] = ($row['shipping_status'] == SS_SHIPPED_ING) ? SS_PREPARING : $row['shipping_status'];
        //$row['order_status'] = $GLOBALS['_LANG']['os'][$row['order_status']] . ',' . $GLOBALS['_LANG']['ps'][$row['pay_status']] . ',' . $GLOBALS['_LANG']['ss'][$row['shipping_status']];
        
        if($row['order_status'] == 4 and $row['shipping_status'] == 0 and $row['pay_status'] == 0){
                
        	$row['status'] = 5;
		}elseif($row['order_status'] == 2 and $row['shipping_status'] == 1 and $row['pay_status'] == 2){//待收货
			
			$row['status'] = 4;
		}elseif(($row['order_status'] == 5 and $row['shipping_status'] == 2 and $row['pay_status'] == 2) || ($row['order_status'] == 5 and $row['shipping_status'] == 1 and $row['pay_status'] == 2)){//待评论
			
			$row['status'] = 3;
		}elseif(($row['order_status'] == 1 and $row['shipping_status'] == 0 and $row['pay_status'] == 2) || ($row['order_status'] == 1 and $row['shipping_status'] == 3 and $row['pay_status'] == 2) || ($row['order_status'] == 5 and $row['shipping_status'] == 5 and $row['pay_status'] == 2)){//待发货
			
			$row['status'] = 2;
		}elseif(($row['order_status'] == 0 and $row['shipping_status'] == 0 and $row['pay_status'] == 0) || ($row['order_status'] == 1 and $row['shipping_status'] == 0 and $row['pay_status'] == 0)){//待付款
			
			$row['status'] = 1;
		}elseif($row['order_status'] == 2 and $row['shipping_status'] == 0 and $row['pay_status'] == 0){//已经取消
			
			$row['status'] = 6;
		}elseif($row['order_status'] == 5 and $row['shipping_status'] == 1 and $row['pay_status'] == 0){//其他
			
			$row['status'] = 7;
		}

        $sql = "select a.*,b.goods_id,b.goods_name,b.goods_img from " .$GLOBALS['ecs']->table('order_goods'). " as a left join ".$GLOBALS['ecs']->table('goods')." as b on a.goods_id = b.goods_id where a.order_id = ".$row['order_id'];
        $goods = $GLOBALS['db']->getAll($sql);
        foreach ($goods as $key => $value) {
            $value['goods_img'] = $value['goods_img']?$http.$value['goods_img']:"";
			$value['goods_len'] = count($goods);
			$goods[$key] = $value;
        }
        
        $arr[] = array('order_id'       => $row['order_id'],
                       'order_sn'       => $row['order_sn'],
                       'order_time'     => local_date($GLOBALS['_CFG']['time_format'], $row['add_time']),
                       'order_status'   => $row['order_status'],
                       'order_status2'   => $asss,
                       'total_fee'      => price_format($row['total_fee'], false),
                       'zhifu'        => $row['pay_name'],
                       'invoice_no'        => $row['invoice_no'],
                       'shipping_name'        => $row['shipping_name'],
                       'goods'          => $goods,
                       'pay_status'          => $row['pay_status'],
                       'extension_code'          => $row['extension_code'],
                       'is_comment'          => $row['is_comment'],
                       'shipping_status'          => $row['shipping_status'],
                       'status'          => $row['status'],
                       //应付款金额
                       'order_jiage'   => price_format($row['order_amount'], false),
                       'pay_status'   => $row['pay_status'],
                       'total_fee'      => price_format($row['total_fee'], false),
                        'order_sign'     => $GLOBALS['_LANG']['ps'][$row['pay_status']]
                       );
    }
    
    return $arr;
}

function curl_get($url){
	$binfo =array('Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET CLR 2.0.50727; InfoPath.2; AskTbPTV/5.17.0.25589; Alexa Toolbar)','Mozilla/5.0 (Windows NT 5.1; rv:22.0) Gecko/20100101 Firefox/22.0','Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; .NET4.0C; Alexa Toolbar)','Mozilla/4.0(compatible; MSIE 6.0; Windows NT 5.1; SV1)',$_SERVER['HTTP_USER_AGENT']);
	$cip = '218.242.124.'.mt_rand(0,254);
	$xip = '218.242.124.'.mt_rand(0,254);
	$header = array('CLIENT-IP:'.$cip, 'X-FORWARDED-FOR:'.$xip);
	
	$ch=curl_init();
	$timeout=5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_HTTPHEADER, $header);
	curl_setopt ($ch, CURLOPT_USERAGENT, $binfo[mt_rand(0,3)]);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$content=curl_exec($ch);
	curl_close($ch);
	return $content;
}

//获取页面指定的一段值  $str获取值的字符串 $start 开始字符串 $end 结束字符串
function get_sub_content($str, $start, $end,$a=1,$b=0){
	if ( $start == '' || $end == '' ){
		return;
	}
	$str = explode($start, $str);
	@$str = explode($end, $str[$a]);
	return $str[$b];
}