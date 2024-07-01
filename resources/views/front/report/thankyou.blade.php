@extends('front.layout.default')
@section('content')
<link rel="preload" href="{{ URL::asset('public/front/css/thankyou.css?ver=1.5') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/thankyou.css?ver=1.5') }}"></noscript>
<script src="{{URL::asset('public/front/js/jquery-3.3.1.min.js')}}"></script>

<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="page-title-heading">
                   Thankyou</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>{{$act_bar}}</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<section class="error-page  ptb-120 thanku">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="error-item text-center">
                        <h1>Thank You</h1>
                        <p class="mb-0">Thank you for your request, it has been received successfully. Our executive will contact you soon. If you are looking for a specific report feel free to contact our representative @ +1 188842-96757 (US) / +91 0120-4251598 (REST OF WORLD).
                        </p>
                       <p> </p>
                        <ul class="social-media">
                            @foreach($site as $siteData)
                            <li><a href="{{$siteData->facebook}}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{$siteData->twitter}}" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a></li>
                            <!--<li><a href="{{$siteData->instagram}}" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a></li>-->
                            <li><a href="{{$siteData->linkedin}}" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <div id="testimonials" class="testimonials ptb-120">

        <div class="container">

            <div class="row section-title">

                <div class="col-md-5">
                    <h2>Our testimonials</h2>
                    <h3> What our clients say </h3>
                </div>

                <div class="col-md-5">
                    <p class="p-title-section">Our Strategies At Work Are The Means By Which To Achieve The Desired Goals, And Achieve Your Goals And Dreams Here</p>
                </div>


            </div>


            <div class="row mrl-row">
                <div class="col-12 no-padding">
                    <!--Testimonials Item -->
                    <div class="owl-carousel testimonial-two">
                        <!-- New Item -->
                         @foreach($testominalData as $dt)
                        <div class="testmonail-item">
                            <div class="item">
                                <div class="testmonail-box">
                                    <div class="quote-icon">
                                        <i class="fas fa-quote-left fa-2x"></i>
                                    </div>
                                    <div class="author-details">
                                        <h6> {{$dt->name}}</h6>
                                            <span>{{$dt->designation}} </span>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="inner-test contentDiv elel">
                                        <p class="text"><?php echo $dt->description; ?></p>
                                    </div>
                                    <div class="readBtn">Read More...</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="clients" class="clients ptb-120">
    <div class="overlay"></div>
     <div class="container">
         <div class="row section-title">
             <div class="col-md-5">
                 <h2> Our Clients </h2>
                 <h3>we have served more than 2000</h3>
             </div>
             <div class="col-md-5">
                 <!--<p class="p-title-section">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore et dolore magna aliqua.</p>-->
             </div>
         </div>
     </div>
    <div class="container">
        <div class="row">
            <!--Testimonials Item -->
          

            <div class="col-12 pl-md-5 pr-md-5 ">
                    <div class=" owl-carousel sponsor-new owl-theme">
                        @foreach ($ourClientData as $ourClient)
                            <!-- New Item -->
                            <div class="item">
                                <div class="sponsor-item">
                                    <img  width="100%" 
                                        src="{{ URL::asset('public/upload/ourClient/' . $ourClient->image) }}"
                                        alt="Our Client">
                                </div>
                            </div>
                        @endforeach
                        <!-- New Item -->
                    </div>
                </div>


        </div>
    </div>

</div>
<!-- Global site tag (gtag.js) - Google Ads: 767028314 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-767028314"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-767028314');
</script>

@stop
