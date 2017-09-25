<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>婚宴专区-秀当红酒商城</title>
<link rel="icon" href="images/favicon.gif" type="image/gif" >
<link href="css/common.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/tuang.css" type="text/css" rel="stylesheet" />
<link href="themes/miqinew/css/common.css" type="text/css" rel="stylesheet" />
<link href="themes/miqinew/style.css" type="text/css" rel="stylesheet" />
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
</head>

<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>


<div class="main_box jf_banner"><img src="data/afficheimg/<?php echo $this->_var['ad_fen']['ad_code']; ?>" width="100%"/></div>

<div class="blank50"></div>




<div class="main_box">
<?php $_from = $this->_var['best_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['names']['iteration']++;
?>
<?php if ($this->_foreach['names']['iteration'] < '3'): ?>
<div class="hyzq_mxhj <?php if ($this->_foreach['names']['iteration'] == '1'): ?>fl<?php endif; ?><?php if ($this->_foreach['names']['iteration'] == '2'): ?>fr<?php endif; ?>">
	<div class="hyzq_mxhj_1 fl"><a href="<?php echo $this->_var['goods']['url']; ?>"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" width="200" height="290" /></a><img class="img_1" src="themes/miqinew/images/ax1.png" width="160" height="114" /></div>
	<div class="hyzq_mxhj_2 fr">
		<h2><?php echo sub_str($this->_var['goods']['name'],15); ?></h2>
		<h3><a href="<?php echo $this->_var['goods']['url']; ?>"><?php echo sub_str($this->_var['goods']['goods_brief'],15); ?></a></h3>
		<p class="p_1"><span>亮点：</span><?php echo sub_str($this->_var['goods']['goods_liangdian'],15); ?></p>
		<p class="p_1"><span>建议：</span><?php echo sub_str($this->_var['goods']['goods_jiany'],15); ?></p>
		<p class="p_2">价格：<span><?php echo $this->_var['goods']['shop_price']; ?></span></p>
		<p class="p_3"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>">立即购买</a></p>
	</div>
	<div class="clear"></div>
</div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>


<div class="clear"></div>
</div>
<div class="blank30"></div>
<div style=" border-bottom:1px dashed #ccc; width:1200px; margin:0 auto"></div>
<div class="blank20"></div>
<div class="main_box">
	<div class="hyzq_1">
		<ul>
		<?php if ($this->_var['goods_list']): ?>
		<?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['names']['iteration']++;
?>
		<?php if ($this->_var['goods']): ?>
        	<li <?php if ($this->_foreach['names']['iteration'] % 3 == '0'): ?>class="li_1"<?php endif; ?>>
            	<div class="hyzq_div">
           	    <div class="hyzq_div1 fl">
                    	<div class="hyzq_div1_img">
                        	<a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><img class="fr" src="<?php echo $this->_var['goods']['goods_img']; ?>" width="130" height="245" /></a>
                            <div class="hyzq_div1_dz">
                            	<?php echo $this->_var['goods']['zhekou']; ?>
                            </div>
                          <div class="clear"></div>
                        </div>
                        <div class="hyzq_div2">
                        	<p>已售出：&nbsp;<span><?php echo $this->_var['goods']['yishou']; ?></span>&nbsp;瓶</p>
                        	<p>好评率：&nbsp;<span><?php echo $this->_var['goods']['haopin']; ?>%</span></p>
                        </div>    
                  </div>
                	<div class="hyzq_div1 hyzq_div3 fr">
                    	<h2><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>"><?php echo $this->_var['goods']['goods_name']; ?><br /><?php echo $this->_var['goods']['goods_name_e']; ?></a></h2>
                        <p class="p_1"><?php echo $this->_var['goods']['goods_qitajie']; ?>&nbsp;</p>
                        <?php $_from = $this->_var['goods']['properties']['pro']['商品属性']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'properties');if (count($_from)):
    foreach ($_from AS $this->_var['properties']):
?>
                        <?php if ($this->_var['properties']['name'] == '单支' || $this->_var['properties']['name'] == '一箱' || $this->_var['properties']['name'] == '十箱' || $this->_var['properties']['name'] == '评分'): ?>
                        <p class="p_2"><?php echo $this->_var['properties']['name']; ?>：<span><?php echo $this->_var['properties']['value']; ?></span></p>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        <p class="p_2"><a href="goods.php?id=<?php echo $this->_var['goods']['goods_id']; ?>">立即购买</a></p>
                    </div>
                    <div class="clear"></div>
                </div>
            </li>
        <?php if ($this->_foreach['names']['iteration'] % 3 == 0): ?>
        </ul>
       <div class="clear"></div>
       <div class="fgx"></div>
       <ul>
       <?php endif; ?>
            <?php endif; ?>
       
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endif; ?>


        <div class="blank20"></div>
        <div style="height: 68px;
    margin-left: 247px;">
<?php echo $this->fetch('library/pages.lbi'); ?>
</div>
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