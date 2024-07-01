@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-file-alt"></i> Add Publisher</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('publisher')}}"><i class="fa fa-eye"></i> Publisher List</a>
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
                <form action="{{route('publisherSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-sm-12">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Publisher Code <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="publisher_code" autofocus required placeholder="Publisher Code">
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Date <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="date" autofocus required placeholder="Date">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" required placeholder="Name">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="email" required placeholder="Email">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Phone <span class="text-danger">*</span></label>
                                <input class="form-control" type="number" name="phone" required placeholder="Phone">
                            </div>
                        </div>

                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Message <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="message" required placeholder="Message">
                            </div>
                        </div> -->

                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Job <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="job" required placeholder="Job">
                            </div>
                        </div> -->

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Country <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="country" required placeholder="Country">
                            </div>
                        </div>

                        <!-- <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Company <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="company" required placeholder="Company">
                            </div>
                        </div> -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Company Image <span class="text-danger">(Image Dimensions - 400*400 Pixel)</span></label>
                                <input class="form-control" type="file" name="company_image" accept="image/x-png,image/gif,image/jpeg">
                            </div>
                        </div>

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
