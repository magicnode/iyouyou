<?php if ($this->_var['supplier']): ?>

<div class="side_supplier">

	<div class="box">

		<div class="hd">供应商</div>

		<div class="dt"><?php echo $this->_var['supplier']['company_name']; ?></div>

		<div class="dd">
              <div class="item clearfix">

				<span class="t" style="width: 36px;">电话：</span>

				<?php echo $this->_var['supplier']['contact_mobile']; ?>

			</div>

			<div class="item clearfix">

				<span class="t" style="width: 36px;">传真：</span>

				<?php echo $this->_var['supplier']['contact_fax']; ?>

			</div>
			<div class="item clearfix">

				<span class="t" style="width: 80px;">旅行社地址：</span>

				<?php echo $this->_var['supplier']['company_address']; ?>

			</div>

			<div class="item clearfix">

				<div class="t"><!-- 在线客服： --></div>

				<div class="bx">
				<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $this->_var['supplier']['contact_qq']; ?>&amp;site=qq&amp;menu=yes"><img src="/qq.png"></a>
</div>

			</div>

		</div>

	</div>

</div>

<div class="blank15"></div>

<?php endif; ?>