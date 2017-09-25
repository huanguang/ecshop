
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
    <td width="80" align="left" nowrap><strong><span class="ar"><?php echo $this->_var['name']; ?>
      
    </span></strong></td>
    <td align="left" ><?php if ($this->_var['pin']): ?><div class="sed2 f_xz">
    <?php $_from = $this->_var['pin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pinpai');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['pinpai']):
        $this->_foreach['names']['iteration']++;
?>
    <a href="#"  title="清除此项目"><?php echo $this->_var['pinpai']; ?></a>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div><?php endif; ?>
    <?php if ($this->_var['brand_name']): ?><div class="sed1 f_xz"><a href="category.php?id=<?php echo $this->_var['cat_id']; ?>"  title="清除此项目">
    <?php echo $this->_var['brand_name']; ?></a></div><?php endif; ?></td>
    <td width="100" align="right"><div class="txt1"><a href="javascript:" onClick="change()" class="abk">开启多选模式</a></div><div class="txt2"><a href="javascript:" onClick="change()" class="abk">关闭多选模式</a></div></td>
  </tr>
</table>

    
  </div>
  <div class="div_f3">
    <table width="100%" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="70" align="right" valign="top" class="line1 txt_1p20">品牌：</td>
         <!--程序员，这点小空格不能去掉的啊！为了不让一组词夸2行，我设了一组词不换行咯，项目后台动态,注意某行有项目被选择时该行'<tr>....</tr>'隐藏，这里为了做效果全显示了！,第一个label做了一个for=""，后面没做了，实际是要的--> <td class="line1">
         <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');$this->_foreach['names'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['names']['total'] > 0):
    foreach ($_from AS $this->_var['brand']):
        $this->_foreach['names']['iteration']++;
?>
         <?php if ($this->_foreach['names']['iteration'] < 2): ?> 
         
         <a href="<?php echo $this->_var['brand']['url']; ?>" class="box1 ab" <?php if ($this->_var['brand']['selected']): ?>style="color:red;"<?php endif; ?>><?php echo $this->_var['brand']['brand_name']; ?></a>
         
         <?php endif; ?>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
              <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');$this->_foreach['namess'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['namess']['total'] > 0):
    foreach ($_from AS $this->_var['brand']):
        $this->_foreach['namess']['iteration']++;
?>
              <?php if ($this->_foreach['namess']['iteration'] > 1): ?> 
        <a href="<?php echo $this->_var['brand']['url']; ?>" class="box1 ab" <?php if ($this->_var['brand']['selected']): ?>style="color:red;"<?php endif; ?>><?php echo $this->_var['brand']['brand_name']; ?></a> <label class="box2"><input class="aass" name="hy" type="checkbox" <?php if ($this->_var['brand']['selected']): ?>checked<?php endif; ?> value="<?php echo $this->_var['brand']['brand_name']; ?>" ><?php echo $this->_var['brand']['brand_name']; ?> </label>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
        </tr>
 
        <tr>
          <td width="70" align="right" valign="top" class="line1 txt_1p20">价格：</td>      
<td class="line1">
<?php if ($this->_var['price_grade']['1']): ?>
<?php $_from = $this->_var['price_grade']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'grade');if (count($_from)):
    foreach ($_from AS $this->_var['grade']):
?>
<a href="<?php echo $this->_var['grade']['url']; ?>" class="box1 ab" <?php if ($this->_var['grade']['selected']): ?>style="color:red;"<?php endif; ?>><?php echo $this->_var['grade']['price_range']; ?></a> <label class="box2"  for="kc01"><input name="kc" type="checkbox" value="1"  id="kc01"><?php echo $this->_var['grade']['price_range']; ?></label>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
<?php endif; ?>
</td>
        </tr>
        <?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_10693900_1463583058');if (count($_from)):
    foreach ($_from AS $this->_var['filter_attr_0_10693900_1463583058']):
?>
        <?php if ($this->_var['filter_attr_0_10693900_1463583058']['filter_attr_name'] == '原产地'): ?>
        <tr >
          <td align="right" valign="top" class="line1 txt_1p20"><?php echo htmlspecialchars($this->_var['filter_attr_0_10693900_1463583058']['filter_attr_name']); ?>：</td>
          <td class="line1">
          <?php $_from = $this->_var['filter_attr_0_10693900_1463583058']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');if (count($_from)):
    foreach ($_from AS $this->_var['attr']):
?>
          <a href="<?php echo $this->_var['attr']['url']; ?>" class="box1 ab" <?php if ($this->_var['attr']['selected']): ?> style="color:red;"<?php endif; ?>><?php echo $this->_var['attr']['attr_value']; ?></a> <label class="box2"><input class="bb" name="dq"<?php if ($this->_var['attr']['selected']): ?> checked<?php endif; ?> type="checkbox" value="<?php echo $this->_var['attr']['attr_value']; ?>"> <?php echo $this->_var['attr']['attr_value']; ?></label>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </td>           
          </tr>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
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
  window.location.href="<?php echo $this->_var['script_name']; ?>.php?category=<?php echo $this->_var['category']; ?>&display=<?php echo $this->_var['pager']['display']; ?>&brand=<?php echo $this->_var['brand_id']; ?>&price_min=<?php echo $this->_var['price_min']; ?>&pin="+cc+"&shux="+ss+"&price_max=<?php echo $this->_var['price_max']; ?>&filter_attr=<?php echo $this->_var['filter_attr']; ?>&page=<?php echo $this->_var['pager']['page']; ?>&sort=shop_price&order=<?php if ($this->_var['pager']['sort'] == 'shop_price' && $this->_var['pager']['order'] == 'ASC'): ?>DESC<?php else: ?>ASC<?php endif; ?>#goods_list";
}
  </script>
        </tr>
      </table>
      <div class="clear"></div>
  </div></form>
  <div id="lyu_c_2" style="display:none">
  <div class="div_f3">
    <table width="100%" border="0" cellspacing="0" cellpadding="6">

    <?php $_from = $this->_var['filter_attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'filter_attr_0_10795600_1463583058');if (count($_from)):
    foreach ($_from AS $this->_var['filter_attr_0_10795600_1463583058']):
?>
        <tr>
          <td align="right" valign="top" class="line1 txt_1p20"><?php echo htmlspecialchars($this->_var['filter_attr_0_10795600_1463583058']['filter_attr_name']); ?>：</td>
          <td class="line1 ab a20_2em_nowrap">
          <?php $_from = $this->_var['filter_attr_0_10795600_1463583058']['attr_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'attr');if (count($_from)):
    foreach ($_from AS $this->_var['attr']):
?>

              <a href="<?php echo $this->_var['attr']['url']; ?>" <?php if ($this->_var['attr']['selected']): ?> style="color:red;"<?php endif; ?>><?php echo $this->_var['attr']['attr_value']; ?></a> 
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </tr>

        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      </table>
  </div>
  <div class="clear"></div>
  <div  class="div_f5" id="lyu_t_1" onClick="Tb(1, 2, 'lyu', '');" ><img src="themes/miqinew/images/div_f5_collapse.gif" width="1200" height="12" class="imgcss hand" title="收起"></div>
         
    </div>
  
    <div  class="div_f5" id="lyu_c_1"  style="display:"><div id="lyu_t_2" onClick="Tb(2, 2, 'lyu', '');" ><img src="themes/miqinew/images/div_f5_expand.gif" width="1200" height="12" class=" hand"  title="展开"></div></div>

    <div class="clear"></div>    
</div>
</div>