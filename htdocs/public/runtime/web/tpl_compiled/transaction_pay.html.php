<?php
	$this->_var['pagecss'][] = TMPL_REAL."/css/style.css";
	$this->_var['pagecss'][] = TMPL_REAL."/css/weebox.css";
	$this->_var['pagecss'][] = TMPL_REAL."/css/transaction.css";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.bgiframe.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.weebox.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.pngfix.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/lazyload.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/script.js";
	$this->_var['cpagejs'][] = TMPL_REAL."/js/script.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/transaction_pay.js";
	$this->_var['cpagejs'][] = TMPL_REAL."/js/transaction_pay.js";
?>
<?php echo $this->fetch('inc/header_order.html'); ?>
<div class="blank15"></div>
<div class="wrap">
	<form action="<?php
echo parse_url_tag("u:transaction#dopay|"."".""); 
?>" method="post" class="pay_form" target="_blank">
	<input type="hidden" name="ot" value="<?php echo $this->_var['order_type']; ?>" />
	<input type="hidden" name="sn" value="<?php echo $this->_var['order_sn']; ?>" />
	<div class="order_display">
		<?php echo $this->_var['order_display']; ?>
	</div>
	<div class="blank15"></div>
	<div class="blank15"></div>
	<div class="blank15"></div>
	<div class="blank15"></div>
	<div class="payment_tabs">
		<ul>
			<?php if ($this->_var['payment_list']['bank_payment']): ?>
			<li class="current" rel="bank">网银支付</li>
			<?php endif; ?>
			<?php if ($this->_var['payment_list']['common_payment']): ?>
			<li rel="common" class="<?php if (empty ( $this->_var['payment_list']['bank_payment'] )): ?>current<?php endif; ?>">支付平台</li>
			<?php endif; ?>
		</ul>
		<div class="payment_box clearfix">
			<?php if ($this->_var['payment_list']['bank_payment']): ?>
			<div class="box_item current" rel="bank">
			<?php $_from = $this->_var['payment_list']['bank_payment']['bank_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'bank_item');if (count($_from)):
    foreach ($_from AS $this->_var['bank_item']):
?>
			<div class="pay_item" rel="<?php echo $this->_var['bank_item']['bank_type']; ?>">
			<input type="radio" name="payment_class"  value="<?php echo $this->_var['payment_list']['bank_payment']['class_name']; ?>" />
			<img src="<?php echo $this->_var['bank_item']['logo']; ?>" alt="<?php echo $this->_var['bank_item']['name']; ?>" />
			</div>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			<div class="blank1"></div>
			<input type="hidden" name="bank_type" />
			<a href="#" class="submit_form long_btn">确认支付</a>
			<div class="blank1"></div>
			</div>
			<?php endif; ?>
			<?php if ($this->_var['payment_list']['common_payment']): ?>
			<div class="box_item <?php if (empty ( $this->_var['payment_list']['bank_payment'] )): ?>current<?php endif; ?>" rel="common">
				<?php $_from = $this->_var['payment_list']['common_payment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pay_item');if (count($_from)):
    foreach ($_from AS $this->_var['pay_item']):
?>
				<div class="pay_item">
					<input type="radio" name="payment_class" value="<?php echo $this->_var['pay_item']['class_name']; ?>" />
					<img src="<?php echo $this->_var['pay_item']['logo']; ?>" alt="<?php echo $this->_var['pay_item']['name']; ?>" />
				</div>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<div class="pay_item">
					<input type="radio" name="payment_class" value="KqPay" />
					<img src="https://img.99bill.com/public/img/99billlogo/logo-header.png" alt="快33钱" />
				</div>
				<div class="blank1"></div>
				<a href="#" class="submit_form long_btn">确认支付</a>
				<div class="blank1"></div>
			</div>
			<?php endif; ?>
		</div>
	</div><!--end payment_tabs-->
	</form>
</div>
<?php echo $this->fetch('inc/footer_order.html'); ?>