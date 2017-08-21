<div id="ajax_login" class="ajax_login clearfix">
	<div class="left_ajax_login">
	<?php 
$k = array (
  'name' => 'load_api',
  'type' => '1',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>
	</div>
	<div class="right_ajax_login">
	<form name="login_form" id="ajax_login_form" type="post" action="<?php
echo parse_url_tag("u:user#dologin|"."".""); 
?>">
		<label>使用已有帐号登录</label>
		<div class="blank"></div>
		<input type="text" name="user_key" holder="请输入邮箱/手机/用户名" class="user_key" />
		<div class="blank"></div>
		<input type="password" name="user_pwd" holder="请输入密码" class="user_pwd" />
		<div class="blank"></div>
		<input type="text" name="user_verify" holder="验证码" class="user_verify" /> <span class="verify_img"><?php 
$k = array (
  'name' => 'verifyimg',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?></span>
		<div class="blank"></div>
		<input type="checkbox" name="save_user" value="1" class="save_user"  /> <label class="save_user_tip">保存登录信息，两周内免登录 </label>
		<div class="blank"></div>
		<a href="javascript:void(0);" id="ajax_login_btn">登录</a>&nbsp;&nbsp; <a href="<?php
echo parse_url_tag("u:user#getpwd|"."".""); 
?>" target="_blank">忘记密码？</a> <a href="<?php
echo parse_url_tag("u:user#regist|"."".""); 
?>" target="_blank">新用户注册</a>
		<div class="blank"></div>
		<input type="submit" style="display:none;" />
	</form>
	</div>
</div>