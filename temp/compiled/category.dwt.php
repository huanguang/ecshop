<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="icon" href="images/favicon.gif" type="image/gif" >
<link href="css/common.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/tuang.css" type="text/css" rel="stylesheet" />
<?php if ($this->_var['cat_style']): ?>
<link href="<?php echo $this->_var['cat_style']; ?>" rel="stylesheet" type="text/css" />
<?php endif; ?>
<link href="<?php echo $this->_var['ecs_css_path']; ?>" rel="stylesheet" type="text/css" />
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

<?php echo $this->smarty_insert_scripts(array('files'=>'jquery-1.9.1.min.js,jquery.json.js')); ?>
<?php echo $this->smarty_insert_scripts(array('files'=>'common.js,global.js,compare.js')); ?>
</head>

<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>


<div class="cur_wz">
	<?php echo $this->fetch('library/ur_here.lbi'); ?>
</div>



<?php echo $this->fetch('library/zuhesousuo.lbi'); ?>



<div class="main_box">
        
<div class="screen">
    	<ul>
        	<li class="cur"><a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=goods_id&order=<?php if ($this->_var['pager']['sort'] == 'goods_id' && $this->_var['pager']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#goods_list">全部</a></li>
        	<li class="li1"><a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=last_update&order=<?php if ($this->_var['pager']['sort'] == 'last_update' && $this->_var['pager']['order'] == 'DESC'): ?>ASC<?php else: ?>DESC<?php endif; ?>#goods_list">人气</a></li>
        	<li class="li2"><a href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=shop_price&order=<?php if ($this->_var['pager']['sort'] == 'shop_price' && $this->_var['pager']['order'] == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?>#goods_list">销量</a></li>
        </ul>
        <div class="money">
        	价格
        	<input type="text" value="<?php if ($this->_var['price_min']): ?><?php echo $this->_var['price_min']; ?><?php else: ?>0<?php endif; ?>" id="max">-<input type="text" id="min" value="<?php if ($this->_var['price_max']): ?><?php echo $this->_var['price_max']; ?><?php else: ?>0<?php endif; ?>">
            <input type="button" onclick="cha();" class="an" value="确定">
            <script type="text/javascript">
                function cha(){
                    var max = document.getElementById('max').value;
                    var min = document.getElementById('min').value;
                    if(max == min || max > min){
                        alert('请输入正确的价格区间！！');
                    }else{
                   window.location.href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min="+max+"&price_max="+min+"&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=shop_price&order=<?php if ($this->_var['pager']['sort'] == 'shop_price' && $this->_var['pager']['order'] == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?>#goods_list";
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
                    
                    

                    window.location.href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&"+add+ass+asss+"&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=shop_price&order=<?php if ($this->_var['pager']['sort'] == 'shop_price' && $this->_var['pager']['order'] == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?>#goods_list"
                }
            </script>
        </div>
<div class="xlsx fl">
        	<a href="###"><label><input name="" id="cuxiao" onclick="chaxun(this,'cuxiao');" <?php if ($this->_var['cuxiao'] == '1'): ?>checked="checked"<?php endif; ?> type="checkbox" value="<?php echo $this->_var['cuxiao']; ?>" /><span>折扣促销</span></label></a>
<div class="xlsx_1">
            	<ul>
                	<li><label><input name="" id="baoyou" onclick="chaxun(this,'baoyou');" <?php if ($this->_var['baoyou'] == '1'): ?>checked="checked"<?php endif; ?> type="checkbox" value="<?php echo $this->_var['baoyou']; ?>" /><span>包邮</span></label></li>
                	<!--<li><label><input name="" type="checkbox" value="" /><span>折扣促销</span></label></li>
                	<li><label><input name="" type="checkbox" value="" /><span>阿斯达</span></label></li>
                	<li><label><input name="" type="checkbox" value="" /><span>阿斯达</span></label></li>
                	<li><label><input name="" type="checkbox" value="" /><span>阿斯达</span></label></li>-->
                </ul>

            </div>
    </div>
    <div class="page3 fr">
        	<p>共有&nbsp;<span><?php echo $this->_var['pager']['record_count']; ?></span>&nbsp;件商品</p>
    </div>
    
        <div class="qhks fr">
        <p class="p1"><a class="a1" onclick="javascript:trc(1)" id="a_1_1"></a></p>
        <p class="p2"><a onclick="javascript:trc(2)" id="a_1_2"></a></p>
        </div>

        <div class="clear"></div>
    </div>
    

<div class="wedding" id="trc1">
            	<ul>
                                    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
    <?php if ($this->_var['goods']['goods_id']): ?>
					<li>
						<div class="pic"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" width="185" height="160"></a></div>
						<div class="wz">
                          <div class="jg">
                                <?php if ($this->_var['goods']['promote_price'] != ""): ?>
            <span><?php echo $this->_var['goods']['promote_price']; ?></span>
            <?php else: ?>
            <span><?php echo $this->_var['goods']['shop_price']; ?></span>
            <?php endif; ?>
            <?php if ($this->_var['show_marketprice']): ?>
           <s><?php echo $this->_var['goods']['market_price']; ?></s>
            <?php endif; ?>
                            </div>
                        	<div class="tit"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><?php echo $this->_var['goods']['goods_name']; ?></a></div>
                            <div class="an">
                            	<a class="gwc" href="javascript:addToCartShowDiv(<?php echo $this->_var['goods']['goods_id']; ?>,1,'best');"><img src="themes/miqinew/images/car.png" />加入购物车</a>
                            	<a class="ljgm" href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>">立即购买</a>
                                <div class="clear"></div>
                            </div>
                            <div class="yshp">
                            	<div class="yshp_l">已售：<span><?php echo $this->_var['goods']['count_xiaoliang']; ?></span></div>
                            	<div class="yshp_r">好评：<span><?php if ($this->_var['goods']['count_comment'] == '0'): ?>100%<?php else: ?><?php echo $this->_var['goods']['count_comment']; ?><?php endif; ?></span></div>
                                <div class="clear"></div>
                            </div>
                            <div class="sucess_joinCart" id="addtocartdialog_retui_<?php echo $this->_var['goods']['goods_id']; ?>_best"></div>
                      	</div>
					</li>
                     <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
                <div class="clear"></div>

            </div>
<div class="wedding" id="trc2" style="display:none">
                                    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goods_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goods_list']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goods_list']['iteration']++;
?>
    <?php if ($this->_var['goods']['goods_id']): ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="wedding_ta">

  <tr>
    <td width="200" rowspan="2" align="center"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><img src="<?php echo $this->_var['goods']['goods_thumb']; ?>" width="185" height="160" /></a></td>
    <td height="80" colspan="2" valign="top" class="wedding_td_2">
      <h2><a href=""><?php echo $this->_var['goods']['goods_name']; ?></a></h2>
      <?php if ($this->_var['goods']['promote_price'] != ""): ?>
            <p><?php echo $this->_var['goods']['promote_price']; ?></p>
            <?php else: ?>
            <p><?php echo $this->_var['goods']['shop_price']; ?></p>
            <?php endif; ?>
    </td>
    <td align="center" valign="bottom" class="wedding_td_4"><a href="javascript:addToCartShowDiv2(<?php echo $this->_var['goods']['goods_id']; ?>,1,'best');">加入购物车</a></td>
    <td width="190" rowspan="2" align="center"><img src="themes/miqinew/images/yz_13.jpg" width="165" height="102" /><div class="sucess_joinCart" id="addtocartdialog_retui2_<?php echo $this->_var['goods']['goods_id']; ?>_best"></div></td>

  </tr>

  <tr>
    <td width="210" align="left" valign="middle" class="wedding_td_3">
    <p><span>已售：</span>&nbsp;<?php echo $this->_var['goods']['count_xiaoliang']; ?></p> 
    </td>
    <td width="210" align="left" valign="middle" class="wedding_td_3"><p><span>好评：</span>&nbsp;<?php if ($this->_var['goods']['count_comment'] == '0'): ?>100%<?php else: ?><?php echo $this->_var['goods']['count_comment']; ?><?php endif; ?></p></td>
    <td align="center" valign="middle" class="wedding_td_5"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>">立即购买</a></td>
    </tr>
</table>

                 <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<div class="clear"></div>

            </div>
            <div style="height:56px;">
            <?php echo $this->fetch('library/pages.lbi'); ?>
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


<?php echo $this->fetch('library/page_footer.lbi'); ?> 
</body>
</html>