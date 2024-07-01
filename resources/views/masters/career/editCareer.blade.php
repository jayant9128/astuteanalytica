@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-file-alt"></i> Edit Career</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('career')}}"><i class="fa fa-eye"></i> All Report List</a>
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
                @foreach($careerDatas as $data)
                <form action="{{route('careerEditSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="career_id" value="{{$data->career_id}}">
                    <div class="row col-sm-12">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="date" value="{{$data->date}}">
                            </div>
                        </div>

                        <!--<div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Job Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="job_title" value="{{$data->job_title}}">
                            </div>
                        </div>-->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Designtation <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="designtation" value="{{$data->designtation}}">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Description<span class="text-danger">*</span></label>
                                <textarea name="description" class="summernote"> <?php echo $data->description; ?></textarea>
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
