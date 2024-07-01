
@extends('masters.layout.default_layout')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-bell"></i> Site Information List</h1>
            </div>
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
                    <form action="{{route('sendNotificationNow')}}" method="post">
                      @csrf
                        <div class="row col-sm-12">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Title <span class="text-danger"></span></label>
                                    <input class="form-control" type="text" name="title"  autofocus  placeholder="Title" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"> Slug <span class="text-danger"></span></label>
                                    <input class="form-control" type="text" name="slug"  autofocus  placeholder="Slug" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">  Description <span class="text-danger"></span></label>
                                    <textarea class="form-control"   name="description"  placeholder="Description" required></textarea >
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Send</button>&nbsp;
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </main>
 
   @stop