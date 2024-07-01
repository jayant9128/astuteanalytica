<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use Input;

use App\ExpressPoint;

class ExpressPointController extends Controller
{
    public function expressPointPage(Request $request)
    {
        $data['expressPointData'] = ExpressPoint::orderBy('express_point_id', 'asc')->get();
        $page_title = "Express Point List";
        return view('masters.expressPoint.expressPoint',compact('page_title'),$data);
    }
    
    public function addExpressPointPage(Request $request)
    {
       
       $page_title = "Add Express Point";
       return view('masters.expressPoint.addExpressPoint',compact('page_title'));
    }
    
    public function expressPointStore(Request $request)
    {
       $input = $request->all();
       ExpressPoint::insert($input);
       $request->session()->flash('alert-success','Express Point has been sucessfully added.');
       return Redirect::route('addExpressPoint');
    }
    
    public function expressPointUpdatePage(Request $request,$express_point_id)
    {
      $data['expressPointDatas'] = ExpressPoint::where('express_point_id',$express_point_id)->get();
      $page_title = "Edit Category";
      return view('masters.expressPoint.editExpressPoint',compact('page_title'),$data);
    }
    
    public function expressPointEditStore(Request $request)
    {
        $input = $request->all();
        $express_point_id = $request->express_point_id;
        ExpressPoint::where('express_point_id',$express_point_id)->update($input);
        $request->session()->flash('alert-success','Express Point has been sucessfully updated.');
        return Redirect::route('expressPoint');
    }
    
    public function expressPointDeleteFormat(Request $request , $express_point_id)
    {
      ExpressPoint::where('express_point_id',$express_point_id)->delete(); 
      $request->session()->flash('alert-success','Express Point has been sucessfully deleted.');
      return Redirect::route('expressPoint'); 
    }
}
