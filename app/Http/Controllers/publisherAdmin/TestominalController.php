<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use Input;

use App\Testominal;

class TestominalController extends Controller
{
    public function testominalPage(Request $request)
    {
        $data['testominalData'] = Testominal::orderBy('testominal_id', 'asc')->get();
        $page_title = "Testominal List - Finacne";
        return view('masters.testominal.testominal',compact('page_title'),$data);
    }
    
    public function addTestominalPage(Request $request)
    {
       
       $page_title = "Add Testominal - Finacne";
       return view('masters.testominal.addTestominal',compact('page_title'));
    }
    
    public function testominalStore(Request $request)
    {
       $input = $request->all();
      if($request->file('image')!='')
      {
          $file=$request->file('image');
          $filename=$file->getClientOriginalName();
          $imgname = $filename;
          
          $input['image']= $imgname;       
          $destinationPath=public_path('upload/testominal/');       
          $request->file('image')->move($destinationPath, $imgname);
         
      } 
      Testominal::insert($input);
      $request->session()->flash('alert-success','Testominal has been sucessfully added.');
      return Redirect::route('addTestominal');
    }
    
    public function testominalUpdatePage(Request $request,$testominal_id)
    {
      $data['testominalDatas'] = Testominal::where('testominal_id',$testominal_id)->get();
      $page_title = "Edit Testominal - Finacne";
      return view('masters.testominal.editTestominal',compact('page_title'),$data);
    }
    
    public function testominalEditStore(Request $request)
    {
        $input = $request->all();
        $testominal_id = $request->testominal_id;
          if($request->file('image')!='')
          {
              $data=Testominal::where('testominal_id',$testominal_id)->value('image');
              $fullpath=public_path('upload/testominal/').$data;
              File::delete($fullpath);

              $file=$request->file('image');
              $filename=$file->getClientOriginalName();
              $imgname = $filename;

              $input['image']= $imgname;       
              $destinationPath=public_path('upload/testominal/');       
              $request->file('image')->move($destinationPath, $imgname);

          } 
      
         Testominal::where('testominal_id',$testominal_id)->update($input);

        $request->session()->flash('alert-success','Testominal has been sucessfully updated.');
        return Redirect::route('testominal');
    }
    
    public function testominalDeleteFormat(Request $request , $testominal_id)
    {
     $data=Testominal::where('testominal_id',$testominal_id)->value('image');
     $fullpath=public_path('upload/testominal/').$data;
     File::delete($fullpath);
     $m1 = Testominal::where('testominal_id',$testominal_id)->delete(); 
     $request->session()->flash('alert-success','Testominal has been sucessfully deleted.');
     return Redirect::route('testominal'); 
    }
}
