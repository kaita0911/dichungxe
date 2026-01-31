{foreach $view as $item}
<div class="products-item">
  <a href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">
    <img src="{$path_url}/{$item.img_thumb_vn}" alt="{$item.name}" class="img-responsive">

  </a>
  <h3>{$item.name_detail}</h3>
  <div class="price">{if $item.price > 0}
    <span class="price-current">{number_format($item.price, 0, ',', '.')} ₫</span>
    {else}
    {$contact}
    {/if}
    {if $item.priceold > 0 }
    <span class="price-old">{number_format($item.priceold, 0, ',', '.')} ₫</span>
    {/if}
  </div>
</div>
{/foreach}