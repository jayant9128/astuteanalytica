@extends('front.layout.default')
@section('content')
<link rel="preload" href="{{ URL::asset('public/front/css/report-list.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/report-list.css?ver=1.3') }}"></noscript>
<script src="{{URL::asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
<style type="text/css">
    .read-more-show{
      cursor:pointer;
      color: #ed8323;
    }
    .read-more-hide{
      cursor:pointer;
      color: #ed8323;
    }

    .hide_content{
      display: none;
    }
</style>
<script type="text/javascript">
// Hide the extra content initially, using JS so that if JS is disabled, no problemo:
            $('.read-more-content').addClass('hide_content')
            $('.read-more-show, .read-more-hide').removeClass('hide_content')

            // Set up the toggle effect:
            $('.read-more-show').on('click', function(e) {
              $(this).next('.read-more-content').removeClass('hide_content');
              $(this).addClass('hide_content');
              e.preventDefault();
            });

            // Changes contributed by @diego-rzg
            $('.read-more-hide').on('click', function(e) {
              var p = $(this).parent('.read-more-content');
              p.addClass('hide_content');
              p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
              e.preventDefault();
            });
</script>
<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">

            <div class="col-lg-6">
                <h1 class="page-title-heading">Industries</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>Industries</li>

                </ul>
            </div>

        </div>
    </div>
</section>
<section id="service" class="services services-page pt-120 pb-90">
    <!--========== My Services Info ==========-->
    <div class="container">
       
        <div class="row">
            <!-- Services Items Column -->
            @foreach($cate_data as $data)
            <div class="col-md-6 col-lg-4">
                <a href="{{url('industry',$data->slug)}}">
                    <div class="services-item-three">
                        <div class="content-box">
                            <span class=""><i class="{{$data->icon}}"></i></span>
                            <h4> {{$data->title}}</h4>
                            <!--<p>{{$data->description}}</p>-->
                            <a href="{{url('industry',$data->slug)}}" class="btn-read-more">
                                <div class="text-btn">Read More</div>
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
    <section id="clients" class="clients ptb-60">
        <div class="overlay"></div>
        <div class="container">
            <div class="row section-title">

                <div class="col-md-12">
                    <div class="hadding-title mb-4">
                        <h4>Our Clients</h4>
                        <h5>we have served more than 2000</h5>
                    </div>
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
                                    <img class="lazyload"  width="100%" 
                                        data-src="{{ URL::asset('public/upload/ourClient/' . $ourClient->image) }}"
                                        alt="Our Client">
                                </div>
                            </div>
                        @endforeach
                        <!-- New Item -->
                    </div>
                </div>
            </div>
        </div>
</section>
@stop
