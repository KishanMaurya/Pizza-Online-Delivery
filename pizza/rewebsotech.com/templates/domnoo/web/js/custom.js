/*
Copyright (c) 2018 
------------------------------------------------------------------
[Master Javascript]

Project:	Domnoo  - Responsive HTML Template

-------------------------------------------------------------------*/
(function($) {
    "use strict";
    var domnoo = {
        initialised: false,
        version: 1.0,
        mobile: false,
        init: function() {
            if (!this.initialised) {
                this.initialised = true;
            } else {
                return;
            }
            /*-------------- domnoo Functions Calling ---------------------------------------------------
            ------------------------------------------------------------------------------------------------*/
            this.RTL();
            this.nav();
            this.slider();
            this.cat_slider();
            this.review_slider();
            this.item_slider1();
            this.item_slider2();
            this.b_img_slider();
            this.blog_slider();
            this.thankfull_logo_slider();
            this.history_slider();
            this.popup_vid();
            this.filter_itm1();
            this.c_select();
            this.ofr_date_end();
            this.c_number();
            this.vid();
            this.gallery();
            this.filter1();
        },
        /*-------------- domnoo Functions definition ---------------------------------------------------
        ---------------------------------------------------------------------------------------------------*/
        RTL: function() {
            var rtl_attr = $("html").attr('dir');
            if (rtl_attr) {
                $('body').addClass("rtl");
            }
        },
        
        // Fixed Menu
        nav: function() {
            if ($('.nav-opener').length > 0) {
                var r_nav = $(".main-nav .nav>ul");
                $(".nav-opener").on("click", function() {
                    r_nav.slideToggle(500);
                    $(this).find('i').toggleClass('fa-bars fa-times');
                });
            }

            if ($(".btn-search").length) {
                $(".btn-search").on(".load", function(e) {
                    $(this).toggleClass('active');
                    $('.search-box').toggleClass('active');
                    e.preventDefault();
                });
            };
         
            if($(window).width() < 1024 ) {
                $("nav").on("click", ".drop", function() {
                    $(this).children(".drop-down").toggle();
                });
            };

			
			
        },
		//Banner Slider2
        slider: function() {
        	if ($('.slider').length > 0) {
	           var slider = $('.slider');
               slider.owlCarousel({
	           		margin:0,
					loop:true,
					nav:true,
                    center: true,
					dots: false,
					autoplay:true,
                    autoplayTimeout: 8000,
                    mouseDrag: false,
					autoplayHoverPause:false,
					navText: ['<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow"></i>' ],
					items:1
				});

               // add animate.css class(es) to the elements to be animated
                  function setAnimation ( _elem, _InOut ) {
                    // Store all animationend event name in a string.
                    // cf animate.css documentation
                    var animationEndEvent = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

                    _elem.each ( function () {
                      var $elem = $(this);
                      var $animationType = 'animated ' + $elem.data( 'animation-' + _InOut );

                      $elem.addClass($animationType).one(animationEndEvent, function () {
                        $elem.removeClass($animationType); // remove animate.css Class at the end of the animations
                      });
                    });
                  }

                // Fired before current slide change
                  slider.on('change.owl.carousel', function(event) {
                      var $currentItem = $('.owl-item', slider).eq(event.item.index);
                      var $elemsToanim = $currentItem.find("[data-animation-out]");
                      setAnimation ($elemsToanim, 'out');
                  });

                // Fired after current slide has been changed
                  var round = 0;
                  slider.on('changed.owl.carousel', function(event) {

                      var $currentItem = $('.owl-item', slider).eq(event.item.index);
                      var $elemsToanim = $currentItem.find("[data-animation-in]");
                    
                      setAnimation ($elemsToanim, 'in');
                  })
                  
                  slider.on('translated.owl.carousel', function(event) {
                    // console.log (event.item.index, event.page.count);
                    
                      if (event.item.index == (event.page.count - 1))  {
                        if (round < 1) {
                          round++
                          // console.log (round);
                        } else {
                          slider.trigger('stop.owl.autoplay');
                          var owlData = slider.data('owl.carousel');
                          owlData.settings.autoplay = false; //don't know if both are necessary
                          owlData.options.autoplay = false;
                          slider.trigger('refresh.owl.carousel');
                        }
                      }
                  });
        		
        	}
        },
        // cat_slider
         cat_slider: function(){
            if ($('.cat-slider').length > 0) {
                $('.cat-slider').owlCarousel({
                    margin:0,
                    loop:true,
                    nav:true,
                    dots: false,
                    autoplay:false,
                    navText: ['<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow"></i>' ],
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:7
                        }
                    }
                });
            }
         },
        // review_slider
         review_slider: function(){
            if ($('.review_slider').length > 0) {
                $('.review_slider').owlCarousel({
                    margin:30,
                    loop:true,
                    nav:true,
                    dots: false,
                    autoplay:false,
                    navText: ['<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow"></i>' ],
                    responsive:{
                        0:{
                            items:1
                        },
                        800:{
                            items:2
                        },
                        1000:{
                            items:2
                        }
                    }
                });
            }
         },
        // item-slider1
         item_slider1: function(){
            if ($('.item-slider1').length > 0) {
                $('.item-slider1').owlCarousel({
                    margin:30,
                    loop:true,
                    nav:true,
                    dots: false,
                    autoplay:false,
                    navText: ['<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow"></i>' ],
                    responsive:{
                        0:{
                            items:1
                        },
                        575:{
                            items:2
                        },
                        850:{
                            items:3
                        },
                        1000:{
                            items:3
                        },
                        1200:{
                            items:4
                        },
                        1300:{
                            items:5
                        },
                        1600:{
                            items:6
                        }
                    }
                });
            }
         },
        // item-slider2
         item_slider2: function(){
            if ($('.item-slider2').length > 0) {
                $('.item-slider2').owlCarousel({
                    margin:30,
                    loop:true,
                    nav:true,
                    dots: false,
                    autoplay:false,
                    navText: ['<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow"></i>' ],
                    responsive:{
                        0:{
                            items:1
                        },
                        480:{
                            items:2
                        },
                        600:{
                            items:2
                        },
                        800:{
                            items:3
                        },
                        1200:{
                            items:4
                        }
                    }
                });
            }
         },
        // b_img_slider
         b_img_slider: function(){
            if ($('.b_img_slider').length > 0) {
                $('.b_img_slider').owlCarousel({
                    margin:30,
                    loop:true,
                    nav:true,
                    dots: false,
                    autoplay:false,
                    navText: ['<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow"></i>' ],
                    responsive:{
                        0:{
                            items:1
                        }
                    }
                });
            }
         },
        // blog_slider
         blog_slider: function(){
            if ($('.blog-slider').length > 0) {
                $('.blog-slider').owlCarousel({
                    margin:30,
                    loop:true,
                    nav:true,
                    dots: false,
                    autoplay:false,
                    navText: ['<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow"></i>' ],
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:2
                        },
                        1000:{
                            items:2
                        }
                    }
                });
            };

            if ($('.blog-slider1').length > 0) {
                $('.blog-slider1').owlCarousel({
                    margin:10,
                    loop:true,
                    nav:true,
                    autoplaySpeed: 2000,
                    dots: false,
                    autoplay:true,
                    navText: ['<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow"></i>' ],
                    responsive:{
                        0:{
                            items:1
                        },
                        801:{
                            items:2
                        },
                        1240:{
                            items:3
                        },
                        1700:{
                            items:4
                        }
                    }
                });
            };
         },
        // thankfull_logo_slider
         thankfull_logo_slider: function(){
            if ($('.th-slider').length > 0) {
                $('.th-slider').owlCarousel({
                    margin:30,
                    loop:true,
                    nav:false,
                    dots: false,
                    autoplaySpeed: 2000,
                    autoplay:true,
                    navText: ['<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow"></i>' ],
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:2
                        },
                        768:{
                            items:2
                        },
                        992:{
                            items:3
                        },
                        1200:{
                            items:4
                        }
                    }
                });
            }
         },
        // history_slider
         history_slider: function(){
         	if ($('.history_slider').length > 0) {
         		$('.history_slider').owlCarousel({
					margin:30,
					items:4,
                    loop:true,
					nav:true,
					dots: false,
                    autoplay:true,
					navText: ['<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow"></i>' ],
					responsive:{
					    0:{
					        items:1
                        },
					    600:{
					        items:2,
                            center:true,
                            loop:true,
                            autoWidth:true
					    },
                        1000:{
                            items:2,
                            center:false,
                            loop:true
                        },
                        1100:{
                            items:2,
                            center:true,
                            loop:true
                        },
                        1400:{
                            items:3,
                            center:true,
                            loop:true
                        },
					    1601:{
					        items:3
                        }
					}
				});
         	}
         },
        //popup_vid
        popup_vid: function() {
            if ($('.video').length > 0) {
                $('.video').magnificPopup({
                      disableOn: 700,
                      type: 'iframe',
                      mainClass: 'mfp-with-zoom',
                      removalDelay: 300,
                      preloader: false,
                      fixedContentPos: false,
                      zoom: {
                                enabled: true,
                                duration: 400,
                                easing: 'ease-in-out',
                                opener: function(openerElement) {
                                    return openerElement.is('a') ? openerElement : openerElement.find('img');
                                }
                            }
                });
            }
        },
        //filter_itm1
        filter_itm1: function() {
            if ($('.list-grid-sec').length > 0) {
                // -------- Initialize ----------//
               mixitup('#grid', {
                  load: {
                    filter: '.pizza'
                  },
                    animation: {
                    duration: 700
                  },
                  classNames: {
                    block: 'tab-flr-btn',
                    elementFilter: 'btn-flr',
                    elementSort: 'sort-btn'
                  },
                  selectors: {
                    target: '.items-for-flr'
                  }
              });

                var  v1 = $('.list-btn');
                var  v2 = $('.list-grid-sec');
                var  v3 = $('.grid-btn');

                v1.on("click", function(e) {
                    $(v2).removeClass('l-view');
                    $(v3).removeClass('active');
                    $(this).addClass('active');
                    e.preventDefault();
                });
                    
                 v3.on("click", function(e) {
                    $(v2).addClass('l-view');
                    $(v1).removeClass('active');
                    $(this).addClass('active');
                    e.preventDefault();
                });

            }
        },
        // c_select
        c_select: function() {
            if ($('.c_select').length > 0) {
                $('select.c_select').niceSelect();
            }
        },
        // ofr_date_end
        ofr_date_end: function() {
            if ($("#ofr_end").length) {
                var month =  new Date();
                var nextMonth =  month.getMonth() + 2;
                var Year =  month.getFullYear();
                var month = new Array();
                month[0] = "January";
                month[1] = "February";
                month[2] = "March";
                month[3] = "April";
                month[4] = "May";
                month[5] = "June";
                month[6] = "July";
                month[7] = "August";
                month[8] = "September";
                month[9] = "October";
                month[10] = "November";
                month[11] = "December";
                var n = month[nextMonth];
                //console.log(n);
                $('#ofr_end').dsCountDown({
                    endDate: new Date( n +"24,"+ Year +" 23:59:00") 
                });
            }
        },
        // c_number
        c_number: function() {
            if ($('.quantity').length) {
                $('<div class="quantity-button quantity-up"><i class="flaticon-add"></i></div>').insertBefore('.quantity input');
                $('<div class="quantity-button quantity-down"><i class="flaticon-substract"></i></div>').insertAfter('.quantity input');
                
                $('.quantity').each(function() {
                  var spinner = $(this),
                    input = spinner.find('input[type="number"]'),
                    btnUp = spinner.find('.quantity-up'),
                    btnDown = spinner.find('.quantity-down'),
                    min = input.attr('min'),
                    max = input.attr('max');

                    btnUp.on("click", function() {
                      var oldValue = parseFloat(input.val());
                      if (oldValue >= max) {
                        var newVal = oldValue;
                      } else {
                        var newVal = oldValue + 1;
                      }
                      spinner.find("input").val(newVal);
                      spinner.find("input").trigger("change");
                    });

                    btnDown.on("click", function() {
                      var oldValue = parseFloat(input.val());
                      if (oldValue <= min) {
                        var newVal = oldValue;
                      } else {
                        var newVal = oldValue - 1;
                      }
                      spinner.find("input").val(newVal);
                      spinner.find("input").trigger("change");
                    });

                });
            }
        },
        // vid
        vid: function() {
            if ($('.video').length) {
                    $('.video').magnificPopup({
                      disableOn: 700,
                      type: 'iframe',
                      mainClass: 'mfp-with-zoom',
                      removalDelay: 300,
                      preloader: false,
                      fixedContentPos: false,
                      zoom: {
                                enabled: true,
                                duration: 400,
                                easing: 'ease-in-out',
                                opener: function(openerElement) {
                                    return openerElement.is('a') ? openerElement : openerElement.find('i');
                                }
                            }
                    });
            }
        },
        // vid
        gallery: function() {
            if ($('.image-gal').length) {
                    $('.image-gal').magnificPopup({
                        type: 'image',
                      mainClass: 'mfp-with-zoom', 
                      gallery:{
                                enabled:true
                            },

                      zoom: {
                        enabled: true, 

                        duration: 300, // duration of the effect, in milliseconds
                        easing: 'ease-in-out', // CSS transition easing function

                        opener: function(openerElement) {

                          return openerElement.is('img') ? openerElement : openerElement.find('i');
                      }
                    }

                    });

            }
        },
        // vid
        filter1: function() {
            if ($('#filter_itm1').length) {
                var filter_itm1 = $('#filter_itm1');
                var slider_flr = $('.slider-flr');
                    filter_itm1.slick({
                     dots: false,
                      infinite: false,
                      speed: 300,
                      prevArrow:"<span class='slick_prev pull-left'><i class='flaticon-right-arrow'></i></span>",
                      nextArrow:"<span class='slick_next pull-right'><i class='flaticon-left-arrow' aria-hidden='true'></i></span>",
                      slidesToShow: 6,
                      slidesToScroll: 6,
                      responsive: [
                        {
                          breakpoint: 1500,
                          settings: {
                            slidesToShow: 5,
                            slidesToScroll: 2,
                            infinite: true
                          }
                        },
                        {
                          breakpoint: 1300,
                          settings: {
                            slidesToShow: 4,
                            slidesToScroll: 2,
                            infinite: true
                          }
                        },
                        {
                          breakpoint: 1024,
                          settings: {
                            slidesToShow: 3,
                            slidesToScroll: 2,
                            infinite: true
                          }
                        },
                        {
                          breakpoint: 800,
                          settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                          }
                        },
                        {
                          breakpoint: 600,
                          settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                          }
                        },
                        {
                          breakpoint: 570,
                          settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                          }
                        }
                        // You can unslick at a given breakpoint now by adding:
                        // settings: "unslick"
                        // instead of a settings object
                      ]
                    });


                var filtered = true;
                var f_btn = $('.btn-filter-wrap');
                f_btn.on('click', '.filterer', function(){
                    // active-btn
                  f_btn.find(".filterer").removeClass('active-btn');
                  $(this).addClass('active-btn');



                  var whichID = $(this).attr('id');
                  // console.log(whichID);
                  if(whichID != 'js-filter-all'){
                    if( slider_flr.hasClass('filtered') ){
                      // slider_flr.removeClass('filtered');
                      filter_itm1.slick('slickUnfilter');
                      filter_itm1.slick('slickGoTo',0);
                      filtered = true;
                    } else{
                      slider_flr.addClass('filtered');
                    }
                    if(whichID === 'js-filter-0'){
                      if (filtered === true) {
                        filter_itm1.slick('slickFilter','.js-filter-chicken');
                        filter_itm1.slick('slickGoTo',0);
                        filtered = true;
                      } else {
                        filter_itm1.slick('slickUnfilter');
                        filter_itm1.slick('slickGoTo',0);
                        filtered = true;
                      }
                    }
                    if(whichID === 'js-filter-1'){
                      if (filtered === true) {
                        filter_itm1.slick('slickFilter','.js-filter-meats');
                        filter_itm1.slick('slickGoTo',0);
                        filtered = true;
                      } else {
                        filter_itm1.slick('slickUnfilter');
                        filter_itm1.slick('slickGoTo',0);
                        filtered = true;
                      }
                    } else if(whichID === 'js-filter-2'){
                      if (filtered === true) {
                        filter_itm1.slick('slickFilter','.js-filter-populars');
                        filter_itm1.slick('slickGoTo',0);
                        filtered = true;
                      } else {
                        filter_itm1.slick('slickUnfilter');
                        filter_itm1.slick('slickGoTo',0);
                        filtered = true;
                      }
                    } else if(whichID === 'js-filter-3'){
                        if (filtered === true) {
                          filter_itm1.slick('slickFilter','.js-filter-veggie');
                          filter_itm1.slick('slickGoTo',0);
                          filtered = true;
                        } else {
                          filter_itm1.slick('slickUnfilter');
                          filter_itm1.slick('slickGoTo',0);
                          filtered = true;
                        }
                    } else if(whichID === 'js-filter-4'){
                        if (filtered === true) {
                          filter_itm1.slick('slickFilter','.js-filter-burgers');
                          filter_itm1.slick('slickGoTo',0);
                          filtered = true;
                        } else {
                          filter_itm1.slick('slickUnfilter');
                          filter_itm1.slick('slickGoTo',0);
                          filtered = true;
                        }
                    }
                  } else{
                      slider_flr.removeClass('filtered');
                      filter_itm1.slick('slickUnfilter');
                      filter_itm1.slick('slickGoTo',0);
                  }

                });
                
            $( '#js-filter-0' ).trigger( "click" );
            };

        }
    };
    $(document).ready(function() {
        domnoo.init();
    });
    
    //On load
     $(window).on('load', function() {
        initPreLoader();
         var load;
         $('body').addClass('load');
     });
    
    // PreLoader init
    function initPreLoader() {
        $('.loader_wrapper').delay(1000).fadeOut();
    };

    // theme switcher
    if ($(".theme-menu").length) {
        $('.btn-clr').on('click', function(){
            $(this).toggleClass('btn-clr-clicked');
            $('.theme-menu').toggleClass('show-sidebar hide-sidebar');
        });
        $('#style-switcher').on('click', 'li', function(){
            var path = $(this).data('path');
            $('#ui-theme-color').attr('href', path);
            var url = $(this).data('url');
                $(".btm-style img").each(function(index){
                    var src = $(this).attr("src")
                    // console.log(src);
                    var photoName = src.substr(src.lastIndexOf("/"));
                    $(this).attr("src", url + photoName)
                });
        });
    };

	// Window Scroll
    $(window).on('scroll', function() {
        //Go to top
        if ($(this).scrollTop() > 100) {
            $('#go_to_top').addClass('goto');
        } else {
            $('#go_to_top').removeClass('goto');
        }

    });

     $("#go_to_top").on("click", function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false
    });

})(jQuery);