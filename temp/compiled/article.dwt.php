<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="icon" href="favicon.gif" type="image/gif" />
<link href="themes/miqinew/css/common.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/css/index1.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/style.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/css/tuang.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/css/common.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/css/style.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="themes/miqinew/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="themes/miqinew/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="themes/miqinew/js/nav.js"></script>
<script type="text/javascript" src="themes/miqinew/js/js.js"></script>
<script type="text/javascript" src="themes/miqinew/js/modal.js"></script>
<script type="text/javascript" src="themes/miqinew/js/script.js"></script>

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js')); ?>
</head>
<body>

<?php echo $this->fetch('library/page_header.lbi'); ?>

<div class="content">
<div class="contentBody">
<div class="block_s">


 <div class="cur_wz">
  <?php echo $this->fetch('library/ur_here.lbi'); ?>

</div>

<div class="blank"></div>

  
  <div class="help_left">

  <?php echo $this->fetch('library/left_help.lbi'); ?>




    
  </div>
  
  


         <div class="user_r" style="    margin-left: 43px;
    margin-top: 2px;">
    <?php if ($this->_var['article']['article_id'] != '69'): ?>
        <div class="qtxx dongt">
            <div class="tit1"><?php echo htmlspecialchars($this->_var['article']['title']); ?></div>
            <div class="con1">
              <?php if ($this->_var['article']['content']): ?>
          <?php echo $this->_var['article']['content']; ?>
         <?php endif; ?>
        </div>
        </div>
        <?php else: ?>


        <div class="qtxx dongt">
          <div class="tit1"><?php echo htmlspecialchars($this->_var['article']['title']); ?></div>
            <div class="con1">
            <form action="jiameng.php" method="post" name="jiameng" id="jiameng">
        <table width="100%" border="0" cellspacing="10" cellpadding="0" class="jojn_ta">
  <tbody><tr>
    <td align="right" width="30%">姓名：</td>
    <td width="70%"><input name="name" id="name" type="text" class="jojn_text"></td>
  </tr>
  <tr>
    <td align="right">联系电话：</td>
    <td><input name="iphone" id="iphone" type="text" class="jojn_text"></td>
  </tr>
  <tr>
    <td align="right">邮箱地址：</td>
    <td><input name="email" id="email" type="text" class="jojn_text"></td>
  </tr>
  <tr>
    <td align="right">所在地址：</td>
    <td><input name="dizhi" id="dizhi" type="text" class="jojn_text_1"></td>
  </tr>
  <tr>
    <td align="right" valign="top">备注：</td>
    <td><textarea name="beizhu" id="beizhu" cols="" class="jojn_text_2" rows="3"></textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>

    <td align="left" class="jojn_td"><a href="javascript:yan();">提交</a></td>
  </tr>
</tbody></table>
</form>
<script type="text/javascript">
      function yan(){
        var name = document.getElementById('name').value;
        var iphone = document.getElementById('iphone').value;
        var email = document.getElementById('email').value;
        var dizhi = document.getElementById('dizhi').value;
        var beizhu = document.getElementById('beizhu').value;
         var isMob = /^((\+?86)|(\(\+86\)))?(13[012356789][0-9]{8}|15[012356789][0-9]{8}|18[02356789][0-9]{8}|147[0-9]{8}|1349[0-9]{7})$/;
         var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
         var msg = '';
         if(name.length <= 0){
            msg += "请输入姓名\n";
         }
         if(!isMob.test(iphone)){
            msg += "手机号码不对\n";
         }
         if(!myreg.test(email)){
            msg += "邮箱不对\n";
         }
         if(dizhi.length <= 0){
            msg += "请填写详细地址\n";
         }
         if(msg.length > 0){
            alert(msg);
            return false;
         }   

        document.jiameng.submit();
        
      }
</script>

          </div>
        </div>

        <?php endif; ?>
    </div>
     
   
  
  <div class="blank"></div>
  

  

</div>
</div>
</div>
<div class="blank5"></div>
<div class="flow">
<div class="footer">
<div class="footerBody">
<Div class="block_s">
<?php echo $this->fetch('library/page_footer.lbi'); ?>
</Div>
</div>
</div>
</div>
</body>
</html>
