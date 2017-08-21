<?php if ($this->_var['rand_tourline']): ?>
<div class="blank"></div>
<div class="side_rand">
	<div class="dt">猜你喜欢</div>
	<div class="dx">
		<?php $_from = $this->_var['rand_tourline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rtour');if (count($_from)):
    foreach ($_from AS $this->_var['rtour']):
?>
			<div class="thumb"><a href="<?php echo $this->_var['rtour']['url']; ?>" title="<?php echo $this->_var['rtour']['name']; ?>"><img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['rtour']['image'],
  'w' => '160',
  'h' => '90',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" /></a></div>
			<div class="t"><a href="<?php echo $this->_var['rtour']['url']; ?>" title="<?php echo $this->_var['rtour']['name']; ?>"><?php 
$k = array (
  'name' => 'msubstr',
  'value' => $this->_var['rtour']['name'],
  'a' => '0',
  'b' => '22',
);
echo $k['name']($k['value'],$k['a'],$k['b']);
?></a></div>
			<div class="price">&yen;<?php echo $this->_var['rtour']['price']; ?></a></div>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>
</div>
<div class="blank15"></div>
<?php endif; ?>