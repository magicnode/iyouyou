<div style="padding:20px; height:30px; line-height:30px;">
	<div style="float:left; ">
	线路订单，单号：<span style="color:#006daf; font-size:16px; font-weight:bolder;"><?php echo $this->_var['order_data']['sn']; ?></span>  
	&nbsp;&nbsp;&nbsp;&nbsp;支付金额：<span style="color:#f30;">&yen;</span>
	<span style="color:#f30; font-size:16px; font-weight:bolder;"><?php 
$k = array (
  'name' => 'format_price_to_display',
  'v' => $this->_var['order_data']['money'],
);
echo $k['name']($k['v']);
?></span>
	</div>
	
	<div style="float:right; font-size:14px;">
	您需要支付：
	<span style="color:#f30; font-size:22px; font-weight:bolder;">
	&yen; <?php 
$k = array (
  'name' => 'format_price_to_display',
  'v' => $this->_var['order_data']['money'],
);
echo $k['name']($k['v']);
?> 
	</span>
	元
	</div>
	<div class="blank1"></div>
	<input type="hidden" name="money" value="<?php 
$k = array (
  'name' => 'format_price_to_display',
  'v' => $this->_var['order_data']['money'],
);
echo $k['name']($k['v']);
?>" />
	<input type="hidden" name="subject" value="<?php echo $this->_var['subject']; ?>" />
</div>