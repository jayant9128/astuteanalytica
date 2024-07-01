@extends('masters.layout.default_layout')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-pencil"></i> &nbsp; Update Change Password</h1>
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
                    <form action="{{route('changePasswordUpdate')}}" method="post" >
                      @csrf
                      @foreach($user_data as $password)
                      <input type="hidden" name="id" value="{{$password->id}}">
                        <div class="row col-sm-12">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label"> Email </label>
                                    <input class="form-control" value="{{$password->email}}" type="email" name="email" id="email" required>
                                    <input type="hidden" name="id" value="{{$password->id}}">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label"> Old Password</label>
                                    <input type="password" value="{{$password->password}}" class="form-control" name="oldpassword" id="oldpassword" placeholder="Old Password" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label"> New Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="New Password" required>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;
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
