@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-image"></i> Slider List</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('addSlider')}}"><i class="fa fa-plus"></i> Add Slider</a>
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
                                    <th>Title</th>
                                    <th> Image </th>
                                   
                                    <th> Active </th>
                                    <th colspan="1">
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($sliderData as $data)
                                <tr>
                                    <td>{{$i}}.</td>
                                    <th>{{$data->title}}</th>
                                    <td><img src="{{URL::asset('public/upload/slider/'.$data->image)}}" width="200px"></td>
                                    
                                    
                                    <td class="text-center">
                                        <b>{{$data->is_active}}</b> <br>
                                        <form class="mt-4" action="{{route('sliderStatusUpdate')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="slider_id" value="{{$data->slider_id}}">
                                            <select class="form-control" required name="is_active">
                                                <option value="">--Select--</option>
                                                <option value="ACTIVE" {{$data->is_active == "ACTIVE" ? 'selected' : ''}}>Active</option>
                                                <option value="INACTIVE" {{$data->is_active == "INACTIVE" ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                            <input type="submit" value="Update" class="form-control mt-2 btn-info">
                                        </form> 

                                    </td>
                                        
                                    <td class="text-center">
                                        <a href="{{route('sliderUpdate',$data->slider_id)}}"><span class="basic_table_icon" style="font-size: 20px;color: green;"><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></a>
                                        <a href="{{route('sliderDelete',$data->slider_id)}}" onClick="return confirm('Are you sure?');"><span class="basic_table_icon" style="font-size: 20px;color: red;margin-left: 20px;"><i class="fas fa-trash" aria-hidden="true"></i></span></a>
                                    </td>
                                </tr>
                                @php $i++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop
