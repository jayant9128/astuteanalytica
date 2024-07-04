<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use App\Service;
use App\AllReport;
use App\Category;
use App\Publisher;
use App\AstuteInside;
use App\InsideCategory;
use Response;
class ServiceController extends Controller
{
	public function servicePage(Request $request)
    {
        // Example: Fetch all images from S3 'images' folder
      $files = Storage::disk('s3')->files('upload/service/');

      // Generate URLs
      $data['imageUrls'] = array_map(function($file) {
          return Storage::disk('s3')->url($file);
      }, $files);
      
        $data['serviceData'] = Service::all();
        $page_title = "Service";
        $meta_keyword = "Service";
        $meta_description = "Service";
    	return view('front.service.service',compact('page_title', 'meta_description', 'meta_keyword'), $data);
    }
    
    public function insightPage(Request $request)
    {
       
            $data['insightData'] = AstuteInside::orderBy('date','desc')->paginate(15);
           
                $page_title = "Insight  | Astute Analytica";
                $meta_keyword = "Insight  | Astute Analytica";
                $meta_description = "Insight | Astute Analytica";
           
            return view('front.insight.insight',compact('page_title', 'meta_description', 'meta_keyword'), $data);
    
        
    }
    public function insightSinglePage(Request $request,$slug)
    {
        $cate_id = InsideCategory::where('slug',$slug)->value('inside_cate_id');
        if($cate_id > 0)
        {
            $data['insightData'] = AstuteInside::where('inside_cate_id',$cate_id)->orderBy('date','desc')->paginate(15);
            foreach($data['insightData'] as $dt)
            {
                $page_title = $dt->meta_title;
                $meta_keyword = $dt->key_words;
                $meta_description = $dt->meta_desc;
            }
            return view('front.insight.insight',compact('page_title', 'meta_description', 'meta_keyword'), $data);
    
        }
        else
        {
            $data['insightData'] = AstuteInside::where('astute_inside_slug',$slug)->get();
            foreach($data['insightData'] as $dt)
            {
                $page_title = $dt->meta_title;
                $meta_keyword = $dt->key_words;
                $meta_description = $dt->meta_desc;
            }
            
            return view('front.insight.single-insight',compact('page_title', 'meta_description', 'meta_keyword'), $data);
        }
    }
}