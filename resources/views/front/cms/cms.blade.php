@extends('front.layout.default')
@section('content')
<link rel="preload" href="{{ URL::asset('public/front/css/about.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/about.css') }}"></noscript>

<style>
    #service li, ul ol{
        list-style: circle !important;
    };
    
</style>
<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="page-title-heading">
                    {{$page_title}}</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>{{$page_title}}</li>
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
            
            @foreach($cms_data as $data)
            <div class="col-lg-12">
                <?php echo $data->description; ?>
            </div>
            @endforeach
         
        </div>
    </div>
</section>



@stop
