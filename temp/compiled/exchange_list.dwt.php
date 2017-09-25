<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_var['page_title']; ?></title>

<link rel="icon" href="favicon.gif" type="image/gif" />

<link href="themes/miqinew/css/common.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/css/style.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/style.css" rel="stylesheet" type="text/css" />



<script type="text/javascript" src="themes/miqinew/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="themes/miqinew/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="themes/miqinew/js/jquery.rotate.min.js"></script>
<?php echo $this->smarty_insert_scripts(array('files'=>'common2.js,jquery.json-1.3.js,transport2.js')); ?>


<script type="text/javascript" src="themes/miqinew/js/js.js"></script>
<script type="text/javascript" src="themes/miqinew/js/nav.js"></script>
<script type="text/javascript" src="themes/miqinew/js/tuan.js"></script>
<script type="text/javascript" src="themes/miqinew/js/modal.js"></script>
<script type="text/javascript" src="themes/miqinew/js/script.js"></script>

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,user.js,transport.js,qw-lottery.js')); ?>
<style>
#nav .mod_subcate{top:0;}
</style>
<script>
$(function(){
	var $plateBtn = $('#plateBtn');
	var $result = $('#result');
	var $resultTxt = $('#resultTxt');
	var $resultBtn = $('#resultBtn');
	var $resultQr = $('#resultQr');
	var id = <?php echo $this->_var['user_id']; ?>;
	$plateBtn.click(function(){
				if(id <= 0){
		    alert('请先登录');
		  }else{
		    $.ajax({
		             type: "POST",
		             url: "exchange.php?act=try",
		             data: {id:'<?php echo $this->_var['user_id']; ?>'},
		             dataType: "json",
		             success: function(datas){
		                         if(datas.error == '0'){
		                         	alert('抽奖已结束');
		                         	//304		                         	
		                      }else if(datas.error == '-1'){
		                      	alert('积分不足');
		                      }
		                      else{
		                      	rotateFunc(20,datas.info.jiaodu,datas.info.xinxi);
		                      }
		                  }
		         });
		  }
		
	});

	var rotateFunc = function(awards,angle,text){  //awards:奖项，angle:奖项对应的角度
		$plateBtn.stopRotate();
		$plateBtn.rotate({
			angle: 0,
			duration: 5000,
			animateTo: angle + 1440,  //angle是图片上各奖项对应的角度，1440是让指针固定旋转4圈
			callback: function(){
				$resultTxt.html(text);
				//alert(resultTxt);
				$result.show();
			}
		});
	};

	$resultBtn.click(function(){
		$result.hide();
	});

	$resultQr.click(function(){
		$result.hide();
	});
});
</script>
<script type="text/javascript">
$(function(){

	var f1_top = $("#f1").offset().top;
	var f2_top = $("#f2").offset().top;
	var f3_top = $("#f3").offset().top;
	var f4_top = $("#f4").offset().top;
	//alert(tops);
	$(window).scroll(function(){
		var scroH = $(this).scrollTop()+60 ;
		if(scroH>=f4_top){
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
	
});

function set_cur(n){
	if($(".left_cat_nav a").hasClass("cur")){
		$(".left_cat_nav a").removeClass("cur");
	}
	$(".left_cat_nav a"+n).addClass("cur");
}
</script>
</head>

<body>
<a name="fhtop" id="fhtop"></a>
<?php echo $this->fetch('library/page_header.lbi'); ?>


<div class="main_box jf_banner"><img src="data/afficheimg/<?php echo $this->_var['ad']['ad_code']; ?>" width="1200" height="400" /></div>



<form action="exchange.php" method="post">
<div class="main_box search_box1">
	<div class="search"><input type="text" name="sech" value="<?php echo $this->_var['sech']; ?>" placeholder="输入您现有积分可查询相对应换购的商品（现有积分：500)" class="srk1">
<input type="submit" class="an" value="搜索" /><div class="clear"></div></div>
</div>
</form>



<div class="main_box xjq" id="f1">
	<div class="tit">现金券</div>
    <div class="xj_list">
    	<ul>
        <?php $_from = $this->_var['type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'type_0_97583800_1464423859');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['type_0_97583800_1464423859']):
        $this->_foreach['names']['iteration']++;
?>
        <?php if ($this->_foreach['names']['iteration'] < '5'): ?>
        	<li>
            	<div class="pic"><img src="data/youhuijuan/<?php echo $this->_var['type_0_97583800_1464423859']['youhui_img']; ?>" /></div>
            	<div class="qjs">
                	<b><?php echo $this->_var['type_0_97583800_1464423859']['type_name']; ?></b>
                    <p>每月可兑换一次</p>
                </div>
            	<div class="jg">
                	<div class="jg_l">
                    	<p><s>会员价：￥10元</s></p>
                        <b><?php echo $this->_var['type_0_97583800_1464423859']['duihuanjifen']; ?>积分</b>
                    </div>
                	<div class="jg_r"><a href="javascript:addbanus(<?php echo $this->_var['type_0_97583800_1464423859']['type_id']; ?>);">立即换购</a></div>
                    <div class="clear"></div>
                </div>
            </li>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        <script type="text/javascript">
            function addbanus(type_id){
                $.ajax({
             type: "post",
             url: "exchange.php",
             data: {type_id:type_id,act:'duihuan'},
             dataType: "json",
             success: function(data){
                         if(data.error == '0'){
                            alert("请先登录");

                         }else if(data.error == '1'){
                            alert("积分不足");
                         }else if(data.error == '2'){
                            alert("兑换成功，请尽快使用");
                         }else if(data.error == '3'){
                            alert("兑换失败");
                         }else if(data.error == '4'){
                            alert("本月已经兑换该优惠卷");
                         }

                      }
         });
            }
        </script>
        <div class="clear"></div>
    </div>
</div>



<div class="main_box jfdy xjq" id="f2">
	<div class="tit">积分抵用</div>
    <div class="xj_list" style="margin:0 auto;">
    	<ul>
     
        <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
          <?php if ($this->_var['goods']['goods_id']): ?>
        	<li>
            	<div class="pic">
                <a href="<?php echo $this->_var['goods']['url']; ?>">
                <img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" width="240" height="240" /></a></div>
            	<div class="qjs">
                	<b><?php echo htmlspecialchars($this->_var['goods']['name']); ?></b>
                    <p><?php echo $this->_var['goods']['goods_name']; ?></p>
                </div>
            	<div class="jg">
                	<div class="jg_l">
                    	<p><s></s></p>
                        <b><?php echo $this->_var['goods']['exchange_integral']; ?>积分</b>
                    </div>
                	<div class="jg_r">
                    <a href="<?php echo $this->_var['goods']['url']; ?>">
                    立即换购</a></div>
                    <div class="clear"></div>
                </div>
            </li>
          <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>



<div class="jfcj" id="f3">

<div id="dowebok">
	<div class="cjbt"></div>
	<div class="plate">
		<a id="plateBtn" href="javascript:;" title="开始抽奖">开始抽奖</a>
	</div>

		<div class="zjkb">
			<div class="hd">
            	中奖快报
			</div>
			<div class="bd">
				<ul class="infoList">
				<?php $_from = $this->_var['zhongjiang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'zhongjiang_0_97661100_1464423859');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['zhongjiang_0_97661100_1464423859']):
        $this->_foreach['names']['iteration']++;
?>
				
					<li><span><?php echo sub_str($this->_var['zhongjiang_0_97661100_1464423859']['user_name'],5); ?></span><?php echo sub_str($this->_var['zhongjiang_0_97661100_1464423859']['goods_name'],10); ?></li>
					
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</ul>
			</div>
            <div class="cjjl"><a href="javascript:;">我的抽奖记录</a></div>
		</div>
		<script type="text/javascript">
jQuery(".zjkb").slide({mainCell:".bd ul",autoPlay:true,effect:"topMarquee",vis:6,interTime:50,trigger:"click"});
		</script>
	<div id="result">
		<p id="resultTxt"></p>
		<a id="resultBtn" href="javascript:" title="关闭">关闭</a>
        <input type="button" value="确 认" id="resultQr" />
	</div>
    <div class="clear"></div>
</div>

</div>




<div class="main_box" id="f4">
  <div class="hdjs">
        活动规则：<br />
        1、所有现金券每个等级会员每月只可兑换一次；每款商品每个用户只能换购一次；<br />
        2、现金券有效期限为30天，自兑换日算起；<br />
        3、购买商品后支付时点击使用，可减相应金额；<br />
        4、点击“立即换购”将扣除相应积分，商品会自动添加到购物车，请勿随意删除；<br />
        5、所有积分兑换的商品不可退换货；<br />
        6、积分抵用兑换的商品不可重复使用优惠券、礼品券等；<br />
        7、参与抽奖会扣除相应积分；<br />
        8、精美礼品随机发送（酒具用品包装盒之类）。<br />
    </div>
</div>



<?php echo $this->fetch('library/page_footer.lbi'); ?> 
<div class="left_cat_nav"  id="left_cat_nav">
	<ul>
    <li title="现金券"><a class="f1"><span class="ncr2">现金券</span></a></li>
    <li title="积分抵用"><a class="f2"><span class="ncr2">积分抵用</span></a></li>
    <li title="积分抽奖"><a class="f3"><span class="ncr2">积分抽奖</span></a></li>
    <li title="活动规则"><a class="f4"><span class="ncr2">活动规则</span></a></li>
    <li title="返回顶部" style="border-bottom:none;"><a href="#fhtop" class=""><span class="ncr2">返回顶部</span></a></li>
    </ul>
</div>
<style>
#left_cat_nav{width:60px !important;}
#left_cat_nav li{background:#e63e4e;width:58px;}
#left_cat_nav li a{background:#e63e4e;width:58px;color:#fff;text-align:center;}
#left_cat_nav li a span{color:#fff;text-align:center;}
#left_cat_nav li a.cur{background:#99000e;color:#fff;}
#left_cat_nav li a.cur .ncr2{width:58px;}
#left_cat_nav li{border-bottom:1px solid #fff;}

</style>


</body>
</html>