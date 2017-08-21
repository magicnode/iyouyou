<?php if ($this->_var['user']): ?>
<span>
	<a href="<?php
echo parse_url_tag("u:user|"."".""); 
?>" style="font-weight:bold; color:#0088d2;"><?php echo $this->_var['user']['user_name']; ?></a><?php if ($this->_var['user']['new_msg_count'] > 0): ?>&nbsp;&nbsp;<a href="<?php
echo parse_url_tag("u:user#msg|"."".""); 
?>" style="color:red;">新消息(<?php echo $this->_var['user']['new_msg_count']; ?>)</a><?php endif; ?>&nbsp;&nbsp;<a href="<?php
echo parse_url_tag("u:uc_order|"."".""); 
?>" target="_blank">我的订单</a> | <a href="<?php
echo parse_url_tag("u:user#logout|"."".""); 
?>">退出</a>
</span>	
<?php else: ?>
<span>
	<a href="<?php
echo parse_url_tag("u:user#login|"."".""); 
?>" target="_blank">登录</a>  	|  <a href="<?php
echo parse_url_tag("u:user#regist|"."".""); 
?>" target="_blank">注册</a> &nbsp;&nbsp;<a href="<?php
echo parse_url_tag("u:uc_order|"."".""); 
?>" target="_blank">我的订单</a>
</span>	
<?php endif; ?>
