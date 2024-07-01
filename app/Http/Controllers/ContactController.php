<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use App\Contact;
use App\OurClient;
use App\BecomePartner;
use App\SiteInformation;
use App\Testominal;
use Mail;

class ContactController extends Controller
{
    public function contactUsPage(Request $request)
    {
        $page_title = "Contact Us | Astute Analytica";
        $meta_description="Astute Analytica is one of the leading publisher of Industry report";
        $meta_keyword="Market Research Report, US Market Research Report, Industry Report, Contact Us";
        
        
        $data['ourClientData'] = OurClient::orderBy('our_client_id', 'asc')->get();
    	return view('front.contact.contact',compact('page_title','meta_description','meta_keyword'), $data);
    }
    
    public function contactStore(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'name' => ['required', 'max:40'],
            'email' => ['required','email', 'max:255'],
            'country' => 'required',
            'phone' => 'required|min:7',
            'job_title' => 'required',
            'company' => 'required',
           

        ]);

            $date= date("d/m/Y");
             
          
            $name=$request->name;
            $email=$request->email;
            $phone=$request->phone;
            $job_title=$request->job_title;
            $message=$request->message;
            $company=$request->company;
            $country=$request->country;
            $date=$date;
        die;
            if($name=='zap' || $name == 'ZAP' || $job_title ='ZAP'){
                return $request;   
               }
            
            $input['name'] = $name;
            $input['email'] = $email;
            $input['phone'] = $phone;
            $input['job_title'] = $job_title;
            $input['message'] = $message;
            $input['company'] = $company;
            $input['country'] = $country;
            $input['date'] = $date;
            $input['type'] = "English";
            $input['_token'] = $request->_token;

            //return $input;
           
            
            DB::table('contact')->insert($input);
            
            $messageBody = "<!DOCTYPE html>
                            <html>
                            	<head>
                            		<title> </title>
                            		
                            	</head>
                            	<body>
                            		<h1> New Enquiry Generate</h1>
                            		
                            		<table border='0px' width='100%'>
                                        <tr>
                            		        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Type</th>
                            		        <td style='padding:10px;border:1px solid black;'>English</td>
                            		    </tr>
                            		    <tr>
                            		        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Name</th>
                            		        <td style='padding:10px;border:1px solid black;'>{$name}</td>
                            		    </tr>
                            		    <tr>
                            		        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Email</th>
                            		        <td style='padding:10px;border:1px solid black;'>{$email}</td>
                            		    </tr>
                        
                            		    <tr>
                            		        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Phone</th>
                            		        <td style='padding:10px;border:1px solid black;'>{$phone}</td>    
                            		    </tr>
                            		    <tr>
                            		        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Job Title</th>
                            		        <td style='padding:10px;border:1px solid black;'>{$job_title}</td>    
                            		    </tr>
                            		    
                            		    <tr>
                            		        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Company</th>
                            		        <td style='padding:10px;border:1px solid black;'>{$company}</td>
                            		    </tr>
                            		    
                            		    <tr>
                            		        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Country</th>
                            		        <td style='padding:10px;border:1px solid black;'>{$country}</td>
                            		    </tr>
                            		    
                            		    <tr>
                            		        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Date</th>
                            		        <td style='padding:10px;border:1px solid black;'>{$date}</td>
                            		    </tr>
                            		    
                            		    <tr>
                            		    <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Message</th>
                            		    <td style='padding:10px;border:1px solid black;'>{$message}</td>
                            		    
                            		    </tr>
                            		    
                            		</table>
                            	</body>
                            </html>
                            ";
                            
                        $subject = "New Enquiry";
                        $data['msg']=$messageBody;
                        $data['subject']=$subject;
                        $data['email']="info@astuteanalytica.com"; //info@astuteanalytica.com
                        Mail::send([],[],  function ($message)  use($data) 
                        {
                            $message->to($data['email'])->subject($data['subject'])
                                ->setBody($data['msg'], 'text/html'); 
                        });
            return Redirect('thankyou');
            
            /*$homeMessage = "Become Partner";
         return redirect('thankyou/'.$homeMessage); */
        
        
        
    }

    public function ThankyouPage()
    {
        $page_title = "Thankyou.";
        $data['testominalData'] = Testominal::orderBy('testominal_id', 'asc')->get();
        $data['ourClientData'] = OurClient::orderBy('our_client_id', 'asc')->get();
        return view('front.contact.thankyou',compact('page_title'),$data);
    }

}
