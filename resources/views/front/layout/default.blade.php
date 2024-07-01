<?php
$action_slug1 = request()->segment(count(request()->segments())-1);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="dns-prefetch" href="https://www.astuteanalytica.com/">
    <link rel="dns-prefetch" href="https://dosrg0qttcg52.cloudfront.net/">
    <link rel="preconnect" href="https://dosrg0qttcg52.cloudfront.net/">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
    <link rel="dns-prefetch" href="https://www.googletagmanager.com/">
    <link rel="dns-prefetch" href="https://www.googleadservices.com/">
    <link rel="dns-prefetch" href="https://googleads.g.doubleclick.net/">
    <link rel="dns-prefetch" href="https://www.google.com/">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/jpg" href="{{ URL::asset('public/front/images/logo/logo-2.png') }}" />
   <!-- icon cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>
        @if (isset($page_title))
            {{ $page_title }}
        @else
            @foreach ($site as $sr)
                {{ $sr->meta_title }}
            @endforeach
        @endif
    </title>
    <meta name="description" content="
         @if (isset($meta_description)) {{ $meta_description }}
        @else
    @foreach ($site as $sr)
        {{ $sr->meta_description }} @endforeach
    @endif
    ">
    @if(isset($meta_keyword))
    @if($meta_keyword != "NO")
    <meta name="keywords" content="
    @if (isset($meta_keyword)) {{ $meta_keyword }}
    @else
    @foreach ($site as $sr)
        {{ $sr->meta_keyword }} @endforeach
    @endif
    ">
    @endif
    @endif
    @yield('meta_nofollow')

    <meta property="og:url" content="{{ Str::lower(Request::url()) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="@if (isset($page_title))
            {{ $page_title }}
        @else
            @foreach ($site as $sr)
                {{ $sr->meta_title }}
            @endforeach
        @endif" />
    <meta property="og:description" content="
         @if (isset($meta_description)) {{ $meta_description }}
        @else
    @foreach ($site as $sr)
        {{ $sr->meta_description }} @endforeach
    @endif" />
    <meta property="og:image" content="@if(Str::lower(Request::url())=='https://www.astuteanalytica.com')
    https://www.astuteanalytica.com/public/front/images/logo/logo-2.png
    @elseif($action_slug1 == 'industry-report') 
    {{URL::asset('public/upload/report/'.$data->image)}}
    @else
    https://www.astuteanalytica.com/public/front/images/logo/logo-2.png
    @endif" />

    <script src="https://www.astuteanalytica.com/public/front/js/jquery-3.3.1.min.js"></script>
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"></noscript>
    <link rel="preload" href="{{ URL::asset('public/front/css/headerfooter.css?ver=2.0') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/headerfooter.css?ver=2.0') }}"></noscript>
   <link rel="stylesheet" href="{{ URL::asset('public/front/css/custom-new.css') }}">
<style>
.icon-links a,.nav-menu li a{padding:42px 0;text-decoration:none}.nav-bar .nav-menu .nav-item.has-dropdown>ul.sub-menu,.nav-bar .sub-menu .has-dropdown-two>ul.sub-menu-two{padding:0;background:#fff;box-shadow:0 3px 9px 0 rgba(0,0,0,.08);border-bottom:3px solid #c30c17;list-style:none}.icon-links a,.nav-menu li a{text-transform:uppercase;color:#02185a}.button,.icon-links a,.nav-menu li a{text-decoration:none}img{max-width:100%;height:auto}.position-inherit{position:inherit;display:-ms-flexbox!important;display:flex!important;-ms-flex-preferred-size:auto;flex-basis:auto}.nav-bar-three .navbar-toggle span,.nav-bar-two,.nav-menu-bar{background:#fff}.nav-bar .single-item{position:relative;padding-left:50px;margin-top:22px;float:right;width:100%}.nav-bar .single-item span,.row-contact .single-item span{left:0;top:0;color:#c30c17;position:absolute;font-size:30px}.nav-bar .single-item span:before{margin:0;font-size:30px;line-height:30px}.nav-bar .single-item h3{color:#02185a;margin-bottom:0;font-size:16px;line-height:18px;font-weight:700}.nav-bar .single-item p{margin-bottom:0;font-size:13px;line-height:26px;color:#777;font-weight:500}.nav-bar .btn-arrow-two{float:right;margin-top:18px}.navbar-toggle{height:32px;line-height:32px;width:30px;cursor:pointer;top:35px;right:15px;position:absolute;display:none}.navbar-toggle span{-webkit-transition:.4s ease-in-out;-moz-transition:.4s ease-in-out;-ms-transition:.4s ease-in-out;-o-transition:.4s ease-in-out;transition:.4s ease-in-out}.stuck{position:sticky;top:-1px;width:100%;left:0;z-index:5555;box-shadow:0 10px 20px rgb(0 0 0 / 10%);border-bottom:1px solid #eee;background:#fff}#page a,#page a:active,#page a:focus,#page a:hover,button:focus{text-decoration:none;border:none;outline:0;color:#fff;font-weight:600}.navbar-toggle:hover span{background:#c30c17}.navbar-toggle span:first-child,.navbar-toggle span:nth-child(2),.navbar-toggle span:nth-child(3){background:#02185a;display:block;height:2px;margin:auto;right:0;width:22px;position:absolute;left:0}.navbar-toggle span:first-child{top:0}.navbar-toggle span:nth-child(2){top:6px}.navbar-toggle span:nth-child(3){top:12px}.navbar-toggle-active span:first-child,.navbar-toggle.close-icon span:first-child{top:7px;transform:rotate(45deg);background:#c30c17}.fixed-top .my-logo .logo-two,.fixed-top-one .my-logo .logo-two,.links-of-footer li:first-child a:before,.nav-fixed .my-logo .logo-one,.nav-fixed-two .my-logo .logo-one,.navbar-toggle-active span:nth-child(2),.navbar-toggle.close-icon span:nth-child(2){display:none}.button,.icon-links a,.mglass,.nav-menu li,.search-container,.social-media li{display:inline-block}.navbar-toggle-active span:nth-child(3),.navbar-toggle.close-icon span:nth-child(3){top:7px;transform:rotate(135deg);background:#c30c17}.nav-menu{padding:0;margin:0;list-style:none;float:left}.icon-links,.nav-bar-two .nav-menu{float:right}.nav-menu li a{display:block;margin-right:14px;margin-left:14px;font-size:13px;font-weight:700;font-family:Poppins,sans-serif;position:relative}.icon-links a:hover,.nav-bar .nav-menu .nav-item.has-dropdown>ul.sub-menu li.active a,.nav-menu .nav-item.active .nav-link,.nav-menu .nav-item:hover .nav-link{color:#c30c17}.nav-menu .nav-item .nav-link:before{position:absolute;content:"";width:100%;display:table;height:3px;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;bottom:25px;-webkit-transition:.3s linear;transition:.3s linear;-webkit-transform:scaleX(0);-ms-transform:scaleX(0);transform:scaleX(0);background:#c30c17!important;opacity:0}.nav-menu .nav-item.active>.nav-link:before,.nav-menu .nav-item:hover .nav-link:before{-webkit-transform:scaleX(1);transform:scaleX(1);opacity:1;color:#c30c17!important;background-color:transparent}.has-dropdown .icon-down{opacity:.8;position:absolute;right:-14px;top:42px}.icon-links{position:relative;top:0;right:0;margin-left:0}.icon-links a{margin-left:20px;font-size:15px;font-weight:700;font-family:Roboto,sans-serif;position:relative;transition:.4s}.logo-mrsi{position: relative;} .logo-mrsi img{max-width:150px; width:100%;background: #fff;position: absolute;right: 0px;top: 0;}.footer-widget h4,.hrrow a,.links-of-footer li a{text-transform:capitalize}.nav-bar .nav-menu .nav-item.has-dropdown>ul.sub-menu{-webkit-transform:translateY(10%);-moz-transform:translateY(10%);-ms-transform:translateY(10%);-o-transform:translateY(10%);transform:translateY(10%);-webkit-transition:.15s ease-in-out;-moz-transition:.15s ease-in-out;-ms-transition:.15s ease-in-out;-o-transition:.15s ease-in-out;transition:.15s ease-in-out;margin:0;position:absolute;width:320px;visibility:hidden;opacity:0}.nav-bar .nav-menu .nav-item.has-dropdown>ul.sub-menu:after{clear:both;content:" ";display:block;width:100%}.nav-item.has-dropdown>ul.sub-menu li{display:block;z-index:3}.nav-item.has-dropdown>ul.sub-menu li a{display:block;text-transform:capitalize;color:#000;font-size:12px;font-weight:500;padding:5px 23px;margin:0;line-height:25px;position:relative;background:0 0;border-bottom:1px solid #f1f1f1!important;transition:.5s}.fixed-top,.nav-bar .sub-menu .has-dropdown-two>ul.sub-menu-two{-webkit-transition:.15s;-moz-transition:.15s;-ms-transition:.15s;-o-transition:.15s}.nav-item.has-dropdown>ul.sub-menu li a:last-child{border:none}.nav-item.has-dropdown>ul.sub-menu li a:hover{color:#02185a;opacity:1;background:#f9f9f9;padding-right:20px}.nav-item.has-dropdown:hover ul.sub-menu{-webkit-transform:translateY(0)!important;-moz-transform:translateY(0)!important;-ms-transform:translateY(0)!important;-o-transform:translateY(0)!important;transform:translateY(0)!important;opacity:1!important;visibility:visible!important}.nav-bar .sub-menu .has-dropdown-two,.nav-item.has-dropdown>ul.sub-menu li{position:relative}.nav-bar .sub-menu .has-dropdown-two span{float:right;margin-top:4px;font-size:12px}.nav-bar .sub-menu .has-dropdown-two:hover>ul.sub-menu-two{-webkit-transform:translateY(0);-moz-transform:translateY(0);-ms-transform:translateY(0);-o-transform:translateY(0);transform:translateY(0);opacity:1;visibility:visible}.nav-bar .sub-menu .has-dropdown-two>ul.sub-menu-two{-webkit-transform:translateY(10%);-moz-transform:translateY(10%);-ms-transform:translateY(10%);-o-transform:translateY(10%);transform:translateY(10%);transition:.15s;margin:0 0 0 230px;position:absolute;width:230px;visibility:hidden;opacity:0;top:0}.nav-bar .sub-menu .has-dropdown-two>ul.sub-menu-two:after{clear:both;width:100%;display:block}.nav-bar-two .nav-menu li a{margin-left:30px;margin-right:0}.nav-bar-three{position:absolute;width:100%;background:0 0}.nav-bar-fixed .nav-menu,.nav-bar-three .nav-menu{float:left}.nav-fixed-two .navbar-toggle span,.scroll-up:hover{background:#02185a}.nav-bar-three .nav-menu li a{margin-left:28px;margin-right:0;color:#fff}.nav-bar-three .icon-links .btn-three{cursor:pointer;display:inline-block;font-family:Poppins,sans-serif;position:relative;z-index:2;font-size:13px;font-weight:600;text-transform:uppercase;text-align:center;padding:0 5px;line-height:45px;min-width:140px;height:45px;letter-spacing:.3px;-webkite-transition:all .4s;-moz-transition:.4s;-ms-transition:.4s;-o-transition:.4s;transition:.4s;box-shadow:none;border-radius:2px;margin-top:20px}.close-side-menu:hover span,.fixed-top .icon-links a,.fixed-top .nav-menu li a,.links-of-footer li a:hover,.nav-bar-three .icon-links .btn-three:hover{color:#fff}.nav-bar-three .side-menu-btn span{background-color:#fff}.fixed-top .my-logo .logo-one,.nav-fixed .my-logo .logo-two{display:block}.fixed-top .nav-output:after,.fixed-top:after,.nav-fixed .nav-output:after,.nav-fixed:after{clear:both;display:block}.fixed-top{position:fixed;top:50px;transition:.15s}.nav-fixed{background:#fff;position:fixed;top:0;right:0;left:0;z-index:999;width:100%;-webkit-box-shadow:0 0 20px rgba(0,0,0,.15);-moz-box-shadow:0 0 20px rgba(0,0,0,.15);-o-box-shadow:0 0 20px rgba(0,0,0,.15);box-shadow:0 0 20px rgba(0,0,0,.15);-webkit-transition:.15s;-moz-transition:.15s;-ms-transition:.15s;-o-transition:.15s;transition:.15s}.nav-bar-three .stuck,.nav-fixed-two .stuck{width:100%;z-index:5555;box-shadow:none;position:fixed;left:0;top:0}.nav-bar-fixed .nav-menu .nav-item .nav-link:before{bottom:20px}.nav-bar-fixed .nav-menu .nav-menu li a{margin-right:28px}.nav-bar-three .stuck{border-bottom:1px solid rgba(214,212,212,.27);background:0 0}.nav-fixed-two .stuck{border-bottom:1px solid rgba(144,139,139,.37);background:#fff}.nav-fixed-two .nav-menu li a{margin-left:28px;margin-right:0;color:#02185a}.nav-fixed-two .side-menu-btn span{background:#122b51!important}.nav-fixed-two .btn-three{background:#c30c17;color:#fff}.nav-fixed-two .icon-links .btn-three:hover{color:#fff;background:#02185a}.side-menu{position:fixed;top:0;right:-430px;width:430px;height:100%;min-height:100%;padding:100px 40px 50px 50px;background:#fff;overflow:hidden;visibility:hidden;z-index:9999;-webkit-backface-visibility:hidden;-moz-backface-visibility:hidden;-o-backface-visibility:hidden;backface-visibility:hidden;-webkit-box-shadow:-11px 0 13px rgba(0,0,0,.02);-moz-box-shadow:-11px 0 13px rgba(0,0,0,.02);-o-box-shadow:-11px 0 13px rgba(0,0,0,.02);box-shadow:-11px 0 13px rgba(0,0,0,.02);overflow-y:auto;overflow-x:hidden;-webkit-transition:.4s;-moz-transition:.4s;-o-transition:.4s;transition:.4s}.side-menu.open{right:0;visibility:visible}.close-side-menu{top:30px;right:30px;width:40px;height:40px;position:absolute;border-radius:2px;background:#c30c17;z-index:55;text-align:center;line-height:40px;-webkit-transition:.4s;-moz-transition:.4s;-o-transition:.4s;transition:.4s}.close-side-menu span{font-size:35px;font-weight:700;text-align:center;line-height:40px;color:#fff}.close-side-menu:hover{background:#02185a;color:#fff}.icon-links a.search-btn{color:#c30c17;padding:8.5px 16px;margin-top:30px}.button{margin:0;background-color:transparent;font-size:14px;padding-left:32px;padding-right:32px;height:42px;line-height:42px;text-align:center;color:#c30c17;cursor:pointer;-moz-user-select:none;-khtml-user-select:none;-webkit-user-select:none;-ms-user-select:none;user-select:none}.button:hover{transition-duration:.4s;-moz-transition-duration:.4s;-webkit-transition-duration:.4s;-o-transition-duration:.4s;background-color:#c30c17;color:#000}.search-container{position:relative;margin:30px 0 0;vertical-align:bottom}.headerSearch,footer:before{width:100%;position:absolute}.search-container form{display:flex}.mglass{pointer-events:none;-webkit-transform:rotate(-45deg);-moz-transform:rotate(-45deg);-o-transform:rotate(-45deg);-ms-transform:rotate(-45deg)}.search-container .searchbutton{position:relative;font-size:22px;width:42px;margin:0;padding:0;border-radius:0 21px 21px 0;border:1px solid #c30c17;border-left:0}.search-container .search.show+.searchbutton,.search-container .search:focus+.searchbutton,.search-container .search:hover+.searchbutton{transition-duration:.8s;-moz-transition-duration:.8s;-webkit-transition-duration:.8s;-o-transition-duration:.8s;background-color:transparent;color:#c30c17}.search-container .search{position:relative;left:42px;background-color:#fff;outline:0;border:1px solid #c30c17;padding:0 15px;border-radius:21px 0 0 21px;border-right:none;width:160px;height:42px;margin-bottom:0;z-index:10;transition-duration:.8s;-moz-transition-duration:.8s;-webkit-transition-duration:.8s;-o-transition-duration:.8s}.search-container .search.show,.search-container .search:focus,.search-container .search:hover{width:250px;padding:0 16px 0 0;border:1px solid #c30c17;border-right:none}.search-container .expandright{left:auto;right:0}.search-container .expandright.show,.search-container .expandright:focus,.search-container .expandright:hover{padding:0 0 0 16px}.headerSearch{background-color:#fff;max-width:292px;margin:0 auto;right:0;transition:.5s;display:none;max-height:80vh;overflow-y:scroll;box-shadow:0 0 5px #ccc;z-index:100000000}.icon-links a:first-child,.row-contact{margin-left:0}#searchLayout{padding:10px 0!important;margin-bottom:0}.hrrow{padding:0;border-bottom:1px solid #a9a9a9}.footer-default-padding,footer{padding-top:60px}.hrrow a{font-size:14px;padding:7px 15px;font-weight:500;display:block;line-height:18px;color:#000}footer{background:#02185a;position:relative}footer:before{background-image:url(../img/map_img.png);background-position:center center;background-repeat:no-repeat;top:0;left:0;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;opacity:.08;content:"";z-index:0;height:100%}.payment_icon #american,.payment_icon #discover,.payment_icon #mastercard,.payment_icon #p_icon,.payment_icon #visa,.payment_icon #wire{width:75px;background-size:250px}.footer-widget .footer-link li:first-child a,.row-contact{padding-top:0}.footer-widget h4{position:relative;font-size:18px;font-weight:600;color:#fff!important;letter-spacing:.5px}.footer-widget .line-footer{width:50px;height:3px;background:#c30c17;margin-bottom:30px;margin-top:20px}.footer-row{margin-bottom:30px}.footer-widget .footer-logo img{width:160px;margin-bottom:30px}.footer-widget ul.payment_icon{list-style:none;padding:0 0 53px;margin:0}.payment_icon{position:relative;height:100px}.payment_icon li{float:left;margin:0;padding:0;list-style:none;position:absolute;top:0;background:url(https://www.astuteanalytica.com/public/front/images/payment-mode.svg)}.payment_icon a,.payment_icon li{height:50px;display:block}.payment_icon #p_icon{left:0;background-position:-8px -8px}.payment_icon #mastercard{left:75px;background-position:-86px -8px}.payment_icon #discover{left:153px;background-position:-165px -8px}.payment_icon #wire{top:50px;left:0;background-position:-8px -60px}.payment_icon #visa{top:50px;left:75px;background-position:-86px -60px}.payment_icon #american{top:50px;left:153px;background-position:-165px -60px}.footer-widget .social-media-footer{padding-left:0;margin-bottom:0}.footer-widget .social-media-footer li{display:inline-block;padding-right:15px}.footer-widget .social-media-footer li a{font-size:18px;color:#fff;transition:.1s}.footer-widget .social-media-footer li a:hover{color:#f57479}.footer-widget .footer-link{padding-left:0}.footer-widget .footer-link li{border-bottom:1px solid rgba(214,214,214,.1);transition:.4s}.footer-widget .footer-link li:hover a{padding-left:8px;color:#fff}.footer-widget .footer-link li a{font-size:13px;color:#ccc;display:block;transition:.4s;padding-top:13px;padding-bottom:13px;line-height:14px;font-weight:600}.footer-widget .footer-link li span{padding-right:5px;font-size:10px}.row-contact{background:#f9f9f9;margin-right:0;padding-bottom:0;margin-bottom:0;border:1px solid #ddd;position:relative}.row-contact .no-padding{border-right:1px solid #ddd}.row-contact .no-padding:last-child{border-right:none}.row-contact .single-item{position:relative;padding-left:60px;margin-bottom:20px;margin-left:40px;margin-top:20px}.row-contact .single-item span:before{margin:0;font-size:35px;line-height:35px}.mail_css,.row-contact .single-item p{font-size:14px;color:#02185a;font-weight:500;line-height:15px;margin-bottom:10px}.footer-widget p{font-weight:500;color:#ccc;font-size:14px}.newsletter-item{position:relative;margin-bottom:18px}.links-of-footer,.social-media{padding-left:0;margin-bottom:0}.newsletter-item button{height:50px;box-shadow:none;position:absolute;cursor:pointer;right:0;width:50px;text-align:center;font-size:20px;color:#fff;border-radius:0 5px 5px 0;background:#c30c17;display:inline-block;top:0;line-height:50px;border:1px solid #c30c17}.links-of-footer,footer .copyright{color:#f4f7fd;letter-spacing:1.7px;padding-top:10px}.newsletter-item input{border-radius:6px}.footer-bar{z-index:3;position:relative;background:#c30c17}footer .copyright{font-size:12px;line-height:30px;padding-bottom:10px;text-align:left}footer .copyright a{color:#fff;font-weight:700}.links-of-footer{text-align:right;font-size:14px;line-height:30px}.scroll-up,.social-media li a{width:40px;height:40px;text-align:center;transition:.4s}.links-of-footer li{display:inline-block;margin-left:25px}.links-of-footer li a{position:relative;font-weight:400;letter-spacing:.7px;line-height:30px;transition:.4s;font-size:12px}.links-of-footer li a:before{content:"";position:absolute;height:5px;width:5px;background:#f4f7fd;display:block;left:-16px;top:8px;border-radius:50%}.social-media{padding-right:0}.social-media li a{margin-right:10px;border-radius:50%;font-size:15px;line-height:40px;color:#c30c17;border:1px solid #fff;background:#fff;display:block}.social-media li a:hover{background:#c30c17;color:#fff;border:1px solid #c30c17}.scroll-up{position:fixed;bottom:70px;right:20px;background:#c30c17;color:#fff;line-height:42px;font-size:18px;border-radius:2px;cursor:pointer;z-index:555;display:none;-webkit-box-shadow:0 10px 10px rgba(0,0,0,.18);-moz-box-shadow:0 10px 10px rgba(0,0,0,.18);-o-box-shadow:0 10px 10px rgba(0,0,0,.18);box-shadow:0 10px 10px rgba(0,0,0,.18)}.no-padding{padding:0}@media (min-width:1367px){.container{max-width:100%!important;padding-left:89px;padding-right:89px}.fixed-container .container{max-width:1519px!important;margin:0 auto}}@media (min-width:1200px){.container{max-width:1170px;width:100%}}@media (min-width:1170px){.container{max-width:1170px;width:100%}}@media(max-width:1170px){.container{max-width:100%;width:100%}}@media (min-width:993px) and (max-width:1170px){.nav-menu li a{padding:32px 0;margin-right:11px;margin-left:11px}.has-dropdown .icon-down{top:32px}.my-logo{max-width:75px}.logo-box{padding:0}.search-container{margin-top:21px;margin-left:0}}@media (min-width:768px) and (max-width:992px){.row-contact .no-padding{border-right:none}.row-contact .single-item{position:relative;padding-left:50px;margin-bottom:20px;margin-left:30px;margin-top:30px}.row-contact .no-padding:first-child{border-right:1px solid #ddd}.row-contact .no-padding:last-child{border-right:none;border-top:1px solid #ddd}.row-contact .no-padding:last-child .single-item{margin-bottom:40px;max-width:300px;margin-right:auto;margin-left:auto}}@media (max-width:992px){.main-nav-bar .nav-menu-bar{background:#fff;border-top:1px solid #eee;position:relative;width:100%;display:block;height:85px}.main-nav-bar .nav-menu-main{background:#fff;padding-top:84px}.nav-bar .nav-menu .nav-item.has-dropdown:hover>ul.sub-menu,.nav-menu li,.navbar-toggle{display:block}.logo-box{padding:0}.search-container{margin-top:21px;margin-left:0}.position-inherit{overflow:unset;display:unset!important}.icon-links{float:none;margin-left:0;top:0;right:60px;position:absolute}.my-logo{display:inline-block;width:75px;padding:6px 0 5px}.nav-menu,.nav-menu .nav-item.active>.nav-link:before,.nav-menu .nav-item:hover .nav-link:before{display:none}.nav-menu{float:none;width:100%;max-height:550px;overflow:scroll}.nav-menu li a{padding:10px 15px;margin-left:0;margin-right:0;border-bottom:1px solid #eee}.has-dropdown .icon-down{display:block;position:absolute;right:5px;top:0;text-align:center;background:0 0;z-index:555;cursor:pointer;font-size:15px;line-height:46px}.nav-bar .nav-menu .nav-item.has-dropdown>ul.sub-menu{transform:translateY(0);-webkit-transform:translateY(0);-moz-transform:translateY(0);-o-transform:translateY(0);-ms-transform:translateY(0);position:relative;top:0;width:100%;opacity:1;visibility:visible;display:none;margin:0;transition:none}}@media (max-width:767.98px) and (min-width:576px){.row-contact .no-padding{border-right:none}.row-contact .single-item{position:relative;padding-left:50px;margin-bottom:15px;margin-left:15px;margin-top:15px}.row-contact .no-padding:first-child{border-right:1px solid #ddd}.row-contact .no-padding:last-child{border-right:none;border-top:1px solid #ddd}.row-contact .no-padding:last-child .single-item{margin-bottom:40px;max-width:300px;margin-right:auto;margin-left:auto}}@media (max-width:575.98px){.search-container .search,.search-container .search.show,.search-container .search:focus,.search-container .search:hover{width:120px}.row-contact .single-item{position:relative;padding-left:50px;margin-bottom:15px;margin-left:15px;margin-top:15px}.row-contact .no-padding:first-child .single-item{margin-top:30px}.row-contact .no-padding:last-child .single-item{margin-bottom:40px}.logo-mrsi img{max-width:100px; width:100%;}}
    </style>

    <link rel="canonical" href="{{ Str::lower(Request::url()) }}" />
    
    <script type="text/javascript" defer src="https://afarkas.github.io/lazysizes/lazysizes.min.js"></script>   
 
   
    <script defer src="{{ URL::asset('public/front/js/bootstrap.min.js') }}"></script>
    

    @yield('faq_script')

    <style>
table td {
    border: 1px solid #000 !important;
}
</style>

@yield('checkout_script')

</head>


<body onselectstart="return false">
 <!-- ClickCease.com tracking-->
<!-- <script type='text/javascript'>var script = document.createElement('script');
script.async = true; script.type = 'text/javascript';
var target = 'https://www.clickcease.com/monitor/stat.js';
script.src = target;var elem = document.head;elem.appendChild(script);
</script>
<noscript>
<a href='https://www.clickcease.com' rel='nofollow'><img src='https://monitor.clickcease.com' alt='ClickCease'/></a>
</noscript> -->
<!-- ClickCease.com tracking-->
    
    @include('front.layout.header')
    @yield('content')
    @include('front.layout.fotter')


    <script  src="{{ URL::asset('public/front/js/owl.carousel.js') }}"></script>

    <script defer src="{{ URL::asset('public/front/js/custom.js?ver=1.3') }}"></script>
    <script defer src="{{ URL::asset('public/front/js/new_custom.js') }}"></script>

  
   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180827247-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments)
        }
        gtag('js', new Date());
        gtag('config', 'UA-180827247-1')
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TJ8VVMD');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJ8VVMD" height="0" width="0"
            class="ifrmeD"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- <script type="text/javascript">
        (function(c, l, a, r, i, t, y) {
            c[a] = c[a] || function() {
                (c[a].q = c[a].q || []).push(arguments)
            };
            t = l.createElement(r);
            t.async = 1;
            t.src = "https://www.clarity.ms/tag/" + i;
            y = l.getElementsByTagName(r)[0];
            y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "54p1jb2n19");
    </script> -->

    <script language="JavaScript">
        window.onload = function() {
            function e(e) {
                return e.stopPropagation ? e.stopPropagation() : window.event && (window.event.cancelBubble = !0), e
                    .preventDefault(), !1
            }
            document.addEventListener("contextmenu", function(e) {
                e.preventDefault()
            }, !1), document.addEventListener("keydown", function(t) {
                t.ctrlKey && t.shiftKey && 73 == t.keyCode && e(t), t.ctrlKey && t.shiftKey && 74 == t
                    .keyCode && e(t), 83 == t.keyCode && (navigator.platform.match("Mac") ? t.metaKey : t
                        .ctrlKey) && e(t), t.ctrlKey && 85 == t.keyCode && e(t), 123 == event.keyCode && e(t)
            }, !1)
        };
    </script> 

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CRZK7WDKT2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CRZK7WDKT2');
</script> 




   
<!-- Start of LiveChat (www.livechat.com)code -->
@if(request()->segment(1)=="industry-report")    

<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 17583414;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="
https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="
https://www.livechat.com/chat-with/17583414/"
rel="nofollow">Chat with us</a>, powered by <a href="
https://www.livechat.com/?welcome"
rel="noopener nofollow" target="_blank">LiveChat</a></noscript>

@endif
<!-- End of LiveChat code -->
</body>

</html>
