<?php
/**
 * 公用函数
 */

//站点提示信息
function show_msg($msg,$type='info',$action=1,$url=''){
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	echo $msg;
	$error = mysql_error();
	if(DEBUG_MODE){
		echo '<br />'.$error;
	}
	exit;
}

//显示提示信息json
function show_msg_to_json($msg,$type='1',$data=''){
	
	switch ($type) {
		case '0':
			$status = fail;
			break;
		case '1':
			$status = success;
			break;
	}

	$error = mysql_error();
	if(DEBUG_MODE && $error){
		$msg.="服务器异常";
			$file  = 'logyichang.txt';
			$content = $error;
		    file_put_contents($file, $content,FILE_APPEND);
	}

	$json_data = array(
		'ret_msg'=>$status,
		'ret_code'=>$type,
		'msg'=>$msg,
		'data'=>$data
	);
	echo json_encode($json_data);
	exit;
}

//返回V地址
function V($view){
	return 	WEB_ROOT.'/view/'.$view.'.js';
}

//数组转换store
function basetostroe($arr){
	if(is_array($arr[0]) || empty($arr)) return $arr;
	$narr=array();
	foreach($arr as $key=>$val){
		$narr[] = array('id'=>$key, 'option'=>$val);
	}
	return json_encode($narr);
}

//显示循环类别ID
function show_type_all_id($f_table_name,$f_value){

	global $f_sql_name;
	$f_sql='select * from `'.$f_table_name.'` where `type_id`=\''.$f_value.'\' order by `num` desc';
	$f_result=mysql_query($f_sql);
	while ($f_rs=mysql_fetch_array($f_result))
	{
		if ($f_rs)
		{
		$f_sql_name=$f_sql_name.'`type_id` = \''.$f_rs['id'].'\' or ';
		show_type_all_id($f_table_name,$f_rs['id']);
		}
	}
}

//替换内容图片链接为完整链接


//替换图片完整链接（头像）
function replace_photo_link($img){

$http= 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
stristr($http,'save.php');
if(empty($img)){
	//为空时，取默认图片
	$img1 = str_replace(stristr($http,'save.php'),'images/my_mess_03.png',$http);
	return $img1;
}else{
	$img1 = str_replace(stristr($http,'save.php'),'uploadfiles/'.$img,$http);
	return $img1;
}

}

//替换图片完整链接（羊毛铺产品图片）
function replace_image_link($img){

$http= 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
stristr($http,'save.php');
if(empty($img)){
	$img1 = '';
	return $img1;
}else{
	$img1 = str_replace(stristr($http,'save.php'),'uploadimg/'.$img,$http);
	return $img1;
}

}

//替换图片完整链接（广告图片）
function replace_adverimage_link($img){

	$http= 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
	stristr($http,'save.php');
	if(empty($img)){
		$img1 = '';
		return $img1;
	}else{
		$img1 = str_replace(stristr($http,'save.php'),'uploadfiles/'.$img,$http);
		return $img1;
	}

}


//所有商城收藏者头像 (限制最新六个)
function collect_photo_all($id){

$data = array();

$query = mysql_query("SELECT * FROM `collect_info` WHERE `pid`='{$id}' ORDER BY date1 desc LIMIT 0,6 ");
	//替换成完整链接
	$http= 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
	stristr($http,'save.php');
while($rs = mysql_fetch_assoc($query)){
	//获取每个收藏者头像
	$img = @mysql_result(mysql_query("SELECT `images1` FROM `user_info` WHERE `id`='{$rs['uid']}'"),0);

	if(empty($img)){
		$img1 = str_replace(stristr($http,'save.php'),'images/my_mess_03.png',$http);
	}else{
		$img1 = str_replace(stristr($http,'save.php'),'uploadfiles/'.$img,$http);
	}

	$data[] = array(
		'img' => $img1
	);

}
 	$product_collect = @mysql_result(mysql_query("SELECT `collect` FROM `product_info` WHERE `id` = '{$id}'"),0);
	$actual_collect = @mysql_num_rows(mysql_query("SELECT * FROM `collect_info` WHERE `pid`='{$id}'"));
	if($product_collect>=6 && $actual_collect<6){
		$num = 6-$actual_collect;
		for($i=1; $i<=$num;$i++){

			$img1 = str_replace(stristr($http,'save.php'),'images/my_mess_03.png',$http);
			if($i==2){
				$img1 = str_replace(stristr($http,'save.php'),'images/user_toux.jpg',$http);
			}
			if($i==3) $img1 = str_replace(stristr($http,'save.php'),'pic/11.png',$http);
			if($i==4) $img1 = str_replace(stristr($http,'save.php'),'images/m_a8.jpg',$http);
			if($i==5) $img1 = str_replace(stristr($http,'save.php'),'images/m_a11.jpg',$http);
			$data[] = array(
				'img' => $img1
			);
		}
	}

return $data;
}


//所有羊毛铺收藏者头像 (限制最新六个)
function collect_ym_photo_all($id){

$data = array();
//替换成完整链接
$http= 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
stristr($http,'save.php');
$query = mysql_query("SELECT * FROM `collect_info` WHERE `ym_id`='{$id}' ORDER BY date1 desc LIMIT 0,6 ");

while($rs = mysql_fetch_assoc($query)){
	//获取每个收藏者头像
	$img = @mysql_result(mysql_query("SELECT `images1` FROM `user_info` WHERE `id`='{$rs['uid']}'"),0);
	//替换成完整链接
	$http= 'http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
	stristr($http,'save.php');
	if(empty($img)){
		$img1 = str_replace(stristr($http,'save.php'),'images/my_mess_03.png',$http);
	}else{
		$img1 = str_replace(stristr($http,'save.php'),'uploadfiles/'.$img,$http);
	}

	$data[] = array(
		'img' => $img1
	);

}
	$product_collect = @mysql_result(mysql_query("SELECT `collect` FROM `resale_info` WHERE `id` = '{$id}'"),0);
	$actual_collect = @mysql_num_rows(mysql_query("SELECT * FROM `collect_info` WHERE `ym_id`='{$id}'"));
	if($product_collect>=6 && $actual_collect<6){
		$num = 6-$actual_collect;
		for($i=1; $i<=$num;$i++){

			$img1 = str_replace(stristr($http,'save.php'),'images/my_mess_03.png',$http);
			if($i==1){
				$img1 = str_replace(stristr($http,'save.php'),'images/user_toux.jpg',$http);
			}
			if($i==5) $img1 = str_replace(stristr($http,'save.php'),'pic/11.png',$http);
			if($i==2) $img1 = str_replace(stristr($http,'save.php'),'images/m_a8.jpg',$http);
			if($i==3) $img1 = str_replace(stristr($http,'save.php'),'images/m_a11.jpg',$http);

			$data[] = array(
				'img' => $img1
			);
		}
	}

return $data;
}




//详细页面最新一条评论
function review_one($id){

	$data = array();
	$sql = "SELECT * FROM `product_review` WHERE product_id = '{$id}' AND `status`=2 ORDER BY date1 asc";
	$nums = mysql_num_rows(mysql_query($sql));//总评论条数
	$sql = $sql." LIMIT 0,1 ";
	$row = @mysql_fetch_assoc(mysql_query($sql));

	if($nums!=0){
		$user_img = @mysql_result(mysql_query("SELECT `images1` FROM `user_info` WHERE `id`='{$row['user_id']}'"), 0);
		$img = replace_photo_link($user_img);
		$content = strip_tags($row['cn_content']);//评论内容


		$data[] = array(
			'images' => $img,
			'name' => $row['user_name'],
			'content' => $content
		);
	}
$data2 = array(
		'msg'=>$data,
		'review_num' => $nums
	);

	return $data2;

}



//检验登录者是否过期 返回ID
function token_check_id($token){
	$_REQUEST['user_token'] =$token;

	if(empty($_REQUEST['user_token'])){
		 show_msg_to_json('','0');
	}
	$user_token = $_REQUEST['user_token'];
	$query = mysql_query("select user_id,token_time from `token_info` where `token_name`='$user_token' ORDER BY token_time DESC");
	$rs=mysql_fetch_assoc($query);
	if(!$rs){
		show_msg_to_json('','0');
	}
	$nowtime = time();
	if($nowtime > $rs['token_time']){
	//	show_msg_to_json('','0');
	}

		return $id = $rs['user_id'];//用户ID


}


//格式化评论显示时间
function formatTime($time){
    if(!is_numeric($time)) $time = strtotime($time);
    $now=time();
    $day=date('Y-m-d',$time);
    $today=date('Y-m-d');
     
    $dayArr=explode('-',$day);
    $todayArr=explode('-',$today);
     
    //距离的天数，这种方法超过30天则不一定准确，但是30天内是准确的，因为一个月可能是30天也可能是31天
    $days=($todayArr[0]-$dayArr[0])*365+(($todayArr[1]-$dayArr[1])*30)+($todayArr[2]-$dayArr[2]);
    //距离的秒数
    $secs=$now-$time;
     
    if($todayArr[0]-$dayArr[0]>0 && $days>3){//跨年且超过3天
        return date('m-d',$time);
    }else{
        if($days<1){//今天
			return date('H:i',$time);
        }else{//三天前
            return date('m-d',$time);
        }
    }
}

function show_info($f_table_name,$f_fvalue,$f_svalue,$f_value){
	global $conn;
	if (!$f_table_name) $f_table_name = 'atype_info';
	if (!$f_svalue) $f_svalue = 'id';
	if (!$f_value) $f_value = 'cn_name';
	$f_sql = 'select * from `'.$f_table_name.'` where `'.$f_svalue.'` = \''.$f_fvalue.'\'';
	$f_result = mysql_query($f_sql);
	$f_rs = mysql_fetch_array($f_result);
	$l_value = $f_rs[$f_value];
	return $l_value;
}
//推送。指定人
error_reporting(E_ALL^E_NOTICE);
class ApipostAction{

	private $_appkeys = 'a9cedb1750cbd8a95be84b0d';
	private $_masterSecret = '9adea0d8dd6474f789a5f18f';

	function request_post($url="",$param="",$header="") {
		if (empty($url) || empty($param)) {
			return false;
		}
		$postUrl = $url;
		$curlPost = $param;
		$ch = curl_init();//初始化curl
		curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
		curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
		curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
		// 增加 HTTP Header（头）里的字段
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		// 终止从服务端进行验证
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
		$data = curl_exec($ch);//运行curl

		curl_close($ch);
		return $data;
	}

	function send($phone,$title,$message)
	{
		$url = 'https://api.jpush.cn/v3/push';
		$base64=base64_encode("$this->_appkeys:$this->_masterSecret");
		
		$header=array("Authorization:Basic $base64","Content-Type:application/json");
		// print_r($header);
		//$param='{"platform":"all","audience":"all","notification" : {"alert" : "'.$message.'"},"message":{"msg_content":"'.$message.'","title":"'.$title.'"}}';
		//推送指定用户
		//$param='{"platform":"all","audience":{"alias":["'.$phone.'"]},"message":{"msg_content":"'.$message.'","title":"'.$title.'"}}';
		//推送全部用户
		$param = '{
   "platform": "all",
   "audience" : "all",
   "notification" : {
      "alert" : "Hi, JPush!"
   }
}';
		
		$res = $this->request_post($url,$param,$header);

		$res_arr = json_decode($res, true);
		print_r($res_arr);die;
		
	}
}




/**
+------------------------------------------------------------------------------
 *                等比例压缩图片
+------------------------------------------------------------------------------
 * @param String $src_imagename 源文件名        比如 “source.jpg”
 * @param int    $maxwidth      压缩后最大宽度
 * @param int    $maxheight     压缩后最大高度
 * @param String $savename      保存的文件名    “d:save”
 * @param String $filetype      保存文件的格式 比如 ”.jpg“
 * @author Yovae     <yovae@qq.com>
 * @version 1.0
+------------------------------------------------------------------------------
 */
function resizeImage($src_imagename,$maxwidth,$maxheight,$savename,$filetype)
{
	if($filetype=='.jpg'){
		$im=@imagecreatefromjpeg($src_imagename);
	}elseif($filetype=='.png'){
		$im=@imagecreatefrompng($src_imagename);
	}else {
		$im = @imagecreatefromjpeg($src_imagename);
	}
	$current_width = @imagesx($im);
	$current_height = @imagesy($im);

	if(($maxwidth && $current_width > $maxwidth) || ($maxheight && $current_height > $maxheight))
	{
		if($maxwidth && $current_width>$maxwidth)
		{
			$widthratio = $maxwidth/$current_width;
			$resizewidth_tag = true;
		}

		if($maxheight && $current_height>$maxheight)
		{
			$heightratio = $maxheight/$current_height;
			$resizeheight_tag = true;
		}

		if($resizewidth_tag && $resizeheight_tag)
		{
			if($widthratio<$heightratio)
				$ratio = $widthratio;
			else
				$ratio = $heightratio;
		}

		if($resizewidth_tag && !$resizeheight_tag)
			$ratio = $widthratio;
		if($resizeheight_tag && !$resizewidth_tag)
			$ratio = $heightratio;

		$newwidth = $current_width * $ratio;
		$newheight = $current_height * $ratio;

		if(function_exists("imagecopyresampled"))
		{
			$newim = imagecreatetruecolor($newwidth,$newheight);
			imagecopyresampled($newim,$im,0,0,0,0,$newwidth,$newheight,$current_width,$current_height);
		}
		else
		{
			$newim = imagecreate($newwidth,$newheight);
			imagecopyresized($newim,$im,0,0,0,0,$newwidth,$newheight,$current_width,$current_height);
		}

		$savename = $savename.$filetype;
		imagejpeg($newim,$savename);
		imagedestroy($newim);

		return true;

	}
	else
	{
		$file_name=explode('/',$savename);
		$num = strlen($file_name[1]);;
		$pre = substr($file_name[1],4,$num);
		$savename = $file_name[0].'/'.$pre;

		$savename = $savename.$filetype;
		@imagejpeg($im,$savename);

		return true;
	}
}




//压缩图片
function  narrow_photo2($photo,$width,$height,$files)
{
//封面格式化
	$file_name_f = explode('.', $photo);
//strtolower将字符串转换为小写形式
	$file_name_type = '.' . strtolower($file_name_f[count($file_name_f) - 1]);
	$file_names = $file_name_f[count($file_name_f) - 2] . '_pre';
	$file_name = $file_names . $file_name_type;
	$savename = $files. $file_names;

	$luj = $files . $file_name;
	if (!file_exists($luj)) {

		$tempName = $files . $photo;
		if (resizeImage($tempName, $width, $height, $savename, $file_name_type)) {
			if ($file_name_type == '.jpg') {
				$im = imagecreatefromjpeg($tempName);
			} elseif ($file_name_type == '.png') {
				$im = imagecreatefrompng($tempName);
			} else {
				$im = imagecreatefromjpeg($tempName);
			}
			$current_width = imagesx($im);
			$current_height = imagesy($im);
			$maxwidth = $width;
			$maxheight = $height;
			if (($maxwidth && $current_width > $maxwidth) || ($maxheight && $current_height > $maxheight)) {
				$pre_img = $file_name;
				return $pre_img;
			} else {
				$pre_img = $photo;
				return $pre_img;
			}

		}
	} else {
		$pre_img = $file_name;
		return $pre_img;
	}
}









