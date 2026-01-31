<footer class="p-footer">
  <div class="container">
    <div class="p-footer-wrap">
      <div class="p-footer-col">
        <h2 class="p-footer-col__ttl">{$footer.name}</h2>

        <div class="item">
          <i class="fa-solid fa-location-dot"></i> Địa chỉ: {$footer.address}
        </div>
        <div class="item">
          <i class="fa-solid fa-phone"></i> Hotline: <strong>{$footer.hotline}</strong>
        </div>
        <div class="item">
          <i class="fa-solid fa-envelope"></i> Email: {$footer.email}
        </div>

        <ul class="social">
          {if $faceShare.facebook}<li><a href="{$faceShare.facebook}"><i class="fa-brands fa-facebook-f"></i></a></li>{/if}
          {if $faceShare.printest}<li><a href="{$faceShare.printest}"><i class="fa-brands fa-pinterest"></i></a></li>{/if}
          {if $faceShare.instagram}<li><a href="{$faceShare.instagram}"><i class="fa-brands fa-instagram"></i></a></li>{/if}
          {if $faceShare.linkedin}<li><a href="{$faceShare.linkedin}"><i class="fa-brands fa-threads"></i></a></li>{/if}
          {if $faceShare.youtube}<li><a href="{$faceShare.youtube}"><i class="fa-brands fa-youtube"></i></a></li>{/if}
          {if $faceShare.tiktok}<li><a href="{$faceShare.tiktok}"><i class="fa-brands fa-tiktok"></i></a></li>{/if}
        </ul>

      </div>
      <div class="p-footer-col --tt">
        <h2 class="p-footer-col__ttl">Thông tin hữu ích</h2>
        <div class="p-footer-lst">
          {foreach from=$consulting item=item}

          <a class="services-item hover" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">
            <i class="fa-solid fa-caret-right"></i> {$item.name_detail}
          </a>

          {/foreach}
        </div>
      </div>
      <div class="p-footer-col --fb">
        <h2 class="p-footer-col__ttl">Fanpage Facebook</h2>
        <div class="content-fb">
          <div class="fanpage">
            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v24.0&appId=APP_ID"></script>
            <div class="fb-page" data-href="https://www.facebook.com/Dichungxetapluyenleonuimoituan" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
              <blockquote cite="https://www.facebook.com/Dichungxetapluyenleonuimoituan" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Dichungxetapluyenleonuimoituan">Đi chung xe - Tập luyện leo núi mỗi tuần</a></blockquote>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<div id="cart-popup"></div>
<div id="c-loading" class="{if $smarty.session.contact_success} hide{/if}">
  <div id="orderLoading"><svg width="50" height="50" viewBox="0 0 50 50" role="status" aria-label="Đang tải">
      <circle cx="25" cy="25" r="20" fill="none" stroke="#e9eef6" stroke-width="4" />
      <g>
        <path d="M45 25a20 20 0 0 1-20 20" fill="none" stroke="#0b76ff" stroke-width="4" stroke-linecap="round" />
        <animateTransform attributeName="transform"
          type="rotate"
          from="0 25 25"
          to="360 25 25"
          dur="1s"
          repeatCount="indefinite" />
      </g>
    </svg>
  </div>
</div>
<a href="#" class="scrollup" id="backToTop"><span></span></a>
<div class="bg-overlay"></div>
<a class="btn-order" target="_blank" href="https://busdcx.com/">ĐẶT VÉ NHANH</a>
<a href="tel:{$hotline.phone}" class="call-icon" rel="nofollow">
  <span><img src="{$path_url}/assets/images/telephone.png" alt="Call"></span>
</a>

{include file="social.tpl"}