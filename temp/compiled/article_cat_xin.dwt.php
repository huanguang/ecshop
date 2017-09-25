<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>秀当公益-秀当红酒商城</title>

<link rel="icon" href="favicon.gif" type="image/gif" />

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
<style>
#nav .mod_subcate{top:0;}
</style>
</head>

<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>


<div class="cur_wz">
	<span><a href="index.php">首页</a></span> > 秀当公益
</div>



<div class="main_box">

<div class="dongtai_l">

<?php if ($this->_var['helps_left']): ?>
<div id="questions" class="article_l">
	<div class="tit"><a href="public.php">秀当公益</a></div>
	<ul>
<?php $_from = $this->_var['helps_left']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'help_cat');$this->_foreach['cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['help_cat']):
        $this->_foreach['cat']['iteration']++;
?>
		<li class="clearfix">
			<h5  <?php if ($this->_var['key'] == $this->_var['cat_id']): ?> class="on"<?php else: ?>class=''<?php endif; ?>>
			<b class="UI-ask"></b><?php echo $this->_var['help_cat']['cat_name']; ?></h5>
			<div class="foldContent">
            <?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
				<p><a href="<?php if ($this->_var['item']['short_title'] == '发布征集'): ?>zhengji.php<?php elseif ($this->_var['item']['short_title'] == '征集列表'): ?>zhengji_list.php<?php elseif ($this->_var['item']['short_title'] == '最新公告'): ?>article_cat.php?id=19<?php elseif ($this->_var['item']['short_title'] == '促销活动'): ?>article_cat.php?id=20<?php elseif ($this->_var['item']['short_title'] == '媒体报道'): ?>article_cat.php?id=21<?php else: ?><?php echo $this->_var['item']['url']; ?><?php endif; ?>"><?php echo $this->_var['item']['short_title']; ?></a></p>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
		</li>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
    <div class="clear"></div>
</div>
<?php endif; ?>
</div>
    


    <div class="user_r" style="width:940px;">
    	<div class="qtxx dongt">
        	<div class="tit1"><?php echo $this->_var['article']['title']; ?></div>
            <div class="con1">
            
<?php echo $this->_var['article']['content']; ?>
            </div>
        </div>
    </div>
<div class="clear"></div>     
</div>



<?php echo $this->fetch('library/page_footer.lbi'); ?> 
</body>
</html>