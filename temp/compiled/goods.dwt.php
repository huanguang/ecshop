
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="icon" href="images/favicon.gif" type="image/gif" >
<link href="css/common.css" type="text/css" rel="stylesheet" />
<link href="css/detail.css" type="text/css" rel="stylesheet" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="themes/miqinew/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="themes/miqinew/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="themes/miqinew/js/nav.js"></script>
<script type="text/javascript" src="themes/miqinew/js/modal.js"></script>
<script src="js/base.js" type=text/javascript></script>
<SCRIPT src="js/lib.js" type=text/javascript></SCRIPT>
<SCRIPT src="js/163css.js" type=text/javascript></SCRIPT>
<script type="text/javascript" src="themes/miqinew/js/tuan.js"></script>
<script type="text/javascript" src="themes/miqinew/js/js.js"></script>
<SCRIPT type=text/javascript>
  $(function(){ 
$('#star li').each(function(i){
  $(this).click(function(){
    $(this).prevAll().addClass('on');
    $(this).addClass('on');
    $(this).nextAll().removeClass('on');
  });
});   
     $(".jqzoom").jqueryzoom({
      xzoom:400,
      yzoom:400,
      offset:10,
      position:"right",
      preload:1,
      lens:1
    });
    $("#spec-list").jdMarquee({
      deriction:"left",
      width:350,
      height:56,
      step:2,
      speed:4,
      delay:10,
      control:true,
      _front:"#spec-right",
      _back:"#spec-left"
    });
    $("#spec-list img").bind("mouseover",function(){
      var src=$(this).attr("src");
      $("#spec-n1 img").eq(0).attr({
        src:src.replace("\/n5\/","\/n1\/"),
        jqimg:src.replace("\/n5\/","\/n0\/")
      });
      $(this).css({
        "border":"2px solid #ff6600",
        "padding":"1px"
      });
    }).bind("mouseout",function(){
      $(this).css({
        "border":"1px solid #ccc",
        "padding":"2px"
      });
    });       
  })
  </SCRIPT>
    <script type="text/javascript">
$(document).ready(function(){

  $("a.forgot").click(function(){
    $("#login-modal").modal("hide");
    $("#forgetform").modal({show:!0})
  });
  
  $("#signup-modal").modal("hide");
  $("#forgetform").modal("hide");
  $("#login-modal").modal("hide");
  $("#activation-modal").modal("hide");
  $("#setpassword-modal").modal("hide");
  
});
</script>
<link href="css/cityLayout.css" type="text/css" rel="stylesheet">
<style>
#nav .mod_subcate{top:0;}
.page{margin-top:0px;margin-bottom:50px;}
</style>

<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,left_goodslist.js')); ?>
</head>
<script>
function changeAtt(t) {
t.lastChild.checked='checked';
for (var i = 0; i<t.parentNode.childNodes.length;i++) {
        if (t.parentNode.childNodes[i].className == 'cattsel') {
            t.parentNode.childNodes[i].className = '';
        }
    }
t.className = "cattsel";

changePrice();
}
</script>
<body>
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








<?php echo $this->fetch('library/page_header.lbi'); ?>

<!--</div>-->

<div class="cur_wz">
 <?php echo $this->fetch('library/ur_here.lbi'); ?>
</div>



<div class="main_box">
<div class="main_box zdxq1">
<div class="zdxq2">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/css.css">
</head>

<body>

  <?php echo $this->fetch('library/zoomin.lbi'); ?>
  <form action="javascript:bool =1;addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY" >
    <div class="fxsc">
      <div class="sc"><a id="iddd" <?php if ($this->_var['shou'] == ''): ?> href="javascript:collect(<?php echo $this->_var['goods']['goods_id']; ?>)"<?php else: ?> href="javascript:delshou(<?php echo $this->_var['goods']['goods_id']; ?>);" class="on"<?php endif; ?>>收藏</a>   <!-- 已收藏 <a href="#" class="on">收藏</a> --></div>
        

      <div class="bdsharebuttonbox"><span style="float:left;line-height:28px;">分享：</span><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
    </div>
</div>
<div class="zdxq3">
<h2><?php echo $this->_var['goods']['goods_style_name']; ?></h2>
<h3><?php echo sub_str($this->_var['goods']['goods_brief'],15); ?></h3>
<div class="zdxq4">
<div class="zdxq4_1">
<p><span class="span_0">特&nbsp;价：</span><span class="span_1">￥<?php if ($this->_var['goods']['promote_price_org']): ?><?php echo $this->_var['goods']['promote_price_org']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?><font  id="ECS_SHOPPRICE"><?php echo $this->_var['new']['price']; ?></font></span><?php if ($this->_var['goods']['promote_price']): ?><span class="span_4">促销即将结束</span><?php endif; ?></p>
<p>
  <?php if ($this->_var['promotion']): ?>
                
                    <?php $_from = $this->_var['promotion']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?> 
                    <?php echo $this->_var['lang']['activity']; ?> 
                    <?php if ($this->_var['item']['type'] == "snatch"): ?> 
                    <a href="snatch.php" title="<?php echo $this->_var['lang']['snatch']; ?>" style="font-weight:100; color:#FF4560; text-decoration:none;">[<?php echo $this->_var['lang']['snatch']; ?>]</a><br/>  
                    <?php elseif ($this->_var['item']['type'] == "group_buy"): ?> 
                    <a href="group_buy.php" title="<?php echo $this->_var['lang']['group_buy']; ?>" style="font-weight:100; color:#FF4560; text-decoration:none;">[<?php echo $this->_var['lang']['group_buy']; ?>]</a> 
                    <?php elseif ($this->_var['item']['type'] == "auction"): ?> 
                  <a href="auction.php" title="<?php echo $this->_var['lang']['auction']; ?>" style="font-weight:100; color:#FF4560; text-decoration:none;">[<?php echo $this->_var['lang']['auction']; ?>]</a>  
                    <?php elseif ($this->_var['item']['type'] == "favourable"): ?> 
                    <a href="activity.php" title="<?php echo $this->_var['lang']['favourable']; ?>" style="font-weight:100; color:#FF4560; text-decoration:none;">[<?php echo $this->_var['lang']['favourable']; ?>]</a>
                    <?php endif; ?> 
                   <a href="<?php echo $this->_var['item']['url']; ?>" title="<?php echo $this->_var['lang'][$this->_var['item']['type']]; ?> <?php echo $this->_var['item']['act_name']; ?><?php echo $this->_var['item']['time']; ?>" style="font-weight:100; color:#FF4560;"><?php echo $this->_var['item']['act_name']; ?></a> <br/> 
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                 
                  <?php endif; ?> 
</p>
<p>近期售出：<span class="span_3"><?php echo $this->_var['goods']['sales_volume']; ?>瓶</span></p>
</div>
<div class="ljpl">
<p>累计评论<br>
<span class="ljpl_1"><?php echo $this->_var['id']; ?></span></p>
</div>
<div class="clear"></div>
</div>
<div class="psz">
  <span class="span_1">配&nbsp;&nbsp;送&nbsp;&nbsp;至：</span>
    <div class="cs" align="center fl">
  <input name="" id="start1" autocomplete="off" type="text" value="请选择/输入城市名称" class="city_input  inputFocus proCityQueryAll proCitySelAll" ov="请选择/输入城市名称">
</div>
  <span class="span_2">将于1天~3天内到达</span>
    <div class="clear"></div>

<div class="provinceCityAll">
  <div class="tabs clearfix">
    <ul>
      <li><a href="javascript:" class="current" tb="hotCityAll">热门城市</a></li>
      <li><a href="javascript:" tb="provinceAll">省份</a></li>
      <li><a href="javascript:" tb="cityAll" id="cityAll">城市</a></li>
      <li><a href="javascript:" tb="countyAll" id="countyAll">区县</a></li>
    </ul>
  </div>
  <div class="con">
    <div class="hotCityAll invis">
      <div class="pre"><a></a></div>
      <div class="list" style="border:none">
        <ul></ul>
      </div>
      <div class="next"><a class="can"></a></div>
    </div>
    <div class="provinceAll invis">
      <div class="pre"><a></a></div>
      <div class="list" style="border:none">
        <ul></ul>
      </div>
      <div class="next"><a class="can"></a></div>
    </div>
    <div class="cityAll invis">
      <div class="pre"><a></a></div>
      <div class="list" style="border:none">
        <ul></ul>
      </div>
      <div class="next"><a class="can"></a></div>
    </div>
    <div class="countyAll invis">
      <div class="pre"><a></a></div>
      <div class="list" style="border:none">
        <ul></ul>
      </div>
      <div class="next"><a class="can"></a></div>
    </div>
  </div>
</div>

</div>

<div class="xz">
<p class="xz_1">
   
                
                <?php $_from = $this->_var['specification']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('spec_key', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec_key'] => $this->_var['spec']):
?>
                
                <p class="catt" >
                <strong style="float:left; width:75px; font-size: 13px;color: #999; font-weight:normal; padding-top:10px;"><?php echo $this->_var['spec']['name']; ?>：</strong>
              
                     
                    <?php if ($this->_var['spec']['attr_type'] == 1): ?> 
                    <?php if ($this->_var['cfg']['goodsattr_style'] == 1): ?>
                    
                      <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?> 
                       
                      <a style=" text-decoration:none" <?php if ($this->_var['key'] == 0): ?>class="cattsel"<?php endif; ?> onclick="changeAtt(this)" href="javascript:;" name="<?php echo $this->_var['value']['id']; ?>" title="[<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>]"><?php echo $this->_var['value']['label']; ?>
                      <input style="display:none" id="spec_value_<?php echo $this->_var['value']['id']; ?>" type="radio" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" <?php if ($this->_var['key'] == 0): ?>checked<?php endif; ?> /></a> 
                      
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                   
                    <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                    <?php else: ?>
                    <select name="spec_<?php echo $this->_var['spec_key']; ?>" onchange="changePrice()">
                      <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                      <option label="<?php echo $this->_var['value']['label']; ?>" value="<?php echo $this->_var['value']['id']; ?>"><?php echo $this->_var['value']['label']; ?> <?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?><?php if ($this->_var['value']['price'] != 0): ?><?php echo $this->_var['value']['format_price']; ?><?php endif; ?></option>
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </select>
                    <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                    <?php endif; ?> 
                    <?php else: ?> 
                    <?php $_from = $this->_var['spec']['values']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'value');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['value']):
?>
                    <label for="spec_value_<?php echo $this->_var['value']['id']; ?>">
                      <input type="checkbox" name="spec_<?php echo $this->_var['spec_key']; ?>" value="<?php echo $this->_var['value']['id']; ?>" id="spec_value_<?php echo $this->_var['value']['id']; ?>" onclick="changePrice()" />
                      <?php echo $this->_var['value']['label']; ?> [<?php if ($this->_var['value']['price'] > 0): ?><?php echo $this->_var['lang']['plus']; ?><?php elseif ($this->_var['value']['price'] < 0): ?><?php echo $this->_var['lang']['minus']; ?><?php endif; ?> <?php echo $this->_var['value']['format_price']; ?>] </label>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <input type="hidden" name="spec_list" value="<?php echo $this->_var['key']; ?>" />
                    <?php endif; ?> 
                 
                
                 </p>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
               
                
</p>
<div class="sljj">
<span style="    float: left;
    margin-top: 3px;">选择数量：</span>
<div class="center_add_left"> <a onclick="buyNumber.minus()" href="javascript:;"><img src="themes/miqinew/images/jian.gif" data-bd-imgshare-binded="1"></a>
                    <input name="number" type="text" value="1" defaultnumber="1" onblur="changePrice()" id="product_num">
                    <input name="" type="hidden" value="<?php if ($this->_var['goods']['promote_price_org']): ?><?php echo $this->_var['goods']['promote_price_org']; ?><?php else: ?><?php echo $this->_var['goods']['shop_price']; ?><?php endif; ?>" id="product_nums">
          <a onclick="buyNumber.plus()" href="javascript:;"><img src="themes/miqinew/images/jia.gif" data-bd-imgshare-binded="1"></a></div>



          <script>
                       
                                // add by liuguichun 2011-7-19
                                var buyNumber = {
                                    maxNumber : 100,
                                    minNumber : 1,
                                    defaultNumber : function(){
                                        var defaultnumber = $('#product_num').attr('defaultnumber');
                                        defaultnumber = parseInt(defaultnumber)
                                        if(defaultnumber < 1){
                                            defaultnumber = 1;
                                        }
                                        return defaultnumber;
                                    },
                                                                                                                                    
                                    goodNumber : function(num){
                                        if(typeof(num) == 'number'){
                                            return $('#product_num').val(num);
                                        }else{
                                            return parseInt($('#product_num').val());
                                        }
                                                                                                                                        
                                    },
                                    plus : function(){
                                        var num = buyNumber.goodNumber() + buyNumber.defaultNumber();
                                        var product_num = document.getElementById('ECS_GOODS_AMOUNT_bak').value;
                                        if(num <= buyNumber.maxNumber){
                                            buyNumber.goodNumber(num);
                                        }
                                        document.getElementById('ECS_GOODS_AMOUNT').innerHTML = '￥'+num*product_num+'.00';
                                        //alert($('#ECS_GOODS_AMOUNT').children('span')[0]);
                                        
                                    },
                                    minus : function(){
                                        var num = buyNumber.goodNumber() - buyNumber.defaultNumber();
                                        if(num >= buyNumber.minNumber){
                                            buyNumber.goodNumber(num);
                                        }
                                        var product_num = document.getElementById('ECS_GOODS_AMOUNT_bak').value;
                                        if(num < 1){
                                            alert('数量不能小于1');
                                        }else{
                                        document.getElementById('ECS_GOODS_AMOUNT').innerHTML = '￥'+num*product_num+'.00';
                                        }
                                        
                                        
                                    }
                                                                                                                                    
                                }
                            </script>
<input type="hidden" value="" id="ECS_GOODS_AMOUNT_bak">
<span class="sljj_1">总价：<label id="total" class="sljj_2"><font id="ECS_GOODS_AMOUNT"></font></label></span>
</div>
<p class="jrgwc"><a href="javascript:addToCartShowDiv(<?php echo $this->_var['goods']['goods_id']; ?>)">加入购物车</a><a class="a_1" href="javascript:bool =1;addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)">立即购买</a></p>
<p class="wxts">温馨提示：1.该产品不支持7天无理由退货</p>
</div>
<div class="center_pop" id="addtocartdialog" style="display:none;">
               <div class="center_pop_close"><a href="javascript:void(0)"></a></div>
              <div class="center_pop_txt">
    
              </div>
<div class="center_pop_btn">
    <a href="flow.php"></a>
</div>
</form>
                            
                        </div>
</div>
<div class="zdxq5">
    <div class="zdxq5_1"><img src="data/brandlogo/<?php echo $this->_var['goods']['brand_logo']; ?>" width="180" height="80"></div>
    <div class="zdxq5_2">
        <p class="dpm"><?php echo $this->_var['goods']['goods_brand']; ?></p>
        <div class="pf">
        <?php echo $this->_var['goods']['brand_desc']; ?>
        </div>
    </div>
<div class="pf">
        <div class="xxpf">
          <span class="left">商品评分：</span>
                      <span class="xxpf_1"></span>
                      <span class="xxpf_1"></span>
                      <span class="xxpf_1"></span>
                      <span class="xxpf_3"></span>
                      <span class="xxpf_2"></span>
        <div class="clear"></div>
                </div>
        <!---<div class="xxpf1">
          <span class="left">近期售出<label style="color:#e63549">19065瓶</label></span> 
        </div>--->
      </div>
</div>
<div class="clear"></div>
</div>
</div>


<div class="zjzh product_content">
<?php echo $this->fetch('library/goods_fittings.lbi'); ?>
</div>


<div class="product_content"> 
  <div class="left">
    <div class="product_box_left_1"> 
      <h1>相似产品</h1> 
      <div class="product_box_left_2"> 
        <ul>
                            <?php $_from = $this->_var['related_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_73215900_1463700226');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_73215900_1463700226']):
?>
                            <li>
                                <div class="box_left_2_img"><a href="<?php echo $this->_var['goods_0_73215900_1463700226']['url']; ?>"><img src="<?php echo $this->_var['goods_0_73215900_1463700226']['goods_img']; ?>" width="82" height="82"></a></div>
                                <div class="zmc"><a href="<?php echo $this->_var['goods_0_73215900_1463700226']['url']; ?>"><?php echo htmlspecialchars($this->_var['goods_0_73215900_1463700226']['goods_name']); ?></a></div>
                                <div class="zjg"> <p class="zjg_left"> <span style="font-size:12px;">
                <?php if ($this->_var['goods_0_73215900_1463700226']['promote_price'] != ""): ?> 
                          <font class="shop_s">￥<?php echo $this->_var['goods_0_73215900_1463700226']['promote_price']; ?></font> 
                          <?php else: ?> 
                          <font class="shop_s">￥<?php echo $this->_var['goods_0_73215900_1463700226']['shop_price']; ?></font> 
                          <?php endif; ?> 
                
                                </p>

                                </div>
                            </li>
                   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                            </ul> 
      </div> 
    </div><div class="product_box_left_1"> 
      <h1>买过此酒的用户还买过</h1> 
      <div class="product_box_left_2"> 
        <ul>
                           <?php $_from = $this->_var['user_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_infos');if (count($_from)):
    foreach ($_from AS $this->_var['goods_infos']):
?>
              <?php $_from = $this->_var['goods_infos']['ass']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ass');if (count($_from)):
    foreach ($_from AS $this->_var['ass']):
?>
              <?php $_from = $this->_var['ass']['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['goods_list']):
?>
                            <li>
                                <div class="box_left_2_img"><a href="goods.php?id=<?php echo $this->_var['goods_list']['goods_id']; ?>"><img src="<?php echo $this->_var['goods_list']['goods_img']; ?>" width="82" height="82"></a></div>
                                <div class="zmc"><a href="goods.php?id=<?php echo $this->_var['goods_list']['goods_id']; ?>"><?php echo $this->_var['goods_list']['goods_name']; ?></a></div>
                                <div class="zjg"> <p class="zjg_left"> <span style="font-size:12px;">￥</span><?php echo $this->_var['goods_list']['shop_price']; ?></p>

                                </div>
                            </li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </ul> 
      </div> 
    </div>

    <script>
function caidan(n){
  for (j=1;j<=4;j++) {
    if (j == n) {
     if(document.getElementById("caidan_"+j)) document.getElementById("caidan_"+j).className = "caidanOn";
     if(document.getElementById("bodyb_"+j)) document.getElementById("bodyb_"+j).style.display = 'block';
          if(n == 4){
              var gid = 9612;
              $.get(
                      '/product.php?a=getSpComment&gid='+gid+'&p=1',
                      function(data){
                          $('.product2014_content_tamens  .list').html(data);
                          $(window).scrollTop($('.product_content .right').offset().top - 1);
                      },
                      'text'
              )
          }
      }
    else
    {
     if(document.getElementById("caidan_"+j)) document.getElementById("caidan_"+j).className = "caidanOff";
      if(document.getElementById("bodyb_"+j)) document.getElementById("bodyb_"+j).style.display = 'none';
  }
 }
}
</script>
  </div>

  <div class="right"> 
    <div class="product_nav" style="position: static; top: 0px; z-index: 9999;"> 
      <ul>
        <li class="caidanOn" id="caidan_1" onmousedown="caidan(1)">商品介绍</li>
        <li class="caidanOff" id="caidan_2" onmousedown="caidan(2)">用户评论</li>
        <li class="caidanOff" id="caidan_3" onmousedown="caidan(3)">交易记录</li>
        <li style="border-right:1px solid #e3e3e3" class="caidanOff" id="caidan_4" onmousedown="caidan(4)">售后保证</li>
      </ul> 
    </div> 

     
    <div class="product2014_content" id="bodyb_1" style="display: block;"> 
          
            <div class="type"> 
        <ul> 
          <li class="type_1 b">
          <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
        $this->_foreach['names']['iteration']++;
?>
          <?php if ($this->_var['property_group']): ?>
           
            <dl class="c"><dt class="t"><?php echo $this->_var['property_group']['name']; ?>：</dt><dd class="p"><?php echo $this->_var['property_group']['value']; ?></dd></dl>
            <?php if ($this->_foreach['names']['iteration'] % 3 == '0' && $this->_foreach['names']['iteration'] % 12 != '0'): ?>
          </li>
          <li class="type_1 b">
          <?php endif; ?>
          
          <?php if ($this->_foreach['names']['iteration'] % 12 == '0'): ?>
          </li>
        </ul> 
      </div>

              <div class="type"> 
        <ul> 
          <li class="type_1 b">
          <?php endif; ?>
          <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </li>
        </ul> 
      </div>
            
      <div class="content"> 
            <?php echo $this->_var['goods']['goods_desc']; ?>
 </div> 
    </div>


 
    <div class="product2014_content_2" id="bodyb_2" style="display: none;">
    <div class="c1"> 
        <div class="tit">用户评论：</div> 
      <div class="p1"> 
          <ul> 
            <li class="hpd"> <p>好评度</p> <h1><?php echo $this->_var['comment_percent']['haoping_percent']; ?>%</h1> </li>
            <li class="p_2"> 
              <div class="l"> 
                <dl class="k" style="    width: 200px;"><dt style="float:left">好评(<?php echo $this->_var['comment_percent']['haoping_percent']; ?>%)</dt> <dd> <div class="pp_load"><span style="background:#f2cd00; width:<?php echo $this->_var['comment_percent']['haoping_percent']; ?>%; height:8px; float:left"></span></div> </dd></dl>
                <dl class="k"><dt style="float:left">中评(<?php echo $this->_var['comment_percent']['zhongping_percent']; ?>%)</dt> <dd> <div class="pp_load"><span style="background:#f2cd00; width:<?php echo $this->_var['comment_percent']['haoping_percent']; ?>%; height:8px; float:left"></span></div> </dd> </dl>
                <dl class="k"> <dt style="float:left">差评(&nbsp;<?php echo $this->_var['comment_percent']['chaping_percent']; ?>%&nbsp;)</dt> <dd> <div class="pp_load"><span style="background:#f2cd00; width:<?php echo $this->_var['comment_percent']['haoping_percent']; ?>%; height:8px; float:left"></span></div> </dd> </dl>
              </div> 
              <div class="r">共<span style="color:#d83d3a"><?php echo $this->_var['id']; ?></span>条评论</div> 
            </li>
            <li class="p_a"><span class="an" style="cursor: pointer;"><a  id="showcommentform" data-toggle="modal" href="javascript:void(0);">我要评论</a>

    
            </span></li> 
          </ul>
                    
        </div> 
      </div> 
      <div class="comment_body " >

        <?php echo $this->fetch('library/comments.lbi'); ?>
          </div>
      </div>
    <script type="text/javascript">jQuery(".slideTxtBox").slide({trigger:"click"});</script>

<div class="product2014_content_3" id="bodyb_3" style="display: none;"> 
    <?php echo $this->fetch('library/bought_note_guide.lbi'); ?>
 </div>
 
    <div class="product2014_content_3" id="bodyb_4" style="display: none;"> 
      <div class="con"> 
        <?php echo $this->_var['goods']['goods_shipai']; ?>
      </div> 
    </div> 
 
  </div> 
</div>

<script type="text/javascript" src="themes/miqinew/js/public.js"></script>


<?php echo $this->fetch('library/page_footer.lbi'); ?>
<script type="text/javascript">

var goods_id = <?php echo $this->_var['goods_id']; ?>;
var goodsattr_style = <?php echo empty($this->_var['cfg']['goodsattr_style']) ? '1' : $this->_var['cfg']['goodsattr_style']; ?>;
var gmt_end_time = <?php echo empty($this->_var['promote_end_time']) ? '0' : $this->_var['promote_end_time']; ?>;
<?php $_from = $this->_var['lang']['goods_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var goodsId = <?php echo $this->_var['goods_id']; ?>;
var now_time = <?php echo $this->_var['now_time']; ?>;


onload = function(){
  changePrice();
  fixpng();
  try {onload_leftTime();}
  catch (e) {}
}

/**
 * 点选可选属性或改变数量时修改商品价格的函数
 */
function changePrice()
{

  var attr = getSelectedAttributes(document.forms['ECS_FORMBUY']);
  var qty = document.forms['ECS_FORMBUY'].elements['number'].value;

  Ajax.call('goods.php', 'act=price&id=' + goodsId + '&attr=' + attr + '&number=' + qty, changePriceResponse, 'GET', 'JSON');
}

/**
 * 接收返回的信息
 */
function changePriceResponse(res)
{
  if (res.err_msg.length > 0)
  {
    alert(res.err_msg);
  }
  else
  {
    document.forms['ECS_FORMBUY'].elements['number'].value = res.qty;

    if (document.getElementById('ECS_GOODS_AMOUNT'))
      document.getElementById('ECS_GOODS_AMOUNT').innerHTML = '￥'+res.result;
    document.getElementById('ECS_GOODS_AMOUNT_bak').value = res.result;
  }
}

</script>
</body>
</html>