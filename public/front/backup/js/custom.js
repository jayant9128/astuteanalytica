

(function ($) {
    'use strict';
    
    
    var win = $(window),
        scrollUp = $(".scroll-up"),
        btnMenuNavbar = $('.navbar-toggle'),
        navMenu = $(".nav-menu"),
        listMenu = $("ul.nav-menu li a"),
        navbar = $('.nav-bar-fixed'),
        
        /* Var For Side Menu */
        btnOpenSideMenu = $(".side-menu-btn"),
        sideMenuItem = $(".side-menu"),
        closeSidebarOverLay = $(".close-menu-sidebar"),
        btnCloseSideMenu = $(".close-side-menu"),
        body = $("body"),
        sticky,
        /* Var For Search Screen */
        btnOpenSearch = $(".search-btn"),
        searchScreenItem = $(".search-screen"),
        closeSearchScreen = $(".close-search");
    
    btnMenuNavbar.on("click", function (e) {
        e.preventDefault();
        navMenu.slideToggle();
        $(this).toggleClass("navbar-toggle-active");
    });
    
    listMenu.on("click", function (e) {
        var submenu = this.parentNode.getElementsByTagName("ul").item(0);
        if (submenu !== null) {
            e.preventDefault();
            $(submenu).slideToggle();
        }
    });
    
    
    
    
    

    
    
    /*========== Start Wow Js ==========*/
    new WOW().init();
    
    /*==============================
    Loading
    ==============================*/
    $(window).on('load', function () {
        $(".loading-screen").fadeOut();
    });
    
  
    
     /*==============================
    Plugin Nice Select
    ==============================*/
    $('select').niceSelect();
    
  
    
    /* Side Menu script */
    btnOpenSideMenu.on("click", function (e) {
        e.preventDefault();
        sideMenuItem.addClass("open");
        closeSidebarOverLay.addClass("open");
        body.css('overflow', 'hidden');
    });
    
    closeSidebarOverLay.on("click", function (e) {
        e.preventDefault();
        sideMenuItem.removeClass("open");
        closeSidebarOverLay.removeClass("open");
        body.css('overflow', 'auto');
    });
    
    btnCloseSideMenu.on("click", function (e) {
        e.preventDefault();
        sideMenuItem.removeClass("open");
        closeSidebarOverLay.removeClass("open");
        body.css('overflow', 'auto');
    });


    /* Search Screen Script */
    btnOpenSearch.on("click", function (e) {
        e.preventDefault();
        searchScreenItem.addClass("open");
    });
    closeSearchScreen.on("click", function (e) {
        e.preventDefault();
        searchScreenItem.removeClass("open");
    });
    
    
     /*========== Start Navbar Auto Change  ==========*/
    win.on('scroll', function () {
        if (win.scrollTop() > 45) {
            navbar.addClass('nav-fixed-two').removeClass('fixed-top-one');
        } else {
            navbar.addClass('fixed-top-one').removeClass('nav-fixed-two');
        }
    });
    
    
    
    
    function animateProgressBar() {
        $('.skill-box .progress-line > span').each(function () {
            var percent = $(this).data('percent');
            $(this).css({
                width: percent + '%',
                transition: 'width 1.5s linear'
            });
        });
    }
    if ($('.about')[0]) {
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > $('.about').offset().top + 200) {
                animateProgressBar();
            }
        });
        if ($(window).scrollTop() > $('.about').offset().top + 200) {
            animateProgressBar();
        }
     
    }
    
    
    
    
            $(".services-box").owlCarousel({
            items: 1,
            nav: true,
            dots: true,
            smartSpeed: 500,
            autoplay: 1000,
            loop: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            mouseDrag: true,
            touchDrag: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                1200: {
                    items: 5
                }
            }
        });
    
    /*========== Start OWL Carousel Js Slider Hero   ==========*/
    if ($('.slider-hero')[0]) {
        
        $(".slider-hero").owlCarousel({
            items: 1,
            nav: true,
            dots: true,
            smartSpeed: 1000,
            autoplay: 2000,
            loop: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            mouseDrag: false,
            touchDrag: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    }
    $(".slider-hero").on("translate.owl.carousel", function () {
        $(".info-header .inner-banner").removeClass("animated fadeOut").css("opacity", "0");
        $(".info-header .top-title-header").removeClass("animated fadeInUp").css("opacity", "0");
        $(".info-header h1").removeClass("animated fadeInUp").css("opacity", "0");
        $(".info-header .text-header").removeClass("animated fadeInDown").css("opacity", "0");
        $(".banner-btn").removeClass("animated fadeInDown").css("opacity", "0");
    });

    $(".slider-hero").on("translated.owl.carousel", function () {
        $(".info-header .inner-banner").removeClass("animated fadeIn").css("opacity", "1");
        $(".info-header .top-title-header").addClass("animated fadeInUp").css("opacity", "1");
        $(".info-header h1").addClass("animated fadeInUp").css("opacity", "1");
        $(".info-header .text-header").addClass("animated fadeInDown").css("opacity", "1");
        $(".banner-btn").addClass("animated fadeInDown").css("opacity", "1");
    });
    
    
    
    
    /*========== Start Counter To Js Statistics   ==========*/
    if ($(".count")[0]) {
        win.on('scroll.statistics', function () {
            var stat = $('.statistics');
            if ($(this).scrollTop() >= stat.offset().top - win.height() + 220) {
                $('.count').countTo();
                win.off('scroll.statistics');
            }
        });
    }
    
    /*========== Start Scroll For Link To Go Section  ==========*/
    if ($(".down")[0]) {
        $('.down').on('click', function (e) {
            e.preventDefault();
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 81
            }, 1000);
        });
    }
    
    
    /* ========== Start OWL Carousel Js testimonial   ==========*/
    if ($('.about-carousel')[0]) {
        $('.about-carousel').owlCarousel({
            loop: true,
            margin: 0,
            smartSpeed: 1000,
            autoplay: 6000,
            nav: true,
            dots: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 2
                }
            }
        });
    }
    
    /* ========== Start OWL Carousel Js testimonial   ==========*/
    if ($('.case-one')[0]) {
        $('.case-one').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
    
    /* ========== Start OWL Carousel Js testimonial   ==========*/
    if ($('.case-three')[0]) {
        $('.case-three').owlCarousel({
            center: true,
            items: 3,
            loop: true,
            smartSpeed: 1000,
            autoplay: 3000,
            margin: 30,
            nav: true,
            autoplayTimeout: 3000,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                987: {
                    items: 2
                }
            }

        });
    }
    
    

    
    
    /* ========== Start OWL Carousel Js testimonial   ==========*/
    if ($('.case-classic')[0]) {
        $('.case-classic').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
    
     /* ========== Start OWL Carousel Js testimonial   ==========*/
    if ($('.case-single')[0]) {
        $('.case-single').owlCarousel({
            loop: true,
            margin: 0,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    }
    
    
    /* ========== Start OWL Carousel Js testimonial   ==========*/
    if ($('.team-carousel')[0]) {
        $('.team-carousel').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
    
    
    /* ========== Start OWL Carousel Js testimonial   ==========*/
    if ($('.team-classic')[0]) {
        $('.team-classic').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
    

    
    /*========== Start Portfolio Trigger Filterizr Js ==========*/
    $("#control li").on('click', function () {
        $(this).addClass('active').siblings().removeClass('active');
    });

    // The Filterizr
    if ($("#filtr-container")[0]) {

        $('#filtr-container').filterizr({
            animationDuration: 0.4
        });
    }
    
     /*========== Start Magnigic Popup Js ==========*/
    if ($('.case-item')[0]) {

        $('.case-item').magnificPopup({
            delegate: '.zoom-case a',
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    }
    
  
    /* ========== Start OWL Carousel Js testimonial   ==========*/
    
    /* ========== Start OWL Carousel Js testimonial   ==========*/
    if ($('.testimonial-one')[0]) {
        $('.testimonial-one').owlCarousel({
            autoplay: 2000,
            loop: true,
            items: 1,
            margin: 30,
            nav: true,
            dots: false,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            mouseDrag: true,
            touchDrag: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    }
    
    
    if ($('.testimonial')[0]) {
        $('.testimonial').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
    
    /*========== Start OWL Carousel Js sponsor   ==========*/
    if ($('.sponsor')[0]) {
        $('.sponsor').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        });
    }
    
    if ($('.services-carousel')[0]) {
        $('.services-carousel').owlCarousel({
            loop: true,
            margin: 10,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                575: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    }
    
    
    if ($('.single-case-slider')[0]) {
        $('.single-case-slider').owlCarousel({
            loop: true,
            margin: 30,
            smartSpeed: 1000,
            autoplay: 2000,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
    }
    

    
    
    
    

    
      /* ------------------  Cart Slider OF Single Product ------------------ */
    $('.nav-tabs li').on('click', function () {
        $(this).addClass('active').siblings().removeClass('active');
        
        $('.content-revision > div').hide();
        $('.' + $(this).data('class')).fadeIn();
        
        $('.my-account > div').hide();
        $('.' + $(this).data('class')).fadeIn();
        
        
    });
    
    
    
    
    
    /*========== Start Scroll Up    ==========*/
    // Show And Hide Buttom Back To Top
    win.on('scroll', function () {
        if ($(this).scrollTop() >= 600) {
            scrollUp.show(300);
        } else {
            scrollUp.hide(300);
        }
    });
    // Back To 0 Scroll Top body
    scrollUp.on('click', function () {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
    });
    


    if ($('.sticky-navbar')[0]) {
        sticky = new Waypoint.Sticky({
            element: $('.sticky-navbar')[0]
        });
    }
    

// Parameters 
var 
axe = "X", // values can be "X" or "Y"
numberOfSquare = 15, // How many square on the axe
greyMinimum = 210, // Between 0 and 254
greyMaximum = 245, // Between 1 and 255
animMin = 2, // Animation durations (in seconds)
animMax = 8;


// The container in the HTML page
var $tc = $("#trianglesContainer"); 

function createTriangles(){
  let w = $tc.width(), h = $tc.height(), dx;
  let $svg = $('<svg width="'+w+'" height="'+h+'" xmlns="http://www.w3.org/2000/svg">');
  
  // Empty the container (usefull for the page resized calls)
  $tc[0].innerHTML = "";
  
  if(axe = "X")
    dx = w / numberOfSquare;
  else 
    dx = h / numberOfSquare;
  
  
  for(let i = 0; i < w / dx ; i++) {
    for(let j = 0; j < h/dx ; j++) {
      // Random Colors for animation
      let c1 = rdmColor(greyMinimum,greyMaximum);
      let c2 = rdmColor(greyMinimum,greyMaximum);
      
      // Path direction for each triangles in a square
      let d = [];
      // Middle of the current square, to make triangles from a square
      let middleX = (i*dx+dx/2), middleY = (j*dx+dx/2);
      
      // Creating the 4 paths directions
            d.push('M '+i*dx+' '+j*dx+' h '+dx+ ' L '+middleX+' '+middleY);
            d.push('M '+i*dx+' '+(j+1)*dx+' h '+dx+ ' L '+middleX+' '+middleY);
            d.push('M '+i*dx+' '+j*dx+' v '+dx+ ' L '+middleX+' '+middleY);
            d.push('M '+(i+1)*dx+' '+j*dx+' v '+dx+ ' L '+middleX+' '+middleY);
      
      d.forEach(function(val,i){
        // Animate tag
        let a = '<animate attributeName="fill" repeatCount="indefinite" dur="'+rdmInt(animMin,animMax)+'s" values="'+c1+';'+c2+';'+c1+'" />';
        // Adding the animated path to the SVG container
        $svg[0].innerHTML += ('<path d="'+val+'" fill="'+c1+'" stroke="'+c1+'">'+a+'</path>');
      });
      
      // Puttin the SVG container in the HTML page
      $tc.append($svg);
    }
  }
  // For Loops end
  
}



// Random int between min and max
function rdmInt(min, max) {
    return Math.round(Math.random() * (max - min) + min)
}

// Random RGB grey between min and max values (from 0 to 255)
function rdmColor(min, max) {
    let color = rdmInt(min,max);
    return 'rgb('+color+','+color+','+color+')';
}

// Create Triangle when the page is loaded
window.onload = createTriangles();

// Recreatee Triangles when the page is resized
$( window ).resize(createTriangles);


    

}($));
