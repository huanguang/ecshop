<?php exit;?>a:3:{s:8:"template";a:6:{i:0;s:45:"D:/phpStudy/WWW/guoa/themes/miqinew/index.dwt";i:1;s:59:"D:/phpStudy/WWW/guoa/themes/miqinew/library/page_header.lbi";i:2;s:57:"D:/phpStudy/WWW/guoa/themes/miqinew/library/group_buy.lbi";i:3;s:61:"D:/phpStudy/WWW/guoa/themes/miqinew/library/recommend_hot.lbi";i:4;s:50:"D:/phpStudy/WWW/guoa/themes/miqinew/library/4f.lbi";i:5;s:59:"D:/phpStudy/WWW/guoa/themes/miqinew/library/page_footer.lbi";}s:7:"expires";i:1506351977;s:8:"maketime";i:1506348377;}<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>秀当红酒商城</title>
<meta name="Keywords" content="秀当红酒商城" />
<meta name="Description" content="秀当红酒商城" />
<link rel="icon" href="favicon.gif" type="image/gif" />
<link href="themes/miqinew/css/common.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/css/index1.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="themes/miqinew/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="themes/miqinew/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="js/common2.js"></script><script type="text/javascript" src="js/"></script>
<script type="text/javascript" src="themes/miqinew/js/js.js"></script>
<script type="text/javascript" src="themes/miqinew/js/nav.js"></script>
<script type="text/javascript" src="themes/miqinew/js/tuan.js"></script>
<script type="text/javascript" src="themes/miqinew/js/modal.js"></script>
<script type="text/javascript" src="themes/miqinew/js/script.js"></script>
<script type="text/javascript" src="js/common.js"></script><script type="text/javascript" src="js/index.js"></script><script type="text/javascript" src="js/transport.js"></script><script type="text/javascript">
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
<script type="text/javascript">
var process_request = "正在处理您的请求...";
</script>
<script type="text/javascript">
$(document).ready(function(){
  $(".def-nav,.info-i").hover(function(){
	  $(this).find(".pulldown-nav").addClass("hover");
	  $(this).find(".pulldown").show();
  },function(){
	  $(this).find(".pulldown").hide();
	  $(this).find(".pulldown-nav").removeClass("hover");
  });
  
});
</script>
 		 <style type="text/css">
  		.fixed{position: fixed; z-index:9999999; top:0; background-color:#ffffff; left:0; width:100%}
  		.fixed .header-hd{display: none;}
 		</style>
<script type="text/javascript" src="js/jquery.json.js"></script>          <script type="text/javascript" src="js/utils.js"></script><script type="text/javascript" src="js/ecmoban_common.js"></script>
<!--<script type="text/javascript">
  window.onload=function(){
   function adsorption(){
    var headerWrap=document.getElementById('header-wrap');
    var scrollTop=0;
    window.onscroll=function(){
     scrollTop=document.body.scrollTop||document.documentElement.scrollTop;
     if(scrollTop>100){
      headerWrap.className='fixed';
     }else{
      headerWrap.className='header-wrap';
     }
    }
   }
   adsorption();
  }
 </script>-->
 
   
       <!-- <div id="header-wrap">  置顶-->
<div class="top_box">
	<div class="top">
        <div class="top_l">
            <div class="mfzc">购物热线：400-1519888   <span>会员当前人数：<b>55</b>人</span></div>
        </div>
        <div class="top_r">
        	<div class="top_menu">
          
          
          <font id="ECS_MEMBERZONE" style="display:block; float:left;">554fcae493e564ee0dc75bdf2ebf94camember_info|a:1:{s:4:"name";s:11:"member_info";}554fcae493e564ee0dc75bdf2ebf94ca </font>
            
                <a href="user.php?act=order_list">我的订单</a>
                <a data-toggle="modal" href="javascript:qiandao()" style="color:#d40e03;">[每日签到]</a>
                <!---<a href="cart.php">购物车（<b>0</b>）</a>--->
                <a href="#">防伪查询</a>
                <script>
                  function qiandao(){
                      $.ajax({
                   type: "POST",
                   url: "user.php",
                   data: {act:'qiandao'},
                   dataType: "json",
                   success: function(data){
                   if(data.error == '1'){
                          document.getElementById('zong').innerHTML = data.zong;
                          document.getElementById('jin').innerHTML = data.jin;
                         var id = document.getElementById('login-modal1');
                          id.style.display = '';
                          }else if(data.error == '2'){
                            alert('今天已经签到，明天再来睋！');
                          }else if(data.error == '0'){
                            alert('请先登录');
                          }
                      }
                  });
                    
                  }
                  function guanbi(){
                    var id = document.getElementById('login-modal1');
                    id.style.display = 'none';
                  }
                </script>
<div class="modal1" id="login-modal1" style="display:none;">
<div class="popup1" style="z-index: 999; width: 343px; height: 232px; position: fixed;display: block;" id="commentPop">
    <div class="title"><em>签到成功</em><a href="javascript:guanbi();" data-dismiss="modal">×</a></div>
    <div class="wz">
    	<p>获得总积分：<span><b id="zong"></b></span>&nbsp;积分</p>
    	<p>恭喜您签到成功，获得<span id="jin"></span>个积分！</p>
    	<p>连续签到可得更多积分。</p>
    </div>
    <div class="bt" >
        <a href="javascript:guanbi();" class="bt-3" id="commentBtn" data-dismiss="modal">确 认</a>
    </div>
<div class="dialog_close"></div></div>    
    </div>                     
            </div>
            <!---<div class="jmwm">
            	<span>加盟我们</span>
                <div class="pull">
                	<li><a href="article.php">加盟我们</a></li>
                	<li><a href="article.php">加盟我们</a></li>
                </div>
            </div>--->
            <ul class="ul1">
            	<li>关注我们：</li>
                <li><a href="#"><img src="themes/miqinew/images/ico_wx.png"></a></li>
                <li><a href="#"><img src="themes/miqinew/images/ico_sina.png"></a></li>
                <li><a href="#"><img src="themes/miqinew/images/ico_qq.png"></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="top_box1">
	<div class="top1">
    	<div class="logo"><a href="index.php"><img src="themes/miqinew/images/logo.png" /></a></div>
        <div class="xcy">
        	<p>全球原产地直供</p>
        	<p><img src="themes/miqinew/images/site.png"></p>
        </div>
   <script type="text/javascript">
    
    <!--
    function checkSearchForm()
    {
        if(document.getElementById('keyword').value)
        {
            return true;
        }
        else
        {
            alert("请输入搜索关键词！");
            return false;
        }
    }
    -->
    
    </script>
        
  <form id="searchForm" name="searchForm" method="get" action="search.php" onSubmit="return checkSearchForm()"  >
    	<div class="search_box" style="width: 500px;">
        	<div class="search"  style="width: 492px;">
            	<input type="text"  name="keywords" id="keyword" value="" class="srk1" onblur="if(this.value==''){this.value='请输入关键词';this.className='srk1'}" onfocus="if(this.value==this.defaultValue){this.value='';this.className='srk2'}">
      <button style="border:none;background:none;padding:0"><input type="submit" class="an" value="搜 索" /></button>
				<div class="clear"></div>
			</div>
			<div class="wz">
                                  <a href="search.php?keywords=%E7%99%BD%E8%91%A1%E8%90%84%E9%85%92">白葡萄酒</a>
                          <a href="search.php?keywords=%E7%BA%A2%E8%91%A1%E8%90%84%E9%85%92">红葡萄酒</a>
                          </div>
        </div>
   </form>
        
        <div class="sys">
        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right" valign="top"><span>扫一扫：</span></td>
    <td align="center">
    <a class="sjb"><img src="images/920e06a66df794df905d1ee5eb4be007.jpg" width="52" height="52"><p>手机版</p>
    <div class="sjb_d"><img src="images/920e06a66df794df905d1ee5eb4be007.jpg" width="186" height="186" /></div>
    </a>
    </td>
    <td align="center">
    <a class="wx"><img src="images/29396d2e70c0c3ad9b25c93ff0a8d69d.jpg" width="52" height="52"><p>微信</p>
    <div class="wx_d"><img src="images/29396d2e70c0c3ad9b25c93ff0a8d69d.jpg" width="186" height="186" /></div>
    </a>
    </td>
  </tr>
</table>
        </div>
    </div>
    <div class="clear"></div>
</div>
<div class="nav_100">
 <div class="navlist b_center">
<div class="nav_list_c" id="Z_TypeList"><ul><li style="cursor:pointer;"><b>全部产品分类</b></li></ul>
  
<div class="fl_box b_center Z_MenuList" style="display:none;">
	
	<div class="spfl">
  <div class="abk1_category_list">
   <div class="warpper">
    <div id="nav">
    <div class="fl">
     <ul class="tit">
            <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=173">国际品牌</a></h2>
            <div class="mod_wz">
                     <a href="category.php?id=183">雅漾</a>
                       <a href="category.php?id=174">WHOO</a>
                       <a href="category.php?id=175">欧慧</a>
                       <a href="category.php?id=176">欧莱雅</a>
                       <a href="category.php?id=177">赫拉</a>
                       <a href="category.php?id=178">亦博</a>
                       <a href="category.php?id=181">悦诗风吟</a>
                       <a href="category.php?id=182">雅诗兰黛</a>
                          
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=1">彩妆</a></h2>
            <div class="mod_wz">
                     <a href="category.php?id=2">其他彩妆</a>
                       <a href="category.php?id=4">眼部彩妆</a>
                          
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=16">香氛</a></h2>
            <div class="mod_wz">
                     <a href="category.php?id=86">女士香水</a>
                       <a href="category.php?id=184">精油</a>
                       <a href="category.php?id=87">男士香水</a>
                       <a href="category.php?id=88">中性香水</a>
                       <a href="category.php?id=89">香水套装</a>
                          
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=6">护肤</a></h2>
            <div class="mod_wz">
                     <a href="category.php?id=188">化妆水</a>
                       <a href="category.php?id=189">乳液</a>
                       <a href="category.php?id=7">面霜</a>
                       <a href="category.php?id=190">眼霜</a>
                       <a href="category.php?id=9">精华</a>
                       <a href="category.php?id=191">防晒</a>
                       <a href="category.php?id=192">唇部护理</a>
                       <a href="category.php?id=11">护肤套装</a>
                       <a href="category.php?id=209">香奈儿203</a>
                       <a href="category.php?id=8">洁面</a>
                          
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=145">拉菲</a></h2>
            <div class="mod_wz">
                     <a href="category.php?id=166">呵呵呵就</a>
                          
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=146">卡维留里</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=149">奔富</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=150">干露</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=151">洋酒 威士忌</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=152">单支</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=153">组合</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=156">品酒师推荐</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=157">精品酒具</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=158">婚宴专区</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=159">礼盒馈赠</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=160">红葡萄酒</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=161">甜白葡萄酒</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=163">聚会婚庆馆</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=164">礼盒礼包团购</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=165">权威高分酒</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=167">明星彩妆</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=168">去潍坊潍坊</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=180">兰芝</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=212">壹+1</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=154">整箱购</a></h2>
            <div class="mod_wz">
                     <a href="category.php?id=170">测试22</a>
                          
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=211">九元专区</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
             <li class="mod_cate">
        <div class="mod_box">
            <h2><a href="category.php?id=213">明星产品</a></h2>
            <div class="mod_wz">
                        
            </div>
        </div>
       </li>
     
      </ul>
      <div class="clear"></div>
      </div>
      
      <div class="yc_gg">
            	<div class="gg_box">
            <a href="#">
            <img src="data/afficheimg/1446697960563230652.jpg" width="200" height="110" /></a>
        </div>
            	<div class="gg_box">
            <a href="#">
            <img src="data/afficheimg/1446697978603451104.jpg" width="200" height="110" /></a>
        </div>
            	<div class="gg_box">
            <a href="#">
            <img src="data/afficheimg/1451252826130574286.jpg" width="200" height="110" /></a>
        </div>
          
      </div>
      
    </div>
</div>
<script type="text/javascript">
$("#nav .tit").slide({
	type:"menu",
	titCell:".mod_cate",
	targetCell:".mod_subcate",
	delayTime:0,
	triggerTime:10,
	defaultPlay:false,
	returnDefault:true
});
</script>
     
  </div>
    </div>
    
</div>
  
  
  </div>
  <div class="nav_list_n">
   <ul>
   <li><a href="index.php">首页</a></li>
     
    <li>
        <a href="group_buy.php">
         限时团购</a>
    </li>
    <li>
        <a href="exchange.php">
         积分商城</a>
    </li>
    <li>
        <a href="category.php?id=167">
         明星彩妆</a>
    </li>
    <li>
        <a href="brand.php">
         品牌特卖</a>
    </li>
    <li>
        <a href="culture.php">
         大课堂</a>
    </li>
    <li>
        <a href="article_cat.php?id=23">
         秀当公益</a>
    </li>
     
    
   </ul>
  </div>
  <div class="nav_list_s">
  	<a href="javascript:;">手机版</a>
  </div>
  
 </div>
 
</div>
<!--</div>-->
<div class="main_box">
    
    <div class="banner_box">
		<div class="banner banner1">
			<div class="hd">
				<ul>
                                    <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
			</div>
			<div class="bd">
				<ul>
      					<li><a href="#">
          <img src="data/afficheimg/1446228722805721145.jpg" width="937" height="451" /></a></li>
      					<li><a href="#">
          <img src="data/afficheimg/1446228818810152849.jpg" width="937" height="451" /></a></li>
      					<li><a href="#">
          <img src="data/afficheimg/1446228775190217797.jpg" width="937" height="451" /></a></li>
      					<li><a href="#">
          <img src="data/afficheimg/1446228793219165655.jpg" width="937" height="451" /></a></li>
      					<li><a href="#">
          <img src="data/afficheimg/1446228843365494314.jpg" width="937" height="451" /></a></li>
           
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
				                    <li>
                   		 <a href="javascript:void(0)" onmousemove="show_article(19)">最新公告</a>
                    </li>
				                    <li>
                   		 <a href="javascript:void(0)" onmousemove="show_article(20)">促销活动</a>
                    </li>
				                    <li>
                   		 <a href="javascript:void(0)" onmousemove="show_article(21)">媒体报道2</a>
                    </li>
				                    
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
									<li>
						<a href="article.php?id=57">
						2015“姚基金”希望小学篮球季...</a>
					</li>
									<li>
						<a href="article.php?id=56">
						深耕“润苗行动”东风名列车企公益</a>
					</li>
									<li>
						<a href="article.php?id=55">
						瓦房店万家岭镇鹏生希望小学举行揭...</a>
					</li>
									<li>
						<a href="article.php?id=54">
						湖北省18位农村小学教师喜获“希...</a>
					</li>
				 
                </ul>
                <p><a href="article_cat.php?id=19" target="_blank">更多>></a></p>
                </div>
                <div class="sales_new_articles" style="display:none" >
                <ul >
                                    <li>
                        <a href="article.php?id=58">
                        促销活动嘻嘻</a>
                    </li>
                 
                </ul>
                <p><a href="article_cat.php?id=20" target="_blank">更多>></a></p>
                </div>
                <div class="media_new_articles" style="display:none" >
                <ul >
                                    <li>
                        <a href="article.php?id=59">
                        媒体报道深耕“润苗行动”东风名列...</a>
                    </li>
                 
                </ul>
                <p><a href="article_cat.php?id=21">更多>></a></p>
                </div>
                
			</div>
		</div>
		<script type="text/javascript">jQuery(".zxgg").slide({});</script>
        
        <div class="hjwh">
        	<div class="tit">美妆教室</div>
        	<div class="sp">
            <iframe height=187 width=251 src="http://player.youku.com/player.php/sid/XMTM5OTM3MzE2MA==/v.swf" frameborder=0 allowfullscreen></iframe>
            	<embed style="display: none;" src="http://player.youku.com/player.php/sid/XMTM5OTM3MzE2MA==/v.swf" quality="high" width="251" height="187" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
            </div>
        </div>
    </div>
    
    <div class="clear"></div>
</div>
<div class="main_box sugoo">
	<div class="hyp"><a href="javascript:huanyipi();">换一批</a></div>
    <div class="qh">
        <div class="qh_l"><span>08:00-12:00</span></div>
        <div class="qh_r">
			<div class="hd">
				<a class="next"></a>
				<a class="prev"></a>
			</div>
			<div class="bd pro_min">
				<ul class="picList">
      					<li>
                <div class="pro_time" yyear="2015" ymonth="7" yday="31" yhour="18" yminute="">
                	<p>
						<i class="time_icon comm"></i>倒计时：<font class="leaveTime endtime" value="1584540600" showday="show"></font>
					</p>
                    <span></span>
                    <s></s>
                 </div>
						<div class="pic"><a href="group_buy.php?act=view&amp;id=41">
						<img src="images/no_picture.gif" width="185" height="160" alt="Breezer/百加得冰锐鸡尾酒8*275ml 洋酒朗姆预调酒果酒特价包邮" /></a></div>
						<div class="wz">
                        	<div class="tit">
                        	<a href="group_buy.php?act=view&amp;id=41">Breezer/百加得冰锐鸡尾酒8*275ml 洋酒朗姆预调酒果酒特价包邮</a></div>
                          <div class="jg">
                          		<span>￥130.00</span>
                            	<s>￥156.00</s>
                            </div>
                            <div class="sl">数量：10000</div>
                      </div>
                        <div class="ljqg">
                        <input type="button" value="立即抢购" onclick="window.location.href='group_buy.php?act=view&amp;id=41'"></div>
					</li>
      
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
	
</script>    </div>
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
 
        <div class="rxcp_r">
      <div class="hd rx"  id="itemHot">
          <div class="tit">
          <span>1F</span><font>热销产品</font>
          <div class="clear"></div></div>
        <ul id="on2">
                                  <li >
                  <a href="javascript:void(0)" style="text-decoration: none;" onmouseover="change_tab_style('itemHot', 'li', this);get_cat_recommend(3,152)">
                  <input type="hidden" id="diyi" value="152">
                  单支                </li>
                                                                                                                                  <li >
                  <a href="javascript:void(0)" style="text-decoration: none;" onmouseover="change_tab_style('itemHot', 'li', this);get_cat_recommend(3, 153)">
                  组合                </li>
                                                      <li >
                  <a href="javascript:void(0)" style="text-decoration: none;" onmouseover="change_tab_style('itemHot', 'li', this);get_cat_recommend(3, 154)">
                  整箱购                </li>
                                                    </ul>
      </div>
    
<script>
    window.onload= function(){
        var danzhi = document.getElementById('diyi').value;
        get_cat_recommend(3,danzhi);
    };
</script>
      <div id="show_hot_area" class="bd">
                
            
              <ul>
              <li  class="li1">
            <div class="pic">
            <a href="goods.php?id=255">
            <img src="images/201512/thumb_img/255_thumb_G_1450216095975.jpg" width="185" height="160" /></a></div>
            <div class="wz">
                          <div class="jg">
                                <span>￥80.00</span>
                              <s>￥96.00</s>
                            </div>
                          <div class="tit">
                          <a href="goods.php?id=255">
                          韩版青年男士冬款商务英伦修身长裤子</a></div>
                            <div class="yshp">
                              <div class="yshp_l">已售：<span></span></div>
                              <div class="yshp_r">好评：<span>80%</span></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="jb01"></div>
          </li>
            <li  class="li1">
            <div class="pic">
            <a href="goods.php?id=243">
            <img src="images/201603/thumb_img/243_thumb_G_1457028610234.jpg" width="185" height="160" /></a></div>
            <div class="wz">
                          <div class="jg">
                                <span>￥100.00</span>
                              <s>￥120.00</s>
                            </div>
                          <div class="tit">
                          <a href="goods.php?id=243">
                          棉先生松紧腰男士纯色直筒宽松棉麻裤</a></div>
                            <div class="yshp">
                              <div class="yshp_l">已售：<span></span></div>
                              <div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="jb01"></div>
          </li>
            <li  class="li1">
            <div class="pic">
            <a href="goods.php?id=245">
            <img src="images/201603/thumb_img/245_thumb_G_1457028595262.jpg" width="185" height="160" /></a></div>
            <div class="wz">
                          <div class="jg">
                                <span>￥100.00</span>
                              <s>￥120.00</s>
                            </div>
                          <div class="tit">
                          <a href="goods.php?id=245">
                          2016春装新款条纹裤子女九分哈伦裤小脚裤大码宽松显瘦休闲西装裤</a></div>
                            <div class="yshp">
                              <div class="yshp_l">已售：<span></span></div>
                              <div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="jb01"></div>
          </li>
            <li  class="li1">
            <div class="pic">
            <a href="goods.php?id=248">
            <img src="images/201603/thumb_img/248_thumb_G_1457028572052.jpg" width="185" height="160" /></a></div>
            <div class="wz">
                          <div class="jg">
                                <span>￥100.00</span>
                              <s>￥120.00</s>
                            </div>
                          <div class="tit">
                          <a href="goods.php?id=248">
                          【买一箱送一箱】西班牙原瓶进口红酒DO级卡布拉沃干红葡萄酒整箱</a></div>
                            <div class="yshp">
                              <div class="yshp_l">已售：<span></span></div>
                              <div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="jb01"></div>
          </li>
            <li  class="li1">
            <div class="pic">
            <a href="goods.php?id=247">
            <img src="images/201603/thumb_img/247_thumb_G_1457028555138.jpg" width="185" height="160" /></a></div>
            <div class="wz">
                          <div class="jg">
                                <span>￥100.00</span>
                              <s>￥120.00</s>
                            </div>
                          <div class="tit">
                          <a href="goods.php?id=247">
                          酒仙网 法国原瓶进口红酒莫蕾尔干红葡萄酒750ml*6瓶原装红酒整箱</a></div>
                            <div class="yshp">
                              <div class="yshp_l">已售：<span></span></div>
                              <div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="jb01"></div>
          </li>
            <li  class="li1">
            <div class="pic">
            <a href="goods.php?id=246">
            <img src="images/201603/thumb_img/246_thumb_G_1457028534377.jpg" width="185" height="160" /></a></div>
            <div class="wz">
                          <div class="jg">
                                <span>￥100.00</span>
                              <s>￥120.00</s>
                            </div>
                          <div class="tit">
                          <a href="goods.php?id=246">
                          6支 长城干红葡萄酒特酿3年解百纳国产中粮整箱红酒750ml 葡萄酒</a></div>
                            <div class="yshp">
                              <div class="yshp_l">已售：<span></span></div>
                              <div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="jb01"></div>
          </li>
            <li  class="li1">
            <div class="pic">
            <a href="goods.php?id=242">
            <img src="images/201603/thumb_img/242_thumb_G_1457028515023.jpg" width="185" height="160" /></a></div>
            <div class="wz">
                          <div class="jg">
                                <span>￥100.00</span>
                              <s>￥120.00</s>
                            </div>
                          <div class="tit">
                          <a href="goods.php?id=242">
                          张裕赤霞珠干红葡萄酒750ml优选级特制双支圆筒红酒套装配手提袋</a></div>
                            <div class="yshp">
                              <div class="yshp_l">已售：<span></span></div>
                              <div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="jb01"></div>
          </li>
            <li  class="li1">
            <div class="pic">
            <a href="goods.php?id=241">
            <img src="images/201603/thumb_img/241_thumb_G_1457028489740.jpg" width="185" height="160" /></a></div>
            <div class="wz">
                          <div class="jg">
                                <span>￥100.00</span>
                              <s>￥120.00</s>
                            </div>
                          <div class="tit">
                          <a href="goods.php?id=241">
                          高腰修身显瘦加厚绒棉裤</a></div>
                            <div class="yshp">
                              <div class="yshp_l">已售：<span></span></div>
                              <div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="jb01"></div>
          </li>
                  </ul>
                <div class="clear"></div>
                </div>
      </div>
    </div>
    	
		<script type="text/javascript">jQuery(".rxcp_r").slide({});</script>
    	
        <div class="rmph">
		
        	<div class="tit">一周热卖排行</div>
        	<div class="pic"><a href="#">
        	<img src="data/afficheimg/1446434958418666706.png" width="225" height="92"></a>
        	</div>
<div class="r_line">
                <dl>
                <dt>
                <s>1</s>
                <a href="goods.php?id=254">
                <img src="images/201512/thumb_img/254_thumb_G_1450216015034.jpg" class="iteration" width="45" height="70"></a>
                </dt>
                <dd class="dd_1"   class="iteration1">
                <a href="goods.php?id=254">
                年货礼物 ILISYA柔色初学者彩妆套装全套化妆品工具套装 裸妆淡妆</a>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>80.00</span>
                </dd>
            </dl>
                            <dl>
                <dt>
                <s>2</s>
                <a href="goods.php?id=222">
                <img src="images/201603/thumb_img/222_thumb_G_1457028339598.jpg" class="iteration" width="45" height="70"></a>
                </dt>
                <dd class="dd_1"   class="iteration1">
                <a href="goods.php?id=222">
                恒源祥秋冬中老年纯棉宽松高腰裤</a>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>58.00</span>
                </dd>
            </dl>
                            <dl>
                <dt>
                <s>3</s>
                <a href="goods.php?id=255">
                <img src="images/201512/thumb_img/255_thumb_G_1450216095975.jpg" class="iteration" width="45" height="70"></a>
                </dt>
                <dd class="dd_1"   class="iteration1">
                <a href="goods.php?id=255">
                韩版青年男士冬款商务英伦修身长裤子</a>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>80.00</span>
                </dd>
            </dl>
                            <dl>
                <dt>
                <s>4</s>
                <a href="goods.php?id=259">
                <img src="images/201603/thumb_img/259_thumb_G_1457026147176.jpg" class="iteration" width="45" height="70"></a>
                </dt>
                <dd class="dd_1"   class="iteration1">
                <a href="goods.php?id=259">
                海澜之家热卖商务修身男士直筒休闲裤</a>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>80.00</span>
                </dd>
            </dl>
                            <dl>
                <dt>
                <s>5</s>
                <a href="goods.php?id=256">
                <img src="images/201512/thumb_img/256_thumb_G_1450217811368.jpg" class="iteration" width="45" height="70"></a>
                </dt>
                <dd class="dd_1"   class="iteration1">
                <a href="goods.php?id=256">
                simwood男士磨毛格子英伦小脚休闲裤</a>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>80.00</span>
                </dd>
            </dl>
                            <dl>
                <dt>
                <s>6</s>
                <a href="goods.php?id=1">
                <img src="images/201511/thumb_img/1_thumb_G_1447009846329.jpg" class="iteration" width="45" height="70"></a>
                </dt>
                <dd class="dd_1"   class="iteration1">
                <a href="goods.php?id=1">
                希思黎轻柔护肤西柚柔肤水250ml</a>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>399.00</span>
                </dd>
            </dl>
                            <dl>
                <dt>
                <s>7</s>
                <a href="goods.php?id=53">
                <img src="images/201603/thumb_img/53_thumb_G_1457026422980.jpg" class="iteration" width="45" height="70"></a>
                </dt>
                <dd class="dd_1"   class="iteration1">
                <a href="goods.php?id=53">
                迪奥EDP真我女士香水50ml</a>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>679.00</span>
                </dd>
            </dl>
                            <dl>
                <dt>
                <s>8</s>
                <a href="goods.php?id=238">
                <img src="images/201512/thumb_img/238_thumb_G_1450201715274.jpg" class="iteration" width="45" height="70"></a>
                </dt>
                <dd class="dd_1"   class="iteration1">
                <a href="goods.php?id=238">
                爱斯尼拉卡纳尔红酒 赤霞珠干红葡萄酒 红酒整箱礼盒750ml*6</a>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>100.00</span>
                </dd>
            </dl>
                            <dl>
                <dt>
                <s>9</s>
                <a href="goods.php?id=170">
                <img src="images/201511/thumb_img/170_thumb_G_1446419827849.jpg" class="iteration" width="45" height="70"></a>
                </dt>
                <dd class="dd_1"   class="iteration1">
                <a href="goods.php?id=170">
                莱温迪酒庄干红葡萄酒 2009</a>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>108.00</span>
                </dd>
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
<div class="main_box lc" id="f2">
    <div class="tit"><span>2F</span><font>新品上市</font><div class="clear"></div></div>
	<div class="xpss">
    	<ul>
			
              	<li >
            	<div class="pic">
                	<a href="goods.php?id=255">
                	<img src="images/201512/thumb_img/255_thumb_G_1450216095975.jpg" width="90" height="178"></a>
                </div>
            	<div class="wz">
                	<a href="goods.php?id=255">韩版青年男士冬款商务...</a>
                    <p><span>中级庄</span></p>
		 
    		  
                    <p>产 地：qwefff</p>
                    <p>口 感：123123</p>
     		  
                    <div>
                    	<span>￥<font>80.00</font></span>
                    	<s>￥96.00</s>
                    </div>
                </div>
                <div class="jb02"></div>
            </li>
              	<li >
            	<div class="pic">
                	<a href="goods.php?id=243">
                	<img src="images/201603/thumb_img/243_thumb_G_1457028610234.jpg" width="90" height="178"></a>
                </div>
            	<div class="wz">
                	<a href="goods.php?id=243">棉先生松紧腰男士纯色...</a>
                    <p><span>中级庄</span></p>
		 
    		  
                    <p>产 地：产地</p>
                    <p>口 感：口感</p>
     		  
                    <div>
                    	<span>￥<font>100.00</font></span>
                    	<s>￥120.00</s>
                    </div>
                </div>
                <div class="jb02"></div>
            </li>
              	<li >
            	<div class="pic">
                	<a href="goods.php?id=245">
                	<img src="images/201603/thumb_img/245_thumb_G_1457028595262.jpg" width="90" height="178"></a>
                </div>
            	<div class="wz">
                	<a href="goods.php?id=245">2016春装新款条纹...</a>
                    <p><span>中级庄</span></p>
		 
    		  
                    <p>产 地：产地</p>
                    <p>口 感：口感</p>
     		  
                    <div>
                    	<span>￥<font>100.00</font></span>
                    	<s>￥120.00</s>
                    </div>
                </div>
                <div class="jb02"></div>
            </li>
              	<li >
            	<div class="pic">
                	<a href="goods.php?id=248">
                	<img src="images/201603/thumb_img/248_thumb_G_1457028572052.jpg" width="90" height="178"></a>
                </div>
            	<div class="wz">
                	<a href="goods.php?id=248">【买一箱送一箱】西班...</a>
                    <p><span>中级庄</span></p>
		 
    		  
                    <p>产 地：产地</p>
                    <p>口 感：口感</p>
     		  
                    <div>
                    	<span>￥<font>100.00</font></span>
                    	<s>￥120.00</s>
                    </div>
                </div>
                <div class="jb02"></div>
            </li>
              	<li >
            	<div class="pic">
                	<a href="goods.php?id=247">
                	<img src="images/201603/thumb_img/247_thumb_G_1457028555138.jpg" width="90" height="178"></a>
                </div>
            	<div class="wz">
                	<a href="goods.php?id=247">酒仙网 法国原瓶进口...</a>
                    <p><span>中级庄</span></p>
		 
    		  
                    <p>产 地：产地</p>
                    <p>口 感：口感</p>
     		  
                    <div>
                    	<span>￥<font>100.00</font></span>
                    	<s>￥120.00</s>
                    </div>
                </div>
                <div class="jb02"></div>
            </li>
              	<li >
            	<div class="pic">
                	<a href="goods.php?id=246">
                	<img src="images/201603/thumb_img/246_thumb_G_1457028534377.jpg" width="90" height="178"></a>
                </div>
            	<div class="wz">
                	<a href="goods.php?id=246">6支 长城干红葡萄酒...</a>
                    <p><span>中级庄</span></p>
		 
    		  
                    <p>产 地：产地</p>
                    <p>口 感：口感</p>
     		  
                    <div>
                    	<span>￥<font>100.00</font></span>
                    	<s>￥120.00</s>
                    </div>
                </div>
                <div class="jb02"></div>
            </li>
              	<li >
            	<div class="pic">
                	<a href="goods.php?id=242">
                	<img src="images/201603/thumb_img/242_thumb_G_1457028515023.jpg" width="90" height="178"></a>
                </div>
            	<div class="wz">
                	<a href="goods.php?id=242">张裕赤霞珠干红葡萄酒...</a>
                    <p><span>中级庄</span></p>
		 
    		  
                    <p>产 地：产地</p>
                    <p>口 感：口感</p>
     		  
                    <div>
                    	<span>￥<font>100.00</font></span>
                    	<s>￥120.00</s>
                    </div>
                </div>
                <div class="jb02"></div>
            </li>
              	<li >
            	<div class="pic">
                	<a href="goods.php?id=241">
                	<img src="images/201603/thumb_img/241_thumb_G_1457028489740.jpg" width="90" height="178"></a>
                </div>
            	<div class="wz">
                	<a href="goods.php?id=241">高腰修身显瘦加厚绒棉...</a>
                    <p><span>中级庄</span></p>
		 
    		  
                    <p>产 地：产地</p>
                    <p>口 感：口感</p>
     		  
                    <div>
                    	<span>￥<font>100.00</font></span>
                    	<s>￥120.00</s>
                    </div>
                </div>
                <div class="jb02"></div>
            </li>
      			
        	
        </ul>
        <div class="clear"></div>
    </div>
</div>
<div class="main_box adv"><a href="http://www.baidu.com/" target="_blank">
<img src="data/afficheimg/1449524631674219995.jpg" width="1200" height="100"></a></div>
<div class="main_box lc" id="f3">
    <div class="tit"><span>3F</span><font>品牌专区</font><div class="clear"></div></div>
    <div class="ppzq">
    	<div class="ppzq_r">
        	<div class="cp">
            	<ul>		
                		             <div class="goodList">
            		<li class="li1">
						<div class="pic">
						<a href="goods.php?id=238">
						<img src="images/201512/thumb_img/238_thumb_G_1450201715274.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>20.00</span>
                            	<s>￥90.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="goods.php?id=238">
                        	爱斯尼拉卡纳尔红酒 赤霞珠干红葡萄酒 红酒整箱礼盒750ml*6</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>3</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
                        <div class="jb01"></div>
					</li>
		       
		       
                </ul>
                <div class="clear"></div>
            </div>
		
        	<div class="pinp">
            	<div class="pinp_l">
                	<ul>
                      	<li>
   
                          	<a href="brand.php">
                    	<img src="data/brandlogo/1446601928375381697.jpg" width="132" height="66"></a></li>
      
                      	<li>
   
                          	<a href="brand.php">
                    	<img src="data/brandlogo/1385077477188890125.jpg" width="132" height="66"></a></li>
      
                      	<li>
   
                          	<a href="brand.php">
                    	<img src="data/brandlogo/1385077604377412545.jpg" width="132" height="66"></a></li>
      
                      	<li>
   
                          	<a href="brand.php">
                    	<img src="data/brandlogo/1385077748974263151.jpg" width="132" height="66"></a></li>
      
                      	<li>
   
                          	<a href="brand.php">
                    	<img src="data/brandlogo/1385078397715580649.jpg" width="132" height="66"></a></li>
      
                      	<li>
   
                          	<a href="brand.php">
                    	<img src="data/brandlogo/1385079115095792076.jpg" width="132" height="66"></a></li>
      
                      	<li>
   
                          	<a href="brand.php">
                    	<img src="data/brandlogo/1385079318413536424.jpg" width="132" height="66"></a></li>
      
                      	<li>
   
                          	<a href="brand.php">
                    	<img src="data/brandlogo/1385079444533254362.jpg" width="132" height="66"></a></li>
      
                      	<li>
   
                          	<a href="brand.php">
                    	<img src="data/brandlogo/1385079568646758244.jpg" width="132" height="66"></a></li>
      
                      	<li>
   
                          	<a href="brand.php">
                    	<img src="data/brandlogo/1385079676209216392.jpg" width="132" height="66"></a></li>
      
                      	<li>
   
                          	<a href="brand.php">
                    	<img src="data/brandlogo/1385079770833052568.jpg" width="132" height="66"></a></li>
      
                      	<li>
   
                          	<a href="brand.php">
                    	<img src="data/brandlogo/1385079890162676741.jpg" width="132" height="66"></a></li>
      
                      	<li>
   
                          	<a href="brand.php">
                    	<img src="data/brandlogo/1453074733433204247.jpg" width="132" height="66"></a></li>
      
                      	<li>
   
      
                      	<li>
   
      
                      	<li>
   
      
                      	<li>
   
      
                      	<li>
   
      
                      	<li>
   
      
                      </ul>
                </div>
            	<div class="pinp_r">
            	<a href="brand.php">
            	<img src="themes/miqinew/images/brand_more.png"></a></div>
          
                <div class="clear"></div>
            </div>
        </div>
	
		
    	<div class="ppzq_l">
    	<a href="#">
    	<img src="data/afficheimg/1446435026933297417.jpg" width="204" height="407"></a>
    	</div>
		
        <div class="clear"></div>
    </div>
</div>
<div class="main_box lc pjstj" style="margin-top:10px;" id="f4">
    <div class="tit"><span>4F</span><font>品酒师推荐</font><a href="category.php?id=156" class="a1">查看更多>></a><div class="clear"></div></div>
    
    <div class="pjs_box">
    	<div class="bt">激情之夏--龙船大放送1</div>
        <div class="js">中国人很喜欢龙，龙腾四海，象征着权利、理想、抱负；中国人也很喜欢船，远拓重洋，象征着风顺、开拓、进取。而今天，兔子小姐主推的这款龙船酒庄则集合了这所有的特质，与海洋有关，与梦想有关，与激情有关，在这个炎热一夏，让激情更激情，让梦想更梦想。1</div>
        <a href="category.php?id=156">进入专区</a>
    </div>
    
    
      <div class="tasting_box">
    	<div class="tasting_l">
        	<a href="goods.php?id=180">
        	<img src="images/201511/goods_img/180_G_1446749762414.jpg" width="285" height="185"></a>
        </div>
    	<div class="tasting_r pro_min">
        	<h2>
        	<a href="goods.php?id=180">
        	科提奇穆斯卡托起泡葡萄酒2</a>
        	</h2>
            <p class="p1">这是来自皮尔蒙特的甜型起泡酒。入口气泡爽利、均匀，触感紧密，带有洋槐花、蜂蜜、玫瑰花香的甜美味道，酸度适中，是餐前开胃和佐餐搭配的绝佳选择。其颜色是浅稻草黄色。侍酒温度为5-8℃，最佳搭配是各式甜品我的地位</p> 
                <div class="pro_time" yyear="2015" ymonth="8" yday="22" yhour="18" yminute="">
                	<p>
						<i class="time_icon comm"></i>
						<img src="themes/miqinew/images/ico_sz.png" width="20" height="20">
						<font id="timer" style="color:red;font-weight: normal; font-size:18px;" class="timer leaveTime" value="1451462400" showday="show" ></font>
						
					</p>
                    <span></span>
                 </div>
             <div class="jg">
             	<span>￥<font>58.00</font></span>
                <s>￥90.00</s>
             </div>
            <!--  <div class="an"><a href="goods.php?id=180">立即抢购</a></div> -->
             <div class="an"><a href="goods.php?id=180">立即抢购</a></div>
        </div>
        <div class="clear"></div>
    </div>
      <div class="tasting_box">
    	<div class="tasting_l">
        	<a href="goods.php?id=179">
        	<img src="images/201511/goods_img/179_G_1446745959885.jpg" width="285" height="185"></a>
        </div>
    	<div class="tasting_r pro_min">
        	<h2>
        	<a href="goods.php?id=179">
        	科提奇穆斯卡托起泡葡萄酒</a>
        	</h2>
            <p class="p1">这是来自皮尔蒙特的甜型起泡酒。入口气泡爽利、均匀，触感紧密，带有洋槐花、蜂蜜、玫瑰花香的甜美味道，酸度适中，是餐前开胃和佐餐搭配的绝佳选择。其颜色是浅稻草黄色。侍酒温度为5-8℃，最佳搭配是各式甜品</p> 
                <div class="pro_time" yyear="2015" ymonth="8" yday="22" yhour="18" yminute="">
                	<p>
						<i class="time_icon comm"></i>
						<img src="themes/miqinew/images/ico_sz.png" width="20" height="20">
						<font id="timer" style="color:red;font-weight: normal; font-size:18px;" class="timer leaveTime" value="1467187200" showday="show" ></font>
						
					</p>
                    <span></span>
                 </div>
             <div class="jg">
             	<span>￥<font>58.00</font></span>
                <s>￥90.00</s>
             </div>
            <!--  <div class="an"><a href="goods.php?id=179">立即抢购</a></div> -->
             <div class="an"><a href="goods.php?id=179">立即抢购</a></div>
        </div>
        <div class="clear"></div>
    </div>
  
 
    
    
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
<div class="main_box adv"><a href="#" target="_blank">
<img src="data/afficheimg/1446503820304169081.jpg" width="1200" height="100"></a></div>
<div class="main_box lc jpjj" style="margin-top:10px;" id="f5">
    <div class="tit"><span>5F</span><font>精品酒具</font><a href="category.php?id=157" class="a1">查看更多&gt;&gt;</a><div class="clear"></div></div>
    
    <div class="jjtz hd">
        <ul>
                                <li class="on">
                <div class="pic">
                    <a href="goods.php?id=216"><img src="images/201512/goods_img/216_G_1449612871212.jpg" width="90" height="178"></a>
                </div>
                <div class="wz">
                    <a href="goods.php?id=216">品尚红酒 干红起泡酒葡萄酒大礼包 整箱八支装  法国原瓶进口红酒</a>
                    <p><span>中级庄</span></p>
                    <p>产 地：</p>
                    <p>口 感：</p>
                    <div class="jg">
                        <span>￥<font>101.99</font></span>
                        <s>￥122.00</s>
                    </div>
                </div>
                <div class="jb01"></div>
                <div class="jt"><img src="themes/miqinew/images/ico_jt.png"></div>
            </li>
                                                <li class="">
                <div class="pic">
                    <a href="goods.php?id=182"><img src="images/201511/goods_img/182_G_1446768179579.jpg" width="90" height="178"></a>
                </div>
                <div class="wz">
                    <a href="goods.php?id=182">莫斯卡托阿斯提2</a>
                    <p><span>中级庄</span></p>
                    <p>产 地：法国</p>
                    <p>口 感：芳香如花果，口感顺滑</p>
                    <div class="jg">
                        <span>￥<font>58.00</font></span>
                        <s>￥90.00</s>
                    </div>
                </div>
                <div class="jb02"></div>
                <div class="jt"><img src="themes/miqinew/images/ico_jt.png"></div>
            </li>
                                                <li class="">
                <div class="pic">
                    <a href="goods.php?id=181"><img src="images/201511/goods_img/181_G_1446768126757.jpg" width="90" height="178"></a>
                </div>
                <div class="wz">
                    <a href="goods.php?id=181">莫斯卡托阿斯提</a>
                    <p><span>中级庄</span></p>
                    <p>产 地：芳香如花果</p>
                    <p>口 感：法国</p>
                    <div class="jg">
                        <span>￥<font>58.00</font></span>
                        <s>￥90.00</s>
                    </div>
                </div>
                <div class="jb02"></div>
                <div class="jt"><img src="themes/miqinew/images/ico_jt.png"></div>
            </li>
                                  </ul>
        <div class="clear"></div>
        <div class="bd">
                            <div class="txtScroll-top" style="display: none;">
            <div class="tempWrap" style="overflow:hidden; position:relative; height:126px">
            <div class="infoList" style="top: -252px; position: relative; padding: 0px; margin: 0px;">
                <div class="gd" style="height: 126px;">
                                        <div class="zcp"><a href="goods.php?id=216"><img src="images/201512/goods_img/216_G_1449612871212.jpg" width="120" height="120"></a>
    <input style="margin-left: -55px;" class="m_goods_body m_goods_1" item="m_goods_1" type="checkbox" value="216" data="101.99" spare="0" stock="0" />
                    </div>
                                                                                <div>
                    <div class="jia"><img src="themes/miqinew/images/ico_jia.png" width="50" height="50"></div>
                    
                    <div class="cp">
                        <div class="tp"><a href="goods.php?id=181"><img src="images/201511/thumb_img/181_thumb_G_1446768126704.jpg" width="120" height="120"></a></div>
                        <div class="wz">
                            <div class="bt"><a href="goods.php?id=181">莫斯卡托阿斯提</a></div>
                            <p>产 地：法国</p>
                            <p>口 感：芳香如花果</p>
                            <div class="jg">
                                <span>￥<font>53.00</font></span>
                                <s>￥58.00</s>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                                        
                                                            <div>
                    <div class="jia"><img src="themes/miqinew/images/ico_jia.png" width="50" height="50"></div>
                    
                    <div class="cp">
                        <div class="tp"><a href="goods.php?id=182"><img src="images/201511/thumb_img/182_thumb_G_1446768179976.jpg" width="120" height="120"></a></div>
                        <div class="wz">
                            <div class="bt"><a href="goods.php?id=182">莫斯卡托阿斯提2</a></div>
                            <p>产 地：法国</p>
                            <p>口 感：芳香如花果</p>
                            <div class="jg">
                                <span>￥<font>54.00</font></span>
                                <s>￥58.00</s>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                                                            <div>
                        <div class="jia"><img src="themes/miqinew/images/ico_deng.png" width="48" height="48"></div>
                        
                        <div class="tcjg">
                            <div class="jg1">原&nbsp;&nbsp;&nbsp;&nbsp;价：<s>￥238</s></div>
                            <div class="jg2">套装价：<span>￥<font>208.99</font></span></div>
                            <div><a href="javascript:addMultiToCart('m_goods_1','216');" class="an">加入购物车</a></div>
                        </div>
                    </div>
                    
                                    </div>
            </div>
            </div>
            </div>
                                            <div class="txtScroll-top" style="display: none;">
            <div class="tempWrap" style="overflow:hidden; position:relative; height:126px">
            <div class="infoList" style="top: 0px; position: relative; padding: 0px; margin: 0px;">
                <div class="gd" style="height: 126px;">
                                                        </div>
            </div>
            </div>
            </div>
                                            <div class="txtScroll-top" style="display: none;">
            <div class="tempWrap" style="overflow:hidden; position:relative; height:126px">
            <div class="infoList" style="top: -302.126px; position: relative; padding: 0px; margin: 0px;">
                <div class="gd" style="height: 126px;">
                                                        </div>
            </div>
            </div>
            </div>
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
            ec_group_addToCart($(this).attr('item'), 181); //基本件(组,主件)
        }else{
            ec_group_delInCart($(this).attr('item'), 181); //删除基本件(组,主件)
            display_Price($(this).attr('item'),$(this).attr('item').charAt($(this).attr('item').length-1));
        }
    })
    //变更选购的配件
    $('.m_goods_list').click(function(){
        //是否选择主件
                if($(this).prop('checked')){
            ec_group_addToCart($(this).attr('item'), $(this).val(),181); //新增配件(组,配件,主件)
        }else{
            ec_group_delInCart($(this).attr('item'), $(this).val(),181); //删除基本件(组,配件,主件)
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
                                <li class="">1</li>
                                <li class="">2</li>
                                <li class="">3</li>
                                <li class="">4</li>
                                </ul>
            </div>
            <div class="bd">
                <ul>
                                <li style="display: none;"><a href="#" target="_blank"><img src="data/afficheimg/1446435091619437845.jpg" width="204" height="407"></a></li>
                      <li style="display: none;"><a href="#" target="_blank"><img src="data/afficheimg/1451419769296690109.jpg" width="204" height="407"></a></li>
                      <li style="display: list-item;"><a href="#" target="_blank"><img src="data/afficheimg/1451270729249042702.jpg" width="204" height="407"></a></li>
                      <li style="display: none;"><a href="#" target="_blank"><img src="data/afficheimg/1451270829515301027.jpg" width="204" height="407"></a></li>
                      </ul>
            </div>
        </div>
        <script type="text/javascript">
        jQuery(".jpjj_r").slide({mainCell:".bd ul",autoPlay:true});
        </script>
        
    <div class="clear"></div>    
</div>
<div class="main_box adv"><a href="#">
<img src="data/afficheimg/1449524685909518731.jpg" width="1200" height="100"></a></div>
<div class="main_box lc" style="margin-top:10px;" id="f6">
    <div class="tit"><span>6F</span><font>婚宴专区</font><a href="category.php?id=158" class="a1">查看更多>></a><div class="clear"></div></div>
	<div class="jfsc1">
		
    	<div class="rxcp_l">
        	<div class="pic" style="height:361px;">
        	<a href="#" target="_blank" >
        	<img src="data/afficheimg/1446435129521317610.jpg" width="206" height="361"></a></div>
		
            
        </div>
        <div class="jfsc1_rbox">
        	
        	<div class="qhrm">
            
		<div class="jfsc_banner">
			<div class="hd">
				<ul>
                                    <li>1</li>
                                        <li>2</li>
                                        <li>3</li>
                                        <li>4</li>
                                        <li>5</li>
                                        <li>6</li>
                                        <li>7</li>
                      
                </ul>
			</div>
			<div class="bd">
				<ul>
                <li><a href="#">
          <img src="data/afficheimg/1446230361610167692.jpg" width="749" height="361" /></a></li>
                <li><a href="#">
          <img src="data/afficheimg/1446230389116379823.jpg" width="749" height="361" /></a></li>
                <li><a href="#">
          <img src="data/afficheimg/1446230404440306837.jpg" width="749" height="361" /></a></li>
                <li><a href="#">
          <img src="data/afficheimg/1446230423335179045.jpg" width="749" height="361" /></a></li>
                <li><a href="#">
          <img src="data/afficheimg/1446230436708441718.jpg" width="749" height="361" /></a></li>
                <li><a href="#">
          <img src="data/afficheimg/1451419843724070714.jpg" width="749" height="361" /></a></li>
                <li><a href="">
          <img src="data/afficheimg/1451524292442909934.jpg" width="749" height="361" /></a></li>
        
				</ul>
			</div>
		</div>
            
		<script type="text/javascript">
		jQuery(".jfsc_banner").slide({mainCell:".bd ul",autoPlay:true});
		</script>
<div class="rmph" style="height:361px;">
        	<div class="tit" style="margin-top:0;height:33px;line-height:33px;">热卖排行</div>
<div class="r_line">
                <dl class="active dl1">
                <dt>
                <s>1</s>
                <a href="goods.php?id=254"><img src="images/201512/thumb_img/254_thumb_G_1450216015034.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=254">年货礼物 ILISY...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>80.00</span>
                </dd>
            </dl>
                            <dl class=" dl1">
                <dt>
                <s>2</s>
                <a href="goods.php?id=222"><img src="images/201603/thumb_img/222_thumb_G_1457028339598.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=222">恒源祥秋冬中老年纯棉...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>58.00</span>
                </dd>
            </dl>
                            <dl class=" dl1">
                <dt>
                <s>3</s>
                <a href="goods.php?id=255"><img src="images/201512/thumb_img/255_thumb_G_1450216095975.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=255">韩版青年男士冬款商务...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>80.00</span>
                </dd>
            </dl>
                            <dl class=" dl1">
                <dt>
                <s>4</s>
                <a href="goods.php?id=259"><img src="images/201603/thumb_img/259_thumb_G_1457026147176.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=259">海澜之家热卖商务修身...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>80.00</span>
                </dd>
            </dl>
                            <dl class=" dl1">
                <dt>
                <s>5</s>
                <a href="goods.php?id=256"><img src="images/201512/thumb_img/256_thumb_G_1450217811368.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=256">simwood男士磨...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>80.00</span>
                </dd>
            </dl>
                            <dl class=" dl1">
                <dt>
                <s>6</s>
                <a href="goods.php?id=1"><img src="images/201511/thumb_img/1_thumb_G_1447009846329.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=1">希思黎轻柔护肤西柚柔...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>399.00</span>
                </dd>
            </dl>
                            <dl class=" dl1">
                <dt>
                <s>7</s>
                <a href="goods.php?id=53"><img src="images/201603/thumb_img/53_thumb_G_1457026422980.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=53">迪奥EDP真我女士香...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>679.00</span>
                </dd>
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
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=250">
						<img src="images/201603/goods_img/250_G_1457028423248.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>100.00</font></span>
                            	<s>￥120.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="goods.php?id=250">
                        	初善原创纯棉小脚直筒修身日系长裤子</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=251">
						<img src="images/201603/goods_img/251_G_1457028392118.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>100.00</font></span>
                            	<s>￥120.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="goods.php?id=251">
                        	maysu美素瑰蜜滋养霜抗老面霜补水乳液精华</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=249">
						<img src="images/201603/goods_img/249_G_1457028378996.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>100.00</font></span>
                            	<s>￥120.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="goods.php?id=249">
                        	醉梦红酒 西班牙原瓶进口红酒整箱 梦诺骑士干红葡萄酒 年货送礼</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=177">
						<img src="images/201511/goods_img/177_G_1446684606078.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>58.00</font></span>
                            	<s>￥90.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="goods.php?id=177">
                        	RIO锐澳鸡尾酒 预调酒果酒朗姆伏特加 【洋酒 威士忌】芝华士婚宴专区</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>2</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
					
                </ul>
                <div class="clear"></div>
            </div>
    
</div>
<div class="main_box adv"><a href="#" target="_blank">
<img src="data/afficheimg/1446503915746543122.jpg" width="1200" height="100"></a></div>
<div class="main_box lc" style="margin-top:10px;" id="f7">
    <div class="tit"><span>7F</span><font>礼盒馈赠</font><a href="category.php?id=159" class="a1">查看更多>></a><div class="clear"></div></div>
	<div class="qil">
    	<ul>
		
              	<li><a href="#">
        	<img src="data/afficheimg/1446435200641283007.jpg" width="393" height="196"></a></li>
              	<li><a href="#">
        	<img src="data/afficheimg/1446435229097629597.jpg" width="393" height="196"></a></li>
              	<li><a href="#">
        	<img src="data/afficheimg/1446435241214049060.jpg" width="393" height="196"></a></li>
          
		
        </ul>
        <div class="clear"></div>
    </div>
    
    
<div class="tjcp" style="height:546px;">
            	<ul>
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=248">
						<img src="images/201603/goods_img/248_G_1457028572023.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>100.00</font></span>
                            	<s>￥120.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="detail.php">
                        	【买一箱送一箱】西班牙原瓶进口红酒DO级卡布拉沃干红葡萄酒整箱</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=247">
						<img src="images/201603/goods_img/247_G_1457028555148.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>100.00</font></span>
                            	<s>￥120.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="detail.php">
                        	酒仙网 法国原瓶进口红酒莫蕾尔干红葡萄酒750ml*6瓶原装红酒整箱</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=245">
						<img src="images/201603/goods_img/245_G_1457028595273.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>100.00</font></span>
                            	<s>￥120.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="detail.php">
                        	2016春装新款条纹裤子女九分哈伦裤小脚裤大码宽松显瘦休闲西装裤</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=246">
						<img src="images/201603/goods_img/246_G_1457028534265.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>100.00</font></span>
                            	<s>￥120.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="detail.php">
                        	6支 长城干红葡萄酒特酿3年解百纳国产中粮整箱红酒750ml 葡萄酒</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=243">
						<img src="images/201603/goods_img/243_G_1457028610144.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>100.00</font></span>
                            	<s>￥120.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="detail.php">
                        	棉先生松紧腰男士纯色直筒宽松棉麻裤</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=242">
						<img src="images/201603/goods_img/242_G_1457028515175.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>100.00</font></span>
                            	<s>￥120.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="detail.php">
                        	张裕赤霞珠干红葡萄酒750ml优选级特制双支圆筒红酒套装配手提袋</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=241">
						<img src="images/201603/goods_img/241_G_1457028489864.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>100.00</font></span>
                            	<s>￥120.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="detail.php">
                        	高腰修身显瘦加厚绒棉裤</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=239">
						<img src="images/201603/goods_img/239_G_1457028446004.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>100.00</font></span>
                            	<s>￥120.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="detail.php">
                        	【长城官方】沙城长城干红葡萄酒 特酿三年解百纳 红酒 6支整箱</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=240">
						<img src="images/201603/goods_img/240_G_1457028466070.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>100.00</font></span>
                            	<s>￥120.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="detail.php">
                        	秋冬加厚毛呢休闲韩版黑色呢子裤</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
								<li class="li1">
						<div class="pic">
						<a href="goods.php?id=178">
						<img src="images/201511/goods_img/178_G_1446689295329.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>58.00</font></span>
                            	<s>￥90.00</s>
                            </div>
                        	<div class="tit">
                        	<a href="detail.php">
                        	RIO锐澳鸡尾酒 预调酒果酒朗姆伏特加 【洋酒 威士忌】芝华士 礼盒馈赠</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
			
                </ul>
                <div class="clear"></div>
            </div>
    
</div>
<div class="main_box adv"><a href="#" target="_blank">
<img src="data/afficheimg/1450913494048533024.jpg" width="1200" height="100"></a></div>
<div class="main_box lc" style="margin-top:10px;" id="f8">
    <div class="tit">
    <span>8F</span><font>整箱购/组合</font>
    <a href="category.php?id=153" class="a1">查看更多>></a>
    <div class="clear"></div></div>
	<div class="jfsc1">
		
    	<div class="rxcp_l">
        	<div class="pic" style="height:361px;">
        	<a href="#">
        	<img src="data/afficheimg/1446435279899309299.jpg" width="206" height="361"></a></div>
        </div>
		
        <div class="jfsc1_rbox">
        	
        	<div class="qhrm">
            
		<div class="jfsc_banner">
			<div class="hd">
				<ul>
                                    <li>1</li>
                                        <li>2</li>
                                        <li>3</li>
                                        <li>4</li>
                                        <li>5</li>
                      
                </ul>
			</div>
			<div class="bd">
				<ul>
		
                <li><a href="#">
          <img src="data/afficheimg/1446230476676991533.jpg" width="749" height="361" /></a></li>
                <li><a href="#">
          <img src="data/afficheimg/1446230489918651549.jpg" width="749" height="361" /></a></li>
                <li><a href="#">
          <img src="data/afficheimg/1446230501584565533.jpg" width="749" height="361" /></a></li>
                <li><a href="#">
          <img src="data/afficheimg/1446230516680167971.jpg" width="749" height="361" /></a></li>
                <li><a href="">
          <img src="data/afficheimg/1451253122521256270.jpg" width="749" height="361" /></a></li>
        
		
				</ul>
			</div>
		</div>
            
		<script type="text/javascript">
		jQuery(".jfsc_banner").slide({mainCell:".bd ul",autoPlay:true});
		</script>
<div class="rmph" style="height:361px;">
        	<div class="tit" style="margin-top:0;height:33px;line-height:33px;">热卖排行</div>
<div class="r_line">
                <dl class="active dl1">
                <dt>
                <s>1</s>
                <a href="goods.php?id=254"><img src="images/201512/thumb_img/254_thumb_G_1450216015034.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=254">年货礼物 ILISY...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>80.00</span>
                </dd>
            </dl>
                           <dl class=" dl1">
                <dt>
                <s>2</s>
                <a href="goods.php?id=222"><img src="images/201603/thumb_img/222_thumb_G_1457028339598.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=222">恒源祥秋冬中老年纯棉...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>58.00</span>
                </dd>
            </dl>
                           <dl class=" dl1">
                <dt>
                <s>3</s>
                <a href="goods.php?id=255"><img src="images/201512/thumb_img/255_thumb_G_1450216095975.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=255">韩版青年男士冬款商务...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>80.00</span>
                </dd>
            </dl>
                           <dl class=" dl1">
                <dt>
                <s>4</s>
                <a href="goods.php?id=259"><img src="images/201603/thumb_img/259_thumb_G_1457026147176.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=259">海澜之家热卖商务修身...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>80.00</span>
                </dd>
            </dl>
                           <dl class=" dl1">
                <dt>
                <s>5</s>
                <a href="goods.php?id=256"><img src="images/201512/thumb_img/256_thumb_G_1450217811368.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=256">simwood男士磨...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>80.00</span>
                </dd>
            </dl>
                           <dl class=" dl1">
                <dt>
                <s>6</s>
                <a href="goods.php?id=1"><img src="images/201511/thumb_img/1_thumb_G_1447009846329.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=1">希思黎轻柔护肤西柚柔...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>399.00</span>
                </dd>
            </dl>
                           <dl class=" dl1">
                <dt>
                <s>7</s>
                <a href="goods.php?id=53"><img src="images/201603/thumb_img/53_thumb_G_1457026422980.jpg" width="45" height="70"></a>
                </dt>
                <dd class="dd_1 dd_11">
                <a href="goods.php?id=53">迪奥EDP真我女士香...</a>
                <span>波尔多优质干红</span>
                </dd>
                <dd class="dd_2">
                <span class='rmb_1'>&yen;</span>
                <span class='rmb_2'>679.00</span>
                </dd>
            </dl>
                     
            
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
		
	    							<li class="li1">
						<div class="pic">
						<a href="goods.php?id=215">
						<img src="images/no_picture.gif" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>130.00</font></span>
                            	<s>￥156</s>
                            </div>
                        	<div class="tit">
                        	<a href="goods.php?id=215">Breezer/百加得冰锐鸡尾酒8*275ml 洋酒朗姆预调酒果酒特价包邮</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>10000</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
	      							<li class="li1">
						<div class="pic">
						<a href="goods.php?id=173">
						<img src="images/201511/goods_img/173_G_1446506077814.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>58.00</font></span>
                            	<s>￥90</s>
                            </div>
                        	<div class="tit">
                        	<a href="goods.php?id=173">RIO锐澳鸡尾酒 预调酒果酒朗姆伏特加 【洋酒 威士忌】芝华士整箱购</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>0</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
	      							<li class="li1">
						<div class="pic">
						<a href="goods.php?id=172">
						<img src="images/201511/goods_img/172_G_1446506022950.jpg" width="185" height="160" /></a></div>
						<div class="wz">
                          <div class="jg">
                                <span>￥<font>58.00</font></span>
                            	<s>￥90</s>
                            </div>
                        	<div class="tit">
                        	<a href="goods.php?id=172">RIO锐澳鸡尾酒 预调酒果酒朗姆伏特加 【洋酒 威士忌】芝华士组合</a></div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>2</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                      	</div>
					</li>
	      				
                </ul>
                <div class="clear"></div>
            </div>
    
</div>
<div class="security"></div>
<div class="link_box">
    <div class="main_box">
        <ul>
              <li >
                <p>关于秀当</p>
                      <p><a href="article.php?id=37">诚聘英才</a></p>
                      <p><a href="article.php?id=39">品牌入驻</a></p>
                      <p><a href="article.php?id=40">友情链接</a></p>
                      <p><a href="article.php?id=82">关于秀当</a></p>
      
            </li>
              <li >
                <p>新手课堂</p>
                      <p><a href="article.php?id=38">新用户注册</a></p>
                      <p><a href="article.php?id=41">如何购买</a></p>
                      <p><a href="article.php?id=42">企业团购</a></p>
      
            </li>
              <li >
                <p>支付方式</p>
                      <p><a href="article.php?id=43">在线支付</a></p>
                      <p><a href="article.php?id=44">银行汇款</a></p>
                      <p><a href="article.php?id=45">发票制度</a></p>
      
            </li>
              <li >
                <p>配送方式</p>
                      <p><a href="article.php?id=46">配送运费及时效</a></p>
                      <p><a href="article.php?id=47">货到付款范围</a></p>
      
            </li>
              <li >
                <p>售后服务</p>
                      <p><a href="article.php?id=48">退换货政策及办理</a></p>
                      <p><a href="article.php?id=49">自助退换货</a></p>
                      <p><a href="article.php?id=50">订单跟踪</a></p>
      
            </li>
              <li >
                <p>帮助中心</p>
                      <p><a href="article.php?id=51">找回密码</a></p>
                      <p><a href="article.php?id=52">常见问题</a></p>
                      <p><a href="article.php?id=53">意见反馈</a></p>
      
            </li>
          </ul>
        <div class="zxkf">
            <span>客服热线</span>
            <p>4006-528-528</p>
            <a href="#"><img src="themes/miqinew/images/zxkf.png"></a>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div style="background:#fff;">
<div class="main_box bottom">
	<p>©2007-2014 GuoanAll Rights Reserved. 深圳市秀当供应链管理有限公司 版权所有，禁止非法复制 经营许可证编号：经营许可证编号：浙B2-20100425</p>
    <ul>
    	<li><a href="article.php?id=94">服务条款</a></li>
    	<li><a href="article.php?id=95">网站制度</a></li>
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
 
  var time_end=1451462400;
//alert(time_end);
function getDate(tm){
	var tt=new Date(parseInt(tm) * 1000).toLocaleString()
	return tt;
}         
//alert(getDate(time_end));
var id = 180;
  var time_end=1467187200;
//alert(time_end);
function getDate(tm){
	var tt=new Date(parseInt(tm) * 1000).toLocaleString()
	return tt;
}         
//alert(getDate(time_end));
var id = 179;
  
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