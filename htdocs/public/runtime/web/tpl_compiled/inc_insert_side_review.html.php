<?php if ($this->_var['list']): ?>
<div class="comment">
        <h5>旅游用户最新点评</h5>
        <?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');$this->_foreach['row'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['row']['total'] > 0):
    foreach ($_from AS $this->_var['row']):
        $this->_foreach['row']['iteration']++;
?>
            <div <?php if (($this->_foreach['row']['iteration'] == $this->_foreach['row']['total'])): ?>style="border:none;padding-bottom:0px;"<?php endif; ?>>
                    <span class="comment_article"><a href="<?php echo $this->_var['row']['url']; ?>" target="_blank"><?php echo $this->_var['row']['review_rel_name']; ?></a></span>
                    <span class="comment_content"><a href="<?php echo $this->_var['row']['url']; ?>" target="_blank"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['row']['review_content'],
  'b' => '0',
  'e' => '25',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></a></span>
                    <span class="comment_info"><?php echo $this->_var['row']['nickname']; ?> <?php echo $this->_var['row']['create_time']; ?>点评</span>
            </div>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
</div>
<?php endif; ?>