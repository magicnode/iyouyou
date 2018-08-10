<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta name="Generator" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>悠游旅游网分销管理平台</title>

<meta name="keywords" content="<?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SYSTEM_NAME',
);
echo $k['name']($k['v']);
?>" />

<meta name="description" content="<?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SYSTEM_NAME',
);
echo $k['name']($k['v']);
?>" />

<script type="text/javascript">

var IS_WATER = <?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'IS_WATER_MARK',
);
echo $k['name']($k['v']);
?>;

var MAX_FILE_SIZE = "<?php echo (app_conf("MAX_IMAGE_SIZE")/1000000)."MB"; ?>";

var deal_msg_list_url = "<?php echo $this->_var['deal_msg_list_url']; ?>";

var promote_msg_list_url = "<?php echo $this->_var['promote_msg_list_url']; ?>";



</script>

<script type="text/javascript" src="<?php echo $this->_var['APP_ROOT']; ?>/public/runtime/<?php echo  APP_NAME;?>/lang.js"></script>





<link href="<?php echo $this->_var['TMPL']; ?>/dwz/themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>

<link href="<?php echo $this->_var['TMPL']; ?>/dwz/themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>

<link href="<?php echo $this->_var['TMPL']; ?>/dwz/themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>





<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/jquery-1.7.2.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/jquery.cookie.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/jquery.validate.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/jquery.bgiframe.js" type="text/javascript"></script>



<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.core.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.util.date.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.validate.method.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.regional.zh.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.barDrag.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.drag.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.tree.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.accordion.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.ui.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.theme.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.switchEnv.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.alertMsg.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.contextmenu.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.navTab.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.tab.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.resize.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.dialog.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.dialogDrag.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.sortDrag.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.cssTable.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.stable.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.taskBar.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.ajax.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.pagination.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.database.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.datepicker.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.effects.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.panel.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.checkbox.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.history.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.combox.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.print.js" type="text/javascript"></script>

<script src="<?php echo $this->_var['TMPL']; ?>/dwz/js/dwz.regional.zh.js" type="text/javascript"></script>



<!-- 引入编辑器 -->

<link rel="stylesheet" href="<?php echo $this->_var['TMPL']; ?>/kindeditor/themes/default/default.css" />

<script charset="utf-8" src="<?php echo $this->_var['TMPL']; ?>/kindeditor/kindeditor-all.js"></script>

<script charset="utf-8" src="<?php echo $this->_var['TMPL']; ?>/kindeditor/lang/zh_CN.js"></script>

<!-- end 引入编辑器 -->





<link href="<?php echo $this->_var['TMPL']; ?>/core/include/css/core.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo $this->_var['TMPL']; ?>/core/include/js/core.js"></script>

<script type="text/javascript">

var FLASH_UPLOAD_URL = '<?php echo $this->_var['flash_upload_url']; ?>';

var VIDEO_UPLOAD_URL = '<?php echo $this->_var['video_upload_url']; ?>';

var IMG_UPLOAD_URL = '<?php echo $this->_var['img_upload_url']; ?>';

var ATTACHMENT_UPLOAD_URL = '<?php echo $this->_var['attachment_upload_url']; ?>';

var FILE_UPLOAD_URL = '<?php echo $this->_var['file_upload_url']; ?>';

var FILE_MANAGE_URL = '<?php echo $this->_var['file_manage_url']; ?>';

var EMOT_URL = '<?php echo $this->_var['APP_ROOT']; ?>/public/emoticons/';

$(function(){

	DWZ.init("<?php echo $this->_var['TMPL']; ?>/dwz/dwz.frag.xml", {

		loginUrl:"<?php echo $this->_var['login_url']; ?>", 

//		loginUrl:"login.html",	// 跳到登录页面

		statusCode:{ok:200, error:300, timeout:301}, //【可选】

		pageInfo:{pageNum:"pageNum", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】

		debug:false,	// 调试模式 【true|false】

		callback:function(){

			initEnv();		

		}

	});

});

var send_span = <?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'SEND_SPAN',
);
echo $k['name']($k['v']);
?>000;

var IS_RUN_CRON = <?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'ADMIN_MSG_SENDER_OPEN',
);
echo $k['name']($k['v']);
?>;

</script>

<script type="text/javascript" src="<?php echo $this->_var['TMPL']; ?>/core/include/js/msg_sender.js"></script>

</head>



<body scroll="no">

	<div id="layout">

		<div id="header">

			<div class="headerNav">

                            <a class="logo" href="#">heirui</a>

				<ul class="nav">	

					<li style="color:#fff; background: none; display:none;" id="send_promote_msg_tip">正在发送群发队列...</li>		

					<li style="color:#fff; background: none; display:none;" id="send_deal_msg_tip">正在发送业务队列...</li>			

					<li><a href="<?php echo $this->_var['APP_ROOT']; ?>/" target="_blank">首页</a></li>

					<li><a href="<?php echo $this->_var['changepwdurl']; ?>" target="dialog" width="550" height="220" rel="modify_pwd_page">修改密码</a></li>

					<li><a href="<?php echo $this->_var['cacheurl']; ?>&ajax=1" target="dialog" width="500" height="240" rel="cache_page">缓存管理</a></li>

					<li><a href="<?php echo $this->_var['logout_url']; ?>">退出</a></li>

					

				</ul>



			</div>



			<!-- navMenu -->

			

		</div>



		<div id="leftside">

			<div id="sidebar_s">

				<div class="collapse">

					<div class="toggleCollapse"><div></div></div>

				</div>

			</div>

			<div id="sidebar">

				<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>



				<div class="accordion" fillSpace="sidebar">

				

				

					<?php $_from = $this->_var['nav_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('nav_name', 'nav_item');if (count($_from)):
    foreach ($_from AS $this->_var['nav_name'] => $this->_var['nav_item']):
?>

					<div class="accordionHeader">

						<h2><span>Folder</span><?php echo $this->_var['nav_name']; ?></h2>

					</div>

					<div class="accordionContent">

						<ul class="tree treeFolder">

						

							<?php $_from = $this->_var['nav_item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('group_name', 'group');if (count($_from)):
    foreach ($_from AS $this->_var['group_name'] => $this->_var['group']):
?>

							<li><a href="#"><?php echo $this->_var['group_name']; ?></a>

								<ul>

									<?php $_from = $this->_var['group']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'node');if (count($_from)):
    foreach ($_from AS $this->_var['node']):
?>

									<li><a href="<?php echo $this->_var['node']['url']; ?>" target="navTab" rel="<?php echo $this->_var['node']['module']; ?>_<?php echo $this->_var['node']['action']; ?>"><?php echo $this->_var['node']['name']; ?></a></li>

									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

								</ul>

							</li>

							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

						</ul>

					</div>

					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>					

				</div>

			</div>

		</div>

		<div id="container">

			<div id="navTab" class="tabsPage">

				<div class="tabsPageHeader">

					<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->

						<ul class="navTab-tab">

							<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">管理首页</span></span></a></li>

						</ul>

					</div>

					<div class="tabsLeft ">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->

					<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->

					<div class="tabsMore">more</div>

				</div>

				<ul class="tabsMoreList">

					<li><a href="javascript:;">我的主页</a></li>

				</ul>

				<div class="navTab-panel tabsPageContent layoutBox">

					<div class="page unitBox">

						<div class="accountInfo">

							<div class="alertInfo">

								<!--<h2>版本检测</h2>

								这里是版本检测区-->

							</div>

							<div class="right">

								<!--<p>一些系统内的提醒区</p>

								<p>一些系统内的提醒区</p>-->

							</div>

							<p><span>悠游旅游网分销商管理平台</span></p>

							<p></p>

						</div>

						

						<div class="pageFormContent" layoutH="80" >

							

							<table class="index_info">			

							<tr>

								<td class="item_title">会员统计:</td>

								<td class="item_input">

									当前注册会员总数 <?php echo $this->_var['stat']['regist_count']; ?> 人， 共  <?php echo $this->_var['stat']['incharge_count']; ?> 个会员充值，共 <?php echo $this->_var['stat']['incharge_order_count']; ?> 笔充值,  充值总额  <?php echo $this->_var['stat']['incharge_amount']; ?> 元

								</td>

							</tr>

							<tr>

								<td class="item_title">产品统计:</td>

								<td class="item_input">

									上线的线路 <?php echo $this->_var['stat']['tourline_count']; ?> 条， 上线的景点 <?php echo $this->_var['stat']['spot_count']; ?> 个，其中在销售的门票  <?php echo $this->_var['stat']['ticket_count']; ?> 个， 团购 <?php echo $this->_var['stat']['tuan_count']; ?> 个

								</td>

							</tr>

							<tr>

								<td class="item_title">订单统计:</td>

								<td class="item_input">

									成交订单数 <?php echo $this->_var['stat']['order_count']; ?> ，成交总金额 <?php echo $this->_var['stat']['order_amount']; ?> 元, 在线支付 <?php echo $this->_var['stat']['order_online_pay']; ?> 元， 余额支付 <?php echo $this->_var['stat']['order_account_pay']; ?> 元，代金券支付 <?php echo $this->_var['stat']['order_voucher_pay']; ?> 元，退款  <?php echo $this->_var['stat']['order_refund_amount']; ?> 元

								</td>

							</tr>

							<tr>

								<td class="item_title">线路订单统计:</td>

								<td class="item_input">

									成交订单数 <?php echo $this->_var['stat']['tourline_order_count']; ?> ，成交总金额 <?php echo $this->_var['stat']['tourline_order_amount']; ?> 元, 在线支付 <?php echo $this->_var['stat']['tourline_order_online_pay']; ?> 元， 余额支付 <?php echo $this->_var['stat']['tourline_order_account_pay']; ?> 元，代金券支付 <?php echo $this->_var['stat']['tourline_order_voucher_pay']; ?> 元，退款  <?php echo $this->_var['stat']['tourline_order_refund_amount']; ?> 元					

								</td>

							</tr>

							<tr>

								<td class="item_title">门票订单统计:</td>

								<td class="item_input">

									成交订单数 <?php echo $this->_var['stat']['ticket_order_count']; ?> ，成交总金额 <?php echo $this->_var['stat']['ticket_order_amount']; ?> 元, 在线支付 <?php echo $this->_var['stat']['ticket_order_online_pay']; ?> 元， 余额支付 <?php echo $this->_var['stat']['ticket_order_account_pay']; ?> 元，代金券支付 <?php echo $this->_var['stat']['ticket_order_voucher_pay']; ?> 元，退款  <?php echo $this->_var['stat']['ticket_order_refund_amount']; ?> 元

								</td>

							</tr>

							<tr>

								<td class="item_title">点评统计:</td>

								<td class="item_input">

									共 <?php echo $this->_var['stat']['review_total']; ?> 条购物点评， 线路点评 <?php echo $this->_var['stat']['tourline_review_total']; ?> 条， 门票点评 <?php echo $this->_var['stat']['ticket_review_total']; ?> 条

								</td>

							</tr>

							<tr>

								<td class="item_title">游记统计:</td>

								<td class="item_input">

									共计  <?php echo $this->_var['stat']['guide_total']; ?>  条有效游记

								</td>

							</tr>

							<tr>

								<td class="item_title">购物返还统计:</td>

								<td class="item_input">

									购物共返还给用户  <?php echo $this->_var['stat']['return_amount']; ?>  元， 返利给用户  <?php echo $this->_var['stat']['rebate_amount']; ?> 元

								</td>

							</tr>

							</table>

	

						</div>

					</div>

					

				</div>

			</div>

		</div><!-- end container -->



	</div><!-- end layout -->



	<div id="footer">Copyright &copy; 2016 悠游旅游网版权所有 </div>







</body>



</html>