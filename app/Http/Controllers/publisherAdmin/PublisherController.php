<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use Input;

use App\Publisher;

class PublisherController extends Controller
{
    public function publisherPage(Request $request)
    {
        $data['publisherData'] = Publisher::orderBy('publisher_id', 'asc')->get();
        $page_title = "Publisher List";
        return view('masters.publisher.publisher',compact('page_title'),$data);
    }
    
    public function addPublisherPage(Request $request)
    {
       
       $page_title = "Add Publisher";
       return view('masters.publisher.addPublisher',compact('page_title'));
    }
    
    public function publisherStore(Request $request)
    {
       $input = $request->all();
      if($request->file('company_image')!='')
      {
          $file=$request->file('company_image');
          $filename=$file->getClientOriginalName();
          $imgname = $filename;
          
          $input['company_image']= $imgname;       
          $destinationPath=public_path('upload/publisher/');       
          $request->file('company_image')->move($destinationPath, $imgname);
         
      } 
      Publisher::insert($input);
      $request->session()->flash('alert-success','Publisher has been sucessfully added.');
      return Redirect::route('addPublisher');
    }
    
    public function publisherUpdatePage(Request $request,$publisher_id)
    {
      $data['publisherDatas'] = Publisher::where('publisher_id',$publisher_id)->get();
      $page_title = "Edit Publisher";
      return view('masters.publisher.editPublisher',compact('page_title'),$data);
    }
    
    public function publisherEditStore(Request $request)
    {
        $input = $request->all();
        $publisher_id = $request->publisher_id;
          if($request->file('company_image')!='')
          {
              $data=Publisher::where('publisher_id','=',$publisher_id)->value('company_image');
              $fullpath=public_path('upload/publisher/').$data;
              File::delete($fullpath);

              $file=$request->file('company_image');
              $filename=$file->getClientOriginalName();
              $imgname = $filename;

              $input['company_image']= $imgname;       
              $destinationPath=public_path('upload/publisher/');       
              $request->file('company_image')->move($destinationPath, $imgname);

          } 
      
         Publisher::where('publisher_id','=',$publisher_id)->update($input);

        $request->session()->flash('alert-success','Publisher has been sucessfully updated.');
        return Redirect::route('publisher');
    }
    
    public function publisherDeleteFormat(Request $request , $publisher_id)
    {
     $data=Publisher::where('publisher_id','=',$publisher_id)->value('company_image');
     $fullpath=public_path('upload/slider/').$data;
     File::delete($fullpath);
     $m1 = Publisher::where('publisher_id','=',$publisher_id)->delete(); 
     $request->session()->flash('alert-success','Publisher has been sucessfully deleted.');
     return Redirect::route('publisher'); 
    }
}
