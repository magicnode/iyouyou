<?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'v_guide_row');if (count($_from)):
    foreach ($_from AS $this->_var['v_guide_row']):
?>
<div class="item">
    <div class="notes_title">
        <?php if ($this->_var['v_guide_row']['image']): ?>
        <a <?php echo $this->_var['v_guide_row']['id']; ?> href="<?php
echo parse_url_tag("u:guide#show|"."id=".$this->_var['v_guide_row']['id']."".""); 
?>" class="title_pic"><img  src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['v_guide_row']['image'],
  'w' => '166',
);
echo $k['name']($k['v'],$k['w']);
?>" />	</a>
        <?php endif; ?>
        <a href="<?php
echo parse_url_tag("u:guide#show|"."id=".$this->_var['v_guide_row']['id']."".""); 
?>" class="title_content"><?php echo $this->_var['v_guide_row']['title']; ?></a>
    </div>
    <div class="notes_count">
        <!--点赞功能占未开放
        <span class="praise"><?php echo $this->_var['v_guide_row']['recommend_count']; ?></span>
        -->
        <span class="reply_count"><?php echo $this->_var['v_guide_row']['comment_count']; ?></span>
        <span class="view_count"><?php echo $this->_var['v_guide_row']['browse_count']; ?></span>
    </div>
    <div class="notes_info">
        <a href="<?php
echo parse_url_tag("u:user#home|"."uid=".$this->_var['v_guide_row']['user_id']."".""); 
?>"><img class="GUID" uid="<?php echo $this->_var['v_guide_row']['user_id']; ?>" src="<?php echo $this->_var['v_guide_row']['avatar']; ?>"></a>
        <span><a href="<?php
echo parse_url_tag("u:user#home|"."uid=".$this->_var['v_guide_row']['user_id']."".""); 
?>"><?php echo $this->_var['v_guide_row']['nickname']; ?></a></span>
        <div><a href="<?php
echo parse_url_tag("u:guide#show|"."id=".$this->_var['v_guide_row']['id']."".""); 
?>" class="notes_info_content"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['v_guide_row']['content'],
  'b' => '0',
  'e' => '35',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></a></div>
    </div>
</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>