<div class="qh_r">
			<div class="hd">
				<a class="next"></a>
				<a class="prev"></a>
			</div>
			<div class="bd pro_min">
				<ul class="picList">

      <?php $_from = $this->_var['group_buy_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
					<li>
                <div class="pro_time" yyear="2015" ymonth="7" yday="31" yhour="18" yminute="">
                	<p>
						<i class="time_icon comm"></i>倒计时：<font class="leaveTime endtime" value="<?php echo $this->_var['goods']['end_time']; ?>" showday="show"></font>
					</p>
                    <span></span>
                    <s></s>
                 </div>
						<div class="pic"><a href="<?php echo $this->_var['goods']['url']; ?>">
						<img src="<?php echo $this->_var['goods']['thumb']; ?>" width="185" height="160" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" /></a></div>
						<div class="wz">
                        	<div class="tit">
                        	<a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a></div>
                          <div class="jg">
                          		<span>￥<?php echo $this->_var['goods']['shop_price']; ?></span>
                            	<s>￥<?php echo $this->_var['goods']['market_price']; ?></s>
                            </div>
                            <div class="sl">数量：<?php echo $this->_var['goods']['ext_info']['restrict_amount']; ?></div>
                      </div>
                        <div class="ljqg">
                        <input type="button" value="立即抢购" onclick="window.location.href='<?php echo $this->_var['goods']['url']; ?>'"></div>
					</li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

				</ul>
			</div>
        </div>
		<script type="text/javascript">
		$(".qh_r").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,scroll:5,vis:5});
	
	$(function(){
		var datename = new Date();
		var Offset = datename.getTimezoneOffset() * 28800;
		
		setInterval(function(){
		  $(".endtime").each(function(){
			var obj = $(this);
			var endTime = new Date(parseInt(obj.attr('value')) * 1000 - Offset) ;
			var show_day =  obj.attr('showday');
			var nowTime = new Date();
			var nMS=endTime.getTime() - nowTime.getTime();
			var myD=Math.floor(nMS/(1000 * 60 * 60 * 24));
			var myH_show=Math.floor(nMS/(1000*60*60) % 24);
			var myH=Math.floor(nMS/(1000*60*60));
			var myM=Math.floor(nMS/(1000*60)) % 60;
			var myS=Math.floor(nMS/1000) % 60;
			var myMS=Math.floor(nMS/100) % 10;
			
			if(myS>=0){
				if(show_day == 'show')
				{
					var str = '还剩<strong class="tcd-d">'+myD+'</strong>天<strong class="tcd-h">'+myH_show+'</strong>小时<strong class="tcd-m">'+myM+'</strong>分<strong class="tcd-s">'+myS+'</strong>秒';
				}
				else
				{
					var str = '<span>'+myH+'</span>时<span>'+myM+'</span>分<span>'+myS+'</span>秒';
				}
			}else{
				var str = "已结束！";	
			}
			obj.html(str);
		  });
		}, 100);
	})
	
</script>