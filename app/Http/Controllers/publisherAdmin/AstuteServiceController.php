<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use Input;

class AstuteServiceController extends Controller
{
     public function servicePage(Request $request)
    {
        $data['serviceData'] = Service::orderBy('service_id', 'asc')->get();
        $page_title = "Service List";
        return view('masters.service.service',compact('page_title'),$data);
    }

    public function addServicePage(Request $request)
    {

       $page_title = "Add Service";
       return view('masters.service.addService',compact('page_title'));
    }

    public function serviceStore(Request $request)
    {
       $input = $request->all();
      if($request->file('image')!='')
      {
          $file=$request->file('image');
          $filename=$file->getClientOriginalName();
          $imgname = $filename;

          $input['image']= $imgname;
          $destinationPath=public_path('upload/service/');
          $request->file('image')->move($destinationPath, $imgname);

      }
      Service::insert($input);
      $request->session()->flash('alert-success','Service has been sucessfully added.');
      return Redirect::route('addService');
    }

    public function serviceUpdatePage(Request $request,$service_id)
    {
      $data['serviceDatas'] = Service::where('service_id',$service_id)->get();
      $page_title = "Edit Service";
      return view('masters.service.editService',compact('page_title'),$data);
    }

    public function serviceEditStore(Request $request)
    {

        $input = $request->all();
        $service_id = $request->service_id;
          if($request->file('image')!='')
          {
            //   $data=Service::where('service_id','=',$service_id)->value('image');
            //   $fullpath=public_path('upload/service/').$data;
            //   File::delete($fullpath);

              $file=$request->file('image');
              $filename=$file->getClientOriginalName();
              $imgname = $filename;

              $input['image']= $imgname;
              $destinationPath=public_path('upload/service/');
              $request->file('image')->move($destinationPath, $imgname);

          }

         Service::where('service_id','=',$service_id)->update($input);

        $request->session()->flash('alert-success','Service has been sucessfully updated.');
        return Redirect::route('service');
    }

    public function ServiceDeleteFormat(Request $request , $service_id)
    {
    //  $data=Service::where('service_id','=',$service_id)->value('image');
    //  $fullpath=public_path('upload/service/').$data;
    //  File::delete($fullpath);
     $m1 = Service::where('service_id','=',$service_id)->delete();
     $request->session()->flash('alert-success','Service has been sucessfully deleted.');
     return Redirect::route('service');
    }
}
