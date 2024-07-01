@extends('masters.layout.default_layout')
@section('content')

<script>
    function updateCategory(id,title,slug,meta_title,key_words,meta_desc)
    {
        $('#cate_id').val(id);
        $('#utitle').val(title);
        $('#uslug').val(slug);
        $('#umeta_title').val(meta_title);
        $('#ukey_words').val(key_words);
        $('#umeta_desc').val(meta_desc);
        //alert("test");
    }

</script>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-newspaper"></i> Inside Category List</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <a class="btn btn-primary icon-btn" href="javascript::void(0)" data-toggle="modal"
                    data-target="#newCategory"><i class="fa fa-plus"></i> Add Category</a>
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
                        @if (Session::has('alert-' . $msg))

                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            </p>
                        @endif
                    @endforeach
                </div>
                <div class="card-box">
                    <div class="table-rep-plugin">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="example" class="table  table-striped table-bordered" cellspacing="0"
                                style="width:100%;">
                                <thead>
                                    <tr>
                                        <th> S.No</th>
                                        <th> Title </th>
                                        <th> Slug </th>
                                        <th> Meta Title </th>
                                        <th> Meta Keywords </th>
                                        <th> Meta Description </th>

                                        <th colspan="1">
                                            <center>Action</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1 @endphp
                                    @foreach ($inside as $data)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->slug }}</td>
                                            <td>{{ $data->meta_title }}</td>
                                            <td>{{ $data->key_words }}</td>
                                            <td>{{ $data->meta_desc }}</td>
                                            <td class="text-center">
                                                <a onclick="updateCategory({{ $data->inside_cate_id  }},'{{ $data->title }}','{{ $data->slug }}','{{ $data->meta_title }}','{{ $data->key_words }}','{{ $data->meta_desc }}')" href="javasript::void(0)" data-toggle="modal"
                                                data-target="#updateCategory"><span
                                                        class="basic_table_icon" style="font-size: 20px;color: green;"><i
                                                            class="fas fa-pencil-alt" aria-hidden="true"></i></span></a>
                                                <a href="{{ route('astuteInsideCategoryDelete', $data->inside_cate_id) }}"
                                                    onClick="return confirm('Are you sure?');"><span
                                                        class="basic_table_icon"
                                                        style="font-size: 20px;color: red;margin-left: 20px;"><i
                                                            class="fas fa-trash" aria-hidden="true"></i></span></a>
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



        <!-- Add Category Modal -->
        <div class="modal fade" id="newCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Inside Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('insideCategorySave') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="control-label">Title<span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title" multiple class="form-control" required>
                                    </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="control-label">Slug<span class="text-danger">*</span></label>
                                        <input type="text" name="slug" id="slug" multiple class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="control-label">Meta Title<span class="text-danger">*</span></label>
                                        <input type="text" name="meta_title" id="meta_title" multiple class="form-control"
                                            required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="control-label">Meta Keyword<span class="text-danger">*</span></label>
                                        <input type="text" name="key_words" id="key_words" multiple class="form-control"
                                            required>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="control-label">Meta Description<span
                                                class="text-danger">*</span></label>
                                        <textarea name="meta_desc" id="meta_desc" multiple class="form-control"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
         <!-- Edit Category Modal -->
         <div class="modal fade" id="updateCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Edit Inside Category</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <form action="{{ route('insideCategoryUpdate') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="row">
                             <div class="col-12">
                                 <div class="form-group">
                                     <label class="control-label">Title<span class="text-danger">*</span></label>
                                     <input type="text" name="title" id="utitle" multiple class="form-control" required>
                                     <input type="hidden" name="inside_cate_id" id="cate_id">
                                 </div>
                             </div>


                             <div class="col-12">
                                 <div class="form-group">
                                     <label class="control-label">Slug<span class="text-danger">*</span></label>
                                     <input type="text" name="slug" id="uslug" multiple class="form-control" required>
                                 </div>
                             </div>

                             <div class="col-12">
                                 <div class="form-group">
                                     <label class="control-label">Meta Title<span class="text-danger">*</span></label>
                                     <input type="text" name="meta_title" id="umeta_title" multiple class="form-control"
                                         required>
                                 </div>
                             </div>

                             <div class="col-12">
                                 <div class="form-group">
                                     <label class="control-label">Meta Keyword<span class="text-danger">*</span></label>
                                     <input type="text" name="key_words" id="ukey_words" multiple class="form-control"
                                         required>
                                 </div>
                             </div>

                             <div class="col-12">
                                 <div class="form-group">
                                     <label class="control-label">Meta Description<span
                                             class="text-danger">*</span></label>
                                     <textarea name="meta_desc" id="umeta_desc" multiple class="form-control"
                                         required></textarea>
                                 </div>
                             </div>
                             <div class="col-sm-12">
                                 <button class="btn btn-primary" type="submit"><i
                                         class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;
                             </div>

                         </div>
                     </form>
                 </div>

             </div>
         </div>
     </div>
    </main>

@stop
