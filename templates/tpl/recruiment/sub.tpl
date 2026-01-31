<main>
   <div class="container">
      <div class="breadcumb">{include file='breadcumb.tpl'}</div>
      <h1> {$c_ttl}</h1>
      {if $cateInfo.content}
      <div class="cate-description">{$cateInfo.content}</div>
      {/if}
      {if $view|@count > 0}
      {include file='articles/list.tpl'}
      {else}
      <div class="no-articles">
         <p>Không có sản phẩm nào trong danh mục này.</p>
      </div>
      {/if}
   </div>
</main>