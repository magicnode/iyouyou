<?php
	$this->_var['pagecss'][] = TMPL_REAL."/css/style.css";
	$this->_var['pagecss'][] = TMPL_REAL."/css/weebox.css";
	$this->_var['pagecss'][] = TMPL_REAL."/css/help.css";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.bgiframe.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.weebox.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.pngfix.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/lazyload.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/script.js";
	$this->_var['cpagejs'][] = TMPL_REAL."/js/script.js";
?>
<?php echo $this->fetch('inc/header.html'); ?> 
<div class="blank"></div>
<?php echo $this->fetch('inc/ur_here.html'); ?>
<div class="blank"></div>
<div class="wrap">
	<div class="help_cate">
		<div class="cate_title">帮助信息索引</div>
		<ul>
			<?php $_from = $this->_var['help_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cate');if (count($_from)):
    foreach ($_from AS $this->_var['help_cate']):
?>
			<li <?php if ($this->_var['current_cate']['id'] == $this->_var['help_cate']['id']): ?> class="current"<?php endif; ?>>				
				<a href="<?php echo $this->_var['help_cate']['url']; ?>"><?php echo $this->_var['help_cate']['name']; ?></a>				
			</li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
	</div>
	<div class="help_main">
		<div class="current_cate_title"><?php echo $this->_var['current_cate']['name']; ?></div>
		<?php $_from = $this->_var['current_cate']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_item');$this->_foreach['help_page_list'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['help_page_list']['total'] > 0):
    foreach ($_from AS $this->_var['help_item']):
        $this->_foreach['help_page_list']['iteration']++;
?>
			<?php if ($this->_var['help_item']['id'] == $this->_var['current_id']): ?>
				<div class="help_row">
					<div class="title_row">
					<span class="open"></span> 
					<i class="iter"><?php echo $this->_foreach['help_page_list']['iteration']; ?>.</i>
					<a href="javascript:void(0);" title="<?php echo $this->_var['help_item']['name']; ?>"><?php echo $this->_var['help_item']['name']; ?></a>
					</div>
					<?php if ($this->_var['help_item']['content']): ?>					
					<div class="help_content">
						<div class="arrow"></div>
						<div>
						<?php echo $this->_var['help_item']['content']; ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			<?php else: ?>
				<div class="help_row">
					<div class="title_row">
					<span class="close"></span> 
					<i class="iter"><?php echo $this->_foreach['help_page_list']['iteration']; ?>.</i>
					<a href="<?php echo $this->_var['help_item']['url']; ?>" <?php if ($this->_var['help_item']['blank'] == 1): ?>target="_blank"<?php endif; ?> title="<?php echo $this->_var['help_item']['name']; ?>"><?php echo $this->_var['help_item']['name']; ?></a>
					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	</div>
</div>
<div class="blank15"></div><div class="blank15"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 