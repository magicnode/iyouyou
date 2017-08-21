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

    	<adv adv_id="footer_adv" />

    </div>

  	<!--end 底部广告-->

    <div class="blank"></div>

    <!--底部分类文章-->

    <div class="footer_cate">

        <div class="f_cate_mail">

            <ul>

            	<?php $_from = $this->_var['help_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_cate');$this->_foreach['help_cate_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['help_cate_loop']['total'] > 0):
    foreach ($_from AS $this->_var['help_cate']):
        $this->_foreach['help_cate_loop']['iteration']++;
?>

				<?php if ($this->_foreach['help_cate_loop']['iteration'] <= 6): ?>

                <li class="cate_item">

                    <ul>

                        <li class="cate_title"><h3><?php echo $this->_var['help_cate']['name']; ?></h3></li>

						<?php $_from = $this->_var['help_cate']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'help_item');$this->_foreach['help_item_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['help_item_loop']['total'] > 0):
    foreach ($_from AS $this->_var['help_item']):
        $this->_foreach['help_item_loop']['iteration']++;
?>

						<?php if ($this->_foreach['help_item_loop']['iteration'] <= 4): ?>

                        <li><a href="<?php echo $this->_var['help_item']['url']; ?>" title="<?php echo $this->_var['help_item']['name']; ?>" <?php if ($this->_var['help_item']['blank'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $this->_var['help_item']['name']; ?></a></li>

                        <?php endif; ?>

						<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

                    </ul>

                </li>

				<?php endif; ?>

                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>				

            </ul>

        </div>

    </div>

    <!--end 底部分类文章-->

    

    <div class="blank"></div>

    <div class="blank"></div>

    

	

	<?php if ($this->_var['link_list']): ?>

    <!--友情链接-->

    <span style="margin-left: 118px;font-size: 15px;font-weight: bold;">友情链接</span>

    <div class="footer_link">

        

        <div class="blank"></div>

        <div class="link_item">

        	<?php $_from = $this->_var['link_list']['index_text_link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link_item');if (count($_from)):
    foreach ($_from AS $this->_var['link_item']):
?>

            <a href="<?php echo $this->_var['link_item']['url']; ?>" title="<?php echo $this->_var['link_item']['name']; ?>" target="_blank"><?php echo $this->_var['link_item']['name']; ?></a>

			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	

					

        </div>

        <div class="blank"></div>

		<div class="link_item">

        	<?php $_from = $this->_var['link_list']['index_image_link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'link_item');if (count($_from)):
    foreach ($_from AS $this->_var['link_item']):
?>

            <a href="<?php echo $this->_var['link_item']['url']; ?>" title="<?php echo $this->_var['link_item']['name']; ?>" target="_blank"><img src="<?php echo $this->_var['link_item']['image']; ?>" width="88" height="31" /></a>

			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>	

					

        </div>

        <div class="blank"></div>

    </div>

    <!--end 友情链接-->

	<?php endif; ?>



    

    <div class="blank"></div>

	<?php 
$k = array (
  'name' => 'app_conf',
  'value' => 'FOOT_INFO',
);
echo $k['name']($k['value']);
?>

    <div class="blank"></div>

	<div style="text-align:center;">

	<?php 
$k = array (
  'name' => 'app_conf',
  'value' => 'STAT_CODE',
);
echo $k['name']($k['value']);
?>

	<?php 
$k = array (
  'name' => 'app_conf',
  'value' => 'KEFU_CODE',
);
echo $k['name']($k['value']);
?>   沪ICP备10220032号 <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1257120235'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1257120235%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>

	</div>

	<div class="blank"></div>

</div>



<div id="USER_INFO_TIP">

    <div class="tip_info">

    <img class="avatar" alt="" src="<?php echo $this->_var['TMPL']; ?>/images/loading_60.gif">

    <div>

        <p><a href="#">&nbsp;</a></p>

        <p>获取用户信息...</p>

        <p>&nbsp;</p>

    </div>

    </div>

    <div class="tip_toolbar">&nbsp;</div>

    <div class="tip_arrow" style="margin-left: 2px;"></div>

    <input class="get_user_info_tip_ajaxurl" type="hidden" value="<?php
echo parse_url_tag("u:user#get_user_info_tip|"."".""); 
?>"



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

