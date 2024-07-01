<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use Input;

use App\Category;
use App\OurClient;

class OurClientController extends Controller
{
    public function ourClientPage(Request $request)
    {
        $data['ourClientData'] = OurClient::join('category','category.category_id','our_client.category_id')->orderBy('our_client_id', 'asc')->get();
        $page_title = "Our Client List - Astute";
        return view('masters.ourClient.ourClient',compact('page_title'),$data);
    }
    
    public function addOurClientPage(Request $request)
    {
       $data['categoryData'] = Category::where('parent_id',0)->orderBy('category_id', 'asc')->get();
       $page_title = "Add Our Client - Astute";
       return view('masters.ourClient.addOurClient',compact('page_title'),$data);
    }
    
    public function ourClientStore(Request $request)
    {
       $input = $request->all();
      if($request->file('image')!='')
      {
          $file=$request->file('image');
          $filename=$file->getClientOriginalName();
          $imgname = $filename;
          
          $input['image']= $imgname;       
          $destinationPath=public_path('upload/ourClient/');       
          $request->file('image')->move($destinationPath, $imgname);
         
      } 
      OurClient::insert($input);
      $request->session()->flash('alert-success','Our Client has been sucessfully added.');
      return Redirect::route('addOurClient');
    }
    
    public function ourClientUpdatePage(Request $request,$our_client_id)
    {
        $data['categoryData'] = Category::where('parent_id',0)->orderBy('category_id', 'asc')->get();
      $data['ourClientDatass'] = OurClient::where('our_client_id',$our_client_id)->get();
      $page_title = "Edit Our Client - Astute";
      return view('masters.ourClient.editOurClient',compact('page_title'),$data);
    }
    
    public function ourClientEditStore(Request $request)
    {
        $input = $request->all();
        $our_client_id = $request->our_client_id;
          if($request->file('image')!='')
          {
              $data=OurClient::where('our_client_id',$our_client_id)->value('image');
              $fullpath=public_path('upload/ourClient/').$data;
              File::delete($fullpath);

              $file=$request->file('image');
              $filename=$file->getClientOriginalName();
              $imgname = $filename;

              $input['image']= $imgname;       
              $destinationPath=public_path('upload/ourClient/');       
              $request->file('image')->move($destinationPath, $imgname);

          } 
      
         OurClient::where('our_client_id',$our_client_id)->update($input);

        $request->session()->flash('alert-success','Our Client has been sucessfully updated.');
        return Redirect::route('ourClient');
    }
    
    public function ourClientDeleteFormat(Request $request , $our_client_id)
    {
     $data=OurClient::where('our_client_id',$our_client_id)->value('image');
     $fullpath=public_path('upload/ourClient/').$data;
     File::delete($fullpath);
     $m1 = OurClient::where('our_client_id',$our_client_id)->delete(); 
     $request->session()->flash('alert-success','Our Client has been sucessfully deleted.');
     return Redirect::route('ourClient'); 
    }
}
