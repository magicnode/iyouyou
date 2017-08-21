<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta name="Generator" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php if ($this->_var['page_title'] != ''): ?><?php echo $this->_var['page_title']; ?> - <?php endif; ?><?php echo $this->_var['site_name']; ?></title>

<meta name="keywords" content="<?php echo $this->_var['site_keyword']; ?>" />

<meta name="description" content="<?php echo $this->_var['site_description']; ?>" />

<script type="text/javascript" src="<?php echo $this->_var['TMPL']; ?>/js/jquery.js"></script>


<!-- 百度分享到... -->
<!-- <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":["mshare","weixin","qzone","tsina","tieba","bdysc","renren","tqq","bdxc","kaixin001","tqf","douban","bdhome","sqq","thx","ibaidu","meilishuo","mogujie","diandian","huaban","duitang","hx","fx","youdao","sdo","qingbiji","people","xinhua","mail","isohu","yaolan","wealink","ty","iguba","fbook","twi","linkedin","h163","evernotecn","copy","print"],"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"6","bdPos":"left","bdTop":"171.5"},"image":{"viewList":["weixin","qzone","tsina","tqq","tieba","renren"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["weixin","qzone","tsina","tqq","tieba","renren"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>  -->
<?php

if(app_conf("APP_MSG_SENDER_OPEN")==1)

{

$this->_var['pagejs'][] = TMPL_REAL."/js/msg_sender.js";

$this->_var['cpagejs'][] = TMPL_REAL."/js/msg_sender.js";

}

?>

<script type="text/javascript">

var APP_ROOT = '<?php echo $this->_var['APP_ROOT']; ?>';

var SITE_URL = '<?php echo $this->_var['SITE_URL']; ?>';

var LOADER_IMG = '<?php echo $this->_var['TMPL']; ?>/images/lazy_loading.gif';

var ERROR_IMG = '<?php echo $this->_var['TMPL']; ?>/images/image_err.gif';

var send_span = <?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SEND_SPAN',
);
echo $k['name']($k['v']);
?>000;

<?php if (app_conf ( "APP_MSG_SENDER_OPEN" ) == 1 && $this->_var['CRON_COUNT'] > 0): ?>

var IS_RUN_CRON = 1;

<?php else: ?>

var IS_RUN_CRON = 0;

<?php endif; ?>

var DEAL_MSG_URL = '<?php
echo parse_url_tag("u:cron#deal_msg_list|"."".""); 
?>';

var MAP_URL = '<?php
echo parse_url_tag("u:map|"."".""); 
?>';

</script>



<?php echo $this->fetch('inc/define_js_url.html'); ?>

<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['pagecss'],
);
echo $k['name']($k['v']);
?>" />

<script type="text/javascript" src="<?php echo $this->_var['APP_ROOT']; ?>/public/runtime/<?php echo  APP_NAME;?>/lang.js"></script>

<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['pagejs'],
  'c' => $this->_var['cpagejs'],
);
echo $k['name']($k['v'],$k['c']);
?>"></script>

<?php 
$k = array (
  'name' => 'load_daily_login',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>

</head>

<body>

	<div class="header">

         <div class="top_nav">

			<div class="wrap">

				<div class="f_l" id="header_user_tip">

					<?php 
$k = array (
  'name' => 'user_tip',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>&nbsp;&nbsp;	<a href="http://b2b.uu-club.com" target="_blank">同行登入</a>		                                       

				</div>

                 <div class="f_r">

					<?php echo $this->fetch('inc/top_nav_right.html'); ?>

				</div>

			</div>

		</div>

		<div class="wrap logo_row">  

			<div class="logo f_l">

                <a class="link" href="http://www.uu-club.com/" target="_blank">

                        <?php

                                $this->_var['logo_image'] = app_conf("SITE_LOGO");

                        ?>

                        <?php 
$k = array (
  'name' => 'load_page_png',
  'v' => $this->_var['logo_image'],
);
echo $k['name']($k['v']);
?>

                </a>

			</div>

            <!--城市-->

            <div class="f_l head_start_city">

	         	<a href="javascript:void(0);" class="switch_city"><?php 
$k = array (
  'name' => 'current_city_name',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?></a>

                <br />

                <div class="switch_city_icon"></div>

				<div class="show_city">

					<dl>

						<dt>热门城市</dt>

						<dd>

							<?php $_from = $this->_var['dh_hot_city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'hot_city');if (count($_from)):
    foreach ($_from AS $this->_var['hot_city']):
?>

						   <a href="<?php echo $this->_var['hot_city']['url']; ?>" rel="nofollow" title="<?php echo $this->_var['hot_city']['name']; ?>"><?php echo $this->_var['hot_city']['name']; ?></a>

						   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

						</dd>

					</dl>

					<div id="con">

						<ul id="tags">

							<?php $_from = $this->_var['dh_city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'city_group');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['city_group']):
?>

							<li <?php if ($this->_var['key'] == "ABCDEFG"): ?>class="selectTag"<?php endif; ?>><a onclick="selectTag('tagContent<?php echo $this->_var['key']; ?>',this)" href="javascript:void(0)"><?php echo $this->_var['key']; ?></a></li>

							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

						</ul>

					  	<div id="tagContent">

							

							<?php $_from = $this->_var['dh_city_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('group_key', 'city_group');if (count($_from)):
    foreach ($_from AS $this->_var['group_key'] => $this->_var['city_group']):
?>

							<div class="tagContent <?php if ($this->_var['group_key'] == "ABCDEFG"): ?>selectTag<?php endif; ?>" id="tagContent<?php echo $this->_var['group_key']; ?>">

								

								<?php $_from = $this->_var['city_group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('pyfirst', 'city_zu');if (count($_from)):
    foreach ($_from AS $this->_var['pyfirst'] => $this->_var['city_zu']):
?>

								<div class="line">

									<div class="line_left"><?php echo $this->_var['pyfirst']; ?></div>

									<div class="line_right">

										<?php $_from = $this->_var['city_zu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city_item');if (count($_from)):
    foreach ($_from AS $this->_var['city_item']):
?>

										<a href="<?php echo $this->_var['city_item']['url']; ?>" rel="nofollow" title="<?php echo $this->_var['city_item']['name']; ?>"><?php echo $this->_var['city_item']['name']; ?></a>

										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

									</div>

								</div>

								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

								

							</div>

							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

								

						</div>

					</div>

				</div>

			</div>

            <!--end 城市-->

                        

            <!--头部广告-->

            <div class="f_l" style="width:205px;height:107px;overflow: hidden;">

                <adv adv_id="head_adv" />

            </div>

            <!--end 头部广告-->

                        

            <!--头部搜索-->			

            <form id="header_search_box" class="f_r" action="<?php
echo parse_url_tag("u:jump|"."".""); 
?>" method="post">

            	<div class="search_box f_r">					

					<div class="search_input f_l">

						<div class="change_type_box">
						
							<span class="search_type_select" id="select_search_type">
						
							<?php if ($this->_var['search_type'] == 1): ?>关键字<?php endif; ?>	
							<?php if ($this->_var['search_type'] == 2): ?>编号<?php endif; ?>	
							<!-- <?php if (! $this->_var['search_type']): ?>关键字<?php endif; ?>	 -->
			
							<?php if(empty($search_type) && (!$search_type)){echo "关键字";}?>		
							</span>
							<div class="tn_search_bar" >
								<div class="type_s" rel="1">关键字</div>
								<div class="type_s" rel="2">编号</div>
							</div>							
						
						</div> 

						<input type="text" class="search_txt f_l" name="keyword" value="<?php if ($this->_var['search_type'] > 0): ?><?php echo $this->_var['keyword']; ?><?php endif; ?>" id="header_kw" holder="请输入您要搜索的关键词"  />

						<input type="submit" class="search_btn f_r" id="search_btn" value="搜 索" />

					</div>

					<div class="blank1"></div>

					<div class="keyword_box f_r">

						<?php if (app_conf ( "KEFU_TEL" ) != ''): ?>

					<span style="font-size:16px; line-height:32px; font-family:'微软雅黑'; color:#ffb90f; font-weight:bolder; text-align:right;"> 客服电话：<?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'KEFU_TEL',
);
echo $k['name']($k['v']);
?></span>

						<?php endif; ?>

					</div>

				</div>		

				<input type="hidden" name="search_type" id="search_type" value="<?php if ($this->_var['search_type'] > 0): ?><?php echo $this->_var['search_type']; ?><?php else: ?>1<?php endif; ?>" />		

			</form>

			<!--end 头部搜索-->

            <div class="blank"></div>		

		</div>

		<!--end wrap-->

		<!--start main_nav-->

		<div class="main_bar">

		    <div class="nav_wrap">

		        <!--全部旅游产品目的地-->

		        <div class="categorys" <?php if ($this->_var['MODULE_NAME'] != 'index'): ?>id="J_categorys"<?php endif; ?>>

		            <div class="allsort">

		                <div class="mt">

		                    <div>

		                        <a href="#">全部旅游产品目的地</a>

		                    </div>

		                </div>

		              

		            </div>

		            <!--end 全部旅游产品目的地-->

		        </div>

		        <ul class="main_nav" style="<?php if ($this->_var['ACTION_NAME'] == 'index' && $this->_var['MODULE_NAME'] == 'index'): ?>width:990px;<?php else: ?>width:790px;<?php endif; ?>">

		            <?php $_from = $this->_var['nav_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav_item');if (count($_from)):
    foreach ($_from AS $this->_var['nav_item']):
?>

		            <li <?php if ($this->_var['nav_item']['current'] == 1): ?>class="current"<?php endif; ?>>

		            	<?php if ($this->_var['nav_item']['tag'] > 0): ?><span class="nav_tag_<?php echo $this->_var['nav_item']['tag']; ?>"></span><?php endif; ?>

		                <a href="<?php echo $this->_var['nav_item']['url']; ?>" target="<?php if ($this->_var['nav_item']['blank'] == 1): ?>_blank<?php endif; ?>"><?php echo $this->_var['nav_item']['name']; ?></a>

		            </li>

		            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

		        </ul>



		    </div>

		</div>	

		<!--end main_nav-->

	</div>