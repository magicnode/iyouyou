<div class="order_box order_box_message clearfix">
    <h2>游客信息</h2>
    <div class="routes_info ">
    	<?php $_from = $this->_var['youke_all_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'y_item');if (count($_from)):
    foreach ($_from AS $this->_var['y_item']):
?>
		<div>
        <table class="input_table" id="inputTable_<?php echo $this->_var['y_item']['num']; ?>">
            <tbody>
            	 <tr>
                    <td width="125" align="left">
                       	<strong class="youke_num">第<?php echo $this->_var['y_item']['num']; ?>位游客</strong>
                    </td>
                    <td>
                       
                    </td>
                </tr>
                <tr>
                    <td width="125" align="right">
                        <label>姓名</label>
                        <span class="cred">*</span>
						&nbsp;
                    </td>
                    <td>
                        <input type="text" value="<?php echo $this->_var['y_item']['name']; ?>" name="name[]" id="name_<?php echo $this->_var['y_item']['num']; ?>" holder="请填写姓名"  onfocus="mive_notice(this);" class="txt_input" >
                        <span class="err_structure hide" id="name<?php echo $this->_var['y_item']['num']; ?>Error">
                        <span class="error_notice ">
                            <i></i>
                        </span>
                        </span>
						<?php if ($this->_var['namelist_count'] > 0): ?>
						<select name="s_namelist" style="margin-left:5px;">
							<option value="0">修改游客信息</option>
							<?php $_from = $this->_var['user_namelist_idlist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'idlist');if (count($_from)):
    foreach ($_from AS $this->_var['idlist']):
?>
	                   		<option value="<?php echo $this->_var['idlist']['id']; ?>"><?php echo $this->_var['idlist']['name']; ?></option>
							<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
						</select>
						<?php endif; ?>
                    </td>
                </tr>
                 <tr>
                    <td width="125" align="right">
                        <label>证件类型</label>
                        <span class="cred">*</span>
						&nbsp;
                    </td>
                    <td>
                       <select name="paper_type[]" id="paper_type_<?php echo $this->_var['y_item']['num']; ?>">
                           <option value="1" <?php if ($this->_var['y_item']['paper_type'] == 1): ?>selected="selected"<?php endif; ?> >身份证</option>
                           <option value="2" <?php if ($this->_var['y_item']['paper_type'] == 2): ?>selected="selected"<?php endif; ?> >护照</option>
                           <option value="4" <?php if ($this->_var['y_item']['paper_type'] == 3): ?>selected="selected"<?php endif; ?> >港澳通行证</option>
                           <option value="5" <?php if ($this->_var['y_item']['paper_type'] == 4): ?>selected="selected"<?php endif; ?> >台胞证</option>
                           <option value="3" <?php if ($this->_var['y_item']['paper_type'] == 5): ?>selected="selected"<?php endif; ?> >军官证</option>
                           <option value="6" <?php if ($this->_var['y_item']['paper_type'] == 6): ?>selected="selected"<?php endif; ?> >其他</option>
                       </select>
                        <span class="err_structure hide" id="paperType<?php echo $this->_var['y_item']['num']; ?>Error">
                            <span class="error_notice ">
                                <i></i>
                            </span>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td width="125" align="right">
                        <label style="padding-right:2px;">证件号</label>
						<span class="cred">*</span>
						&nbsp;
                    </td>
                    <td>
                        <input type="text" value="<?php echo $this->_var['y_item']['paper_sn']; ?>" name="paper_sn[]" id="paper_sn_<?php echo $this->_var['y_item']['num']; ?>" holder="请填写证件号码" onfocus="mive_notice(this);" class="txt_input">
                        <span class="err_structure hide" id="paperSn<?php echo $this->_var['y_item']['num']; ?>Error">
                            <span class="error_notice" id="">
                                <i></i>
                            </span>
                        </span>
                    </td>
                </tr>
				 <tr>
                    <td width="125" align="right">
                        <label style="padding-right:2px;">手机号</label>
						<span class="cred">*</span>
						&nbsp;
                    </td>
                    <td>
                        <input type="text" value="<?php echo $this->_var['y_item']['mobile']; ?>" name="mobile[]" id="mobile_<?php echo $this->_var['y_item']['num']; ?>" holder="请填写手机号码" onfocus="mive_notice(this);" class="txt_input" >
                        <span class="err_structure hide" id="mobile<?php echo $this->_var['y_item']['num']; ?>Error">
                            <span class="error_notice" id="">
                                <i></i>
                            </span>
                        </span>
                    </td>
                </tr>
             </tbody>
        </table>
		<hr class="hr_dotted" />
		</div>
		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
</div>