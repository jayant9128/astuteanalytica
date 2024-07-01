<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use App\InsideCategory;
use Input;

use App\AstuteInside;

class AstuteInsideController extends Controller
{
    public function astuteInsidePage(Request $request)
    {
        $data['astuteInsideData'] = AstuteInside::join('inside_category','inside_category.inside_cate_id','astute_inside.inside_cate_id')->orderBy('astute_inside_id', 'asc')->get();
        $data['inside_cate'] = InsideCategory::all();
        $page_title = "Astute Inside List";
        return view('masters.astuteInside.astuteInside',compact('page_title'),$data);
    }

    public function addastuteInsidePage(Request $request)
    {

       $page_title = "Add Astute Inside";
       $data['inside_cate'] = InsideCategory::all();
       return view('masters.astuteInside.addastuteInside',compact('page_title'),$data);
    }

    public function astuteInsideStore(Request $request)
    {
       $input = $request->all();
      if($request->file('astute_inside_image')!='')
      {
          $file=$request->file('astute_inside_image');
          $filename=$file->getClientOriginalName();
          $imgname = $filename;

          $input['astute_inside_image']= $imgname;
          $destinationPath=public_path('upload/astuteInside/');
          $request->file('astute_inside_image')->move($destinationPath, $imgname);

      }

      if($request->file('author_image')!='')
      {
          $file=$request->file('author_image');
          $filename=$file->getClientOriginalName();
          $imgname = $filename;

          $input['author_image']= $imgname;
          $destinationPath=public_path('upload/astuteInside/');
          $request->file('author_image')->move($destinationPath, $imgname);

      }
      astuteInside::insert($input);
      $request->session()->flash('alert-success','Astute Inside has been sucessfully added.');
      return Redirect::route('addastuteInside');
    }

    public function astuteInsideUpdatePage(Request $request,$astute_inside_id)
    {
      $data['astuteInsideDatas'] = astuteInside::where('astute_inside_id',$astute_inside_id)->get();
      $data['inside_cate'] = InsideCategory::all();
      $page_title = "Edit Astute Inside";
      return view('masters.astuteInside.editastuteInside',compact('page_title'),$data);
    }

    public function astuteInsideEditStore(Request $request)
    {
        $input = $request->all();
        $astute_inside_id = $request->astute_inside_id;
          if($request->file('astute_inside_image')!='')
          {
              $data=astuteInside::where('astute_inside_id','=',$astute_inside_id)->value('astute_inside_image');
              $fullpath=public_path('upload/astuteInside/').$data;
              File::delete($fullpath);

              $file=$request->file('astute_inside_image');
              $filename=$file->getClientOriginalName();
              $imgname = $filename;

              $input['astute_inside_image']= $imgname;
              $destinationPath=public_path('upload/astuteInside/');
              $request->file('astute_inside_image')->move($destinationPath, $imgname);

          }

          if($request->file('author_image')!='')
          {
              $data1=astuteInside::where('astute_inside_id','=',$astute_inside_id)->value('author_image');
              $fullpath1=public_path('upload/astuteInside/').$data1;
              File::delete($fullpath1);

              $file=$request->file('author_image');
              $filename=$file->getClientOriginalName();
              $imgname = $filename;

              $input['author_image']= $imgname;
              $destinationPath=public_path('upload/astuteInside/');
              $request->file('author_image')->move($destinationPath, $imgname);

          }

         astuteInside::where('astute_inside_id','=',$astute_inside_id)->update($input);

        $request->session()->flash('alert-success','Astute Inside has been sucessfully updated.');
        return Redirect::route('astuteInside');
    }

    public function astuteInsideDeleteFormat(Request $request , $astute_inside_id)
    {


     $m1 = astuteInside::where('astute_inside_id','=',$astute_inside_id)->delete();
     $request->session()->flash('alert-success','Astute Inside has been sucessfully deleted.');
     return Redirect::route('astuteInside');
    }

    public function astuteInsideSeeMorePage(Request $request,$astute_inside_id)
    {
      $data['astuteInsideShowMoreDatas'] = astuteInside::where('astute_inside_id',$astute_inside_id)->get();
      $page_title = "Astute Inside Detail";
      return view('masters.astuteInside.showMoreastuteInside',compact('page_title'),$data);
    }

	function insideCategory()
    {
        $data['inside'] = InsideCategory::all();
        $page_title = "Astute Inside Category";
        return view('masters.astuteInside.category',compact('page_title'),$data);
    }
    function insideCategoryStore(Request $request)
    {
        $input = $request->all();
        InsideCategory::insert($input);
        $request->session()->flash('alert-success','Astute Inside Category has been sucessfully added.');
        return Redirect::route('insideCategory');
    }
    function insideCategoryUpdateStore(Request $request)
    {
        $input = $request->all();
        InsideCategory::where('inside_cate_id',$request->inside_cate_id)->update($input);
        $request->session()->flash('alert-success','Astute Inside Category has been sucessfully updated.');
        return Redirect::route('insideCategory');
    }
    function insideCategoryDestory(Request $request,$id)
    {
        InsideCategory::where('inside_cate_id',$id)->delete();
        $request->session()->flash('alert-success','Astute Inside Category has been sucessfully deleted.');
        return Redirect::route('insideCategory');
    }
}
