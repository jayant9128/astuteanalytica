<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use App\AllReport;
use App\Category;
use App\Publisher;
use App\Region;
use Response;

class OurPartnerController extends Controller
{
    public function ourPartnerStore(Request $request)
    {
        $page_title = "Our Partner";
        $data['ourPartnerData'] = Publisher::orderBY('name', 'ASC')->get();
    	return view('front.ourPartner.ourPartner',compact('page_title'), $data);
    }
    
    public function ourPartnerFilterPage(Request $request, $publisher_code)
    {
        $page_title = "Our Partner Filter";
        $currentDate = date("Y/m/d");
        $categoryTitle = Publisher::where('publisher_code',$publisher_code)->value('name');
        $data['allReportData'] = AllReport::join('category', 'category.category_id', '=', 'all_reports.category_id')->where('all_reports.publisher_code',$publisher_code)->where('all_reports.publish_date', '<=', $currentDate)->orderBy('all_reports.publish_date', 'DESC')->paginate(10);
        $data['categoryData'] = Category::all();
        $data['reginUnique'] = Region::all();
        return view('front.ourPartner.ourPartnerFilter',compact('page_title', 'categoryTitle', 'category_slug', 'publisher_code'), $data);
    }
    
    public function filterPublisherPage(Request $request)
    {
        /*return $request;*/
        $currentDate = date("Y/m/d");
        $categoryss = $request->categorys;
        $regionss = $request->geography;
        $amounts = $request->amount;
        $publisher_code = $request->publisher_code;
     

        $cat_lists = explode(',',$categoryss);
        $regionDatas = explode(',',$regionss);
        $amount = explode('-',$amounts);

        $report_ids1[]=0;
        $report_ids2[]=0;
        
        if($categoryss != "")
        {
            $report_ids1 = AllReport::join('category', 'category.category_id', '=', 'all_reports.category_id')->whereIn('all_reports.category_id', $cat_lists)->where('all_reports.publish_date', '<=', $currentDate)->where('all_reports.publisher_code', $publisher_code)->pluck('all_reports.all_reports_id')->toarray();
        }
        else
        {
            $report_ids1 = AllReport::join('category', 'category.category_id', '=', 'all_reports.category_id')->where('all_reports.publish_date', '<=', $currentDate)->where('all_reports.publisher_code', $publisher_code)->pluck('all_reports.all_reports_id')->toarray();
        }
        
        if($regionss != "")
        {
           $report_ids2 = AllReport::whereIn('all_reports.geography', $regionDatas)->where('publish_date', '<=', $currentDate)->pluck('all_reports_id')->toarray(); 
        }
        
       $report_ids = array_merge($report_ids1, $report_ids2);
       $final_report_id = array_unique($report_ids);
        
        if($amounts == "all")
        {
            $data['allReportData'] = AllReport::join('category', 'category.category_id', '=', 'all_reports.category_id')->where('all_reports.publish_date', '<=', $currentDate)->whereIn('all_reports.all_reports_id', $final_report_id)->orderBy('all_reports.publish_date', 'desc')->paginate(10); 
        }
        else
        { 
            $low=(Integer)$amount[0]; $upper=(Integer)$amount[1];
            $data['allReportData'] = AllReport::join('category', 'category.category_id', '=', 'all_reports.category_id')->where('all_reports.publish_date', '<=', $currentDate)->whereIn('all_reports.all_reports_id', $final_report_id)->whereBetween('all_reports.single_user', array($low, $upper))->orderBy('all_reports.publish_date', 'desc')->paginate(10); 
        }
        
        

        $categoryTitle = "Publicer Filter Data";
        $category_slug = "None";
        $data['categoryData'] = Category::all();
        $data['reginUnique'] = Region::all();
        $page_title = "Publicer Filter Data - Report Ocean";
        
        return view('front.ourPartner.publisherFilterCategor',compact('page_title', 'categoryTitle', 'category_slug', 'categoryss', 'regionss', 'amounts', 'publisher_code'), $data);
        
        
    }


}
