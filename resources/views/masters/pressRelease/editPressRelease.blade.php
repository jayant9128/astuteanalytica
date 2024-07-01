@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-newspaper"></i> Edit Press Release</h1>
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
                @foreach($pressReleaseDatas as $data)
                <form action="{{route('pressReleaseEditSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="press_release_id" value="{{$data->press_release_id}}">
                    <div class="row col-sm-12">

                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Category Title <span class="text-danger">*</span></label>
                                <select class="form-control" name="category_id" required>
                                    <option value=""> -- Select fied -- </option>
                                    @foreach($categoryData as $category)
                                    <option value="{{$category->category_id}}" {{$data->category_id == $category->category_id ? 'selected' : ''}}>{{$category->category_title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> -->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Heading <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="press_relase_heading" value="{{$data->press_relase_heading}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Slug <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="press_relase_slug" value="{{$data->press_relase_slug}}">
                            </div>
                        </div>

                       <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Link <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="press_relase_link" value="{{$data->press_relase_link}}">
                            </div>
                        </div>-->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Keyword <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="press_relase_keyword" value="{{$data->press_relase_keyword}}">
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
                                <label class="control-label"> Image <span class="text-danger">(Image Dimensions - 100*100 Pixel)</span></label>
                                <input class="form-control" type="file" name="press_relase_image" accept="image/x-png,image/gif,image/jpeg">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Image Alt <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="{{$data->image_alt}}" name="image_alt" placeholder="Image Alt"  >
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
                                <label class="control-label"> Descripton   <span class="text-danger">*</span></label>
                                <textarea name="press_relase_discription"  id="editor1"><?php echo $data->press_relase_discription; ?></textarea>
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
