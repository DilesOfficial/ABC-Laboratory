wow = new WOW(
  {
    animateClass: 'animated',
    offset:       100,
    callback:     function(box) {
      console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
    }
  }
);
wow.init();
$(document).ready(function(){
$(".pathadology_servies").click(function(){
        // alert("hey");
      $(".pathadology_servies").removeClass("selected_side_nav");
      $(".pathadology_servies").removeClass("selected_side_nav_first")
      // console.log("fff");
      $(".medic_service").removeClass("medic_service_show");
      $("."+this.id).addClass("medic_service_show");
      $(this).addClass("selected_side_nav");
      if($(window).width() < 768){
        var wear_sections = $(".medic_service_wrapper").offset().top - 50;
        $('html, body').animate({scrollTop:wear_sections},500);
      }
    });

});
$(window).on('load',function(){
    if(window.location.href.indexOf("our-lab/pathology-services") > -1) {
        var wear_sections = $(".medic_service_show").offset().top - 130;
        $('html, body').animate({scrollTop:wear_sections},500);
     }
});

(function ($) {
    'use strict';

    // :: Index of Plugins Active Code :: //

    var $window = $(window);

    // :: Preloader Active Code
    $window.on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    // :: Fullscreen Active Code
    $window.on('resizeEnd', function () {
        $(".full_height").height($window.height());
    });

    $window.on('resize', function () {
        if (this.resizeTO) clearTimeout(this.resizeTO);
        this.resizeTO = setTimeout(function () {
            $(this).trigger('resizeEnd');
        }, 300);
    }).trigger("resize");

    // :: Sticky Active Code
    if ($window.width() > 767) {
        if ($.fn.sticky) {
            $("#stickyHeader").sticky({
                topSpacing: 0
            });
        }
    }

    // :: Tooltip Active Code
    $('[data-toggle="tooltip"]').tooltip()

    // :: Nicescroll Active Code
    // if ($.fn.niceScroll) {
    //     $("body, textarea").niceScroll({
    //         cursorcolor: "#151515",
    //         cursorwidth: "6px",
    //         background: "#f0f0f0"
    //     });
    // }

    // :: Nice Select Active Code
    if ($.fn.niceSelect) {
        $('select').niceSelect();
    }

    // :: Owl Carousel Active Code
    if ($.fn.owlCarousel) {

        var welcomeSlide = $('.hero-slides');

        $('.hero-slides').owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            nav: true,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            navText: ['', ''],
            dots: true,
            mouseDrag:false,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1700
        });

        welcomeSlide.on('translate.owl.carousel', function () {
            var slideLayer = $("[data-animation]");
            slideLayer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).removeClass('animated ' + anim_name).css('opacity', '0');
            });
        });

        welcomeSlide.on('translated.owl.carousel', function () {
            var slideLayer = welcomeSlide.find('.owl-item.active').find("[data-animation]");
            slideLayer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).addClass('animated ' + anim_name).css('opacity', '1');
            });
        });

        $("[data-delay]").each(function () {
            var anim_del = $(this).data('delay');
            $(this).css('animation-delay', anim_del);
        });

        $("[data-duration]").each(function () {
            var anim_dur = $(this).data('duration');
            $(this).css('animation-duration', anim_dur);
        });

        $('.testimonials-slider').owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            nav: true,
            navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1000
        });

        $('.medilife-gallery-area').owlCarousel({
            items: 4,
            margin: 0,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
    }

    // :: Magnific Popup Active Code

    if ($.fn.magnificPopup) {
        $('.gallery-img').magnificPopup({
            type: 'image'
        });
        $('.popup-video').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    }

    // :: MatchHeight Active Code
    if ($.fn.matchHeight) {
        $('.equalize').matchHeight({
            byRow: true,
            property: 'height'
        });
    }

    // :: CounterUp Active Code
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    }

    // :: ScrollUp Active Code
    if ($.fn.scrollUp) {
        $.scrollUp({
            scrollSpeed: 1000,
            easingType: 'easeInOutQuart',
            scrollText: '<i class="fa fa-angle-up" aria-hidden="true"></i>'
        });
    }

    // :: PreventDefault a Click
    $("a[href='#']").on('click', function ($) {
        $.preventDefault();
    });

    // :: wow Active Code
    if ($window.width() > 767) {
        new WOW().init();
    }
    
})(jQuery);


$(".pathology_inner").click(function(){
  $(".pathology_inner").removeClass("pathology_inner_active");
  $(".pathology_inner").removeClass("pathology_inner_first")
  // console.log("fff");
  $(".service_block").removeClass("service_block_show");
  $("."+this.id).addClass("service_block_show");
  $(this).addClass("pathology_inner_active");
  if($(window).width() < 768){
    var wear_sections = $("."+this.id).offset().top - 80;
    $('html, body').animate({scrollTop:wear_sections},500);
  }
  
});

// $(document).ready(function(){

// });




$('.news_slider').owlCarousel({
    loop:false,
    margin:30,
    navText: ['', ''],
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        480:{
            items:2,
            nav:true
        },
        769:{
            items:2,
            nav:true,
            loop:false,
            mouseDrag:false,
        },
        991:{
            items:3,
            nav:true,
            loop:false,
            mouseDrag:false,
        }
    }
})

$(".quick_link_slide_btn").on('click',function(){
    $(".quickLink_section").toggleClass('quickLink_section_active');
});


$(window).resize(function(){
    if($(window).width() > 768){
        $(".vertical-menu ul").css('display','block');
    }
});

$( ".sideMenu_btn" ).click(function() {
  $( ".vertical-menu ul" ).slideToggle( 500 ,function(){
    if($(".vertical-menu ul").is(':visible')){
    $( ".sideMenu_btn" ).addClass("toggle_active");
  }else{
    $( ".sideMenu_btn" ).removeClass("toggle_active");
  }
  });
  
});


$(".searchOutside .search_bar_floating .search_floating").on('click', function(event) {
    event.stopPropagation();
    $(".searchOutside .search_bar_floating").addClass("search_bar_floating_on");
    $(".search_floating").fadeOut(0);
})
$(".searchOutside .search_bar_floating").click(function(event) {
    event.stopPropagation();
});
$("body").click(function() {
    $(".searchOutside .search_bar_floating input").val("");
    $(".searchOutside .search_bar_floating").removeClass("search_bar_floating_on");
    $(".search_floating").fadeIn(0);
});


$(".more_text").on('click',function(){
    $(".rp_wrap").removeClass("rp_wrap_active");
    $(".more_text").fadeIn(0);
    $(this).parent(".rp_wrap").addClass("rp_wrap_active");
    $(this).fadeOut(0);

    var wear_sections = $(this).parent(".rp_wrap").offset().top - 100;
    $('html, body').animate({scrollTop:wear_sections},500);
});