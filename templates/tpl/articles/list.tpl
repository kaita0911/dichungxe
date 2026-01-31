<div class="f-articles">
   {foreach from=$view item=item}
   <div class="articles">
      <a class="articles__img" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">
         <img src="/{$item.img_thumb_vn}?width=600&height=400&mode=cover" alt="{$item.name_detail}" title="{$item.name_detail}" class="img-cover">
      </a>
      <h3><a class="articles__ttl" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">{$item.name_detail}</a></h3>
      <div class="articles__date"><i class="fa-solid fa-calendar"></i> {$item.dated|date_format:"%d/%m/%Y"}</div>
      <div class="articles__des">
         {$item.short_detail}
      </div>
      <a href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" class="viewmore" title="xem thêm">Xem thêm</a>
   </div>
   {/foreach}
</div>
<div id="viewpage" class="pagination"> {$pagination nofilter}</div>