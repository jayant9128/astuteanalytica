@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-sitemap"></i> Add User</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('user-list')}}"><i class="fa fa-eye"></i> Users List</a>
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
                <form action="{{route('newuserstore')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" autofocus required placeholder="First Name">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Last Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="lname"  required placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email"  required placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Password <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="password"  required placeholder="password">
                            </div>
                        </div>

                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> User Active <span class="text-danger"> <b> * </b> </span></label>
                                <select  class="form-control" required name="is_active">
                                    <option value="">-- Please Select --</option>
                                    <option value="ACTIVE">Active</option>
                                    <option value="INACTIVE">Inactive</option>
                                </select>
                            </div>
                        </div>
                <!--<div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Category Show (Home Page) <span class="text-danger"> <b> * </b> </span></label>
                                <select type="text" class="form-control" required name="is_show">
                                    <option value="">-- Please Select --</option>
                                    <option value="SHOW">Show</option>
                                    <option value="HIDE">Hide</option>
                                </select>
                            </div>
    </div> -->
                <!--<div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Category Image <span class="text-danger">(Image Dimensions - 565*407 Pixel)</span></label>
                                <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                            </div>
                </div>-->


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
