@extends('front.layout.default')
@section('content')
<link rel="preload" href="{{ URL::asset('public/front/css/report-list.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/report-list.css?ver=1.2') }}"></noscript>
<script src="{{URL::asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-6">
                <h1 class="page-title-heading">{{$page_title}}</h1>
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
<div id="service" class="single-services services-page pt-120 pb-40">
    <!--========== My Services Info ==========-->
    <div class="container">

        <div class="row">
            

            <div class="col-lg-9 col-md-8">
                <!--<div class="row">
                    <div class="col-md-4 col-lg-8">
                        <span class="results">Showing all 6 results</span>
                    </div>
                    <div class="col-md-8 col-lg-4">
                        <select name="subject" title="subject" class="chosen-select" tabindex="1" style="display: none;">
                            <option>default sorting</option>
                            <option>Sort by popularity</option>
                            <option>Sort by average rating</option>
                            <option>Sort by latest</option>
                            <option>Sort by price: low to high</option>
                            <option>Sort by price: high to low</option>

                        </select>
                        <div class="nice-select chosen-select" tabindex="0"><span class="current">Sort by popularity</span>
                            <ul class="list">
                                <li data-value="default sorting" class="option focus">default sorting</li>
                                <li data-value="Sort by popularity" class="option selected">Sort by popularity</li>
                                <li data-value="Sort by average rating" class="option">Sort by average rating</li>
                                <li data-value="Sort by latest" class="option">Sort by latest</li>
                                <li data-value="Sort by price: low to high" class="option">Sort by price: low to high</li>
                                <li data-value="Sort by price: high to low" class="option">Sort by price: high to low</li>
                            </ul>
                        </div>


                    </div>

                </div>-->
                <div class="row">
                    @foreach($reportData as $data)
                    <!-- New Item -->
                     <div class="col-lg-12">
                        <div class="blog-item">
                            <!-- Blog info -->
                            <div class="blog-info">
                                <div class="row">
                                   
                                    <div class="col-md-12">
                                        <ul class="date">
                                            <li>Report ID: {{$data->report_id}} &nbsp;| &nbsp;
                                                <?php
                                                $date = $data->publish_date; 
                                                $date=date_create($date);
                                                echo date_format($date,"d-M-Y");
                                            ?>&nbsp;| &nbsp;{{$data->pages}} Pages</li>
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
                                                    {{$data->report_title}}
                                                    <span class="price">
                                                        @if($data->single_user != "")
                                                        <span class="last-price">${{$data->single_user}}</span>$ {{$data->single_user_selling}}
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

                    <!-- <div class="widget mb-30">
                        <div class="body-widget">
                            <div class="title-widget">
                                <h3>Our Brochures</h3>
                            </div>

                            <ul class="lists-brochures">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-download"></i>
                                        Company Profile
                                        <span>pdf</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-download"></i>
                                        Presentation
                                        <span>pdf</span>
                                    </a>
                                </li>




                            </ul>

                        </div>

                    </div>-->

                    <!--<div class="widget mb-30">
                        <div class="body-widget">
                            <div class="title-widget">
                                <h3>How Can We Help You</h3>
                            </div>

                            <div class="inner-widget">
                                <p>Lorem ipsum dolor consectetur adipisicing elit do eiusm incididunt a labore et dolore magna aliqua consectetur adipisicing elit</p>

                                <a href="#" class="main-btn-two">
                                    <div class="text-btn">
                                        <span class="text-btn-one">Contact Us</span>
                                        <span class="text-btn-two">Contact Us</span>
                                    </div>
                                    <div class="arrow-btn">
                                        <span class="arrow-one"><i class="fas fa-caret-right"></i></span>
                                        <span class="arrow-two"><i class="fas fa-caret-right"></i></span>
                                    </div>
                                </a>
                            </div>

                        </div>

                    </div>-->



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



