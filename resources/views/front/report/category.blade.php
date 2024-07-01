@extends('front.layout.default')
@section('content')
<link rel="preload" href="{{ URL::asset('public/front/css/report-list.css?ver=1.4') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/report-list.css?ver=1.4') }}"></noscript>
<script src="{{URL::asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
            @foreach($categ as $cate)
            <div class="col-lg-6">
                <h1 class="page-title-heading">{{$cate->title}}</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li><a href="{{url('/industries')}}">Industry</a></li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>
                    <?php 
                        $dt = $cate->slug;
                        $var = str_replace('-', ' ', $dt);
                        ?>
                        {{$var}}
                    </li>
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>
<div id="service" class="single-services  services-page pt-120 pb-40">
    <!--========== My Services Info ==========-->
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                
                <div class="row">
                    @foreach($reportData as $data)
                    <!-- New Item -->
                    <div class="col-lg-12">
                        <div class="blog-item">
                            <!-- Blog info -->
                            <div class="blog-info">
                                <div class="row">
                                   
                                    <div class="col-lg-12">
                                        <ul class="date">
                                            <li>Report ID: {{$data->report_id}} &nbsp;| &nbsp;
                                               @if($data->upcoming == "NO")
                                                <?php
                                                    $date = $data->publish_date; 
                                                    $date=date_create($date);
                                                    echo date_format($date,"d-M-Y");
                                                ?>
                                                @else
                                                    <?php 
                                                    
                                                   echo date('M-Y', strtotime('+3 months'));
                                                    
                                                    ?>
                                                @endif
                                               
                                               &nbsp;| &nbsp;{{$data->pages}} Pages</li>
                                            @if($data->treading == "YES")
                                            <li><span class="badge badge-trending">Top Trending</span></li>
                                            @endif
                                            @if($data->upcoming == "YES")
                                            <li><span class="badge badge-sale">Upcoming</span></li>
                                            @endif
                                            @if($data->is_sale == "YES")
                                            <li><span class="badge badge-sale">On Sale</span></li>
                                            @endif
                                            @if($data->top_selling == "YES")
                                            <li><span class="badge badge-selling">Top SELLING</span></li>
                                            @endif
                                        </ul>
                                        <div class="title-post">
                                            <a href="{{url('industry-report',$data->report_slug)}}">
                                                <h5 >
                                                    {{preg_replace("/\([^)]+\)/","",$data->report_title)}}
                                                    <span class="price">
                                                        @if($data->single_user != "")
                                                        <span class="last-price">${{$data->single_user}} </span>$ {{$data->single_user_selling}}
                                                        @else
                                                        ${{$data->single_user_selling}}
                                                        @endif
                                                        
                                                    </span>
                                                </h5>
                                                <p>{{$data->short_desc}}</p>
                                            </a>
                                            <a href="{{url('industry-report',$data->report_slug)}}" class="btn-read-more">
                                            <div class="text-btn">Read More</div>
                                            <i class="fas fa-long-arrow-alt-right"></i>
                                        </a>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="col-12">
                        <div class="blog-pagination">
                            {{ $reportData->links() }}
                        </div>
                    </div>

                </div>


            </div>
            <div class="col-lg-3 col-md-4">
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
