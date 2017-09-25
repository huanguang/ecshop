<?php exit;?>a:3:{s:8:"template";a:5:{i:0;s:42:"D:/wwwroot/guoa/themes/miqinew/article.dwt";i:1;s:54:"D:/wwwroot/guoa/themes/miqinew/library/page_header.lbi";i:2;s:50:"D:/wwwroot/guoa/themes/miqinew/library/ur_here.lbi";i:3;s:52:"D:/wwwroot/guoa/themes/miqinew/library/left_help.lbi";i:4;s:54:"D:/wwwroot/guoa/themes/miqinew/library/page_footer.lbi";}s:7:"expires";i:1466357386;s:8:"maketime";i:1466353786;}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<title>友情链接_关于秀当_常见问题分类_系统分类_秀当红酒商城</title>
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
<script type="text/javascript" src="js/common.js"></script></head>
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
<script type="text/javascript" src="js/jquery.json.js"></script>          <script type="text/javascript" src="js/transport.js"></script><script type="text/javascript" src="js/utils.js"></script><script type="text/javascript" src="js/ecmoban_common.js"></script>
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
<div class="content">
<div class="contentBody">
<div class="block_s">
 <div class="cur_wz">
  <span><a href="index.php"></a></span> <a href=".">首页</a> <code>&gt;</code> <a href="article_cat.php?id=1">系统分类</a> <code>&gt;</code> <a href="article_cat.php?id=3">常见问题分类</a> <code>&gt;</code> <a href="article_cat.php?id=13">关于秀当</a> <code>&gt;</code> 友情链接
</div>
<div class="blank"></div>
  
  <div class="help_left">
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
	
		<li class="clearfix">
			<h5><b class="UI-ask"></b>关于秀当</h5>
			<div class="foldContent">
							<p><a href="article.php?id=37">诚聘英才</a></p>
								<p><a href="article.php?id=39">品牌入驻</a></p>
								<p><a href="article.php?id=40">友情链接</a></p>
								<p><a href="article.php?id=82">关于秀当</a></p>
							</div>
		</li>
		<li class="clearfix">
			<h5><b class="UI-ask"></b>新手课堂</h5>
			<div class="foldContent">
							<p><a href="article.php?id=38">新用户注册</a></p>
								<p><a href="article.php?id=41">如何购买</a></p>
								<p><a href="article.php?id=42">企业团购</a></p>
							</div>
		</li>
		<li class="clearfix">
			<h5><b class="UI-ask"></b>支付方式</h5>
			<div class="foldContent">
							<p><a href="article.php?id=43">在线支付</a></p>
								<p><a href="article.php?id=44">银行汇款</a></p>
								<p><a href="article.php?id=45">发票制度</a></p>
							</div>
		</li>
		<li class="clearfix">
			<h5><b class="UI-ask"></b>配送方式</h5>
			<div class="foldContent">
							<p><a href="article.php?id=46">配送运费及时效</a></p>
								<p><a href="article.php?id=47">货到付款范围</a></p>
							</div>
		</li>
		<li class="clearfix">
			<h5><b class="UI-ask"></b>售后服务</h5>
			<div class="foldContent">
							<p><a href="article.php?id=48">退换货政策及办理</a></p>
								<p><a href="article.php?id=49">自助退换货</a></p>
								<p><a href="article.php?id=50">订单跟踪</a></p>
							</div>
		</li>
		<li class="clearfix">
			<h5><b class="UI-ask"></b>帮助中心</h5>
			<div class="foldContent">
							<p><a href="article.php?id=51">找回密码</a></p>
								<p><a href="article.php?id=52">常见问题</a></p>
								<p><a href="article.php?id=53">意见反馈</a></p>
							</div>
		</li>
		<li class="clearfix">
			<h5><b class="UI-ask"></b>红酒文化</h5>
			<div class="foldContent">
							<p><a href="article.php?id=64">红酒课程</a></p>
								<p><a href="article.php?id=65">红酒讲座</a></p>
								<p><a href="article.php?id=66">红酒知识</a></p>
								<p><a href="article.php?id=67">品酒师推荐</a></p>
							</div>
		</li>
		<li class="clearfix">
			<h5><b class="UI-ask"></b>加盟我们</h5>
			<div class="foldContent">
							<p><a href="article.php?id=68">加盟须知</a></p>
								<p><a href="article.php?id=69">加盟表单</a></p>
							</div>
		</li>
		</ul>
    <div class="clear"></div>
</div>
</div>
    
  </div>
  
  
         <div class="user_r" style="    margin-left: 43px;
    margin-top: 2px;">
            <div class="qtxx dongt">
            <div class="tit1">友情链接</div>
            <div class="con1">
                        <a href="http://localhost/miqi/#">友情链接</a><a href="http://localhost/miqi/#">友情链接</a><a href="http://localhost/miqi/#">友情链接</a><a href="http://localhost/miqi/#">友情链接</a><a href="http://localhost/miqi/#">友情链接</a>                 </div>
        </div>
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
</Div>
</div>
</div>
</div>
</body>
</html>
