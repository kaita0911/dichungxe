<main>
   <div class="container">
      <ul class="breadcumb">{include file='breadcumb.tpl'}</ul>
      <!-- Main content -->
      <div class="artseed-body">
         <h1 class="ttl01" itemprop="headline">{$detail.name}</h1>
         <div class="artseed-detail" itemprop="articleBody">
            {$detail.content}
         </div>
      </div>
      <!-- {if $articles_related|@count > 0}
      <div class="related-articles">
         <h2 class="ttl02">Tin liên quan</h2>
         <ul class="related-consulting">
            {foreach from=$articles_related item=item}
            <li>
               <a class="hover" href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">
                  <h3>{$item.name_detail}</h3>
               </a>
            </li>
            {/foreach}
         </ul>
      </div>
      {/if} -->
      <!-- /.artseed-ftn-body -->
   </div>
</main>