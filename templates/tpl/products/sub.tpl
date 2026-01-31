<main>
   <div class="container">
      <ul class="breadcumb">{include file='breadcumb.tpl'}</ul>
      <div class="c-filter">
         <h1 class="ttl01"> {$c_ttl}</h1>
      </div>
      {if $cateInfo.content}
      <div class="cate-description">{$cateInfo.content}</div>
      {/if}
      {if $view|@count > 0}
      {include file='products/list.tpl'}
      {else}
      <div class="no-product">
         <p>Không có sản phẩm nào trong danh mục này.</p>
      </div>
      {/if}
   </div>
</main>