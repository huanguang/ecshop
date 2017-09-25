<?php


//获取用户的所有订单

define('IN_ECS', true);

require(dirname(__FILE__) . '/../includes/init.php');
require(ROOT_PATH . 'includes/lib_order.php');
include_once(ROOT_PATH . 'includes/lib_clips.php');
    include_once(ROOT_PATH . 'includes/lib_payment.php');
$http = str_replace('api3/user_order.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));

$user_id = $_REQUEST['user_id'];
if(empty($user_id)){
	ajaxReturn(array('ret_code' => 0, 'msg' => '请先登录', 'data' => array()));
}
$sql = "select order_id,invoice_no,shipping_name from " .$ecs->table('order_info') . " where user_id = '$user_id'";
$user_order = $db->getAll($sql);
//ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $user_order));



include_once(ROOT_PATH . 'includes/lib_transaction.php');
    include_once(ROOT_PATH . 'includes/lib_order.php');
	foreach ($user_order as $key => $value) {
		# code...
	if($value['shipping_name'] && $value['invoice_no']){

	/* 订单详情 */
    //$order = get_order_detail($order_id, $user_id);
	//$order['invoice_no'] = "3304208731306";
	//查询订单商品的
			
			$getcom = $value['shipping_name'];
			include_once("../plugins/kuaidi100/kuaidi100_config.php");
			
			$url = "http://wap.kuaidi100.com/wap_result.jsp?rand=".date("Ymd")."&id=".$postcom."&fromWeb=null&&postid=".$value['invoice_no'];
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
			$user_order[$key]['kuaidizt'] = $ass[count($ass)-1];
		}else{
			//$user_order[$key]['kuaidizt'] = array('time'=>'','content'=>'');
			unset($user_order[$key]);
		}
	}
	foreach ($user_order as $key => $value) {
		$sql = "select b.goods_img from ecs_order_goods as a left join ecs_goods as b on a.goods_id = b.goods_id where a.order_id = $value[order_id]";
			$goodsimg = $db->getAll($sql);
			foreach ($goodsimg as $k => $v) {
				$goodsimg[$k]['goods_img'] = $http.$v['goods_img'];
							}
			$user_order[$key]['goods_img'] = $goodsimg;
	}
$aa = array();
	foreach ($user_order as $key => $value) {
		# code...
		$aa[] = $value;
	}
	
	if ($user_order)
    {
        ajaxReturn(array('ret_code' =>1, 'msg' => '获取成功', 'data' =>$aa));
    }
    else
    {
		ajaxReturn(array('ret_code' =>0, 'msg' => '获取失败', 'data' =>array()));
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