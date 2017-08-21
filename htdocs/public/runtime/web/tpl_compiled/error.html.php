<?php
	$this->_var['pagecss'][] = TMPL_REAL."/css/style.css";
	$this->_var['pagecss'][] = TMPL_REAL."/css/weebox.css";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.bgiframe.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.weebox.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.pngfix.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/lazyload.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/script.js";
	$this->_var['cpagejs'][] = TMPL_REAL."/js/script.js";
?>
<?php echo $this->fetch('inc/header.html'); ?> 
<?php if ($this->_var['stay'] == 0): ?>
<meta http-equiv="refresh" content="3;URL=<?php echo $this->_var['jump']; ?>" />
<?php endif; ?>
<div class="shadow_bg">
	<div class="wrap white_box linebox"">

							<div class="msgbox error">
								<p class="clearfix">
								<?php if ($this->_var['integrate_result']): ?>
								<?php echo $this->_var['integrate_result']; ?>
								<?php endif; ?>
								<?php echo $this->_var['msg']; ?>	
								</p>
								<div class="blank"></div>
								<?php if ($this->_var['stay'] == 0): ?>
								<div class="return_jump">								
									<?php
echo lang("AUTO_JUMP_LINK_TIP",$this->_var["jump"]); 
?>	
								</div>
								<?php endif; ?>
							</div>


	</div>
</div>
					
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?> 