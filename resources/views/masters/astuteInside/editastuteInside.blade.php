@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-newspaper"></i> Edit Astute Inside</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('astuteInside')}}"><i class="fa fa-eye"></i> Astute Inside List</a>
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
                @foreach($astuteInsideDatas as $data)
                <form action="{{route('astuteInsideEditSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="astute_inside_id" value="{{$data->astute_inside_id}}">
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Inside Category <span class="text-danger">*</span></label>
                                <select class="form-control" name="inside_cate_id" required>
                                    <option value=""> -- Select field -- </option>
                                    @foreach($inside_cate as $category)
                                    <option value="{{$category->inside_cate_id }}" {{$category->inside_cate_id == $data->inside_cate_id ? 'selected' : ''}} class="font-weight-bold">{{$category->title}}</option>
                                  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Heading <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="astute_inside_heading" value="{{$data->astute_inside_heading}}">
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Slug <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="astute_inside_slug" value="{{$data->astute_inside_slug}}">
                            </div>
                        </div>

                      

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="date" value="{{$data->date}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Image <span class="text-danger">(Image Dimensions - 1000*400 Pixel)</span></label>
                                <input class="form-control" type="file" name="astute_inside_image" accept="image/x-png,image/gif,image/jpeg">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Meta Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="meta_title" placeholder="Meta Title"  value="{{$data->meta_title}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Meta Keyword <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="key_words" placeholder="Meta Keyword"  value="{{$data->key_words}}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Meta Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="meta_desc" placeholder="Meta Description" value="" required>{{$data->meta_desc}}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Descripton  <span class="text-danger">*</span></label>
                                <textarea name="astute_inside_discription" id="editor1"><?php echo $data->astute_inside_discription; ?></textarea>
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
