<?php if ($this->_var['topsale_list']): ?>
<div class="blank"></div>
<div class="saletop_list">
	<div class="hd">
		销量排行榜
	</div>
	<ul>
		<?php $_from = $this->_var['topsale_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sale');$this->_foreach['sales'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sales']['total'] > 0):
    foreach ($_from AS $this->_var['sale']):
        $this->_foreach['sales']['iteration']++;
?>
		<li>
			<div class="tit"><em class="em_<?php echo $this->_foreach['sales']['iteration']; ?>"><?php echo $this->_foreach['sales']['iteration']; ?></em><a href="<?php echo $this->_var['sale']['url']; ?>"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['sale']['name'],
  'a' => '0',
  'b' => '8',
);
echo $k['name']($k['v'],$k['a'],$k['b']);
?></a></div>
			<div class="current_price f_l"><em>&yen;<?php echo $this->_var['sale']['price']; ?></em>起</div>
		</li>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</ul>
</div>
<?php endif; ?>