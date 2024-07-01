<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use Input;
use App\Career;
use App\CarrerJobRequest;

class CareerController extends Controller
{
    public function careerPage(Request $request)
    {
        $data['careerData'] = Career::orderBy('career_id', 'asc')->get();
        $page_title = "Career List";
        return view('masters.career.career',compact('page_title'),$data);
    }
    
    public function addCareerPage(Request $request)
    {
       $page_title = "Add Career";
       return view('masters.career.addCareer',compact('page_title'));
    }
    
    public function careerStore(Request $request)
    {
       $input = $request->all();
       Career::insert($input);
       $request->session()->flash('alert-success','Career has been sucessfully added.');
       return Redirect::route('addCareer');
    }
    
    public function careerUpdatePage(Request $request,$career_id)
    {
      $data['careerDatas'] = Career::where('career_id',$career_id)->get();
      $page_title = "Edit Career";
      return view('masters.career.editCareer',compact('page_title'),$data);
    }
    
    public function careerEditStore(Request $request)
    {
        $input = $request->all();
        $career_id = $request->career_id;
        Career::where('career_id',$career_id)->update($input);
        $request->session()->flash('alert-success','Career has been sucessfully updated.');
        return Redirect::route('career');
    }
    
    public function careerDeleteFormat(Request $request , $career_id)
    {
         $m1 = Career::where('career_id',$career_id)->delete(); 
         $request->session()->flash('alert-success','Career has been sucessfully deleted.');
         return Redirect::route('career'); 
    }


    /* ------------------------------------ Job Request Code Start ------------------------------------ */

    public function jobRequestPage(Request $request)
    {
        $data['jobRequestData'] = CarrerJobRequest::join('career', 'career.career_id', '=', 'carrer_job_request.career_id')->orderBy('carrer_job_request.carrer_job_request_id', 'DESC')->get();
        $page_title = "Job Request List";
        return view('masters.career.jobRequest',compact('page_title'),$data);
    }

    public function jobRequestDeleteFormat(Request $request, $carrer_job_request_id)
    {    
      $data=CarrerJobRequest::where('carrer_job_request_id',$carrer_job_request_id)->value('image');
      $fullpath=public_path('upload/carrerJobRequestSend/').$data;
      File::delete($fullpath);

      CarrerJobRequest::where('carrer_job_request_id',$carrer_job_request_id)->delete();
      $request->session()->flash('alert-success','job Request has been deleted Successfully!!');
      return Redirect::route('jobRequest');   
    }

    /* ------------------------------------ Job Request Code End ------------------------------------ */

    
}
