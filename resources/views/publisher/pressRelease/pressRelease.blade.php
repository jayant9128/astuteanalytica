@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-newspaper"></i> Press Release List</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('addPressRelease')}}"><i class="fa fa-plus"></i> Add Press Release</a>
            <!--<a class="btn btn-primary icon-btn ml-5" href="{{route('importPressRelease')}}"><i class="fa fa-upload"></i> Import File</a>-->
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
                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="example" class="table  table-striped table-bordered" cellspacing="0" style="width:100%;">
                            <thead>
                                <tr>
                                    <th> S.No</th>
                                    <th> Image </th>
                                    <th> Slug </th>
                                    <!-- <th> Category Title </th> -->
                                    <th> Heaing </th><!--
                                    <th> Link </th>-->
                                    <th> Keyword </th>
                                    <th> Date </th>
                                    <th> Descripton   </th>
                                    <th colspan="1">
                                        <center>Action</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($pressReleaseData as $data)
                                <tr>
                                    <td>{{$i}}.</td>
                                    <td><img src="{{URL::asset('public/upload/pressRelease/'.$data->press_relase_image)}}" width="100px"></td>
                                    <td>{{$data->press_relase_slug}}</td>
                                    <!-- <td>{{$data->category_title}}</td> -->
                                    <td>{{$data->press_relase_heading}}</td><!--
                                    <td>{{$data->press_relase_link}}</td>-->
                                    <td>{{$data->press_relase_keyword}}</td>
                                    <td>
                                        <?php
                                            $d=strtotime($data->date);
                                            echo date("d/m/Y", $d);
                                        ?>
                                    </td>
                                    <td>
                                        <a href="{{route('pressReleaseSeeMore',$data->press_release_id)}}">see more</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('pressReleaseUpdate',$data->press_release_id)}}"><span class="basic_table_icon" style="font-size: 20px;color: green;"><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></a>
                                        <a href="{{route('pressReleaseDelete',$data->press_release_id)}}" onClick="return confirm('Are you sure?');"><span class="basic_table_icon" style="font-size: 20px;color: red;margin-left: 20px;"><i class="fas fa-trash" aria-hidden="true"></i></span></a>
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

@stop
