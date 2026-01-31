<div class="main">
  <div class="container">
    <div class="breadcumb">{include file='../breadcumb.tpl'}</div>
    <div class="row">
      <!-- Main content -->
      <div class="artseed-ftn-body col-md-9 col-sm-8 col-xs-12">
        <div class="title-page">
          <h1 itemprop="headline">{$detail.name}</h1>
        </div>
        <!-- <div class="box-gallery">
          {if $product_images|@count > 0}
          <div class="product-gallery">
            {foreach $product_images as $img}
            <div class="image-item">
              <img src="{$path_url}/{$img.img_vn}" alt="{$item.name_detail}">
            </div>
            {/foreach}
          </div>

          {/if}
        </div> -->
        <div class="box-price">
          {if $item.price > 0}
          <span class="price-current">{number_format($detail.price, 0, ',', '.')} ₫</span>
          {else}
          Liên hệ
          {/if}
          {if $item.priceold > 0}
          <span class="price-old">{number_format($detail.priceold, 0, ',', '.')} ₫</span>
          {/if}
        </div>
        <form id="product-order-form">
          <input type="hidden" name="product_id" value="{$detail.articlelist_id}">
          <label>Số lượng:</label>
          <input type="number" name="quantity" value="1" min="1">

          <div class="buttons">
            <button type="button" class="btn-add-cart" data-id="{$detail.articlelist_id}">Đặt hàng</button>
            <button type="button" class="btn-buy-now" data-id="{$detail.articlelist_id}">Mua nhanh</button>
          </div>
        </form>
        <div class="pagewhite" itemprop="articleBody">
          <div class="artseed-detail-content">
            {$detail.content}
          </div>
        </div>
      </div>
      {if $articles_related|@count > 0}
      <div class="related-articles">
        <h3>Sản phẩm liên quan</h3>
        <ul>
          {foreach from=$articles_related item=item}
          <li>
            <a href="{$path_url}/{$lang_prefix}{$item.link_detail}.html" title="{$item.name_detail}">
              <img src="{$path_url}/{$item.img_thumb_vn}" alt="{$item.name_detail}" class="img-responsive">
              <h3>{$item.name_detail}</h3>
              <div class="box-price">
                <span class="price-current">{number_format($item.price, 0, ',', '.')} ₫</span>/<span class="price-old">{number_format($item.priceold, 0, ',', '.')} ₫</span>
              </div>
            </a>
          </li>
          {/foreach}
        </ul>
      </div>
      {/if}
      <!-- /.artseed-ftn-body -->
    </div>
  </div>
</div>