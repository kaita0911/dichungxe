<main>
  <div class="container">
    <ul class="breadcumb">{include file='breadcumb.tpl'}</ul>
    <!-- Main content -->
    <div class="artseed-body">
      {if $product_images|@count > 0}
      <div class="product-gallery">
        <div class="product-gallery-left">
          <div class="product-gallery-js">
            {foreach from=$product_images item=item key=k}
            <a class="image-main" data-fancybox="gallery" href="{$item.img_vn}">
              <img src="{$item.img_vn}" title="{$item.name_detail}" alt="{$item.name_detail}" class="img-cover"
                loading="lazy">
            </a>
            {/foreach}
          </div>
          <div class="slick-counter"></div>
        </div>
        <div class="product-gallery-right">
          {foreach from=$product_images item=item name=imgloop}
          {if $smarty.foreach.imgloop.iteration <= 4} <div class="product-gallery-item">
            <img src="{$item.img_vn}" title="{$item.name_detail}" alt="{$item.name_detail}" class="img-cover"
              loading="lazy">
        </div>
        {/if}
        {/foreach}
      </div>
    </div>
    {else}
    <div class="image-detail">
      <img src="/{$detail.img_thumb_vn}?width=400&height=400&mode=scale" title="{$detail.name_detail}"
        alt="{$detail.name_detail}" class="img-scale" loading="lazy">
    </div>
    {/if}
    <div class="product-detail">
      <div class="product-detail-sidebar" id="sidebar">
        <div class="product-detail-sidebar-content">
          <div class="product-detail-price">
            {if $detail.price > 0}
            <span class="price-current">{$detail.price_formatted} ₫</span>
            {else}
            <span class="price-current">Liên hệ</span>
            {/if}
            {if $detail.priceold > 0}
            <span class="price-old">{$detail.priceold_formatted} ₫</span>
            {/if}
          </div>
          <div class="product-detail-order">
            <a class="tlink ticket" href="{$detail.link_order}" title="đặt vé">Đặt vé</a>
            <a class="tlink zalo" href="{$detail.link_zalo}" title="cộng đồng zalo">Tham gia cộng đồng</a>
          </div>
          <div class="hotline-right">Hotline:<strong>{$hotline.phone}</strong></div>
        </div>

      </div>
      <div class="product-detail-des" itemprop="articleBody">
        <h1 class="ttl01 --detail" itemprop="headline">{$detail.name}</h1>
        {if $videos}
            <div class="box-videos">
              <div class="box-videos__ttl">Video giới thiệu
              </div><div class="video-list">
                {foreach from=$videos item=item key=i}
                <div class="video-item" data-index="{$i}">
                  <video preload="metadata" autoplay="" loop="" muted="" playsinline="">
                    <source src="{$item.video_file}" type="video/mp4">
                  </video>
                </div>
                {/foreach}
              </div>
            </div>
          {/if}
        <div class="list-pickup">
          {if $diemdon}
          <div class="pickup-box">
            <div class="pickup-header">
              ĐIỂM ĐÓN / ĐỊNH VỊ
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              {foreach from=$diemdon item=item}
              <div class="pickup-item">
                <div class="pickup-left">
                  <div class="pickup-title">
                    <span class="time"> {$item.time}:</span> {$item.name}
                  </div>
                  <div class="pickup-desc">
                    {$item.content}
                  </div>
                </div>
                <div class="pickup-right">
                  <a target="_blank" href="{$item.link}" class="btn-map">Định vị</a>
                  {if $item.location}
                  <a target="_blank" href="{$item.location}" class="btn-map bai">Bãi gửi</a>
                  {/if}
                </div>
              </div>
              {/foreach}
            </div>
          </div>
          {/if}
          {if $lichtrinhtrongngay}
          <div class="pickup-box">
            <div class="pickup-header">
              LỊCH TRÌNH DỰ KIẾN
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              {foreach from=$lichtrinhtrongngay item=item}
              <div class="schedule-item">
                <span class="time">{$item.name}</span>
                <div class="wrap-text">
                  <div class="text">{$item.content}</div>
                  {if $item.extra}
                  <div class="schedule-extra">
                    {foreach from=$item.extra item=extra}
                    <div class="extra-item">
                      {$extra}
                    </div>
                    {/foreach}
                  </div>
                  {/if}
                </div>
              </div>

              {/foreach}
              <div class="note">
                (Lưu ý: Thời gian trong lịch trình là dự kiến và có thể điều chỉnh linh hoạt tùy điều kiện thực tế và
                sức khỏe của đoàn.)
              </div>
            </div>
          </div>
          {/if}
          {if $days}
          <div class="pickup-box">
            <div class="pickup-header">
              LỊCH TRÌNH DỰ KIẾN
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              {foreach from=$days key=day item=data}

              <div class="schedule-day">

                <div class="schedule-day-title">
                  <span>{$data.day_content}</span>
                </div>

                {foreach from=$data.items item=item}
                <div class="schedule-item">
                  <span class="time">{$item.name}</span>
                  <span class="text">{$item.content}</span>
                </div>
                {/foreach}

              </div>

              {/foreach}

              <div class="note">
                (Lưu ý: Thời gian trong lịch trình là dự kiến và có thể điều chỉnh linh hoạt tùy điều kiện thực tế và
                sức khỏe của đoàn.)
              </div>
            </div>
          </div>
          {/if}
          {if $detail.short}
          <div class="pickup-box">
            <div class="pickup-header">
              MÔ TẢ CUNG ĐƯỜNG
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="route-item">
                {$detail.short}
              </div>
            </div>
          </div>
          {/if}
        
          {if $haihoa}
          <div class="pickup-box">
            <div class="pickup-header">
              {$haihoa.name}
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="route-item">
                {$haihoa.content}
              </div>
            </div>
          </div>
          {/if}
          {if $bolac}
          <div class="pickup-box">
            <div class="pickup-header">
              {$bolac.name}
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="route-item">
                {$bolac.content}
              </div>
            </div>
          </div>
          {/if}
          {if $tickets}
          {foreach from=$tickets item=item}
          <div class="pickup-box">
            <div class="pickup-header">
              {$item.name}
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="route-item">
                {$item.content nofilter}
              </div>
            </div>
          </div>
          {/foreach}
          {/if}
          {if $detail.content}
          <div class="pickup-box">
            <div class="pickup-header">
              CẦN CHUẨN BỊ
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="route-item">
                {$detail.content}
              </div>
            </div>
          </div>
          {/if}
          {if $detail.luuy}
          <div class="pickup-box">
            <div class="pickup-header">
              LƯU Ý QUAN TRỌNG
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="route-item">
                {$detail.luuy}
                <div class="commit">
                  <p class="commit-ttl">Bạn đăng ký chuyến đi đồng nghĩa với việc đồng ý với</p>
                  {foreach from=$consulting_detail item=item}
                  <a class="commit-item hover" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html"
                    title="{$item.name_detail}">
                    <i class="fa-solid fa-caret-right"></i> {$item.name_detail}
                  </a> {/foreach}
                </div>

              </div>
            </div>
          </div>
          {/if}
          <!-- {if $videos}
          <div class="pickup-box">
            <div class="pickup-header">
              Video
              <span class="pickup-arrow">▼</span>
            </div>
            <div class="pickup-body">
              <div class="video-list">
                {foreach from=$videos item=item key=i}
                <div class="video-item" data-index="{$i}">
                  <video preload="metadata">
                    <source src="{$item.video_file}" type="video/mp4">
                  </video>
                </div>
                {/foreach}
              </div>
            </div>
           
          </div>
          {/if} -->
        </div>
      </div>

    </div>
  </div>

  {if $articles_related|@count > 0}
  <div class="related-articles">
    <h2 class="ttl02">Tham khảo các chuyến đi khác</h2>
    <div class="p-products">
      {include file='products/other.tpl'}
    </div>
  </div>
  {/if}
  </div>
</main>
<div id="videoPopup" class="video-popup">
  <span class="close">×</span>

  <video id="popupVideo" playsinline controls></video>

  <div class="nav prev">❮</div>
  <div class="nav next">❯</div>
</div>
<script>
  const videoList = {$videos|@json_encode};
</script>
{literal}
<script>

  let currentIndex = 0;

  const popup = document.getElementById("videoPopup");
  const video = document.getElementById("popupVideo");

  // 👉 CLICK ITEM
  document.querySelector(".video-list").addEventListener("click", function (e) {
    const item = e.target.closest(".video-item");
    if (!item) return;

    currentIndex = Number(item.dataset.index);
    openPopup();
  });

  // 👉 OPEN
  function openPopup() {
    popup.style.display = "flex";
    playCurrent();
  }

  // 👉 CLOSE
  document.querySelector(".close").onclick = closePopup;

  function closePopup() {
    popup.style.display = "none";
    video.pause();
    video.src = "";
  }

  // 👉 NEXT / PREV
  document.querySelector(".next").onclick = nextVideo;
  document.querySelector(".prev").onclick = prevVideo;

  function nextVideo() {
    currentIndex = (currentIndex + 1) % videoList.length;
    playCurrent();
  }

  function prevVideo() {
    currentIndex = (currentIndex - 1 + videoList.length) % videoList.length;
    playCurrent();
  }

  // 👉 PLAY
  function playCurrent() {
    video.src = videoList[currentIndex].video_file;
    video.play();
  }

  // 👉 AUTO NEXT
  video.addEventListener("ended", nextVideo);


  // =====================
  // 👉 SWIPE MOBILE 🔥
  // =====================
  let startX = 0;

  popup.addEventListener("touchstart", e => {
    startX = e.touches[0].clientX;
  });

  popup.addEventListener("touchend", e => {
    let endX = e.changedTouches[0].clientX;

    if (startX - endX > 50) {
      nextVideo(); // swipe left
    }
    if (endX - startX > 50) {
      prevVideo(); // swipe right
    }
  });
  // click vào nền (ngoài video)
  popup.addEventListener("click", function (e) {
    // nếu click đúng vào nền (không phải video hay nút)
    if (e.target === popup) {
      closePopup();
    }
  });
</script>

{/literal}