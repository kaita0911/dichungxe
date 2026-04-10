<main class="home">
   <div class="container">
      <div class="p-commit">

         <ul class="p-commit__nav">
            {foreach from=$commit item=item name=tab}
            <li class="{if $smarty.foreach.tab.first}active{/if}" data-tab="commit-tab-{$smarty.foreach.tab.index}">
               {$item.name_detail}
            </li>
            {/foreach}
         </ul>
         <div class="p-commit__content">
            {foreach from=$commit item=item name=tab}
            <div class="commit-tab-content {if $smarty.foreach.tab.first}active{/if}"
               id="commit-tab-{$smarty.foreach.tab.index}">
               <img src="{$item.img_thumb_vn}" alt="{$item.name_detail}" class="img-cover" loading="lazy">
            </div>
            {/foreach}
         </div>
      </div>
   </div>
   <div class="container">
      <h2 class="ttl02">Tham khảo lịch trình và đăng ký các chuyến đi</h2>
      <div class="categories-tab">

         <ul class="categories-tab__nav">
            <li class="active" data-tab="home-tab-all">
               Tất cả
            </li>
            {foreach from=$home_categories item=cat name=tab}
            <li data-tab="cate-tab-{$smarty.foreach.tab.index + 1}">
               {$cat.name}
            </li>
            {/foreach}
         </ul>
         <div class="categories-tab__content">
            <div class="cate-tab-pane active" id="home-tab-all">
               <section class="home-category">
                  <div class="p-products">
                     {foreach from=$home_categories item=cat}
                     {foreach from=$cat.products item=item}
                     <div class="product-item">
                        <a class="product-item__img" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html"
                           title="{$item.name_detail}">
                           <div class="img-gall-js">
                              <img src="{$item.img_thumb_vn}" alt="{$item.name_detail}" class="img-cover img-gall"
                                 loading="lazy">
                              {foreach from=$item.gallery item=img}
                              <img src="{$img}" alt="{$item.name_detail}" class="img-cover img-gall" loading="lazy">
                              {/foreach}
                           </div>
                           <div class="product-item__ct">
                              <span class="ic-w level">{$item.difficulty}</span>
                              <span class="ic-w rate">4.9</span>
                              <span class="ic-w time">{$item.time}</span>
                           </div>
                           <div class="product-price">
                              <span class="price-current">
                                 {$item.price_formatted}
                              </span>
                              {if $item.priceold_formatted}
                              <span class="price-old">
                                 {$item.priceold_formatted}
                              </span>
                              {/if} /Vé
                           </div>
                        </a>

                        <h3>
                           <a class="product-item__ttl hover" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html"
                              title="{$item.name_detail}">
                              {$item.name_detail}
                           </a>
                        </h3>


                        <div class="product-item__more">
                           {$item.short_more}
                        </div>
                     </div>
                     {/foreach}
                     {/foreach}
                  </div>
               </section>
            </div>
            {foreach from=$home_categories item=cat name=tab}
            <div class="cate-tab-pane" id="cate-tab-{$smarty.foreach.tab.index + 1}">

               <section class="home-category">
                  <div class="p-products">
                     {foreach from=$cat.products item=item}
                     <div class="product-item">
                        <a class="product-item__img" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html"
                           title="{$item.name_detail}">
                           <div class="img-gall-js">
                              <img src="{$item.img_thumb_vn}" alt="{$item.name_detail}" class="img-cover img-gall"
                                 loading="lazy">
                              {foreach from=$item.gallery item=img}
                              <img src="{$img}" alt="{$item.name_detail}" class="img-cover img-gall" loading="lazy">
                              {/foreach}
                           </div>
                           <div class="product-item__ct">
                              <span class="ic-w level">{$item.difficulty}</span>
                              <span class="ic-w rate">4.9</span>
                              <span class="ic-w time">{$item.time}</span>
                           </div>
                           <div class="product-price">
                              <span class="price-current">
                                 {$item.price_formatted}
                              </span>
                              {if $item.priceold_formatted}
                              <span class="price-old">
                                 {$item.priceold_formatted}
                              </span>
                              {/if} /Vé
                           </div>
                        </a>
                        <h3>
                           <a class="product-item__ttl hover" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html"
                              title="{$item.name_detail}">
                              {$item.name_detail}
                           </a>
                        </h3>
                        <div class="product-item__more">
                           {$item.short_more}
                        </div>
                     </div>
                     {/foreach}
                  </div>
               </section>

            </div>
            {/foreach}
         </div>
      </div>

   </div>
   <div class="p-feedback">
      <div class="container">
         <h2 class="ttl02">Lời khen từ khách hàng</h2>
         <div class="js-feedback">
            {foreach from=$feedback item=item}
            <div class="feedback-item">
               <div class="feedback-item__img">
                  <img src="{$item.img_thumb_vn}?width=800&height=800&mode=cover" alt="{$item.name_detail}"
                     class="img-cover" loading="lazy">
               </div>
               <div class="feedback-item__meta">
                  <div class="feedback-item__short">{$item.content}</div>
                  <h3 class="feedback-item__ttl"><span>{$item.name_detail}</span></h3>

               </div>
            </div>
            {/foreach}
         </div>
      </div>
   </div>
   <div class="p-news">
      <div class="container">
         <h2 class="ttl02">Bài viết mới nhất</h2>
         <div class="p-news-wrap js-news">
            {foreach from=$news_home item=item}
            <div class="news-item">
               <a class="news-item__img hover-img" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html"
                  title="{$item.name_detail}">
                  <img src="{$item.img_thumb_vn}?width=800&height=600&mode=cover" alt="{$item.name_detail}"
                     class="img-cover" loading="lazy">
               </a>
               <h3><a class="news-item__ttl hover" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html"
                     title="{$item.name_detail}">{$item.name_detail}</a></h3>
               <div class="news-item__short">{$item.short}</div>
               <a href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" class="viewmore" title="xem thêm">Xem
                  thêm</a>
            </div>
            {/foreach}
         </div>
      </div>
   </div>
   <div class="p-video">
      <div class="container">
         <h2 class="ttl02">video mới nhất</h2>
         <div class="p-news-wrap js-video">
            {foreach from=$video_home item=item key=i}
            <div class="video-item" data-index="{$i}">
               <video preload="metadata">
                  <source src="{$item.video}" type="video/mp4">
               </video>
               <h3 class="video-item__ttl">{$item.name_detail}</h3>
            </div>
            {/foreach}
         </div>
      </div>
   </div>
   <div id="videoPopup" class="video-popup">
      <span class="close">×</span>

      <video id="popupVideo" playsinline controls></video>

      <div class="nav prev">❮</div>
      <div class="nav next">❯</div>
   </div>
</main>
{include file='popup.tpl'}
<script>
   const videoList = {$video_home|@json_encode};
</script>
{literal}
<script>

   let currentIndex = 0;

   const popup = document.getElementById("videoPopup");
   const video = document.getElementById("popupVideo");

   // 👉 CLICK ITEM
   document.querySelector(".js-video").addEventListener("click", function (e) {
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
      video.src = videoList[currentIndex].video;
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
   popup.addEventListener("click", function(e){
      // nếu click đúng vào nền (không phải video hay nút)
      if(e.target === popup){
         closePopup();
      }
   });
</script>

{/literal}