<?php

	$this->_var['pagecss'][] = TMPL_REAL."/css/style.css";

	$this->_var['pagecss'][] = TMPL_REAL."/css/weebox.css";

	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.bgiframe.js";

	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.weebox.js";

	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.pngfix.js";

	$this->_var['pagejs'][] = TMPL_REAL."/js/lazyload.js";

    $this->_var['pagejs'][] = TMPL_REAL."/js/ajax_pages_more.js";

	$this->_var['pagejs'][] = TMPL_REAL."/js/script.js";

	$this->_var['cpagejs'][] = TMPL_REAL."/js/script.js";

        

	$this->_var['pagejs'][] = TMPL_REAL."/js/tourline_view.js";

	$this->_var['pagejs'][] = TMPL_REAL."/js/ajax_pages_more.js";

    $this->_var['pagecss'][] = TMPL_REAL."/css/tourline_viwe.css";

    $this->_var['pagecss'][] = TMPL_REAL."/css/review.css";

?>

<?php echo $this->fetch('inc/header.html'); ?>

<?php echo $this->fetch('inc/ur_here.html'); ?>

<script>

	var tourline_order_url='<?php echo $this->_var['tourline_order_url']; ?>';

</script>

<link rel="stylesheet" type="text/css" href="<?php 
$k = array (
  'name' => 'parse_css',
  'v' => $this->_var['pagecss'],
);
echo $k['name']($k['v']);
?>" />

<script type="text/javascript" src="<?php 
$k = array (
  'name' => 'parse_script',
  'v' => $this->_var['pagejs'],
);
echo $k['name']($k['v']);
?>"></script>

<script type="text/javascript" src="<?php echo $this->_var['TMPL']; ?>/js/jquery.select.js"></script>



<link href='<?php echo $this->_var['TMPL']; ?>/js/fullcalendar/fullcalendar.css' rel='stylesheet' />

<link href='<?php echo $this->_var['TMPL']; ?>/js/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />

<script src='<?php echo $this->_var['TMPL']; ?>/js/fullcalendar/fullcalendar.min.js'></script>

<script>

	$(document).ready(function(){

		$("select").sSelect();

		

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

			height: 400,

			events: <?php echo $this->_var['json_item']; ?>,

		    eventClick: function(calEvent, jsEvent, view) {

				$(".mid-buy_box").show();

				$(".mid-buy_box").css({"position":"absolute","left":jsEvent.pageX-100,"top":jsEvent.pageY+20});				$(".mid-buy_box").find(".mid_tourline_item_id").val(calEvent.id);

				$(".mid-buy_box").find(".mid_tourline_item_time").val($.fullCalendar.formatDate( calEvent.start, 'yyyy-MM-d'));

		    },

			eventMouseover: function(calEvent, jsEvent, view) {

				if(calEvent.content.length >0 )

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

		width: 480px;

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

/*fullcalendar(日历插件)修改 样式 end*/

</style>

<div class="wrap">

			<div class="clearfix">

			<!-- 左侧-->

			<div class="f_l left_side">

				<?php echo $this->fetch('inc/side_supplier.html'); ?>
                 <!--   城市-->
				<!-- <div class="place_choose">
				
					<?php $_from = $this->_var['filter_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'f_item');if (count($_from)):
    foreach ($_from AS $this->_var['f_item']):
?>
				
					<div class="place_tit">
				
						<a href="<?php echo $this->_var['f_item']['url']; ?>">
				
							<?php echo $this->_var['f_item']['name']; ?>
				
							<span>(<?php echo $this->_var['f_item']['count']; ?>)</span>
				
						</a>
				
						<span class="p_button"></span>
				
					</div>
				
					<div class="place_con <?php if ($this->_var['f_item']['py'] == $this->_var['param']['a_py']): ?> cur <?php endif; ?>">
				
						<?php $_from = $this->_var['f_item']['sub_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sub_item');if (count($_from)):
    foreach ($_from AS $this->_var['sub_item']):
?>
				
							<a href="<?php echo $this->_var['sub_item']['url']; ?>" <?php if ($this->_var['sub_item']['act'] == 1): ?>class="current"<?php endif; ?> title="<?php echo $this->_var['sub_item']['name']; ?>(<?php echo $this->_var['sub_item']['count']; ?>)"><span><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['sub_item']['name'],
  'a' => '0',
  'b' => '3',
);
echo $k['name']($k['v'],$k['a'],$k['b']);
?>(<?php echo $this->_var['sub_item']['count']; ?>)</span></a>
				
						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				
					</div>
				
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				
				</div> -->
                <!-- 其他线路-->
          
               
                 <!--<div class="dx">
                 <?php if ($this->_var['suplier_otherlist']): ?>
			       <?php $_from = $this->_var['suplier_otherlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'otherlist');if (count($_from)):
    foreach ($_from AS $this->_var['otherlist']):
?>
                     <p class="one" >
                         <span class="thumb"><a href="<?php echo $this->_var['otherlist']['view_url']; ?>" title="<?php echo $this->_var['otherlist']['name']; ?>"><img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['otherlist']['image'],
  'w' => '160',
  'h' => '90',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" /></a></span>
    
                         <span class="t"><a href="<?php echo $this->_var['otherlist']['view_url']; ?>" title="<?php echo $this->_var['otherlist']['name']; ?>"><?php 
$k = array (
  'name' => 'msubstr',
  'value' => $this->_var['otherlist']['name'],
  'a' => '0',
  'b' => '22',
);
echo $k['name']($k['value'],$k['a'],$k['b']);
?></a></span>
    
                          <span class="price">&yen;<?php echo $this->_var['otherlist']['price']; ?></a></span>
                     </p>
			       <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endif; ?>
	            </div>-->
                <style type="text/css">
				.scroll{height:2016px;width:210px;border:solid 1px #ddd;}
				.scroll p{line-height:22px; padding: 5px 20px; color:#FE6500}
				.scroll p a{color:#666}
				.scroll p span{display:block; text-align:center}
				</style>
                
                <script type="text/javascript">
					function addEventSimple(obj,evt,fn){
						if(obj.addEventListener){
							obj.addEventListener(evt,fn,false);
						}else if(obj.attachEvent){
							obj.attachEvent('on'+evt,fn);
						}
					}
					
					addEventSimple(window,'load',initScrolling);
					
					var scrollingBox;
					var scrollingInterval;
					var reachedBottom=false;
					var bottom;
					
					function initScrolling(){
						scrollingBox = document.getElementById('xst');
						scrollingBox.style.overflow = "hidden";
						scrollingInterval = setInterval("scrolling()",50);
						scrollingBox.onmouseover = over;
						scrollingBox.onmouseout = out; 
					}
					
					function scrolling(){
						var origin = scrollingBox.scrollTop++;
						if(origin == scrollingBox.scrollTop){
							if(!reachedBottom){
								scrollingBox.innerHTML+=scrollingBox.innerHTML;
								reachedBottom=true;
								bottom=origin;
							}else{
								scrollingBox.scrollTop=bottom;
							}
						}
					}
					
					function over(){
						clearInterval(scrollingInterval);
					}
					function out(){
						scrollingInterval = setInterval("scrolling()",50);
					}
					</script>
                
                <div class="scroll" id="xst">
                
                <?php if ($this->_var['suplier_otherlist']): ?>
			       <?php $_from = $this->_var['suplier_otherlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'otherlist');if (count($_from)):
    foreach ($_from AS $this->_var['otherlist']):
?>
                     <p><a href="<?php echo $this->_var['otherlist']['view_url']; ?>" title="<?php echo $this->_var['otherlist']['name']; ?>"><img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['otherlist']['image'],
  'w' => '160',
  'h' => '90',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" /></a></p>
                    <p><a href="<?php echo $this->_var['otherlist']['view_url']; ?>" target="_blank"><?php 
$k = array (
  'name' => 'msubstr',
  'value' => $this->_var['otherlist']['name'],
  'a' => '0',
  'b' => '22',
);
echo $k['name']($k['value'],$k['a'],$k['b']);
?><br/></a><span>￥<?php echo $this->_var['otherlist']['price']; ?></span></p>
                  
                     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endif; ?>
                    
                    <!--<p><a href=href="#" target="_blank">【湘西全景、特惠湘西游双卧7日】长沙 韶山 …<br/>￥2012</a></p>
                    <p><a href="<?php echo $this->_var['otherlist']['view_url']; ?>" title="<?php echo $this->_var['otherlist']['name']; ?>"><img width="150" height="150" src="images/2.jpg" /></a></p>
                    <p><a href=href="#" target="_blank">【湘西全景、特惠湘西游双卧7日】长沙 韶山 …<br/>￥2012</a></p>
                    <p><img width="150" height="150" src="images/3.jpg" /></p>
                    <p><a href=href="#" target="_blank">js文字滚动制作js scroll单排文字滚动向上间隔滚动<br/>￥2012</a></p>
                    <p><img width="150" height="150" src="images/4.jpg" /></p>-->
                </div>




            
               <!-- 其他线路 end-->

				<?php 
$k = array (
  'name' => 'side_review',
  'p' => '3',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>

				<!--销量排行榜-->

				<?php echo $this->fetch('inc/tourline/topsale.html'); ?>

			

				<!--猜你喜欢-->

				<?php echo $this->fetch('inc/tourline/rand_tourlist.html'); ?>

				<?php if ($this->_var['tourline']['adv1_image']): ?>

				<div class="adver">

					<a href="<?php echo $this->_var['tourline']['adv1_url']; ?>" title="<?php echo $this->_var['tourline']['adv1_name']; ?>"><img src="<?php echo $this->_var['tourline']['adv1_image']; ?>"></a>

				</div>

				<?php endif; ?>

				<?php if ($this->_var['tourline']['adv2_image']): ?>

				<div class="adver">

					<a href="$tourline.adv2_url" title="<?php echo $this->_var['tourline']['adv2_name']; ?>"><img src="<?php echo $this->_var['tourline']['adv2_image']; ?>"></a>

				</div>	

				<?php endif; ?>

			</div>	

			<!-- 左侧end-->

			<!-- 右侧-->

			<div class="right_side">

				<div class="tour_header">

					<h3 ><?php echo $this->_var['tourline']['name']; ?></h3>

					<div class="ser_sm">

			            <span> 本产品由<?php echo $this->_var['supplier']['company_name']; ?>提供相关服务 </span>

						<span class="f_4e9700">&nbsp;&nbsp;[<?php echo $this->_var['tourline']['start_city_name']; ?>出发]&nbsp;&nbsp;<span>                      

						

			        </div>

				</div>



				<div class="tour_mid clearfix">

					<div class="tour_img_price f_l">

						<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['tourline']['image'],
  'w' => '480',
  'h' => '320',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" />

						<div class="blank13"></div>

						<div class="tour_start">

	                        <span>出发日期与价格</span>

	                        <span class="f60">（有价格的团期均可直接网上预订）</span>

	                    </div> 

						<div class="blank10"></div>

						<!-- 日历插件 div -->

						<div id='loading' style='display:none'>loading...</div>

						<div id='calendar'></div>

						<!-- 日历弹出 div -->

						<div class="buy_box mid-buy_box" >

							<form action="<?php
echo parse_url_tag("u:tourline_order#index|"."".""); 
?>" method="post" name="form_m">

							<p>

								<input type="text" name="tourline_item_time" class="mid_tourline_item_time" value="">

								<input type="hidden" name="tourline_item_id" class="mid_tourline_item_id" value="">

							</p>

							<div class="blank"></div>

							<div class="clearfix">

								<div class="f_l">

									<select name="adult_count" style="width:37px;*width:45px;">

										<?php $_from = $this->_var['select_adult_people']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'select_item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['select_item']):
?>

											<option value="<?php echo $this->_var['select_item']['value']; ?>" <?php if ($this->_var['key'] == 1): ?>selected=selected<?php endif; ?>>

												<?php echo $this->_var['select_item']['value']; ?>

											</option>

										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

									</select> <span class="f_l ptn" style="margin-right:5px;">成人</span>

									<select name="child_count" style="width:37px;*width:45px;">

										<?php $_from = $this->_var['select_child_people']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'select_item');if (count($_from)):
    foreach ($_from AS $this->_var['select_item']):
?>

											<option value="<?php echo $this->_var['select_item']['value']; ?>">

												<?php echo $this->_var['select_item']['value']; ?>

											</option>

										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

									</select> <span class="f_l ptn" >儿童</span>

								</div>

								<?php if ($this->_var['tourline']['child_norm']): ?>

								<div class="child_norm f_r">

									<a href="javascript:viod(0);" class="norm_a">儿童标准&nbsp;&nbsp;▼</a>

									<div class="norm_value">

										<?php echo $this->_var['tourline']['child_norm']; ?>

									</div>

								</div>

								<?php endif; ?>

							</div>

							<div class="blank"></div>

							<p class="clearfix">

								<input type="hidden" name="tourline_id" value="<?php echo $this->_var['tourline']['id']; ?>">

								<?php if ($this->_var['tourline']['is_history'] == 0): ?>

								<input type="button" name="to_order" class="to_pay_button f_l" value="立即预定">

								<?php endif; ?>

							</p>

							</form>

						</div>

						<!-- 日历弹出 div end-->

						<!-- 日历弹出 div end-->

						<!-- mouseover div-->

						<div class="calendar_mouseover"></div>

						<!-- mouseover div end-->

					</div>

					<div class="tour_info f_r">

						<table border=0 >

							 <tr>

								  <th width='72' >线路编号：</th>

								  <td><?php echo $this->_var['tourline']['id']; ?></td>

							 </tr>

							 <tr align=center>

								  <th>行成天数：</th>

								  <td><?php echo $this->_var['tourline']['tour_total_day']; ?>日</td>

							 </tr>

							 <tr align=center>

								  <th>门市价格：</th>

								  <td><span class="yj"><?php echo $this->_var['tourline']['origin_price']; ?></span>元</td>

							 </tr>

							 <tr align=center>

								  <th>网上价格：</th>

								  <td>

								  	<span> <strong class="qj"><?php echo $this->_var['tourline']['price']; ?></strong>元起</span>

									<a href="javascript:void(0);"  class="shm" title="<?php echo $this->_var['tourline']['price_explain']; ?>" >起价说明</a>

								  </td>

							 </tr>

							  <tr align=center>

								  <th>满意度：</th>

								  <td><span ><?php echo $this->_var['tourline']['format_satify']; ?>%</span> <a>已有 <span class="f6551f"><?php echo $this->_var['tourline']['review_total']; ?></span>人点评</a></td>

							 </tr>

							 <tr>

								  <th>提前报名：</th>

								  <td>建议提前<?php echo $this->_var['tourline']['tour_total_day']; ?>天以上</td>

							 </tr>

							 <?php if ($this->_var['tourline']['is_review_return'] == 1): ?>

							 <tr>

								  <th>点评奖金：</th>

								  <td><span class="f6551f"><?php echo $this->_var['tourline']['review_return_money']; ?>元现金</span></td>

							 </tr>

							 <?php endif; ?>

							 <?php if ($this->_var['tourline']['is_buy_return'] == 1): ?>

							  <tr>

								  <th>会员特惠：</th>

								  <td>

								  	<?php if ($this->_var['tourline']['return_money_val']): ?>

								  	<span class="jiang f6551f"><span class="val" ><?php echo $this->_var['tourline']['return_money_val']; ?>元现金</span></span>

									<?php endif; ?>

									<?php if ($this->_var['tourline']['return_score_val']): ?>

									&nbsp;&nbsp;<span class="jiang f6551f"><span class="val" ><?php echo $this->_var['tourline']['return_score_val']; ?>积分</span></span>

									<?php endif; ?>

								  </td>

							 </tr>

							 <?php endif; ?>

							 <?php if ($this->_var['tourline']['is_rebate'] == 1 && $this->_var['return_conf']['REBATE_MONEY'] > 0): ?>

							 <tr>

								  <th>分享有奖：</th>

								  <td>

								  	<span class="jiang f6551f"><span class="val" ><?php echo $this->_var['return_conf']['REBATE_MONEY_VAL']; ?>元现金</span></span>

								  </td>

							 </tr>

							 <?php endif; ?>

						</table>

						<!-- 预定信息-->

						<div class="buy_box">

							<form action="<?php
echo parse_url_tag("u:tourline_order#index|"."".""); 
?>" method="post" name="form_l">

							<p>

								<select name="tourline_item_id" style="width:235px;">

									<option value="0">

										请选择你的出发日期

									</option>

									<?php $_from = $this->_var['tourline']['tourline_item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 't_item');if (count($_from)):
    foreach ($_from AS $this->_var['t_item']):
?>

									<option value="<?php echo $this->_var['t_item']['id_start_time']; ?>" title="<?php echo $this->_var['t_item']['time_price']; ?><?php echo $this->_var['t_item']['brief']; ?>">

										<?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['t_item']['time_price'],
  'a' => '0',
  'b' => '25',
);
echo $k['name']($k['v'],$k['a'],$k['b']);
?>

									</option>

									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

								</select>

							</p>

							<div class="blank"></div>

							<div class="clearfix">

								<div class="f_l">

									<select name="adult_count">

										<?php $_from = $this->_var['select_adult_people']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'adult_item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['adult_item']):
?>

											<option value="<?php echo $this->_var['adult_item']['value']; ?>" <?php if ($this->_var['key'] == 1): ?>selected=selected<?php endif; ?>>

												<?php echo $this->_var['adult_item']['value']; ?>

											</option>

										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

									</select> <span class="f_l ptn" style="margin-right:5px;">成人</span>

									<select name="child_count" >

										<?php $_from = $this->_var['select_child_people']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'child_item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['child_item']):
?>

											<option value="<?php echo $this->_var['child_item']['value']; ?>" >

												<?php echo $this->_var['child_item']['value']; ?>

											</option>

										<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

									</select> <span class="f_l ptn" >儿童</span>

								</div>

								<?php if ($this->_var['tourline']['child_norm']): ?>

								<div class="child_norm f_r">

									<a href="javascript:viod(0);" class="norm_a">儿童标准&nbsp;&nbsp;▼</a>

									<div class="norm_value">

										<?php echo $this->_var['tourline']['child_norm']; ?>

									</div>

								</div>

								<?php endif; ?>

							</div>

							<div class="blank"></div>

							

							<p class="clearfix">

								<input type="hidden" name="tourline_id" value="<?php echo $this->_var['tourline']['id']; ?>">

								<?php if ($this->_var['tourline']['is_history'] == 0): ?>

								<button type="button" name="to_order" class="to_pay_button f_l" >立即预定</button>

								<?php else: ?>

								<button type="button" class="to_pay_button f_l" >已下架</button>

								<?php endif; ?>

								<!--

								<a href="" class="collect_tour f_l">收藏此路线</a>

								-->

							</p>

							</form>

						</div>

						<!-- 预定信息 end-->

						<div class="blank13"></div>

						<div class="tel_order mb_10">

                        	<p class="pd_10">为确保您的交易安全，在线支付成功并出游归来后，我们零售平台才向商家打款。</p>

                    	</div>

						<div class="blank13"></div>

						<div class="tourline_img">

							

						</div>

						<div class="tourline_share"></div>

					</div>

				

				</div>

				<div class="blank15"></div>

				<div class="tour_bottom" >

					<div class="nav">

						<ul id="J_navbar">

							<li class="cur"><a href="javascript:void(0);" rel="0">线路详情</a></li>

							<li><a href="javascript:void(0);" rel="1">预订须知</a></li>

							

							<?php if ($this->_var['tourline']['tour_desc_1_name'] != ''): ?>

							<li><a href="javascript:void(0);" rel="s1"><?php echo $this->_var['tourline']['tour_desc_1_name']; ?></a></li>

							<?php endif; ?>

							<?php if ($this->_var['tourline']['tour_desc_2_name'] != ''): ?>

							<li><a href="javascript:void(0);" rel="s2"><?php echo $this->_var['tourline']['tour_desc_2_name']; ?></a></li>

							<?php endif; ?>

							<?php if ($this->_var['tourline']['tour_desc_3_name'] != ''): ?>

							<li><a href="javascript:void(0);" rel="s3"><?php echo $this->_var['tourline']['tour_desc_3_name']; ?></a></li>

							<?php endif; ?>

							<?php if ($this->_var['tourline']['tour_desc_4_name'] != ''): ?>

							<li><a href="javascript:void(0);" rel="s4"><?php echo $this->_var['tourline']['tour_desc_4_name']; ?></a></li>

							<?php endif; ?>

							<?php if ($this->_var['tourline']['show_sale_list'] == 1): ?>

							<li><a href="javascript:void(0);" rel="2">成交记录</a></li>

							<?php endif; ?>

							<li><a href="javascript:void(0);" rel="999">相关游记</a></li>

							<li><a href="javascript:void(0);" rel="4">游客点评</a></li>

						</ul>

					</div>

					<!--线路行程-->

					<div class="box" id="J_nbox_0">

						<div class="t">线路详情</div>

						<div class="bx"><?php echo $this->_var['tourline']['tour_desc']; ?></div>

					</div>

					

					<!--预订须知-->

					<div class="box" id="J_nbox_1">

						<div class="t">预订须知</div>

						<div class="bx"><?php echo $this->_var['tourline']['appoint_desc']; ?></div>

					</div>

					

					<?php if ($this->_var['tourline']['tour_desc_1_name'] != ''): ?>

					<!--<?php echo $this->_var['tourline']['tour_desc_1_name']; ?>-->

					<div class="box" id="J_nbox_s1">

						<div class="t"><?php echo $this->_var['tourline']['tour_desc_1_name']; ?></div>

						<div class="bx"><?php echo $this->_var['tourline']['tour_desc_1']; ?></div>

					</div>

					<?php endif; ?>

					

					<?php if ($this->_var['tourline']['tour_desc_2_name'] != ''): ?>

					<!--<?php echo $this->_var['tourline']['tour_desc_2_name']; ?>-->

					<div class="box" id="J_nbox_s2">

						<div class="t"><?php echo $this->_var['tourline']['tour_desc_2_name']; ?></div>

						<div class="bx"><?php echo $this->_var['tourline']['tour_desc_2']; ?></div>

					</div>

					<?php endif; ?>

					<?php if ($this->_var['tourline']['tour_desc_3_name'] != ''): ?>

					<!--<?php echo $this->_var['tourline']['tour_desc_3_name']; ?>-->

					<div class="box" id="J_nbox_s3">

						<div class="t"><?php echo $this->_var['tourline']['tour_desc_3_name']; ?></div>

						<div class="bx"><?php echo $this->_var['tourline']['tour_desc_3']; ?></div>

					</div>

					<?php endif; ?>

					<?php if ($this->_var['tourline']['tour_desc_4_name'] != ''): ?>

					<!--<?php echo $this->_var['tourline']['tour_desc_4_name']; ?>-->

					<div class="box" id="J_nbox_s4">

						<div class="t"><?php echo $this->_var['tourline']['tour_desc_4_name']; ?></div>

						<div class="bx"><?php echo $this->_var['tourline']['tour_desc_4']; ?></div>

					</div>

					<?php endif; ?>

					

					<?php if ($this->_var['tourline']['show_sale_list'] == 1): ?>

					<!--成交记录-->

					<div class="box" id="J_nbox_2">

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

					<!--成交了记录-->

					<?php endif; ?>

					<!--相关游记-->

					<div class="box" id="J_nbox_999">

						<div class="t">相关游记</div>

						<div class=""><?php 
$k = array (
  'name' => 'view_guide',
  'p' => $this->_var['tourline']['tour_guide_key'],
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?></div>

					</div>

					<!--游客点评-->

					<div class="box" id="J_nbox_4">

						<div class="t">游客点评</div>

						<div class="bx"><?php echo $this->_var['review_html']; ?></div>

					</div>

					

				</div>

				

			</div>

			<!-- 右侧 end-->

		</div>		

</div>

<div class="blank20"></div>

<script type="text/javascript">

	var timer;  

    $(function(){

		var default_tp = $("#J_navbar").parent().offset().top;

	  

	  $("#SPOT_SALE_PAGES .pages").init_page($("#SPOT_SALE_LIST"),null);

	  

	  $("#J_navbar a").bind("click",function(){

	  	var rel = $(this).attr("rel");

		var box = $("#J_nbox_"+rel);

		var top = $(box).offset().top-30;

		$("html,body").animate({scrollTop:top},"fast","swing");

	});

	

      $(window).scroll(function(){  

        clearInterval(timer);  

        var topScroll=getScroll(); 

		if(topScroll > default_tp){

			 $("#J_navbar").addClass("fixed");

            if ($.browser.msie && $.browser.version == "6.0") {

               var topDiv=0;  

               var top=topScroll+parseInt(topDiv);

               timer=setInterval(function(){  

                    $("#J_navbar").animate({"top":top+"px"},50);  

               },0);

           }		

		     

			if(topScroll>=Math.floor($("#J_nbox_0").offset().top-30)){

				$("#J_navbar li").removeClass("cur");

				$("#J_navbar li a[rel='0']").parent().addClass("cur");

			}

			if(topScroll>=Math.floor($("#J_nbox_1").offset().top-30)){

				 $("#J_navbar li").removeClass("cur");

				 $("#J_navbar li a[rel='1']").parent().addClass("cur");

			}

			

			<?php if ($this->_var['tourline']['tour_desc_1_name'] != ''): ?>

			if(topScroll>=Math.floor($("#J_nbox_s1").offset().top-30)){

				 $("#J_navbar li").removeClass("cur");

				 $("#J_navbar li a[rel='s1']").parent().addClass("cur");

			}

			<?php endif; ?>

			<?php if ($this->_var['tourline']['tour_desc_2_name'] != ''): ?>

			if(topScroll>=Math.floor($("#J_nbox_s2").offset().top-30)){

				 $("#J_navbar li").removeClass("cur");

				 $("#J_navbar li a[rel='s2']").parent().addClass("cur");

			}

			<?php endif; ?>

			<?php if ($this->_var['tourline']['tour_desc_3_name'] != ''): ?>

			if(topScroll>=Math.floor($("#J_nbox_s3").offset().top-30)){

				 $("#J_navbar li").removeClass("cur");

				 $("#J_navbar li a[rel='s3']").parent().addClass("cur");

			}

			<?php endif; ?>

			<?php if ($this->_var['tourline']['tour_desc_4_name'] != ''): ?>

			if(topScroll>=Math.floor($("#J_nbox_s4").offset().top-30)){

				 $("#J_navbar li").removeClass("cur");

				 $("#J_navbar li a[rel='s4']").parent().addClass("cur");

			}

			<?php endif; ?>

			

			<?php if ($this->_var['tourline']['show_sale_list'] == 1): ?>

				if(topScroll>=Math.floor($("#J_nbox_2").offset().top-30)){

					 $("#J_navbar li").removeClass("cur");

					 $("#J_navbar li a[rel='2']").parent().addClass("cur");

				}

			<?php endif; ?>

			if(topScroll>=Math.floor($("#J_nbox_999").offset().top-30)){

				 $("#J_navbar li").removeClass("cur");

				 $("#J_navbar li a[rel='999']").parent().addClass("cur");

			}

			if(topScroll>=Math.floor($("#J_nbox_4").offset().top-30)){

				 $("#J_navbar li").removeClass("cur");

				 $("#J_navbar li a[rel='4']").parent().addClass("cur");

			}

			

			

		}

		else{

			$("#J_navbar").removeClass("fixed");

		}

		

      });  

    }) ;

    

</script>

<?php echo $this->fetch('inc/footer.html'); ?>