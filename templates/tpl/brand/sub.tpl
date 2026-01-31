<div class="main">
   <div class="container">
      <div class="breadcumb">{include file='breadcumb.tpl'}</div>
      <div class="clearfix"></div>
      <h1> {$c_ttl}</h1>
      <div class="artseed-ftn-body">
         <!-- <form method="get" id="filterForm">
            <select name="sort" id="sortSelect">
               <option value="id_desc" {if $sort=='id_desc' }selected{/if}>Mới nhất</option>
               <option value="price_asc" {if $sort=='price_asc' }selected{/if}>Giá tăng dần</option>
               <option value="price_desc" {if $sort=='price_desc' }selected{/if}>Giá giảm dần</option>
               <option value="name_asc" {if $sort=='name_asc' }selected{/if}>Tên A-Z</option>
               <option value="name_desc" {if $sort=='name_desc' }selected{/if}>Tên Z-A</option>
            </select>
         </form> -->
         <div class="p-products" id="viewlist" data-ajax-load="1" data-container="viewlist" data-pagination="viewpage" data-module="{$data_url}" data-comp="{$data_comp}" data-sort="{$sort|default:'id_desc'}" data-sub="{$data_sub}" data-id="{$data_cateid}"></div>
         <div id="viewpage" class="pagination" data-container="viewlist" data-module="{$data_url}" data-comp="{$data_comp}" data-sub="{$data_sub}" data-id="{$data_cateid}"></div>
      </div>
   </div>
</div>