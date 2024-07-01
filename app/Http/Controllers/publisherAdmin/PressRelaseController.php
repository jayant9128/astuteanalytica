<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use Input;

use App\PressRelease;
use App\Category;

class PressRelaseController extends Controller
{
    public function pressReleasePage(Request $request)
    {
        $data['pressReleaseData'] = PressRelease::orderBy('press_release_id', 'DESC')->get();
        $page_title = "Press Release List";
        return view('masters.pressRelease.pressRelease',compact('page_title'),$data);
    }
    public function pressReleaseEnquiry(Request $request)
    {
        $data['pressReleaseData'] = DB::table('press_release_enquiry')->orderby('enquiry_id','desc')->get();
        $page_title = "Press Release Enquiry";
        return view('masters.pressRelease.pressReleaseEnquiry',compact('page_title'),$data);
    }
    
    public function addpressReleasePage(Request $request)
    {
       
       $page_title = "Add Press Release";
       $data['categoryData'] = Category::all();
       return view('masters.pressRelease.addPressRelease',compact('page_title'), $data);
    }
    
    public function pressReleaseStore(Request $request)
    {
       $input = $request->all();
      if($request->file('press_relase_image')!='')
      {
          $file=$request->file('press_relase_image');
          $filename=$file->getClientOriginalName();
          $imgname = uniqid().$filename;
          
          $input['press_relase_image']= $imgname;       
          $destinationPath=public_path('upload/pressRelease/');      
          $request->file('press_relase_image')->move($destinationPath, $imgname);
         
      } 
      if($request->file('report_image')!='')
      {
          $file=$request->file('report_image');
          $filename=$file->getClientOriginalName();
          $imgname = uniqid().$filename;
          
          $input['report_image']= $imgname;       
          $destinationPath=public_path('upload/pressRelease/');      
          $request->file('report_image')->move($destinationPath, $imgname);
         
      } 
      PressRelease::insert($input);
      $request->session()->flash('alert-success','Press Release has been sucessfully added.');
      return Redirect::route('addPressRelease');
    }
    
    public function pressReleaseUpdatePage(Request $request,$press_release_id)
    {
      $data['pressReleaseDatas'] = PressRelease::where('press_release_id',$press_release_id)->get();
      $data['categoryData'] = Category::all();
      $page_title = "Edit Press Release";
      return view('masters.pressRelease.editPressRelease',compact('page_title'),$data);
    }
    
    public function pressReleaseEditStore(Request $request)
    {
        $input = $request->all();
        $press_release_id = $request->press_release_id;
          if($request->file('press_relase_image')!='')
          {
              $data=PressRelease::where('press_release_id','=',$press_release_id)->value('press_relase_image');
              $fullpath=public_path('upload/pressRelease/').$data;
              File::delete($fullpath);

              $file=$request->file('press_relase_image');
              $filename=$file->getClientOriginalName();
              $imgname = uniqid().$filename;

              $input['press_relase_image']= $imgname;       
              $destinationPath=public_path('upload/pressRelease/');       
              $request->file('press_relase_image')->move($destinationPath, $imgname);

          } 
          if($request->file('report_image')!='')
          {
              $data=PressRelease::where('press_release_id','=',$press_release_id)->value('report_image');
              $fullpath=public_path('upload/pressRelease/').$data;
              File::delete($fullpath);

              $file=$request->file('report_image');
              $filename=$file->getClientOriginalName();
              $imgname = uniqid().$filename;

              $input['report_image']= $imgname;       
              $destinationPath=public_path('upload/pressRelease/');       
              $request->file('report_image')->move($destinationPath, $imgname);

          } 
      
         PressRelease::where('press_release_id','=',$press_release_id)->update($input);

        $request->session()->flash('alert-success','Press Release has been sucessfully updated.');
        return Redirect::route('pressRelease');
    }
    
    public function pressReleaseDeleteFormat(Request $request , $press_release_id)
    {
     $data=pressRelease::where('press_release_id','=',$press_release_id)->value('press_relase_image');
     $fullpath=public_path('upload/pressRelease/').$data;
     File::delete($fullpath);
     $m1 = pressRelease::where('press_release_id','=',$press_release_id)->delete(); 
     $request->session()->flash('alert-success','Press Release has been sucessfully deleted.');
     return Redirect::route('pressRelease'); 
    }
    
    public function pressReleaseSeeMorePage(Request $request,$press_release_id)
    {
      $data['pressReleaseShowMoreDatas'] = PressRelease::where('press_release_id',$press_release_id)->get();
      $page_title = "Press Release Detail";
      return view('masters.pressRelease.showMorePressRelease',compact('page_title'),$data);
    }
    
    
    
    /* Import Code Start */
    
    public function importPressReleasePage(Request $request)
    {
        $page_title = "Import Press Release";
        return view('masters.pressRelease.importpressRelease',compact('page_title'));
    }
    
    public function importPressReleaseStore(Request $request)
    {
        Excel::import(new PressReleaseImport,request()->file('file'));
           
        $request->session()->flash('alert-success','Press Release data import sucessfully uploaded !!');
        return Redirect::route('pressRelease');
    }
    
    /* Import Code End */
}
