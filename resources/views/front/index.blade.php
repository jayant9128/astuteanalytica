@extends('front.layout.default')
@section('content')
<link rel="preload" href="{{ URL::asset('public/front/css/home.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/home.css') }}"></noscript>
    

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "url": "https://www.astuteanalytica.com/",
            "potentialAction": [{
                "@type": "SearchAction",
                "target": "https://www.astuteanalytica.com/search/?search={search_term_string}",
                "query-input": "required name=search_term_string"
            }]
        }
        
    </script>
    <!-- data-original="-->
    <!-- <script src="{{ URL::asset('public/front/js/jquery-3.3.1.min.js') }}"></script> -->
    <section class="home main-home">


        <div id="demo" class="carousel slide slider-banner" data-ride="carousel">
            <?php
            $j = 0;
            $m = 0;
            ?>
            <ul class="carousel-indicators">
                <?php if ($m == 0) {
                    $act = 'active';
                } else {
                    $act = '';
                } ?>
                @foreach ($slidereData as $data)
                    <li data-target="#demo" data-slide-to="{{ $m }}" class="{{ $act }}"></li>

                    <?php $m++; ?>
                @endforeach
            </ul>

            <div class="carousel-inner">
                @foreach ($slidereData as $data)
                    <?php if ($j == 0) {
                        $act = 'active';
                    } else {
                        $act = '';
                    } ?>
                    <div class="carousel-item {{ $act }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <div class="slider-content d-flex align-items-center">
                                        <div class="contant-text-slider">
                                        <h5>{{ $data->title }}</h5>
                                        <p>{{ $data->description }}</p>

                                        <div class="banner-btn mt-5">
                                            <!-- Button One -->
                                            <a href="{{ url($data->slug) }}" class="main-btn-two ">
                                                <div class="text-btn">
                                                    <span class="text-btn-one">Get Started</span>
                                                    <span class="text-btn-two">Get Started</span>
                                                </div>
                                                <div class="arrow-btn">
                                                    <span class="arrow-one"><i class="fa fa-caret-right"></i></span>
                                                    <span class="arrow-two"><i class="fa fa-caret-right"></i></span>
                                                </div>
                                            </a>
                                            {{-- <a href="{{$data->video}}" data-lity class="play-video">
                                         <div class="play"><i class="fa fa-play"></i></div> <span>View Now!</span>
                                     </a> --}}
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-6   text-center">
                                    <div class="banner-imgmb d-flex align-items-center">
                                        <img data-src="{{ URL::asset('public/upload/slider/' . $data->image) }}"
                                            alt="{{ $data->title }}" class="img-fluid lazyload">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $j++;?>
                @endforeach




                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"><i class="fa fa-angle-left fa-2x"></i></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"><i class="fa fa-angle-right fa-2x"></i></span>
                </a>
            </div>
        </div>
    </section>



    <section class="news-type-slider-sec pt-4 pb-4">
        <div class="container">
            <div class="news-cetagory">
                <div class="owl-carousel owl-theme news-type-slider">
                    @foreach ($cateData as $category)
                        <div class="item">
                            <div class="icon-holder">
                                <a href="{{ url('industry', $category->slug) }}">
                                    <div class="cate_icon mx-auto">
                                        <i class="{{ $category->icon }}"></i>
                                    </div>
                                    <h6>{{ $category->title }}</h6>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section class="our-report">
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h4 class="hadding">Our Reports</h4>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6 pr-md-5 mb-4 border-rigth">
                    <div class="title-child">
                        <h4>Latest Reports</h4>
                    </div>
                    <ul class="report-lest">
                        @foreach ($allReportLatestData as $allReportLatest)
                            @if ($allReportLatest->category_title != 'Other')
                                <li>
                                    <a href="{{ url('industry-report', $allReportLatest->report_slug) }}">
                                        <h5 class="text-justify"> <a
                                                href="{{ url('industry-report', $allReportLatest->report_slug) }}">
                                                <?php
                                                $title = $allReportLatest->report_title;
                                                echo $titles = Str::words($title, '10');
                                                ?></a></h5>
                                        <p class="text-justify">
                                            <?php
                                            $title1 = $allReportLatest->short_desc;
                                            echo $titles1 = Str::words($title1, '22');
                                            ?>
                                        </p>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                    <center>
                        <a href="{{ url('latest-report') }}" class="main-btn-two ">
                            <div class="text-btn">
                                <span class="text-btn-one">View all Latest Report</span>
                                <span class="text-btn-two">View all Latest Report</span>
                            </div>
                            <div class="arrow-btn">
                                <span class="arrow-one"><i class="fa fa-caret-right"></i></span>
                                <span class="arrow-two"><i class="fa fa-caret-right"></i></span>
                            </div>
                        </a>
                    </center>
                </div>
                <div class="col-md-6 pl-md-5 mb-4">
                    <div class="title-child">
                        <h4>Trending Reports</h4>
                    </div>
                    <ul class="report-lest">
                        @foreach ($allReportTreadingData as $allReportTreading)
                            @if ($allReportTreading->category_title != 'Other')
                                <li>
                                    <a href="{{ url('industry-report', $allReportTreading->report_slug) }}">
                                        <h5 class="text-justify"><a
                                                href="{{ url('industry-report', $allReportTreading->report_slug) }}">
                                                <?php
                                                $title = $allReportTreading->report_title;
                                                echo $titles = Str::words($title, '10');
                                                ?></a></h5>
                                        <p class="text-justify">
                                            <?php
                                            $title1 = $allReportTreading->short_desc;
                                            echo $titles1 = Str::words($title1, '22');
                                            ?>
                                        </p>
                                    </a>
                                </li>
                            @endif
                        @endforeach

                    </ul>
                    <center>
                        <a href="{{ url('trending-report') }}" class="main-btn-two ">
                            <div class="text-btn">
                                <span class="text-btn-one">View all Trending Report</span>
                                <span class="text-btn-two">View all Trending Report</span>
                            </div>
                            <div class="arrow-btn">
                                <span class="arrow-one"><i class="fa fa-caret-right"></i></span>
                                <span class="arrow-two"><i class="fa fa-caret-right"></i></span>
                            </div>
                        </a>
                    </center>
                </div>
            </div>
        </div>
    </section>







    <section id="about " class="about ">
        <div class="about-one pt-60 pb-60 bg-image-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hadding-title">
                            <h4>Press Release</h4>
                            <h5>Press Release For all Industries</h5>
                        </div>
                    </div>
                    <div class="col-md-12 mb-30">
                        <div class="info-about">
                            <div class="row mb-10">

                                @foreach ($pressReleaseData as $data)
                                    <div class="col-md-6">
                                        <a href="{{ url('press-release', $data->press_relase_slug) }}"
                                            class="reports-cord">
                                            <div class="reports-icon">
                                                <img width="50" height="50" data-src="{{ URL::asset('public/upload/pressRelease/' . $data->press_relase_image) }}"
                                                    class="img-fluid lazyload" alt="{{ $data->image_alt }}">
                                            </div>
                                            <div class="reports-content ">
                                                <p>
                                                    <?php
                                                    $title = $data->press_relase_heading;
                                                    echo $titles = Str::words($title, '12');
                                                    ?>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach





                            </div>
                            <!-- Btn Two -->
                            <center>
                                <a href="{{ url('press-release') }}" class="main-btn-two  ">
                                    <div class="text-btn">
                                        <span class="text-btn-one">See All</span>
                                        <span class="text-btn-two">See All</span>
                                    </div>
                                    <div class="arrow-btn">
                                        <span class="arrow-one"><i class="fa fa-caret-right"></i></span>
                                        <span class="arrow-two"><i class="fa fa-caret-right"></i></span>
                                    </div>
                                </a>
                            </center>
                        </div>
                    </div>
                    <!--<?php $kl = 1; ?>
                                        //@foreach ($pressReleaseData as $dt)
                                            @if ($kl == 1)
                                                <div class="col-md-4 mb-30">
                                                    <div class="about-img-one">
                                                        <img class="" width="100%" loading="lazy"
                                                            src="{{ URL::asset('public/front/images/ipad.png') }}">
                                                        
                                                    </div>
                                                </div>
                        @else
                                            @break
                                        @endif
                                        <?php
                                        //$kl++;
                                        ?>
                                       // @endforeach -->
                </div>
            </div>
        </div>
    </section>
    <div class="statistics pt-60">
        <!-- <div class="overlay"></div> -->
        <div class="container">
            <div class="row section-title">
                <div class="col-md-12">
                    <div class="hadding-title-statec">
                        <h4>STatistics</h4>
                        <h5>Why Astute?</h5>
                    </div>
                </div>
                <!-- <div class="col-md-5">
                                                                     <p class="p-title-section color-gray">
                                                                         @foreach ($whyAstute1 as $whyAstute)
                                                                         @if ($whyAstute->why_astute_id == 2)
                                                                         {{ $whyAstute->number }}
                                                                         @break
                                                                         @endif
                                                                         @endforeach
                                                                     </p>
                                                                 </div>
                                                     -->
            </div>
            <div class="row pb-30">
                @foreach ($whyAstute1 as $whyAstute)
                    @if ($whyAstute->why_astute_id == 2)
                        @continue
                    @endif
                    <div class="col-md-3 col-sm-6 col-6">
                        <div class="stat-item counter">
                            <span class="{{ $whyAstute->icon }}"></span>
                            <div class="count timer count-title count-number" data-from="1"
                                data-to="{{ $whyAstute->number }}" data-speed="3000"></div>
                            <p class="text">{{ $whyAstute->heading }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <section class="portfolio portoflio-one ptb-60">
        <div class="container">
            <div class="row section-title">
                <div class="col-md-12">
                    <div class="hadding-title-recent">
                        <h4>REcently Solved</h4>
                        <h5>Other Services</h5>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 pl-md-5 pr-md-5">
                    <div class="owl-carousel case-one">
                        @foreach ($services as $data1)
                            <!-- New Item -->
                            <div class="case-item">
                                <div class="item">
                                    <div class="services-cart">
                                        <div class="services-icon">
                                            <img width="50" height="50" data-src="{{ URL::asset('public/upload/service/') }}/{{ $data1->image }}"
                                                class="img-fluid lazyload" alt="{{ $data1->title }}">
                                        </div>
                                        <h4>{{ $data1->title }} </h4>
                                        <span></span>
                                        <div class="service-p-text">
                                            <p><?php echo $data1->description; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div id="testimonials" class="testimonials-one ptb-60">

        <div class="container">
            <div class="row section-title">
                <div class="col-md-12 ">

                    <div class="testimonial-tilte">
                        <h2>Testimonials</h2>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="content-testimonial">
                        <!--Testimonials Item -->
                        <div class="owl-carousel testimonial-one owl-theme ">
                            @foreach ($testominalData as $dt)
                                <!-- New Item -->
                                <div class="testmonail-item ">
                                    <div class="item ">
                                        <div class="testmonail-box">
                                            <div class="icon-quote">
                                                <span class="flaticon-quote"></span>
                                            </div>
                                            <div class="inner-test d-flex align-items-center">
                                                <p class="text">
                                                    <?php echo $dt->description; ?>
                                                </p>
                                            </div>
                                            <div class="authore-client">

                                                <div class="author-details">
                                                    <h6> {{ $dt->name }}</h6>
                                                    <span>{{ $dt->designation }} </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="clients" class="clients ptb-60">
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
                                    <img  width="157" height="98"class="lazyload"  width="100%" 
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
    </div>
    <!-- Scroll To Top -->
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
