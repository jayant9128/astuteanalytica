@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-sitemap"></i> Users List</h1>
        </div>

        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('registernewuser')}}"><i class="fa fa-plus"></i> Add User</a>
</u>


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
                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="example" class="table  table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th colspan="1">
                                        <center>Action</center>
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php // print_r($user);
                                //die;
                                $i=1;
                                ?>
                                @foreach($user as $datas)
                                @foreach($datas as $data)
                                <tr>
                                    <td>{{$i}}</td>
                                    <?php $arr=explode(',',$data->name);
                                    //print_r($arr[0]);
                                    for($i=0;$i<count($arr);$i++)
                                    {
                                        echo '<td>'.$arr[$i].'</td>';
                                    }
                                    ?>
                                    
                                    <td>{{$data->email}}</td>
                                    <td><span class="<?php if($data->is_active=='INACTIVE'){echo 'bg-danger';}else{echo 'bg-primary';}?>">{{$data->is_active}}</span>
                                        <form method="post" action="{{url('masterAdmin/userstatusupdate')}}">
                                            @csrf
                                            <input type="hidden" name="email" value="{{$data->email}}">
                                            <select name="is_active">
                                                <option value="INACTIVE">INACTIVE</option>
                                                <option value="ACTIVE">ACTIVE</option>
                                            </select>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="submit" name="update" value="update">
</form>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('user_edit',$data->id)}}"><span class="basic_table_icon" style="font-size: 20px;color: green;"><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></a>
                                        <a href="{{route('userDelete',$data->id)}}" onClick="return confirm('Are you sure for delete ?');"><span class="basic_table_icon" style="font-size: 20px;color: red;margin-left: 20px;"><i class="fas fa-trash" aria-hidden="true"></i></span></a>
                                    </td>

                                </tr>
                                
                                @php $i++ @endphp
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop