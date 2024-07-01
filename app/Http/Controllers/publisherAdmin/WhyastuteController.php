<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use Input;

use App\WhyAstute;

class WhyastuteController extends Controller
{
    public function whyAstutePage(Request $request)
    {
        $data['whyAstuteData'] = WhyAstute::orderBy('why_astute_id', 'asc')->get();
        $page_title = "Why Astute List";
        return view('masters.whyAstute.whyAstute',compact('page_title'),$data);
    }
    
    public function addWhyAstutePage(Request $request)
    {
       
       $page_title = "Add Why Astute";
       return view('masters.whyAstute.addWhyAstute',compact('page_title'));
    }
    
    public function whyAstuteStore(Request $request)
    {
       $input = $request->all();
       WhyAstute::insert($input);
       $request->session()->flash('alert-success','Why Astute has been sucessfully added.');
       return Redirect::route('addWhyastute');
    }
    
    public function whyAstuteUpdatePage(Request $request,$why_astute_id)
    {
      $data['whyAstuteDatas'] = WhyAstute::where('why_astute_id',$why_astute_id)->get();
      $page_title = "Edit Category";
      return view('masters.whyAstute.editWhyAstute',compact('page_title'),$data);
    }
    
    public function whyAstuteEditStore(Request $request)
    {
        $input = $request->all();
        $why_astute_id = $request->why_astute_id;
        WhyAstute::where('why_astute_id',$why_astute_id)->update($input);
        $request->session()->flash('alert-success','Why Astute has been sucessfully updated.');
        return Redirect::route('whyastute');
    }
    
    public function whyAstuteDeleteFormat(Request $request , $why_astute_id)
    {
      WhyAstute::where('why_astute_id',$why_astute_id)->delete(); 
      $request->session()->flash('alert-success','Why Astute has been sucessfully deleted.');
      return Redirect::route('whyastute'); 
    }
}
