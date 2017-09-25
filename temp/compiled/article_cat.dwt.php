<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
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
  
  



  <div class="user_r" style="margin-left: 43px;
    margin-top: 0px;">
      <div class="qtxx dongt">
          <div class="tit">最新公告</div>
            <div class="lb">
              <ul>
              <?php $_from = $this->_var['artciles_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article_0_89733600_1463921420');if (count($_from)):
    foreach ($_from AS $this->_var['article_0_89733600_1463921420']):
?>
                  <li><span><a href="<?php echo $this->_var['article_0_89733600_1463921420']['url']; ?>"><?php echo $this->_var['article_0_89733600_1463921420']['short_title']; ?></a></span><font><?php echo $this->_var['article_0_89733600_1463921420']['add_time']; ?></font></li>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                </ul>
<?php echo $this->fetch('library/pages.lbi'); ?>
            </div>
        </div>
    </div>













  
  

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
<script type="text/javascript">
document.getElementById('cur_url').value = window.location.href;
</script>
</html>
