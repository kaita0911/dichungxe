<div class="f-articles">
   {foreach from=$view item=item}
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