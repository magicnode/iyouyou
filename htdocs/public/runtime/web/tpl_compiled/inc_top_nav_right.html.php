<?php if (app_conf ( "GUANZHU_WEIBO_URL" ) != ''): ?>
<div class="f_l nav_weibo mr_5"><a href="<?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'GUANZHU_WEIBO_URL',
);
echo $k['name']($k['v']);
?>" target="_blank">关注微博</a></div>
<?php endif; ?>
<?php if (app_conf ( "GUANZHU_WEIXIN_IMAGE" ) != ''): ?>
<div class="f_l nav_weixin mr_5" id="weixin_button" >
	<a href="javascript:viod(0);">关注微信</a>
	<div class="qr_code_img">
		<ul>
			<li class="qr_title">
				用微信扫－扫
			</li>
			<li class="li_img">
				<img src="<?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'GUANZHU_WEIXIN_IMAGE',
);
echo $k['name']($k['v']);
?>">
			</li>
		</ul>
		
	</div>
</div>
<?php endif; ?>
 <!--
<div class="f_l nav_site_map"><a href="#">网站导航</a><span class="icon_down"></span></div>-->