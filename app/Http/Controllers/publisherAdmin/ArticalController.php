<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use Input;

use App\Artical;

class ArticalController extends Controller
{
    public function articalPage(Request $request)
    {
        $data['articalData'] = Artical::orderBy('artical_id', 'asc')->get();
        $page_title = "Artical List";
        return view('masters.artical.artical',compact('page_title'),$data);
    }
    
    public function addArticalPage(Request $request)
    {
       
       $page_title = "Add artical";
       return view('masters.artical.addArtical',compact('page_title'));
    }
    
    public function articalStore(Request $request)
    {
       $input = $request->all();
      if($request->file('artical_image')!='')
      {
          $file=$request->file('artical_image');
          $filename=$file->getClientOriginalName();
          $imgname = $filename;
          
          $input['artical_image']= $imgname;       
          $destinationPath=public_path('upload/artical/');       
          $request->file('artical_image')->move($destinationPath, $imgname);
         
      } 
      Artical::insert($input);
      $request->session()->flash('alert-success','Artical has been sucessfully added.');
      return Redirect::route('addArtical');
    }
    
    public function articalUpdatePage(Request $request,$artical_id)
    {
      $data['articalDatas'] = Artical::where('artical_id',$artical_id)->get();
      $page_title = "Edit Artical";
      return view('masters.artical.editArtical',compact('page_title'),$data);
    }
    
    public function articalEditStore(Request $request)
    {
        $input = $request->all();
        $artical_id = $request->artical_id;
          if($request->file('artical_image')!='')
          {
              $data=artical::where('artical_id','=',$artical_id)->value('artical_image');
              $fullpath=public_path('upload/artical/').$data;
              File::delete($fullpath);

              $file=$request->file('artical_image');
              $filename=$file->getClientOriginalName();
              $imgname = $filename;

              $input['artical_image']= $imgname;       
              $destinationPath=public_path('upload/artical/');       
              $request->file('artical_image')->move($destinationPath, $imgname);

          } 
      
         Artical::where('artical_id','=',$artical_id)->update($input);

        $request->session()->flash('alert-success','Artical has been sucessfully updated.');
        return Redirect::route('artical');
    }
    
    public function articalDeleteFormat(Request $request , $artical_id)
    {
     $data=Artical::where('artical_id','=',$artical_id)->value('artical_image');
     $fullpath=public_path('upload/artical/').$data;
     File::delete($fullpath);
     $m1 = Artical::where('artical_id','=',$artical_id)->delete(); 
     $request->session()->flash('alert-success','Artical has been sucessfully deleted.');
     return Redirect::route('artical'); 
    }
    
    public function articalSeeMorePage(Request $request,$artical_id)
    {
      $data['articalSeeMoreDatas'] = Artical::where('artical_id',$artical_id)->get();
      $page_title = "Artical Detail";
      return view('masters.artical.seeMoreArtical',compact('page_title'),$data);
    }
}
