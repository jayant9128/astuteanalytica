@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-question"></i> {{$report_id}} / Add FAQ</h1>
        </div>
       <!--  <ul class="app-breadcrumb breadcrumb">
            <a class="btn btn-primary icon-btn" href="{{route('faqList',$id)}}"><i class="fa fa-eye"></i> FAQ List</a>
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
                <form action="{{route('faqSave')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-sm-12">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Title <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="title" autofocus required placeholder="Title">
                                <input class="form-control" type="hidden" name="report_id" autofocus required value="{{$id}}">
                            </div>
                        </div>
                        

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Descripton   <span class="text-danger">*</span></label>
                                <textarea name="description" id="editor1" ></textarea>
                            </div>
                        </div>

                         <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label"> Japanese Faq <span class="text-danger">*</span></label><br>
                                <label class="switch">
                                  <input type="checkbox" name="japanese_switch">
                                  <span class="slider round"></span>
                                </label>
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
<style>
/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>

@stop
