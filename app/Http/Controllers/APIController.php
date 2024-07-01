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
use App\AllReport;
use Mail;

class APIController extends Controller
{   
    function isAuth($auth)
    {
        $authkey = "Admin123";
        if($auth == $authkey)
        {
            return "Success";
        }
        else
        {
            return "Failed";
        }
    }
   
    public function contactStore(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required','email'],
            'phone' => 'required',
            'job_title' => 'required',
            'company' => 'required',
        ]);
        $is_auth = $this->isAuth($request->authkey);
        if($is_auth == "Success")
        {
            $date= date("d/m/Y");
            $name=$request->name;
            $email=$request->email;
            $phone=$request->phone;
            $job_title=$request->job_title;
            $message=$request->message;
            $company=$request->company;
          
            $date=$date;
            
            $input['name'] = $name;
            $input['email'] = $email;
            $input['phone'] = $phone;
            $input['job_title'] = $job_title;
            $input['message'] = $message;
            $input['company'] = $company;
           
            $input['date'] = $date;
            $input['type'] = "Japanese";
            $input['_token'] = "Tet";

            DB::table('contact')->insert($input);
            return "true";
        }
        else
        {
            return "false";
        }
        
    }

    public function requestQueryStore(Request $request)
    {
       
        // return $request;

        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required','email'],
            'phone' => 'required',
            'know_about' => 'required',
            'job_title' => 'required',
            'all_reports_id' => 'required',
            'authkey' => 'required',
        ]);


        $is_auth = $this->isAuth($request->authkey);
        if($is_auth == "Success")
        {
             // return $request;
            $date= date("d/M/Y");

            $all_reports_id=$request->all_reports_id;
            //$report_title = AllReport::where('all_reports_id', $all_reports_id)->value('report_title');
            //$report_slug = AllReport::where('all_reports_id', $all_reports_id)->value('report_slug');
    
            $name=$request->name;
            $email=$request->email;
            $request_sample_type=$request->request_sample_type;
            $subject=$request->request_sample_type;
            $report_title=$request->report_title;
            $phone=$request->phone;
            $is_jap=1;
            $job_title=$request->job_title;
            $message=$request->message;
            $company=$request->company;
            $know_about=$request->know_about;
            $date=$date;
            $url = $request->report_slug; 
            $input['name'] = $name;
            $input['email'] = $email;
            $input['new_report_title'] = $request->report_title;
            $input['all_reports_id'] = 5;
            $input['is_jap'] = 1;
            $input['request_sample_type'] = $request_sample_type;
            $input['phone'] = $phone;
            $input['job_title'] = $job_title;
            $input['message'] = $message;
            $input['company'] = $company;
            $input['know_about'] = $know_about;
            $input['date'] = $date;
            $input['_token'] = "jap_".$date;
            
            DB::table('request_sample')->insert($input);
            echo "asfsdf";
            die;
            return true; 
        }
        else{
            return false;
        }
       
    }

    function pressReleaseEnquiry(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'authkey' => 'required',
        ]);

        $is_auth = $this->isAuth($request->authkey);
        if($is_auth == "Success")
        {
            $en['_token'] = "Test";
            $en['details'] = $request->details;
            $en['type'] = "Japanese";
            DB::table('press_release_enquiry')->insert($en);
            return "true";
        }
        else
        {
            return "false";
        }

    }

 
}
