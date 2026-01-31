<div class="container">
    <ul class="breadcumb">
        <li><a href="./">Trang chủ</a> »</li>
        <li><span>Tìm kiếm</span></li>
    </ul>
    <h1 class="ttl01" itemprop="headline">Tìm kiếm: "{$keyword}"</h1>
    <br>
    <div class="p-products">
        {if $view|@count > 0}
        {foreach from=$view item=item}
        <div class="product-item">
            <a class="product-item__img" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">
                <div class="img-gall-js">
                    <img src="{$item.img_thumb_vn}?width=700&height=1000&mode=cover"
                        alt="{$item.name_detail}"
                        class="img-cover"
                        loading="lazy">
                    {foreach from=$item.gallery item=img}
                    <img src="{$img}?width=700&height=1000&mode=cover" alt="{$item.name_detail}" class="img-cover"
                        loading="lazy">
                    {/foreach}
                </div>
                <div class="product-item__ct">
                    <span class="ic-w level">{$item.difficulty}</span>
                    <span class="ic-w rate">4.9</span>
                    <span class="ic-w time">{$item.time}</span>
                </div>
                <div class="product-price">
                    <span class="price-current">{$item.price_formatted}</span>
                    {if $item.priceold > 0 }
                    <span class="price-old">{$item.priceold_formatted}</span>
                    {/if} /Vé
                </div>
            </a>
            <h3><a class="product-item__ttl hover" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">{$item.name_detail}</a></h3>
            <div class="product-item__more">
                {$item.short_more}
            </div>
        </div>
        {/foreach}
        {else}
        <div class="nodate">Không tìm thấy kết quả</div>
        {/if}

    </div>
    <div id="viewpage" class="pagination"> {$pagination nofilter}</div>
</div>