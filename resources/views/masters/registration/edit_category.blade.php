@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-sitemap"></i>
                Edit User
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('user-list')}}"><i class="fa fa-eye"></i> User List</a>
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
               
                <form action="{{route('user_update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @foreach($user as $data)
                    <div class="row col-sm-12">
                        <div class="col-sm-6">
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <?php 
                            $arr=explode(',',$data->name);
                            $a=null;
                            $b=null;

                            for($i=0;$i < count($arr);$i++)
                            {
                                $a=$arr[0];
                                $b=$arr[1];
                            }
                            //echo $a.$b;
                            //die;
                            ?>
                            <div class="form-group">
                                <label class="control-label">First Name <span class="text-danger"> * </span></label>
                                <input class="form-control" type="text" name="name" autofocus required value="{{$a}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Last Name <span class="text-danger"> * </span></label>
                                <input class="form-control" type="text" name="lname" autofocus required value="{{$b}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Email<span class="text-danger"> * </span></label>
                                <input class="form-control" type="email" name="email" autofocus required value="{{$data->email}}">
                            </div>
                        </div>



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> User Active <span class="text-danger"> <b> * </b> </span></label>
                                
                                <select type="text" class="form-control" required name="is_active">
                                    <option value="">-- Please Select --</option>
                                    <option value="ACTIVE" {{$data->is_active == "ACTIVE"? "selected" : " "}}>Active</option>
                                    <option value="INACTIVE" {{$data->is_active == "INACTIVE"? "selected" : " "}}>Inactive</option>
                                </select>
                            </div>
                        </div>
                       
<!--
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Category Image <span class="text-danger">(Image Dimensions - 565*407 Pixel *)</span></label>
                                <input class="form-control" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                                <input type="hidden" name="image" value="{{$data->image}}" />
                            </div>
                        </div>-->
<!--

                        <div class="col-sm-6 pb-4">
                            <img src="{{URL::asset('public/upload/category/'.$data->image)}}" width="300px">
                        </div>
-->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> PassWord<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="password"  placeholder="password" >
                            </div>
                        </div>

                       

                        <div class="col-sm-12">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;
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
