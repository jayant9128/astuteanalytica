@extends('masters.layout.default_layout')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-3 col-lg-3">
                <a href="{{ url('sitemap-generate') }}">
                    <div class="widget-small primary coloured-icon"> <i class="icon fa fa-sitemap fa-3x"></i>
                </a>
                <a href="{{ url('sitemap-generate') }}">
                <div class="info pt-3">
                    <h4>XML Sitemap Generate</h4>
                   
                </div>
                </a>
            </div>
          
        </div>
    </main>
    <!---->
    <!-- <div class="row">
                <div class="col-md-6">
                    <div class="tile">
                        <h3 class="tile-title">Monthly Sales</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tile">
                        <h3 class="tile-title">Support Requests</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                        </div>
                    </div>
                </div>
            </div> -->

    </main>
@stop
