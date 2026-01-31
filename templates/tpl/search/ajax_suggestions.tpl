{if $suggestions|@count > 0}
{foreach from=$suggestions item=item}
<a class="suggest-item" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">
    <div class="suggest-item__img"><img src="{$path_url}/{$item.img_thumb_vn}" alt="{$item.name_detail}" class="img-responsive"></div>
    <div class="suggest-item__meta">
        <h3 class="suggest-item__meta__ttl hover">{$item.name_detail}</h3>
    </div>
</a>
{/foreach}
{/if}