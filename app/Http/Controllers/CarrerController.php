<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use App\Career;
use App\CarrerJobRequest;

use Mail;

class CarrerController extends Controller
{
    public function carrerPage(Request $request)
    {
        $page_title = "Carrer";
        $data['carrerData'] = Career::all();
    	  return view('front.career.career',compact('page_title'), $data);
    }

    public function carrerSendRequestPage(Request $request, $career_id)
    {
        $page_title = "Carrer Request Send";
        $data['carrerSendRequestData'] = Career::where('career_id', $career_id)->get();
        $jobTitle = Career::where('career_id', $career_id)->value('job_title');
        return view('front.career.careerRequest',compact('page_title', 'jobTitle', 'career_id'), $data);
    }

    public function jobRequestStore(Request $request)
    {
        $input = $request->all();
        if($request->file('image')!='')
          {
              $file=$request->file('image');
              $filename=$file->getClientOriginalName();
              $imgname = $filename;
              
              $input['image']= $imgname;       
              $destinationPath=public_path('upload/carrerJobRequestSend/');       
              $request->file('image')->move($destinationPath, $imgname);
             
          } 
        $input['date'] = date("d/m/Y");
        die; 
        CarrerJobRequest::insert($input);
        
        $date= date("d/m/Y");
        
        $name=$request->name;
        $email=$request->email;
        $phone=$request->phone;
        $message=$request->message;
        $date=$date;
        
        $messageBody = "<!DOCTYPE html>
                        <html>
                        	<head>
                        		<title> </title>
                        		
                        	</head>
                        	<body>
                        		<h1> New Enquiry Generat</h1>
                        		
                        		<table border='2px'>
                        		     <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Name</th>
                        		        <td style='padding:5px;'>{$name}</td>
                        		    </tr>
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Email</th>
                        		        <td tyle='padding:5px;'>{$email}</td>
                        		    </tr>
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Phone</th>
                        		        <td style='padding:5px;'>{$phone}</td>    
                        		    </tr>
                        		   
                        		    
                        		    <tr>
                        		        <th style='padding:5px;width:30%;text-align:left;'>Date</th>
                        		        <td style='padding:5px;'>{$date}</td>
                        		    </tr>
                        		    
                        		    <tr>
                        		    
                            		    <th style='padding:5px;width:30%;text-align:left;'>Message</th>
                            		    <td style='padding:5px;'>{$message}</td>
                        		    
                        		    </tr>
                        		</table>
                        	</body>
                        </html>
                        ";
                        
                    $subject = "New Enquiry";
                    $data['msg']=$messageBody;
                    $data['subject']=$subject;
                    $data['email']="reportocean@gmail.com";
                    Mail::send([],[],  function ($message)  use($data) 
                    {
                        $message->to($data['email'])->subject($data['subject'])
                            ->setBody($data['msg'], 'text/html'); 
                    });
                    
        return Redirect('thankyou');
    }
}
