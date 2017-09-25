<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="<?php echo $this->_var['keywords']; ?>" />
<meta name="Description" content="<?php echo $this->_var['description']; ?>" />

<title><?php echo $this->_var['page_title']; ?></title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />

<script type="text/javascript" src="themes/miqinew/js/orderInfo.min.js"></script>

<script type="text/javascript" src="themes/miqinew/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="themes/miqinew/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="themes/miqinew/js/nav.js"></script>

<link href="themes/miqinew/css/common.css" type="text/css" rel="stylesheet" />
<link href="themes/miqinew/css/cart.css" type="text/css" rel="stylesheet" />

<link href="themes/miqinew/css/cityLayout.css" type="text/css" rel="stylesheet">

<style>
#nav .mod_subcate{top:0;}
.city_input{width:302px; background:url(themes/miqinew/images/ts-indexcity1.png) no-repeat center;}
.title {
    background: #f5f5f5 none repeat scroll 0 0;
    border-bottom: 1px solid #c81623;
    color: #333;
    font-size: 12px;
    height: 40px;
    line-height: 40px;
    margin-bottom: 15px;
    overflow: hidden;
    padding: 0 10px;}
.title em {
    color: #d40e03;
    display: block;
    float: left;
    font-size: 14px;
    font-style: normal;
    font-weight: bold;}
 .title a {
    color: #999;
    display: block;
    float: right;
    font-size: 20px;
    text-decoration: none;} 
  .selected{border:1px solid #b1191a} 
  .selected .span1{display:block}
  .selected .a_1{display:block; float:right}
  .selected em{display:block; width:100px ; float:right}
</style>


<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,shopping_flow.js,transport.js,utils.js')); ?>
</head>
<body>
<div class="bodycart_v ">
<?php if ($this->_var['url'] == '1'): ?><?php echo $this->fetch('library/page_header_buy2.lbi'); ?>
    
<?php elseif ($this->_var['url'] == '2'): ?>
  <?php echo $this->fetch('library/page_header_buy3.lbi'); ?>
  <link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<?php else: ?>
<?php echo $this->fetch('library/page_header_buy.lbi'); ?>
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
<?php endif; ?>

</div>


<div class="cur_wz">
  <?php echo $this->fetch('library/ur_here.lbi'); ?>
</div>



<div class="blank"></div>
<div class="block_s">
  <?php if ($this->_var['step'] == "cart"): ?>

  
  <?php echo $this->smarty_insert_scripts(array('files'=>'showdiv.js')); ?>
  <script type="text/javascript">
  <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </script>




<div class="main_box">
<div class="cart_con">
<div class="tit">
<span style="float:left">我的购物车</span>
<span style="margin-left:18px; font-size:12px; color:#666; float:left; display:none;">现在<a style="color:#3772ba" href="#" target="_blank">登录</a>购物车商品将永久保存</span> 

</div>
<div class="con">
  <div class="top">
    <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
            <tr>
        <td width="32" height="100%" align="right" valign="middle">
                <input name="selAll" type="checkbox" value="all" onclick="chgGoods(this)" checked="checked"></td>
        <td width="6%" height="100%" align="left" valign="middle">全选</td>
        <td width="25%" align="center" valign="middle">商品名称</td>
        <?php if ($this->_var['show_goods_attribute'] == 1): ?>
        <td width="15%" align="center">属性</td>
        <?php endif; ?>
        <td width="10%" align="center">单价（元）</td>
        <td width="10%" align="center">数量</td>
        <td width="15%" align="center">小计</td>
        <td width="15%" align="center">操作</td>
      </tr>
    </tbody>
        </table>
  </div>
  <ul id="cartList">
    <form id="formCart" name="formCart" method="post" action="flow.php">


    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
            <li class="list1">
      <div class="l1"><input type="checkbox" checked="checked"></div>
      <div class="l2">
        <span style="float:left"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><img width="75" height="75" src="<?php echo $this->_var['goods']['goods_thumb']; ?>"></a></span>
        <span style="float:left"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><?php echo sub_str($this->_var['goods']['goods_name'],20); ?></a></span>
      </div>
      <?php if ($this->_var['show_goods_attribute'] == 1): ?>
              
      <div class="al7"><?php echo nl2br($this->_var['goods']['goods_attr']); ?>
            
            <div class="a17_div" style="display:none;"><span>修改</span>
                <div class="a17_div1">
              <div style="width:50%; float:left">年份：</div>
    <div class="td_1" style="width:50%; float:right"> 
      <a class="a1" href="">1999</a>
      <a href="javascript:;">1997</a>
    </div>
    <div class="clear"></div>
    <div style="margin-top:10px;"><a class="a2" href="">确定</a></div>
</div>

                
            </div>
               
            </div>
      <?php endif; ?>
      <div class="l4"><?php echo $this->_var['goods']['goods_price']; ?><br><?php if ($this->_var['goods']['is_shipping'] == '1'): ?><span>包邮</span><?php endif; ?></div>
      <div class="l3" style="position: relative;">

      <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['is_gift'] == 0 && $this->_var['goods']['parent_id'] == 0): ?>
      <a href="javascript:void(0)" onclick="changenum(<?php echo $this->_var['goods']['rec_id']; ?>,-1)" class="sub" style="position: absolute;top: 39px;left: -28px;"><img src="themes/miqinew/images/gwc_07.jpg" style="vertical-align:middle;margin-bottom: 7px;" /></a>
                 <input type="text" name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" size="1"class="in" style="text-align:center "    onchange="change_goods_number(<?php echo $this->_var['goods']['rec_id']; ?>,this.value)"/>
      <a  href="javascript:void(0)" onclick="changenum(<?php echo $this->_var['goods']['rec_id']; ?>,1)" class="add" style="position: absolute;top: 39px;left: 52px;"><img src="themes/miqinew/images/gwc_09.jpg" style="vertical-align:middle;margin-bottom: 7px;"/></a>
                <?php else: ?>
                <?php echo $this->_var['goods']['goods_number']; ?>
                <?php endif; ?>
      </div>

      <div class="l5" id="goods_subtotal_<?php echo $this->_var['goods']['rec_id']; ?>"><?php echo $this->_var['goods']['subtotal']; ?></div>
      
            <div class="l6">
              <?php if ($_SESSION['user_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
            <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_to_collect&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; ">移入收藏夹</a><br>
              <?php endif; ?> 
            <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>';">删除</a></div>

  </li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


<input type="hidden" name="step" value="update_cart" />
      
    </form>
  </ul>

<div class="bt">
  <ul>
    <li class="bg1"><a href="javascript:;">删除选中商品</a></li>
    <li class="bg2"><a href="javascript:location.href='flow.php?step=clear';">清空购物车</a></li>
    <li class="bg3"><a href="javascript:location.href='index.php';">返回继续购物</a></li>
  </ul>
</div>
<div class="btm">
  <p class="wz" >
    <span style="margin-right:16px" id="cartNum">商品数量：<b id="ECS_CARTINFO"><?php 
$k = array (
  'name' => 'cart_info_number',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?>件</b></span>    
    <span style="margin-right:16px" id="cartJifen">赠送积分：<b><?php echo $this->_var['your_discount']; ?>分</b></span>   
    <span id="cartPrice">商品总金额（不含运费）：<em id="total_desc"><?php echo $this->_var['shopping_money']; ?></em></span> &nbsp;&nbsp;
      </p>
  <p class="wz"><a href="flow.php?step=checkout"><img src="themes/miqinew/images/gwc_14.jpg" title="结算" style="cursor: pointer;"></a></p>
</div>
</div>
<div class="clear"></div>
</div>
</div>

























  
  
  <?php echo $this->smarty_insert_scripts(array('files'=>'showdiv.js')); ?>
  <script type="text/javascript">
  <?php $_from = $this->_var['lang']['password_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </script>
  
<Div class="nstep_products " style="display:none;">
  <div class="flowBox" style="display:none;">
        <form id="formCart" name="formCart" method="post" action="flow.php">
           <table width="100%" >
            <tr>
              <th bgcolor="#ffffff" colspan="2" style="font-weight:bold;" ><?php echo $this->_var['lang']['goods_name']; ?></th>
      <?php if ($this->_var['show_goods_attribute'] == 1): ?>
              <th bgcolor="#ffffff" style="text-align: center;font-weight:bold;" width="110"><?php echo $this->_var['lang']['goods_attr']; ?></th>
              <?php endif; ?>
              <?php if ($this->_var['show_marketprice']): ?>
              <th bgcolor="#ffffff" style="text-align: center;font-weight:bold;" width="110"><?php echo $this->_var['lang']['market_prices']; ?></th>
              <?php endif; ?>
              <th bgcolor="#ffffff" style="text-align: center;font-weight:bold;" width="110"><?php echo $this->_var['lang']['shop_prices']; ?></th>
              <th bgcolor="#ffffff" style="text-align: center;font-weight:bold;" width="110"><?php echo $this->_var['lang']['number']; ?></th>
              <th bgcolor="#ffffff" style="text-align: center;font-weight:bold;" width="110"><?php echo $this->_var['lang']['subtotal']; ?></th>
              <th bgcolor="#ffffff" style="font-weight:bold;" width="80"><?php echo $this->_var['lang']['handle']; ?></th>
            </tr>
            <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
            <tr id="tr_goods_<?php echo $this->_var['goods']['rec_id']; ?>" class="cartList">
              <td bgcolor="#ffffff"  colspan="2"  class="nstep_pbox"  >
                <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
                  <?php if ($this->_var['show_goods_thumb'] == 1): ?>
                   <p class="nstep_name"> <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a></p>
                  <?php elseif ($this->_var['show_goods_thumb'] == 2): ?>
    <p class="f_l"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" border="0" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" width="78" height="78" /></a></p>
                  <?php else: ?>
      <p class="f_l"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" border="0" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" width="78" height="78"/></a></p>
                   <p class="nstep_name"> <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a></p>
                  <?php endif; ?>
                  <?php if ($this->_var['goods']['parent_id'] > 0): ?>
                  <span style="color:#ff4560">（<?php echo $this->_var['lang']['accessories']; ?>）</span>
                  <?php endif; ?>
                  <?php if ($this->_var['goods']['is_gift'] > 0): ?>
                  <span style="color:#ff4560">（<?php echo $this->_var['lang']['largess']; ?>）</span>
                  <?php endif; ?>
                <?php elseif ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['extension_code'] == 'package_buy'): ?>
                  <a href="javascript:void(0)" onclick="setSuitShow(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['goods']['goods_name']; ?><span style="color:#ff4560;">（<?php echo $this->_var['lang']['remark_package']; ?>）</span></a>
                  <div id="suit_<?php echo $this->_var['goods']['goods_id']; ?>" style="display:none">
                      <?php $_from = $this->_var['goods']['package_goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'package_goods_list');if (count($_from)):
    foreach ($_from AS $this->_var['package_goods_list']):
?>
                        <a href="goods.php?id=<?php echo $this->_var['package_goods_list']['goods_id']; ?>" target="_blank" class="f6"><?php echo $this->_var['package_goods_list']['goods_name']; ?></a><br />
                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                  </div>
                <?php else: ?>
                  <?php echo $this->_var['goods']['goods_name']; ?>
                <?php endif; ?>
              </td>
              <?php if ($this->_var['show_goods_attribute'] == 1): ?>
              <td align="center" bgcolor="#ffffff"><?php echo nl2br($this->_var['goods']['goods_attr']); ?></td>
              <?php endif; ?>
              <?php if ($this->_var['show_marketprice']): ?>
              <td align="center" bgcolor="#ffffff"><?php echo $this->_var['goods']['market_price']; ?></td>
              <?php endif; ?>
              <td align="center" bgcolor="#ffffff"><?php echo $this->_var['goods']['goods_price']; ?></td>
              <td align="center" bgcolor="#ffffff">
              
                <?php if ($this->_var['goods']['goods_id'] > 0 && $this->_var['goods']['is_gift'] == 0 && $this->_var['goods']['parent_id'] == 0): ?>
      <a href="javascript:void(0)" onclick="changenum(<?php echo $this->_var['goods']['rec_id']; ?>,-1)" class="sub"><img src="themes/miqinew/images/sub.png" style="vertical-align:middle;margin-bottom: 7px;" /></a>
                 <input type="text" name="goods_number[<?php echo $this->_var['goods']['rec_id']; ?>]" id="goods_number_<?php echo $this->_var['goods']['rec_id']; ?>" value="<?php echo $this->_var['goods']['goods_number']; ?>" size="1"class="shuliang" style="text-align:center "    onchange="change_goods_number(<?php echo $this->_var['goods']['rec_id']; ?>,this.value)"/>
      <a  href="javascript:void(0)" onclick="changenum(<?php echo $this->_var['goods']['rec_id']; ?>,1)" class="add"><img src="themes/miqinew/images/add.png" style="vertical-align:middle;margin-bottom: 7px;"/></a>
                <?php else: ?>
                <?php echo $this->_var['goods']['goods_number']; ?>
                <?php endif; ?>
               
              </td>
              <td align="center" bgcolor="#ffffff" id="goods_subtotal_<?php echo $this->_var['goods']['rec_id']; ?>" class="chkprice "><?php echo $this->_var['goods']['subtotal']; ?></td>
              <td align="center" bgcolor="#ffffff" >
                <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_goods&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; " class="chkprice "><?php echo $this->_var['lang']['drop']; ?></a>
                <?php if ($_SESSION['user_id'] > 0 && $this->_var['goods']['extension_code'] != 'package_buy'): ?>
             <a href="javascript:if (confirm('<?php echo $this->_var['lang']['drop_goods_confirm']; ?>')) location.href='flow.php?step=drop_to_collect&amp;id=<?php echo $this->_var['goods']['rec_id']; ?>'; " class="chkprice "><?php echo $this->_var['lang']['drop_to_collect']; ?></a>
                <?php endif; ?>            </td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </table>
          <table width="100%" >
            <tr>
              <td bgcolor="#ffffff" id="total_desc" class="nstep1_count">
              <div>
             <span style="text-align:left;font-size:12px;float:left;">  <input type="button" value="" class="bnt_blue_q" onclick="location.href='flow.php?step=clear'" /></span>
             <div  style="padding:0;border:none;float:right;">
             <?php if ($this->_var['discount'] > 0): ?>
            <?php echo $this->_var['your_discount']; ?><br />
            <?php endif; ?>
            <?php echo $this->_var['shopping_money']; ?>
            </div>
              </div>
               
              </td>
            </tr>
          </table>
          <input type="hidden" name="step" value="update_cart" />
        </form>
        <table width="100%" >
          <tr>
            <td colspan="3" width="60%"></td>
            <td bgcolor="#ffffff" align="right" class="nstep1_btn" >
            <div class="orderaction">
            <a class="cartsubmit" href="flow.php?step=checkout"></a> <a class="continueFind" href="./"></a>
            </div>
            
            </td>
          </tr>
        </table>
        <script type="text/javascript">
            function changenum(rec_id, diff)
            {
                var goods_number =Number($('#goods_number_' + rec_id).val()) + Number(diff);    
				if(goods_number < 1)
				{
					alert("购买数量不能少于1件");	
				}
				else
				{
					change_goods_number(rec_id,goods_number);
				}
            }
            function change_goods_number(rec_id, goods_number)
            {     
               Ajax.call('flow.php?step=ajax_update_cart', 'rec_id=' + rec_id +'&goods_number=' + goods_number, change_goods_number_response, 'POST','JSON');                
            }
            function change_goods_number_response(result)
            {               
                if (result.error == 0)
                {
                    var rec_id = result.rec_id;
                    $('#goods_number_' +rec_id).val(result.goods_number);//更新数量
                    $('#goods_subtotal_' +rec_id).html(result.goods_subtotal);//更新小计
                    if (result.goods_number <= 0)
                    {// 数量为零则隐藏所在行
                        $('#tr_goods_' +rec_id).style.display = 'none';
                        $('#tr_goods_' +rec_id).innerHTML = '';
                    }
                    $('#total_desc').html(result.flow_info);//更新合计
                    if ($('ECS_CARTINFO'))
                    {//更新购物车数量
                       $('#ECS_CARTINFO').html(result.cart_info);
                    }
                }
                else if (result.message != '')
                {
                    alert(result.message);
                }                
            }
        </script>
       <?php if ($_SESSION['user_id'] > 0): ?>
       <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js')); ?>
       <script type="text/javascript" charset="utf-8">
        function collect_to_flow(goodsId)
        {
          var goods        = new Object();
          var spec_arr     = new Array();
          var fittings_arr = new Array();
          var number       = 1;
          goods.spec     = spec_arr;
          goods.goods_id = goodsId;
          goods.number   = number;
          goods.parent   = 0;
          Ajax.call('flow.php?step=add_to_cart', 'goods=' + $.toJSON(goods), collect_to_flow_response, 'POST', 'JSON');
        }
        function collect_to_flow_response(result)
        {
          if (result.error > 0)
          {
            // 如果需要缺货登记，跳转
            if (result.error == 2)
            {
              if (confirm(result.message))
              {
                location.href = 'user.php?act=add_booking&id=' + result.goods_id;
              }
            }
            else if (result.error == 6)
            {
              openSpeDiv(result.message, result.goods_id);
            }
            else
            {
              alert(result.message);
            }
          }
          else
          {
            location.href = 'flow.php';
          }
        }
      </script>
  </div>
  </Div>
    <div class="blank"></div>
  <?php endif; ?>

  <?php if ($this->_var['collection_goods']): ?>
  <div class="flowBox"   style="display:none;">
    <h6><span><?php echo $this->_var['lang']['label_collection']; ?></span></h6>
    <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
      <?php $_from = $this->_var['collection_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
          <tr>
            <td bgcolor="#ffffff"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>" class="f6"><?php echo $this->_var['goods']['goods_name']; ?></a></td>
            <td bgcolor="#ffffff" align="center" width="100"><a href="javascript:addToCart(<?php echo $this->_var['goods']['goods_id']; ?>)" class="f6"><?php echo $this->_var['lang']['collect_to_flow']; ?></a></td>
          </tr>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </table>
      <?php endif; ?>
  </div>
    <div class="blank5"></div>
  <?php endif; ?>

  <?php if ($this->_var['fittings_list']): ?>
  <?php echo $this->smarty_insert_scripts(array('files'=>'transport.js')); ?>
  <script type="text/javascript" charset="utf-8">
  function fittings_to_flow(goodsId,parentId)
  {
    var goods        = new Object();
    var spec_arr     = new Array();
    var number       = 1;
    goods.spec     = spec_arr;
    goods.goods_id = goodsId;
    goods.number   = number;
    goods.parent   = parentId;
    Ajax.call('flow.php?step=add_to_cart', 'goods=' + $.toJSON(goods), fittings_to_flow_response, 'POST', 'JSON');
  }
  function fittings_to_flow_response(result)
  {
    if (result.error > 0)
    {
      // 如果需要缺货登记，跳转
      if (result.error == 2)
      {
        if (confirm(result.message))
        {
          location.href = 'user.php?act=add_booking&id=' + result.goods_id;
        }
      }
      else if (result.error == 6)
      {
        openSpeDiv(result.message, result.goods_id, result.parent);
      }
      else
      {
        alert(result.message);
      }
    }
    else
    {
      location.href = 'flow.php';
    }
  }
  </script>
  <div class="blank"></div>
  <div class="block_s" style="display:none;" >
     <div class="buytab_a clearfix " >
    <div class="buytab clearfix">
    <div id="tabnavs">
     <h2 class="nstep1_tit2"><?php echo $this->_var['lang']['goods_fittings']; ?></h2>
     </div>
     
   
    <form action="flow.php" method="post">
       <div class="buylist2">
       <ul class="other-teambuy">
          <?php $_from = $this->_var['fittings_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'fittings');if (count($_from)):
    foreach ($_from AS $this->_var['fittings']):
?>
           
              <li>
                <a href="<?php echo $this->_var['fittings']['url']; ?>" target="_blank"><img src="<?php echo $this->_var['fittings']['goods_thumb']; ?>" alt="<?php echo htmlspecialchars($this->_var['fittings']['name']); ?>" width="158" height="158" /></a>
              
                <a href="<?php echo $this->_var['fittings']['url']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['fittings']['goods_name']); ?>" class="hpink"><?php echo htmlspecialchars($this->_var['fittings']['short_name']); ?></a>
                <div class="hde" style="text-align:center"><?php echo $this->_var['lang']['fittings_price']; ?><font class="f1"><?php echo $this->_var['fittings']['fittings_price']; ?></font></div>
                <div  style="clear:both"></div>
         <a class="pinkbtn" style="*line-height: 19px;_line-height: 16px;" href="javascript:fittings_to_flow(<?php echo $this->_var['fittings']['goods_id']; ?>,<?php echo $this->_var['fittings']['parent_id']; ?>)">加入购物车</a>
                
              </li>
            
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
    </form>
    </div>
    </div>
   
   <div class="blank"></div>
  
    <?php if ($this->_var['promotion_goods']): ?>
 <div class="buytab_a clearfix " style="display:none;" >
    <div class="buytab clearfix">
    <div id="tabnavs">
     <h2 class="nstep1_tit2">今日特卖精品<span>(单笔订单满两件包邮哦)</span></h2>
     </div>
       <div class="buylist2">
       <ul class="other-teambuy">
         <?php $_from = $this->_var['promotion_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['promotion_foreach'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['promotion_foreach']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['promotion_foreach']['iteration']++;
?>
         
           <li>
           <a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['thumb']; ?>" border="0" alt="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" width="158" height="158"/></a>
		   <a href="<?php echo $this->_var['goods']['url']; ?>" title="<?php echo htmlspecialchars($this->_var['goods']['name']); ?>" class="hpink"><?php echo htmlspecialchars($this->_var['goods']['short_name']); ?></a>
           <div class="hde">
                <div class="left_now  "><span class="pink"><?php echo $this->_var['goods']['promote_price']; ?></span></div>
                <div class="right_old  " style="white-space: nowrap;"><?php echo $this->_var['goods']['market_price']; ?> </div>       
                </div>
                <div  style="clear:both"></div>
         <a class="pinkbtn" style="*line-height: 19px;_line-height: 16px;" href="javascript:addToCartShowDiv(<?php echo $this->_var['goods']['id']; ?>,1,'best')" >加入购物车</a>
         <div class="sucess_joinCart" id="addtocartdialog_retui_<?php echo $this->_var['goods']['id']; ?>_best">

</div>
           </li>
        
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
       </ul>
  </div>
</div>
  </div>   
<?php endif; ?>

  <div class="blank5"></div>
  <?php endif; ?>
</div>
  
  <?php if ($this->_var['favourable_list']): ?>
  <div class="block_s"  style="display:none;">
    <div class="flowBox"   style="display:none;">
    <h6><span><?php echo $this->_var['lang']['label_favourable']; ?></span></h6>
        <?php $_from = $this->_var['favourable_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'favourable');if (count($_from)):
    foreach ($_from AS $this->_var['favourable']):
?>
        <form action="flow.php" method="post">
          <table width="99%" align="center" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_name']; ?></td>
              <td bgcolor="#ffffff"><strong><?php echo $this->_var['favourable']['act_name']; ?></strong></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_period']; ?></td>
              <td bgcolor="#ffffff"><?php echo $this->_var['favourable']['start_time']; ?> --- <?php echo $this->_var['favourable']['end_time']; ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_range']; ?></td>
              <td bgcolor="#ffffff"><?php echo $this->_var['lang']['far_ext'][$this->_var['favourable']['act_range']]; ?><br />
              <?php echo $this->_var['favourable']['act_range_desc']; ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_amount']; ?></td>
              <td bgcolor="#ffffff"><?php echo $this->_var['favourable']['formated_min_amount']; ?> --- <?php echo $this->_var['favourable']['formated_max_amount']; ?></td>
            </tr>
            <tr>
              <td align="right" bgcolor="#ffffff"><?php echo $this->_var['lang']['favourable_type']; ?></td>
              <td bgcolor="#ffffff">
                <span class="STYLE1"><?php echo $this->_var['favourable']['act_type_desc']; ?></span>
                <?php if ($this->_var['favourable']['act_type'] == 0): ?>
                <?php $_from = $this->_var['favourable']['gift']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gift');if (count($_from)):
    foreach ($_from AS $this->_var['gift']):
?><br />
                  <input type="checkbox" value="<?php echo $this->_var['gift']['id']; ?>" name="gift[]" />
                  <a href="goods.php?id=<?php echo $this->_var['gift']['id']; ?>" target="_blank" class="f6"><?php echo $this->_var['gift']['name']; ?></a> [<?php echo $this->_var['gift']['formated_price']; ?>]
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              <?php endif; ?>          </td>
            </tr>
            <?php if ($this->_var['favourable']['available']): ?>
            <tr>
              <td align="right" bgcolor="#ffffff">&nbsp;</td>
              <td align="center" bgcolor="#ffffff"><input type="image" src="themes/miqinew/images/bnt_cat.gif" alt="Add to cart"  border="0" /></td>
            </tr>
            <?php endif; ?>
          </table>
          <input type="hidden" name="act_id" value="<?php echo $this->_var['favourable']['act_id']; ?>" />
          <input type="hidden" name="step" value="add_favourable" />
        </form>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  </div>
  </div>
  <?php endif; ?>
 
 
        
        <?php if ($this->_var['step'] == "consignee"): ?>
        <DIV class="block_s">
        
        <?php echo $this->smarty_insert_scripts(array('files'=>'region.js,utils.js')); ?>
        <script type="text/javascript">
          region.isAdmin = false;
          <?php $_from = $this->_var['lang']['flow_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

          
          onload = function() {
            if (!document.all)
            {
              document.forms['theForm'].reset();
            }
          }
          
        </script>
        
        <?php $_from = $this->_var['consignee_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('sn', 'consignee');if (count($_from)):
    foreach ($_from AS $this->_var['sn'] => $this->_var['consignee']):
?>
        <form action="flow.php" method="post" name="theForm" id="theForm" onsubmit="return checkConsignee(this)">
        <?php echo $this->fetch('library/consignee.lbi'); ?>
        </form>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endif; ?>
         </DIV>
         <div class="block_s">
         
        <?php if ($this->_var['step'] == "checkout"): ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'region.js')); ?><?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,transport.js')); ?>














<form action="flow.php" method="post" name="theForm"  class="validator" id="theForm" onsubmit="return checkOrderForm(this)">
<div class="main_box">
<div class="sh_box">
<div class="nstep2_con">

  <h2 class="nstep1_tit3">商品列表</h2>
  
    <div class="nstep_products" style="margin-top:5px;padding:12px 14px 40px 14px;">
    <table width="100%" border="0" cellspacing="0" style="border:1px #e5e5e5 solid;margin-top:5px;">
      <tbody>
      <tr>
        <th height="30" style="background:#f5f5f5;width:108px;font-weight:bold;"></th>
          <th style="background:#f5f5f5;text-align:center;width:450px;font-weight:bold;">商品名称</th>
      <th style="background:#f5f5f5;text-align:center;width:130px;font-weight:bold;">数量</th>
      <th style="background:#f5f5f5;text-align:right;padding-right:50px;width:80px;font-weight:bold;">价格</th>
      <th style="background:#f5f5f5;text-align:right;padding-right:50px;width:80px;font-weight:bold;">小计</th>
      </tr>
      <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                 <tr>
            <td class="nstep_pbox xuxian" style="text-align:left;padding:15px;">
              <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" width="75" height="75"></a>
            </td>
            <td class="nstep_name xuxian" style="text-align:center;">
              <a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><?php echo $this->_var['goods']['goods_name']; ?></a>            </td>
            <td class="number_box xuxian">
              <span class="arial weiruan f14"><?php echo $this->_var['goods']['goods_number']; ?></span>
            </td>
            <td class="nstep1_prc xuxian" style="text-align:right;padding-right:40px;">
              <span class="arial f14"></span><span id="teamprice_216226" class="weiruan f14"><?php echo $this->_var['goods']['formated_goods_price']; ?></span>
            </td>
            <td class="nstep1_prc  xuxian" style="text-align:right;padding-right:40px;">
              <span class="arial f14"></span><span id="teamtotalprice_216226" class="weiruan f14"><?php echo $this->_var['goods']['formated_subtotal']; ?></span>
            </td>
          </tr>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>



 














          </tbody>
    </table>
    <div class="cart_ly"><span>给卖家留言：</span><input name="postscript" id="postscript" type="text" class="cart_text"></div>
    </div>  
    
    

  <table width="100%" border="0" cellspacing="10" cellpadding="0" class="shrxx_ta">
  <tbody><tr>
    <td>
    <h2 class="nstep1_tit3" style="margin-top:4px; padding-left:22px; margin:0 auto;">收货人信息 
    <a style=" font-weight:normal; font-size:14px; float:right; margin-right:20px" href="user_add.php">管理地址</a></h2>
    </td>
  </tr>
  <tr>
    <td class="shrxx_td_1"><span>第一次使用请先添加一个地址</span></td>
  </tr>
 

            




 <?php $_from = $this->_var['dizhi']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'consignees');if (count($_from)):
    foreach ($_from AS $this->_var['consignees']):
?>
  <tr>
    <td class="shrxx_td1" valign="middle" data-sid="2">
      <div class="div_1" id="id<?php echo $this->_var['consignees']['address_id']; ?>">
        <p data-aid="13" id="ids<?php echo $this->_var['consignees']['address_id']; ?>"  <?php if ($this->_var['consignees']['address_id'] == $this->_var['consignee']['address_id']): ?>class="selected"<?php endif; ?>>
        <span class="span1">寄送至</span>
         <label>
        <input name="t1" id="id_<?php echo $this->_var['consignees']['address_id']; ?>" onclick="toggleClassTest('id_<?php echo $this->_var['consignees']['address_id']; ?>',<?php echo $this->_var['consignees']['address_id']; ?>,this);" type="radio" value="1" <?php if ($this->_var['consignees']['address_id'] == $this->_var['consignee']['address_id']): ?>checked<?php endif; ?> >
        <span>代购费</span><span><?php echo htmlspecialchars($this->_var['consignees']['province']); ?><?php echo htmlspecialchars($this->_var['consignees']['city']); ?><?php echo htmlspecialchars($this->_var['consignees']['district']); ?><?php echo htmlspecialchars($this->_var['consignees']['address']); ?></span><span><?php echo htmlspecialchars($this->_var['consignees']['mobile']); ?></span>
        <a class="a_1" href="flow.php?step=consignee">修改本地址</a>
        <?php if ($this->_var['consignees']['address_id'] == $this->_var['consignee']['address_id']): ?><em>默认地址</em><?php endif; ?>
         </label>
        </p>
        </div>
    </td>
  </tr>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
  
    <td class="shrxx_td"><a data-toggle="modal" href="javascript:dian();">使用新地址</a>&nbsp;&nbsp;
    <span style="float:left; margin-top:10px; font-size:14px"><input name="" type="checkbox" value="" style=" float:left; margin:4px 5px 0 20px">使用匿名购买</span></td>
  </tr>
</tbody></table>
<script>
function dian(){
   document.getElementById('login-modal').style.display = '';
}
function guanbi(){
  document.getElementById('login-modal').style.display = 'none';
}

function hasClass(obj, cls) {  
    return obj.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));  
}  
  
function addClass(obj, cls) {  
    if (!this.hasClass(obj, cls)) obj.className += " " + cls;  
}  
  
function removeClass(obj, cls) {  
    if (hasClass(obj, cls)) {  
        var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');  
        obj.className = obj.className.replace(reg, ' ');  
    }  
}  
  
function toggleClass(obj,cls){  
    if(hasClass(obj,cls)){  
        removeClass(obj, cls);  
    }else{  
        addClass(obj, cls);  
    }  
}  
  
function toggleClassTest(tes,id,obj){  
    toggleClass(obj,"selected");
    $('.div_1[id^=id]').children('p').removeClass("selected");
    $('#ids'+id).addClass('selected');

    //缓存用户的地址
    $.post('flow.php?act=dizhi', {id: id}, function (text) {},'json');
}  
    
    </script>


<div id="payMeshod" class="cart-inf">
<div style="margin:0px;" class="tlt-02">实名认证</div>
  <div class="smrz_div">
      <div class="smrz_div1"><p><span class="pink">*</span>&nbsp;真 实 姓 名：</p><input name="zhengshi" id="zhengshi" type="text" class="smrz_text"></div>
      <div class="smrz_div1"><p><span class="pink">*</span>&nbsp;身份证认证：</p><input name="ID" id="ID" type="text" class="smrz_text"></div>
      <div class="smrz_div1"><a class="a1" href="javascript:Immediate_verification();">立即验证</a></div>
    </div>
   </div>
   <script>
     function Immediate_verification(){
      var id  = document.getElementById('ID').value;
      var zhenshi  = document.getElementById('zhengshi').value;
      var res= checkIdcard(id);
      var rrs = rr(zhenshi);
      if(rrs == true){
          if(res == true){
              $.ajax({
                 type: "POST",
                 url: "user.php?act=zhenshi",
                 data: {id:id, zhenshi:zhenshi},
                 dataType: "json",
                 success: function(res){
                             alert(res.msg);
                          }
             });
              //$.post('user.php?act=zhenshi', {id:id, zhenshi:zhenshi}, function (text) {alert(23432);},'json');
            }
          }
     }

     function rr(val){
 
       reg = /^[\u4E00-\u9FA5]{2,4}$/;
       
       if(!reg.test(val)){
       
        alert("请输入正确的中文姓名！");
        return false;
       
       }
       return true;
       
      }

        function checkIdcard(num){
    num = num.toUpperCase();
    //身份证号码为15位或者18位，15位时全为数字，18位前17位为数字，最后一位是校验位，可能为数字或字符X。
    if (!(/(^\d{15}$)|(^\d{17}([0-9]|X)$)/.test(num)))
    {
        alert('输入的身份证号长度不对，或者号码不符合规定！\n15位号码应全为数字，18位号码末位可以为数字或X。');
        return false;
    }
    //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
    //下面分别分析出生日期和校验位
    var len, re;
    len = num.length;
    if (len == 15)
    {
        re = new RegExp(/^(\d{6})(\d{2})(\d{2})(\d{2})(\d{3})$/);
        var arrSplit = num.match(re);
 
        //检查生日日期是否正确
        var dtmBirth = new Date('19' + arrSplit[2] + '/' + arrSplit[3] + '/' + arrSplit[4]);
        var bGoodDay;
        bGoodDay = (dtmBirth.getYear() == Number(arrSplit[2])) && ((dtmBirth.getMonth() + 1) == Number(arrSplit[3])) && (dtmBirth.getDate() == Number(arrSplit[4]));
        if (!bGoodDay)
        {
            alert('输入的身份证号里出生日期不对！');
            return false;
        }
        else
        {
                //将15位身份证转成18位
                //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
                var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
                var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
                var nTemp = 0, i;
                num = num.substr(0, 6) + '19' + num.substr(6, num.length - 6);
                for(i = 0; i < 17; i ++)
                {
                    nTemp += num.substr(i, 1) * arrInt[i];
                }
                num += arrCh[nTemp % 11];
                return true;
        }
    }
    if (len == 18)
    {
        re = new RegExp(/^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/);
        var arrSplit = num.match(re);
 
        //检查生日日期是否正确
        var dtmBirth = new Date(arrSplit[2] + "/" + arrSplit[3] + "/" + arrSplit[4]);
        var bGoodDay;
        bGoodDay = (dtmBirth.getFullYear() == Number(arrSplit[2])) && ((dtmBirth.getMonth() + 1) == Number(arrSplit[3])) && (dtmBirth.getDate() == Number(arrSplit[4]));
        if (!bGoodDay)
        {
            alert('输入的身份证号里出生日期不对！');
            return false;
        }
    else
    {
        //检验18位身份证的校验码是否正确。
        //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
        var valnum;
        var arrInt = new Array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
        var arrCh = new Array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
        var nTemp = 0, i;
        for(i = 0; i < 17; i ++)
        {
            nTemp += num.substr(i, 1) * arrInt[i];
        }
        valnum = arrCh[nTemp % 11];
        if (valnum != num.substr(17, 1))
        {
            alert('18位身份证的校验码不正确！应该为：' + valnum);
            return false;
        }
        return true;
    }
    }
    return false;
}
   </script>


<div id="payMeshod" class="cart-inf">
<div style="margin:0px;" class="tlt-02">支付方式</div>
                    <div id="codItem" class="inf-pay pay-on" style="">
                      <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
                                        


                                        <?php if ($this->_var['payment']['pay_id'] == '3'): ?>
                        <div class="pay-txt">
                            <input id="payCOD" type="radio" name="payTypeRD" value="<?php echo $this->_var['payment']['pay_id']; ?>" onclick="payFocus('COD')" checked="">
                            <input type="hidden" id="iiii" name="payment" value="<?php echo $this->_var['payment']['pay_id']; ?>" >
                            <label for="payCOD">
                                <?php echo $this->_var['payment']['pay_name']; ?>
                                <span><?php echo $this->_var['payment']['pay_desc']; ?></span>
                            </label>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </div>
                    <script>

                    </script>
                    <div class="inf-pay pay-on" id="questions">
                        <div class="pay-txt">
                            <input id="payONLINE" type="radio" name="payTypeRD" value="4" onclick="payFocus('ONLINE')">
                            <label for="payONLINE">
                                在线支付
                                <span>（为了保证及时处理您的订单，请您于下单后2小时内完成付款，否则订单将被自动取消）</span>
                            </label>
                        </div>
                        <div id="bankList" style="width: 940px; display: none;" class="suc-pay">
                        <div class="slideTxtBox">
                          <div class="hd">
                            <ul class="tabs">
                                        <li class="onlineTab on"><a href="javascript:void(0);">储蓄卡</a></li>
                                        <li class="onlineTab"><a href="javascript:void(0);">信用卡</a></li>
                                        <li class="onlineTab"><a href="javascript:void(0);">支付平台</a></li>
                            </ul>
                            </div>
                            <div class="bd">
                                <ul style="padding: 0px 0px 20px 13px; display: block;" class="tab_conbox">
                                    <li class="box-tlt">
                                        网银支付-储蓄卡
                                        <span>需开通网银</span>
                                    </li>
                                    <li>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"  name="bankItem" value="4008">
                                                <img src="themes/miqinew/images/nongye.gif">
                                                </label>
                                            </div>

                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0024">
                                                <img src="themes/miqinew/images/dongya.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0024">
                                                <img src="themes/miqinew/images/beijing.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0024">
                                                <img src="themes/miqinew/images/zhongguo.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="10010">
                                                <img src="themes/miqinew/images/jianshe.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0024">
                                                <img src="themes/miqinew/images/guangda.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla"  name="bankItem" onclick="dela();"  value="0024">
                                                <img src="themes/miqinew/images/xingye.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0024">
                                                <img src="themes/miqinew/images/zhongxin.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0007">
                                                <img src="themes/miqinew/images/zhaohang.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0024">
                                                <img src="themes/miqinew/images/minsheng.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla"  onclick="dela();"  name="bankItem" value="1025">
                                                <img src="themes/miqinew/images/jiaotong.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0026">
                                                <img src="themes/miqinew/images/guangfa.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0005">
                                                <img src="themes/miqinew/images/gongshang.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0024">
                                                <img src="themes/miqinew/images/ningbo.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0024">
                                                <img src="themes/miqinew/images/nanjing.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0024">
                                                <img src="themes/miqinew/images/pingan.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0082">
                                                <img src="themes/miqinew/images/youzheng.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0024">
                                                <img src="themes/miqinew/images/shenfa.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="1022">
                                                <img src="themes/miqinew/images/shangpufa.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem">
                                                <img src="themes/miqinew/images/shangnongshang.gif">
                                                </label>
                                            </div>
                                            
                                    </li>
                                </ul>
                                <ul style="padding: 0px 0px 20px 13px; display: none;" class="tab_conbox" id="onlineBankContent1">
                                
                                    <li class="box-tlt">
                                        网银大额支付-信用卡
                                        <span>需开通网银</span>
                                    </li>
                                    <li>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla"  onclick="dela();"  name="bankItem" value="0005">
                                                <img src="themes/miqinew/images/gongshang.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="1022">
                                                <img src="themes/miqinew/images/shangpufa.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0007">
                                                <img src="themes/miqinew/images/zhaohang.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0024">
                                                <img src="themes/miqinew/images/zhongguo.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="1025">
                                                <img src="themes/miqinew/images/jiaotong.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0026">
                                                <img src="themes/miqinew/images/guangfa.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();"   name="bankItem" value="0009">
                                                <img src="themes/miqinew/images/xingye.gif">
                                                </label>
                                            </div>
                                            <div class="pay-one">
                                            <label>
                                                <input type="radio" class="cla" onclick="dela();" name="bankItem" value="0024">
                                                <img src="themes/miqinew/images/guangda.gif">
                                                </label>
                                            </div>
                                    </li>
                                </ul>
                            
                                <ul style="padding: 0px 0px 20px 13px; display: none;" class="tab_conbox" id="onlineBankContent2">
                                
                                    <li class="box-tlt">
                                        
                                        <span></span>
                                    </li>
            

                                    <li>
                                        <?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['payment']):
        $this->_foreach['names']['iteration']++;
?>
                                        
                                          <?php if ($this->_var['payment']['pay_id'] != '2'): ?>
                                            <?php if ($this->_var['payment']['pay_id'] != '3'): ?>
                                            <div class="pay-one">
                                            <label>
                                                <input class="cla_z" type="radio" name="payment" onclick="dels();" value="<?php echo $this->_var['payment']['pay_id']; ?>" isCod="<?php echo $this->_var['payment']['is_cod']; ?>" onclick="selectPayment(this)" <?php if ($this->_var['cod_disabled'] && $this->_var['payment']['is_cod'] == "1"): ?>disabled="true"<?php endif; ?>/>
                                                <?php if ($this->_var['payment']['pay_id'] == 7): ?>
                                                <img src="themes/miqinew/images/tp.jpg">
                                                 <?php elseif ($this->_var['payment']['pay_id'] == 1): ?>
                                                <img src="themes/miqinew/images/yue.jpg"  height="42" width="140" title="余额支付" alt="余额支付">
                                                 <?php elseif ($this->_var['payment']['pay_id'] == 4): ?>
                                                <img src="themes/miqinew/images/alp.jpg">
                                                  <?php elseif ($this->_var['payment']['pay_id'] == 6): ?>
                                                      <img src="themes/miqinew/images/QQ截图20151225172454.png">
                                                  <?php elseif ($this->_var['payment']['pay_id'] == 8): ?>
                                                      <img src="themes/miqinew/images/weixin.png">
                                                 <?php endif; ?>
                                                  
                                                </label>

                                            

                                            </div>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                          

                                    </li>
                                    <script>
                                      function dels(){
                                          $(".cla").attr("checked",false);
                                      }
                                      function dela(){
                                        $(".cla_z").attr("checked",false);
                                      }
                                    </script>
                                
                                </ul>
                                </div>
                                </div>
    <script type="text/javascript">jQuery(".slideTxtBox").slide({trigger:"click"});</script>
                            <div class="inf-pay-btn" id="sss">
                                <a href="javascript:;" onclick="document.getElementById('sss').style.display = 'none';" class="pay-btn">确认</a>
                        </div>
                    </div>
                </div>
                </div>



<div class="shsjxz">
    <strong>请选择配送时间　</strong>
    <ul class="sh" style="margin-left:25px;">
    <li style="padding-left:10px;"><label><input name="Best_time" onclick="songhuo(this);"  type="radio" checked value="工作日送货(双休、假日不送)">工作日送货(双休、假日不送)</label></li>
     <li style="padding-left:10px;"><label><input name="Best_time" onclick="songhuo(this);" type="radio" value="双休、假日送货(工作日不送)">双休、假日送货(工作日不送)</label></li>
     <li style="padding-left:10px;"><label><input name="Best_time" onclick="songhuo(this);" type="radio" value="任何时候都可以送货">任何时候都可以送货</label></li>
     </ul>
</div>

<?php echo $this->fetch('library/order_total.lbi'); ?>


</form>
<form action="flow.php?act=zhngjia" method="post" name="names" id="names" onsubmit="return tijiaos();">
<div style="display:none; height:500px; top:50%; width:950px; margin-left:-450px" id="login-modal" class="modal in" aria-hidden="false">
    <div class="title"><em>添加新地址</em><a data-dismiss="modal" href="javascript:guanbi();">×</a></div>
<div id="commentPop" style="z-index: 999; width: 950px; height: 445px; position: fixed;display: block;" class="popup popup_580 dialog_box">
    <div class="bt" style="padding:0 10px; float:left; width: 530px; float:left">
      <table width="100%" border="0" cellspacing="10" cellpadding="0">
  <tbody><tr>
    <td>收货人姓名：<br>
<input class="bt_text" name="consignee" id="consignee" type="text" placeholder="长度不超过25个字符"></td>
  </tr>
  <tr>
    <td>所在地区：<br>
                <div style="position:relative; float:left">
                <select name="country" id="selCountries_0" onchange="region.changed(this, 1, 'selProvinces_0')" style="padding:5px 4px;border:1px solid #abadb3;">
        <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['0']; ?></option>
        <?php $_from = $this->_var['country_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'country');if (count($_from)):
    foreach ($_from AS $this->_var['country']):
?>
        <option value="<?php echo $this->_var['country']['region_id']; ?>" ><?php echo $this->_var['country']['region_name']; ?></option>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </select>
      <select name="province" id="selProvinces_0" onchange="region.changed(this, 2, 'selCities_0')" style="padding:5px 4px;border:1px solid #abadb3;">
        <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['1']; ?></option>
        <?php $_from = $this->_var['province_list'][$this->_var['sn']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'province');if (count($_from)):
    foreach ($_from AS $this->_var['province']):
?>
        <option value="<?php echo $this->_var['province']['region_id']; ?>" <?php if ($this->_var['consignee']['province'] == $this->_var['province']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['province']['region_name']; ?></option>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </select>
      <select name="city" id="selCities_0" onchange="region.changed(this, 3, 'selDistricts_0')" style="padding:5px 4px;border:1px solid #abadb3;">
        <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['2']; ?></option>
        <?php $_from = $this->_var['city_list'][$this->_var['sn']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
        <option value="<?php echo $this->_var['city']['region_id']; ?>" <?php if ($this->_var['consignee']['city'] == $this->_var['city']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['city']['region_name']; ?></option>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </select>
      <select name="district" id="selDistricts_0" <?php if (! $this->_var['district_list'][$this->_var['sn']]): ?>style="display:none;padding:5px 4px;border:1px solid #abadb3;"<?php endif; ?> >
        <option value="0"><?php echo $this->_var['lang']['please_select']; ?><?php echo $this->_var['name_of_region']['3']; ?></option>
        <?php $_from = $this->_var['district_list'][$this->_var['sn']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'district');if (count($_from)):
    foreach ($_from AS $this->_var['district']):
?>
        <option value="<?php echo $this->_var['district']['region_id']; ?>" <?php if ($this->_var['consignee']['district'] == $this->_var['district']['region_id']): ?>selected<?php endif; ?>><?php echo $this->_var['district']['region_name']; ?></option>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </select>

        </div>

    </td>
  </tr>
  <tr>
    <td>详细地址：<br>
<input class="bt_text1" name="address" id="address" type="text" placeholder="建议您如实填写详细收货地址，例如街道名称，门牌号码，楼层和房间号等信息"></td>
  </tr>
  <tr>
    <td>邮政编码 ：<br>
<input class="bt_text" name="zipcode" id="zipcode" type="text" placeholder="如您不清楚邮递区号，请填写000000"></td>
  </tr>
  <tr>
    <td>手机号码：<br>
<input class="bt_text" name="mobile" id="mobile" type="text" placeholder="手机号码必须填"></td>
  </tr>
  <tr>
    <td><input name="moren" type="checkbox" value="1" checked="">&nbsp;设置为默认收货地址</td>
  </tr>
</tbody></table>

    </div>
    <div class="dzdt"><img src="themes/miqinew/images/dt.png" width="370" height="370"></div>
    <div class="clear"></div>
    <div class="bt" style="padding:0px; width: 530px;">
        <input type="submit" class="bt-3" style="border:none;" value="保存收获地址"/>
    </div>
<div class="dialog_close"></div></div>    
    </div>  
</form>
<script type="text/javascript">
	function tijiaos(){

		var   selCountries_0  = document.getElementById('selCountries_0').value;
		var   selProvinces_0  = document.getElementById('selProvinces_0').value;
		var   selCities_0  = document.getElementById('selCities_0').value;
		var   selDistricts_0  = document.getElementById('selDistricts_0').value;
		var   consignee  = document.getElementById('consignee').value;
		var   address  = document.getElementById('address').value;
		var   zipcode  = document.getElementById('zipcode').value;
		var   mobile  = document.getElementById('mobile').value;
		var msg = '';

    var reg = /^0?1[3|4|5|8][0-9]\d{8}$/;
    var reg2 = /^((0\d{2,3}))(\d{7,8})(-(\d{3,}))?$/;
    var re= /^[1-9][0-9]{5}$/;
    if(selCountries_0 == 0){
        msg += '请选择国家\n';
    }
    if(selProvinces_0 == 0){
        msg += '请选择省份或者城市\n';
    }
    if(selCities_0 == 0){
        msg += '请选择城市\n';
    }
    if(selDistricts_0 == 0){
        msg += '请选择县区\n';
    }
    if(consignee.length <1){
      msg += '请输入联系人\n';
    }
    if(zipcode.length <1){
    		msg += '请输入邮政编码！\n';
    	}else{
	        if(!re.test(zipcode)){
	          msg += '请输入正确的邮政编码\n';
	        }
    	}
    if(address.length <1){
      msg += '请输入详细地址\n';
    }
    // if(tel_2.length >1){
    //   if(!reg2.test(tel_2)){
    //       msg += '请输入正确的电话号码\n'
    //   }
    // }
    if(mobile.length <1){
      msg += '请输入手机号码\n';
    }else{
      if(!reg.test(mobile)){
        msg += '请输入正确的手机号码\n';
      }
    }
    if(msg.length > 0){
      alert(msg);
      return false;
    }
	}
</script>
  
</div>
</div>
</div>

























        <script type="text/javascript">
        var flow_no_payment = "<?php echo $this->_var['lang']['flow_no_payment']; ?>";
        var flow_no_shipping = "<?php echo $this->_var['lang']['flow_no_shipping']; ?>";
        </script>
        
      

    
        <?php endif; ?>

       
        <?php if ($this->_var['step'] == "done"): ?>
        
        

<div class="main_box">
  <div class="sh_box" style=" margin-bottom:0; width:1158px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="cart3_ta">
        <tbody><tr>
          <td class="cart3_td">您的订单已提交成功，请尽快付款！订单号：<?php echo $this->_var['order']['order_sn']; ?><span>应付款金额为:&nbsp;<b>￥<?php echo $this->_var['order']['order_amount']; ?></b>&nbsp;元</span></td>
        </tr>
       <tr>
          <td class="cart3_td1">您选定的配送时间为：<span><?php echo $this->_var['order']['best_time']; ?></span>，您选定的支付方式为: <span><?php echo $this->_var['order']['pay_name']; ?></span>&nbsp;。请在24小时内完成支付！</td>
        </tr>
    </tbody></table>
  </div>
</div>
<div class="main_box">
  <div class="sh_box" style=" margin:0 auto; border-top:none;">
    <table width="600" border="0" cellspacing="5" cellpadding="0" class="cart3_ta1">
  <tbody><tr>
    <td width="100" height="30" align="right">收货人姓名：</td>
    <td><?php echo $this->_var['order']['consignee']; ?></td>
  </tr>
  <tr>
    <td height="30" align="right">详细地址：</td>
    <td><?php echo $this->_var['order']['dizhi']; ?></td>
  </tr>
  <tr>
    <td height="30" align="right">联系电话：</td>
    <td><?php echo $this->_var['order']['mobile']; ?></td>
  </tr>
  <tr>
    <td height="30" align="right">最佳送货时间：</td>
    <td><?php echo $this->_var['order']['best_time']; ?></td>
  </tr>
  <tr>
    <td height="30" align="right">支付方式：</td>
    <td class="cart3_ta1_td2"><?php echo $this->_var['order']['pay_name']; ?></td>
  </tr><tr>
    <td height="20" align="right">&nbsp;</td>
    <td class="cart3_ta1_td1">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" align="right">&nbsp;</td>
    <td class="cart3_ta1_td1"><?php echo $this->_var['pay_online']; ?><a href="user.php?act=order_list" class="a1">确定</a></td>
  </tr>
</tbody></table>

    <!--<table width="600" border="0" cellspacing="5" cellpadding="0" class="cart3_ta1">
  <tr>
    <td width="100" align="center">付款银行</td>
    <td class="cart3_ta1_td"><img src="themes/miqinew/images/zhaohang.gif" width="150" height="45" /><a href="javascript:;" onClick="window.history.go(-1);">更换银行卡</a></td>
  </tr>
  <tr>
    <td height="45" align="center">卡种</td>
    <td>储蓄卡</td>
  </tr>
  <tr>
    <td height="45" align="center">银行卡号</td>
    <td><input name="" type="text" class="cart3_text" /></td>
  </tr>
  <tr>
    <td height="45" align="center">手机号</td>
    <td><input name="" type="text" class="cart3_text" placeholder="银行预存号码" /></td>
  </tr>
  <tr>
    <td height="45" align="center">验证码</td>
    <td><input name="" type="text" class="cart3_text" placeholder="请输入验证码" />
    <input type="button" id="btn" value="点击获取验证码" onclick="settime(this)" /> 
<script type="text/javascript"> 
var countdown=60; 
function settime(val) { 
if (countdown == 0) { 
val.removeAttribute("disabled");    
val.value="点击获取验证码"; 
countdown = 60; 
} else { 
val.setAttribute("disabled", true); 
val.value="重新发送(" + countdown + ")"; 
countdown--; 
} 
setTimeout(function() { 
settime(val) 
},1000) 
} 
</script> 
</td>
  </tr>
    <tr>
    <td height="45" align="center">&nbsp;</td>
    <td class="cart3_ta1_td1"><a href="" class="a1">提交</a><a href="" class="a2">返回上一层</a></td>
  </tr>

</table>-->
  <table width="550" border="0" cellspacing="0" cellpadding="0" style=" float:right">
  <tbody><tr>
    <td height="300" align="center"><img src="themes/miqinew/images/login_pic.jpg" width="371" height="250"></td>
  </tr>
</tbody></table>
<div class="clear"></div>
  </div>
</div>
        <?php endif; ?>
        
        <?php if ($this->_var['step'] == "login"): ?>
        <link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
        <link href="themes/miqinew/css/style.css" rel="stylesheet" type="text/css" />
        <?php echo $this->smarty_insert_scripts(array('files'=>'utils.js,user.js')); ?>
        <script type="text/javascript">
        <?php $_from = $this->_var['lang']['flow_login_register']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
          var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

        
        function checkLoginForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          return true;
        }

        function checkSignupForm(frm) {
          if (Utils.isEmpty(frm.elements['username'].value)) {
            alert(username_not_null);
            return false;
          }

          if (Utils.trim(frm.elements['username'].value).match(/^\s*$|^c:\\con\\con$|[%,\'\*\"\s\t\<\>\&\\]/))
          {
            alert(username_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['email'].value)) {
            alert(email_not_null);
            return false;
          }

          if (!Utils.isEmail(frm.elements['email'].value)) {
            alert(email_invalid);
            return false;
          }

          if (Utils.isEmpty(frm.elements['password'].value)) {
            alert(password_not_null);
            return false;
          }

          if (frm.elements['password'].value.length < 6) {
            alert(password_lt_six);
            return false;
          }

          if (frm.elements['password'].value != frm.elements['confirm_password'].value) {
            alert(password_not_same);
            return false;
          }
          return true;
        }
        
        </script>
        
          




          <form action="flow.php?step=login" method="post" name="loginForm" id="loginForm" onsubmit="return checkLoginForm(this)">

<div class="login">
  <div class="login_l"><img src="themes/miqinew/images/login_pic.jpg"></div>
  <div class="login_r">
      <div class="srk">
          <p>用户名</p>
            <input name="username" id="username" type="text" class="k1" placeholder="请输入手机号/昵称">
        </div>

      <div class="srk">
          <p>密码</p>
<input type="password" name="password" id="password1" placeholder="请输入密码" class="k1">
        </div>

      <div class="zcwj">
          <span><a href="user.php?act=qpassword_name">忘记密码？</a></span>
          <font><a href="user.php?act=register">立即注册</a></font>
        </div>

            <input type="hidden" name="act" value="act_login">
            <input type="hidden" name="back_act" value="http://127.0.0.1/guoa/flow.php?step=login">
<input name="act" type="hidden" value="signin" />
        <div class="dl_an">
        <input type="submit" name="submit" value="登录">
        <?php if ($this->_var['anonymous_buy'] == 1): ?>
                        <input type="button"  value="<?php echo $this->_var['lang']['direct_shopping']; ?>" onclick="location.href='flow.php?step=consignee&amp;direct_shopping=1'" style="margin-top:10px;"/>
                        <?php endif; ?>
        </div>
        <div class="line"></div>
        <div class="dsf">
          <p>第三方快捷登录</p>
            <div class="tb">
                <a class="qq" href="user.php?act=oath&amp;type=qq"></a>
                <a class="wx" href="#"></a>
                <a class="xl" href="user.php?act=oath&amp;type=weibo"></a>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

    </form>





       
        
        <?php endif; ?>
 </div>

<div class="blank5"></div>
<div class="flow">
<div class="footer">
<div class="footerBody">
<Div class="block_s">
<?php echo $this->fetch('library/page_footer.lbi'); ?> 
</Div>
</div>
</div>
</div>
</body>
<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
<?php $_from = $this->_var['lang']['passport_js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var username_exist = "<?php echo $this->_var['lang']['username_exist']; ?>";
var compare_no_goods = "<?php echo $this->_var['lang']['compare_no_goods']; ?>";
var btn_buy = "<?php echo $this->_var['lang']['btn_buy']; ?>";
var is_cancel = "<?php echo $this->_var['lang']['is_cancel']; ?>";
var select_spe = "<?php echo $this->_var['lang']['select_spe']; ?>";
</script>
</html>
