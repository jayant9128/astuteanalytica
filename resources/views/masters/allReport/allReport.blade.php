@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-file-alt"></i> All Report List</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('addAllReport')}}"><i class="fa fa-plus"></i> Add All Report</a>
            <!-- <a class="btn btn-primary icon-btn ml-5" href="{{route('importAllReport')}}"><i class="fa fa-upload"></i> Import File</a>-->


            <!--<form action="{{route('export')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row ">
                    <div class="col-sm-12">
                        @if(isset($categoryCode, $start_date, $end_date))

                        <input type="hidden" name="categoryCode" value="{{$categoryCode}}">
                        <input type="hidden" name="start_date" value="{{$start_date}}">

                        <input type="hidden" name="end_date" value="{{$end_date}}">
                        @elseif(isset($start_date, $end_date))
                        <input type="hidden" name="start_date" value="{{$start_date}}">

                        <input type="hidden" name="end_date" value="{{$end_date}}">

                        @endif
                        <button class="btn btn-primary icon-btn ml-5" type="submit"><i class="fa fa-download"></i>Export File</button>&nbsp;
                    </div>
                </div>
            </form>-->
        </ul>

    </div>
    <div class="row bg-white py-3">
        <div class="col-md-12">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </p>
                @endif
                @endforeach
            </div>
            <form action="{{route('allReportSearch')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row col-sm-12">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="control-label"> Category <span class="text-danger">*</span></label>
                            <select class="form-control" name="category_id">
                                <option value=""> -- Select field -- </option>
                                @foreach($categoryData as $category)
                                <option value="{{$category->category_id}}" @if(isset($categoryCode)) {{$categoryCode==$category->category_id ? 'selected' : ''}} @endif>{{$category->category_title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label"> From Date <span class="text-danger">*</span></label>
                            <input type="date" name="start_date" class="form-control" @if(isset($start_date)) value="{{$start_date}}" @endif>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label class="control-label"> To Date <span class="text-danger">*</span></label>
                            <input type="date" name="end_date" class="form-control" @if(isset($end_date)) value="{{$end_date}}" @endif>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="form-group mt-2">
                            <br>
                            <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Search</button>&nbsp;
                        </div>
                    </div>
                </div>
            </form>

            <br>
            <div class="card-box">

                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="example" class="table  table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th> S.No</th>
                                    <th>Image</th>
                                    <th> Report Id </th>
                                    <th> Category</th>
                                    <th> Report Title</th>

                                    <th> Publish Date</th>
                                    <th> External </th>

                                    <th colspan="1">
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($allReportData as $data)
                                <tr>
                                    <td>{{$i}}.</td>
                                    <td><img src="{{ 'https://d1ldvpqox0v0p3.cloudfront.net/upload/report/' .$data->image }}" width="200px"></td>
                                    <td>{{$data->report_id}}</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->report_title}}</td>


                                    <td>
                                        <?php
                                        
                                            $d=strtotime($data->publish_date);
                                            echo date("d-M-Y", $d);
                                            
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('tocList',$data->all_reports_id)}}"><span class="basic_table_icon" style="font-size: 16px;color: blue;"><i class="fas fa-eye" aria-hidden="true"> TOC</i></span></a> 
                                        <br>
                                        <a href="{{route('faqList',$data->all_reports_id)}}"><span class="basic_table_icon" style="font-size: 16px;color: green;"><i class="fas fa-eye" aria-hidden="true"> FAQ</i></span></a> 
                                         <br>
                                        <a title="Japanese FAQ" href="{{route('faqListJapanese',$data->all_reports_id)}}"><span class="basic_table_icon" style="font-size: 16px;color: blue;"><i class="fas fa-eye" aria-hidden="true"> FAQ</i></span></a> 
                                    </td>
                                    <td class="text-center">
                                        <a href="{{url('industry-report',$data->report_slug)}}" target="_blank"><span class="basic_table_icon" style="font-size: 20px;color: blue;"><i class="fas fa-eye" aria-hidden="true"></i></span></a>
                                        <a href="{{route('allReportUpdate',$data->all_reports_id)}}"><span class="basic_table_icon" style="font-size: 20px;color: green;margin-left: 20px;"><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></a>

                                        <a title="Edit Japanese" href="{{route('allJapaneseReportUpdate',$data->all_reports_id)}}"><span class="basic_table_icon" style="font-size: 20px;color: blue;margin-left: 20px;"><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></a>

                                        <a href="{{route('allReportDelete',$data->all_reports_id)}}" onClick="return confirm('Are you sure for delete?');"><span class="basic_table_icon" style="font-size: 20px;color: red;margin-left: 20px;"><i class="fas fa-trash" aria-hidden="true"></i></span></a>
                                    </td>
                                </tr>
                                @php $i++ @endphp
                                @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop
