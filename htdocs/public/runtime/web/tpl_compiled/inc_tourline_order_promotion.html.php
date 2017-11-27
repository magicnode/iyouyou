<div id="promotion_part" class="order_box ">
	<div class="blank15"></div>
    <h2>优惠方案</h2>
	<div class="routes_info">
		<table cellspacing="0" cellpadding="0" class="table_box" id="bx_table">
            <tbody>
                <tr>
                    <th align="left">优惠活动</th>
                    <th width="15%" align="center">可用金额 </th>
                </tr>
                <tr id="travCouponArea" class="citem">
                   <td class="first">
                       <!-- <input type="checkbox" id="travCouponAreaBox"  autocomplete="off"> -->
                       <a id="lvyouquan" href="javascript:void(0)" >
                       		代金券
							<span>▼</span>
					   </a>
                   </td>
                   <td align="center" id="haveTravelValue" value="0">¥<?php echo $this->_var['voucher_useable_money']; ?></td>
               </tr>
			   <?php $_from = $this->_var['voucher_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'voucher');if (count($_from)):
    foreach ($_from AS $this->_var['voucher']):
?>
			   <tr class="citem hide J_travCouponList">
                   <td class="first">
                   		<input type="radio" name="voucher[]" value="<?php echo $this->_var['voucher']['id']; ?>"  autocomplete="off" />
                      <?php echo $this->_var['voucher']['voucher_name']; ?>
                   </td>
                   <td align="center" id="haveTravelValue" value="<?php 
$k = array (
  'name' => 'format_price_to_display',
  'v' => $this->_var['voucher']['money'],
);
echo $k['name']($k['v']);
?>">
                   	¥<?php 
$k = array (
  'name' => 'format_price_to_display',
  'v' => $this->_var['voucher']['money'],
);
echo $k['name']($k['v']);
?>
                   </td>
               </tr>
			   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
               <tr>
               		<td colspan="2">
               			<span class="err_structure hide" id="travCouponError">
                        	<span class="error_notice">
                           	 	<i></i>
                        	</span>
                     	</span>
                    </td>
               </tr>
               <tr id="lvYouQuanTip" class="take_bx hide">
                   <td colspan="2">
                       <p> 代金劵等同于现金使用，直接抵扣订单金额</p>
                   </td>
               </tr>
            </tbody>
       </table>
	</div>
</div>
<div class="blank15"></div>