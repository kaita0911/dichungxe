<div class="main">
   <div class="container">
      <div class="breadcumb">{include file='breadcumb.tpl'}</div>
      <h1> {$c_ttl}</h1>
      <div class="artseed-ftn-body">
         <div class="p-articles" id="viewlist" data-ajax-load="1" data-container="viewlist" data-pagination="viewpage" data-module="{$data_url}" data-comp="{$data_comp}" data-sort="{$sort|default:'id_desc'}" data-sub="{$data_sub}" data-id="{$data_cateid}"></div>
         <div id="viewpage" class="pagination" data-container="viewlist" data-module="{$data_url}" data-comp="{$data_comp}" data-sub="{$data_sub}" data-id="{$data_cateid}"></div>
      </div>
   </div>
</div>