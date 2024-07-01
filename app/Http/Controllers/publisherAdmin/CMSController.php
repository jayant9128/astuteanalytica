<?php

namespace App\Http\Controllers\masterAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth,Redirect,View,File,Config,Image;
use App\Cms;
use Validator;
use DB;

class CMSController extends Controller
{
    public function cms_list(Request $request)
    {
        $users['cms_data'] = Cms::orderBy('cms_id', 'asc')->get();
        $page_title = "CMS Page";
       return view('masters.cms.cms_list',compact('page_title'),$users);
    }
  
    public function add_cms_page()
    {
        $page_title = "Add CMS Page";
       return view('masters.cms.add_cms',compact('page_title'));
    } 
    
    public function cms_store(Request $request)
    {
        $input = $request->all();
        Cms::insert($input);
        $request->session()->flash('alert-success','Page Added !!');
        return Redirect::route('cms_page');
    }
    public function cms_update(Request $request,$id)
    {
        $data['cms_data'] = Cms::where('cms_id',$id)->get();
      $page_title = "Edit CMS Page";
      return view('masters.cms.edit_cms',compact('page_title'),$data);
    } 
    public function cms_update_store(Request $request)
    {
        $cms_id = $request->cms_id;
        $input = $request->all();
        Cms::where('cms_id',$cms_id)->update($input);
        $request->session()->flash('alert-success','CMS Page has been sucessfully updated.');
        return Redirect::route('cms_page');
    }
    public function cmsdestory(Request $request,$id)
    {
        Cms::where('cms_id','=',$id)->delete();
        $request->session()->flash('alert-success','CMS Page has been sucessfully deleted.');
        return Redirect::route('cms_page');
    }
    
    public function cmsSeeMorePage(Request $request,$cms_id)
    {
        $data['cms_see_data'] = Cms::where('cms_id',$cms_id)->get();
      $page_title = "See More CMS Page";
      return view('masters.cms.see_more_cms',compact('page_title'),$data);
    } 
}
