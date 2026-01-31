<main>
   <div class="container">
      <div class="breadcumb">{include file='breadcumb.tpl'}</div>
      <!-- Main content -->
      <div class="artseed-body">
         <div class="title-page">
            <h1 class="ttl01" itemprop="headline">{$detail.name}</h1>
            <div class="artseed-detail" itemprop="articleBody">
               {if $toc|@count > 0}
               <div class="detail-toc">
                  <div class="detail-toc__ttl">Mục lục bài viết</div>
                  <ul class="toc-content">
                     {foreach from=$toc item=item}
                     <li style="margin-left:{math equation=" (x - 2) * 20" x=$item.level}px;">
                        <a href="#{$item.id}" class="hover">
                           {$item.title}
                        </a>
                     </li>
                     {/foreach}
                  </ul>
               </div>
               {/if}
               {$content nofilter}
               {include file='tag.tpl'}
            </div>
         </div>
         {if $articles_related|@count > 0}
         <div class="related-articles">
            <h2 class="ttl02">Tin liên quan</h2>
            <div class="related-articles__lst">
               {foreach from=$articles_related item=item}
               <a class="related-item" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">
                  <img src="{$path_url}/{$item.img_thumb_vn}" alt="{$item.name_detail}" class="related-item__img">
                  <h3 class="related-item__ttl hover">{$item.name_detail}</h3>
               </a>
               {/foreach}
            </div>
         </div>
         {/if}
         <!-- /.artseed-ftn-body -->
      </div>
   </div>
</main>