<?php
/*
*   注册app接口
*	$username           会员用户名
*	$password      		会员密码 
*	$code_sms      		短信验证码 
*/
define('IN_ECS', true);
session_start();
require(dirname(__FILE__) . './../includes/init.php');
/* 载入语言文件 */
require_once(ROOT_PATH . 'languages/' .$_CFG['lang']. '/user.php');


	/* 增加是否关闭注册 */
    if ($_CFG['shop_reg_closed'])
    {
        ajaxReturn(array('ret_code' => 0, 'msg' => '已关闭了注册功能', 'data' => array()));
    }
    else
    {
        include_once(ROOT_PATH . 'includes/lib_passport.php');
        
        $username = isset($_REQUEST['mobile']) ? trim($_REQUEST['mobile']) : '';//手机号码兼用户名
        $password = isset($_REQUEST['password']) ? trim($_REQUEST['password']) : ''; //用户密码
        $phones = $username;//手机号码手机号码兼用户名
        $email = $phones.'@qq.com';
        $code_sms = isset($_REQUEST['code_sms']) ? $_REQUEST['code_sms'] : ''; //短信验证码
        $other['msn'] = isset($_REQUEST['extend_field1']) ? $_REQUEST['extend_field1'] : '';
        $other['qq'] = isset($_REQUEST['extend_field2']) ? $_REQUEST['extend_field2'] : '';
        $other['office_phone'] = isset($_REQUEST['extend_field3']) ? $_REQUEST['extend_field3'] : '';
        $other['home_phone'] = isset($_REQUEST['extend_field4']) ? $_REQUEST['extend_field4'] : '';
        $other['mobile_phone'] = isset($_REQUEST['extend_field5']) ? $_REQUEST['extend_field5'] : '';
        $sel_question = empty($_REQUEST['sel_question']) ? '' : compile_str($_REQUEST['sel_question']);
        $passwd_answer = isset($_REQUEST['passwd_answer']) ? compile_str(trim($_REQUEST['passwd_answer'])) : '';
        $back_act = isset($_REQUEST['back_act']) ? trim($_REQUEST['back_act']) : '';
        if($_SESSION['sms_phone_code'] != $code_sms){
        	//验证码错误
        	ajaxReturn(array('ret_code' => 0, 'msg' => '验证码错误', 'data' => array()));
        }
        if (strlen($username) < 6)
        {
            ajaxReturn(array('ret_code' => 0, 'msg' => '用户名不能小于6个字符', 'data' => array()));
        }

        if (strlen($password) < 6)
        {
            ajaxReturn(array('ret_code' => 0, 'msg' => '密码太过简短', 'data' => array()));
        }

        if (strpos($password, ' ') > 0)
        {
            show_message($_LANG['passwd_balnk']);
        }

        /* 验证码检查 */
        if ((intval($_CFG['captcha']) & CAPTCHA_REGISTER) && gd_version() > 0)
        {
            if (empty($_POST['captcha']))
            {
                show_message($_LANG['invalid_captcha'], $_LANG['sign_up'], 'user.php?act=register', 'error');
            }

            /* 检查验证码 */
            include_once('includes/cls_captcha.php');

            $validator = new captcha();
            if (!$validator->check_word($_POST['captcha']))
            {
                show_message($_LANG['invalid_captcha'], $_LANG['sign_up'], 'user.php?act=register', 'error');
            }
        }

        if (register($username, $password, $email, $other) !== false)
        {
        	
            /*把新注册用户的扩展信息插入数据库*/
            $sql = 'SELECT id FROM ' . $ecs->table('reg_fields') . ' WHERE type = 0 AND display = 1 ORDER BY dis_order, id';   //读出所有自定义扩展字段的id
            $fields_arr = $db->getAll($sql);

            $extend_field_str = '';    //生成扩展字段的内容字符串
            foreach ($fields_arr AS $val)
            {
                $extend_field_index = 'extend_field' . $val['id'];
                if(!empty($_POST[$extend_field_index]))
                {
                    $temp_field_content = strlen($_POST[$extend_field_index]) > 100 ? mb_substr($_POST[$extend_field_index], 0, 99) : $_POST[$extend_field_index];
                    $extend_field_str .= " ('" . $_SESSION['user_id'] . "', '" . $val['id'] . "', '" . compile_str($temp_field_content) . "'),";
                }
            }
            $extend_field_str = substr($extend_field_str, 0, -1);

            if ($extend_field_str)      //插入注册扩展数据
            {
                $sql = 'INSERT INTO '. $ecs->table('reg_extend_info') . ' (`user_id`, `reg_field_id`, `content`) VALUES' . $extend_field_str;
                $db->query($sql);
            }

            /* 写入密码提示问题和答案 */
            if (!empty($passwd_answer) && !empty($sel_question))
            {
                $sql = 'UPDATE ' . $ecs->table('users') . " SET `passwd_question`='$sel_question', `passwd_answer`='$passwd_answer'  WHERE `user_id`='" . $_SESSION['user_id'] . "'";
                $db->query($sql);
            }
            /* 写入密码提示问题和答案 */
            if ($phones)
            {
                $sql = 'UPDATE ' . $ecs->table('users') . " SET `mobile_phone`='$phones'  WHERE `user_id`='" . $_SESSION['user_id'] . "'";
                $db->query($sql);
            }
            /* 判断是否需要自动发送注册邮件 */
            if ($GLOBALS['_CFG']['member_email_validate'] && $GLOBALS['_CFG']['send_verify_email'])
            {
                send_regiter_hash($_SESSION['user_id']);
            }
            //生成用户二维码



            $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    $_REQUEST['data'] = 'http://win.qbt8.com/guoa/?='.$_SESSION['user_id'];
    //html PNG location prefix

    $PNG_WEB_DIR = './../temp/';

    include "./../phpqrcode/qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 6;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) { 
    
        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');
            
        // user data
        $filename = $PNG_WEB_DIR.$_SESSION[user_id].'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } else {    
    
        //default data
        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    
    
        
    // benchmark
    //QRtools::timeBenchmark();
    $sql = " update ecs_users set QR_code = '$filename' where user_id = ".$_SESSION[user_id];
    $id = mysql_query($sql);
    //生成用户二维码结束







            $ucdata = empty($user->ucdata)? "" : $user->ucdata;
            ajaxReturn(array('ret_code' => 1, 'msg' => '注册成功', 'data' => array()));
        }
        else
        {
            ajaxReturn(array('ret_code' => 0, 'msg' => '注册失败', 'data' => array()));
        }
    }