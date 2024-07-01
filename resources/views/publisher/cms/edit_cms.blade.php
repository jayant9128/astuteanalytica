@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-file-alt"></i>  
                Edit CMS Page
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <a class="btn btn-primary icon-btn" href="{{route('cms_page')}}"><i class="fa fa-eye"></i>CMS Page List</a>
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
                <form action="{{route('cms_update_save')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @foreach($cms_data as $data)
                    <div class="row">
                        <input type="hidden" name="cms_id" value="{{$data->cms_id}}">
                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                
                                <label class="control-label"> Page Title <span class="text-danger"> * </span></label>
                                <input class="form-control" type="text" name="title" autofocus value="{{$data->title}}">
                            </div>
                        </div> -->
                        <!--<div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Page Slug <span class="text-danger"></span></label>
                                <input class="form-control" type="text" name="slug" required value="{{$data->slug}}">
                            </div>
                        </div>-->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Meta Title <span class="text-danger"> *</span></label>
                                <input class="form-control" type="text" name="meta_title" value="{{$data->meta_title}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Meta Keyword <span class="text-danger"> * </span></label>
                                <input class="form-control" type="text" name="meta_keywords" value="{{$data->meta_keywords}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Meta Description <span class="text-danger"> * </span></label>
                                <input class="form-control" type="text" name="meta_description" value="{{$data->meta_description}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Page Description <span class="text-danger"> * </span></label>
                                <textarea name="description"  id="editor1">{{$data->description}}</textarea>
                            </div>
                        </div>
                        
                        
                        <div class="col-sm-12">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</main>
    <!-- Essential javascripts for application to work-->



@stop
