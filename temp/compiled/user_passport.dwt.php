<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_var['page_title']; ?></title>

<link rel="icon" href="favicon.gif" type="image/gif" />
<link href="themes/miqinew/css/common.css" type="text/css" rel="stylesheet" />
<link href="themes/miqinew/css/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="themes/miqinew/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="themes/miqinew/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="themes/miqinew/js/nav.js"></script>
<script type="text/javascript" src="themes/miqinew/js/js.js"></script>
<script type="text/javascript" src="themes/miqinew/js/modal.js"></script>
<style>
#nav .mod_subcate{top:0;}
</style>
</head>

<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js,transport.js')); ?>
<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>

<div class="cur_wz">
  <?php echo $this->fetch('library/ur_here.lbi'); ?>
</div>

<?php if ($this->_var['action'] == 'login'): ?>
<form action="user.php" method="post" name="formLogin" onsubmit="return userLogin();">

<div class="login">
  <div class="login_l"><img src="themes/miqinew/images/login_pic.jpg" /></div>
  <div class="login_r">
      <div class="srk">
          <p>用户名</p>
            <input name="username" id="username"  type="text"  class="k1" placeholder="请输入手机号/昵称"/>
        </div>

      <div class="srk">
          <p>密码</p>
<input type="password" name="password" id="password1" placeholder="请输入密码" class="k1"  >
        </div>

      <div class="zcwj">
          <span><a href="user.php?act=qpassword_name">忘记密码？</a></span>
          <font><a href="user.php?act=register">立即注册</a></font>
        </div>

            <input type="hidden" name="act" value="act_login" />
            <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />

        <div class="dl_an">
        <input type="submit" name="submit" value="登录" /></input>
        </div>
        <div class="line"></div>
        <div class="dsf">
          <p>第三方快捷登录</p>
            <div class="tb">
                <a class="qq" href="user.php?act=oath&type=qq"></a>
                <a class="wx" href="#"></a>
                <a class="xl" href="user.php?act=oath&type=weibo"></a>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

    </form>
<?php endif; ?>

<?php if ($this->_var['action'] == 'register'): ?>
  <div class="div_1200_d" id="close_pro_nav">
  <table width="1100" border="0" align="center" cellpadding="10" cellspacing="0" class="line3">
    <tr>
      <td align="left" bgcolor="#FFFFFF" class="agy20">用户注册</td>
      <td align="right" bgcolor="#FFFFFF"><a href="user.php">已有秀当账号，立即登录！</a></td>
      <td width="65" align="right" bgcolor="#FFFFFF"><a href="user.php"><img src="themes/miqinew/images/bnt_login2.gif" width="65" height="27" border="0"></a></td>
    </tr>
  </table>
  <div class="blank36"></div>

  <form action="user.php" method="post" name="formUser" id="formreg" onsubmit="return register();">

  <table width="900"  border="0" align="center" cellpadding="5" cellspacing="3" bgcolor="#FFFFFF">

    <tr>
      <td width="80" align="left" class="abk14">用 户 名：</td>
      <td width="300">
         <input name="username" onblur="is_registered(this.value);"  type="text" size="25" id="username"  class="ina4_mem"/>
        <td><span id="username_notice" style="color:#FF0000;"> 请输入用户名(不能少于6个字符)</span></td>
      </td>
    </tr>

    <tr>
      <td width="80" align="left" class="abk14">邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</td>
      <td width="300">
      <input name="email" type="text" size="40" id="email"  onblur="checkEmail(this.value);"  class="ina4_mail" />
      <td><span id="email_notice" style="color:#FF0000"> 请输入您常用的电子邮箱</span></td>
      </td>
    </tr>

    <tr>
      <td width="80" align="left" class="abk14">密&nbsp;&nbsp; &nbsp;码：</td>
      <td width="300">
          <input name="password" type="password" class="ina4_pw" id="password1" size="25" onblur="check_password(this.value);" onkeyup="checkIntensity(this.value)"  /></td>
      <td>  <span style="color:#FF0000" id="password_notice"> 6-18字符，可使用字母及数字的任意组合，不建议使用纯字母、纯数字</span> </td>
    </tr>

    <tr>
      <td width="80" align="left" class="abk14">确认密码：</td>
      <td width="300">
        <input name="confirm_password" type="password" class="ina4_pw" id="conform_password" onblur="check_conform_password(this.value);" size="25"/></td>
      <td> <span style="color:#FF0000" id="conform_password_notice"> 6-18字符，可使用字母及数字的任意组合，不建议使用纯字母、纯数字</span></td>
    </tr>

    <tr>
      <td width="80" align="left" class="abk14">手机号码：</td>
      <input type="hidden" id="shoujiyanzheng" name="shoujiyanzheng" value=""/>
      <td width="300">
      <table width="290" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td width="300">
                <input name="phonessss" class="ina4" id="phones" onblur="check_phones(this.value);" size="20" type="text" style="width:280px"></td>

          </tr>
        </tbody>
      </table>
      </td>
      <td class="reg_td">
          <span style="color:#FF0000" id="extend_field_phone"> 请输入11位手机号码，目前只支持国内手机用户</span>
      </td>
    </tr>

    <tr>
      <td width="80" align="left" class="abk14">验 证 码：</td>
      <td width="200"><table width="290" border="0" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td width="200">
              <input name="verify" class="ina4" id="verify" size="20" type="text" onkeyup="yanzheng(this);"  style="width:90px"><span id="hehe"></span>
              <input type="hidden" name="msg" id="msg" value="0">
              <input type="button" id="btn" name="btn" style="float:right;height: 37px;" value="点击获取验证码" />
            </td>
          </tr>
        </tbody>
      </table></td>
      <td>



<script> 


   var countdown=120; 
    function settime(val) { 
    if (countdown == 0) { 
      val.removeAttribute("disabled");    
      val.value="点击获取验证码"; 
      countdown = 120; 
    } else { 
      val.setAttribute("disabled", true); 
      val.value="重新发送(" + countdown + ")"; 
      countdown--; 
    }
    var re = /^1[3|4|5|8][0-9]\d{4,8}$/;
    var phones = decument.getElementById('phones').value;

    if(re.test(phones)){
      setTimeout(function() { 
      settime(val) 
      },1000) 
    }else{
      alert('请输入正确的手机号码');
    }
    }
</script> 
<script>
    function yanzheng(obj){
        $.ajax({
             type: "POST",
             url: "user.php?act=yanzhneg",
             data: {yanzhengma:obj.value},
             dataType: "json",
             success: function(data){
                          document.getElementById('msg').value = data.error;
                          if(data.error == 1){
                          document.getElementById('hehe').innerHTML= '<img style="margin-top: 10px;" src="themes/miqinew/images/dot_green.gif"/>';
                        }else{
                            document.getElementById('hehe').innerHTML= '<img  style="margin-top: 10px;" src="themes/miqinew/images/actui.png"/>';
                        }
                      }
         });
    }
</script>

</td>
    </tr>

    <tr>
      <td width="80" height="40" align="left">&nbsp;</td>
      <td width="300"><label>
          <input name="act" type="hidden" value="act_register" >
          <input type="hidden" name="back_act" value="<?php echo $this->_var['back_act']; ?>" />

        <input name="agreement" type="checkbox" value="1" checked="checked" />

        我已阅读并同意《<a href="article.php?cat_id=-1"  target="_blank" class="ab">秀当用户注册协议</a>》</label>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="80" align="left">&nbsp;</td>
      <td width="300" align="left">
      <input type="image"  name="Submit" src="themes/miqinew/images/bnt_reg3.gif"></td>
      <td align="left">&nbsp;</td>
    </tr>

    <tr>
      <td width="80" align="left">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  </form>
</div>

<script type="text/javascript"> 
    //手机号码发送验证码
    $('#btn').click(function(){
      //alert(1);
      var re = /^1[3|4|5|8][0-9]\d{4,8}$/;
    var phones = document.getElementById('phones').value;
    var shoujiyanzheng = document.getElementById('shoujiyanzheng').value;
    if(re.test(phones)){
          if(shoujiyanzheng == 1){
              alert('手机号码已经注册');
          }else{
                var phone_num = $('#phones').val();
                var count = 60;
                $('#phones').attr('disabled', 'disabled');
                var countdown = setInterval(CountDown, 1000);
                function CountDown(){
            
                $('#btn').attr('disabled', true);
                $('#btn').val( count + "秒后重试！" );
                if( count == 0 ){
                    $('#btn').val('获取验证码').removeAttr('disabled');
                    clearInterval(countdown);
                }
                count--;
              }
              $.post('user.php?act=check_verify', {phone_num:phone_num},function( data ){
                //alert(data);
                      alert(data.msg);

              });
          }
      }else{
          alert('请输入正确的手机号码');
  }
});

</script>

<?php endif; ?>
<?php echo $this->fetch('library/page_footer.lbi'); ?> 
</body>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";


</script>
</html>