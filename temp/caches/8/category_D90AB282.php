<?php exit;?>a:3:{s:8:"template";a:6:{i:0;s:43:"D:/wwwroot/guoa/themes/miqinew/category.dwt";i:1;s:54:"D:/wwwroot/guoa/themes/miqinew/library/page_header.lbi";i:2;s:50:"D:/wwwroot/guoa/themes/miqinew/library/ur_here.lbi";i:3;s:53:"D:/wwwroot/guoa/themes/miqinew/library/zuhesousuo.lbi";i:4;s:48:"D:/wwwroot/guoa/themes/miqinew/library/pages.lbi";i:5;s:54:"D:/wwwroot/guoa/themes/miqinew/library/page_footer.lbi";}s:7:"expires";i:1466979545;s:8:"maketime";i:1466975945;}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>单支_秀当红酒商城</title>
<link rel="icon" href="images/favicon.gif" type="image/gif" >
<link href="css/common.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/tuang.css" type="text/css" rel="stylesheet" />
<link href="themes/miqinew/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="themes/miqinew/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="themes/miqinew/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="themes/miqinew/js/nav.js"></script>
<script type="text/javascript" src="themes/miqinew/js/js.js"></script>
<script type="text/javascript" src="themes/miqinew/js/modal.js"></script>
<script language="JavaScript" type="text/javascript" src="js/common_1.js"></script>	
<style>
#nav .mod_subcate{top:0;}
.page{margin-top:0px;margin-bottom:50px;}
</style>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script><script type="text/javascript" src="js/jquery.json.js"></script><script type="text/javascript" src="js/common.js"></script><script type="text/javascript" src="js/global.js"></script><script type="text/javascript" src="js/compare.js"></script></head>
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
          <script type="text/javascript" src="js/transport.js"></script><script type="text/javascript" src="js/utils.js"></script><script type="text/javascript" src="js/ecmoban_common.js"></script>
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
<div class="cur_wz">
	<span><a href="index.php"></a></span> <a href=".">首页</a> <code>&gt;</code> <a href="category.php?id=152">单支</a></div>
<script>
function show_box(this_obj,h)
{
  var child_obj = this_obj.parentNode.parentNode.childNodes;
  for(i=0; i<child_obj.length; i++)
  {
    if(child_obj[i].className == "show_box")
    {
      if(child_obj[i].style.height != "auto")
      {
        child_obj[i].style.height="auto";
        this_obj.innerText="收起";
      }
      else
      {
        child_obj[i].style.height=h+'px';
        this_obj.innerText="展开";
      }
    }
  }
}
</script>
<div class="xxfl">
<div class="div_1200" id="close_pro_nav">
  <form action="" method="post" name="ddxuan" id="ddxuan"  class="ddxuan_1">
  <script language="JavaScript">
  function change()
{
  var ddxuan=document.getElementById("ddxuan");
  if(ddxuan.className=="ddxuan_1"){
  ddxuan.className="ddxuan_2"
  }else{
  ddxuan.className="ddxuan_1"
  }
}
</script>
  <div class="div_f2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="80" align="left" nowrap><strong><span class="ar">单支      
    </span></strong></td>
    <td align="left" >    </td>
    <td width="100" align="right"><div class="txt1"><a href="javascript:" onClick="change()" class="abk">开启多选模式</a></div><div class="txt2"><a href="javascript:" onClick="change()" class="abk">关闭多选模式</a></div></td>
  </tr>
</table>
    
  </div>
  <div class="div_f3">
    <table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="70" align="right" valign="top" class="line1 txt_1p20">品牌：</td>
         <!--程序员，这点小空格不能去掉的啊！为了不让一组词夸2行，我设了一组词不换行咯，项目后台动态,注意某行有项目被选择时该行'<tr>....</tr>'隐藏，这里为了做效果全显示了！,第一个label做了一个for=""，后面没做了，实际是要的--> <td class="line1">
                   
         
         <a href="category.php?id=152&amp;price_min=0&amp;price_max=0" class="box1 ab" style="color:red;">全部</a>
         
                   
                                     
        </tr>
 
        <tr>
          <td width="70" align="right" valign="top" class="line1 txt_1p20">价格：</td>      
<td class="line1">
</td>
        </tr>
                <tr class="btn">
          <td align="right" valign="top" class="txt_1p20">&nbsp;</td>
          <td class="ab a20_2em_nowrap"><input name="tijiao" type="botton" onclick="chaxuns();" class="button2" id="tijiao" value="提交"> 
  &nbsp; 
  <input name="quxiao" type="reset" class="button2" id="quxiao" onClick="change()" value="取消"></td>
  <script type="text/javascript">
  function chaxuns(){
  var aa = $('.bb');
  var ss = '';
  for(var i= 0;i<=aa.length-1;i++){
    if(aa[i].checked == true){
    ss += aa[i].value+',';
    }
  }
  var bb = $('.aass');
  var cc = '';
  for(var i= 0;i<=bb.length-1;i++){
    if(bb[i].checked == true){
    cc += bb[i].value+',';
    }
  }
  window.location.href="category.php?category=152&display=grid&brand=0&price_min=0&pin="+cc+"&shux="+ss+"&price_max=0&filter_attr=0&page=1&sort=shop_price&order=ASC#goods_list";
}
  </script>
        </tr>
      </table>
      <div class="clear"></div>
  </div></form>
  <div id="lyu_c_2" style="display:none">
  <div class="div_f3">
    <table width="100%" border="0" cellspacing="0" cellpadding="6">
          </table>
  </div>
  <div class="clear"></div>
  <div  class="div_f5" id="lyu_t_1" onClick="Tb(1, 2, 'lyu', '');" ><img src="themes/miqinew/images/div_f5_collapse.gif" width="1200" height="12" class="imgcss hand" title="收起"></div>
         
    </div>
  
    <div  class="div_f5" id="lyu_c_1"  style="display:"><div id="lyu_t_2" onClick="Tb(2, 2, 'lyu', '');" ><img src="themes/miqinew/images/div_f5_expand.gif" width="1200" height="12" class=" hand"  title="展开"></div></div>
    <div class="clear"></div>    
</div>
</div>
<div class="main_box">
        
<div class="screen">
    	<ul>
        	<li class="cur"><a href="category.php?category=152&display=grid&brand=0&price_min=0&price_max=0&filter_attr=0&page=1&sort=goods_id&order=ASC#goods_list">全部</a></li>
        	<li class="li1"><a href="category.php?category=152&display=grid&brand=0&price_min=0&price_max=0&filter_attr=0&page=1&sort=last_update&order=DESC#goods_list">人气</a></li>
        	<li class="li2"><a href="category.php?category=152&display=grid&brand=0&price_min=0&price_max=0&filter_attr=0&page=1&sort=shop_price&order=ASC#goods_list">销量</a></li>
        </ul>
        <div class="money">
        	价格
        	<input type="text" value="0" id="max">-<input type="text" id="min" value="0">
            <input type="button" onclick="cha();" class="an" value="确定">
            <script type="text/javascript">
                function cha(){
                    var max = document.getElementById('max').value;
                    var min = document.getElementById('min').value;
                    if(max == min || max > min){
                        alert('请输入正确的价格区间！！');
                    }else{
                   window.location.href="category.php?category=152&display=grid&brand=0&price_min="+max+"&price_max="+min+"&filter_attr=0&page=1&sort=shop_price&order=ASC#goods_list";
                    }
                }
                function chaxun(obj,aa){
                    var cu = document.getElementById('cuxiao').value;
                    var bao = document.getElementById('baoyou').value;
                    var add = '';
                    var ass = '';
                    var asss = '';
                    if(obj.value == 0){
                        obj.value = 1;
                            
                            }else{
                        obj.value = 0;
                        }
                    if(cu == 1){
                            
                        add = '&cuxiao=1';
                        if(aa == 'cuxiao'){
                            add = '&cuxiao='+obj.value;
                        }else{
                           ass = '&baoyou='+obj.value;
                        }
                    }else if(bao == 1){
                        add = '&baoyou=1';
                        if(aa == 'baoyou'){
                            add = '&baoyou='+obj.value;
                        }else{
                           ass = '&cuxiao='+obj.value;
                        }
                    }else{
                        if(aa == 'cuxiao'){
                            asss = '&cuxiao='+obj.value;
                        }else{
                            asss = '&baoyou='+obj.value; 
                        }
                    }
                    
                    
                    window.location.href="category.php?category=152&display=grid&"+add+ass+asss+"&brand=0&price_min=0&price_max=0&filter_attr=0&page=1&sort=shop_price&order=ASC#goods_list"
                }
            </script>
        </div>
<div class="xlsx fl">
        	<a href="###"><label><input name="" id="cuxiao" onclick="chaxun(this,'cuxiao');"  type="checkbox" value="0" /><span>折扣促销</span></label></a>
<div class="xlsx_1">
            	<ul>
                	<li><label><input name="" id="baoyou" onclick="chaxun(this,'baoyou');"  type="checkbox" value="0" /><span>包邮</span></label></li>
                	<!--<li><label><input name="" type="checkbox" value="" /><span>折扣促销</span></label></li>
                	<li><label><input name="" type="checkbox" value="" /><span>阿斯达</span></label></li>
                	<li><label><input name="" type="checkbox" value="" /><span>阿斯达</span></label></li>
                	<li><label><input name="" type="checkbox" value="" /><span>阿斯达</span></label></li>-->
                </ul>
            </div>
    </div>
    <div class="page3 fr">
        	<p>共有&nbsp;<span>3</span>&nbsp;件商品</p>
    </div>
    
        <div class="qhks fr">
        <p class="p1"><a class="a1" onclick="javascript:trc(1)" id="a_1_1"></a></p>
        <p class="p2"><a onclick="javascript:trc(2)" id="a_1_2"></a></p>
        </div>
        <div class="clear"></div>
    </div>
    
<div class="wedding" id="trc1">
            	<ul>
                                        					<li>
						<div class="pic"><a href="goods.php?id=222"><img src="images/201603/thumb_img/222_thumb_G_1457028339598.jpg" width="185" height="160"></a></div>
						<div class="wz">
                          <div class="jg">
                                            <span>58</span>
                                   <s>90</s>
                                        </div>
                        	<div class="tit"><a href="goods.php?id=222">恒源祥秋冬中老年纯棉宽松高腰裤</a></div>
                            <div class="an">
                            	<a class="gwc" href="javascript:addToCartShowDiv(222,1,'best');"><img src="themes/miqinew/images/car.png" />加入购物车</a>
                            	<a class="ljgm" href="goods.php?id=222">立即购买</a>
                                <div class="clear"></div>
                            </div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span>21</span></div>
                            	<div class="yshp_r">好评：<span>100%</span></div>
                                <div class="clear"></div>
                            </div>
                            <div class="sucess_joinCart" id="addtocartdialog_retui_222_best"></div>
                      	</div>
					</li>
                                         </ul>
                <div class="clear"></div>
            </div>
<div class="wedding" id="trc2" style="display:none">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="wedding_ta">
  <tr>
    <td width="200" rowspan="2" align="center"><a href="goods.php?id=222"><img src="images/201603/thumb_img/222_thumb_G_1457028339598.jpg" width="185" height="160" /></a></td>
    <td height="80" colspan="2" valign="top" class="wedding_td_2">
      <h2><a href="">恒源祥秋冬中老年纯棉宽松高腰裤</a></h2>
                  <p>58</p>
                </td>
    <td align="center" valign="bottom" class="wedding_td_4"><a href="javascript:addToCartShowDiv2(222,1,'best');">加入购物车</a></td>
    <td width="190" rowspan="2" align="center"><img src="themes/miqinew/images/yz_13.jpg" width="165" height="102" /><div class="sucess_joinCart" id="addtocartdialog_retui2_222_best"></div></td>
  </tr>
  <tr>
    <td width="210" align="left" valign="middle" class="wedding_td_3">
    <p><span>已售：</span>&nbsp;21</p> 
    </td>
    <td width="210" align="left" valign="middle" class="wedding_td_3"><p><span>好评：</span>&nbsp;100%</p></td>
    <td align="center" valign="middle" class="wedding_td_5"><a href="goods.php?id=222">立即购买</a></td>
    </tr>
</table>
                     <div class="clear"></div>
            </div>
            <div style="height:56px;">
            
<form name="selectPageForm" action="/guoa/category.php" method="get">
<div class="searchRight_paging">
 <div id="pager" class="pagebar">
  <p>共发现 3件</p>
  <div class="activity_all">
                      <span class="page_now">1</span>
                      <a href="category.php?id=152&amp;price_min=0&amp;price_max=0&amp;page=2&amp;sort=goods_id&amp;order=DESC">2</a>
                      <a href="category.php?id=152&amp;price_min=0&amp;price_max=0&amp;page=3&amp;sort=goods_id&amp;order=DESC">3</a>
            
  <a class="activity_next" href="category.php?id=152&amp;price_min=0&amp;price_max=0&amp;page=2&amp;sort=goods_id&amp;order=DESC">下一页</a>     
  
      </div>
</div>
</div>
</form>
<script type="Text/Javascript" language="JavaScript">
<!--
function selectPage(sel)
{
  sel.form.submit();
}
//-->
</script>
            </div>
            
<script>
	function trc(n)
	{
		if(n==1){
			document.getElementById('a_1_1').className = 'a1';
			document.getElementById('a_1_2').className = '';
			
			document.getElementById('trc1').style.display = '';
			document.getElementById('trc2').style.display = 'none';
		}else if(n==2){
			document.getElementById('a_1_1').className = '';
			document.getElementById('a_1_2').className = 'a1';
			
			document.getElementById('trc1').style.display = 'none';
			document.getElementById('trc2').style.display = '';
		}
	}
	</script>            
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
 
</body>
</html>