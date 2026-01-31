{if $formdangky.open eq 1}
<div class="register-form">
   <div class="register-form-wrap">
      <div class="register-form__img"><img src="{$img_popup.img_thumb_vn}" alt="popup"></div>
      <div class="register-form__meta">
         <h3 class="register-form__ttl">Đăng ký nhận báo giá</h3>
         <p class="register-form__txt">Đơn vị thiết kế và thi công trên toàn quốc<br><span>(Đặt lịch để được tư vấn và nhận báo giá)</span></p>
         <form id="registerForm">
            <div class="form-group">
               <input type="text" name="fullname" placeholder="Họ tên" required />
            </div>
            <div class="form-group">
               <input type="text" name="phone" placeholder="Điện thoại" required />
               <div class="error-msg"></div>
            </div>
            <div class="form-group">
               <input type="email" name="email" placeholder="Email" required />
               <div class="error-msg"></div>
            </div>
            <div class="form-group">
               <input type="address" name="address" placeholder="Địa chỉ" required />
               <div class="error-msg"></div>
            </div>
            <div class="form-group">
               <textarea name="message" rows="3" placeholder="Thông tin dự án, diện tích, vị trí, phong cách" required></textarea>
            </div>
            <div class="register-form__btn"><button type="submit" class="btn-primary"><i class="fa-solid fa-paper-plane"></i> Đăng ký tư vấn</button></div>
         </form>
         <div id=" formMessage" class="msg-box">
         </div>
         <p class="register-form__txt">Hoặc gọi hotline để được tư vấn ngay</p>
         <div class="register-form__contact">
            <a class="tel" href="http://tel:{$hotline.domain}">{$hotline.domain}</a>
            <a href="http://zalo.me/{$hotline.domain}"><img src="{$path_url}/assets/images/zalo.png" alt="zalo"></a>
            <a href="https://m.me/shouse.official"><img src="{$path_url}/assets/images/messenger.jpg" alt="messenger"></a>
         </div>
      </div>
      <span class="register-form-close">X</span>
   </div>

</div>
<!-- Popup thông báo -->
<div id="popupMessage" class="popup-message">
   <div class="popup-content">
      <span id="popupText"></span>
      <button id="popupClose">X</button>
   </div>
</div>
{/if}