<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Alert;
use Auth,View,Redirect,Response,Hash,Validator,DB,Session;
use App\User;
use App\AllReport;
use App\Category;
use App\Checkout;
use App\TOC;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use URL;
use Softon\Indipay\Facades\Indipay;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Mail;
use Razorpay\Api\Api;


class CheckoutController extends Controller
{
    private $_api_context;
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
        
        
        
        
    }
    public function goToCheckout(Request $request)
    {
       // return $request;
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000, 9999)
            . mt_rand(1000, 9999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        // shuffle the result
        $string = str_shuffle($pin);
        
        $order_number = $string;
        $license_type = $request->license_type;
        $report_id = $request->report_id;
        $current_date = date('Y-m-d');
        $data['reportData'] = AllReport::where('all_reports_id', $report_id)->limit(1)->get();
        //DB::enableQueryLog();
        $discount_data = DB::table('report_discount')->where('is_active','ACTIVE')->where('start_date', '<=', $current_date)
        ->where('end_date', '>=', $current_date)->get();
        //dd(DB::getQueryLog());
        //echo "<pre>";
        //print_r($discount_data);
        //echo $discount_data[0]->single_user;
       // die;
        if($license_type == "single_user_selling")
        {
            if(isset($discount_data[0]->single_user) && $discount_data[0]->single_user > 0){
            $amount_dis = ($data['reportData'][0]->single_user_selling * $discount_data[0]->single_user);
            $discount = $amount_dis/100;
            $amount = ($data['reportData'][0]->single_user_selling - $discount);
            $data['reportData'][0]->single_user_selling = $amount;
            }else{
            $amount = $data['reportData'][0]->single_user_selling;
           
            }
        }
        elseif($license_type == "multi_user_selling")
        {
            if(isset($discount_data[0]->multi_user) && $discount_data[0]->multi_user > 0){
                $amount_dis = ($data['reportData'][0]->multi_user_selling * $discount_data[0]->multi_user);
                $discount = $amount_dis/100;
                $amount = ($data['reportData'][0]->multi_user_selling - $discount);
                $data['reportData'][0]->multi_user_selling = $amount;
                }else{
            $amount = $data['reportData'][0]->multi_user_selling;
           
                }
        }
        else
        {
            if(isset($discount_data[0]->corporate_user) && $discount_data[0]->corporate_user > 0){
                $amount_dis = ($data['reportData'][0]->corporate_user_selling * $discount_data[0]->corporate_user);
                $discount = $amount_dis/100;
                $amount = ($data['reportData'][0]->corporate_user_selling - $discount);
                $data['reportData'][0]->corporate_user_selling = $amount;
                }else{
            $amount = $data['reportData'][0]->corporate_user_selling;
                }
        }

        $price = round($amount) * 100;

        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order = $api->order->create(array('receipt' =>  $order_number, 'amount' =>$price , 'currency' => 'USD'));
        
        $order_id = $order['id'];
    
        return view('front.payment.checkout',compact('report_id','license_type','order_id','price'), $data);
    }
    public function SectionBuyNow(Request $request)
    {
        //return $request;

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000, 9999)
            . mt_rand(1000, 9999)
            . $characters[rand(0, strlen($characters) - 1)];
        
        // shuffle the result
        $string = str_shuffle($pin);
        
        $order_number = $string;



        
        $report_id = $request->all_reports_id;
        $data['reportData'] = AllReport::where('all_reports_id', $report_id)->limit(1)->get();
        $toc_section = $request->toc_section;
        $data['toc_data'] = TOC::whereIn('toc_id',$toc_section)->get();
         $amount = TOC::whereIn('toc_id',$toc_section)->sum('amount');
        $price = $amount*100;
        $toc = json_encode($toc_section);
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $order = $api->order->create(array('receipt' =>  $order_number, 'amount' =>$price , 'currency' => 'USD'));
        
        $order_id = $order['id'];
        return view('front.payment.toc_section_checkout',compact('report_id','toc','price','order_id'), $data);
    }
    
    public function CheckoutNow(Request $request)
    {
        //return $request;
        
        $order_number = $request->order_number;
        $string = $order_number;
        $amount = Crypt::decryptString($request->amount);
        
        if(isset($request->toc_section))
        {
            $toc = json_decode(Crypt::decryptString($request->toc_section));
           $input['toc_type'] = json_encode(TOC::whereIn('toc_id',$toc)->pluck('title'));
           
        }
        else
        {
             $input['toc_type'] = "[\"ALL TOC\"]";
        }
        
        
        $amount = str_replace(',', '', $amount);
     
            $payment_mode = $request->payment_type;
            $input['name'] = $request->name;
            $input['email'] = $request->email;
            $input['job_title'] = $request->job_title;
            $input['company'] = $request->company;
            $input['country'] = $request->country;
            $input['contact'] = $request->phone;
            $input['billing_address'] = $request->billing_address;
            $input['payment_gateway'] = $payment_mode;
            $input['order_date'] = date('d-M-Y : h:i:sa');
            $input['order_number'] = $order_number;
            $input['payment_status'] = "Txn-Failure";
            $input['amount'] = $amount;
            if(isset($request->amount_type))
            {
                $input['licence_type'] = Crypt::decryptString($request->amount_type);
            }
            else
            {
                $input['licence_type'] = "Section Type";
            }
            
            $input['report_id'] = Crypt::decryptString($request->report_id);
            $input['all_report_id'] = Crypt::decryptString($request->all_report_id);
            $input['_token'] = $request->_token;
            
            if($payment_mode == "razorpay")
            {
                // $input['razorpay_payment_id'] = $request->razorpay_payment_id;
                // $input['razorpay_signature'] = $request->razorpay_signature;
            
                // $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
                // $payment = $api->payment->fetch($input['razorpay_payment_id']);
        
                // if(count($input)  && !empty($input['razorpay_payment_id'])) {
                //     try {
                //         $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
        
                //     } catch (Exception $e) {
                //         return  $e->getMessage();
                //         $request->session()->flash('alert-danger','Sorry, your order is not place because there have some technical issue.');
                    
                //         return redirect()->back();
                //     }
                // }
                
                $input['transaction_id']   =   $request->razorpay_payment_id;  
                $input['payment_status'] = "Success";
                $input['order_date'] = date('Y-m-d H:i:s');

                Session::put('success', 'Payment successful');
                Checkout::insert($input);

                $mailsend = $this->sendOrderMail($order_number);
                $adminmail = $this->adminMailSend($order_number);

                        
                $page_title = "Thank You for purchase Report";
            
                $message = "Thank you for placing an order with Astute Analytica. Our representative will contact you shortly.";
            //return $adminmail;
                return view('front.notice.thankyou',compact('page_title', 'message'));
            }
            else
            {
                
                Checkout::insert($input);
           

            
           //return $input;
           
           $item_code = Crypt::decryptString($request->report_id)." - ".$input['licence_type'];
           
                $price = number_format($amount);
                $amount_1 = (float) str_replace(',', '', $price);
                $payer = new Payer();
                $payer->setPaymentMethod('paypal');

                $item_1 = new Item();
                $item_1->setName($item_code) /** item name **/
                    ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setPrice($amount_1); /** unit price **/

                $item_list = new ItemList();
                $item_list->setItems(array($item_1));

                $amount = new Amount();
                $amount->setCurrency('USD')
                    ->setTotal($amount_1);

                $transaction = new Transaction();
                $transaction->setAmount($amount)
                    ->setItemList($item_list)
                    ->setDescription('Your transaction description');

                $redirect_urls = new RedirectUrls();
                $redirect_urls->setReturnUrl(URL::to('paypalStatus')) /** Specify return URL **/
                    ->setCancelUrl(URL::to('paypalStatus'));

                $payment = new Payment();
                $payment->setIntent('Sale')
                    ->setPayer($payer)
                    ->setRedirectUrls($redirect_urls)
                    ->setTransactions(array($transaction));
                try {
                    $payment->create($this->_api_context);
                } catch (\PayPal\Exception\PPConnectionException $ex) {
                    die($ex);
                    if (\Config::get('app.debug')) {
                        $request->session()->flash('alert-danger','Sorry, your order is not place because there have connection time out issue.');
                        return Redirect::to('/');
                    } else {
                          $request->session()->flash('alert-danger','Sorry, your order is not place because there have some technical issue.');
                        return Redirect::to('/');
                    }
                }
                foreach ($payment->getLinks() as $link) {
                    if ($link->getRel() == 'approval_url') {
                        $redirect_url = $link->getHref();
                        break;
                    }
                }
                /** add payment ID to session **/
                Session::put('paypal_payment_id', $payment->getId());
                $trans_update['transaction_id'] = $payment->getId();
                Checkout::where('order_number',$order_number)->update($trans_update);
                if (isset($redirect_url)) {
                    return Redirect::away($redirect_url);
                }
                $request->session()->flash('alert-danger','Sorry, your order is not place because there have some technical issue.');
                return Redirect::to('/');   


            }
           
            return $request;
        
        //return $request;
    }
    
    
    public function PaypalCallback(Request $request)
    {
       //return $request;
       
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        //return $payment_id;
        /** clear the session payment ID **/
       // Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            $request->session()->flash('alert-dabger','Sorry , Your Payment is not done, please try Again... !!');
           return redirect('/');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /*dd($result);
        return "Mahi";*/
        if ($result->getState() == 'approved') {
            
            $transactions = $result->getTransactions();
            $relatedResources = $transactions[0]->getRelatedResources();
            $sale = $relatedResources[0]->getSale();
            $saleId = $sale->getId();
            /*return $saleId;*/
            
           $update['transaction_id']   =   $saleId;  
           $update['payment_status'] = "Success";
           $update['order_date'] = date('Y-m-d H:i:s');
           $order_number = Checkout::where('transaction_id',$saleId)->value('order_number'); 
           Checkout::where('transaction_id',$payment_id)->update($update); 
           /*return $order_number;*/
           $mailsend = $this->sendOrderMail($order_number);
            $adminmail = $this->adminMailSend($order_number);
            
            $page_title = "Thank You for purchase Report";
        
            $message = "Thank you for placing an order with Astute Analytica. Our representative will contact you shortly.";
        //return $adminmail;
        	return view('front.notice.thankyou',compact('page_title', 'message'));
          // return $update;
        }
        else
        {
            $request->session()->flash('alert-dabger','Sorry , Your Payment is not done, please try Again... !!');
            return redirect('/');
        }
    }
    public function sendOrderMail($order_number)
    { 
        $Orderrecord = Checkout::where('order_number',$order_number)->get();
        foreach($Orderrecord as $data)
        {
            $user_name = $data->name;
            $ord_date = $data->order_date;
            $order_date = $ord_date;
            $reportId = $data->report_id;
            $pro_name = AllReport::where('report_id',$reportId)->value('report_title');
            $amountType = $data->licence_type;
            $toc_data = json_decode($data->toc_type);
            $amount = $data->amount; 
            $email = $data->email;
        }
        
        $logo_url = "https://astuteanalytica.com/public/front/images/logo/logo-2.png";
      // return $Orderrecord;
        
        $messageBody1="<!DOCTYPE html><html lang='en'>

            <head>
                <title>Astute Analytica</title>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>

            </head>

            <body>

               <section style='width: 80%; min-height: 300px;padding: 10px;border:1px solid black;margin: 25px auto; display: block;border-radius: 2px;border:2px solid black'>
                    <div style='text-align:center;padding:8px;'>
                        <img src='{$logo_url}' width='100px'></a>
                     </div>
                    <div style='text-align:left;'>
                        <h1 style='text-align: left; font-size:30px; color:#969696;'>REPORT PURCHASE SUCCESSFULLY</h1>
                       
                        <p style='border-bottom: 3px solid #000000;'> </p>
                         <h3 style='text-align: left;margin:0px!important; color:#969696;'>Hi {$user_name},</h3>
                        <br>
                          <div style='margin-bottom:15px!important;'>
                            <div style='float:left;'>
                                 <h3 style='text-align: left;margin:0px!important; color:#969696;'>Order Number : #{$order_number}</h3>
                            </div>
                            <div style='float:right;'>
                                 <h3 style='text-align: left;margin:0px!important; color:#969696;'>Order Date :{$ord_date}</h3>
                            </div>
                       </div>";
                       
                       $messageBody1=$messageBody1."
                        <table width='100%' border='2px black solid' style='margin-top:15px!important; margin-bottom:15px!important;clear:both;'>
                        <tr>
                            <th style='padding:10px;'>
                            Report Title
                            </th>
                            <th style='padding:10px;'>
                            Report Type
                            </th>
                            <th style='padding:10px;'>
                            Amount
                            </th>
                            
                        </tr>";
                    
                        $messageBody1=$messageBody1."
                        <tr>
                            <td style='padding:10px;'>
                                {$pro_name}
                            </td>
                            
                            <td style='padding:10px;'>
                                {$amountType}
                            </td>
                            
                            <td style='padding:10px;'>
                                {$amount} (USD)
                            </td>
                            
                        </tr>
                        <tr>
                            <td style='padding:10px;'>
                                Section of Report
                            </td>
                            <td>
                                <table>
                                    
                            
                            
                        ";
                        foreach($toc_data as $rc)
                        {
                            $messageBody1=$messageBody1."<tr><td>{$rc}</td></tr>";
                        }
                        $messageBody1=$messageBody1."</table><td></tr></table>
                        <div style='font-weight: normal;clear:both;text-align: left; color:#969696; font-size: 16px;'>Thanks for shopping with Astute Analytica.</div><br>
                        <div style='font-weight: normal;clear:both; text-align: left; color:#969696; font-size: 16px;'>We are happy to serve you.</div><br>
                        <div style='font-weight: normal;clear:both; text-align: left; color:#969696; font-size: 16px;'>This mail is sent to you for placing your order successfully.</div><br>
                        
                         ";
                       
                       $messageBody1=$messageBody1."
                          
                            <p style='border-bottom: 3px solid #000000;'> </p>
                        
                          
                         <div style='font-size: 16px;margin-top:30px; color:#969696; text-align: left;' In case of any questions please write to us at contact@thezouple.com and we will revert to you as soon as we receive your email. </div>
                         <div style='font-size: 16px; margin-top:10px; color:#969696; text-align: left; '>
                                Thank You,
                         </div>
                          <div style='font-size: 16px; color:#969696; text-align: left; '>
                           Astute Analytica
                         </div>
                    </div>
                    
                    
                </section>
            
            ";
    
        
        
    
        $subject = "Order Placed Successfully ";
        $data['msg']=$messageBody1;
        $data['subject']=$subject;
        $data['email']=$email;
        Mail::send([],[],  function ($message)  use($data) 
        {
            $message->to($data['email'])->subject($data['subject'])
                ->setBody($data['msg'], 'text/html'); 
        });
        
        return $messageBody1;
        
    }
    
    
    public function adminMailSend($order_number)
    {
        $Orderrecord = Checkout::where('order_number',$order_number)->get();
        foreach($Orderrecord as $data)
        {
            $user_name = $data->name;
            $ord_date = $data->order_date;
            $order_date = $ord_date;
            $reportId = $data->report_id;
            $pro_name = AllReport::where('report_id',$reportId)->value('report_title');
            $licence_type = $data->licence_type;
            $amount = $data->amount; 
            $email = $data->email;
            $contact = $data->contact;
            $job_title = $data->job_title;
            $company = $data->company;
            $country = $data->country;
            $billing_address = $data->billing_address;
            $payment_gateway = $data->payment_gateway;
            $transaction_id = $data->transaction_id;
            $toc_data = json_decode($data->toc_type);
        }
        
        $messageBody = "<!DOCTYPE html>
                        <html>
                        	<head>
                        		<title> </title>
                        		
                        	</head>
                        	<body>
                        		<h1> New Report Purchase</h1>
                        		
                        		<table border='2px'>
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Name</th>
                        		        <td style='padding:5px;'>{$user_name}</td>
                        		    </tr>
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Email</th>
                        		        <td style='padding:5px;'>{$email}</td>
                        		    </tr>
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Contact</th>
                        		        <td style='padding:5px;'>{$contact}</td>    
                        		    </tr>
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Job Title</th>
                        		        <td style='padding:5px;'>{$job_title}</td>    
                        		    </tr>
                        		    
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Company</th>
                        		        <td style='padding:5px;'>{$company}</td>
                        		    </tr>
                        		    
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Country</th>
                        		        <td style='padding:5px'>{$country}</td>
                        		    </tr>
                        		    
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Billing Address</th>
                        		        <td style='padding:5px'>{$billing_address}</td>
                        		    </tr>
                        		    
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Order Date</th>
                        		        <td style='padding:5px;'>{$order_date}</td>
                        		    </tr>
                        		    
                        		    
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Report ID</th>
                        		        <td style='padding:5px;'>{$reportId}</td>
                        		    </tr>
                        		    
                        		    
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Report Title</th>
                        		        <td style='padding:5px;'>{$pro_name}</td>
                        		    </tr>
                        		    
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Amount</th>
                        		        <td style='padding:5px;'>{$amount} (USD)</td>
                        		    </tr>
                        		    
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Licence Type</th>
                        		        <td style='padding:5px;'>{$licence_type}</td>
                        		    </tr>
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Payment Gateway</th>
                        		        <td style='padding:5px;'>{$payment_gateway}</td>
                        		    </tr>
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Section Type</th>
                        		        <td style='padding:5px;'>
                        		        <table>
                        		          ";
                                        foreach($toc_data as $rc)
                                        {
                                            $messageBody=$messageBody."<tr><td>{$rc}</td></tr>";
                                        }
                                        $messageBody=$messageBody."</table>
                        		        
                        		        
                        		        </td>
                        		    </tr>
                        		        
                        		    
                        		    
                        		    
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Transaction ID</th>
                        		        <td style='padding:5px;'>{$transaction_id}</td>
                        		    </tr>
                        		    
                        		    
                        		</table>
                        	</body>
                        </html>
                        ";
                        
                    $subject = "Report Purchase";
                    $data['msg']=$messageBody;
                    $data['subject']=$subject;
                    $data['email']="info@astuteanalytica.com";
                    Mail::send([],[],  function ($message)  use($data) 
                    {
                        $message->to($data['email'])->subject($data['subject'])
                            ->setBody($data['msg'], 'text/html'); 
                    });
                    return $messageBody;
    }
    
    
    
    
    
}
