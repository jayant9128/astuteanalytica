@extends('front.layout.default')
@section('content')
<link rel="preload" href="{{ URL::asset('public/front/css/report-list.css?ver=1.4') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/report-list.css?ver=1.4') }}"></noscript>
<script src="{{URL::asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
<style>
    #more {
        display: none;
        transition: all 1s ease;;
    }
    .details
    {
        transition: all 1s ease;;
        
    }

</style>
<script>
    function myFunction() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    }

</script>
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
<section id="service" class="services services-page pt-120 pb-90">
    <!--========== My Services Info ==========-->
    <div class="container">
        <div class="row">
            @foreach($cur_data as $cat)
            <div class="col-12 details mb-4">

                <?php
                 $string1 = $cat->details;
                 echo $story_desc = substr($string1,0,600);
                 echo "<span id='dots'>...</span><span id='more'>";
                 echo $story_desc = substr($string1,600,strrpos($string1,' '));
                 echo "</span>"
                 ?>

                <button onclick="myFunction()" id="myBtn" class="font-weight-bold" style="border:0px; background:transparent;color:#C30C17;">Read more</button>

            </div>
            @endforeach
        </div>
        <div class="row">
            <!-- Services Items Column -->
            @foreach($cate_data as $data)
            <div class="col-md-6 col-lg-4">
                <a href="{{url('industry',$data->slug)}}">
                    <div class="services-item-three">
                        <div class="content-box">
                            <span class=""><i class="{{$data->icon}}"></i></span>
                            <h4> {{$data->title}}</h4>
                            <!--<p>
                            <?php
                               $des =  $data->description;
                            ?>
                            
                            {{$data->description}}
                        </p>-->
                            <a href="{{url('industry',$data->slug)}}" class="btn-read-more">
                                <div class="text-btn">Read More</div>
                                <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="mt-3">
                @foreach($reportData as $data)
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
                                                    <span class="last-price">${{$data->single_user}} </span>$ {{$data->single_user_selling}}
                                                    @else
                                                    ${{$data->single_user_selling}}
                                                    @endif
                                                  
                                                </span>
                                            </h5>
                                            <p>{{$data->short_desc}}
                                            </p>
                                            <a href="{{url('industry-report',$data->report_slug)}}" class="btn-read-more">
                                                <div class="text-btn">Read More</div>
                                                <i class="fas fa-long-arrow-alt-right"></i>
                                            </a>

                                        </a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-sm-12">
                <div id="clients" class="clients ptb-120">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row">
                            <!--Testimonials Item -->
                            <div class="owl-carousel sponsor-new owl-theme">
                                @foreach($ourClientData as $ourClient)
                                <!-- New Item -->
                                <div class="item">
                                    <div class="sponsor-item">
                                        <img src="{{URL::asset('public/upload/ourClient/'.$ourClient->image)}}" alt="sponsor" width="100%">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $("marquee").hover(function() {
            this.stop()
        }, function() {
            this.start()
        }), $(".screen").each(function() {
            var e = $(this).find("img").height();
            $(".screen img").css("bottom", 521 - e)
        });
        var e = $("#mockup-slider"),
            t = $("#mockup-slider-titles");
        e.owlCarousel({
            autoplayHoverPause: !0,
            loop: !0,
            navigation: !0,
            mouseDrag: !0,
            margin: 30,
            smartSpeed: 1e3,
            autoplay: 2e3,
            dots: !0,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        }), t.owlCarousel({
            autoplayHoverPause: !0,
            loop: !0,
            navigation: !0,
            mouseDrag: !0,
            margin: 30,
            smartSpeed: 1e3,
            autoplay: 2e3,
            dots: !0,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        }), $(".next").click(function() {
            e.trigger("owl.next"), t.trigger("owl.next")
        }), $(".prev").click(function() {
            e.trigger("owl.prev"), t.trigger("owl.prev")
        })
    });
</script>
@stop
