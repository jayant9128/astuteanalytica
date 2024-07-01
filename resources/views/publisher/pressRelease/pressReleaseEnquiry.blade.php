@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-newspaper"></i> Press Release Enquiry</h1>
        </div>
       
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
									<th>Type</th>
                                    <th>Details</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($pressReleaseData as $data)
                                <tr>
                                    <td>{{$i}}.</td>
									<td>{{$data->type}}</td>
                                    <td class="px-3"> 
                                        <?php $enq = json_decode($data->details);?>
                                       <div class="row">
                                            @foreach($enq as $key => $value)
                                            @if($key == '_token')
                                            @elseif($key == 'comment')
                                            <div class="col-sm-12 border py-2">
                                                    <b>{{ucfirst($key)}} :</b> {{$value}}
                                                </div>
                                            @else
                                                <div class="col-sm-4 border py-2">
                                                    <b>{{ucfirst($key)}} :</b> {{$value}}
                                                </div>
                                            @endif
                                            @endforeach
                                        
                                       </div> 
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
