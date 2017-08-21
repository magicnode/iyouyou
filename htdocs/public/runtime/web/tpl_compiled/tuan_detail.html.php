<?php
$this->_var['pagecss'] = array();
$this->_var['pagejs'] = array();
$this->_var['pagecss'][] = TMPL_REAL."/css/style.css";
$this->_var['pagecss'][] = TMPL_REAL."/css/weebox.css";
$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.bgiframe.js";
$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.weebox.js";
$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.pngfix.js";
$this->_var['pagejs'][] = TMPL_REAL."/js/lazyload.js";
$this->_var['pagejs'][] = TMPL_REAL."/js/script.js";
$this->_var['cpagejs'][] = TMPL_REAL."/js/script.js";
$this->_var['pagecss'][] = TMPL_REAL."/css/tuan_detail.css";
$this->_var['pagejs'][] = TMPL_REAL."/js/tuan_detail.js";
$this->_var['pagecss'][] = TMPL_REAL."/css/review.css";
$this->_var['pagejs'][] = TMPL_REAL."/js/ajax_pages_more.js";
?>
<?php echo $this->fetch('inc/header.html'); ?>
<script type="text/javascript">
var systime = <?php echo NOW_TIME ?>;
var endtime = <?php echo $this->_var['result']['tuan_end_time']; ?>;
var sub_order_url='<?php echo $this->_var['result']['sub_url']; ?>';
var ticket_id='<?php echo $this->_var['result']['ticket_id']; ?>';
$(function() {
    left_time_clock();
	$('.collect_button').click(function(){
		AddFavorite('<?php echo $this->_var['result']['add_url']; ?>','<?php echo $this->_var['result']['name']; ?>');
	})
});
</script>
<script type="text/javascript" src="<?php echo $this->_var['TMPL']; ?>/js/jquery.select.js"></script>
<link href='<?php echo $this->_var['TMPL']; ?>/js/fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo $this->_var['TMPL']; ?>/js/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo $this->_var['TMPL']; ?>/js/fullcalendar/fullcalendar.min.js'></script>

<?php if ($this->_var['result']['state'] == 5): ?>
<div class="main">该团品不存在</div>
<?php else: ?>
<div class="nav_locate">
	  <a href="<?php
echo parse_url_tag("u:tuan#advance|"."".""); 
?>" class="lucky_bonus">团购预告</a>
	  <a href="<?php
echo parse_url_tag("u:tuan#history|"."".""); 
?>" class="lucky_bonus">往期团购</a>
	  <a href="<?php
echo parse_url_tag("u:index#index|"."".""); 
?>">首页</a> &gt <a href="<?php
echo parse_url_tag("u:tuan|"."".""); 
?>">旅游团购（共<em><?php echo $this->_var['total_count']; ?></em>条可卖团品）</a> &gt <a><?php echo $this->_var['result']['name']; ?></a>
</div>



<div class="buy_detail <?php if ($this->_var['result']['state'] == 1): ?>onsell<?php elseif ($this->_var['result']['state'] == 2): ?>starting<?php elseif ($this->_var['result']['state'] == 3): ?>ended<?php elseif ($this->_var['result']['state'] == 4): ?>sellup<?php endif; ?>">
	<h1><?php echo $this->_var['result']['name']; ?></h1>
	<div class="buy_detail_profile"><?php echo $this->_var['result']['brief']; ?></div>
    <div class="buy_detail_content">
		<div class="buy_pic">
			<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['image_url'],
  'w' => '473',
  'h' => '331',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>">
	    </div>
		<div class="buy_detail_info">
			<?php if ($this->_var['type'] == 1): ?>
			<form action="<?php
echo parse_url_tag("u:tourline_order#index|"."".""); 
?>" method="post" >
			<input type="hidden" name="tourline_id" value="<?php echo $this->_var['result']['id']; ?>">
			<?php endif; ?>
			<div class="buy_price">
				<div class="discount">
					<span><?php echo $this->_var['result']['discount']; ?></span>
					折
				</div>
				<div class="price_num">
					<small>￥</small><?php echo $this->_var['result']['price']; ?>起

				</div>
				<div class="original_price">
					<span class="original_price_up">节省 <em>￥<?php echo $this->_var['result']['save']; ?></em></span>
					<span>原价 <del>￥<?php echo $this->_var['result']['origin_price']; ?></del></span>

				</div>
				<div class="buy_now">
					<?php if ($this->_var['type'] == 2): ?>
					<span class="ticket_sub"><a  <?php if ($this->_var['result']['state'] == 1 && $this->_var['result']['is_history'] == 0): ?>href="javascript:void(0);" class="buying"<?php else: ?>class="nobuy" onclick="javascript:return false;"<?php endif; ?>><?php if ($this->_var['result']['state'] == 1 && $this->_var['result']['is_history'] == 0): ?><?php echo $this->_var['result']['button_name']; ?><?php else: ?>已下架<?php endif; ?></a></span>
					<?php elseif ($this->_var['type'] == 1): ?>
					<input type="submit" name="to_order" class="pay_button f_l <?php if ($this->_var['result']['state'] == 1 && $this->_var['result']['is_history'] == 0): ?>buying<?php else: ?>nobuy<?php endif; ?>" value="<?php if ($this->_var['result']['state'] >= 1 && $this->_var['result']['is_history'] == 0): ?><?php echo $this->_var['result']['button_name']; ?><?php else: ?>已下架<?php endif; ?>" <?php if ($this->_var['result']['state'] != 1): ?>disabled="true"<?php endif; ?>>
					<?php endif; ?>
				</div>
			</div>
			<?php if ($this->_var['type'] == 1): ?>
			<div class="travel_input">

				<div class="travel_input_inner">
					<select class="start_date" name="tourline_item_id">
						<option value="0">请选择出发日期</option>
						<?php $_from = $this->_var['tourline_item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't_item');if (count($_from)):
    foreach ($_from AS $this->_var['t_item']):
?>
						<option value="<?php echo $this->_var['t_item']['id_start_time']; ?>" title="<?php echo $this->_var['t_item']['time_price']; ?><?php echo $this->_var['t_item']['brief']; ?>">
							<?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['t_item']['time_price'],
  'a' => '0',
  'b' => '20',
);
echo $k['name']($k['v'],$k['a'],$k['b']);
?>
						</option>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</select>
					<select class="adult_num" name="adult_count">
						<?php $_from = $this->_var['select_num']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'select_adult');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['select_adult']):
?>
						<option value="<?php echo $this->_var['select_adult']['value']; ?>" <?php if ($this->_var['key'] == 0): ?>selected=selected<?php endif; ?>>
							<?php echo $this->_var['select_adult']['value']; ?>
						</option>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</select><span>成人</span>
					<select class="child_num" name="child_count">
						<option value="0">0</option>
						<?php $_from = $this->_var['select_num']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'select_child');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['select_child']):
?>
						<option value="<?php echo $this->_var['select_child']['value']; ?>">
							<?php echo $this->_var['select_child']['value']; ?>
						</option>
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
					</select><span class="children_norm">儿童 <?php if ($this->_var['result']['child_norm']): ?><a>儿童标准？</a> <div class="norm_value"><?php echo $this->_var['result']['child_norm']; ?></div><?php endif; ?></span>

					<span><a href="<?php echo $this->_var['supplier']['company_description']; ?>" title="" target="_blank">营业执照</a></span>
				</div>
			</div>
			</form>
			<?php endif; ?>

			<div class="buy_state <?php if ($this->_var['type'] == 2): ?>buy_state_ticket<?php endif; ?>">
				<div class="person_num <?php if ($this->_var['type'] == 2): ?>person_num_ticket<?php endif; ?>">

				<span><?php echo $this->_var['result']['sale_virtual_total']; ?></span>
				人已购买
				</div>
				<?php if ($this->_var['result']['is_history'] == 0): ?>
				<div class="tuan_ad">数量有限，行动要快哦！</div>
				<div class="remain_time">
					<img src="<?php echo $this->_var['TMPL']; ?>/images/tuan/remain_time.png">
					<span class="bx">
	                	<?php echo $this->_var['result']['count_down']; ?>
					</span>
				</div>
				<?php endif; ?>
		    </div>

			<div class="satisfaction <?php if ($this->_var['type'] == 2): ?>satisfaction_ticket<?php endif; ?>">
				<span class="satisfaction1">满意度：</span>
                <span class="satisfaction2">98%</span>
				<!-- <span class="satisfaction2"><?php echo $this->_var['result']['satify']; ?>%</span>  -->
				<!-- <span class="satisfaction3">已有<em><?php echo $this->_var['result']['review_num']; ?></em>条点评 </span> -->
				<?php if ($this->_var['result']['is_review_return'] == 1): ?><a href="#J_nbox_6" class="return_money"><?php echo $this->_var['result']['review_return']; ?></a><?php endif; ?>
		    </div>



	    </div>



	</div>
</div>
<script>
	$(document).ready(function(){
		$(".calendar select").sSelect();

		//日历价格
	$('#calendar').fullCalendar({
			header:{
				left: 'prev',
				center: 'title',
				right: 'next'
			},
			monthNames: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
			dayNamesShort:['日','一','二','三','四','五','六'],
			buttonText: {
                prev: ' ◄ ',
                next: ' ► ',
                prevYear: ' << ',
                nextYear: ' >> ',
                today: '今天',
                month: '月',
                week: '周',
                day: '天'
            },
			height: 540,
			events: <?php echo $this->_var['json_item']; ?>,

		    eventClick: function(calEvent, jsEvent, view) {
				$(".mid-buy_box").show();
				$(".mid-buy_box").css({"position":"absolute","left":jsEvent.pageX-100,"top":jsEvent.pageY+20});
				$(".mid-buy_box").find(".mid_tourline_item_id").val(calEvent.id);
				$(".mid-buy_box").find(".mid_tourline_item_time").val($.fullCalendar.formatDate( calEvent.start, 'yyyy-MM-d'));
		    },
			eventMouseover: function(calEvent, jsEvent, view) {
				if(calEvent.content.length >0)
				{
					$(".calendar_mouseover").html(calEvent.content);
					$(".calendar_mouseover").show();
					$(".calendar_mouseover").css({"position":"absolute","left":jsEvent.pageX+20,"top":jsEvent.pageY-50});
				}
		    },
			eventMouseout: function(calEvent, jsEvent, view) {
				$(".calendar_mouseover").hide();
		    },
			loading: function(bool) {
				if(bool)
					$('#loading').show();
				else
					$('#loading').hide();
			}

		});
	});

</script>
<style>
	/*fullcalendar(日历插件)修改 样式 */
#loading {
		position: absolute;
		top: 5px;
		right: 5px;
		}

	#calendar {
	    width: 698px;
		margin: 0 auto;
		}
	.fc-header {
		border: 1px solid #EAEAEA;
		border-bottom: none;
	}
	.fc-header-title h2 {
		margin: 0 auto;
		white-space: nowrap;
		display: inline-block;
		width: 68px;
		height: 22px;
		line-height: 22px;
		font-size: 12px;
		color: #404040;
		margin: 0 auto;
		font-weight: 400;
		}
	.fc-state-default {
		background:none;
		border:none;
	}
	.fc-button{
		display:inherit;
	}

	.fc-header-left,.fc-header-right{
		width:26px;
	}
	.fc-state-default, .fc-state-default .fc-button-inner {
		color: #0053AA;
	}
	.fc-event{
		background:none;
		border:none;
	}
	.fc-event-inner{
		text-align:center;
	}
	.fc-event-title{
		font-size:13px;
	}
/*fullcalendar(日历插件)修改 样式 end*/
</style>
<div class="main">
	<div class="main_left">
		<?php if ($this->_var['type'] == 1): ?>
			<div class="nav">
				<ul id="J_navbar">

						<li class="cur"><a href="javascript:void(0);" rel="0">日期价格</a></li>

                        <li ><a href="javascript:void(0);" rel="1">线路行程</a></li>

						<?php if ($this->_var['result']['tour_desc_1_name'] != ''): ?>
						<li><a href="javascript:void(0);" rel="2"><?php echo $this->_var['result']['tour_desc_1_name']; ?></a></li>
						<?php endif; ?>
						<?php if ($this->_var['result']['tour_desc_2_name'] != ''): ?>
						<li><a href="javascript:void(0);" rel="3"><?php echo $this->_var['result']['tour_desc_2_name']; ?></a></li>
						<?php endif; ?>
						<?php if ($this->_var['result']['tour_desc_3_name'] != ''): ?>
						<li><a href="javascript:void(0);" rel="4"><?php echo $this->_var['result']['tour_desc_3_name']; ?></a></li>
						<?php endif; ?>
						<?php if ($this->_var['result']['tour_desc_4_name'] != ''): ?>
						<li><a href="javascript:void(0);" rel="5"><?php echo $this->_var['result']['tour_desc_4_name']; ?></a></li>
						<?php endif; ?>

						<li><a href="javascript:void(0);" rel="6">预订须知</a></li>
						<?php if ($this->_var['result']['show_sale_list'] == 1): ?>
						<li><a href="javascript:void(0);" rel="7">成交记录</a></li>
						<?php endif; ?>
						<li><a href="javascript:void(0);" rel="8">购买评价</a></li>


				</ul>
			</div>

			<h4 id="J_nbox_0" class="this_detail">日期价格</h4>
			<div class="calendar">
				<!-- 日历插件 div -->
				<div id='loading' style='display:none'>loading...</div>
				<div id='calendar'></div>
				<!-- 日历弹出 div -->
				<div class="buy_box mid-buy_box" >
					<form action="<?php
echo parse_url_tag("u:tourline_order#index|"."".""); 
?>" method="post" >
					<p>
						<input type="text" name="tourline_item_time" class="mid_tourline_item_time" value="">
						<input type="hidden" name="tourline_item_id" class="mid_tourline_item_id" value="">
					</p>
					<div class="blank"></div>
					<div class="clearfix">
						<div class="f_l">
							<select name="adult_count" style="width:37px;*width:45px;">
								<?php $_from = $this->_var['select_num']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'select_adult');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['select_adult']):
?>
									<option value="<?php echo $this->_var['select_adult']['value']; ?>" <?php if ($this->_var['key'] == 0): ?>selected=selected<?php endif; ?>>
										<?php echo $this->_var['select_adult']['value']; ?>
									</option>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</select> <span class="f_l ptn" style="margin-right:5px;">成人</span>
							<select name="child_count" style="width:37px;*width:45px;">
								<option value="0">0</option>
								<?php $_from = $this->_var['select_num']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'select_child');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['select_child']):
?>
									<option value="<?php echo $this->_var['select_child']['value']; ?>">
										<?php echo $this->_var['select_child']['value']; ?>
									</option>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</select> <span class="f_l ptn" >儿童</span>
						</div>
						<?php if ($this->_var['result']['child_norm']): ?>
						<div class="child_norm f_r">
							<a class="norm_a">儿童标准&nbsp;&nbsp;▼</a>
							<div class="norm_value">
								<?php echo $this->_var['result']['child_norm']; ?>
							</div>
						</div>
						<?php endif; ?>
					</div>
					<div class="blank"></div>
					<p class="clearfix">
						<input type="hidden" name="tourline_id" value="<?php echo $this->_var['result']['id']; ?>">
						<span><input type="submit" name="to_order" class="to_pay_button f_l" value="立即预定"></span>
					</p>
					</form>
				</div>
			    <!-- 日历弹出 div end-->
				<!-- mouseover div-->
				<div class="calendar_mouseover"></div>
				<!-- mouseover div end-->
			</div>
            <div id="J_nbox_1" >
            <?php echo $this->_var['result']['tour_desc']; ?>
            </div>
			<?php if ($this->_var['result']['tour_desc_1_name'] != ''): ?>
			<h4 id="J_nbox_2"><?php echo $this->_var['result']['tour_desc_1_name']; ?></h4>
			<div class="this_detail">
				<?php echo $this->_var['result']['tour_desc_1']; ?>
			</div>
			<?php endif; ?>

			<?php if ($this->_var['result']['tour_desc_2_name'] != ''): ?>
			<h4 id="J_nbox_3"><?php echo $this->_var['result']['tour_desc_2_name']; ?></h4>
			<div class="this_detail">
				<?php echo $this->_var['result']['tour_desc_2']; ?>
			</div>
			<?php endif; ?>

			<?php if ($this->_var['result']['tour_desc_3_name'] != ''): ?>
			<h4 id="J_nbox_4"><?php echo $this->_var['result']['tour_desc_3_name']; ?></h4>
			<div class="this_detail">
				<?php echo $this->_var['result']['tour_desc_3']; ?>
			</div>
			<?php endif; ?>

			<?php if ($this->_var['result']['tour_desc_4_name'] != ''): ?>
			<h4 id="J_nbox_5"><?php echo $this->_var['result']['tour_desc_4_name']; ?></h4>
			<div class="this_detail">
				<?php echo $this->_var['result']['tour_desc_4']; ?>
			</div>
			<?php endif; ?>

		<?php elseif ($this->_var['type'] == 2): ?>
			<div class="nav">
				<ul id="J_navbar">
						<li class="cur"><a href="javascript:void(0);" rel="0">景点简介</a></li>


						<?php if ($this->_var['result']['spot_desc_1_name'] != ''): ?>
						<li><a href="javascript:void(0);" rel="1"><?php echo $this->_var['result']['spot_desc_1_name']; ?></a></li>
						<?php endif; ?>
						<?php if ($this->_var['result']['spot_desc_2_name'] != ''): ?>
						<li><a href="javascript:void(0);" rel="2"><?php echo $this->_var['result']['spot_desc_2_name']; ?></a></li>
						<?php endif; ?>
						<?php if ($this->_var['result']['spot_desc_3_name'] != ''): ?>
						<li><a href="javascript:void(0);" rel="3"><?php echo $this->_var['result']['spot_desc_3_name']; ?></a></li>
						<?php endif; ?>
						<?php if ($this->_var['result']['spot_desc_4_name'] != ''): ?>
						<li><a href="javascript:void(0);" rel="4"><?php echo $this->_var['result']['spot_desc_4_name']; ?></a></li>
						<?php endif; ?>

						<li><a href="javascript:void(0);" rel="6">预订须知</a></li>
						<?php if ($this->_var['result']['show_sale_list'] == 1): ?>
						<li><a href="javascript:void(0);" rel="7">成交记录</a></li>
						<?php endif; ?>
						<li><a href="javascript:void(0);" rel="8">购买评价</a></li>

				</ul>
			</div>
			<div id="J_nbox_0" class="this_detail">
	              <?php echo $this->_var['result']['brief_full']; ?>
			</div>
			<?php if ($this->_var['result']['spot_desc_1_name'] != ''): ?>
			<h4 id="J_nbox_1"><?php echo $this->_var['result']['spot_desc_1_name']; ?></h4>
			<div class="this_detail">
				<?php echo $this->_var['result']['spot_desc_1']; ?>
			</div>
			<?php endif; ?>

			<?php if ($this->_var['result']['spot_desc_2_name'] != ''): ?>
			<h4 id="J_nbox_2"><?php echo $this->_var['result']['spot_desc_2_name']; ?></h4>
			<div class="this_detail">
				<?php echo $this->_var['result']['spot_desc_2']; ?>
			</div>
			<?php endif; ?>

			<?php if ($this->_var['result']['spot_desc_3_name'] != ''): ?>
			<h4 id="J_nbox_3"><?php echo $this->_var['result']['spot_desc_3_name']; ?></h4>
			<div class="this_detail">
				<?php echo $this->_var['result']['spot_desc_3']; ?>
			</div>
			<?php endif; ?>

			<?php if ($this->_var['result']['spot_desc_4_name'] != ''): ?>
			<h4 id="J_nbox_4"><?php echo $this->_var['result']['spot_desc_4_name']; ?></h4>
			<div class="this_detail">
				<?php echo $this->_var['result']['spot_desc_4']; ?>
			</div>
			<?php endif; ?>



		<?php endif; ?>
			<h4 id="J_nbox_6">预订须知</h4>
			<div class="this_detail">
				<?php echo $this->_var['result']['appointment_desc']; ?>
			</div>

			<?php if ($this->_var['result']['show_sale_list'] == 1): ?>
			<h4 id="J_nbox_7">成交记录</h4>
			<div class="this_detail">
									<div class="t">成交记录</div>
					<div class="bx">
						<div id="SPOT_SALE_LIST" class="sale_list">
						<?php echo $this->_var['sale_result']['html']; ?>
						</div>
						<div id="SPOT_SALE_PAGES" class="page" style="text-align: right;">
						<?php echo $this->_var['sale_result']['pager']; ?>
						</div>
					</div>
			</div>
			<?php endif; ?>

			<h4 id="J_nbox_8">购买评价</h4>
			<div class="evaluate">
	           <?php echo $this->_var['review_html']; ?>

			</div>
	</div>
	</div>


	
</div>
<?php endif; ?>

<?php echo $this->fetch('inc/footer.html'); ?> 