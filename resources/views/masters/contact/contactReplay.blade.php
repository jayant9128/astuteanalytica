@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-reply-all"></i> Contact Replay</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('contact')}}"><i class="fa fa-eye"></i> Contact Replay List</a>
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
                @foreach($contactDatas as $data)
                <form action="{{route('contactReplaySave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="contact_id" value="{{$data->contact_id}}">
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" value="{{$data->name}}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="email" value="{{$data->email}}">
                            </div>
                        </div>

                        
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Message <span class="text-danger">*</span></label>
                                <textarea name="replay_message" class="summernote" required></textarea>
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Send</button>&nbsp;
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
