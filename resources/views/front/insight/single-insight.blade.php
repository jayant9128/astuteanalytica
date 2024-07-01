@extends('front.layout.default')
@section('content')
<link rel="preload" href="{{ URL::asset('public/front/css/press-release.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/press-release.css') }}"></noscript>
<script src="{{URL::asset('public/front/js/jquery-3.3.1.min.js')}}"></script>

<style>
    a:hover{
        text-decoration: underline;
    }
    
</style>

<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
            @foreach($insightData as $data)
            <div class="col-lg-12">
                <h1 class="page-title-heading">
                    <?php
                        $title = $data->astute_inside_heading;
                        echo $titles = Str::words($title, '10');
                    ?>
                </h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>Insights</li>

                </ul>
            </div>
            @endforeach

        </div>
    </div>
</section>
 <section id="service" class="single-services fixed-container services-page pt-120 pb-40">
    <!--========== My Services Info ==========-->
    <div class="container">
        <div class="row">
            

            <div class="col-lg-9 col-md-8">
                <div class="press-description">
                @foreach($insightData as $data)
                    <!-- <div class="signle-services-item">
                        <div class="title-single-service"> -->
                            <img src="{{URL::asset('public/upload/astuteInside/'.$data->astute_inside_image)}}">
                            <h2 class="mb-2">{{$data->astute_inside_heading}}</h2>
                             <p class="date-main mb-2"><i class="fa fa-calendar pr-1" aria-hidden="true"></i> {{date('M d, Y', strtotime($data->date))}}</p>
                        <!-- </div>
 -->                    <?php echo $data->astute_inside_discription;?>
                    </div>
                @endforeach
                <!-- </div> -->
            </div>

            <div class="col-lg-3 col-md-4" >
                <div class="left-side-bar sidebar-item"  >
                    <div class="widget mb-30 make-me-sticky">
                        <div class="body-widget">
                            <div class="title-widget">
                                <h3>REPORT CATEGORY</h3>
                            </div>
                            <ul class="links-services">
                                @foreach($categories as $category)
                                @if($category->is_active == "ACTIVE")
                                @if(count($category->childs))
                                 <li class="active">
                                    <a data-toggle="collapse" href="#collapse1{{$category->category_id}}" role="button" aria-expanded="false" aria-controls="collapse1">
                                        <i class="fas fa-long-arrow-alt-right"></i> {{$category->title}}
                                    </a>
                                    <ul class="collapse" id="collapse1{{$category->category_id}}">
                                        <?php $childs = $category->childs; ?>
                                        @foreach($childs as $child)
                                        @if($child->is_active == "ACTIVE")
                                        <li>
                                            <a href="{{url('industry',$child->slug)}}">
                                                <i class="fas fa-long-arrow-alt-right"></i> {{$child->title}} <!--<span>(1100)</span>-->
                                            </a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>
                                
                                @else
                                <li>
                                    <a href="{{url('industry',$category->slug)}}">
                                        <i class="fas fa-long-arrow-alt-right"></i> {{$category->title}}
                                    </a>
                                </li>
                                @endif
                                @endif
                                @endforeach
                            </ul>

                        </div>

                    
                        <a class="twitter-timeline" data-width="100%" data-height="450" data-theme="light" href="https://twitter.com/AstuteAnalytic1">Tweets by BradleyLJones</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $('.show-hidden-menu').click(function() {
            $('.hidden-menu').slideToggle("slow");
            // Alternative animation for example
            // slideToggle("fast");
        });
    });

</script>
@stop
