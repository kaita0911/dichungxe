<div class="main">
   <div class="container">
      <div class="breadcumb">{include file='breadcumb.tpl'}</div>
      <div class="row">
         <!-- Main content -->
         <div class="artseed-ftn-body col-md-9 col-sm-8 col-xs-12">
            <div class="title-page">
               <h1 itemprop="headline">{$detail.name}</h1>
            </div>
            <input type="hidden" id="youtube-link" value="{$detail.link_out}">
            <div id="video-preview" style="margin-top:10px;"></div>
            <div class="pagewhite" itemprop="articleBody">
               <div class="artseed-detail-content">
                  {$detail.content}
               </div>

            </div>
         </div>
         {if $articles_related|@count > 0}
         <div class="related-articles">
            <h3>Tin liên quan</h3>
            <ul>
               {foreach from=$articles_related item=item}
               <li>
                  <a href="{$path_url}/{$lang_prefix}{$item.unique_key}.html" title="{$item.name_detail}">
                     <img src="{$path_url}/{$item.img_thumb_vn}" alt="{$item.name_detail}" class="img-responsive">
                     <h3>{$item.name_detail}</h3>
                     <div class="date">{$item.dated|date_format:"%d/%m/%Y"}</div>
                  </a>
               </li>
               {/foreach}
            </ul>
         </div>
         {/if}
         <!-- /.artseed-ftn-body -->
      </div>
   </div>
</div>
{literal}<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
      $("#youtube-link").on("input", function() {
         const url = $(this).val().trim();
         renderVideo(url);
      });

      const initialUrl = $("#youtube-link").val().trim();
      if (initialUrl) renderVideo(initialUrl);

      function renderVideo(url) {
         const videoId = getYouTubeID(url);
         if (videoId) {
            const embedUrl = `https://www.youtube.com/embed/${videoId}`;
            $("#video-preview").html(`
               <iframe width="100%" height="450" 
                  src="${embedUrl}" 
                  frameborder="0" 
                  allowfullscreen>
               </iframe>
            `);
         } else {
            $("#video-preview").empty();
         }
      }

      function getYouTubeID(url) {
         const regex = /(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|v\/))([A-Za-z0-9_-]{11})/;
         const match = url.match(regex);
         return match ? match[1] : null;
      }
   });
</script>
{/literal}