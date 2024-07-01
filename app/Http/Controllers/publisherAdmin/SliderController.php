<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use Input;

use App\Slider;

class SliderController extends Controller
{
    public function sliderPage(Request $request)
    {
        $data['sliderData'] = Slider::orderBy('slider_id', 'asc')->get();
        $page_title = "Slider List";
        return view('masters.slider.slider',compact('page_title'),$data);
    }


    public function sliderStatusUpdateStore(Request $request)
    {
        $input = $request->all();
        $slider_id = $request->slider_id;
        Slider::where('slider_id','=',$slider_id)->update($input);
        $request->session()->flash('alert-success','Slider Status has been sucessfully updated.');
        return Redirect::route('slider');
    }

    public function addSliderPage(Request $request)
    {

       $page_title = "Add Slider";
       return view('masters.slider.addSlider',compact('page_title'));
    }

    public function sliderStore(Request $request)
    {
       $input = $request->all();
      if($request->file('image')!='')
      {
          $file=$request->file('image');
          $filename=$file->getClientOriginalName();
          $imgname = $filename;

          $input['image']= $imgname;
          $destinationPath=public_path('upload/slider/');
          $request->file('image')->move($destinationPath, $imgname);

      }
      Slider::insert($input);
      $request->session()->flash('alert-success','Slider has been sucessfully added.');
      return Redirect::route('addSlider');
    }

    public function sliderUpdatePage(Request $request,$slider_id)
    {
      $data['sliderDatas'] = Slider::where('slider_id',$slider_id)->get();
      $page_title = "Edit Slider";
      return view('masters.slider.editSlider',compact('page_title'),$data);
    }

    public function sliderEditStore(Request $request)
    {
        $input = $request->all();
        $slider_id = $request->slider_id;
          if($request->file('image')!='')
          {
            //   $data=Slider::where('slider_id','=',$slider_id)->value('image');
            //   $fullpath=public_path('upload/slider/').$data;
            //   File::delete($fullpath);

              $file=$request->file('image');
              $filename=$file->getClientOriginalName();
              $imgname = $filename;

              $input['image']= $imgname;
              $destinationPath=public_path('upload/slider/');
              $request->file('image')->move($destinationPath, $imgname);

          }

         Slider::where('slider_id','=',$slider_id)->update($input);

        $request->session()->flash('alert-success','Slider has been sucessfully updated.');
        return Redirect::route('slider');
    }

    public function sliderDeleteFormat(Request $request , $slider_id)
    {
    //  $data=Slider::where('slider_id','=',$slider_id)->value('image');
    //  $fullpath=public_path('upload/slider/').$data;
    //  File::delete($fullpath);
     $m1 = Slider::where('slider_id','=',$slider_id)->delete();
     $request->session()->flash('alert-success','Slider has been sucessfully deleted.');
     return Redirect::route('slider');
    }
}
