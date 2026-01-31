<?php /* Smarty version 2.6.30, created on 2026-01-06 15:23:04
         compiled from cart/finish.tpl */ ?>
<div class="box-order-success">


	<div class="content">
		<h2>Đặt hàng thành công !</h2>
		<p>Cảm ơn Quý Khách, chúng tôi sẽ gọi xác nhận và giao hàng cho quý khách trong thời gian sớm nhất!</p>
		<p><img src="<?php echo $this->_tpl_vars['path_url']; ?>
/assets/images/tk.png" class="img-responsive"></p>
		<p><a class="btn-home" href="<?php echo $this->_tpl_vars['path_url']; ?>
"><i class="fa-solid fa-house-user"></i> Quay về trang chủ</a></p>
	</div>
</div>
<?php echo '

<script language="javascript" type="text/javascript">
	var baseUrl = window.location.origin;
	setTimeout(function() {
		window.location.href = baseUrl;
	}, 10000);
</script>
'; ?>