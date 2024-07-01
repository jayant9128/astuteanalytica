@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-paper-plane"></i> Edit Artical</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('artical')}}"><i class="fa fa-eye"></i> Artical List</a>
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
                @foreach($articalDatas as $data)
                <form action="{{route('articalEditSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="artical_id" value="{{$data->artical_id}}">
                    <div class="row col-sm-12">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Heading <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="artical_heading" value="{{$data->artical_heading}}">
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Slug <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="artical_slug" value="{{$data->artical_slug}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Keyword <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="artical_keyword" value="{{$data->artical_keyword}}">
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
                                <label class="control-label"> Image <span class="text-danger">(Image Dimensions - 400*400 Pixel)</span></label>
                                <input class="form-control" type="file" name="artical_image" accept="image/x-png,image/gif,image/jpeg">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Descripton   <span class="text-danger">*</span></label>
                                <textarea name="artical_discription" id="editor1"><?php echo $data->artical_discription; ?></textarea>
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
