<div class="blank15"></div>
<div class="ur_here wrap">
	<a href="<?php echo $this->_var['APP_ROOT']; ?>/">首页</a>
	<?php $_from = $this->_var['ur_here']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ur');if (count($_from)):
    foreach ($_from AS $this->_var['ur']):
?>
	&nbsp;>&nbsp;
	<?php if ($this->_var['ur']['url']): ?>
	<a href="<?php echo $this->_var['ur']['url']; ?>"><?php echo $this->_var['ur']['name']; ?></a>
	<?php else: ?>
	<?php echo $this->_var['ur']['name']; ?>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
<div class="blank"></div>