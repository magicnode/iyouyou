
<form name="getpwd_form" action="<?php
echo parse_url_tag("u:user#getpwd_verifyuser|"."".""); 
?>" method="post">
	<div class="field">
			<span class="field_title">帐号名</span>
			<span class="field_content">
			<input type="text"  class="ui-textbox"  holder="请输入用户名/邮箱/手机号码" name="user_key" size="30">
			</span>
			<span class="field_tip"></span>
	</div>
	<div class="blank"></div>
	
	<div class="field">
			<span class="field_title"></span>
			<span class="field_content">
			<input type="text"  class="ui-textbox"  holder="验证码" name="user_verify" size="20" style="width:80px; float:left;">
			<span style=" float:left; margin-left:10px;" id="getpwd_verify"><?php 
$k = array (
  'name' => 'verifyimg',
  'vid' => 'verify',
  'w' => '48',
  'h' => '22',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?></span>
			</span>
			<span class="field_tip"></span>
	</div>
	<div class="blank"></div>
	
	<div class="field">
			<span class="field_title"></span>
			<span class="field_content">
			<a href="javascript:void(0);" class="long_btn" id="next_step">下一步</a>
			<input type="submit" style="display:none;" />
				</span>
				<span class="field_tip"></span>
		</div>
		<div class="blank"></div>

	</form>
