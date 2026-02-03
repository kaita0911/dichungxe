<?php /* Smarty version 2.6.30, created on 2026-02-03 13:58:06
         compiled from main/main.tpl */ ?>
<div class="contentmain">
	<div class="main">
		<div class="left_sidebar padding10">
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>
		<div class="right_content ">
			<div class="wrap-tk">
				<div class="wrap-analytic">
					<div class="box-browers">
						<h2 class="box-ttl2">📈 Thống kê trình duyệt truy cập</h2>


						<div class="stats">
							<?php $_from = $this->_tpl_vars['browser_counts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['browser'] => $this->_tpl_vars['count']):
?>
							<div class="card"><strong><?php echo $this->_tpl_vars['browser']; ?>
</strong>
								<span id="online"><?php echo $this->_tpl_vars['count']; ?>
<span>
							</div>
							<?php endforeach; endif; unset($_from); ?>
						</div>

					</div>

					<div class="box-browers">
						<h2>📈 Thống kê truy cập</h2>
						<div class="stats">
							<div class="card"><strong>Đang online</strong>
								<span id="online"><?php echo $this->_tpl_vars['online_visits']; ?>
<span>
							</div>
							<div class="card"><strong>Trong tuần</strong>
								<span id="week"><?php echo $this->_tpl_vars['week_visits']; ?>
<span>
							</div>
							<div class="card"><strong>Trong tháng</strong>
								<span id="month"><?php echo $this->_tpl_vars['month_visits']; ?>
<span>
							</div>
							<div class="card"><strong>Tổng truy cập</strong>
								<span id="total"><?php echo $this->_tpl_vars['total_visits']; ?>
<span>
							</div>
						</div>
					</div>
					<div class="box-browers scroll">
						<h2>Thống kê truy cập theo</h2>

						<div class="tk-item --head">
							<div class="tk-item__ttl">THÀNH PHỐ</div>
							<div class="tk-item__total">Lượng truy cập</div>
						</div>
						<?php $_from = $this->_tpl_vars['region_stats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
						<div class="tk-item">
							<div class="tk-item__ttl"><?php echo $this->_tpl_vars['row']['region']; ?>
</div>
							<div class="tk-item__total"><?php echo $this->_tpl_vars['row']['total']; ?>
 lượt</div>
						</div>
						<?php endforeach; endif; unset($_from); ?>

					</div>
				</div>
				<div class="box-browers width-100">
					<h2>🔗 Top links truy cập (từ cao → thấp)</h2>

					<table class="br1">
						<thead>
							<tr>
								<th align="center" class="width-image">Thứ tự</th>
								<th align="left" class="width-ttl">Link</th>
								<th align="center" class="width-action">Lượt truy cập</th>
							</tr>
						</thead>
						<tbody>
							<?php $_from = $this->_tpl_vars['top_links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['row']):
?>
							<tr>
								<td align="center"><?php echo $this->_tpl_vars['i']+1; ?>
</td>
								<td align="left">
									<div class="url-cell" title="<?php echo $this->_tpl_vars['row']['url']; ?>
"><a href="<?php echo $this->_tpl_vars['row']['url']; ?>
"><?php echo $this->_tpl_vars['row']['url']; ?>
</a></div>
								</td>
								<td align="center"><span class="badge"><?php echo $this->_tpl_vars['row']['total']; ?>
</span></td>
							</tr>
							<?php endforeach; endif; unset($_from); ?>
							<?php if (! $this->_tpl_vars['top_links']): ?>
							<tr>
								<td colspan="3">Không có dữ liệu.</td>
							</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>