<?php exit;?>a:3:{s:8:"template";a:3:{i:0;s:61:"/data/home/byu2563720001/htdocs/web/Tpl/fanwe/user_login.html";i:1;s:68:"/data/home/byu2563720001/htdocs/web/Tpl/fanwe/inc/define_js_url.html";i:2;s:61:"/data/home/byu2563720001/htdocs/web/Tpl/fanwe/inc/footer.html";}s:7:"expires";i:1503322196;s:8:"maketime";i:1503321596;}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员登录 - 【悠游旅游网】出境游|国内游|上海周边旅游|自驾游|旅游网|旅游景点攻略【官网】 - 【悠游旅游网】出境游|国内游|上海周边旅游|自驾游|旅游网|旅游景点攻略【官网】-上海站</title>
<meta name="keywords" content="会员登录,悠游旅游网,上海旅游,上海周边旅游,上海出境旅游,上海国外旅游,悠游旅游" />
<meta name="description" content="会员登录,悠游旅游网为您提供上海周边旅游、出境游、自驾游、国内游、邮轮游等，提供各种旅游景点攻略,为您的出行出谋划策,旅游线路齐全,打造良好的体验。上海旅游,上海周边旅游,上海旅游网,上海自驾游,上海旅游景点,上海旅游攻略,港澳旅游价格,韩国旅游报价,台湾旅游价格,日本旅游报价,美国旅游报价,欧洲旅游价格,澳洲旅游价格,新西兰旅游价格,海岛旅游价格,巴厘岛旅游价格,长滩岛旅游报价,马尔代夫旅游价格,普吉岛旅游价格,温泉旅游价格。" />
<script type="text/javascript" src="http://i.uu-club.com/web/Tpl/fanwe/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="http://i.uu-club.com/public/runtime/web/statics/5fed8f1b1d38a102564811414ebd628a.css" />
<script type="text/javascript">
var APP_ROOT = '';
var LOADER_IMG = 'http://i.uu-club.com/web/Tpl/fanwe/images/lazy_loading.gif';
var ERROR_IMG = 'http://i.uu-club.com/web/Tpl/fanwe/images/image_err.gif';
var send_span = 5000;
var IS_RUN_CRON = 0;
var DEAL_MSG_URL = 'http://i.uu-club.com/index.php?ctl=cron&act=deal_msg_list';
</script>
<script type="text/javascript">
var ajax_login_url = "http://i.uu-club.com/index.php?ctl=user&act=ajax_login";
var user_tip_url = "http://i.uu-club.com/index.php?ctl=user&act=user_tip";
var check_user_url = "http://i.uu-club.com/index.php?ctl=user&act=check_login";
var user_follow_url = "http://i.uu-club.com/index.php?ctl=user&act=user_follow";
var user_follows_url = "http://i.uu-club.com/index.php?ctl=user&act=user_follows";
var remove_fans_url = "http://i.uu-club.com/index.php?ctl=user&act=remove_fans";
</script><script type="text/javascript" src="/public/runtime/web/lang.js"></script>
<script type="text/javascript" src="http://i.uu-club.com/public/runtime/web/statics/137c9ca402ef4c4029a5004ffa399bad.js"></script>
</head>
<body>	
<div class="user_login_logo_row wrap">
				<a class="link" href="/">
                                                <span style='display:inline-block; width:191px; height:60px; background:url(http://i.uu-club.com/public/images/upload/201604/08/09/13ed9e0f136500d815ef2c4ef3d0618467.jpg) no-repeat; _filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=http://i.uu-club.com/public/images/upload/201604/08/09/13ed9e0f136500d815ef2c4ef3d0618467.jpg, sizingMethod=scale);_background-image:none;'></span>                </a>
</div>
<div class="blank"></div>
<!-- 登录主区域 -->
<form name="login_form" id="page_login_form" type="post" action="http://i.uu-club.com/index.php?ctl=user&act=dologin">
<div class="user_login_page">
	<div class="user_login_main">
		<div class="user_login_box">
			<ul>
				<li>快速登录</li>
				<li class="regist_link"><a href="http://i.uu-club.com/index.php?ctl=user&act=regist">免费注册</a></li>
			</ul>
			<div class="box_main">
					<div class="user_key_row">
					<input type="text" class="user_key ui-textbox" name="user_key" holder="请输入邮箱/手机/用户名" />				
					</div>	
					<div class="user_pwd_row">
					<input type="password" class="user_pwd ui-textbox" name="user_pwd" holder="请输入密码" />
					</div>	
					<div class="user_verify_row">
					<input type="text" class="user_verify ui-textbox" name="user_verify" holder="验证码" />
					<span id="page_login_verify">554fcae493e564ee0dc75bdf2ebf94caverifyimg|YToxOntzOjQ6Im5hbWUiO3M6OToidmVyaWZ5aW1nIjt9554fcae493e564ee0dc75bdf2ebf94ca</span>
					</div>
					<div class="user_login_row">
						<a href="javascript:void(0);" class="login_btn" id="page_login_btn">登录</a>
						<input type="submit" style="display:none;" />
					</div>
					<div class="user_info_row">
					<input type="checkbox" value="1" name="save_user"  class="save_user_info" />
					<label>保存登录信息，两周内免登录</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="http://i.uu-club.com/index.php?ctl=user&act=getpwd">忘记密码</a>
					</div>	
					<div class="user_info_row">
					554fcae493e564ee0dc75bdf2ebf94caload_api|YToyOntzOjQ6Im5hbWUiO3M6ODoibG9hZF9hcGkiO3M6NDoidHlwZSI7czoxOiIwIjt9554fcae493e564ee0dc75bdf2ebf94ca					</div>					
					
			</div>
			<div class="box_foot"></div>
		</div>
	</div>
</div>
</form>
<!-- 登录主区域 -->
<div class="footer">
    <!--底部描述横栏-->
    <div class="footer_note">
        <div class="f_note_mail">
            <div class="note_1 f_l"></div>
            <div class="note_2 f_l"></div>
            <div class="note_3 f_l"></div>
        </div>
    </div>
    <!--end 底部描述横栏-->
	<div class="blank"></div>
	<!--底部广告-->
    <div class="footer_adv" style="width:1000px;">
    	<a href='#'  title=底部广告><img src='http://i.uu-club.com/public/adv/img/201408/21/09/20140821092837_12175.jpg'  width=1000 alt=底部广告 /></a>
    </div>
  	<!--end 底部广告-->
    <div class="blank"></div>
    <!--底部分类文章-->
    <div class="footer_cate">
        <div class="f_cate_mail">
            <ul>
            	
				
                <li class="cate_item">
                    <ul>
                        <li class="cate_title"><h3>新手上路</h3></li>
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=1&id=1" title="如何注册" >如何注册</a></li>
                        
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=1&id=2" title="如何找回密码" >如何找回密码</a></li>
                        
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=1&id=3" title="关于会员" >关于会员</a></li>
                        
						
                    </ul>
                </li>
				
                
				
                <li class="cate_item">
                    <ul>
                        <li class="cate_title"><h3>订购流程</h3></li>
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=2&id=4" title="线路的订购说明" >线路的订购说明</a></li>
                        
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=2&id=5" title="门票订购流程说明" >门票订购流程说明</a></li>
                        
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=2&id=9" title="旅游保险问题解答" >旅游保险问题解答</a></li>
                        
						
                    </ul>
                </li>
				
                
				
                <li class="cate_item">
                    <ul>
                        <li class="cate_title"><h3>网站合作</h3></li>
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=3&id=15" title="WIFI租赁" >WIFI租赁</a></li>
                        
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=3&id=18" title="租车" >租车</a></li>
                        
						
                    </ul>
                </li>
				
                
				
                <li class="cate_item">
                    <ul>
                        <li class="cate_title"><h3>网站说明</h3></li>
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=4&id=11" title="关于我们" >关于我们</a></li>
                        
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=4&id=12" title="免责声明" >免责声明</a></li>
                        
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=4&id=13" title="联系我们" >联系我们</a></li>
                        
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=4&id=16" title="商务合作" >商务合作</a></li>
                        
						
                    </ul>
                </li>
				
                
				
                <li class="cate_item">
                    <ul>
                        <li class="cate_title"><h3>其他事项</h3></li>
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=5&id=10" title="签证问题解答" >签证问题解答</a></li>
                        
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=join" title="商家入驻" >商家入驻</a></li>
                        
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=5&id=14" title="旅行社入驻" >旅行社入驻</a></li>
                        
						
						
                        <li><a href="http://i.uu-club.com/index.php?ctl=help&act=show&cid=5&id=17" title="招贤纳士" >招贤纳士</a></li>
                        
						
                    </ul>
                </li>
				
                				
            </ul>
        </div>
    </div>
    <!--end 底部分类文章-->
    
    <div class="blank"></div>
    <div class="blank"></div>
    
	
	
    
    <div class="blank"></div>
	<p style="text-align:center;">
	<span style="color:#666666;"><br />
</span> 
</p>
<p style="text-align:center;">
	<br />
</p>
<p style="text-align:center;">
	<span style="color:#666666;">copyright 2016 悠游旅游分销平台</span> 
</p>
    <div class="blank"></div>
	<div style="text-align:center;">
	
	   沪ICP备10220032号 <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1257120235'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1257120235%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
	</div>
	<div class="blank"></div>
</div>
<div id="USER_INFO_TIP">
    <div class="tip_info">
    <img class="avatar" alt="" src="http://i.uu-club.com/web/Tpl/fanwe/images/loading_60.gif">
    <div>
        <p><a href="#">&nbsp;</a></p>
        <p>获取用户信息...</p>
        <p>&nbsp;</p>
    </div>
    </div>
    <div class="tip_toolbar">&nbsp;</div>
    <div class="tip_arrow" style="margin-left: 2px;"></div>
    <input class="get_user_info_tip_ajaxurl" type="hidden" value="http://i.uu-club.com/index.php?ctl=user&act=get_user_info_tip"
<!--</div>-->
</div>
	
<div class="user_info_tip_cache hide"></div>
<!--<div id="gotop"></div>-->
<!-- <div class="page-floor" id="page-floor" >
    <p class="erweima"><img src="web/Tpl/fanwe/images/t01eb27b52639d8c1f8.jpg" alt="二维码" /></p>
    <ul>
                <li class="item-flight"><a href="index.php?ctl=feiji" class="item-link" target="_self">机票</a></li>
        <li class="item-special"><a href="index.php?ctl=scenic" class="item-link" target="_self">门票</a></li>
                <li class="item-hotel"><a href="index.php?ctl=hotel" class="item-link" target="_self">酒店</a></li>
        <li class="item-line"><a href="http://m.vipwifi.com/package/index?code=003tq6uK13nj3a0Q9suK1d77uK1tq6ue&state=STATE&appid=wxf53cddfffe212b2b" class="item-link" target="_blank">WIFI</a></li>
        
        <li class="item-dest"><a href="#m-dest" class="item-link" target="_self">目的地</a></li>
        
        <li class="item-top"><a href="#" class="item-link" target="_self">顶部</a></li>
    </ul>
</div>
<div class="toolbar">
   <a href="http://p.qiao.baidu.com//im/index?siteid=7092171&ucid=10582707" target="_blank" class="toolbar-item toolbar-item-feedback"></a>
   <a href="javascript:scroll(0,0)" id="top" class="toolbar-item toolbar-item-top"></a>
</div>
<div class="dibu_gn">
    <div class="left_but">></div><div class="hui_info" style="display:block">
        <div class="m0_auto">
         <img src="/dibu.png" width="1000" height="168"/>
        </div>
        <div class="guanbi">×</div>
    </div>
</div>
<style>
.dibu_gn{
height:140px;
width:100%;
position:fixed;
bottom:0;
left:0;
z-index:99999;
}
.left_but{
height:140px;
float:left;
position:absolute;
width:39px;
cursor:pointer;
z-index:66;
color:#fff;
text-align:center; 
line-height:140px;
font-size:24px;
background: rgba(0, 5, 25, 0.8) none repeat scroll 0% 0% !important;
}
.hui_info{
height:140px;
width:100%;
background: rgba(0, 5, 25, 0.8) none repeat scroll 0% 0% !important;
position:relative;
}
.guanbi{
width:25px;
height:25px;
background:#333333;
color:#FFFFFF;
font-size:14px;
font-family:"宋体";
cursor:pointer;
text-align:center;
line-height:25px;
position:absolute;
right:0;
top:0;
}
.m0_auto{
width:1000px;
height:56px;
padding-top:25px;
margin:0 auto;
background:#0C0 1px solid
}
.m0_auto img{margin-top:-60px} 
</style>
<script>$(function() {
    $('.left_but').click(function() {
        if ($('.hui_info').width() == 0) {
            $('.hui_info').animate({
                width: '100%'
            },
            "slow");
            $('.m0_auto').css('display', 'block');
            $('.dibu_gn').css('width', '100%');
        } else {
            $('.hui_info').animate({
                width: '0'
            },
            "slow");
            $('.m0_auto').css('display', 'none');
            $('.dibu_gn').css('width', '39px');
        }
    });
    $('.guanbi').click(function() {
        $('.hui_info').animate({
            width: '0'
        },
        "slow");
        $('.dibu_gn').animate({
            width: '39px'
            },
            "slow");
        $('.m0_auto').css('display', 'none');
    });
    $('.weibo').mouseover(function() {
        $('.weibo_img').css('display', 'block');
    }).mouseout(function() {
        $('.weibo_img').css('display', 'none');
    });
})
</script> -->
</body>
</html>
<link rel="stylesheet" type="text/css" href="/web/Tpl/fanwe/css/fhdb.css" />
<script type="text/javascript" src="/web/Tpl/fanwe/js/fhdb.js"></script>
<div>
    <div class="bottom_tools">
        <div class="qr_tool">二维码</div>
        <a id="scrollUp" href="javascript:;" title="飞回顶部"></a>
        <img class="qr_img" src="/web/Tpl/fanwe/images/qr_img.png">
    </div>
</div>
