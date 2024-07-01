@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-image"></i> Add Slider</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('slider')}}"><i class="fa fa-eye"></i> Slider List</a>
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
                <form action="{{route('sliderSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-sm-12">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="title" required placeholder="Title">
                            </div>
                        </div>
                        <div class="col-sm-6">
                      <!--      <div class="form-group">
                                <label class="control-label"> Heading <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="heading" required placeholder="Heading">
                            </div>
                        </div>-->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Video Link <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="video" required placeholder="Video">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Slug <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="slug" required placeholder="Slug">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Image <span class="text-danger">(Image Dimensions - 600 * 375 Pixel)</span></label>
                                <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg" required>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Description <span class="text-danger">*</span></label>
                                <Textarea class="form-control" type="text" name="description" required placeholder="Description"></Textarea>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->



@stop
