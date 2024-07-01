@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-file-alt"></i> Request Sample List</h1>
        </div>

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
                                    <th> Date</th>
                                    
                                    <th> Request Type </th>
                                    <th> Report Title</th>
                                    <th> Name</th>
                                    <th> Contact</th>
                                    <th> Email</th>
                                    <th> Job Title</th>
                                    <th> Message</th>
                                    <th> Company</th>
                                    <th> Country</th>
                                    <th colspan="1">
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($requestSampleData as $data)
                                <tr>
                                    <td>{{$i}}.</td>
                                    <td>{{$data->date}}</td>
                                    
                                    <td>{{$data->request_sample_type}}</td>
                                    @if ($data->is_jap > 0)
                                    <td>{{$data->new_report_title}}</td>
                                    @else
                                     <td>{{$data->report_title}}</td>
                                     @endif
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->phone}}</td>
                                   
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->job_title}}</td>
                                    <td>{{$data->message}}</td>
                                    <td>{{$data->company}}</td>
                                    <td>{{$data->country}}</td>
                                   
                                    <td class="text-center">
                                        <a href="{{route('requestSampleDelete',$data->request_sample_id)}}" onClick="return confirm('Are you sure?');"><span class="basic_table_icon" style="font-size: 20px;color: red;margin-left: 20px;"><i class="fas fa-trash" aria-hidden="true"></i></span></a>
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
