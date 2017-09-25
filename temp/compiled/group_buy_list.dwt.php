<!DOCTYPE html>
<html>
<head>
<meta name="Generator" content="ECSHOP v2.7.3" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_var['page_title']; ?></title>
<link rel="icon" href="favicon.gif" type="image/gif" />

<link href="themes/miqinew/css/common.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/css/tuang.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/style.css" rel="stylesheet" type="text/css" />
<link href="themes/miqinew/css/common.css" type="text/css" rel="stylesheet" />
<link href="themes/miqinew/css/cart.css" type="text/css" rel="stylesheet" />
<link href="themes/miqinew/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="themes/miqinew/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="themes/miqinew/js/jquery.SuperSlide.2.1.1.js"></script>

<script type="text/javascript" src="themes/miqinew/js/nav.js"></script>
<script type="text/javascript" src="themes/miqinew/js/js.js"></script>
<script type="text/javascript" src="themes/miqinew/js/modal.js"></script>
<script type="text/javascript" src="themes/miqinew/js/tuan.js"></script>
<style>
#nav .mod_subcate{top:0;}
</style>
</head>

<body>
<?php echo $this->fetch('library/page_header.lbi'); ?>

<div class="cur_wz" style="display:none;">
  <?php echo $this->fetch('library/ur_here.lbi'); ?>
</div>

<div class="main_box">
    <div class="pinpai_tejia">
    	<ul>
        <?php $_from = $this->_var['categories_pro']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['names']['iteration']++;
?>
        <?php if ($this->_foreach['names']['iteration'] < 7): ?>
        <li><a <?php if ($this->_foreach['names']['iteration'] % 3 == 0): ?>style="margin-right:0;"<?php endif; ?> href="<?php if ($this->_foreach['names']['iteration'] == '1'): ?>#hong<?php endif; ?><?php if ($this->_foreach['names']['iteration'] == '2'): ?>#tianbai<?php endif; ?><?php if ($this->_foreach['names']['iteration'] == '3'): ?>#qipao<?php endif; ?><?php if ($this->_foreach['names']['iteration'] == '4'): ?>#juhui<?php endif; ?><?php if ($this->_foreach['names']['iteration'] == '5'): ?>#lihelibao<?php endif; ?><?php if ($this->_foreach['names']['iteration'] == '6'): ?>#qunwei<?php endif; ?>"><div class="heise_beij"></div><img src="data/category/<?php echo $this->_var['cat']['cat_img']; ?>" width="380" height="190"><div class="yanzhe"><b><?php echo $this->_var['cat']['name']; ?></b><p><?php echo $this->_var['cat']['cat_desc']; ?></p><u><?php echo $this->_var['cat']['keywords']; ?></u></div></a></li>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
    </div>


    <div class="blank10"></div>
<?php $_from = $this->_var['categories_pro']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['cat']):
        $this->_foreach['names']['iteration']++;
?>
        <?php if ($this->_foreach['names']['iteration'] < 7): ?>
    <a <?php if ($this->_foreach['names']['iteration'] == '1'): ?>name="hong" id="hong"<?php endif; ?><?php if ($this->_foreach['names']['iteration'] == '2'): ?>name="tianbai" id="tianbai"<?php endif; ?><?php if ($this->_foreach['names']['iteration'] == '3'): ?>name="qipao" id="qipao"<?php endif; ?><?php if ($this->_foreach['names']['iteration'] == '4'): ?>name="juhui" id="juhui"<?php endif; ?><?php if ($this->_foreach['names']['iteration'] == '5'): ?>name="lihelibao" id="lihelibao"<?php endif; ?><?php if ($this->_foreach['names']['iteration'] == '6'): ?>name="qunwei" id="qunwei"<?php endif; ?>></a>
  	<div class="gexin_biaoti"><span><?php echo $this->_var['cat']['name']; ?></span></div>

    <div class="hongjiu_geshu">
        <?php $_from = $this->_var['cat']['goods_tg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['goodss'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['goodss']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['goodss']['iteration']++;
?>
        <dl <?php if ($this->_foreach['goodss']['iteration'] % 2 == 0): ?>style="border-right:1px solid #e5e5e5;width:588px;"<?php endif; ?>>
            <dt>
                <a href="group_buy.php?act=view&id=<?php echo $this->_var['goods']['act_id']; ?>"><img src="<?php echo $this->_var['goods']['goods_img']; ?>" width="185" height="185"><div class="jiaren_yyue"><b>限量<?php echo $this->_var['goods']['ext_info']['restrict_amount']; ?>支 剩余<?php echo $this->_var['goods']['shengyu']; ?>支</b><div class="pro_time2"  ><p><i class="time_icon2" ></i><span  class="endtime" value="<?php echo $this->_var['goods']['end_time']; ?>" showday="show"></span></p></div></div></a>
            </dt>
            <dd><b><a href="group_buy.php?act=view&id=<?php echo $this->_var['goods']['act_id']; ?>"><?php echo $this->_var['goods']['act_name']; ?></a></b>
          <p class="ershisi_001"><?php echo $this->_var['goods']['act_desc']; ?></p><p class="ershisi_002"><span>酒评：</span><?php echo $this->_var['goods']['act_desc2']; ?></p><div class="jiage_shuzi"><span>￥<strong><?php echo $this->_var['goods']['shop_price']; ?></strong></span><a href="group_buy.php?act=view&id=<?php echo $this->_var['goods']['act_id']; ?>" class="ljgm" style="    color: #fff;
    text-decoration: none;">立即抢购</a></div><div class="jiage_paixun"><span>原价<br>￥<?php echo $this->_var['goods']['market_price']; ?></span><span>折扣<br><?php echo $this->_var['goods']['zhekou']; ?>折</span><span style="border-right:0;">可节省<br>￥<?php echo $this->_var['goods']['jianjiage']; ?></span></div></dd>
        </dl>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        

    </div>
    <div class="tggd"></div>
    <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<style>
    .endtime{
        color:red;
    }
</style>

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
                    var str = '剩'+myD+'天'+myH_show+'小时'+myM+'分'+myS+'秒';
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

</div>

<?php echo $this->fetch('library/page_footer.lbi'); ?>
</body>
</html>