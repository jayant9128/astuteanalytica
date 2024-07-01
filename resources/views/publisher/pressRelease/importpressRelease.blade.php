@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-file-alt"></i>  Import All Report</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <a class="btn btn-primary icon-btn" href="{{route('allReport')}}"><i class="fa fa-eye"></i> All Report List</a>
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
                    <form action="{{route('importPressReleaseStore')}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="row col-sm-6">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">All Report - Choose Excel File</label>
                                    <input type="file" name="file" class="form-control" accept="text/csv, .csv" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@stop