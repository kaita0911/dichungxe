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
              <img src="{$item.img_vn}" title="{$item.name_detail}" alt="{$item.name_detail}" class="img-cover" loading="lazy">
            </a>
            {/foreach}
          </div>
          <div class="slick-counter"></div>
        </div>
        <div class="product-gallery-right">
          {foreach from=$product_images item=item name=imgloop}
          {if $smarty.foreach.imgloop.iteration <= 4}
            <div class="product-gallery-item">
            <img src="{$item.img_vn}"
              title="{$item.name_detail}"
              alt="{$item.name_detail}"
              class="img-cover"
              loading="lazy">
        </div>
        {/if}
        {/foreach}
      </div>
    </div>
    {else}
    <div class="image-detail">
      <img src="/{$detail.img_thumb_vn}?width=400&height=400&mode=scale" title="{$detail.name_detail}" alt="{$detail.name_detail}" class="img-scale" loading="lazy">
    </div>
    {/if}
    <div class="product-detail">
      <div class="artseed-detail product-detail-des" itemprop="articleBody">
        <h1 class="ttl01 --detail" itemprop="headline">{$detail.name}</h1>
        <div class="product-detail__short ">
          {$detail.short}
        </div>

        <div class="product-detail__des">
          {$content}
        </div>
      </div>
      <div class="product-detail-sidebar" id="sidebar">
        <div class="product-detail-sidebar-content">
          <div class="product-detail-price">
            <label>Giá: </label>
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
            <a class="tlink zalo" href="{$detail.link_zalo}" title="cộng đồng zalo">Cộng đồng zalo</a>
          </div>
          <div class="hotline-right">Hotline:<strong>{$hotline.phone}</strong> (ĐI CHUNG XE)</div>
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


  <!-- /.artseed-ftn-body -->
  </div>
</main>