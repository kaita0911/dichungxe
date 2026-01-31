<main>
    <div class="container">
        <div class="breadcumb">{include file='breadcumb.tpl'}</div>
        <h1 class="ttl01">Tag: {$tagName|escape}</h1>
        <div class="wrap-tag">
            {* --- Nếu có sản phẩm (comp = 1) --- *}
            {if isset($articlesByComp.2)}
            <div class="section-tag">
                <h2 class="ttl02">Sản phẩm liên quan</h2>
                <div class="p-products">
                    {foreach from=$articlesByComp.2 item=item}
                    <div class="product-item">
                        {if $item.price > 0 && $item.priceold > 0 && $item.priceold > $item.price}
                        {math equation="(a - b) / a * 100" a=$item.priceold b=$item.price assign="discount"}
                        <span class="discount">-{$discount|round:0}%</span>
                        {/if}
                        <a class="product-item__img hover-img" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">
                            <img src="{$path_url}/{$item.img_thumb_vn}" alt="{$item.name}" class="img-cover">
                        </a>
                        <h3><a class="product-item__ttl hover" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">{$item.name_detail}</a></h3>
                        <div class="product-price">
                            {if $item.price > 0}
                            <span class="price-current">{$item.price_formatted} ₫</span>
                            {else}
                            {$contact}
                            {/if}
                            {if $item.priceold > 0 }
                            <span class="price-old">{$item.priceold_formatted} ₫</span>
                            {/if}
                        </div>
                    </div>
                    {/foreach}
                </div>
            </div>
            {/if}

            {* --- Nếu có tin tức (comp = 1) --- *}
            {if isset($articlesByComp.1)}
            <div class="section-tag">
                <h2 class="tt02">Bài viết khác</h2>
                <div class="f-articles">
                    {foreach from=$articlesByComp.1 item=item}
                    <div class="articles">
                        <a href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">
                            <img src="{$path_url}/{$item.img_thumb_vn}" alt="{$item.name}" class="img-responsive">
                            <h3>{$item.name_detail}</h3>
                        </a>
                        <div class="date">{$item.dated|date_format:"%d/%m/%Y"}</div>
                        <div class="news-desc">
                            {$item.short_detail}
                        </div>
                    </div>
                    {/foreach}
                </div>
            </div>
            {/if}

            {* --- Nếu có bài viết khác (comp = 27) --- *}
            {if isset($articlesByComp.27)}
            <div class="section-tag">
                <h2 class="tt02">Bài viết khác</h2>
                <div class="f-articles">
                    {foreach from=$articlesByComp.27 item=item}
                    <div class="articles">
                        <a href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">
                            <img src="{$path_url}/{$item.img_thumb_vn}" alt="{$item.name}" class="img-responsive">
                            <h3>{$item.name_detail}</h3>
                        </a>
                        <div class="date">{$item.dated|date_format:"%d/%m/%Y"}</div>
                        <div class="news-desc">
                            {$item.short_detail}
                        </div>
                    </div>
                    {/foreach}
                </div>
                {/if}
            </div>
        </div>
    </div>
</main>