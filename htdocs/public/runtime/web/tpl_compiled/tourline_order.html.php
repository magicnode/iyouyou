<?php
	$this->_var['pagecss'][] = TMPL_REAL."/css/style.css";
	$this->_var['pagecss'][] = TMPL_REAL."/css/weebox.css";
	$this->_var['pagecss'][] = TMPL_REAL."/css/tourline_order.css";
	
	$this->_var['pagecss'][] = TMPL_REAL."/css/doubleDate.css";
	
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.bgiframe.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.weebox.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.pngfix.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/lazyload.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/script.js";
	$this->_var['cpagejs'][] = TMPL_REAL."/js/script.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/tourline_order.js";
?>
<?php echo $this->fetch('inc/header_order.html'); ?>
<script type="text/javascript">
	var json_data = <?php echo $this->_var['json_list']; ?>;
	<?php if ($this->_var['json_insurance']): ?>
		var json_insurance = <?php echo $this->_var['json_insurance']; ?>;
	<?php else: ?>
		var json_insurance= null;
	<?php endif; ?>
	var buy_count='<?php echo $this->_var['buy_count']; ?>';
	var is_namelist = '<?php echo $this->_var['tourline_info']['is_namelist']; ?>';
	var youke_number = '<?php echo $this->_var['youke_number']; ?>';
	var json_namelist_idlist=<?php echo $this->_var['json_namelist_idlist']; ?>;
	
	var AJAX_SUBMIT_CART_URL= "<?php
echo parse_url_tag("u:tourline_order#submit_cart|"."".""); 
?>";
</script>
<div class="wrap">
	<div class="t_nav">
		<ul class="clearfix">
			<?php if ($this->_var['tourline_info']['order_confirm_type'] != 2): ?>
			<li class="f_l cur">1.填写订单</li>
			<li class="f_l">2.网上支付</li>
			<li class="f_l" style="margin-right:0px;">3.预定成功</li>
			<?php else: ?>
			<li class="f_l li_width cur">1.填写订单</li>
			<li class="f_l li_width">2.商家确定</li>
			<li class="f_l li_width">3.网上支付</li>
			<li class="f_l li_width" style="margin-right:0px;">4.预定成功</li>
			<?php endif; ?>
		</ul>
	</div>

	<div class="w780 f_l">
		<div class="tourline_order" id="J_ORDER_BOX">
			
			<form name="tourline_order_form" id="tourline_order_form" method="post">
			 <input type="hidden" value="<?php echo $this->_var['tourline_info']['id']; ?>" name="tourline_id">
			 <input type="hidden" value="<?php echo $this->_var['tourline_info']['tourline_item_id']; ?>" name="tourline_item_id">
			  <input type="hidden" value="<?php echo $this->_var['tourline_item_start_time']; ?>" name="tourline_item_start_time">
			 <input type="hidden" value="<?php echo $this->_var['adult_count']; ?>" name="buy_adult_count">
			 <input type="hidden" value="<?php echo $this->_var['tourline_info']['buy_child_count']; ?>" name="buy_child_count">
			<div class="item" >
				<h2>出游信息</h2>
			<table class="input_table input_table_dingdan" id="online_book">
            <tbody>
              <tr>
                <td width="110" align="right"><label>产品名称：</label></td>
                <td><span class="pname"><?php echo $this->_var['tourline_info']['name']; ?></span></td>
              </tr>
              <tr>
                <td width="110" align="right"><label>出发城市：</label></td>
                <td><?php echo $this->_var['tourline_info']['city_name']; ?></td>
              </tr>
              <tr>
                <td width="110" align="right"><label>出发日期：</label></td>
                <td><label style="color:#ff6600;font-weight:bold;"><?php echo $this->_var['tourline_info']['start_time']; ?></label>
                  <span style="margin-left:60px;">出游天数：<?php echo $this->_var['tourline_info']['tour_total_day']; ?></span></td>
              </tr>
              <tr>
                <td width="110" align="right"><label>人数：</label></td>
                <td>
                	<?php if ($this->_var['adult_count']): ?><?php echo $this->_var['adult_count']; ?>成人<?php endif; ?>
                    &nbsp;&nbsp;
                    <?php if ($this->_var['child_count']): ?><?php echo $this->_var['child_count']; ?>儿童 <?php endif; ?>
                </td>
              </tr>
              <tr>
                <td width="110" align="right"><label>联系人：</label><span class="cred">*</span></td>
                <td>
                   <input id="appointName" value="<?php echo $this->_var['user_namelist_one']['name']; ?>" name="appoint_name" type="text" holder="请填写姓名"  onfocus="mive_notice(this);" class="txt_input" value="">
                   <span class="err_structure hide" id="appointNameError">
	                   <span class="error_notice ">
	                        <i></i>
	                   </span>
                   </span>
                </td>
              </tr>
              <tr>
                <td width="110" align="right"><label>手机：</label><span class="cred">*</span></td>
                <td>
                	<input id="appointMobile" value="<?php echo $this->_var['user_namelist_one']['mobile']; ?>" name="appoint_mobile" type="text" holder="请填写正确的手机号码" onfocus="mive_notice(this);" class="txt_input" value=""><span class="cgrey f12">（用于接收订单确认信息）</span>
                    <span class="err_structure hide" id="appointMobileError">
                        <span class="error_notice">
                            <i></i>
                        </span>
                    </span>
                </td>
              </tr>
              <tr>
                <td width="110" align="right"><label>邮箱：</label></td>
                <td>
                	<input id="appointEmail" name="appoint_email" type="text" holder="请填写邮箱" onfocus="mive_notice(this);" class="txt_input" value="">
                 	<span class="err_structure hide" id="appointEmailError">
	                    <span class="error_notice" id="">
	                        <i></i>
	                    </span>
	                </span>
                </td>
              </tr>
            </tbody>
          </table>
		</div>
			
			<div class="blank15"></div>
			<div class="order_info_box clearfix">
				<?php if ($this->_var['tourline_info']['is_namelist'] == 1): ?>
				<!--游客信息-->
				<?php echo $this->fetch('inc/tourline_order/tourist_information.html'); ?>
				<!--游客信息END-->
				<?php endif; ?>
				<!--保险-->
				<?php echo $this->fetch('inc/tourline_order/tourist_insurance.html'); ?> 
				<!--保险END-->
				<?php if ($this->_var['tourline_info']['is_visa'] == 1): ?>
				<!--签证-->
				<?php echo $this->fetch('inc/tourline_order/tourist_visa.html'); ?>
				<!--签证END-->
				<?php endif; ?>
				<?php if ($this->_var['tourline_info']['order_confirm_type'] != 2): ?>
					<!--优惠券-->
					<?php echo $this->fetch('inc/tourline_order/promotion.html'); ?> 
					<!--优惠券END-->
					<!--现金券（余额）-->
					<?php echo $this->fetch('inc/tourline_order/account.html'); ?> 
					<!--现金券（余额）END-->
				<?php endif; ?>
				
				<!--备注STRAT-->
				<div class="blank15"></div>
				<div id="order_memo_part" class="order_box ">
				    <h2>订单备注</h2>
					<div class="routes_info pl15">
						<textarea cols="60" holder="请输入订单备注（大于10个字，小于100个字,可以填）" rows="5" class="area_input" onfocus="mive_notice(this);" name="order_memo"></textarea>
						<span class="err_structure hide" id="orderMemoError" >
		                    <span class="error_notice">
		                        <i>内容不得小于10个字，大于100个字，可以填</i>
		                    </span>
		                </span>
					</div>
					
				</div>
				<div class="blank15"></div>
				<!--备注END-->
				
				<div class="next_step_s2">
	                <input type="button" value="提交订单" class="J_subButton blue_btn">
					<img src="<?php echo $this->_var['TMPL']; ?>/images/subcart.gif" class="hide J_doing" />
	            </div>
				<div id="ydxz" class="ready_rule">
                    <p class="rr_check">
                        <label><input type="checkbox" value="1" id="check_book_notice">我已阅读并同意以下协议</label>
						<span class="err_structure hide" id="book_notice_tip" >
							<span class="error_notice"><i>请阅读预订须知并勾选“我已阅读并同意”</i></span>
						</span>
                    </p>
					
					<?php if ($this->_var['api_list']): ?>
					<p align="center">
						<label><input type="checkbox" value="1" name="share_order" checked="checked" /><b>微博晒单，邀请好友获取返利</b></label>
					</p>
					<?php endif; ?>
					
                    <div class="rule_name">
                    	<a href="javascript:void(0);" class="t" rid="1" >预订协议</a>
					</div>
					<div class="rule_desc">
                    	<div id="desc_box_1"  class="desc_box hide"><?php 
$k = array (
  'name' => 'app_conf',
  'v' => 'PREARRANGEMENT_AGREEMENT',
);
echo $k['name']($k['v']);
?></div>
					</div>
                   
				</div>
			</div>
			
			</form>
		</div>
		
	</div>
	<div class="w210 f_r">
		<div class="blank15"></div>
		<div id="summaryInfo">
			<div class="hd">结算信息</div>
			<div class="part">
				<p class="part_name">出游团费</p>
				<div id="basic_fare">
					<?php if ($this->_var['tourline_info']['buy_adult_count'] > 0): ?>
					<p class="clearfix pn ">
						<span class="pn_1 f_l"><?php echo $this->_var['tourline_info']['buy_adult_count']; ?>成人 × ¥<?php echo $this->_var['tourline_info']['adult_price']; ?></span>
						<span class="pn_2 f_r">¥<?php echo $this->_var['tourline_info']['adult_price_total']; ?></span>
					</p>
					<?php endif; ?>
					<?php if ($this->_var['tourline_info']['buy_child_count'] > 0): ?>
					<p class="clearfix pn">
						<span class="f_l pn_1"><?php echo $this->_var['tourline_info']['buy_child_count']; ?>儿童 × ¥<?php echo $this->_var['tourline_info']['child_price']; ?></span>
						<span class="f_r pn_2">¥<?php echo $this->_var['tourline_info']['child_price_total']; ?></span>
					</p>
					<?php endif; ?>
				</div>
			</div>
			<div id="insurance_summary" style="display:none">
				
			</div>
			<div id="visa_summary" style="display:none">
				<hr class="hr_dotted" />
				<div class="part">
					<p class="part_name">签证费用</p>
					<p><?php echo $this->_var['tourline_info']['visa_name']; ?></p>
					<p class="j_visa clearfix pn">
						
					</p>
				</div>
			</div>
			<div class="totl_money">出游费用：
                <span id="totalTourlinePay">0元</span>
            </div>
			<div class="yufu" <?php if ($this->_var['tourline_info']['yufu_hide'] == 1): ?>style="display:none;"<?php endif; ?> >
				<hr class="hr_solid" />
				<div class="part">
					<p class="part_name">网上预付</p>
					<div id="basic_fare">
						<?php if ($this->_var['tourline_info']['buy_adult_count'] > 0): ?>
						<p class="clearfix pn ">
							<span class="pn_1 f_l"><?php echo $this->_var['tourline_info']['buy_adult_count']; ?>成人 × ¥<?php echo $this->_var['tourline_info']['adult_sale_price']; ?></span>
							<span class="pn_2 f_r">¥<?php echo $this->_var['tourline_info']['adult_sale_price_total']; ?></span>
						</p>
						<?php endif; ?>
						<?php if ($this->_var['tourline_info']['buy_child_count'] > 0): ?>
						<p class="clearfix pn">
							<span class="f_l pn_1"><?php echo $this->_var['tourline_info']['buy_child_count']; ?>儿童 × ¥<?php echo $this->_var['tourline_info']['child_sale_price']; ?></span>
							<span class="f_r pn_2">¥<?php echo $this->_var['tourline_info']['child_sale_price_total']; ?></span>
						</p>
						<?php endif; ?>
					</div>
				</div>
			</div>
			
			<div class="blank"></div>
			<div class="it_money">
				<hr class="hr_dotted" />
				代金券：
                <span id="totalvoucherNet">0元</span>
            </div>
			<div class="it_money">
				<hr class="hr_dotted" />
				余&nbsp;&nbsp;&nbsp;&nbsp;额：
                <span id="totalaccountNet">0元</span>
            </div>
			
			<div class="totl_money">网预付总额：
                <span id="totalPayNet">0元</span>
            </div>
			<div class="act_btn">
			 <input type="button" value="提交订单" class="J_subButton blue_btn">
			 <img src="<?php echo $this->_var['TMPL']; ?>/images/subcart.gif" class="hide J_doing" />
			</div>
			<div class="blank"></div>
		</div>
		
	</div>
</div>
<div class="blank20"></div>
<script type="text/javascript" defer="defer">
$(function(){
	doneCart();
});
</script>
<?php echo $this->fetch('inc/footer_order.html'); ?> 