<!DOCTYPE html>
<html lang="en" hreflang="en">

<head>
  
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="shortcut icon" type="image/jpg" href="{{URL::asset('public/front/images/logo/logo-2.png')}}" />
    <title>
        @if(isset($page_title))
        {{$page_title}}
        @else
        @foreach($site as $sr)
        {{$sr->meta_title}}
        @endforeach
        @endif
    </title>
    <meta name="description" content="
        @if(isset($meta_description))
        {{$meta_description}}
        @else
        @foreach($site as $sr)
         {{$sr->meta_description}}
         @endforeach
        @endif
     ">
    <meta name="keywords" content="
         @if(isset($meta_keyword))
            {{$meta_keyword}}
            @else
        @foreach($site as $sr)
         {{$sr->meta_keyword}}
         @endforeach
        @endif
     ">
    @yield('meta_nofollow')

@if(Request::is('/'))
    <link rel="stylesheet" href="{{URL::asset('public/front/css/home.css')}}">
    @else
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet " id="bootstrap-css">
    <link rel="stylesheet" href="{{URL::asset('public/front/fonts/flaticon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/front/css/all.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('public/front/css/main.css')}}">
@endif

    
    <!-- <link rel="canonical" href="{{Str::lower(Request::url())}}" /> -->
    
   <!--   -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script async src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
        
 
    @yield('faq_script')

</head>

<body  onselectstart="return false">
    @if (count($errors) > 0)
    <div class="alert alert-danger vosjs" >
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="flash-message vosjs">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        </p>
        @endif
        @endforeach
    </div>
    @include('front.layout.header')
    @yield('content')
    @include('front.layout.fotter')
    

    
      <script src="{{URL::asset('public/front/js/owl.carousel.js')}}"></script>

      <script async src="{{URL::asset('public/front/js/custom.js')}}"></script>
      <script src="{{URL::asset('public/front/js/owl.carousel.js')}}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180827247-1"></script>
    <script>
      window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments)}
  gtag('js',new Date());gtag('config','UA-180827247-1')

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
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJ8VVMD" height="0" width="0" class="ifrmeD"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
   

    <script type="text/javascript">
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

    </script>

<script language="JavaScript">
  window.onload=function(){function e(e){return e.stopPropagation?e.stopPropagation():window.event&&(window.event.cancelBubble=!0),e.preventDefault(),!1}document.addEventListener("contextmenu",function(e){e.preventDefault()},!1),document.addEventListener("keydown",function(t){t.ctrlKey&&t.shiftKey&&73==t.keyCode&&e(t),t.ctrlKey&&t.shiftKey&&74==t.keyCode&&e(t),83==t.keyCode&&(navigator.platform.match("Mac")?t.metaKey:t.ctrlKey)&&e(t),t.ctrlKey&&85==t.keyCode&&e(t),123==event.keyCode&&e(t)},!1)};
</script> 
</body>

</html>
