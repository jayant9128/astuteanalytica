@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-user-circle"></i> Edit Testominal</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('testominal')}}"><i class="fa fa-eye"></i> Testominal List</a>
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
                @foreach($testominalDatas as $data)
                <form action="{{route('testominalEditSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="testominal_id" value="{{$data->testominal_id}}">
                    <div class="row col-sm-12">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{$data->name}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Designation <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="designation" value="{{$data->designation}}">
                            </div>
                        </div>

                        <!--<div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Star <span class="text-danger">*</span></label>
                                
                                <select class="form-control" name="star" required >
                                    <option value=""> -- Select Field -- </option>
                                    <option value="1" {{$data->star == "1"? "selected" : " "}}> One </option>
                                    <option value="2" {{$data->star == "2"? "selected" : " "}}> Two </option>
                                    <option value="3" {{$data->star == "3"? "selected" : " "}}> Three </option>
                                    <option value="4" {{$data->star == "4"? "selected" : " "}}> Four </option>
                                    <option value="5" {{$data->star == "5"? "selected" : " "}}> Five </option>
                                </select>
                            </div>
                        </div>-->

                      <!--  <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Image <span class="text-danger">(Image Dimensions - 200 * 200 Pixel)</span></label>
                                <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                            </div>
                        </div>
-->
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Description <span class="text-danger">*</span></label>
                                <textarea class="summernote"  id="editor1"><?php echo $data->description; ?></textarea>

                            </div>
                        </div>

                        <div class="col-sm-8">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->



@stop
