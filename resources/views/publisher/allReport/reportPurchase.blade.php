@extends('masters.layout.default_layout')
@section('content')
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-file-alt"></i> Report Purchase List</h1>
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
                                    <th> S.No</th>
                                    <th> Order details </th>
                                     <th> User Details</th>
                                    <th> Report Details</th>
                                    <th> Section of Report</th>
                                   
                                  
                                   <!--
                                    <th colspan="1">
                                        <center>Action</center>
                                    </th>-->
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1 @endphp
                                @foreach($reportPurchaseData as $data)
                                <tr>
                                    <td>{{$i}}.</td>
                                    <td>
                                        <b>Order Number : </b><br>{{$data->order_number}}
                                        <br>
                                        <b>Order Date : </b><br> <?php $d=strtotime($data->order_date); echo date("d-M-Y h:i:sa", $d);?>
                                        <br>
                                        <b>Transaction ID : </b><br>{{$data->transaction_id}}
                                        
                                        <br>
                                        <b>Amount : </b><br>{{$data->amount}} $
                                        <br>
                                        <b>Payment Status : </b><br>{{$data->payment_status}} 
                                        <br>
                                        <b>Payment Gateway : </b><br>{{$data->payment_gateway}} 
                                    </td>
                                    <td>
                                        <b>Name : </b><br>{{$data->name}}<br>
                                         <b>Email : </b><br>{{$data->email}}<br>
                                          <b>Job Title : </b><br>{{$data->job_title}}<br>
                                           <b>Company : </b><br>{{$data->company}}<br>
                                            <b>Country : </b><br>{{$data->country}}<br>
                                            <b>Contact : </b><br>{{$data->contact}}<br>
                                            <b>Address : </b><br>{{$data->billing_address}}<br>
                                            
                                        </td>
                                    <td>
                                        <b>Report Id : </b><br>{{$data->report_id}}<br>
                                         <b>Report Title : </b><br>{{$data->report_title}}<br>
                                        
                                        </td>
                                    <td>
                                        <?php $toc = json_decode($data->toc_type);
                                        foreach($toc as $tr)
                                        {
                                            echo $tr."<br><hr>";
                                        }
                                        ?>
                                        
                                    </td>
                                    
                                   
                                   <!-- <td class="text-center">
                                        <a href="{{route('reportPurchaseDelete',$data->checkout_id)}}" onClick="return confirm('Are you sure?');"><span class="basic_table_icon" style="font-size: 20px;color: red;margin-left: 20px;"><i class="fas fa-trash" aria-hidden="true"></i></span></a>
                                    </td>-->
                                </tr>
                                @php $i++ @endphp
                                @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@stop
