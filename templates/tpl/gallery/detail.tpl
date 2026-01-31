<div class="cs-main pagegin nocolor">
    <div class="container">
        <div class="productbreadcrumb">
                <ul>
                    <li>
                        <a title="##Trang_chu##" href="<!--{$path_url}-->">##Trang_chu##</a>
                    </li>
                    <!--{$linkTitle}-->
                </ul>
            </div><!--productbreadcrumb-->  
        <div class="cs-home-pr-tab">
        	<div class="cs-title-page-album"><h1><strong><!--{$detail.$name}--></strong></h1></div>
                
            <div class="content-page-detail-ablum">


                
                <!--{$detail.$content}-->
               	<ul class="bxslider">
                	<!--{section name=i loop=$viewct}-->
                        <li class="image-gallery">
                            <a class="fancybox" data-fancybox-group="gallery" href="<!--{$path_url}-->/<!--{$viewct[i].img_vn}-->" >
                                <img src="<!--{$path_url}-->/<!--{$viewct[i].img_vn}-->" alt="<!--{$viewct[i].$alt_img}-->" title="<!--{$viewct[i].$title_img}-->" class="img-responsive"/>
                            </a>
                        </li>
                    <!--{/section}--> 
            	</ul>
                <div id="bx-pager">
                      	<!--{section name=i loop=$viewct}-->
                        <div class="thumb-sl">
                    	<a data-slide-index="<!--{$smarty.section.i.index}-->" href="" title="<!--{$viewct[i].$title_img}-->">
                    	<img src="<!--{$path_url}-->/<!--{$viewct[i].img_vn}-->" alt="<!--{$viewct[i].$alt_img}-->" title="<!--{$viewct[i].$title_img}-->" class="img-responsive"/>
                    	</a>
                        </div>
                      <!--{/section}-->
                </div>
            </div>
            <script type="text/javascript">
				$(document).ready(function() {
				  
                  $('.bxslider').bxSlider({
                      pagerCustom: '#bx-pager',
                      auto: true,
                      autoControls: true
                  });
                  $('.fancybox').fancybox();	
				});
                
		   </script>
            <script type="text/javascript">
        		$(document).ready(function() {
                $("#bx-pager").owlCarousel({
                	items : 10,
                    autoPlay:3000,
                	itemsCustom : false,
                	itemsDesktop : [1199,8],
                	itemsDesktopSmall : [991,6],
                	itemsTablet: [768,6],
                	itemsTabletSmall: false,
                	itemsMobile : [479,4]
                });
        		});
	       </script>
            <!--{if $CheckNull gt 0}-->
                <div class="row">
                    <div class="content-cs-ab-related">
                        <div class="tit-related"><h2><strong>Các bài ##Lien_quan##</strong></h2></div>                        
                         <ul id="showPg">
                            <!--{section name=i loop=$view}-->
                                <!--{include file="gallery/list.tpl"}-->
                            <!--{/section}--> 
                        </ul>
                        <!--{if $Checkpg eq 1 }-->
                            <div class="clearfix"></div>
                            <div class="pagination" id="showPaging">
                                <!--{$linkpg}-->
                            </div>  
                        <!--{/if}--> 
                         
                    </div>
                </div>
           <!--{/if}--> 
        </div><!--cs-home-pr-tab-->
    </div>
</div>