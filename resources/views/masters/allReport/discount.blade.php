@extends('masters.layout.default_layout')
@section('content')


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-table"></i> Report Discount </h1>
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
                @foreach($discount as $data)
                <form action="{{route('reportDiscountSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="row col-sm-12">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Start Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="start_date" autofocus required placeholder="Start Date" value="{{$data->start_date}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> End Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="end_date" autofocus required placeholder="Start Date" value="{{$data->end_date}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Single User (%) <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="single_user" autofocus required placeholder="Single User (%)" value="{{$data->single_user}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Multi User (%) <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="multi_user" autofocus required placeholder="Multi User (%)" value="{{$data->multi_user}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Corporate User (%) <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="corporate_user" autofocus required placeholder="Corporate User" value="{{$data->corporate_user}}">
                            </div>
                        </div>
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Discount Active <span class="text-danger"> <b> * </b> </span></label>
                                <select type="text" class="form-control" required name="is_active">
                                    <option value="">-- Please Select --</option>
                                    <option value="ACTIVE" {{$data->is_active == "ACTIVE"? "selected" : " "}}>Active</option>
                                    <option value="INACTIVE" {{$data->is_active == "INACTIVE"? "selected" : " "}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-sm-8">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</main>


@stop
