@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-table"></i> {{$report_id}} / TOC List</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('addTOC',$id)}}"><i class="fa fa-plus"></i> Add TOC</a>
            
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
            <div class="card-box">

                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="example" class="table  table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th> S.No</th>
                                    <th> Report ID</th>
                                    <th> Title</th>
                                    <th> Description</th>
                                    <th> Amount</th>
                                    <th colspan="1">
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($tocData as $data)
                                <tr>
                                    <td>{{$i}}.</td>
                                    <td>{{$report_id}}</td>
                                    <td>{{$data->title}}</td>
                                    <td><?php echo $data->description; ?></td>
                                    <td><?php echo $data->amount; ?></td>
                                    <td class="text-center">
                                       
                                        <a href="{{route('tocUpdate',$data->toc_id)}}"><span class="basic_table_icon" style="font-size: 20px;color: green;margin-left: 20px;"><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></a>

                                        <a href="{{route('tocDelete',$data->toc_id)}}" onClick="return confirm('Are you sure for delete?');"><span class="basic_table_icon" style="font-size: 20px;color: red;margin-left: 20px;"><i class="fas fa-trash" aria-hidden="true"></i></span></a>
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
