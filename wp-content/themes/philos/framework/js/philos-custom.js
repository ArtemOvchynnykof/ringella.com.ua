
// Philos - Responsive Ecommerce Html Template
// Created by Nileforest*/
/*
- Navigation Dropdown Function
- Sticky Header Function
- Elements
	(1) Sidebar Menu Function
	(2) Search Overlay Menu
	(3) Tabs (Tabs With OwlCarousel)
	(4) Tooltip Function
	(5) Backgrounds Image (Slider, Section, etc..)
	(6) Newsletter Popup
	(7) Accordian
	(8) Ajax add to wishlist
	(9) Select Box
	(10) Toggle
	(11) Product Quantity '+', '-'
	(12) Add / Remove class
	(13) Wishlist / Compare Text
- Grid/ List
- Loader
- Back To Top
- Carousel (Owl)
- Main Slider ( Owl Slider )
- Portfolio
- Accordion
- Tabs
- Toggle
- MagnificPopup
*/
(function ($) {
    "use strict";

    var $window = $(window);
    var $document = $(document);
    var winWidthSm = 991;

   
    // ---------------------------------------------------------------------------------------------------------------------------->
    // - Navigation Dropdown Function   ||-----------
    // ---------------------------------------------------------------------------------------------------------------------------->
    $(function () {
        //Checks if li has sub (ul) and adds class for toggle icon - just an UI
        $('.mega-menu-wrap > ul > li:has( > ul)').addClass('menu-dropdown-icon');
        // Dropdown Arrow Added
        $('.mega-menu-wrap > ul > li.menu-dropdown-icon').append('<div class="dropworn-arrow"></div>');
        // sale label
        $('.mega-menu-wrap > ul > li.mega-sale-label > a').append('<div class="nav-label-sale"></div>');
        // New label
        $('.mega-menu-wrap > ul > li.mega-new-label > a').append('<div class="nav-label-new"></div>');
        //Checks if drodown menu's li elements have anothere level (ul), if not the dropdown is shown as regular dropdown, not a mega menu
        $('.mega-menu-wrap > ul > li > ul:not(:has(ul))').addClass('normal-sub');

        $('.mega-menu-wrap > ul > li:has( > ul)').each(function (indx) {
            var sub_menu = $(this).find('> ul.mega-sub-menu').html();
            $(this).find('> ul.mega-sub-menu').html('<div class="container"><div class="row">' + sub_menu + '</ul></div>');
        });
    });
    // ---------------------------------------------------------------------------------------------------------------------------->
    // - Sticky Header Function  ||-----------
    // ---------------------------------------------------------------------------------------------------------------------------->  
	
	$window.scroll(function () {
		//  var stickyOffset = $('#header-sticky').offset().top;
		var stickyOffset = $('.header-topbar').outerHeight();
		if ($(window).scrollTop() >= stickyOffset) {
			$('#header-sticky').addClass('fixed');
		}
		else {
			$('#header-sticky').removeClass('fixed');
		}
	});

    // "Sticky" Desktop Device Enable ---- small Device Disable
    $window.bind('DOMContentLoaded load resize', function () {
        var headerInnerHeight = $(".header").innerHeight(),
            winInnerWidth = $window.innerWidth();

        if (winInnerWidth <= parseInt(winWidthSm,10)) {
            $('#header-sticky').addClass('no-stick');
            $('.header').css("height", "auto");
        }
        else {
            $('#header-sticky').removeClass('no-stick');
            $('.header').css("height", headerInnerHeight);
        };
    });
    // ---------------------------------------------------------------------------------------------------------------------------->
    // - Elements  ||-----------
    // ---------------------------------------------------------------------------------------------------------------------------->
    $(function () {

        // (1). Sidebar Menu Function (Cart Menu) =======================>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
        var $menuSidebar = $('.sidebar-right');
        var $menusidebarNav = $('#sidebar_toggle_btn');
        var $menuSidebarclose = $('#sidebar_close_icon');
        var $menuSidebarOverlay = $('.sidebar_overlay');
        var $menuSidebarOverlayActive = $('.sidebar_overlay_active');

        /*sidebar menu navigation icon toggle*/
        $document.on('click', '#sidebar_toggle_btn', function () {
            //event.preventDefault();									  
            $(this).toggleClass('active');
            $menuSidebar.toggleClass('sidebar-open');
            $menuSidebarOverlay.toggleClass('sidebar_overlay_active');

        });

        /*sidebar menu close icon*/
        $menuSidebarclose.on('click', function () {
            $menusidebarNav.removeClass('active');
            $menuSidebar.removeClass('sidebar-open');
            $menuSidebarOverlay.removeClass('sidebar_overlay_active');
        });

        /*Overlay Active*/
        $document.on('click touchstart', '.sidebar_overlay_active', function () {
            $menusidebarNav.toggleClass('active');
            $menuSidebar.toggleClass('sidebar-open');
            $menuSidebarOverlay.toggleClass('sidebar_overlay_active');
        });



        // (2). Search Overlay Menu =======================>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
        $(function () {
            var searchOverlayMenuBtn = $('#search-overlay-menu-btn'),
                searchMenuClose = $('.search-overlay-menu, .search-overlay-menu .search-overlay-close');

            searchOverlayMenuBtn.on('click', function (event) {
                $('.search-overlay-menu').addClass('open');
                $('.search-overlay-menu > form > input[type="search"]').focus();
            });
            searchMenuClose.on('click keyup', function (event) {
                if (event.target == this || event.target.className == 'search-overlay-close' || event.keyCode == 27) {
                    $(this).removeClass('open');
                }
            });
        });


        // (3). Tabs (Tabs With OwlCarousel) =======================>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/        		
		$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($(e.target).attr('href'))
                .find('.product-slider > ul.products')
                .owlCarousel('invalidate', 'width')
                .owlCarousel('update')
        })	

        // (4). Tooltip Function =======================>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
        $('.js_tooltip').tipr();
		
        // (5) Backgrounds Image (Slider, Section, etc..) ===========>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
        var pageSection = $('.slide-bg-image, .bg-image');
        pageSection.each(function (indx) {
            if ($(this).attr("data-background-img")) {
                $(this).css("background-image", "url(" + $(this).data("background-img") + ")");
            }
            if ($(this).attr("data-bg-position-x")) {
                $(this).css("background-position", $(this).data("bg-position-x"));
            }
            if ($(this).attr("data-height")) {
                $(this).css("height", $(this).data("height") + 'px');
            }
        });

        // (6) Newsletter Popup =====================================>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
        if ($window.width() > parseInt(winWidthSm,10)) {
            var nlpopup_expires = $("nlpopup").data("expires");
			var nlpopup_time = parseInt(1500,10);
            var nlpopup_delay = $("nlpopup").data("delay") * nlpopup_time;

            var open_nlpopup = function () {
                var topoffset = $document.scrollTop(),
                    viewportHeight = $window.height(),
                    $popup = $('#nlpopup');
                var calculatedOffset = (topoffset + (Math.round(viewportHeight / 2))) - (Math.round($popup.outerHeight() / 2));

                if (calculatedOffset <= parseInt(40,10)) {
                    calculatedOffset = parseInt(40,10);
                }

                $popup.css('top', calculatedOffset);
                $('#nlpopup, #nlpopup_overlay').fadeIn(500);
            };

            $('.nlpopup_close, #nlpopup_overlay').on('click', function (e) {
                $.cookie('nlpopup', 'closed', { expires: nlpopup_expires, path: '/' });
                $('#nlpopup, #nlpopup_overlay').fadeOut(200);
                e.preventDefault();
            });

            if ($.cookie('nlpopup') != 'closed') {
                setTimeout(open_nlpopup, nlpopup_delay);
            }
        };

        // (7) Accordian ======================================>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/	         
	   $('.widget_nav_menu .menu > li:has( > ul )').addClass('main-accordionIcon');
	   $('.widget_nav_menu .menu > li:has( > ul ) > a').after("<span class='jq-accordionIcon'></span>");

       $('.widget_nav_menu .menu > li li:has( > ul ) > a').after("<span class='jq-accordionIcon'></span>");        

        /* Accordian Sub Childern "ul" Hide */
        $('.widget_nav_menu .menu li ul').hide();

        /* Accordian */
        $('.widget_nav_menu .menu li .jq-accordionIcon').on('click', function (e) {
            $('.widget_nav_menu .menu li a').each(function (i) {
                if ($(this).next().next().is("ul") && $(this).next().next().is(":visible")) {					
                    if ($(this).next().next().is("ul.sub-menu") && $(this).next().next().is(":hidden")) {                      
					  $(this).next().slideUp();
                    }
                }
            });		
			
			$(".widget_nav_menu .menu ul ul").slideUp();
			
            var e = $(this);
            if (e.next().is("ul") && e.next().is(":visible")) {
                e.next().slideUp();
            }
            else {
				if( $('.widget_nav_menu .menu > li:has( > ul )').hasClass("main-accordionIcon is-active"))
				{
					 if($(this).closest('.main-accordionIcon.is-active').children('.jq-accordionIcon').next().is(":visible"))
					 {						
					 }else{						 
					 	$('.widget_nav_menu .menu > li.main-accordionIcon.is-active').find('> ul').slideUp();
						$('.widget_nav_menu .menu > li.main-accordionIcon.is-active').removeClass('is-active');
					}
				}
                e.next().slideDown();
            }
        });

        /* Accordian Icon */
        var accordionHeader = $('.widget_nav_menu .menu ul > li > .jq-accordionIcon');		
        $('.widget_nav_menu .menu li .jq-accordionIcon').on('click', function (e) {																 
            if ($(this).parent('li').hasClass('is-active')) {
                $(this).parent('li').removeClass('is-active');
            }
            else {
                /* close other content */
                $(accordionHeader).parent('li').not(this).removeClass('is-active');				
                $(this).parent('li').addClass('is-active');
            }
        });

        // (8) Ajax add to wishlist ======================================>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
        $(function () {
			$(document).on('added_to_wishlist removed_from_wishlist', function () {
			var counter = $('.countTip');
			$.ajax({
				url: yith_wcwl_l10n.ajax_url,
					data: {
						action: 'yith_wcwl_update_wishlist_count'
					},
					dataType: 'json',
					success: function (data) {
						counter.html(data.count);
						
					},
					beforeSend: function () {
						counter.block();
					},
					complete: function () {
						counter.unblock();						
						$('.product-wishlist-button').each(function () {							
							var wishlist_text = $(this).find("div.show a").text();
							$(this).attr('data-tip',wishlist_text);							
						});
					}
				});
			});		
		});

        // (9) Select Box ======================================>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
        $(function () {
            $('.nice-select-box').niceSelect();
			$('.variations_form select').niceSelect();			
        });

        // (10) Toggle  ======================================>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
        /*Slide Toggle*/       
        $('.slide-toggle-btn').on('click', function (e) {
            $('#' + $(this).data('toggleTarget')).slideToggle(300);
        });

        //fade Toggle
        $('.fade-toggle-btn').on('click', function (e) {
            $('#' + $(this).data('toggleTarget')).fadeToggle(300);
        });

        // (11) Product Quantity '+', '-' ======================================>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>*/
        $(function () {
            var qty_min = $('.qty').attr("min");
            var qty_max = $('.qty').attr("max");

            $(".quantityPlus").on('click', function () {
                var currentVal = parseInt($(this).next(".qty").val(), 10);
                var str = $("p:first").text();				
                if (currentVal != qty_max) {
                    $(this).next(".qty").val(currentVal + 1);
                }
            });

            $(".quantityMinus").on('click', function () {
                var currentVal = parseInt($(this).prev(".qty").val(), 10);
                if (currentVal != 1) {
                    if (currentVal != qty_min) {
                        $(this).prev(".qty").val(currentVal - 1);
                    }
                }
            });

            $(".quantity-btn").on('click', function () {
                $('.woocommerce-cart-form input[name="update_cart"]').prop('disabled', false);
            });          

        });
		
        // (12) Add / Remove class ==============================================================================		
		$('.woocommerce-ordering select').addClass('nice-select-box');		
		$('.single-product.woocommerce.woocommerce-page').find('div.product').find('.clear').remove();
		var total_product_category = $('li.product-category').length;
		
		$( "li.product-category" ).each(function( index ) {
			if (index === total_product_category - 1) {
				$(this).after("<div class='clear'></div>");
			}
		});
		
		
		// (13) Wishlist / Compare Text
		$(function () {
			$('.product-wishlist-button').each(function () {
				
				var wishlist_text = $(this).find("div.show a").text();
				$(this).attr('data-tip',wishlist_text);
				
        	});
			$('.product-compare-button').each(function () {				
				var compare_text = $(this).find("a").text();
				$(this).attr('data-tip',compare_text);
				
        	});
		});

        // ---------------------------------------------------------------------------------------------------------------------------->
        // - Grid/ List   ||-----------
        // ---------------------------------------------------------------------------------------------------------------------------->
		$(function () {
		    /*Grid/List View*/
		    var productListBtn = $('.product-list-switcher');
		    var productGridBtn = $('.product-grid-switcher');
		    var productItemsWrap = $('.product-list-item');

		    productListBtn.on('click', function (event) {
		        event.preventDefault();
		        productItemsWrap.addClass('product-list-view');
		        productListBtn.addClass('product-view-icon-active')
		        productGridBtn.removeClass('product-view-icon-active')
		    });
		    productGridBtn.on('click', function (event) {
		        event.preventDefault();
		        productItemsWrap.removeClass('product-list-view');
		        productListBtn.removeClass('product-view-icon-active')
		        productGridBtn.addClass('product-view-icon-active')
		    });
		});
		
		 // ---------------------------------------------------------------------------------------------------------------------------->
		// - Loader   ||-----------
		// ---------------------------------------------------------------------------------------------------------------------------->		
		$(function () {
			$('body').jpreLoader({
				loaderVPos: '0%'			
			});
		});	
		
		// ---------------------------------------------------------------------------------------------------------------------------->
		// - Back To Top   ||-----------
		// ---------------------------------------------------------------------------------------------------------------------------->
		// browser window scroll (in pixels) after which the "back to top" link is shown
		var  offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
			offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
			scroll_duration = 700,
		//grab the "back to top" link
			$back_to_top = $('.back-top');
			
		$(window).scroll(function(){
			( $(this).scrollTop() > parseInt(offset,10) ) ? $back_to_top.addClass('visible') : $back_to_top.removeClass('visible visible-fade-out');
			if( $(this).scrollTop() > parseInt(offset_opacity,10) ) { 
				$back_to_top.addClass('visible-fade-out');
			}
		});
	
		//smooth scroll to top
		$back_to_top.on('click', function(event){
			event.preventDefault();
			$('body,html').animate({
				scrollTop: 0 ,
				}, parseInt(scroll_duration,10)
			);
		});
	 });
	
    // ---------------------------------------------------------------------------------------------------------------------------->
    // - Carousel (Owl)  ||-----------
    // ---------------------------------------------------------------------------------------------------------------------------->

    $(function () {

        //Product Item 5
        $('.product-item-5,.product-slider ul.columns-5').owlCarousel({
            items: 5,
            loop: false,
            margin: 30,
            autoplay: false,
            autoplayHoverPause: true,
            singleItem: true,
            dots: false,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: { items: 1 },
                320: { items: 1 },
                480: { items: 2 },
                775: { items: 3 },
                991: { items: 4 },
                1170: { items: 5 }
            }
        });

        //Product Item 4
        $('.product-item-4,.product-slider ul.columns-4').owlCarousel({
            items: 4,
            loop: false,
            margin: 30,
            autoplay: false,
            autoplayHoverPause: true,
            singleItem: true,
            dots: false,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: { items: 1 },
                320: { items: 1 },
                480: { items: 2 },
                775: { items: 2 },
                991: { items: 3 },
                1170: { items: 4 }
            }
        });

        //Product Item 3
        $('.product-item-3,.product-slider ul.columns-3').owlCarousel({
            items: 3,
            loop: false,
            margin: 30,
            autoplay: false,
            autoplayHoverPause: true,
            singleItem: true,
            dots: false,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: { items: 1 },
                480: { items: 1 },
                775: { items: 2 },
                991: { items: 3 },
                1170: { items: 3 }
            }
        });

        //Product Item 2
        $('.product-item-2,.product-slider ul.columns-2').owlCarousel({
            items: 2,
            loop: false,
            margin: 30,
            autoplay: false,
            autoplayHoverPause: true,
            singleItem: true,
            dots: false,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: { items: 1 },
                480: { items: 1 },
                775: { items: 1 },
                991: { items: 2 },
                1170: { items: 2 }
            }
        });

        //Product Item 1
        $('.product-item-1,.product-slider ul.columns-1').owlCarousel({
            items: 1,
            loop: false,
            margin: 30,
            autoplay: false,
            autoplayHoverPause: true,
            singleItem: true,
            dots: false,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: { items: 1 },
                480: { items: 1 },
                775: { items: 1 },
                991: { items: 1 },
                1170: { items: 1 }
            }
        });
       
        // testimonials Carousel
        $('.testimonials-carousel').owlCarousel({
            items: 1,
            loop: true,
            margin: 0,
            slideSpeed: 300,
            autoplay: true,
            autoplayHoverPause: true,
            singleItem: true,
            dots: false,
            nav: false,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            nimateIn: 'fadeIn',
            animateOut: 'fadeOut'
        });

        //Brand Logo Carousel
        $('.brand-logo-carousel').owlCarousel({
            items: 7,
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayHoverPause: true,
            singleItem: true,
            dots: false,
            nav: false,
            transitionStyle: true,
            responsive: {
                0: { items: 1 },
                250: { items: 1 },
                320: { items: 2 },
                480: { items: 3 },
                775: { items: 4 },
                991: { items: 6 },
                1170: { items: 7 }
            }
        });
        //Brand Logo Carousel
        $('.brand-logo-carousel-5').owlCarousel({
            items: 5,
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayHoverPause: true,
            singleItem: true,
            dots: false,
            nav: false,
            transitionStyle: true,
            responsive: {
                0: { items: 1 },
                250: { items: 1 },
                320: { items: 2 },
                480: { items: 3 },
                768: { items: 4 },
                1000: { items: 5 },
                1170: { items: 5 }
            }
        });
        //Brand Logo Carousel
        $('.brand-logo-carousel-6').owlCarousel({
            items: 6,
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayHoverPause: true,
            singleItem: true,
            dots: false,
            nav: false,
            transitionStyle: true,
            responsive: {
                0: { items: 1 },
                250: { items: 1 },
                320: { items: 2 },
                480: { items: 3 },
                768: { items: 4 },
                1000: { items: 6 },
                1170: { items: 6 }
            }
        });
        //Brand Logo Carousel
        $('.brand-logo-carousel-7').owlCarousel({
            items: 7,
            loop: true,
            margin: 0,
            autoplay: true,
            autoplayHoverPause: true,
            singleItem: true,
            dots: false,
            nav: false,
            transitionStyle: true,
            responsive: {
                0: { items: 1 },
                250: { items: 1 },
                320: { items: 2 },
                480: { items: 3 },
                768: { items: 4 },
                1000: { items: 7 },
                1170: { items: 7 }
            }
        });
		
		//Product Page Thumbnails		
		 $('.flex-control-thumbs').owlCarousel({
            items: 4,
            loop: false,
            margin: 0,
            autoplay: false,
            autoplayHoverPause: true,
            singleItem: true,
            dots: false,
            nav: true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: { items: 1 },
                320: { items: 1 },
                480: { items: 2 },
                775: { items: 2 },
                991: { items: 3 },
                1170: { items: 4 }
            }
        });
    });
	
	 // ---------------------------------------------------------------------------------------------------------------------------->
    // - Main Slider ( Owl Slider )  ||-----------
    // ---------------------------------------------------------------------------------------------------------------------------->
    $document.ready(function () {

        var owlMainSlider = $('#owl-main-slider');
        owlMainSlider.owlCarousel({
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            singleItem: true,
            dots: false,
            nav: true,
            items: 1,
            loop: true,
            autoHeight: true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: {
                    nav: false,
                    dots: true
                },
                600: {
                    nav: false,
                    dots: true
                },
                1000: {
                    nav: true,
                    dots: false
                }
            }

        });

    });
	 // ---------------------------------------------------------------------------------------------------------------------------->
    // - Portfolio  ||-----------
    // ---------------------------------------------------------------------------------------------------------------------------->
	$window.load(function () {	
        containerGridMasonry();
	});
	
	$document.ready(function () {
		containerGridMasonry();	 
	});

    function containerGridMasonry() {
        // ISOTOPE MASONRY ELEMENT  ||--------------
        var container = jQuery('.container-masonry');
        container.imagesLoaded(function () {
            container.isotope({
                itemSelector: '.nf-item',
                layoutMode: 'masonry',
                masonry: {
                    columnWidth: 0,
                    gutter: 0
                },
            });
        });

        // bind filter button click
        jQuery('.container-filter').on('click', '.categories', function () {
            var filterValue = jQuery(this).attr('data-filter');
            container.isotope({ filter: filterValue });
        });

        // ISOTOPE GRID ELEMENT  ||--------------
        var container2 = jQuery('.container-grid');
        container2.imagesLoaded(function () {
            container2.isotope({
                itemSelector: '.nf-item',
                layoutMode: 'fitRows'
            });
        });

        // bind filter categories click
        jQuery('.container-filter').on('click', '.categories', function () {
            var filterValue = jQuery(this).attr('data-filter');
            container2.isotope({ filter: filterValue });
        });

        // change active class on categories
        jQuery('.categories-filter').each(function (i, buttonGroup) {
            var buttonGroup = jQuery(buttonGroup);
            buttonGroup.on('click', '.categories', function () {
                buttonGroup.find('.active').removeClass('active');
                jQuery(this).addClass('active');
            });

        });		
        // Masonry Element
        var container = jQuery('.masonry');
        container.masonry({
            // columnWidth: 0,
            itemSelector: '.nf-item'
        });
    };
	
	// ---------------------------------------------------------------------------------------------------------------------------->
    // Accordion   ||-----------
    // ---------------------------------------------------------------------------------------------------------------------------->
    $(function () {
        var $accordionEl = $('.accordion');
        if ($accordionEl.length > 0) {
            $accordionEl.each(function () {
                var element = $(this),
                    elementState = element.attr('data-show'),
                    accordionActive = element.attr('data-active');

                if (!accordionActive) { accordionActive = 0; } else { accordionActive = accordionActive - 1; }

                element.find('.accordion_content').hide();

                if (elementState != 'closed') {
                    element.find('.accordion_title:eq(' + Number(accordionActive) + ')').addClass('accordion_title_active').next().show();
                }

                element.find('.accordion_title').click(function () {
                    if ($(this).next().is(':hidden')) {
                        element.find('.accordion_title').removeClass('accordion_title_active').next().slideUp("normal");
                        $(this).toggleClass('accordion_title_active').next().slideDown("normal");
                    }
                    return false;
                });
            });
        }

    });
	// ---------------------------------------------------------------------------------------------------------------------------->
    // Tabs   ||-----------
    // ---------------------------------------------------------------------------------------------------------------------------->
    $(function () {
        var $tabs = $('.tabs');
        if ($tabs.length > 0) {
            $tabs.each(function () {
                var element = $(this),
                    elementSpeed = element.attr('data-speed'),
                    tabActive = element.attr('data-active');

                if (!elementSpeed) { elementSpeed = 400; }
                if (!tabActive) { tabActive = 0; } else { tabActive = tabActive - 1; }

                element.tabs({
                    active: Number(tabActive),
                    show: {
                        effect: "fade",
                        duration: Number(elementSpeed)
                    }
                });
            });
        }
    });
	// ---------------------------------------------------------------------------------------------------------------------------->
    // Toggle   ||-----------
    // ---------------------------------------------------------------------------------------------------------------------------->
    $(function () {
        var $toggle = $('.toggle');
        if ($toggle.length > 0) {
            $toggle.each(function () {
                var element = $(this),
                    elementState = element.attr('data-show');

                if (elementState != 'open') {
                    element.find('.toggle-content').hide();
                } else {
                    element.find('.toggle-title').addClass("toggle-title-active");
                }

                element.find('.toggle-title').click(function () {
                    $(this).toggleClass('toggle-title-active').next('.toggle-content').slideToggle(300);
                    return true;
                });
            });
        }
    });
	// ---------------------------------------------------------------------------------------------------------------------------->
    // MagnificPopup   ||-----------
    // ---------------------------------------------------------------------------------------------------------------------------->
	$('.gallery-popup').each(function () { // the containers for all your galleries
		$(this).magnificPopup({
			delegate: 'a', // the selector for gallery item
			type: 'image',
			tLoading: 'Loading image #%curr%...',
			mainClass: 'mfp-img-mobile',
			gallery: {
			    enabled: true,
			    navigateByImgClick: true,
			    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
			},
			image: {
			    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			    titleSrc: function (item) {
			        return item.el.attr('title');
			    }
			}
		});
	});	
})(jQuery);
