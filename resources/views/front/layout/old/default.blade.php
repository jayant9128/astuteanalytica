<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

   

    

    <link rel="shortcut icon" type="image/jpg" href="{{URL::asset('public/front/images/logo/logo-2.png')}}"/>

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

    <link rel="canonical" href="{{Request::url()}}" />

    

    <link   href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700&amp;display=swap" rel="">

    <link  href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="">



     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet " id="bootstrap-css">



    <!--<link rel="stylesheet" href="{{URL::asset('public/front/css/bootstrap.min.css')}}">-->

    <link rel="stylesheet" href="{{URL::asset('public/front/fonts/flaticon.css')}}">

    <link rel="stylesheet" href="{{URL::asset('public/front/css/all.min.css')}}">

    <link rel="stylesheet" href="{{URL::asset('public/front/css/owl.carousel.css')}}">

    <link rel="stylesheet" href="{{URL::asset('public/front/css/main.css')}}">

    <link rel="stylesheet" href="{{URL::asset('public/front/css/responsive.css')}}">

    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-180827247-1"></script>



















    <script>

      window.dataLayer = window.dataLayer || [];

      function gtag(){dataLayer.push(arguments);}

      gtag('js', new Date());

    

      gtag('config', 'UA-180827247-1');

    </script>

    <!-- Google Tag Manager -->

    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

    })(window,document,'script','dataLayer','GTM-TJ8VVMD');</script>

    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->

    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TJ8VVMD"

    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

    <!-- End Google Tag Manager (noscript) -->

    <script

  src="https://code.jquery.com/jquery-3.3.1.min.js"

  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="

  crossorigin="anonymous" async></script>

    <script>

  

        $(document).ready(function() {

            $('.has-dropdown > a').click(function(){

                location.href = this.href;

            });

        });

        

    </script>

    

    <script type="text/javascript">

    (function(c,l,a,r,i,t,y){

        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};

        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;

        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);

    })(window, document, "clarity", "script", "54p1jb2n19");

</script>

    <!-- Start of HubSpot Embed Code -->

      <!--<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/8812071.js"></script>-->

    <!-- End of HubSpot Embed Code -->

    <!-- Start of LiveChat (www.livechatinc.com) code -->

    <!-- Start of LiveChat (www.livechatinc.com) code -->

<script type="text/javascript">

  window.__lc = window.__lc || {};

  window.__lc.license = 12523485;

  ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)};

  var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){

  i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},

  get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");

  return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){

  var n=t.createElement("script");

  n.async=!0,n.type="text/javascript",

  n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};

  !n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))

</script>

<noscript>

<a href="https://www.livechatinc.com/chat-with/12523485/" rel="nofollow">Chat with us</a>,

powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a>

</noscript>

<!-- End of LiveChat code -->

</head>



<body>

    @if (count($errors) > 0)

    <div class="alert alert-danger" style="z-index:111111;position:fixed;top:0;right:0;  ">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

        <ul>

            @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    <div class="flash-message" style="z-index:111111;position:fixed;top:0;right:0;  ">

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

   



    <!--<script src="{{URL::asset('public/front/js/jquery.min.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

    <!--<script src="{{URL::asset('public/front/js/popper.min.js')}}"></script>-->

    <script async src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!--<script src="{{URL::asset('public/front/js/bootstrap.min.js')}}"></script>-->

    <script async src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    

    <script src="{{URL::asset('public/front/js/owl.carousel.js')}}"></script>

    <script async src="{{URL::asset('public/front/js/custom.js')}}"></script>

    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>

    	<script type="text/javascript">

	$("img").lazyload({

	    effect : "fadeIn"

	});

</script>

</body>

</html>


