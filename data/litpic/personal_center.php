<?php
/*
*   个人中心app接口
*	$user_id           	会员用户id
*	$action           	处理类型
*/
define('IN_ECS', true);


require(dirname(__FILE__) . './../includes/init.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');
$http = str_replace('api3/personal_center.php','',strtolower('http://'.$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"]));	
$user_id = $_REQUEST['user_id'];//获取用户会员id

$action = $_REQUEST['action'];//获取处理类型,为空默认调用会员中心三个数据
if(empty($user_id)){
    	ajaxReturn(array('ret_code' => 0, 'msg' => '请先登录', 'data' => array()));
    }
if($action == 'modification'){  //个人资料修改
	$sqln = $_REQUEST['name'];
	$sqlv = trim($_REQUEST['value']);
	
	ob_start();
		$data = json_encode($_FILES);
		ob_clean();
		file_put_contents("file.txt",$data);
		// include_once(dirname(__FILE__) . './../includes/cls_image.php'); //图片上传加载类
		// $litpic = upload_file($_FILES['file'],'litpic/'.$dd);
		// 	    $sqlv = $http.'litpic/'.$dd.'/'.$litpic;
		// if($sqln == 'head_portrait'){
		// 	$sqlv = '23434';
		// }
	if($sqln && $sqlv){
		if($sqln == 'head_portrait'){  //上传是否是头像
				//include_once(dirname(__FILE__) . './../includes/cls_image.php'); //图片上传加载类
				//include_once(ROOT_PATH . 'includes/cls_image.php');
    			//$image = new cls_image($_CFG['bgcolor']);//实力化
    			/* 处理图片 */
			    $dd = date("Y-m/d");
			    //$litpic = basename($image->upload_image($_FILES['file'],'data/litpic/'.$dd));
			    $litpic = upload_file($_FILES['file'],'litpic/'.$dd);
			    $sqlv = $http.'litpic/'.$dd.'/'.$litpic;

		}else{  //其他资料修改
			if($sqln == 'birthday'){  //是否是时间修改
				//var_dump(strtotime($sqlv));die;

				$sqlv = str_replace('.','-',$sqlv);
				$sqlv = local_date('Y-m-d',strtotime($sqlv));
				
			}			
		}
		$db->query("update ". $ecs->table('users') ." set $sqln = '$sqlv'  where user_id = '$user_id'");//修改其字段
			$users = array('name'=>$sqln,'value'=>$sqlv);

			// if($users['name'] == 'birthday'){
				
			// 	$users['value'] = local_date('Y-m-d',$sqlv);
			// }
			if($users['name'] == 'head_portrait'){
				$users['value']  = $http.'data/'.$sqlv;
			}

		ajaxReturn(array('ret_code' => 1, 'msg' => '修改成功', 'data' => $users));
	}else{
		ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
	}

}elseif($action == 'address'){ //收货地址接口
	include_once(ROOT_PATH . 'includes/lib_transaction.php');//收货地址加载文件
    include_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/shopping_flow.php');//收货地址加载文件
    $type = $_REQUEST['type'];

    if($type == 'update'){//修改收货地址
    	
    	$address_id = $_REQUEST['address_id'];//需要传过来的参数，会员地址id
    	if($address_id){
    	$update_type = $_REQUEST['update_type'];//需要传过来的参数，需要修改的内容，修改默认地址或者修改收货地址,1,修改收货地址显示；2，修改默认收货地址；3，c处理收货地址修修改的
	    		if($update_type == '1'){
	    			$sql = " select country,province,city,district,address,mobile,consignee from " . $ecs->table('user_address') . " where address_id = '$address_id'";
			    	$dizhi = $db->getOne($sql);//获取需要修改的收货地址
			    	$dizhi['country']  = huoqudiqu($dizhi['country']);//国家
			    	$dizhi['province']  = huoqudiqu($dizhi['province']);//省/直辖市
			    	$dizhi['city']  = huoqudiqu($dizhi['city']);        //地级市
			    	$dizhi['district']  = huoqudiqu($dizhi['district']);//县级市/区
			    	$dizhi['ssq'] = $dizhi['country'].$dizhi['province'].$dizhi['city'].$dizhi['district'];//把地址拼成详细的省市区
			    	ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $dizhi));
	    		}elseif($update_type == '2'){//修改默认收货地址
	    			
	    			
	    				$sql = " update " .$ecs->table('users'). " set address_id = '$address_id' where user_id = '$user_id'";
	    			
	    			if($db->query($sql)){
	    				ajaxReturn(array('ret_code' => 1, 'msg' => '修改成功', 'data' => array()));
	    			}else{
	    				ajaxReturn(array('ret_code' => 0, 'msg' => '修改失败', 'data' => array()));
	    			}

	    		}else{
	    			//处理修改收货地址

	    			$data['consignee'] = $_REQUEST['consignee'];
	    			$data['country'] = $_REQUEST['country'];
	    			$data['province'] = $_REQUEST['province'];
	    			$data['city'] = $_REQUEST['city'];
	    			$data['district'] = $_REQUEST['district'];
	    			$data['address'] = $_REQUEST['address'];
	    			$data['mobile'] = $_REQUEST['mobile'];
	    			foreach ($data as $key => $value) {
	    				$kk .= $key."='".$value."',";
	    				
	    			}
	    			$kk = substr($kk,0, -1);

	    			$sql = " update " .$ecs->table('user_address'). " set ". $kk . " where address_id = $address_id";
	    			if($db->query($sql)){
	    				ajaxReturn(array('ret_code' => 1, 'msg' => '修改成功', 'data' => array()));
	    			}else{
	    				ajaxReturn(array('ret_code' => 0, 'msg' => '修改失败', 'data' => array()));
	    			}
	    		}
    		}else{
    			ajaxReturn(array('ret_code' => 0, 'msg' => '请选择要操作的收货地址', 'data' => array()));
    		}
	    	
    }elseif($type == 'add'){ //增加收货地址
    			$data['consignee'] = $_REQUEST['consignee'];
    			$data['country'] = $_REQUEST['country'];
    			$data['province'] = $_REQUEST['province'];
    			$data['city'] = $_REQUEST['city'];
    			$data['district'] = $_REQUEST['district'];
    			$data['address'] = $_REQUEST['address'];
    			$data['mobile'] = $_REQUEST['mobile'];
    			$data['user_id'] = $user_id;
    			foreach ($data as $key => $value) {
    				$sqln .= $key.',';
    				$sqlv .= '\''.$value.'\',';
    				
    			}
    			$sqln = substr($sqln,0, -1);
    			$sqlv = substr($sqlv,0, -1);
    			//var_dump($sqlv);die;
    			$sql  = "insert into " .$ecs->table('user_address'). " ($sqln) values($sqlv)";
    			if($db->query($sql)){
    				ajaxReturn(array('ret_code' => 1, 'msg' => '新增成功', 'data' => array()));
    			}else{
    				ajaxReturn(array('ret_code' => 0, 'msg' => '服务器错误', 'data' => array()));
    			}
    			//插入数据库操作

    }elseif($type == 'del'){//删除会员地址
	    	$address_id = $_REQUEST['address_id'];//接收会员地址的id
	    	if($address_id){
		    	$sql = "delete from " .$ecs->table('user_address') . " where address_id = '$address_id'";

		    	if($db->query($sql)){
		    		ajaxReturn(array('ret_code' => 1, 'msg' => '删除成功', 'data' => array()));
		    	}else{
		    		ajaxReturn(array('ret_code' => 0, 'msg' => '删除失败', 'data' => array()));
		    	}
	    	}else{
	    		ajaxReturn(array('ret_code' => 0, 'msg' => '请选择要删除的地址', 'data' => array()));
	    	}


    }else{ //获取会员用户的地址
		$consignee_list = get_consignee_list($user_id);
		//获取用户的默认地址

		$sql = "SELECT address_id FROM " . $GLOBALS['ecs']->table('users') .
            " WHERE user_id = '$user_id'";

    $address_id = $GLOBALS['db']->getOne($sql);

		foreach ($consignee_list as $key => $value) {
        	//获取城市地区名称	        
	        $consignee_list[$key]['country'] = huoqudiqu($value['country']);
	        $consignee_list[$key]['province'] = huoqudiqu($value['province']);
	        $consignee_list[$key]['city'] = huoqudiqu($value['city']);
	        $consignee_list[$key]['district'] = huoqudiqu($value['district']);
	        $consignee_list[$key]['country_id'] = $value['country'];
	        $consignee_list[$key]['province_id'] = $value['province'];
	        $consignee_list[$key]['city_id'] = $value['city'];
	        $consignee_list[$key]['district_id'] = $value['district'];
	        if($value['address_id'] == $address_id){
	        	$consignee_list[$key]['morens'] = 1;
	        }else{
	        	$consignee_list[$key]['morens'] = 0;
	        }
    	}
		if($consignee_list){
			ajaxReturn(array('ret_code' => 1, 'msg' => '获取成功', 'data' => $consignee_list));
		}else{
			ajaxReturn(array('ret_code' => 1, 'msg' => '收货地址为空', 'data' => array()));
		}
	}

}elseif($action == 'suggestion'){ //添加反馈建议
	/*
	* msg_content  	添加的内容
	* user_id  		会员id
	* user_name  	会员用户名
	* email  		会员邮箱
	**/
	include_once(ROOT_PATH . 'includes/lib_clips.php');
	$user_id = $_REQUEST['user_id'];
	$msg_content  = $_REQUEST['msg_content'];
	if(!$user_id){
		ajaxReturn(array('ret_code' => 0, 'msg' => '参数错误', 'data' => array()));
	}
	if(!$msg_content){
		ajaxReturn(array('ret_code' => 0, 'msg' => '内容不能为空', 'data' => array()));
	}
	//获取会员用户名
	$sql = " select user_name from " .$ecs->table('users'). " where user_id = '$user_id'";
	$user_name = $db->getOne($sql);

    $message = array(
        'user_id'     => $user_id,
        'user_name'   => $user_name ? $user_name :'匿名用户',
        'user_email'  => '',
        'msg_type'    => isset($_REQUEST['msg_type']) ? intval($_REQUEST['msg_type'])     : 0,
        'msg_title'   => isset($_REQUEST['msg_title']) ? trim($_REQUEST['msg_title'])     : '',
        'msg_content' => isset($_REQUEST['msg_content']) ? trim($_REQUEST['msg_content']) : '',
        'order_id'=>empty($_REQUEST['order_id']) ? 0 : intval($_REQUEST['order_id']),
        'upload'      => (isset($_FILES['message_img']['error']) && $_FILES['message_img']['error'] == 0) || (!isset($_FILES['message_img']['error']) && isset($_FILES['message_img']['tmp_name']) && $_FILES['message_img']['tmp_name'] != 'none')
         ? $_FILES['message_img'] : array()
     );
    if (add_message($message))
    {
        ajaxReturn(array('ret_code' => 1, 'msg' => '提交成功', 'data' => array()));
    }
    else
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '服务器错误，请稍后再试', 'data' => array()));
    }
}
  
//获取城市名称
function huoqudiqu($id){
        $sql = " select region_name from "  .$GLOBALS['ecs']->table('region'). " where region_id = '$id'";
        $dizhi = $GLOBALS['db']->getOne($sql);
        return $dizhi;
    }



/**
 * 取得收货人地址列表
 * @param   int     $user_id    用户编号
 * @return  array
 */
function get_consignee_lists($user_id)
{
    $sql = "SELECT * FROM " . $GLOBALS['ecs']->table('user_address') .
            " WHERE user_id = '$user_id' LIMIT 5";

    return $GLOBALS['db']->getAll($sql);
}
?>