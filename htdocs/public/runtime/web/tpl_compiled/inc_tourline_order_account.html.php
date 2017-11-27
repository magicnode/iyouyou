<?php if ($this->_var['userinfo']['money'] > 0): ?>
<div id="account_part" class="order_box ">
    <h2>账户余额<?php echo $this->_var['user_info']['id']; ?></h2>
	<div class="routes_info pl15">
		<label><input type="checkbox" name="account_pay" value="<?php 
$k = array (
  'name' => 'format_price_to_display',
  'v' => $this->_var['userinfo']['money'],
);
echo $k['name']($k['v']);
?>">使用账户余额</label>
		&nbsp;&nbsp;
		当前账户可用金额：<span class="f60" style="font-size:14px"><b><?php 
$k = array (
  'name' => 'format_price_to_display',
  'v' => $this->_var['userinfo']['money'],
);
echo $k['name']($k['v']);
?></b></span>元
	</div>
</div>
<div class="blank15"></div>
<?php endif; ?>