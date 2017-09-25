<?php if ($this->_var['helps']): ?>
<div class="dongtai_l">
<div id="questions" class="article_l">
	<div class="tit">常见问题分类</div>
	<ul>
	<li class="clearfix fold">
			<h5><b class="UI-ask"></b>网站新闻</h5>
			<div class="foldContent" style="display: block;">
				<p><a href="article_cat.php?id=19">最新公告</a></p>
				<p><a href="article_cat.php?id=20">促销活动</a></p>
				<p><a href="article_cat.php?id=21">媒体报道</a></p>
			</div>
		</li>
	<?php if ($this->_var['helps']): ?>


<?php $_from = $this->_var['helps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'help_cat');$this->_foreach['cat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['cat']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['help_cat']):
        $this->_foreach['cat']['iteration']++;
?>
		<li class="clearfix">
			<h5><b class="UI-ask"></b><?php echo $this->_var['help_cat']['cat_name']; ?></h5>
			<div class="foldContent">
			<?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
				<p><a href="<?php echo $this->_var['item']['url']; ?>"><?php echo $this->_var['item']['short_title']; ?></a></p>

				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</div>
		</li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endif; ?>
		</ul>
    <div class="clear"></div>
</div>
</div>
<?php endif; ?>
