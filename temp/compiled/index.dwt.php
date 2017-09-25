<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $this->_var['page_title']; ?></title>

<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />
<link rel="icon" href="favicon.gif" type="image/gif" />

<link href="themes/miqinew/css/common.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/css/index1.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="themes/miqinew/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="themes/miqinew/js/jquery.SuperSlide.2.1.1.js"></script>

<?php echo $this->smarty_insert_scripts(array('files'=>'common2.js,')); ?>

<script type="text/javascript" src="themes/miqinew/js/js.js"></script>
<script type="text/javascript" src="themes/miqinew/js/nav.js"></script>
<script type="text/javascript" src="themes/miqinew/js/tuan.js"></script>
<script type="text/javascript" src="themes/miqinew/js/modal.js"></script>
<script type="text/javascript" src="themes/miqinew/js/script.js"></script>

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,index.js,transport.js')); ?>
<script type="text/javascript">
$(function(){

	var f1_top = $("#f1").offset().top;
	var f2_top = $("#f2").offset().top;
	var f3_top = $("#f3").offset().top;
	var f4_top = $("#f4").offset().top;
	var f5_top = $("#f5").offset().top;
	var f6_top = $("#f6").offset().top;
	var f7_top = $("#f7").offset().top;
	var f8_top = $("#f8").offset().top;
	//alert(tops);
	$(window).scroll(function(){
		var scroH = $(this).scrollTop()+60 ;
		if(scroH>=f8_top){
			set_cur(".f8");
		}else if(scroH>=f7_top){
			set_cur(".f7");
		}else if(scroH>=f6_top){
			set_cur(".f6");
		}else if(scroH>=f5_top){
			set_cur(".f5");
		}else if(scroH>=f4_top){
			set_cur(".f4");
		}else if(scroH>=f3_top){
			set_cur(".f3");
		}else if(scroH>=f2_top){
			set_cur(".f2");
		}else if(scroH>=f1_top){
			set_cur(".f1");
		}
	});
	
	$(".left_cat_nav li a").click(function() {
		var el = $(this).attr('class');
     	$('html, body').animate({
         	scrollTop: $("#"+el).offset().top
     	}, 300);
		$(this).addClass("cur").parent().siblings().find("a").removeClass("cur");	
 	});


 	$('#on2 li').mouseover(function(){
 		$(this).siblings().removeClass('on');
 		$(this).addClass('on');
 	});

	
});

function set_cur(n){
	if($(".left_cat_nav a").hasClass("cur")){
		$(".left_cat_nav a").removeClass("cur");
	}
	$(".left_cat_nav a"+n).addClass("cur");
}
</script>

<style type="text/css">
<!--
html,body {height:100%; margin:0px; font-size:12px;}
.mydiv {
	text-align: left;
	line-height: 180%;
	z-index:1000000;
	width: 394px;
	height:514px;
	left:50%;
	top:50%;
	margin-left:-197px!important;/*FF IE7 该值为本身宽的一半 */
	margin-top:-257px!important;/*FF IE7 该值为本身高的一半*/
	margin-top:0px;
	position:fixed!important;/* FF IE7*/
	position:absolute;/*IE6*/
_top:       expression(eval(document.compatMode &&
            document.compatMode=='CSS1Compat') ?
            documentElement.scrollTop + (document.documentElement.clientHeight-this.offsetHeight)/2 :/*IE6*/
            document.body.scrollTop + (document.body.clientHeight - this.clientHeight)/2);/*IE5 IE5.5*/
	background: url(img/black40.png);
	vertical-align: top;
	padding: 7px;
	overflow: hidden;
}
.mydiv_c{
	background: #FFFFFF;
	height: 500px !important;
	width: 380px!important;
	_height: 480px;
	_width: 360px;
	margin: 0px;
	padding: 10px;
	overflow: hidden;
	z-index:1000000;
}
.mydiv_con1{
	background: #f8f8f8;
	height: 50px;
	width: 360px;
	margin: 0px;
	padding: 0px;
	overflow: hidden;
}
.mydiv_con2{
	background: #FFFFFF;
	height: 430px;
	width: 360px;
	margin: 0px;
	padding: 0px;
	overflow: hidden;
}
.bg,.popIframe {
background-color: #666; display:none;
width: 100%;
height: 100%;
left:0;
top:0;/*FF IE7*/
filter:alpha(opacity=50);/*IE*/
opacity:0.5;/*FF*/
z-index:10000;
position:fixed!important;/*FF IE7*/
position:absolute;/*IE6*/
_top:       expression(eval(document.compatMode &&
            document.compatMode=='CSS1Compat') ?
            documentElement.scrollTop + (document.documentElement.clientHeight-this.offsetHeight)/2 :/*IE6*/
            document.body.scrollTop + (document.body.clientHeight - this.clientHeight)/2);/* www.fengfly.com IE5 IE5.5*/
}
.popIframe {
filter:alpha(opacity=0);/*IE*/
opacity:0;/*FF*/
}

-->
.qh_r .bd ul .pro_time{position:absolute;top:0;left:0;width:100%;}
.qh_r .bd ul .pro_time s{display:block;height:22px;background:#000;opacity:0.6;position:absolutet;top:0;left:0;z-index:1;}
.qh_r .bd ul .pro_time p{display:block;height:22px;position:absolute;top:0;left:0;width:100%;z-index:2;color:#fff;line-height:22px;text-align:center;}
.qh_r .bd ul .pro_time font{color:#fff;font-weight:normal;font-size:12px;}
.tasting_box .leaveTime{font-weight:normal;color:#d20600;}
</style>
<script language="javascript" type="text/javascript">
function showDiv(){
document.getElementById('popDiv').style.display='block';
document.getElementById('popIframe').style.display='block';
document.getElementById('bg').style.display='block';
}
function closeDiv(){
document.getElementById('popDiv').style.display='none';
document.getElementById('bg').style.display='none';
document.getElementById('popIframe').style.display='none';

}
</script>



</head>

<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>

<div class="main_box">
    
    <div class="banner_box">
		<div class="banner banner1">
			<div class="hd">
				<ul>
                <?php $_from = $this->_var['ad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ads');if (count($_from)):
    foreach ($_from AS $this->_var['ads']):
?>
                    <li></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
			</div>
			<div class="bd">
				<ul>

      <?php $_from = $this->_var['ad']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ads');if (count($_from)):
    foreach ($_from AS $this->_var['ads']):
?>
					<li><a href="<?php echo $this->_var['ads']['ad_link']; ?>">
          <img src="data/afficheimg/<?php echo $this->_var['ads']['ad_code']; ?>" width="937" height="451" /></a></li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>     
				</ul>
			</div>
		</div>
        <!---<div class="banner">
			<div class="hd">
				<ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
			</div>
			<div class="bd">
				<ul>
					<li><a href="#"><img src="themes/miqinew/images/banner01.jpg" width="572" height="451" /></a></li>
					<li><a href="#"><img src="themes/miqinew/images/banner02.jpg" /></a></li>
					<li><a href="#"><img src="themes/miqinew/images/banner03.jpg" /></a></li>
					<li><a href="#"><img src="themes/miqinew/images/banner04.jpg" /></a></li>
					<li><a href="#"><img src="themes/miqinew/images/banner01.jpg" /></a></li>
					<li><a href="#"><img src="themes/miqinew/images/banner02.jpg" /></a></li>
					<li><a href="#"><img src="themes/miqinew/images/banner03.jpg" /></a></li>
					<li><a href="#"><img src="themes/miqinew/images/banner04.jpg" /></a></li>
				</ul>
			</div>
		</div>--->
		<script type="text/javascript">
		jQuery(".banner").slide({mainCell:".bd ul",autoPlay:true});
		</script>
        
        <!---<div class="banner_adv">
        	<div class="pic"><a href="#"><img src="themes/miqinew/images/ban01.jpg" height="312"></a></div>
        	<div class="ds"><a href="#"><img src="themes/miqinew/images/ban02.jpg" height="139"></a></div>
        </div>--->
    </div>
    
    
    
    <div class="banner_r">


		<div class="zxgg">
			<div class="hd">
				<ul>
				<?php $_from = $this->_var['act_cat']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
                    <li>
                   		 <a href="javascript:void(0)" onmousemove="show_article(<?php echo $this->_var['article']['cat_id']; ?>)"><?php echo $this->_var['article']['cat_name']; ?></a>
                    </li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    
                </ul>
			</div>
<script type="text/javascript">
/* 动态显示对应广告*/
    function show_article(cat_id){
        if(cat_id == 19){
            $('.new_articles').siblings().hide();
            $('.new_articles').show();
        }
        if(cat_id == 20){
            $('.sales_new_articles').siblings().hide();
            $('.sales_new_articles').show();
        }
        if(cat_id == 21){
            $('.media_new_articles').siblings().hide();
            $('.media_new_articles').show();
        }
        
    }

</script>
			<div class="bd">

            	<div class="new_articles">
            	<ul >
				<?php $_from = $this->_var['new_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
					<li>
						<a href="<?php echo $this->_var['article']['url']; ?>">
						<?php echo sub_str($this->_var['article']['short_title'],20); ?></a>
					</li>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                </ul>
                <p><a href="<?php echo $this->_var['new_articles']['0']['cat_url']; ?>" target="_blank">更多>></a></p>
                </div>

                <div class="sales_new_articles" style="display:none" >
                <ul >
                <?php $_from = $this->_var['sales_new_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
                    <li>
                        <a href="<?php echo $this->_var['article']['url']; ?>">
                        <?php echo sub_str($this->_var['article']['short_title'],20); ?></a>
                    </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                </ul>
                <p><a href="<?php echo $this->_var['sales_new_articles']['0']['cat_url']; ?>" target="_blank">更多>></a></p>
                </div>

                <div class="media_new_articles" style="display:none" >
                <ul >
                <?php $_from = $this->_var['media_new_articles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'article');if (count($_from)):
    foreach ($_from AS $this->_var['article']):
?>
                    <li>
                        <a href="<?php echo $this->_var['article']['url']; ?>">
                        <?php echo sub_str($this->_var['article']['short_title'],20); ?></a>
                    </li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                </ul>
                <p><a href="<?php echo $this->_var['media_new_articles']['0']['cat_url']; ?>">更多>></a></p>
                </div>
                
			</div>
		</div>
		<script type="text/javascript">jQuery(".zxgg").slide({});</script>
        
        <div class="hjwh">
        	<div class="tit">美妆教室</div>
        	<div class="sp">
            <iframe height=187 width=251 src="<?php echo $this->_var['youku']['ad_code']; ?>" frameborder=0 allowfullscreen></iframe>
            	<embed style="display: none;" src="<?php echo $this->_var['youku']['ad_code']; ?>" quality="high" width="251" height="187" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
            </div>
        </div>
    </div>
    
    <div class="clear"></div>
</div>



<div class="main_box sugoo">
	<div class="hyp"><a href="javascript:huanyipi();">换一批</a></div>
    <div class="qh">
        <div class="qh_l"><span>08:00-12:00</span></div>
        <?php echo $this->fetch('library/group_buy.lbi'); ?>
    </div>
    <div class="clear"></div>
    <input type="hidden" name="namessss" id="group_buy" value="0">
    <script type="text/javascript">
    function huanyipi(){
        var idd = document.getElementById('group_buy').value;
        $.ajax({
             type: "POST",
             url: "index.php",
             data: {idd:idd,act:'huanyip'},
             dataType: "json",
             success: function(data){
                         document.getElementById('group_buy').value =data.error;
                         $(".picList").html(data.msg);
                      }
         });

        }
    </script>
</div>



<div class="main_box rxcp" id="f1">
<?php echo $this->fetch('library/recommend_hot.lbi'); ?>
    	
		<script type="text/javascript">jQuery(".rxcp_r").slide({});</script>
    	
        <div class="rmph">

		
        	<div class="tit">一周热卖排行</div>
        	<div class="pic"><a href="<?php echo $this->_var['ad_hots1f']['ad_link']; ?>">
        	<img src="data/afficheimg/<?php echo $this->_var['ad_hots1f']['ad_code']; ?>" width="225" height="92"></a>
        	</div>


<div class="r_line">

  <?php $_from = $this->_var['top_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['names']['iteration']++;
?>
  <?php if ($this->_foreach['names']['iteration'] < 10): ?>
            <dl>
                <dt>
                <s><?php echo $this->_foreach['names']['iteration']; ?></s>
                <a href="<?php echo $this->_var['goods']['url']; ?>">
                <img src="<?php echo $this->_var['goods']['thumb']; ?>" class="iteration" width="45" height="70"></a>
                </dt>

                <dd class="dd_1"  <?php if ($this->_foreach['top_goods']['iteration'] < 10): ?> class="iteration1"<?php endif; ?>>
                <a href="<?php echo $this->_var['goods']['url']; ?>">
                <?php echo $this->_var['goods']['short_name']; ?></a>
                </dd>

                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'><?php echo $this->_var['goods']['price']; ?></span>
                </dd>
            </dl>
            <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

           
                <script language="javascript">
                 $(function(){
                   $(".r_line").find('dl').last().addClass('bor_bot_none');
									 $(".r_line").find('dl').first().addClass('active');
									 $(".r_line dl").mouseenter(function(e){
										 $(this).addClass("active").siblings().removeClass("active")
									 })
                 })
                 </script>
        </div>                
        </div>
    	
        <div class="clear"></div>
</div>



<div class="main_box lc" id="f2">
    <div class="tit"><span>2F</span><font>新品上市</font><div class="clear"></div></div>
	<div class="xpss">
    	<ul>

			
      <?php $_from = $this->_var['new_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'goods');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['goods']):
        $this->_foreach['names']['iteration']++;
?>
        	<li >
            	<div class="pic">
                	<a href="<?php echo $this->_var['goods']['url']; ?>">
                	<img src="<?php echo $this->_var['goods']['thumb']; ?>" width="90" height="178"></a>
                </div>
            	<div class="wz">
                	<a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo sub_str($this->_var['goods']['name'],10); ?></a>
                    <p><span>中级庄</span></p>
		 
    		  
                    <p>产 地：<?php echo $this->_var['goods']['attr']['0']; ?></p>
                    <p>口 感：<?php echo $this->_var['goods']['attr']['1']; ?></p>
     		  

                    <div>
                    	<span><?php if ($this->_var['goods']['promote_price']): ?><?php echo $this->_var['goods']['promote_price']; ?><?php else: ?>￥<font><?php echo $this->_var['goods']['shop_price']; ?>.00</font><?php endif; ?></span>
                    	<s>￥<?php echo $this->_var['goods']['market_price']; ?></s>
                    </div>
                </div>
                <div <?php if ($this->_var['goods']['promote_end_date'] == '1'): ?>class="jb02"<?php else: ?>class="jb01"<?php endif; ?>></div>
            </li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			
        	
        </ul>
        <div class="clear"></div>
    </div>
</div>




<div class="main_box adv"><a href="<?php echo $this->_var['ad_2fb']['ad_link']; ?>" target="_blank">
<img src="data/afficheimg/<?php echo $this->_var['ad_2fb']['ad_code']; ?>" width="1200" height="100"></a></div>




<div class="main_box lc" id="f3">
    <div class="tit"><span>3F</span><font>品牌专区</font><div class="clear"></div></div>
    <div class="ppzq">


<?php if ($this->_var['promotion_goods']): ?>
    	<div class="ppzq_r">
        	<div class="cp">
            	<ul>		
         <?php $_from = $this->_var['promotion_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['promotion_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['promotion_foreach']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['promotion_foreach']['iteration']++;
?>
       		  <?php if ($this->_foreach['promotion_foreach']['iteration'] < 5): ?>
           <div class="goodList">

            		<li class="li1">
						<div class="pic">
						<a href="<?php echo $this->_var['goods']['url']; ?>">
						<img src="<?php echo $this->_var['goods']['thumb']; ?>" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span><?php echo $this->_var['goods']['promote_price']; ?>.00</span>
                            	<s>￥90.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="<?php echo $this->_var['goods']['url']; ?>">
                        	<?php echo htmlspecialchars($this->_var['goods']['short_name']); ?></a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span><?php echo $this->_var['goods']['goods_count']; ?></span></div>
                            	<div class="yshp_r">好评：<span><?php if ($this->_var['goods']['count_comment'] == '0'): ?>100%<?php else: ?><?php echo $this->_var['goods']['count_comment']; ?>%<?php endif; ?></span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
                        <div class="jb01"></div>
					</li>
		      <?php endif; ?> 
		      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 

                </ul>
                <div class="clear"></div>
            </div>
		<?php endif; ?>


        	<div class="pinp">
            	<div class="pinp_l">
                	<ul>


<?php if ($this->_var['brand_list']): ?>
  <?php $_from = $this->_var['brand_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');$this->_foreach['brand_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['brand_foreach']['total'] > 0):
    foreach ($_from AS $this->_var['brand']):
        $this->_foreach['brand_foreach']['iteration']++;
?>
                    	<li>
   
      <?php if ($this->_var['brand']['brand_logo']): ?>
                    	<a href="brand.php">
                    	<img src="data/brandlogo/<?php echo $this->_var['brand']['brand_logo']; ?>" width="132" height="66"></a></li>
      <?php endif; ?>

  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            	<div class="pinp_r">
            	<a href="brand.php">
            	<img src="themes/miqinew/images/brand_more.png"></a></div>
<?php endif; ?>          
                <div class="clear"></div>
            </div>
        </div>


	
		
    	<div class="ppzq_l">
    	<a href="<?php echo $this->_var['ad_3f']['ad_link']; ?>">
    	<img src="data/afficheimg/<?php echo $this->_var['ad_3f']['ad_code']; ?>" width="204" height="407"></a>
    	</div>
		



        <div class="clear"></div>
    </div>
</div>



<?php echo $this->fetch('library/4f.lbi'); ?>




<div class="main_box adv"><a href="<?php echo $this->_var['ad_4fb']['ad_link']; ?>" target="_blank">
<img src="data/afficheimg/<?php echo $this->_var['ad_4fb']['ad_code']; ?>" width="1200" height="100"></a></div>







<div class="main_box lc jpjj" style="margin-top:10px;" id="f5">
    <div class="tit"><span>5F</span><font><?php echo $this->_var['cat_5f']; ?></font><a href="category.php?id=157" class="a1">查看更多&gt;&gt;</a><div class="clear"></div></div>
    
    <div class="jjtz hd">
        <ul>
          <?php $_from = $this->_var['pro_5f_zh']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['names']['iteration']++;
?>
          <?php if ($this->_foreach['names']['iteration'] < 4): ?>
            <li class="<?php if ($this->_foreach['names']['iteration'] == '1'): ?>on<?php endif; ?>">
                <div class="pic">
                    <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" width="90" height="178"></a>
                </div>
                <div class="wz">
                    <a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo $this->_var['goods']['goods_name']; ?></a>
                    <p><span>中级庄</span></p>
                    <p>产 地：<?php echo $this->_var['goods']['attr']['0']; ?></p>
                    <p>口 感：<?php echo $this->_var['goods']['attr']['1']; ?></p>
                    <div class="jg">
                        <span>￥<font><?php echo $this->_var['goods']['shop_price']; ?></font></span>
                        <s>￥<?php echo $this->_var['goods']['market_price']; ?>.00</s>
                    </div>
                </div>
                <div class="<?php if ($this->_foreach['names']['iteration'] == '1'): ?>jb01<?php else: ?>jb02<?php endif; ?>"></div>
                <div class="jt"><img src="themes/miqinew/images/ico_jt.png"></div>
            </li>
            <?php endif; ?>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        <div class="clear"></div>
        <div class="bd">
        <?php $_from = $this->_var['pro_5f_zh']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['names2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names2']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['names2']['iteration']++;
?>
        <?php if ($this->_foreach['names2']['iteration'] < 4): ?>
            <div class="txtScroll-top" <?php if ($this->_foreach['names']['iteration'] == '1'): ?>style="display: block;"<?php else: ?>style="display: none;"<?php endif; ?>>
            <div class="tempWrap" style="overflow:hidden; position:relative; height:126px">
            <div class="infoList" style="<?php if ($this->_foreach['names2']['iteration'] == '1'): ?>top: -252px;<?php elseif ($this->_foreach['names2']['iteration'] == '2'): ?>top: 0px;<?php elseif ($this->_foreach['names2']['iteration'] == '3'): ?>top: -302.126px;<?php endif; ?> position: relative; padding: 0px; margin: 0px;">

                <div class="gd" style="height: 126px;">
                    <?php if ($this->_var['goods']['fittings']): ?>
                    <div class="zcp"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" width="120" height="120"></a>
    <input style="margin-left: -55px;" class="m_goods_body m_goods_1" item="m_goods_1" type="checkbox" value="<?php echo $this->_var['goods']['goods_id']; ?>" data="<?php echo $this->_var['goods']['shop_price']; ?>" spare="0" stock="0" />
                    </div>

                    <?php endif; ?>
                    <?php $_from = $this->_var['goods']['fittings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_list');$this->_foreach['hehe'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['hehe']['total'] > 0):
    foreach ($_from AS $this->_var['goods_list']):
        $this->_foreach['hehe']['iteration']++;
?>
                    <?php if ($this->_foreach['hehe']['iteration'] < 3): ?>
                    <div>
                    <div class="jia"><img src="themes/miqinew/images/ico_jia.png" width="50" height="50"></div>
                    
                    <div class="cp">
                        <div class="tp"><a href="<?php echo $this->_var['goods_list']['url']; ?>"><img src="<?php echo $this->_var['goods_list']['goods_thumb']; ?>" width="120" height="120"></a></div>
                        <div class="wz">
                            <div class="bt"><a href="<?php echo $this->_var['goods_list']['url']; ?>"><?php echo $this->_var['goods_list']['goods_name']; ?></a></div>
                            <p>产 地：法国</p>
                            <p>口 感：芳香如花果</p>
                            <div class="jg">
                                <span>￥<font><?php echo $this->_var['goods_list']['fittings_price_ori']; ?></font></span>
                                <s>￥<?php echo $this->_var['goods_list']['shop_price_ori']; ?>.00</s>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                    <?php endif; ?>
                    <?php if (($this->_foreach['hehe']['iteration'] == $this->_foreach['hehe']['total'])): ?>
                    <div>
                        <div class="jia"><img src="themes/miqinew/images/ico_deng.png" width="48" height="48"></div>
                        
                        <div class="tcjg">
                            <div class="jg1">原&nbsp;&nbsp;&nbsp;&nbsp;价：<s>￥<?php echo $this->_var['goods']['yuanjia']; ?></s></div>
                            <div class="jg2">套装价：<span>￥<font><?php echo $this->_var['goods']['xianzjia']; ?></font></span></div>
                            <div><a href="javascript:addMultiToCart('m_goods_1','<?php echo $this->_var['goods']['goods_id']; ?>');" class="an">加入购物车</a></div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>

            </div>
            </div>
            </div>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>

        <script type="text/javascript">
var btn_buy = "确定";
var is_cancel = "取消";
var select_spe = "请选择商品属性";
var select_base = '请选择套餐基本件';
var select_shop = '请选择套餐商品';
var data_not_complete = '数据格式不完整';
var understock = '库存不足，请选择其他商品';

jQuery(function($){
    //组合套餐tab切换
    var _tab = $('#cn_b h2');
    var _con = $('#cn_h blockquote');
    var _index = 0;
    _con.eq(0).show().siblings('blockquote').hide();
    _tab.css('cursor','pointer');
    _tab.click(function(){
        _index = _tab.index(this);
        _tab.eq(_index).removeClass('h2bg').siblings('h2').addClass('h2bg');
        _con.eq(_index).show().siblings('blockquote').hide();
    })
    //选择基本件
    $('.m_goods_body').click(function(){
        if($(this).prop('checked')){
            ec_group_addToCart($(this).attr('item'), <?php echo $this->_var['goods']['goods_id']; ?>); //基本件(组,主件)
        }else{
            ec_group_delInCart($(this).attr('item'), <?php echo $this->_var['goods']['goods_id']; ?>); //删除基本件(组,主件)
            display_Price($(this).attr('item'),$(this).attr('item').charAt($(this).attr('item').length-1));
        }
    })
    //变更选购的配件
    $('.m_goods_list').click(function(){
        //是否选择主件
                if($(this).prop('checked')){
            ec_group_addToCart($(this).attr('item'), $(this).val(),<?php echo $this->_var['goods']['goods_id']; ?>); //新增配件(组,配件,主件)
        }else{
            ec_group_delInCart($(this).attr('item'), $(this).val(),<?php echo $this->_var['goods']['goods_id']; ?>); //删除基本件(组,配件,主件)
            display_Price($(this).attr('item'),$(this).attr('item').charAt($(this).attr('item').length-1));
        }
    })
    //可以购买套餐的最大数量
    $(".combo_stock").keyup(function(){
        var group = $(this).parents('form').attr('name');
        getMaxStock(group);//根据套餐获取该套餐允许购买的最大数
    });
})

//允许购买套餐的最大数量
function getMaxStock(group){
    var obj = $('input[name="'+group+'_number"]');
    var original = parseInt(Number(obj.val()));
    var stock = $("."+group).eq(0).attr('stock');
    //是否是数字
    if(isNaN(original)){
        original = 1;
        obj.val(original);
    }
    $("."+group).each(function(index){
        if($("."+group).eq(index).prop('checked')){
            var item_stock = parseInt($("."+group).eq(index).attr('stock'));
            stock = (stock > item_stock)?item_stock:stock;//取最小值
        }
    });
    //更新
    original = (original < 1)?1:original;
    stock = (stock < 1)?1:stock;
    if(original > stock){
        obj.val(stock);
    }
}

//统计套餐价格
function display_Price(_item,indexTab){
    var _size = $('.'+_item).size();
    var _amount_shop_price = 0;
    var _amount_spare_price = 0;
    indexTab = indexTab - 1;
    for(i=0; i<_size; i++){
        obj = $('.'+_item).eq(i);
        if(obj.prop('checked')){
            _amount_shop_price += parseFloat(obj.attr('data')); //原件合计
            _amount_spare_price += parseFloat(obj.attr('spare')); //优惠合计
        }
    }

    var tip_spare = $('.tip_spare:eq('+indexTab+')');//节省文本
    if(_amount_spare_price > 0){//省钱显示提示信息
        tip_spare.show();
        tip_spare.children('strong').text(_amount_spare_price);
    }else{
        tip_spare.hide();
    }
    //显示总价

    $('.combo_price:eq('+indexTab+')').text(_amount_shop_price);
  //原价
  document.getElementById('span_2').innerHTML = Number(_amount_shop_price)+Number(_amount_spare_price);
  //优惠合计
  document.getElementById('span_1').innerHTML = _amount_spare_price;
}

//处理添加商品到购物车
function ec_group_addToCart(group,goodsId,parentId){
  var goods        = new Object();
  var spec_arr     = new Array();
  var fittings_arr = new Array();
  var number       = 1;
  var quick        = 0;
  var group_item   = (typeof(parentId) == "undefined") ? goodsId : parseInt(parentId);

  goods.quick    = quick;
  goods.spec     = spec_arr;
  goods.goods_id = goodsId;
  goods.number   = number;
  goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
  goods.group = group + '_' + group_item;//组名

  Ajax.call('flow.php?step=add_to_cart_combo', 'goods=' + $.toJSON(goods), ec_group_addToCartResponse, 'POST', 'JSON'); //兼容jQuery by mike
}

//处理添加商品到购物车的反馈信息
function ec_group_addToCartResponse(result)
{
  if (result.error > 0)
  {
    // 如果需要缺货登记，跳转
    if (result.error == 2)
    {
      alert(understock);
      cancel_checkboxed(result.group, result.goods_id);//取消checkbox
    }
    // 没选规格，弹出属性选择框
    else if (result.error == 6)
    {
      ec_group_openSpeDiv(result.message, result.group, result.goods_id, result.parent);
    }
    else
    {
      alert(result.message);
      cancel_checkboxed(result.group, result.goods_id);//取消checkbox
    }
  }
  else
  {
    //处理Ajax数据
    var group = result.group.substr(0,result.group.lastIndexOf("_"));
    $("."+group).each(function(index){
        if($("."+group).eq(index).val()==result.goods_id){
            //主件显示价格、配件显示基本件+属性价
            var goods_price = (result.parent > 0) ? (parseFloat(result.fittings_price)+parseFloat(result.spec_price)):result.goods_price;
            $("."+group).eq(index).attr('data',goods_price);//赋值到文本框data参数
            $("."+group).eq(index).attr('stock',result.stock);//赋值到文本框stock参数
            $('.'+group+'_display').eq(index).text(goods_price);//前台显示
        }
    });
    getMaxStock(group);//根据套餐获取该套餐允许购买的最大数
    display_Price(group,group.charAt(group.length-1));//显示套餐价格
  }
}

//处理删除购物车中的商品
function ec_group_delInCart(group,goodsId,parentId){
  var goods        = new Object();
  var group_item   = (typeof(parentId) == "undefined") ? goodsId : parseInt(parentId);

  goods.goods_id = goodsId;
  goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
  goods.group = group + '_' + group_item;//组名

  Ajax.call('flow.php?step=del_in_cart_combo', 'goods=' + $.toJSON(goods), ec_group_delInCartResponse, 'POST', 'JSON'); //兼容jQuery by mike
}

//处理删除购物车中的商品的反馈信息
function ec_group_delInCartResponse(result)
{
    var group = result.group;
    if (result.error > 0){
        alert(data_not_complete);
    }else if(result.parent == 0){
        $('.'+group).attr("checked",false);
    }
    display_Price(group,group.charAt(group.length-1));//显示套餐价格
}

//生成属性选择层
function ec_group_openSpeDiv(message, group, goods_id, parent) 
{
  var _id = "speDiv";
  var m = "mask";
  if (docEle(_id)) document.removeChild(docEle(_id));
  if (docEle(m)) document.removeChild(docEle(m));
  //计算上卷元素值
  var scrollPos; 
  if (typeof window.pageYOffset != 'undefined') 
  { 
    scrollPos = window.pageYOffset; 
  } 
  else if (typeof document.compatMode != 'undefined' && document.compatMode != 'BackCompat') 
  { 
    scrollPos = document.documentElement.scrollTop; 
  } 
  else if (typeof document.body != 'undefined') 
  { 
    scrollPos = document.body.scrollTop; 
  }

  var i = 0;
  var sel_obj = document.getElementsByTagName('select');
  while (sel_obj[i])
  {
    sel_obj[i].style.visibility = "hidden";
    i++;
  }

  // 新激活图层
  var newDiv = document.createElement("div");
  newDiv.id = _id;
  newDiv.style.position = "absolute";
  newDiv.style.zIndex = "10000";
  newDiv.style.width = "300px";
  newDiv.style.height = "260px";
  newDiv.style.top = (parseInt(scrollPos + 200)) + "px";
  newDiv.style.left = (parseInt(document.body.offsetWidth) - 200) / 2 + "px"; // 屏幕居中
  newDiv.style.overflow = "auto"; 
  newDiv.style.background = "#FFF";
  newDiv.style.border = "3px solid #59B0FF";
  newDiv.style.padding = "5px";

  //生成层内内容
  newDiv.innerHTML = '<h4 style="font-size:14; margin:15 0 0 15;">' + select_spe + "</h4>";

  for (var spec = 0; spec < message.length; spec++)
  {
      newDiv.innerHTML += '<hr style="color: #EBEBED; height:1px;"><h6 style="text-align:left; background:#ffffff; margin-left:15px;">' +  message[spec]['name'] + '</h6>';

      if (message[spec]['attr_type'] == 1)
      {
        for (var val_arr = 0; val_arr < message[spec]['values'].length; val_arr++)
        {
          if (val_arr == 0)
          {
            newDiv.innerHTML += "<input style='margin-left:15px;' type='radio' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' checked /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + '</font> [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';      
          }
          else
          {
            newDiv.innerHTML += "<input style='margin-left:15px;' type='radio' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + '</font> [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';      
          }
        } 
        newDiv.innerHTML += "<input type='hidden' name='spec_list' value='" + val_arr + "' />";
      }
      else
      {
        for (var val_arr = 0; val_arr < message[spec]['values'].length; val_arr++)
        {
          newDiv.innerHTML += "<input style='margin-left:15px;' type='checkbox' name='spec_" + message[spec]['attr_id'] + "' value='" + message[spec]['values'][val_arr]['id'] + "' id='spec_value_" + message[spec]['values'][val_arr]['id'] + "' /><font color=#555555>" + message[spec]['values'][val_arr]['label'] + ' [' + message[spec]['values'][val_arr]['format_price'] + ']</font><br />';     
        }
        newDiv.innerHTML += "<input type='hidden' name='spec_list' value='" + val_arr + "' />";
      }
  }
  newDiv.innerHTML += "<br /><center>[<a href='javascript:ec_group_submit_div(\"" + group + "\"," + goods_id + "," + parent + ")' class='f6' >" + btn_buy + "</a>]&nbsp;&nbsp;[<a href='javascript:ec_group_cancel_div(\"" + group + "\"," + goods_id + ")' class='f6' >" + is_cancel + "</a>]</center>";
  document.body.appendChild(newDiv);


  // mask图层
  var newMask = document.createElement("div");
  newMask.id = m;
  newMask.style.position = "absolute";
  newMask.style.zIndex = "9999";
  newMask.style.width = document.body.scrollWidth + "px";
  newMask.style.height = document.body.scrollHeight + "px";
  newMask.style.top = "0px";
  newMask.style.left = "0px";
  newMask.style.background = "#FFF";
  newMask.style.filter = "alpha(opacity=30)";
  newMask.style.opacity = "0.40";
  document.body.appendChild(newMask);
} 

//获取选择属性后，再次提交到购物车
function ec_group_submit_div(group, goods_id, parentId) 
{
  var goods        = new Object();
  var spec_arr     = new Array();
  var fittings_arr = new Array();
  var number       = 1;
  var input_arr      = document.getElementById('speDiv').getElementsByTagName('input'); //by mike
  var quick        = 1;

  var spec_arr = new Array();
  var j = 0;

  for (i = 0; i < input_arr.length; i ++ )
  {
    var prefix = input_arr[i].name.substr(0, 5);

    if (prefix == 'spec_' && (
      ((input_arr[i].type == 'radio' || input_arr[i].type == 'checkbox') && input_arr[i].checked)))
    {
      spec_arr[j] = input_arr[i].value;
      j++ ;
    }
  }

  goods.quick    = quick;
  goods.spec     = spec_arr;
  goods.goods_id = goods_id;
  goods.number   = number;
  goods.parent   = (typeof(parentId) == "undefined") ? 0 : parseInt(parentId);
  goods.group    = group;//组名

  Ajax.call('flow.php?step=add_to_cart_combo', 'goods=' + $.toJSON(goods), ec_group_addToCartResponse, 'POST', 'JSON'); //兼容jQuery by mike

  document.body.removeChild(docEle('speDiv'));
  document.body.removeChild(docEle('mask'));

  var i = 0;
  var sel_obj = document.getElementsByTagName('select');
  while (sel_obj[i])
  {
    sel_obj[i].style.visibility = "";
    i++;
  }

}

//关闭mask和新图层的同时取消选择
function ec_group_cancel_div(group, goods_id){
  document.body.removeChild(docEle('speDiv'));
  document.body.removeChild(docEle('mask'));

  var i = 0;
  var sel_obj = document.getElementsByTagName('select');
  while (sel_obj[i])
  {
    sel_obj[i].style.visibility = "";
    i++;
  }
  cancel_checkboxed(group, goods_id);//取消checkbox
}

/*
*套餐提交到购物车 by mike
*/
function addMultiToCart(group,goodsId){
    var goods     = new Object();
    var number    = $('input[name="'+group+'_number"]').val();
    
    goods.group = group;
    goods.goods_id = goodsId;
    goods.number = (number < 1) ? 1:number;
    
    //判断是否勾选套餐
    if(!$("."+group).is(':checked')){
        alert(select_shop);
        return false;   
    }
    
    Ajax.call('flow.php?step=add_to_cart_group', 'goods=' + $.toJSON(goods), addMultiToCartResponse, 'POST', 'JSON'); //兼容jQuery by mike
}

//回调
function addMultiToCartResponse(result){
    if(result.error > 0){
        alert(result.message);
    }else{
        window.location.href = 'flow.php';
    }
}

//取消选项
function cancel_checkboxed(group, goods_id){
    //取消选择
    group = group.substr(0,group.lastIndexOf("_"));
    $("."+group).each(function(index){
        if($("."+group).eq(index).val()==goods_id){
            $("."+group).eq(index).attr("checked",false);             
        }
    });
}

/*
//sleep
function sleep(d){
    for(var t = Date.now();Date.now() - t <= d;);
}
*/
</script>
        </div>
    <script type="text/javascript">jQuery(".jpjj").slide({});</script>
        <script type="text/javascript">
        jQuery(".txtScroll-top").slide({titCell:".hd ul",mainCell:".infoList",autoPage:true,effect:"top",autoPlay:true});
        </script>
    
    
        
        <div class="jpjj_r">
            <div class="hd">
                <ul>
                <?php $_from = $this->_var['ad_5f']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ads');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['ads']):
        $this->_foreach['names']['iteration']++;
?>
                <li class=""><?php echo $this->_foreach['names']['iteration']; ?></li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
            <div class="bd">
                <ul>
                <?php $_from = $this->_var['ad_5f']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ads');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['ads']):
        $this->_foreach['names']['iteration']++;
?>
                <li <?php if ($this->_foreach['names']['iteration'] == '3'): ?>style="display: list-item;"<?php else: ?>style="display: none;"<?php endif; ?>><a href="<?php echo $this->_var['ads']['ad_link']; ?>" target="_blank"><img src="data/afficheimg/<?php echo $this->_var['ads']['ad_code']; ?>" width="204" height="407"></a></li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
        <script type="text/javascript">
        jQuery(".jpjj_r").slide({mainCell:".bd ul",autoPlay:true});
        </script>
        
    <div class="clear"></div>    
</div>





























<div class="main_box adv"><a href="<?php echo $this->_var['ad_5fb']['ad_link']; ?>">
<img src="data/afficheimg/<?php echo $this->_var['ad_5fb']['ad_code']; ?>" width="1200" height="100"></a></div>



<div class="main_box lc" style="margin-top:10px;" id="f6">
    <div class="tit"><span>6F</span><font>婚宴专区</font><a href="category.php?id=158" class="a1">查看更多>></a><div class="clear"></div></div>
	<div class="jfsc1">


		
    	<div class="rxcp_l">
        	<div class="pic" style="height:361px;">
        	<a href="<?php echo $this->_var['ad_6f_left']['ad_link']; ?>" target="_blank" >
        	<img src="data/afficheimg/<?php echo $this->_var['ad_6f_left']['ad_code']; ?>" width="206" height="361"></a></div>
		
            


        </div>
        <div class="jfsc1_rbox">
        	
        	<div class="qhrm">
            
		<div class="jfsc_banner">
			<div class="hd">
				<ul>
                <?php $_from = $this->_var['ad6']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ads');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['ads']):
        $this->_foreach['names']['iteration']++;
?>
                    <li><?php echo $this->_foreach['names']['iteration']; ?></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
                </ul>
			</div>
			<div class="bd">
				<ul>
      <?php $_from = $this->_var['ad6']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ads');if (count($_from)):
    foreach ($_from AS $this->_var['ads']):
?>
          <li><a href="<?php echo $this->_var['ads']['ad_link']; ?>">
          <img src="data/afficheimg/<?php echo $this->_var['ads']['ad_code']; ?>" width="749" height="361" /></a></li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
				</ul>
			</div>
		</div>
            
		<script type="text/javascript">
		jQuery(".jfsc_banner").slide({mainCell:".bd ul",autoPlay:true});
		</script>
<div class="rmph" style="height:361px;">
        	<div class="tit" style="margin-top:0;height:33px;line-height:33px;">热卖排行</div>
<div class="r_line">



  <?php $_from = $this->_var['top_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['names']['iteration']++;
?>
  <?php if ($this->_foreach['names']['iteration'] < 8): ?>
            <dl class="<?php if ($this->_foreach['names']['iteration'] == '1'): ?>active<?php endif; ?> dl1">
                <dt>
                <s><?php echo $this->_foreach['names']['iteration']; ?></s>
                <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo sub_str($this->_var['goods']['short_name'],10); ?></a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'><?php echo $this->_var['goods']['price']; ?></span>
                </dd>
            </dl>
            <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


                <script language="javascript">
                 $(function(){
                   $(".r_line").find('dl').last().addClass('bor_bot_none');
									 $(".r_line").find('dl').first().addClass('active');
									 $(".r_line dl").mouseenter(function(e){
										 $(this).addClass("active").siblings().removeClass("active")
									 })
                 })
                 </script>
        </div>                
        </div>
                <div class="clear"></div>
            </div>
        	
        </div>
    <div class="clear"></div>
    </div>
    
    
<div class="tjcp">
            	<ul>

			<?php $_from = $this->_var['goods_6fhy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
					<li class="li1">
						<div class="pic">
						<a href="<?php echo $this->_var['goods']['url']; ?>">
						<img src="<?php echo $this->_var['goods']['goods_img']; ?>" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font><?php echo $this->_var['goods']['shop_price']; ?></font></span>
                            	<s>￥<?php echo $this->_var['goods']['market_price']; ?>.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="<?php echo $this->_var['goods']['url']; ?>">
                        	<?php echo $this->_var['goods']['goods_name']; ?></a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span><?php echo $this->_var['goods']['goods_count']; ?></span></div>
                            	<div class="yshp_r">好评：<span><?php if ($this->_var['goods']['count_comment'] == '0'): ?>100%<?php else: ?><?php echo $this->_var['goods']['count_comment']; ?>%<?php endif; ?></span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>		


                </ul>
                <div class="clear"></div>
            </div>
    
</div>



<div class="main_box adv"><a href="<?php echo $this->_var['ad_6fb']['ad_link']; ?>" target="_blank">
<img src="data/afficheimg/<?php echo $this->_var['ad_6fb']['ad_code']; ?>" width="1200" height="100"></a></div>



<div class="main_box lc" style="margin-top:10px;" id="f7">
    <div class="tit"><span>7F</span><font>礼盒馈赠</font><a href="category.php?id=159" class="a1">查看更多>></a><div class="clear"></div></div>



	<div class="qil">
    	<ul>
		


      <?php $_from = $this->_var['ad_7f_3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ads');if (count($_from)):
    foreach ($_from AS $this->_var['ads']):
?>
        	<li><a href="<?php echo $this->_var['ads']['ad_link']; ?>">
        	<img src="data/afficheimg/<?php echo $this->_var['ads']['ad_code']; ?>" width="393" height="196"></a></li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>    

		
        </ul>
        <div class="clear"></div>
    </div>


    
    
<div class="tjcp" style="height:546px;">
            	<ul>


			<?php $_from = $this->_var['goods_7flh']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
					<li class="li1">
						<div class="pic">
						<a href="<?php echo $this->_var['goods']['url']; ?>">
						<img src="<?php echo $this->_var['goods']['goods_img']; ?>" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font><?php echo $this->_var['goods']['shop_price']; ?></font></span>
                            	<s>￥<?php echo $this->_var['goods']['market_price']; ?>.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="detail.php">
                        	<?php echo $this->_var['goods']['goods_name']; ?></a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span><?php echo $this->_var['goods']['goods_count']; ?></span></div>
                            	<div class="yshp_r">好评：<span><?php if ($this->_var['goods']['count_comment'] == '0'): ?>100%<?php else: ?><?php echo $this->_var['goods']['count_comment']; ?>%<?php endif; ?></span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>




                </ul>
                <div class="clear"></div>
            </div>
    
</div>



<div class="main_box adv"><a href="<?php echo $this->_var['ad_7fb']['ad_link']; ?>" target="_blank">
<img src="data/afficheimg/<?php echo $this->_var['ad_7fb']['ad_code']; ?>" width="1200" height="100"></a></div>



<div class="main_box lc" style="margin-top:10px;" id="f8">
    <div class="tit">
    <span>8F</span><font><?php echo $this->_var['cat_8ftwo']; ?>/<?php echo $this->_var['cat_8fone']; ?></font>
    <a href="category.php?id=153" class="a1">查看更多>></a>
    <div class="clear"></div></div>
	<div class="jfsc1">


		
    	<div class="rxcp_l">
        	<div class="pic" style="height:361px;">
        	<a href="<?php echo $this->_var['ad_8f_left']['ad_link']; ?>">
        	<img src="data/afficheimg/<?php echo $this->_var['ad_8f_left']['ad_code']; ?>" width="206" height="361"></a></div>
        </div>
		


        <div class="jfsc1_rbox">
        	
        	<div class="qhrm">
            
		<div class="jfsc_banner">
			<div class="hd">
				<ul>
                <?php $_from = $this->_var['ad8']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ads');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['ads']):
        $this->_foreach['names']['iteration']++;
?>
                    <li><?php echo $this->_foreach['names']['iteration']; ?></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
                </ul>
			</div>
			<div class="bd">
				<ul>


		
      <?php $_from = $this->_var['ad8']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ads');if (count($_from)):
    foreach ($_from AS $this->_var['ads']):
?>
          <li><a href="<?php echo $this->_var['ads']['ad_link']; ?>">
          <img src="data/afficheimg/<?php echo $this->_var['ads']['ad_code']; ?>" width="749" height="361" /></a></li>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
		


				</ul>
			</div>
		</div>
            
		<script type="text/javascript">
		jQuery(".jfsc_banner").slide({mainCell:".bd ul",autoPlay:true});
		</script>
<div class="rmph" style="height:361px;">
        	<div class="tit" style="margin-top:0;height:33px;line-height:33px;">热卖排行</div>
<div class="r_line">



  <?php $_from = $this->_var['top_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['names']['iteration']++;
?>
  <?php if ($this->_foreach['names']['iteration'] < 8): ?>
            <dl class="<?php if ($this->_foreach['names']['iteration'] == '1'): ?>active<?php endif; ?> dl1">
                <dt>
                <s><?php echo $this->_foreach['names']['iteration']; ?></s>
                <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo sub_str($this->_var['goods']['short_name'],10); ?></a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'><?php echo $this->_var['goods']['price']; ?></span>
                </dd>
            </dl>
           <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

            
            </dl>
                <script language="javascript">
                 $(function(){
                   $(".r_line").find('dl').last().addClass('bor_bot_none');
									 $(".r_line").find('dl').first().addClass('active');
									 $(".r_line dl").mouseenter(function(e){
										 $(this).addClass("active").siblings().removeClass("active")
									 })
                 })
                 </script>
        </div>                
        </div>
                <div class="clear"></div>
            </div>
        	
            
        </div>
    <div class="clear"></div>
    </div>
    
    
<div class="tjcp">
            	<ul>


		
	    		<?php $_from = $this->_var['hot_goods_8f']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rec_data');if (count($_from)):
    foreach ($_from AS $this->_var['rec_data']):
?>
					<li class="li1">
						<div class="pic">
						<a href="<?php echo $this->_var['rec_data']['url']; ?>">
						<img src="<?php echo $this->_var['rec_data']['goods_img']; ?>" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font><?php echo $this->_var['rec_data']['shop_price']; ?></font></span>
                            	<s>￥<?php echo $this->_var['rec_data']['market_price']; ?></s>
                            </div>
                        	<div class="tit">
                        	<a href="<?php echo $this->_var['rec_data']['url']; ?>"><?php echo $this->_var['rec_data']['goods_style_name']; ?></a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span><?php echo $this->_var['rec_data']['goods_count']; ?></span></div>
                            	<div class="yshp_r">好评：<span><?php if ($this->_var['rec_data']['count_comment'] == '0'): ?>100%<?php else: ?><?php echo $this->_var['rec_data']['count_comment']; ?>%<?php endif; ?></span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
	      		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		

                </ul>
                <div class="clear"></div>
            </div>
    
</div>

<?php echo $this->fetch('library/page_footer.lbi'); ?> 

<div class="left_cat_nav"  id="left_cat_nav">
	<ul>
    <li title="热卖"><a class="f1"><font class="on">1F</font><span class="ncr2">热卖</span></a></li>
    <li title="新品"><a class="f2"><font class="on">2F</font><span class="ncr2">新品</span></a></li>
    <li title="品牌"><a class="f3"><font class="on">3F</font><span class="ncr2">品牌</span></a></li>
    <li title="品酒"><a class="f4"><font class="on">4F</font><span class="ncr2">品酒</span></a></li>
    <li title="酒具"><a class="f5"><font class="on">5F</font><span class="ncr2">酒具</span></a></li>
    <li title="婚宴"><a class="f6"><font class="on">6F</font><span class="ncr2">婚宴</span></a></li>
    <li title="礼盒"><a class="f7"><font class="on">7F</font><span class="ncr2">礼盒</span></a></li>
    <li title="整箱"><a class="f8"><font class="on">8F</font><span class="ncr2">整箱</span></a></li>
    </ul>
</div>

<iframe id='popIframe' class='popIframe' frameborder='0' ></iframe>


</body>

<script type="text/javascript">

var time_now_server,time_now_client,time_end,time_server_client,timerID;

 

  <?php $_from = $this->_var['pro_2f_cx']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
var time_end=<?php echo $this->_var['goods']['promote_end_date']; ?>;
//alert(time_end);

function getDate(tm){
	var tt=new Date(parseInt(tm) * 1000).toLocaleString()
	return tt;
}         
//alert(getDate(time_end));

var id = <?php echo $this->_var['goods']['id']; ?>;
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


var time_now_server=new Date().getTime();
//alert(time_now_server);
//time_now_server=new Date("2015/11/06 10:10:1");//开始的时间

//time_now_server=time_now_server.getTime();

 

time_now_client=new Date();

time_now_client=time_now_client.getTime();
//alert(time_now_client);

 

time_server_client=time_now_server-time_now_client;

 

setTimeout("show_time(id)",1000);

 

function show_time(id)

{

 var timer = document.getElementById(id);

 if(!timer){

 return ;

 }

 timer.innerHTML =time_server_client;

 

 var time_now,time_distance,str_time;

 var int_day,int_hour,int_minute,int_second;

 var time_now=new Date();

 time_now=time_now.getTime()+time_server_client;

 time_distance=time_end-time_now;

 if(time_distance>0)

 {

  int_day=Math.floor(time_distance/86400000)

  time_distance-=int_day*86400000;

  int_hour=Math.floor(time_distance/3600000)

  time_distance-=int_hour*3600000;

  int_minute=Math.floor(time_distance/60000)

  time_distance-=int_minute*60000;

  int_second=Math.floor(time_distance/1000)

 

  if(int_hour<10)

   int_hour="0"+int_hour;

  if(int_minute<10)

   int_minute="0"+int_minute;

  if(int_second<10)

   int_second="0"+int_second;

  str_time=int_day+"天"+int_hour+"小时"+int_minute+"分钟"+int_second+"秒";

  timer.innerHTML=str_time;

  setTimeout("show_time(id)",1000);
  //alert(setTimeout("show_time(id)",1000));

 }

 else

 {

  timer.innerHTML =timer.innerHTML;

  clearTimeout(timerID)

 }

}

</script>
</html>