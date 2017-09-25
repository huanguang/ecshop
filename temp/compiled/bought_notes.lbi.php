




<?php if ($this->_var['notes']): ?>
<div class="product2014_content_3" id="bodyb_3" style="display: block;"> 
      <div class="con"> 
          <table width="100%" border="0" cellspacing="0" cellpadding="0" class="jyjl_ta">
  <tbody><tr>
    <td width="20%" align="center" class="jyjl_td">买 家</td>
    <td width="20%" align="center" class="jyjl_td">产品价格</td>
    <td width="20%" align="center" class="jyjl_td">购买数量</td>
    <td width="20%" align="center" class="jyjl_td">付款时间</td>
    <td width="20%" align="center" class="jyjl_td">产品名称</td>
  </tr>
  <?php $_from = $this->_var['notes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'note');if (count($_from)):
    foreach ($_from AS $this->_var['note']):
?>
  <tr>
    <td align="center"><?php if ($this->_var['note']['user_name']): ?><?php echo htmlspecialchars($this->_var['note']['user_name']); ?><?php else: ?><?php echo $this->_var['lang']['anonymous']; ?><?php endif; ?> <span class="span_1"></span></td>
    <td align="center"><span class="span_2"></span></td>
    <td align="center"><?php echo $this->_var['note']['goods_number']; ?></td>
    <td align="center"> <?php echo $this->_var['note']['add_time']; ?> </td>
    <td align="center"><?php echo sub_str($this->_var['note']['goods_name'],12); ?></td>
  </tr>
 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</tbody></table>
      </div> 
    </div>

<?php endif; ?>
