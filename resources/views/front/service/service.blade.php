@extends('front.layout.default')
@section('content')
<link rel="preload" href="{{ URL::asset('public/front/css/services.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/services.css') }}"></noscript>
<script src="{{URL::asset('public/front/js/jquery-3.3.1.min.js')}}"></script>

<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="page-title-heading">
                    Services</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="service" class="services services-page service-inner pt-120 pb-80">
    <!--========== My Services Info ==========-->
    <div class="container">
        <div class="row">
            <!-- New Item -->
            @foreach($serviceData as $data)
            <div class="col-lg-4 col-sm-6">

                <div class="services-cart">
                    <div class="services-icon">

                    <img src="{{'https://d1ldvpqox0v0p3.cloudfront.net/upload/service/' . $data->image }}"
                     class="img-fluid" alt="{{ $data->title }}">

                    </div>
                    <h4> {{$data->title}}</h4>
                    <span></span>
                    <div class="service-p-text">
                        <p><?php echo $data->description; ?></p>
                    </div>
                </div>
                
                
            </div>
            @endforeach
        </div>
    </div>
</section>



@stop
