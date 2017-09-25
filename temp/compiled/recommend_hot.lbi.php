<?php if ($this->_var['hot_goods']): ?> 
  <?php if ($this->_var['cat_rec_sign'] != 1): ?>
      <div class="rxcp_r">
      <div class="hd rx"  id="itemHot">
          <div class="tit">
          <span>1F</span><font>热销产品</font>
          <div class="clear"></div></div>
        <ul id="on2">
        <?php if ($this->_var['cat_rec'] [ 3 ]): ?>
        <?php $_from = $this->_var['cat_rec']['3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rec_data');$this->_foreach['nmaes'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nmaes']['total'] > 0):
    foreach ($_from AS $this->_var['rec_data']):
        $this->_foreach['nmaes']['iteration']++;
?>
          <?php if ($this->_foreach['nmaes']['iteration'] < '2'): ?>
        <li >
                  <a href="javascript:void(0)" style="text-decoration: none;" onmouseover="change_tab_style('itemHot', 'li', this);get_cat_recommend(3,<?php echo $this->_var['rec_data']['cat_id']; ?>)">
                  <input type="hidden" id="diyi" value="<?php echo $this->_var['rec_data']['cat_id']; ?>">
                  <?php echo $this->_var['rec_data']['cat_name']; ?>
                </li>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          <?php $_from = $this->_var['cat_rec']['3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rec_data');$this->_foreach['nmaes'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nmaes']['total'] > 0):
    foreach ($_from AS $this->_var['rec_data']):
        $this->_foreach['nmaes']['iteration']++;
?>
          <?php if ($this->_foreach['nmaes']['iteration'] > '1'): ?>
                <li >
                  <a href="javascript:void(0)" style="text-decoration: none;" onmouseover="change_tab_style('itemHot', 'li', this);get_cat_recommend(3, <?php echo $this->_var['rec_data']['cat_id']; ?>)">
                  <?php echo $this->_var['rec_data']['cat_name']; ?>
                </li>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php endif; ?>
                </ul>
      </div>
  <?php endif; ?>
<?php if ($this->_var['cat_rec'] [ 3 ]): ?>  
<script>
    window.onload= function(){
        var danzhi = document.getElementById('diyi').value;
        get_cat_recommend(3,danzhi);
    };
</script>
<?php endif; ?>
      <div id="show_hot_area" class="bd">
                
            













              <ul>
    <?php $_from = $this->_var['hot_goods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_0_97338000_1463543930');if (count($_from)):
    foreach ($_from AS $this->_var['goods_0_97338000_1463543930']):
?>
          <li  class="li1">
            <div class="pic">
            <a href="<?php echo $this->_var['goods_0_97338000_1463543930']['url']; ?>">
            <img src="<?php echo $this->_var['goods_0_97338000_1463543930']['thumb']; ?>" width="185" height="160" /></a></div>
            <div class="wz">
                          <div class="jg">
                                <span>￥<?php echo $this->_var['goods_0_97338000_1463543930']['shop_price']; ?>.00</span>
                              <s>￥<?php echo $this->_var['goods_0_97338000_1463543930']['market_price']; ?></s>
                            </div>
                          <div class="tit">
                          <a href="<?php echo $this->_var['goods_0_97338000_1463543930']['url']; ?>">
                          <?php echo $this->_var['goods_0_97338000_1463543930']['short_style_name']; ?></a></div>
                            <div class="yshp">
                              <div class="yshp_l">已售：<span><?php echo $this->_var['goods_0_97338000_1463543930']['count_xiaoliang']; ?></span></div>
                              <div class="yshp_r">好评：<span><?php if ($this->_var['goods_0_97338000_1463543930']['count_comment'] == '0'): ?>100%<?php else: ?><?php echo $this->_var['goods_0_97338000_1463543930']['count_comment']; ?>%<?php endif; ?></span></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="jb01"></div>
          </li>
  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
                <div class="clear"></div>
                </div>
      </div>
    </div>
<?php endif; ?>