

<script type="text/javascript">
var process_request = "<?php echo $this->_var['lang']['process_request']; ?>";
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
            <div class="mfzc">购物热线：400-1519888   <span>会员当前人数：<b><?php echo $this->_var['total_user_num']; ?></b>人</span></div>
        </div>
        <div class="top_r">
        	<div class="top_menu">
          <font id="ECS_MEMBERZONE" style="display:block; float:left;"><?php 
$k = array (
  'name' => 'member_info',
);
echo $this->_echash . $k['name'] . '|' . serialize($k) . $this->_echash;
?> </font>
                <a href="user.php?act=order_list">我的订单</a>
                <a data-toggle="modal" href="javascript:qiandao()" style="color:#d40e03;">[每日签到]</a>
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
                <!---<a href="cart.php">购物车（<b>0</b>）</a>--->
                <a href="#">防伪查询</a>
<div class="modal1" id="login-modal1" style="display:none;">
<div class="popup1" style="z-index: 999; width: 343px; height: 232px; position: fixed;display: block;" id="commentPop">
    <div class="title"><em>签到成功</em><a href="javascript:;" data-dismiss="modal">×</a></div>
    <div class="wz">
    	<p>获得总积分：<span><b>100</b></span>&nbsp;积分</p>
    	<p>恭喜您签到成功，获得<span>10</span>个积分！</p>
    	<p>连续签到可得更多积分，<span>50</span>封顶哦。</p>
    </div>
    <div class="bt" >
        <a href="javascript:;" class="bt-3" id="commentBtn" data-dismiss="modal">确 认</a>
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
            alert("<?php echo $this->_var['lang']['no_keywords']; ?>");
            return false;
        }
    }
    -->
    
    </script>



        




<div class="step3"></div>
       
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



    <?php $_from = $this->_var['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cat');if (count($_from)):
    foreach ($_from AS $this->_var['cat']):
?>
        <li class="mod_cate">
        <div class="mod_box">

            <h2><a href="<?php echo $this->_var['cat']['url']; ?>"><?php echo htmlspecialchars($this->_var['cat']['name']); ?></a></h2>

            <div class="mod_wz">

     <?php $_from = $this->_var['cat']['cat_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
                <a href="<?php echo $this->_var['childer']['url']; ?>"><?php echo htmlspecialchars($this->_var['child']['name']); ?></a>
       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                   
            </div>

        </div>
       </li>
     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>





      </ul>
      <div class="clear"></div>
      </div>
      
      <div class="yc_gg">


      <?php $_from = $this->_var['ad_all_fl']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ads');if (count($_from)):
    foreach ($_from AS $this->_var['ads']):
?>
      	<div class="gg_box">
            <a href="<?php echo $this->_var['ads']['ad_link']; ?>">
            <img src="data/afficheimg/<?php echo $this->_var['ads']['ad_code']; ?>" width="200" height="110" /></a>
        </div>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>    
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


   <li><a href="index.php"><?php echo $this->_var['lang']['home']; ?></a></li>

     
<?php $_from = $this->_var['navigator_list']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');$this->_foreach['nav_middle_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nav_middle_list']['total'] > 0):
    foreach ($_from AS $this->_var['nav']):
        $this->_foreach['nav_middle_list']['iteration']++;
?>
    <li>
        <a href="<?php echo $this->_var['nav']['url']; ?>">
         <?php echo $this->_var['nav']['name']; ?></a>
    </li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
     
    
   </ul>
  </div>



  
 </div>
 
</div>

<!--</div>-->