<div class="artseed-main">
	<div class="container">
    	<!--{if $bannercon.id neq ''}-->
            <a <!--{if $bannercon.link neq ''}-->href="<!--{$bannercon.link}-->"<!--{/if}--> title="<!--{$bannercon.title_link}-->">	
                <img class="img-responsive imgcat" src="<!--{$path_url}-->/<!--{$bannercon.img_vn}-->" alt="<!--{$bannercon.alt_img}-->" class="img-responsive"/>
            </a>
        <!--{/if}-->
        <div class="productbreadcrumb">
            <ul>
                <li>
                    <a href="<!--{$path_url}-->" title="Trang chủ">Trang chủ</a>
                </li>
                <!--{$linkTitle}-->
            </ul>
        </div>  
        <div class="clearfix"></div>
        <div class="row">
        <!--{include file="right.tpl"}-->
            <div class="artseed-ftn-body col-md-9 col-sm-8 col-xs-12">
                <div class="title-page"><h1><!--{$seo.$name}--></h1></div>
                <div class="conent-news-main">
                    
                    
                        <ul class="bxslider">
                        <!--{section name=i loop=$view}-->
                            <li>
                               
                                    <img src="<!--{$path_url}-->/<!--{$view[i].img_thumb_vn}-->" alt="<!--{$view[i].alt_img}-->" title="<!--{$view[i].title_img}-->" class="img-responsive"/>
                                
                            </li>
                       <!--{/section}-->
                        </ul>   
                        <div id="bx-pager">
                            <ul class="row10">
                                <!--{section name=j loop=$view}-->
                                  <li>  <a data-slide-index="<!--{$smarty.section.j.index}-->" href="#" title="<!--{$view[j].alt_img}-->">
    		                              <img src="<!--{$path_url}-->/<!--{$view[j].img_thumb_vn}-->"  alt="<!--{$view[j].alt_img}-->"/>
                                    </a></li>
                                <!--{/section}-->
                            </ul>
                        </div>
                    <script>$(document).ready(function(){$('.bxslider').bxSlider({ pagerCustom: '#bx-pager', auto: true, autoControls: true});});</script>
                      <script type="text/javascript">
                            $(document).ready(function() {  
                                  var carouselProTab = $("#bx-pager ul");
                                  carouselProTab.owlCarousel({
                                      items : 10,
                                      autoPlay:4000, 
                                      itemsDesktop : [1000,7], 
                                      itemsDesktopSmall : [900,6], 
                                      itemsTablet: [600,4], 
                                      itemsMobile : false,
                                      });
                                      
                                });
                        </script>
                <div class="clearfix"></div>
                <div class="news_related">
                    <div class="news_title_related"><h2>Dự án liên quan</h2></div>
                    <div class="content-al-lq row">
                       
                            	<!--{section name=i loop=$allbumlq}-->
                                 <div class="list-album col-md-4 col-sm-6 col-xs-6">
                                     <div class="item-album">
                                        <div class="thumb-ab">
                                            <a href="<!--{$path_url}-->/<!--{$allbumlq[i].unique_key}-->/" title="<!--{$allbumlq[i].title_link}-->">
                                               <img src="<!--{$path_url}-->/<!--{$allbumlq[i].img_vn}-->" alt="<!--{$allbumlq[i].alt_img}-->" title="<!--{$allbumlq[i].title_img}-->" class="img-responsive"/>
                                            </a>
                                        </div>
                                            <h3>
                                              <a href="<!--{$path_url}-->/<!--{$allbumlq[i].unique_key}-->/" title="<!--{$allbumlq[i].title_link}-->">
                                                <!--{$allbumlq[i].$name}-->
                                            </a>
                                        </h3>
                                     </div>
                                </div>
                                <!--{/section}-->
                      
                    </div>
                  </div><!--page_news--> 
                </div>  
            </div>
            
        </div>
    </div><!--container-->
</div>