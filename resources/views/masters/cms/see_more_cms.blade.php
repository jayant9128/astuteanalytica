@extends('masters.layout.default_layout')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fas fa-file-alt"></i> See More CMS Page</h1>
            </div>
             <ul class="app-breadcrumb breadcrumb">
               <a class="btn btn-primary icon-btn" href="{{route('cms_page')}}"><i class="fa fa-eye"></i>CMS Page List</a>
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
                  @foreach($cms_see_data as $data)
                  
                  <div class="row py-3">
                    <div class="col-sm-12">
                        <b>{{$data->title}}</a>
                    </div>
                  </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo $data->description; ?>
                        </div>
                    </div>
                   
                    
                     
                @endforeach
                </div>
            </div>
        </div>
    </main>
 
   @stop