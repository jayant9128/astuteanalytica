$(document).ready(function() {
    var e = $(".main-nav-bar").offset().top;
    $(window).bind("scroll", (function() {
        $(window).scrollTop() > e ? $(".main-nav-bar").addClass("stuck") : $(".main-nav-bar").removeClass("stuck")
    }));
});

$(document).ready(function() {
    $(".navbar-toggle").click(function() {
        $(".navbar-toggle").toggleClass("close-icon")
    });
});

$(document).ready(function() {
    $(".navbar-toggle").click(function() {
        $("#main-menu").slideToggle("slow")
    });
});