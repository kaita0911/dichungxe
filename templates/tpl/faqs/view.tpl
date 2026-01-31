<div class="main">
   <div class="container">
      <div class="bg-bred">
         <div class="productbreadcrumb">
            <ul>
               <li>
                  <a title="Trang chủ" href="<!--{$path_url}-->"><i class="fa fa-home"></i> Trang chủ</a>
               </li>
               <!--{$linkTitle}-->
            </ul>
         </div>
      </div>
      <div class="clearfix"></div>
         <div class="row">
         <!--{include file="left.tpl"}-->
         <div class="col-md-9 col-sm-9">
            <div class="title-page">
               <h1>
                  <span>
                     <!--{$seo.$name}-->
                  </span>
               </h1>
            </div>
            <div class="conent-news-main">
               <!--{if $CheckNull eq 0}-->
               <div class="nodate"> ##No_date## </div>
               <!--{else}-->
               <div id="viewlist">
                  <!--{section name=i loop=$view}-->
                  <!--{include file="faqs/list.tpl"}-->
                  <!--{/section}-->
               </div>
               <!--{/if}--> 
               <!--{if $Checkpg eq 1 }--> 
               <div class="Clear"></div>
               <div class="pagination" id="viewpage">
                  <!--{$linkpg}-->
               </div>
               <!--{/if}-->        
            </div>
         </div>
      </div>
   </div>
</div>