

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
$this->_var['pagecss'][] = TMPL_REAL."/css/tuan_index.css";
$this->_var['pagejs'][] = TMPL_REAL."/js/tuan_index.js";
?>



<?php echo $this->fetch('inc/header.html'); ?>


<div class="nav_locate">
 
	  <a href="<?php
echo parse_url_tag("u:tuan#advance|"."".""); 
?>" class="lucky_bonus">团购预告</a>
	  <a href="<?php
echo parse_url_tag("u:tuan#history|"."".""); 
?>" class="lucky_bonus">往期团购</a>	  
	  <a href="#">首页</a> &gt <a href="<?php
echo parse_url_tag("u:tuan|"."".""); 
?>">旅游团购（共<em><?php echo $this->_var['total_count']; ?></em>条可卖团品）</a>  
</div>

<?php if ($this->_var['tuan_index'] == 1): ?>
<div class="filter">
	<div class="box classify clear">
		<strong>团购分类</strong>
		<div class="box_content clear">
			<dl>
				<?php $_from = $this->_var['filter_nav_data']['tuan_cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
				<dd <?php if ($this->_var['item']['current'] == 1): ?>class="cur"<?php endif; ?>><a href="<?php echo $this->_var['item']['url']; ?>"><?php echo $this->_var['item']['name']; ?><span>(<?php echo $this->_var['item']['count']; ?>)</span></a></dd>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				
			</dl>		
		</div>		
	</div>   
	
	<!--<div class="box clear">
		<strong>目的地</strong>
		<div class="box_content clear">
			<dl class="city_list">
				<?php $_from = $this->_var['filter_nav_data']['area_list_in']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
				<dd <?php if ($this->_var['item']['current'] == 1): ?>class="cur"<?php endif; ?>><a href="<?php echo $this->_var['item']['url']; ?>"><?php echo $this->_var['item']['name']; ?><span>(<?php echo $this->_var['item']['count']; ?>)</span></a></dd>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				
			</dl>
			<div class="more_choose">更多</div>
		</div>
		
	</div>
	
	<div class="box clear">
		<strong>&nbsp;</strong>
		<div class="box_content clear">
			<dl class="city_list">
				<?php $_from = $this->_var['filter_nav_data']['area_list_out']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
				<dd <?php if ($this->_var['item']['current'] == 1): ?>class="cur"<?php endif; ?>><a href="<?php echo $this->_var['item']['url']; ?>"><?php echo $this->_var['item']['name']; ?><span>(<?php echo $this->_var['item']['count']; ?>)</span></a></dd>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</dl>
			<div class="more_choose">更多</div>
		</div>		
	</div>
	
	<?php if ($this->_var['filter_nav_data']['place']): ?>
	<div class="box clear">
		<strong>目的区域</strong>
		<div class="box_content clear">
			<dl class="city_list">
				<?php $_from = $this->_var['filter_nav_data']['place']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
				<dd <?php if ($this->_var['item']['current'] == 1): ?>class="cur"<?php endif; ?>><a href="<?php echo $this->_var['item']['url']; ?>"><?php echo $this->_var['item']['name']; ?><span>(<?php echo $this->_var['item']['count']; ?>)</span></a></dd>
				<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			</dl>
			<div class="more_choose">更多</div>
		</div>
		
	</div>
	<?php endif; ?>
	
</div>
-->
<div class="select_sort">
	<div class="sort_left">								
				<a href="<?php echo $this->_var['sort']['s1']; ?>" class="down_arrows<?php echo $this->_var['current']['s1']; ?>">折扣</a>
				<a href="<?php echo $this->_var['sort']['s2']; ?>" class="down_arrows<?php echo $this->_var['current']['s2']; ?>">销量</a>
				<a href="<?php echo $this->_var['sort']['s3']; ?>" class="down_arrows<?php echo $this->_var['current']['s3']; ?>">最新</a>
				<a href="<?php if ($this->_var['price_up_on'] == 2): ?><?php echo $this->_var['sort']['s5']; ?><?php else: ?><?php echo $this->_var['sort']['s4']; ?><?php endif; ?>" class="<?php if ($this->_var['price_up_on'] == 1): ?>up_on<?php elseif ($this->_var['price_up_on'] == 2): ?>down_on<?php else: ?>up_down<?php endif; ?>">价格</a>
				<a href="<?php echo $this->_var['sort']['s6']; ?>" class="down_arrows<?php echo $this->_var['current']['s6']; ?>">默认</a>
	</div>
	<div class="sort_page">
		<?php echo $this->_var['right_page']; ?>
	</div>
</div>
<?php endif; ?>

<div class="main">
	<?php if ($this->_var['is_empty'] == 1): ?>
	该分类暂无数据
	<?php elseif ($this->_var['is_empty'] == 2): ?>
	搜索不到匹配产品
	<?php else: ?>
	<ul>
		<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>		
		<li>
			<div class="items">
				<div class="item_title">
					<div class="item_type">
						<a class="<?php echo $this->_var['item']['type']; ?>" href="<?php echo $this->_var['item']['url']; ?>" target="_blank"></a>
				    </div>
					<div class="item_name">
						<a href="<?php echo $this->_var['item']['url']; ?>" target="_blank"><?php echo $this->_var['item']['name']; ?></a>
				    </div>
					<div class="item_time">
						
				    </div>
				</div>
				<div class="item_pic">
					<a href="<?php echo $this->_var['item']['url']; ?>" target="_blank"><img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['item']['image'],
  'w' => '307',
  'h' => '206',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" />	</a>
				</div>
				<div class="item_profile">
					<a href="<?php echo $this->_var['item']['url']; ?>" target="_blank"><?php echo $this->_var['item']['brief']; ?></a>
				</div>
				<div class="item_price">
					<div class="item_price_num">
						<span class="price_num1">￥</span><span class="price_num2"><?php echo $this->_var['item']['sale_price']; ?></span>
						<del class="price_num3">￥<?php echo $this->_var['item']['origin_price']; ?></del>
				    </div>
					<div class="item_order">
						<a href="<?php echo $this->_var['item']['url']; ?>" target="_blank">点击查看</a>						
				    </div>					
				</div>
				
				<div class="item_bottom">
					<div class="order_memb">
					<img src="<?php echo $this->_var['TMPL']; ?>/images/tuan/order_member.png">
						<a>已有<span><?php echo $this->_var['item']['sale_total']; ?></span>人购买</a>
						
				    </div>
					<div class="item_dates">
						<img src="<?php echo $this->_var['TMPL']; ?>/images/tuan/item_dates.png">
						<a><?php echo $this->_var['item']['remain_time']; ?></a>						
				    </div>
						
				</div>
			</div>
		</li>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		
	</ul>
	<?php endif; ?>
</div>
<div class="page">		  
		 <?php echo $this->_var['page']; ?>
</div>
<?php echo $this->fetch('inc/footer.html'); ?> 