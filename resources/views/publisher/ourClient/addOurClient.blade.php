@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-users"></i> Add Our Client</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('ourClient')}}"><i class="fa fa-eye"></i> Our Client List</a>
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
                <form action="{{route('ourClientSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-sm-12">

                        <!--<div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Company Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="company_name" autofocus required placeholder="Company Name">
                            </div>
                        </div>-->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Category <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id" required>
                                    <option value=""> -- Select field -- </option>
                                    @foreach($categoryData as $category)
                                    <option value="{{$category->category_id}}" class="font-weight-bold">{{$category->title}}</option>
                                    <?php $childs = $category->childs; ?>
                                    @if(count($category->childs))
                                    @foreach($childs as $child)
                                    <option value="{{$child->category_id}}"> - {{$child->title}}</option>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Image <span class="text-danger">(Image Dimensions - 160*100 Pixel)</span></label>
                                <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg" required>
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
