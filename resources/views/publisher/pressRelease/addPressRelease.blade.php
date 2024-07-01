@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-newspaper"></i> Add Press Release</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('pressRelease')}}"><i class="fa fa-eye"></i> Press Release List</a>
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
                <form action="{{route('pressReleaseSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-sm-12">

                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Category Title <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id" required autofocus>
                                    <option value=""> -- Select fied -- </option>
                                    @foreach($categoryData as $category)
                                    <option value="{{$category->category_id}}">{{$category->category_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> -->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Heading <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="press_relase_heading" required placeholder="Heading">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Slug <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="press_relase_slug" placeholder="Slug">
                            </div>
                        </div>

                      <!--  <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Link <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="press_relase_link" placeholder="Link">
                            </div>
                        </div>-->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Keyword <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="press_relase_keyword" required placeholder="Keyword">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="date" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Image <span class="text-danger">(Image Dimensions - 100*100  Pixel)</span></label>
                                <input class="form-control" type="file" name="press_relase_image" accept="image/x-png,image/gif,image/jpeg" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Image Alt <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="image_alt" placeholder="Image Alt"  >
                            </div>
                        </div>
                        {{-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Report Image <span class="text-danger">(Image Dimensions - 800** Pixel)</span></label>
                                <input class="form-control" type="file" name="report_image" accept="image/x-png,image/gif,image/jpeg">
                            </div>
                        </div> --}}
                         <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Meta Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="meta_title" placeholder="Meta Title"  >
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Meta Keyword <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="key_words" placeholder="Meta Keyword">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Meta Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="meta_desc" placeholder="Meta Description" required></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Descripton   <span class="text-danger">*</span></label>
                                <textarea name="press_relase_discription" id="editor1" ></textarea>
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
