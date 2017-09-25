

<div class="security"></div>




<div class="link_box">
    <div class="main_box">
<?php if ($this->_var['helps_footer']): ?>
        <ul>
  <?php $_from = $this->_var['helps_footer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cat');$this->_foreach['no'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['no']['total'] > 0):
    foreach ($_from AS $this->_var['help_cat']):
        $this->_foreach['no']['iteration']++;
?>
            <li >
                <p><?php echo $this->_var['help_cat']['cat_name']; ?></p>

      <?php $_from = $this->_var['help_cat']['article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                <p><a href="<?php echo $this->_var['item']['url']; ?>"><?php echo $this->_var['item']['short_title']; ?></a></p>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

            </li>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
<?php endif; ?>
        <div class="zxkf">
            <span>客服热线</span>
            <p><?php echo $this->_var['service_phone']; ?></p>
            <a href="#"><img src="themes/miqinew/images/zxkf.png"></a>
        </div>
        <div class="clear"></div>
    </div>
</div>




<div style="background:#fff;">
<div class="main_box bottom">
	<p><?php echo $this->_var['icp_number']; ?></p>
    <ul>
    	<li><a href="article.php?id=<?php echo $this->_var['fuwu']['article_id']; ?>"><?php echo $this->_var['fuwu']['title']; ?></a></li>
    	<li><a href="article.php?id=<?php echo $this->_var['wangzhan']['article_id']; ?>"><?php echo $this->_var['wangzhan']['title']; ?></a></li>
    	<li><img src="themes/miqinew/images/bottom01.png"></li>
    	<li><img src="themes/miqinew/images/bottom02.png"></li>
    	<li><img src="themes/miqinew/images/bottom03.png"></li>
    	<li><img src="themes/miqinew/images/bottom04.png"></li>
    	<li><img src="themes/miqinew/images/bottom05.png"></li>
    	<li><a href="#">网站导航</a></li>
    </ul>
    <div class="clear"></div>
</div>
</div>

<div style="height:20px;background:#fff;"></div>



<div id="chat_f1" style="display:none;">
	<div id="chat_f1_main">
		<div id="close"><img src="themes/miqinew/images/xqclose.png"></div>
        <a href="#"><img src="themes/miqinew/images/xwpic.png"></a>
	</div>
	
	<div id="chat_f1_bottom"></div>
</div>
<div id="chat_f2" style="display:block;"><img src="themes/miqinew/images/xwbg.png"></div>



<script type="text/javascript">
$(document).ready(function(){

	$(".side ul li").hover(function(){
		$(this).find(".sidebox").stop().animate({"width":"88px"},200).css({"opacity":"1","filter":"Alpha(opacity=100)","background":"#b1191a"})	
	},function(){
		$(this).find(".sidebox").stop().animate({"width":"28px"},200).css({"opacity":"0.8","filter":"Alpha(opacity=80)","background":"#282828"})	
	});
	
});
//回到顶部
function goTop(){
	$('html,body').animate({'scrollTop':0},600);
}
</script>
<div class="side">
	<ul>
		<li style="border:none;"><a href="javascript:goTop();" class="sidetop"><img src="themes/miqinew/images/b01.png"></a></li>
		<li><a href="http://wpa.qq.com/msgrd?v=3&uin=2850124773&site=qq&menu=yes""><div class="sidebox"><img src="themes/miqinew/images/b02.png">售前咨询</div></a></li>
		<li><a href="http://wpa.qq.com/msgrd?v=3&uin=2850124773&site=qq&menu=yes""><div class="sidebox"><img src="themes/miqinew/images/b03.png">售后服务</div></a></li>
		<li><a href="flow.php" ><div class="sidebox"><img src="themes/miqinew/images/b04.png">购物车</div></a></li>
		<li><a class="sidetop r_box" href="javascript:;"><img src="themes/miqinew/images/b05.png">
        	<div class="rbg"><img src="themes/miqinew/images/rwm.jpg" width="186" height="186" /></div>
        </a></li>
		<li><a href="join_form.php" ><div class="sidebox"><img src="themes/miqinew/images/b06.png">加盟我们</div></a></li>
	</ul>
</div>
