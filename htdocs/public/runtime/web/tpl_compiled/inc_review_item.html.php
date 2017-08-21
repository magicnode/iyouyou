<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
<li class="comment_li">
    <dl class="clearfix">
        <dt>
        <?php echo $this->_var['row']['avatar']; ?>
        <p class="trav_name"><?php echo $this->_var['row']['nickname']; ?></p>
        </dt>
        <dd>
            <div class="clists_main_cont" >
                <p class="clists_stars clearfix">
                        <span class="point_start_bar" title="<?php if ($this->_var['row']['point'] == 1): ?>不满意<?php elseif ($this->_var['row']['point'] > 1 && $this->_var['row']['point'] < 4): ?>一般<?php elseif ($this->_var['row']['point'] > 3): ?>满意<?php endif; ?>">
					<i style="width:<?php echo $this->_var['row']['point_satify']; ?>%;"></i>
			</span>
                </p>
                <?php if ($this->_var['row']['group_point']): ?>
                <p class="clists_words clearfix">
                    <?php $_from = $this->_var['row']['group_point']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'point_item');if (count($_from)):
    foreach ($_from AS $this->_var['point_item']):
?>
                        <span><?php echo $this->_var['point_item']['name']; ?><em><?php if ($this->_var['point_item']['point'] == 1): ?>不满意<?php elseif ($this->_var['point_item']['point'] > 1 && $this->_var['point_item']['point'] < 4): ?>一般<?php elseif ($this->_var['point_item']['point'] > 3): ?>满意<?php endif; ?></em></span>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </p>
                <?php endif; ?>
                <p class="comment_detail"><?php echo $this->_var['row']['review_content']; ?></p>

                <div class="pic_lists clearfix">
                    <div class="sp_content">
                        <ul class="slidy_pic clearfix">
                            <?php if ($this->_var['row']['imgs']): ?>
                                <?php $_from = $this->_var['row']['imgs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'img_item');if (count($_from)):
    foreach ($_from AS $this->_var['img_item']):
?>
                                <li class="cur">
                                    <a class="show_big_btn" href="javascript:void(0)" onclick="$.showBig(this)" is_big="0" big_data="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['img_item'],
  'w' => '400',
);
echo $k['name']($k['v'],$k['w']);
?>" title="放大">
                                       <img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['img_item'],
  'w' => '60',
  'h' => '60',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>"  alt=""></a>     
                                </li>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class='blank10'></div>
                    <div class='pic_big'>
                        <img src=''/>
                    </div>
                </div>

            </div>
            
                <div class="comment_prec myorder_prec_box">
                    <div class="comment_prec_box">
                        <p class="cp_tt">点评赠送</p>
                        <!--现金-->
                        <?php if ($this->_var['row']['money'] > 0): ?>
                            <p class=""><span>现&nbsp;&nbsp;&nbsp;金</span> ¥<?php echo $this->_var['row']['money']; ?></p>
                        <?php endif; ?>
                        <!--积分-->
                        <?php if ($this->_var['row']['score'] > 0): ?>
                            <p class=""><span>积&nbsp;&nbsp;&nbsp;分</span> <?php echo $this->_var['row']['score']; ?></p>
                        <?php endif; ?>
                        <!--代金券-->
                        <?php if ($this->_var['row']['voucher_count'] > 0): ?>
                            <p class=""><span>代金券</span> ¥<?php echo $this->_var['row']['voucher_count']; ?></p>
                        <?php endif; ?>
                        <p class="btom_sawtooth"></p>
                    </div>
                </div>
            
            <dl class="clearfix comment_from">
                <dt>
                <a href="javascript:void(0)" ><?php echo $this->_var['row']['review_time']; ?></a>
                </dt>

            </dl>
        </dd>
    </dl>
    
    <?php if ($this->_var['row']['review_reply']): ?>
    <div class='blank10'></div>
    <div class="admin_reply">
        <label>管理员回复：</label><span><?php echo $this->_var['row']['review_reply']; ?></span>
    </div>
    <div class='blank10'></div>
    <?php endif; ?>
</li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>