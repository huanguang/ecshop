<div class="main_box lc pjstj" style="margin-top:10px;" id="f4">
    <div class="tit"><span>4F</span><font>品酒师推荐</font><a href="category.php?id=156" class="a1">查看更多>></a><div class="clear"></div></div>
    


    <div class="pjs_box">
    	<div class="bt"><?php echo $this->_var['art_cat_4f']['title']; ?></div>
        <div class="js"><?php echo $this->_var['art_cat_4f']['content']; ?></div>
        <a href="category.php?id=156">进入专区</a>
    </div>


    
    

  <?php $_from = $this->_var['pro_2f_cx']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_00704500_1463543931');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_00704500_1463543931']):
?>
    <div class="tasting_box">
    	<div class="tasting_l">
        	<a href="<?php echo $this->_var['goods_0_00704500_1463543931']['url']; ?>">
        	<img src="<?php echo $this->_var['goods_0_00704500_1463543931']['goods_img']; ?>" width="285" height="185"></a>
        </div>
    	<div class="tasting_r pro_min">
        	<h2>
        	<a href="<?php echo $this->_var['goods_0_00704500_1463543931']['url']; ?>">
        	<?php echo $this->_var['goods_0_00704500_1463543931']['goods_name']; ?></a>
        	</h2>
            <p class="p1"><?php echo $this->_var['goods_0_00704500_1463543931']['goods_brief']; ?></p> 
                <div class="pro_time" yyear="2015" ymonth="8" yday="22" yhour="18" yminute="">
                	<p>
						<i class="time_icon comm"></i>
						<img src="themes/miqinew/images/ico_sz.png" width="20" height="20">

						<font id="timer" style="color:red;font-weight: normal; font-size:18px;" class="timer leaveTime" value="<?php echo $this->_var['goods_0_00704500_1463543931']['promote_end_date']; ?>" showday="show" ></font>
						
					</p>
                    <span></span>
                 </div>
             <div class="jg">
             	<span>￥<font><?php echo $this->_var['goods_0_00704500_1463543931']['shop_price']; ?></font></span>
                <s>￥<?php echo $this->_var['goods_0_00704500_1463543931']['market_price']; ?>.00</s>
             </div>
            <!--  <div class="an"><a href="<?php echo $this->_var['goods_0_00704500_1463543931']['url']; ?>">立即抢购</a></div> -->
             <div class="an"><a href="<?php echo $this->_var['goods_0_00704500_1463543931']['url']; ?>">立即抢购</a></div>
        </div>
        <div class="clear"></div>
    </div>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


 









    
    
</div>

<script type="text/javascript">
    
    $(function(){
        var datename = new Date();
        var Offset = datename.getTimezoneOffset() * 28800;
        
        setInterval(function(){
          $(".timer").each(function(){
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
                    var str = +myD+'天'+myH_show+'小时'+myM+'分'+myS+'秒';
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