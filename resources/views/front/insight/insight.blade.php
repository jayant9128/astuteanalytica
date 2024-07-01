@extends('front.layout.default')
@section('content')

<style>
    a:hover{
        text-decoration: underline;
    }

</style>


<link rel="preload" href="{{ URL::asset('public/front/css/blog.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/blog.css') }}"></noscript>
<script src="{{URL::asset('public/front/js/jquery-3.3.1.min.js')}}"></script>
<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
           
            <div class="col-lg-6">
                <h1 class="page-title-heading">Insights</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>Insights</li>
                    
                </ul>
            </div>
         
        </div>
    </div>
</section>
<section class="blog-page">
    <!--========== My Services Info ==========-->
    <div class="container">

        <div class="row">
            

            <div class="col-lg-9 col-md-8">
                <div class="row">
                    @foreach($insightData as $data)
                    <!-- New Item -->
                    <div class="col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-img ">
                            <img src="{{URL::asset('public/upload/astuteInside/'.$data->astute_inside_image)}}">
                                 </div>       
                            <div class="card-body insights-boxse">
                                <a href="{{url('insights',strtolower($data->astute_inside_slug))}}">
                                    <?php
                                        $title = $data->astute_inside_heading;
                                        echo $titles = Str::words($title, '20');
                                    ?>
                               
                                </a>
                                <p class="date-main mb-2"><i class="fa fa-calendar pr-1" aria-hidden="true"></i> {{date('M d, Y', strtotime($data->date))}}</p>
                                <div  class="card-text"> <?php
                                    $title = $data->astute_inside_discription;
                                    echo $titles = Str::words($title, '20');
                                ?>
                            </div>

                                 <a href="{{url('insights',strtolower($data->astute_inside_slug))}}" class="card-link">
                                <button class="btn" style="background: #de3544; color: white; font-size: 13px;">Read More</button>
                                
                            </a>
                            </div>

                           
                        </div>
                    </div>
                               
                       
                    @endforeach


                    <div class="col-12">
                        <div class="blog-pagination">
                            {{ $insightData->links() }}
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


                      
                    </div>

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
