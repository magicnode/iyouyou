<?php if ($this->_var['pager']['page_count'] > 1): ?>
<div class="pages">
	<?php if ($this->_var['pager']['page'] > 1): ?>
            <?php if ($this->_var['pager']['is_ajax'] == 1): ?>
                <a href="javascript:void(0)" url="<?php echo $this->_var['pager']['page_prev']; ?>" class="page_prev page_btn" page="<?php echo $this->_var['pager']['prev_page']; ?>"><?php
echo lang("PAGE_PREV"); 
?></a>
            <?php else: ?>
                <a href="<?php echo $this->_var['pager']['page_prev']; ?>"  class="page_prev page_btn" page="<?php echo $this->_var['pager']['prev_page']; ?>"><?php
echo lang("PAGE_PREV"); 
?></a>
            <?php endif; ?>
	
	<?php endif; ?>
	<?php $_from = $this->_var['pager']['page_nums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'page_num');if (count($_from)):
    foreach ($_from AS $this->_var['page_num']):
?>
	<?php if ($this->_var['pager']['page'] == $this->_var['page_num']['name']): ?>
	<span><?php echo $this->_var['page_num']['name']; ?></span>
	<?php elseif ($this->_var['page_num']['name'] == '...'): ?>
	<i>...</i>
	<?php else: ?>
            <?php if ($this->_var['pager']['is_ajax'] == 1): ?>
                <a class="page_btn" href="javascript:void(0);" url="<?php echo $this->_var['page_num']['url']; ?>" page="<?php echo $this->_var['page_num']['name']; ?>"><?php echo $this->_var['page_num']['name']; ?></a>
            <?php else: ?>
                <a class="page_btn" href="<?php echo $this->_var['page_num']['url']; ?>" page="<?php echo $this->_var['page_num']['name']; ?>"><?php echo $this->_var['page_num']['name']; ?></a>
            <?php endif; ?>
	
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	<?php if ($this->_var['pager']['page'] < $this->_var['pager']['page_count']): ?>
            <?php if ($this->_var['pager']['is_ajax'] == 1): ?>
                <a class="page_btn" href="javascript:void(0);" url="<?php echo $this->_var['pager']['page_next']; ?>" class="page_next" page="<?php echo $this->_var['pager']['next_page']; ?>"><?php
echo lang("PAGE_NEXT"); 
?></a>
            <?php else: ?>
                <a class="page_btn" href="<?php echo $this->_var['pager']['page_next']; ?>" class="page_next" page="<?php echo $this->_var['pager']['next_page']; ?>"><?php
echo lang("PAGE_NEXT"); 
?></a>
            <?php endif; ?>
	
	<?php endif; ?>
</div>
<?php endif; ?>