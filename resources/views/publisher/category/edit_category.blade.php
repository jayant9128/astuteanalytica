@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-sitemap"></i>
                Edit Category
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('category_list')}}"><i class="fa fa-eye"></i> Category List</a>
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
                <form action="{{route('category_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach($category_data as $data)
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                            <input type="hidden" name="category_id" value="{{$data->category_id}}">
                            <div class="form-group">
                                <label class="control-label"> Category Title <span class="text-danger"> * </span></label>
                                <input class="form-control" type="text" name="title" autofocus required value="{{$data->title}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Category Slug <span class="text-danger"> * </span></label>
                                <input class="form-control" type="text" name="slug" autofocus required value="{{$data->slug}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Category Icon <span class="text-danger"> * </span></label>
                                <input class="form-control" type="text" name="icon" autofocus required value="{{$data->icon}}">
                            </div>
                        </div>



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Category Active <span class="text-danger"> <b> * </b> </span></label>
                                <select type="text" class="form-control" required name="is_active">
                                    <option value="">-- Please Select --</option>
                                    <option value="ACTIVE" {{$data->is_active == "ACTIVE"? "selected" : " "}}>Active</option>
                                    <option value="INACTIVE" {{$data->is_active == "INACTIVE"? "selected" : " "}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Category Show (Home Page) <span class="text-danger"> <b> * </b> </span></label>
                                <select type="text" class="form-control" required name="is_show">
                                    <option value="">-- Please Select --</option>
                                    <option value="SHOW" {{$data->is_show == "SHOW"? "selected" : " "}}>Show</option>
                                    <option value="HIDE" {{$data->is_show == "HIDE"? "selected" : " "}}>Hide</option>
                                </select>
                            </div>
                        </div>

<!--
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Category Image <span class="text-danger">(Image Dimensions - 565*407 Pixel *)</span></label>
                                <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                                <input type="hidden" name="image" value="{{$data->image}}" />
                            </div>
                        </div>-->
<!--

                        <div class="col-sm-6 pb-4">
                            <img src="{{URL::asset('public/upload/category/'.$data->image)}}" width="300px">
                        </div>
-->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Meta Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="meta_title" required placeholder="Meta Title" value="{{$data->meta_title}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Meta Keyword <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="meta_keyword" required placeholder="Meta Keyword" value="{{$data->meta_keyword}}">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Meta Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" required placeholder="Meta Description ">{{$data->description}}</textarea>
                            </div>
                        </div>
                        
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Category Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="details" required placeholder="Category Description">{{$data->details}}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
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
