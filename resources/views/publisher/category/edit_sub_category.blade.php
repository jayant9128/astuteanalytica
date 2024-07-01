@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-sitemap"></i> Edit Sub Category</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('sub_category',$id)}}"><i class="fa fa-eye"></i> Sub Category List</a>
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
                <form action="{{route('sub_category_update_save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach($category_data as $data)
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Sub Category Title <span class="text-danger"> * </span></label>
                                <input class="form-control" type="text" name="title" autofocus required placeholder="Sub Category Title" value="{{$data->title}}">
                                <input type="hidden" name="parent_id" value="{{$data->parent_id}}">
                                <input type="hidden" name="category_id" value="{{$data->category_id}}">
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
                                <label class="control-label">Sub Category Active <span class="text-danger"> <b> * </b> </span></label>
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

                       

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Sub Meta Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="meta_title" required placeholder=" Sub Meta Title" value="{{$data->meta_title}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Sub Meta Keyword <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="meta_keyword" required placeholder=" Sub Meta Keyword " value="{{$data->meta_keyword}}">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Sub Meta Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" required placeholder="Sub Meta Description ">{{$data->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Sub Category Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="details" required placeholder="Sub Category Description ">{{$data->details}}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
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
