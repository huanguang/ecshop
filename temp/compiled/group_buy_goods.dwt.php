<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>



<link rel="shortcut icon" href="favicon.ico" />
<link href="themes/miqinew/css/common.css" type="text/css" rel="stylesheet" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<link href="css/detail.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="themes/miqinew/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="themes/miqinew/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="themes/miqinew/js/nav.js"></script>
<script type="text/javascript" src="themes/miqinew/js/modal.js"></script>
<script type="text/javascript" src="themes/miqinew/js/tuan.js"></script>
<script type="text/javascript" src="themes/miqinew/js/js.js"></script>
<script type="text/javascript" src="themes/miqinew/js/base.js"></script>
<script type="text/javascript" src="themes/miqinew/js/lib.js"></script>
<script type="text/javascript" src="themes/miqinew/js/163css.js"></script>
<SCRIPT type=text/javascript>
  $(function(){     
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

<style>
#nav .mod_subcate{top:0;}
.page{margin-top:0px;margin-bottom:50px;}
</style>

<script type="text/javascript">
  <?php $_from = $this->_var['lang']['js_languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</script>
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
</head>

<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>


  <div class="cur_wz"> <?php echo $this->fetch('library/ur_here.lbi'); ?> </div>




<div class="main_box">
<div class="main_box zdxq1">
<div class="zdxq2">
 <?php echo $this->fetch('library/zoomin.lbi'); ?>
</div>
<div class="zdxq3">
<form action="group_buy.php?act=buy" method="post" name="ECS_FORMBUY" id="ECS_FORMBUY">
<h2><?php echo $this->_var['gb_goods']['goods_name']; ?></h2>
<h3><?php echo sub_str($this->_var['brand_desc'],15); ?></h3>
<div class="zdxq4">
<div class="zdxq4_1">
                <div class="pro_time" yyear="2015" ymonth="7" yday="22" yhour="18" yminute="">
                  <p style="line-height:20px;">
          <img src="themes/miqinew/images/ico_sz.png" width="20" height="20" />
<i class="time_icon comm"></i>剩余时间：<font class="leaveTime endtime" value="<?php echo $this->_var['goods_list']['end_time']; ?>" showday="show" ></font>
          </p>
                    <span></span>
                 </div>
<p><span class="span_0">特&nbsp;价：</span><span class="span_1">￥<?php echo $this->_var['gb_goods']['shop_price']; ?></span>团购即将结束</p>
</div>
<div class="ljpl">
<p>累计评论<br>
<span class="ljpl_1"><?php echo $this->_var['comment']; ?></span></p>
</div>
<div class="clear"></div>
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
<span style="float: left;
    margin-top: 3px;">选择数量：</span><input type="hidden" value="<?php echo $this->_var['goods_list']['act_id']; ?>" id="tuangou"><input type="hidden" value="0" id="xiaogou">
<div class="center_add_left"> <a onclick="buyNumber.minus()" href="javascript:;"><img src="themes/miqinew/images/jian.gif" data-bd-imgshare-binded="1"></a><input name="number" type="text" value="1" defaultnumber="1" onblur="changePrice()" id="product_num">
                    <input name="" type="hidden" value="<?php echo $this->_var['gb_goods']['shop_price']; ?>" id="product_nums">
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
                                        var product_num = document.getElementById('product_nums').value;
                                        var tuangou_id = document.getElementById('tuangou').value;
                                        $.ajax({
                                         type: "POST",
                                         url: "group_buy.php",
                                         data: {id:tuangou_id, act:'chaxun'},
                                         dataType: "json",
                                         success: function(data){
                                                        
                                                        if(data < num){
                                                            alert("已超出限购数量！！！");
                                                        }else{
                                                            if(num <= buyNumber.maxNumber){
                                                              buyNumber.goodNumber(num);
                                                          }
                                                          document.getElementById('ECS_SHOPPRICEs').innerHTML = '￥'+num*product_num+'.00';
                                                        }
                                                    }
                                       });
                                        
                                        
                                    },
                                    minus : function(){
                                        var num = buyNumber.goodNumber() - buyNumber.defaultNumber();
                                        if(num >= buyNumber.minNumber){
                                            buyNumber.goodNumber(num);
                                        }
                                        var product_num = document.getElementById('product_nums').value;
                                        if(num < 1){
                                            alert('团购数量不能小于1');
                                        }else{
                                        document.getElementById('ECS_SHOPPRICEs').innerHTML = '￥'+num*product_num+'.00';
                                        }
                                        
                                    }
                                                                                                                                    
                                }
                            </script>
<span class="sljj_1">总价：<label id="total" class="sljj_2"><font id="ECS_SHOPPRICEs">￥<?php echo $this->_var['gb_goods']['shop_price']; ?></font></label></span>
</div><input type="hidden" name="group_buy_id" value="<?php echo $this->_var['group_buy']['group_buy_id']; ?>" />
<p class="jrgwc"><input type="submit" style="vertical-align:middle; background:url(themes/miqinew/images/H01.png) no-repeat; height:33px; overflow:hidden; border:0; margin:0; padding:0; width:126px; cursor:pointer;" value=" " id="ToBuy" />
<input type="submit" style="vertical-align:middle; background:url(themes/miqinew/images/H02.png) no-repeat; height:33px; overflow:hidden; border:0; margin:0; padding:0; width:126px; cursor:pointer;" value=" " id="ToBuy" />
</p>

<p class="wxts">温馨提示：1.该产品不支持7天无理由退货</p>
</div>
</form>
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
        <div class="xxpf1">
          <span class="left">近期售出<label style="color:#e63549"><?php echo $this->_var['xiaoliang']; ?>瓶</label></span> 
        </div> 
      </div>
</div>
<script type="text/javascript">

  
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
          var str = '<strong class="tcd-d">'+myD+'</strong>天<strong class="tcd-h">'+myH_show+'</strong>小时<strong class="tcd-m">'+myM+'</strong>分<strong class="tcd-s">'+myS+'</strong>秒';
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
<div class="clear"></div>
</div>
</div>



<div class="product_content"> 
  <div class="left">
    <div class="product_box_left_1"> 
      <h1>相似产品</h1> 
      <div class="product_box_left_2"> 
        <ul>
                            <?php $_from = $this->_var['related_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                            <li>
                                <div class="box_left_2_img"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" width="82" height="82"></a></div>
                                <div class="zmc"><a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a></div>
                                <div class="zjg"> <p class="zjg_left"> <span style="font-size:12px;">
                <?php if ($this->_var['goods']['promote_price'] != ""): ?> 
                          <font class="shop_s">￥<?php echo $this->_var['goods']['promote_price']; ?></font> 
                          <?php else: ?> 
                          <font class="shop_s">￥<?php echo $this->_var['goods']['shop_price']; ?></font> 
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
              <?php $_from = $this->_var['ass']['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_list_0_52616000_1463825735');if (count($_from)):
    foreach ($_from AS $this->_var['goods_list_0_52616000_1463825735']):
?>
                            <li>
                                <div class="box_left_2_img"><a href="goods.php?id=<?php echo $this->_var['goods_list_0_52616000_1463825735']['goods_id']; ?>"><img src="<?php echo $this->_var['goods_list_0_52616000_1463825735']['goods_img']; ?>" width="82" height="82"></a></div>
                                <div class="zmc"><a href="goods.php?id=<?php echo $this->_var['goods_list_0_52616000_1463825735']['goods_id']; ?>"><?php echo $this->_var['goods_list_0_52616000_1463825735']['goods_name']; ?></a></div>
                                <div class="zjg"> <p class="zjg_left"> <span style="font-size:12px;">￥</span><?php echo $this->_var['goods_list_0_52616000_1463825735']['shop_price']; ?></p>

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
        <li style="border-right:1px solid #e3e3e3" class="caidanOff" id="caidan_3" onmousedown="caidan(3)">运输包装</li>
      </ul> 
    </div> 

     
    <div class="product2014_content" id="bodyb_1" style="display: block;"> 
          
            <div class="type"> 
        <ul> 
          <li class="type_1 b">
          <?php $_from = $this->_var['properties']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'property_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['property_group']):
?>
           
            <dl class="c"><dt class="t"><?php echo $this->_var['property_group']['name']; ?>：</dt><dd class="p"><?php echo $this->_var['property_group']['value']; ?></dd></dl>
            <?php if ($this->_var['key'] % 3 == '0'): ?>
          </li>
          <li class="type_1 b">
          <?php endif; ?>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </li>
        </ul> 
      </div>
            
      <div class="content"> 
            <?php echo $this->_var['gb_goods']['goods_desc']; ?>
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
              <div class="r">共<span style="color:#d83d3a"><?php echo $this->_var['comment']; ?></span>条评论</div> 
            </li>
            <li class="p_a"><span class="an" style="cursor: pointer;"><a  id="showcommentform" data-toggle="modal" href="javascript:void(0);">我要评论</a>

    
            </span></li> 
          </ul>
<div class="modal" id="login-modal" style="display:none;">
<div class="popup popup_580 dialog_box" style="z-index: 999; width: 580px; height: 432px; position: fixed;display: block;" id="commentPop">
    <div class="title"><em>添加评论</em><a href="javascript:;" data-dismiss="modal">×</a></div>
    <div class="mn">
        <em>评分：</em>
        <div class="score_star" id="star">
            <ul class="star">
                <li class="on"><a>1</a></li>
                <li class="on"><a>2</a></li>
                <li class="on"><a>3</a></li>
                <li class="on"><a>4</a></li>
                <li class="on"><a>5</a></li> 
            </ul>
            <span id="msg"><strong>5 分</strong> (非常满意)</span>
            <p style="display: none; left: -29px;"><em><b>5</b> 分 非常满意</em></p>
            <input type="hidden" id="score" value="5">
        </div>
    </div>
    <div class="mn">
        <em>添加图片：</em>
        <a href=""><img src="themes/miqinew/images/fb_tj.png" width="50" height="50" /></a>
    </div>
    <div class="mn">
        <em>评价：</em>
        <textarea name="" cols="" rows=""></textarea>
        <em style="display:none;color:#FF0000; margin-left:70px;">请输入内容！</em>
    </div>
    <div class="text-3">填写您对此葡萄酒的心得，已输入<em id="studyNum" style="color:#d40e03;font-style:normal;">0</em>个字，例如口味等最多输入<em style="color:color:#d40e03;font-style:normal;">100</em>字</div>
    <div class="bt">
        <span style="float:left; margin-top:10px"><input name="" type="checkbox" value="" style=" float:left; margin:2px 5px 0 80px" />使用匿名评论</span>
        <a href="javascript:;" class="bt-3" id="commentBtn">提交</a>
    </div>
<div class="dialog_close"></div></div>    
    </div>                     
        </div> 
      </div> 
      <div class="comment_body " >
               
                <?php echo $this->fetch('library/comments.lbi'); ?> 
                </div>
      
    </div>
    <script type="text/javascript">jQuery(".slideTxtBox").slide({trigger:"click"});</script> 
</div>


               






 
    <div class="product2014_content_3" id="bodyb_3" style="display: none;"> 
      <div class="con"> 
        <div class="tit">运输和包装：</div> 
      <div class="c"> 
          <?php echo $this->_var['gb_goods']['goods_shipai']; ?> 
        </div>
      </div> 
    </div> 
 
  </div> 
</div>


<?php echo $this->fetch('library/page_footer.lbi'); ?>
</html>
