<?php /* Smarty version 2.6.30, created on 2026-01-06 14:28:24
         compiled from contact/view.tpl */ ?>
<div class="main">
   <div class="container">
      <div class="breadcumb"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'breadcumb.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
      <div class="p-contact">
         <div class="form-meta">
            <div class="title-page">
               <h1 class="ttl01"><?php echo $this->_tpl_vars['c_ttl']; ?>
</h1>
            </div>
            <div class="contact-form">
               <form id="formcontact" action="" method="post">
                  <input type="text" name="name" id="name" placeholder="Họ tên" required />
                  <input type="tel" name="phone" id="phone" placeholder="Điện thoại" required />
                  <input type="text" name="email" id="email" placeholder="Email" required />
                  <input type="text" name="address" id="address" placeholder="Địa chỉ" />
                  <textarea name="message" id="message" placeholder="Nội dung"></textarea>
                  <button type="submit" class="btn-contact"><i class="fa-solid fa-paper-plane"></i> Gửi</button>
               </form>
               <div id="txtmsg" style="color:red; margin-bottom:10px;"></div>
            </div>
         </div>
         <div class="map">
            <?php echo $this->_tpl_vars['footer']['map']; ?>

         </div>
      </div>
   </div>
</div>
<?php if ($_SESSION['contact_success']): ?>
<div id="popupMessage" class="popup-message <?php if ($_SESSION['contact_success']): ?> show<?php endif; ?>">
   <div class="popup-content">
      <span id="popupText">Cảm ơn Quý khách đã liên hệ! Chúng tôi sẽ liên lạc trong thời gian sớm nhất</span>
      <button id="popupClose">X</button>
   </div>
</div>
<?php endif; ?>
<?php echo '
<script>
   // Chỉ cho phép nhập số và dấu + đầu
   document.getElementById(\'phone\').addEventListener(\'input\', function(e) {
      let value = this.value;
      // Nếu bắt đầu có dấu + thì giữ lại, còn lại chỉ số
      if (value.startsWith(\'+\')) {
         this.value = \'+\' + value.slice(1).replace(/\\D/g, \'\');
      } else {
         this.value = value.replace(/\\D/g, \'\');
      }
   });
   document.getElementById(\'formcontact\').addEventListener(\'submit\', function(e) {
      var name = document.getElementById(\'name\').value.trim();
      var phone = document.getElementById(\'phone\').value.trim();
      var email = document.getElementById(\'email\').value.trim();
      var address = document.getElementById(\'address\').value.trim();
      var message = document.getElementById(\'message\').value.trim();
      var txtmsg = document.getElementById(\'txtmsg\');
      txtmsg.innerHTML = \'\';

      // Regex
      var emailRegex = /^[^\\s@]+@[^\\s@]+\\.[^\\s@]+$/;
      var vnPhoneRegex = /^0\\d{9,10}$/; // số VN bắt đầu 0, 10 hoặc 11 chữ số

      // Validate
      if (name === \'\') {
         txtmsg.innerHTML = \'Vui lòng nhập họ tên.\';
         e.preventDefault();
         return;
      }
      if (!vnPhoneRegex.test(phone)) {
         txtmsg.innerHTML = \'Số điện thoại không hợp lệ (bắt đầu 0, 10 hoặc 11 chữ số).\';
         e.preventDefault();
         return;
      }
      if (!emailRegex.test(email)) {
         txtmsg.innerHTML = \'Email không hợp lệ.\';
         e.preventDefault();
         return;
      }


      // Nếu hợp lệ, form sẽ submit bình thường
   });
</script>
<script>
   document.addEventListener(\'DOMContentLoaded\', function() {
      const popup = document.getElementById(\'popupMessage\');
      const closeBtn = document.getElementById(\'popupClose\');

      function closePopup() {
         popup.classList.remove(\'show\');
         window.location.href = \'/\';
      }

      if (closeBtn) closeBtn.addEventListener(\'click\', closePopup);
      if (popup) {
         popup.addEventListener(\'click\', function(e) {
            if (e.target === popup) closePopup();
         });
      }
   });
</script>

'; ?>