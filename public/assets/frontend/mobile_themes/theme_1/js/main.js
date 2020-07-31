(function ($) {
	"use strict";

    jQuery(document).ready(function($){


        $(".embed-responsive iframe").addClass("embed-responsive-item");
        $(".carousel-inner .item:first-child").addClass("active");
        
        $('[data-toggle="tooltip"]').tooltip();

        
            $('#mobile-menu-active').meanmenu({
                meanScreenWidth: "767",
                meanMenuContainer: '.menu-prepent',
             });



        $('.menu-open').click( function (){
                  
                $('.body-left-bar').toggleClass('activee');  
                $('.menu-open').toggleClass('toggle');  
                  
        });

       
              
        $(".product-slider-wrp").owlCarousel({
            items:3,
            nav:false,
            dot:true,
            loop:true,
            margin:20,
            autoplay:false,
            autoplayTimeout:3000,
            smartSpeed:1000,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                   
                },
                768:{
                    items:1,
                   
                },
                1000:{
                    items:1,
                   
                }
            }
            
          
        });
       
        
        // Details main sldier
              
        $(".details-main-slider").owlCarousel({
            items:3,
            nav:false,
            dot:true,
            loop:true,
            margin:20,
            autoplay:false,
            autoplayTimeout:3000,
            smartSpeed:1000,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                   
                },
                768:{
                    items:1,
                   
                },
                1000:{
                    items:1,
                   
                }
            }
            
          
        });
        
        
        // Nice number
        
        $('input[type="number"]').niceNumber();


    });



    

}(jQuery));	