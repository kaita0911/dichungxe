<div class="main">
   <div class="container">
      <div class="breadcumb">{include file='breadcumb.tpl'}</div>
      <h1> {$c_ttl} 1</h1>
      <div class="artseed-ftn-body">
         <div class="content-news-main row">

            <div id="viewlist" data-ajax-load="1" data-container="viewlist" data-pagination="viewpage" data-module="{$data_url}" data-comp="{$data_comp}"></div>
            <div id="viewpage" class="pagination" data-container="viewlist" data-module="{$data_url}" data-comp="{$data_comp}"></div>
         </div>

      </div>
   </div>
</div>