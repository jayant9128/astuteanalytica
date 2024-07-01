@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-pencil-alt"></i> &nbsp;Change Password List</h1>
        </div>
        <!-- <ul class="app-breadcrumb breadcrumb">
                <a class="btn btn-primary icon-btn" href=""><i class="fa fa-eye"></i> Category List</a>
            </ul> -->
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
                                    <th>User Role</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Active </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($users_datas as $data)
                                <tr>
                                    <td>{{$i}}.</td>
                                    <td>{{$data->user_role}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->password}}</td>
                                    <td class="text-center">
                                        @if($data->user_role == "FRONT")
                                        <b>{{$data->is_active}}</b> <br>
                                        <form class="mt-4" action="{{route('userStatusUpdate')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$data->id}}">
                                            <select class="form-control" required name="is_active">
                                                <option value="">--Select--</option>
                                                <option value="ACTIVE">Active</option>
                                                <option value="INACTIVE">Inactive</option>
                                            </select>
                                            <input type="submit" value="Update" class="form-control mt-2 btn-info">
                                        </form>
                                        @else
                                            <h4> You are already active </h4>
                                        @endif

                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('passwordUpdate',$data->id)}}"><span class="basic_table_icon" style="font-size: 20px;color: green;"><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></a>
                                    </td>





                                </tr>
                                @php $i++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->



@stop
