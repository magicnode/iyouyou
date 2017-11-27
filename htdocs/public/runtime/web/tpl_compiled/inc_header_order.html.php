<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if ($this->_var['page_title'] != ''): ?><?php echo $this->_var['page_title']; ?> - <?php endif; ?><?php echo $this->_var['site_name']; ?> - <?php echo $this->_var['site_title']; ?></title>
<meta name="keywords" content="<?php echo $this->_var['site_keyword']; ?>" />
<meta name="description" content="<?php echo $this->_var['site_description']; ?>" />
<script type="text/jscript" src="<?php echo $this->_var['TMPL']; ?>/js/jquery.js"></script>
<?php
if(app_conf("APP_MSG_SENDER_OPEN")==1)
{
$this->_var['pagejs'][] = TMPL_REAL."/js/msg_sender.js";
$this->_var['cpagejs'][] = TMPL_REAL."/js/msg_sender.js";
}
?>
<script type="text/javascript">
var APP_ROOT = '<?php echo $this->_var['APP_ROOT']; ?>';
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

</head>
<body>	
	<div class="header ">
         <div class="top_nav">
			<div class="wrap">
				<div class="f_l" id="header_user_tip">
					<?php 
$k = array (
  'name' => 'user_tip',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>			                                       
				</div>
                 <div class="f_r">
					<?php echo $this->fetch('inc/top_nav_right.html'); ?>
				</div>
			</div>
		</div>
		<div class="wrap logo_row  clearfix">  
			<div class="logo f_l">
                <a class="link" href="<?php echo $this->_var['APP_ROOT']; ?>/">
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
            <div class="f_r">
            	<img src="<?php echo $this->_var['TMPL']; ?>/images/ordert.jpg" />
            </div>
            <div class="blank"></div>		
		</div>
		<!--end wrap-->
	</div>