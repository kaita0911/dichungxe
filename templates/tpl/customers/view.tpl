<div class="ask-main">
   
    <div class="bg-feedback">
    <div class="container">
        <div class="container content-why">
            <div class="title-feedback"><h1><!--{$seo.$name}--></h1></div>
            <div class="row">
                <div class="carousel-feedback">
                    <ul>
                    	<!--{section name=i loop=$view}-->
                            <li>
                                <div class="item-feedback">
                                    <!--{$view[i].$content}-->
                                    <h3><!--{$view[i].$name}--></h3>
                                    <div class="star">
                                        <!--{section name=j start=0 loop=$view[i].star}-->
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        <!--{/section}-->
                                       
                                    </div>
                                </div>
                            </li>
                            
                        <!--{/section}-->
                    </ul>
                    <div class="customNavigation">
                        <a class="btn prevfeed"><i class="fa fa-angle-left"></i></a>
                        <a class="btn nextfeed"><i class="fa fa-angle-right"></i></a>
                    </div>   
                </div>
                <script type="text/javascript">
                $(document).ready(function() {  
                      var carouselfeed = $(".carousel-feedback ul");
                            carouselfeed.owlCarousel({
                              items : 3, 
                              autoPlay:3000,
                            itemsCustom : false,
                            itemsDesktop : [1199,4],
                            itemsDesktopSmall : [980,3],
                            itemsTablet: [768,2],
                            itemsTabletSmall: false,
                            itemsMobile : [479,1]
                          });
                          $(".nextfeed").click(function(){
                            carouselfeed.trigger('owl.next');
                          });
                          $(".prevfeed").click(function(){
                            carouselfeed.trigger('owl.prev');
                      
                      });
                    });
            </script>
            </div>
        </div>
    </div>
</div><!--bg-feedback-->

        
</div>