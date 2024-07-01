function checkSearchSystem(e) {
    $("#searchLayout").empty(), $(".headerSearch").hide(), "" != e ? ($("#searchLayout").empty(), $.ajax({
        url: "https://www.astuteanalytica.com/searchText/" + e,
        type: "GET",
        success: function(e) {
            if ($.trim(e)) {
                $(".headerSearch").show(), $("#searchLayout").empty();
                for (let a in e['report']) $("#searchLayout").append('<li class="hrrow"><a href="https://www.astuteanalytica.com/industry-report/' + a + '">' + e['report'][a] + "</a></li>")
                if (e['prs_count'] > 0) {
                    $("#searchLayout").append('<li class="hrrow font-weight-bold px-3 my-2 py-2" style="background:#C30C17;color:#fff">Press Release </li>');
                    for (let a in e['press']) $("#searchLayout").append('<li class="hrrow"><a href="https://www.astuteanalytica.com/press-release/' + a + '">' + e['press'][a] + "</a></li>")

                }


                // let length = e['press'].length;
                // alert(length);
                // if (e['press'].length > 0) {
                //     alert('hello');
                //     $("#searchLayout").append('<li class="hrrow">Press Release </li>');
                //     for (let a in e['press']) $("#searchLayout").append('<li class="hrrow"><a href="https://www.astuteanalytica.com/press-release/' + a + '">' + e['press'][a] + "</a></li>")
                // }

            }
        }
    })) : ($("#searchLayout").empty(), $(".headerSearch").hide())
}
$(window).scroll((function() {
        $(window).scrollTop() >= 250 ? $(".make-me-sticky").addClass("top-100") : $(".make-me-sticky").removeClass("top-100")
    })), $(window).on("load", (function() {
        $(".lds-ring").fadeOut(), $(".loading-screen").delay(100).fadeOut("slow"), $("body").delay(100).css({
            overflow: "visible"
        })
    })), $(".about-carousel").owlCarousel({
        loop: !0,
        margin:15,
        smartSpeed: 1e3,
        autoplay: 6e3,
        nav: !0,
        dots: !0,
        navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 2
            },
            1200: {
                items: 2
            }
        }
    }), $(".services-carousel").owlCarousel({
        loop: !0,
        margin: 10,
        smartSpeed: 1e3,
        autoplay: 2e3,
        dots: !1,
        nav: !0,
        navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 2
            },
            425: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    }), $(".case-one").owlCarousel({
        loop: !0,
        margin: 45,
        autoplayHoverPause: !0,
        smartSpeed: 1e3,
        autoplay: 2e3,
        nav: !0,
        navText: ["<i class='fas fa-2x fa-angle-left'></i>", "<i class='fas fa-2x fa-angle-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            767: {
                items: 3
            },
            1200: {
                items: 3
            }
        }
    }), $(".testimonial-two").owlCarousel({
        autoplay: 2e3,
        loop: !0,
        items: 1,
        margin: 30,
        nav: !0,
        dots: !1,
        navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
        mouseDrag: !0,
        touchDrag: !1,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1200: {
                items: 3
            }
        }
    }), $(".services-box").owlCarousel({
        items: 2,
        nav: !0,
        dots: !0,
        smartSpeed: 500,
        autoplay: 1e3,
        loop: !0,
        navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
        mouseDrag: !0,
        touchDrag: !0,
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 3
            },
            1200: {
                items: 5
            }
        }
    }), $(".testimonial-one").owlCarousel({
        autoplay: 2e3,
        loop: !0,
        items: 1,
        margin: 0,
        autoplayHoverPause: !0,
        center: !0,
        left: !0,
        right: !0,
        nav: !0,
        dots: !1,
        navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
        mouseDrag: !0,
        touchDrag: !1,
        responsive: {
            0: {
                items: 1
            },
            580: {
                items: 1
            },
            768: {
                items: 3
            }
        }
    }), $(".sponsor-new").owlCarousel({
        autoplay: 2e3,
        loop: !0,
        items: 1,
        margin: 15,
        autoplayHoverPause: !0,
        nav: !0,
        dots: !1,
        navText: ["<i class='fas fa-2x fa-angle-left'></i>", "<i class='fas fa-2x fa-angle-right'></i>"],
        mouseDrag: !0,
        touchDrag: !0,
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 4
            },
            1200: {
                items: 6
            }
        }
    }), $(".about-carousel").owlCarousel({
        autoplay: 2e3,
        loop: !0,
        items: 1,
        margin: 30,
        nav: !0,
        dots: !1,
        navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
        mouseDrag: !0,
        touchDrag: !1,
        responsive: {
            0: {
                items: 2
            },
            768: {
                items: 1
            },
            1200: {
                items: 2
            }
        }
    }),
    function(e) {
        e.fn.countTo = function(a) {
            return a = a || {}, e(this).each((function() {
                var t = e.extend({}, e.fn.countTo.defaults, {
                        from: e(this).data("from"),
                        to: e(this).data("to"),
                        speed: e(this).data("speed"),
                        refreshInterval: e(this).data("refresh-interval"),
                        decimals: e(this).data("decimals")
                    }, a),
                    s = Math.ceil(t.speed / t.refreshInterval),
                    o = (t.to - t.from) / s,
                    n = this,
                    i = e(this),
                    l = 0,
                    r = t.from,
                    c = i.data("countTo") || {};

                function f(e) {
                    e = t.formatter.call(n, e, t), i.html(e)
                }
                i.data("countTo", c), c.interval && clearInterval(c.interval), c.interval = setInterval((function() {
                    l++, f(r += o), "function" == typeof t.onUpdate && t.onUpdate.call(n, r), s <= l && (i.removeData("countTo"), clearInterval(c.interval), r = t.to, "function" == typeof t.onComplete && t.onComplete.call(n, r))
                }), t.refreshInterval), f(r)
            }))
        }, e.fn.countTo.defaults = {
            from: 0,
            to: 0,
            speed: 1e3,
            refreshInterval: 100,
            decimals: 0,
            formatter: function(e, a) {
                return e.toFixed(a.decimals)
            },
            onUpdate: null,
            onComplete: null
        }
    }(jQuery), jQuery((function(e) {
        e(".count-number").data("countToOptions", {
            formatter: function(e, a) {
                return e.toFixed(a.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ",")
            }
        }), e(".timer").each((function(a) {
            var t = e(this);
            a = e.extend({}, a || {}, t.data("countToOptions") || {}), t.countTo(a)
        }))
    })), $(".search-btn").click((function() {
        $(".search-screen").addClass("open"), $("#serachTextBox").focus()
    })), $(".close-search").click((function() {
        $(".search-screen").removeClass("open")
    })), $(".navbar-toggle").click((function() {
        $("#main-menu").slideToggle("slow")
    })), $("#search-popup").on("shown.bs.modal", (function() {
        $("#searchTextBox").focus()
    })), $(document).ready((function() {
        var e = $(".sticky-navbar").offset().top;
        $(window).bind("scroll", (function() {
            $(window).scrollTop() > e ? $(".sticky-navbar").addClass("stuck") : $(".sticky-navbar").removeClass("stuck")
        }))
    })), document.addEventListener("DOMContentLoaded", (function() {
        var e = document.querySelectorAll("a.dmca-badge");
        if (e[0].getAttribute("href").indexOf("refurl") < 0)
            for (var a = 0; a < e.length; a++) {
                var t = e[a];
                t.href = t.href + (-1 === t.href.indexOf("?") ? "?" : "&") + "refurl=" + document.location
            }
    }), !1), $(document).on("click", ".readBtn", (async function() {
        $(this).parents(".owl-item").find(".contentDiv").hasClass("elel") ? (await $(".contentDiv").addClass("elel"), await $(this).parents(".owl-item").find(".contentDiv").removeClass("elel")) : await $(this).parents(".owl-item").find(".contentDiv").addClass("elel"), $(".contentDiv").map(((e, a) => {
            $(a).hasClass("elel") ? $(a).parents(".owl-item").find(".readBtn").text("Read More...") : $(a).parents(".owl-item").find(".readBtn").text("Read Less...")
        }))
    })), $(window).scroll((function() {
        $(window).scrollTop() >= 250 ? $(".make-me-sticky").addClass("top-100") : $(".make-me-sticky").removeClass("top-100")
    })), $(document).ready((function() {
        $(".navbar-toggle").click((function() {
            $(".navbar-toggle").toggleClass("close-icon")
        }))
    }));



    $(document).ready(function(){
      $(".search").click(function(){
        $(".search ").toggleClass("show");
      });

});
