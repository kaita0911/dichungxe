<main>
   <div class="container">
      <div class="breadcumb">{include file='breadcumb.tpl'}</div>
      <h1 class="ttl01">{$c_ttl}</h1>
      {if $view|@count > 0}
      {include file='service/list.tpl'}
      {else}
      <div class="no-articles">
         <p>Không có sản phẩm nào trong danh mục này.</p>
      </div>
      {/if}
   </div>
</main>