@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-sitemap"></i>
                {{$sup_parrent}}
                Cateogries List</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('add_sub_category',$id)}}"><i class="fa fa-plus"></i> Add Sub Category</a>
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
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Icon</th>
                                    <th> Meta Title </th>
                                    <th> Meta Keyword </th>
                                    <th> Meta Description </th>
                                    <th>Status</th>
                                    <th colspan="1">
                                        <center>Action</center>
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($category_data as $data)
                                <tr>
                                    <td>{{$i}}.</td>
                                    <td>{{$data->title}}</td>
                                    <td>{{$data->slug}}</td>
                                    <td><i class="{{$data->icon}} fa-2x" aria-hidden="true"></i></td>
                                    <td>{{$data->meta_title}}</td>
                                    <td>{{$data->meta_keyword}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>{{$data->is_active}} <br> {{$data->is_show}}</td>

                                    <td class="text-center">
                                        <a href="{{route('sub_category_edit',$data->category_id)}}"><span class="basic_table_icon" style="font-size: 20px;color: green;"><i class="fas fa-pencil-alt" aria-hidden="true"></i></span></a>
                                        <a href="{{route('categoryDelete',$data->category_id)}}" onClick="return confirm('Are you sure for delete?');"><span class="basic_table_icon" style="font-size: 20px;color: red;margin-left: 20px;"><i class="fas fa-trash" aria-hidden="true"></i></span></a>
                                    </td>
                                    
                                   
                                    <!-- @if(Session::has('cate_level'))
                                    @if(Session::get('cate_level') < 3)
                                    @endif
                                    @endif-->
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
