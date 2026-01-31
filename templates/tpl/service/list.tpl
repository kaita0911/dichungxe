<div class="f-services">
   {foreach from=$view item=item}
   <a class="f-services__item" href="{$path_url}/{$lang_prefix}{$item.unique_key}" title="{$item.name_detail}">
      <img src="{$item.img_thumb_vn}?width=400&height=300&mode=cover" title="{$item.name_detail}" alt="{$item.name_detail}" class="img-cover" loading="lazy">
      <h3 class="f-services__item__ttl">{$item.name_detail}</h3>
   </a>
   {/foreach}
</div>
<div id="viewpage" class="pagination"> {$pagination nofilter}</div>