@extends('front.layout.default')
@section('meta_nofollow')
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
@stop
@section('content')

<link rel="preload" href="{{ URL::asset('public/front/css/thankyou.css?1.4') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/thankyou.css?ver=1.3') }}"></noscript>


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
                    <li>Thankyou</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="error-page  ptb-60">  
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="error-item text-center">
                    <h1>Thankyou</h1>
                    @if($message)
                    <h2>{{$message}}</h2>
                    @else
                    <h2>Thank you for your request, it has been received successfully. Our executive will contact you soon. If you are looking for a specific report feel free to contact our representative @ +1 188842-96757 (US) / +91 0120-4251598 (REST OF WORLD)</h2>
                    @endif
                   
                </div>
            </div>
       
        </div>
    </div>  
</section>

@stop
