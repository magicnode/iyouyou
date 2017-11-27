<div id="insurance_part" class="order_box ">
	<div class="blank15"></div>
    <h2>保险方案</h2>
	<div class="routes_info"> 
		<table cellspacing="0" cellpadding="0" class="table_box" id="insurance_table">
            <tbody>
                <tr>
                    <th width="30%" align="left">保险名称</th>
                    <th width="50%" align="center">说明 </th>
					<th width="20%" align="center">
						价格 
						<input type="hidden" id="insurance_total" value="">
					</th>
                </tr>
				<?php $_from = $this->_var['insurance_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'insurance');if (count($_from)):
    foreach ($_from AS $this->_var['insurance']):
?>
                 <tr class="J_travInsuranceList citem">
                   <td class="first">
                       <input type="checkbox" value="<?php echo $this->_var['insurance']['id']; ?>" name="insurance_ids[]" autocomplete="off">
                       	<?php echo $this->_var['insurance']['name']; ?>
                   </td>
                   <td align="center" ><?php echo $this->_var['insurance']['name']; ?></td>
				   <td align="center" ><?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['insurance']['price'],
);
echo $k['name']($k['v']);
?></td>
                 </tr>
			    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
			 
            </tbody>
       </table>
	</div>
</div>
<div class="blank15"></div>