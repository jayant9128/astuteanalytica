@extends('front.layout.default')
@section('content')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="{{URL::asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
<script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>
<script src="{{URL::asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-6">
                <h1 class="page-title-heading">{{$page_title}}</h1>
                <!-- <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>{{$page_head}}</li>
                   
                </ul> -->
            </div>
 
        </div>
    </div>
</section>
<div id="service" class="single-services services-page pt-120 pb-40">
    <!--========== My Services Info ==========-->
    <div class="container">

        <div class="row">
            <div class="col-lg-4">
                <div class="left-side-bar">


                    <div class="widget mb-30">
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
                                                <i class="fas fa-long-arrow-alt-right"></i> {{$child->title}} <span>({{$child->reportCount()}})</span>
                                            </a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </li>
                               
                                @else
                                <li>
                                    <a href="#">
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

            <div class="col-lg-8">
                <div class="text-center">
                    <h1 class="error404">404 <br>Page Not Found</h1>
                    <div class="search-screen search-screen1 position-relative open  mt-5 ">
                        <form class="input-search" action="https://www.astuteanalytica.com/searchReport" method="post">
                                <input type="search" name="searchData" placeholder="Search Here.. " required="" >
                            <button type="submit" class="search-btn2"> <i class="fas fa-search"></i> </button>
                        </form>
                    </div>
                </div>

                <div class="mt-5">
                     <div class="row section-title">
                         <div class="col-md-12">
                           <h2> Our Reports</h2>
                             <h3> Trending Reports</h3>
                         </div>
                     </div>
                     <div class="row">
                         <div class="col-12">
                             <div class="owl-carousel services-carousel  owl-theme">
                                 @foreach($allReportTreadingData as $allReportTreading)
                                 @if($allReportTreading->category_title != "Other")
                                 <!-- New Item -->
                                 <div class="services-item-one">
                                     <div class="item">
                                         <div class="img-services">
                                             <!-- Image OF Case -->
                                             <img class="" width="100%" loading="lazy" src="{{URL::asset('public/upload/report/')}}/{{$allReportTreading->image}}" alt="{{$allReportTreading->report_title}}">
                                         </div>
                                          <a href="{{url('industry-report',$allReportTreading->report_slug)}}" >
                                         <div class="content-box">
                                             <h4>
                                                 <?php
                                                     $title = $allReportTreading->report_title;
                                                      echo $titles = Str::words($title, '5');
                                                  ?>
                                             </h4>
                                             <p>
                                                 <?php
                                                     $title1 = $allReportTreading->meta_desc;
                                                      echo $titles1 = Str::words($title1, '5');
                                                  ?>
                                             </p>
                                             <a href="{{url('industry-report',$allReportTreading->report_slug)}}" class="btn-read-more">
                                                 <div class="text-btn">Read More</div>
                                                 <i class="fas fa-long-arrow-alt-right"></i>
                                             </a>
                                         </div>
                                         </a>
                                     </div>
                                </div>
                                 @endif
                                 @endforeach
                             </div>
                         </div>
                         <div class="col-12 mt-20">
                             <span class="text-link"> </span>
                             <a href="{{url('trending-report')}}" class="btn-read-more">
                                 <div class="text-btn">View More Trending Reports</div>
                                 <i class="fas fa-long-arrow-alt-right"></i>
                             </a>
                         </div>
                     </div>
                 </div>
            </div>
        </div>
    </div>
</div>
<style>
    .error404{
        font-size: 80px;
    }
    .search-screen1 {
            position: relative;
    
    visibility: visible;
    padding-left: 15px;
    padding-right: 15px;
   
    overflow: unset;
    z-index: 0;
    }
    .search-screen1 .search-btn2{
        height: 50px;
        width: 70px;
        line-height: 50px;

    }
    @media only screen and (max-width:550px){
         .error404{
            font-size: 32px;
        }
    }
</style>
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
