<?php
	$this->_var['pagecss'][] = TMPL_REAL."/css/style.css";
	$this->_var['pagecss'][] = TMPL_REAL."/css/weebox.css";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.bgiframe.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.weebox.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/jquery.pngfix.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/lazyload.js";
	$this->_var['pagejs'][] = TMPL_REAL."/js/script.js";
	$this->_var['cpagejs'][] = TMPL_REAL."/js/script.js";
	
	$this->_var['pagejs'][] = TMPL_REAL."/js/tourline_tourlist.js";
    $this->_var['pagecss'][] = TMPL_REAL."/css/tourline_tourlist.css";
?>
<?php echo $this->fetch('inc/header.html'); ?>
<?php echo $this->fetch('inc/ur_here.html'); ?>
<script type="text/javascript">
	var multi_day_url='<?php echo $this->_var['multi_day_url']; ?>';
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
<div class="wrap">
			<div class="f_l left_side">
				<!--左测筛选列表-->
				<div class="place_choose">
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
				</div>
				<!--左测筛选列表end-->
				
				<!--左测点评-->
				<?php 
$k = array (
  'name' => 'side_review',
  'p' => '3',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?>
				<!--左测点评end-->
				<!--销量排行榜-->
				<?php echo $this->fetch('inc/tourline/topsale.html'); ?>
				
					
			</div>	
			<div class="recommend">
				<?php $_from = $this->_var['recommend_tourline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'rtour_item');if (count($_from)):
    foreach ($_from AS $this->_var['rtour_item']):
?>
				<dl class="recommend_pic">
						<dt><a href="<?php echo $this->_var['rtour_item']['url']; ?>"><img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['rtour_item']['image'],
  'w' => '',
  'h' => '',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>"></a></dt>
						<dd><a href="<?php echo $this->_var['rtour_item']['url']; ?>" target="_blank"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['rtour_item']['name'],
  'a' => '0',
  'b' => '12',
);
echo $k['name']($k['v'],$k['a'],$k['b']);
?></a></dd>
						<dd class="recommend_price">￥<em><?php echo $this->_var['rtour_item']['price']; ?></em> 起</dd>	
				</dl>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<div class="satisfaction">
					<span class="satisfaction1">综合满意度：</span>
					<span class="satisfaction2"><?php if ($this->_var['situation']['satify_avg']): ?> <?php echo $this->_var['situation']['satify_avg']; ?> <?php else: ?>0<?php endif; ?>%</span>
					<span class="satisfaction3">已服务出游：<em><?php if ($this->_var['situation']['sale_sum']): ?> <?php echo $this->_var['situation']['sale_sum']; ?> <?php else: ?> 0<?php endif; ?></em>人次</span>
					<!-- <span class="satisfaction4">已有点评数：<em><?php if ($this->_var['situation']['review_total_sum']): ?> <?php echo $this->_var['situation']['review_total_sum']; ?> <?php else: ?>0<?php endif; ?></em>条</span>	 -->
				</div>
			</div>
			
			<div class="travel_choose">
				<h3><?php echo $this->_var['current_name']; ?></h3>
				<div class="travel_choose_box">
					<!-- <div class="travel_choose_classify ">
						<p>产品类型：</p>
						<div class="main_div">
							<?php $_from = $this->_var['tourline_type']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ty_item');if (count($_from)):
    foreach ($_from AS $this->_var['ty_item']):
?>
							<a href="<?php echo $this->_var['ty_item']['url']; ?>" <?php if ($this->_var['ty_item']['t_type'] == $this->_var['param'] [ 't_type' ]): ?>class="cur"<?php endif; ?>><?php echo $this->_var['ty_item']['name']; ?></a>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</div>
					</div>
                    -->
					<div class="travel_choose_classify day_choose">
						<p>行程天数：</p>
						<div class="main_div" >
							<div class="radio_d day_rad clearfix">
								<a href="<?php echo $this->_var['all_day_url']; ?>" <?php if ($this->_var['param']['t_day'] == 0): ?> class="cur" <?php endif; ?>>全部</a>
								<?php $_from = $this->_var['tourline_day']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'day_item');$this->_foreach['day_item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['day_item']['total'] > 0):
    foreach ($_from AS $this->_var['day_item']):
        $this->_foreach['day_item']['iteration']++;
?>
								<a href="<?php echo $this->_var['day_item']['url']; ?>" <?php if ($this->_var['day_item']['act'] == 1): ?>class="cur"<?php endif; ?>><?php echo $this->_var['day_item']['name']; ?><?php if (($this->_foreach['day_item']['iteration'] == $this->_foreach['day_item']['total'])): ?>以上<?php else: ?>天<?php endif; ?></a>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</div>
							<div class="multi_d day_mul clearfix">
								<div class="multi_main clearfix">
									<?php $_from = $this->_var['tourline_day']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'day_item');$this->_foreach['day_item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['day_item']['total'] > 0):
    foreach ($_from AS $this->_var['day_item']):
        $this->_foreach['day_item']['iteration']++;
?>
										<input class="day_input" type="checkbox" value="<?php echo $this->_var['day_item']['name']; ?>" <?php if ($this->_var['day_item']['act'] == 1): ?>checked=checked<?php endif; ?> >
										<label class=""><?php echo $this->_var['day_item']['name']; ?><?php if (($this->_foreach['day_item']['iteration'] == $this->_foreach['day_item']['total'])): ?>以上<?php else: ?>天<?php endif; ?></label>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								</div>
								<div class="multi_bottom clearfix">
									<form action="<?php echo $this->_var['multi_day_url']; ?>" method="get" name="multi_day" id="multi_day_form" class="getform">
									<input type="hidden" name="t_day" value="" />
									<button id="day_do" class="multi_do" type="submit">确定</button>
									<a href="javascript:void(0);" class="multi_close day_close">取消</a>
									</form>
								</div>
							</div>		
						</div>
						<a href="javascript:void(0);" class="more_choose day_mone">+多选</a>
					</div>
					<?php if ($this->_var['tourline_jdian']): ?>
					<div class="travel_choose_classify noborder jd_choose">
						<p>包含景点：</p>
						<div class="main_div">
							<div class="radio_d jd_rad clearfix">
								<a href="<?php echo $this->_var['jd_quanbu_url']; ?>">全部</a>
								<?php $_from = $this->_var['tourline_jdian']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'jd_item');$this->_foreach['jd_item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['jd_item']['total'] > 0):
    foreach ($_from AS $this->_var['jd_item']):
        $this->_foreach['jd_item']['iteration']++;
?>
								<a href="<?php echo $this->_var['jd_item']['url']; ?>" <?php if ($this->_var['jd_item']['act'] == 1): ?>class="cur"<?php endif; ?> ><?php echo $this->_var['jd_item']['name']; ?></a>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
							</div>
							<div class="multi_d jd_mul">
								<div class="multi_main clearfix" >
									<?php $_from = $this->_var['tourline_jdian']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'jd_item');$this->_foreach['jd_item'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['jd_item']['total'] > 0):
    foreach ($_from AS $this->_var['jd_item']):
        $this->_foreach['jd_item']['iteration']++;
?>
										<input class="multi_input" type="checkbox" value="<?php echo $this->_var['jd_item']['py']; ?>" <?php if ($this->_var['jd_item']['act'] == 1): ?>checked=checked<?php endif; ?> >
										<label class=""><?php echo $this->_var['jd_item']['name']; ?></label>
									<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
								</div>
								<div class="multi_bottom clearfix">
									<form action="<?php echo $this->_var['multi_jd_url']; ?>" method="get" name="multi_jd" id="multi_jd_form" class="getform">
									<input type="hidden" name="p_py" value="" />
									<button id="jd_do" class="multi_do" type="submit">确定</button>
									<a href="javascript:void(0);" class="multi_close jd_close">取消</a>
									</form>
								</div>
							</div>
							
								
						</div>
						<a href="#" class="more_choose jd_mone">+多选</a>
					</div>
					<?php endif; ?>
					<!--
					<div class="travel_choose_classify">
						<p>产品特色：</p>
						<div>
							<a href="#">全部</a>
							<a href="#">深圳</a>
							<a href="#">厦门</a>
							
							<a href="#">深圳</a>
							<a href="#">厦门</a>
							<a href="#">长沙</a>			
						</div>
						<a href="#" class="more_choose">+多选</a>
					</div> -->
					
					
					
					<div class="ftbox">
						<div class="sort">
							<a href="<?php echo $this->_var['status_url']['0']; ?>" <?php if ($this->_var['status'] == 0): ?>class="current"<?php endif; ?>>默认排序</a>
							<a href="<?php echo $this->_var['status_url']['1']; ?>" class="<?php if ($this->_var['status'] == 1): ?>current<?php endif; ?> ord ord_<?php echo $this->_var['status_1']; ?>">销量</a>
							<a href="<?php echo $this->_var['status_url']['2']; ?>" class="<?php if ($this->_var['status'] == 2): ?>current<?php endif; ?> ord ord_<?php echo $this->_var['status_2']; ?>">价格</a>
							<a href="<?php echo $this->_var['status_url']['3']; ?>" class="<?php if ($this->_var['status'] == 3): ?>current<?php endif; ?> ord ord_<?php echo $this->_var['status_3']; ?>">好评</a>
						</div>
						<div class="price " id="J_price">
							<form action="<?php echo $this->_var['price_range_url']; ?>" name="price_from" method="get" id="J_price_form" class="getform">
							<span>价格区间</span>
							<input type="text" name="min_price" value="<?php echo $this->_var['min_price']; ?>" />
							<span style="color:#D3D3D3">-</span>
							<input type="text" name="max_price" value="<?php echo $this->_var['max_price']; ?>" />
							<div class="opbox">
								<a href="javascript:void(0);" id="ClearPrice">清空价格</a>
								<button id="confirm_btn" type="submit">确定</button>
							</div>
							</form>
						</div>
						<div class="good_t f_l" >
							<input class="select_input" type="checkbox"  name="is_hot" <?php if ($this->_var['param']['is_hot'] == 1): ?>checked=checked<?php endif; ?> onchange="location.href='<?php echo $this->_var['hot_url']; ?>'" >
							<label class="select_label">推荐</label>
							<input class="select_input" type="checkbox" name="is_recommend" <?php if ($this->_var['param']['is_recommend'] == 1): ?>checked=checked<?php endif; ?> onchange="location.href='<?php echo $this->_var['recommend_url']; ?>'" >
							<label class="select_label">热卖</label>
						</div>
					</div>
				</div>
				
			</div>
			
			
			
			<div class="travel_list">
				<?php $_from = $this->_var['tourline_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tour_item');if (count($_from)):
    foreach ($_from AS $this->_var['tour_item']):
?>
				<div class="travel_list_info">
					<a href="<?php echo $this->_var['tour_item']['url']; ?>"><img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['tour_item']['image'],
  'w' => '',
  'h' => '',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>"></a>
					<div class="travel_content">
						<span><a href="<?php echo $this->_var['tour_item']['url']; ?>"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['tour_item']['name'],
  'a' => '0',
  'b' => '30',
);
echo $k['name']($k['v'],$k['a'],$k['b']);
?></a></span>
						<ul>
							<li><span>行程编号：<em><?php echo $this->_var['tour_item']['id']; ?></em></span><span>出发城市：<em><?php echo $this->_var['tour_item']['start_city_name']; ?></em></span></li>
							<!--<li><span>行程编号：<em><?php echo $this->_var['tour_item']['id']; ?></em></span>  <span class="travel_content_satisfy">满意度：<em><?php echo $this->_var['tour_item']['format_satify']; ?>%</em></span> --></li>
							<li class="travel_content_detail"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['tour_item']['brief'],
  'a' => '0',
  'b' => '30',
);
echo $k['name']($k['v'],$k['a'],$k['b']);
?></li>
						</ul>
					</div>
					<div class="return_money">
						<span class="return_money_up"><em><?php echo $this->_var['tour_item']['price']; ?></em>元起</span>
						<?php if ($this->_var['tour_item']['is_review_return'] == 1 && $this->_var['tour_item']['review_return_money'] > 0): ?>
							<span class="dpj">
								<span class="dpj_title">点评奖金</span>
								<span class="dpj_val"><?php echo $this->_var['tour_item']['review_return_money']; ?>元</span>
							</span>
						<?php endif; ?>
						<?php if ($this->_var['tour_item']['is_tuan'] == 1): ?>
							<div class="tuan_box" style="">
								<?php if ($this->_var['tour_item']['tuan_is_pre'] == 1): ?>
									<span class="tuan_con">团预告</span>
								<?php else: ?>
									<span class="tuan_con">团</span>
								<?php endif; ?>
							</div>
                    	<?php endif; ?>
					</div>
				</div>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<div class="page">		  
				 <?php echo $this->_var['pages']; ?>
				</div>
				
			</div>
			
			
			<!--
			<div class="scenic">
				<h3>香港景点大全</h3> 
				<a href="#" class="scenic_num">查看所有香港278个景点</a>
				
				<a href="#"><img src="./images/scenic1.jpg" width="120" height="120"></a>
				<a href="#"><img src="./images/scenic2.jpg" width="120" height="120"></a>
				<a href="#"><img src="./images/scenic4.jpg" width="120" height="120"></a>
				<a href="#"><img src="./images/scenic5.jpg" width="120" height="120" ></a>
				<a href="#"><img src="./images/scenic3.jpg" width="120" height="120"></a>
				
			</div>
			<div class="trave_notes">
				<h3>香港游记</h3>
				<ul>
					<li class=""><span class="f_l mark">1</span><a href="#">毕业旅行说走就走，嗨香港偶们来了</a><em><strong>300</strong>点击</em></li>
					<li class="trave_notes2"><a href="#">美丽的香港、澳门3日游</a><em><strong>300</strong>点击</em></li>
					<li class="trave_notes3"><a href="#">美丽的香港、澳门3日游</a><em><strong>300</strong>点击</em></li>
					<li class="trave_notes4"><a href="#">魅力香港，南丫岛</a><em><strong>300</strong>点击</em></li>
					<li class="trave_notes5"><a href="#">毕业旅行说走就走，嗨香港偶们来了</a><em><strong>300</strong>点击</em></li>
					<li class="trave_notes6"><a href="#">美丽的香港、澳门3日游</a><em><strong>300</strong>点击</em></li>
					<li class="trave_notes7"><a href="#">四月上海飞香港，购物为主，顺带游玩</a><em><strong>300</strong>点击</em></li>
					<li class="trave_notes8"><a href="#">魅力香港，南丫岛</a><em><strong>300</strong>点击</em></li>
					<li class="trave_notes9"><a href="#">毕业季的旅行</a><em><strong>300</strong>点击</em></li>
					<li class="trave_notes10"><a href="#">四月上海飞香港，购物为主，顺带游玩</a><em><strong>300</strong>点击</em></li>
				</ul>
			</div>-->
</div>
<div class="blank20"></div>
<?php echo $this->fetch('inc/footer.html'); ?>