@extends('front.layout.default')
@section('content')
<link rel="preload" href="{{ URL::asset('public/front/css/press-release.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/press-release.css?ver=1.2') }}"></noscript>
<script src="{{URL::asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-6">
                <h1 class="page-title-heading">Press Release</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>Press Release</li>
                    
                </ul>
            </div>
         
        </div>
    </div>
</section>
<div id="service" class="single-services services-page pt-120 pb-40">
    <!--========== My Services Info ==========-->
    <div class="container">
        <div class="row">
            

            <div class="col-lg-9 col-md-8">
                <div class="row">
                    @foreach($pressReleaseData as $data)
                    <!-- New Item -->
                    <div class="col-lg-12">
                        <div class="blog-item">
                            <!-- Blog info -->
                            <div class="blog-info">
                                <div class="row">
                                    <!--<div class="col-lg-2 col-4">
                                        <img src="{{URL::asset('public/upload/pressRelease/'.$data->press_relase_image)}}" alt="{{$data->image_alt}}">
                                    </div> -->
                                    <div class="col-lg-12">
                                        <div class="title-post">
                                            <a href="{{url('press-release',$data->press_relase_slug)}}">
                                                <h5 style="width:100% !important; margin-top:0px;margin-bottom:0px;">
                                                    <?php
                                                        $title = $data->press_relase_heading;
                                                        echo $titles = Str::words($title, '20');
                                                    ?>
                                                </h5></a>
                                                <div class="mt-2">
                                                    <?php
                                                    $title1 = $data->press_relase_discription;
                                                    echo $titles1 = Str::words($title1, '50');
                                                ?>
                                                </div>
                                            
                                        </div>

                                        <a href="{{url('press-release',$data->press_relase_slug)}}" class="btn-read-more">
                                            <div class="text-btn">Read More</div>
                                            <i class="fas fa-long-arrow-alt-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="col-12">
                        <div class="blog-pagination">
                            {{ $pressReleaseData->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 ">
                <div class="left-side-bar sidebar-item">
                    <div class="widget mb-30 make-me-sticky">
                        <div class="body-widget">
                            <div class="title-widget">
                                <h3>REPORT CATEGORY</h3>
                            </div>
                            <ul class="links-services">
                                 @foreach($categories as $category)
                                @if($category->is_active == "ACTIVE")
                                @if(count($category->childs))
                                <li class="">
                                    <a data-toggle="collapse" href="#collapse1{{$category->category_id}}" role="button" aria-expanded="false" aria-controls="collapse1">
                                        <i class="fas fa-long-arrow-alt-right"></i> {{$category->title}}
                                    </a>
                                    <ul class="collapse" id="collapse1{{$category->category_id}}">
                                        <?php $childs = $category->childs; ?>
                                        @foreach($childs as $child)
                                        @if($child->is_active == "ACTIVE")
                                        <li>
                                            <a href="{{url('industry',$child->slug)}}">
                                                <i class="fas fa-long-arrow-alt-right"></i> {{$child->title}}<!-- <span>({{$child->reportCount()}})</span>-->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
