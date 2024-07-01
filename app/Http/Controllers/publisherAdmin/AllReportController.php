<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use Input;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AllReportImport;
use App\Exports\AllReportExport;
use App\AllReport;
use App\Category;
use App\Publisher;
use App\TOC;
use App\FAQ;
use App\Checkout;
use App\AllJapaneseReport;
use App\FAQJapanese;
use App\Region;

use Carbon\Carbon;

use truncate;

class AllReportController extends Controller
{
    public function allReportPage(Request $request)
    {
        $data['allReportData'] = AllReport::join('category', 'category.category_id', '=', 'all_reports.category_id')->orderBy('all_reports.all_reports_id', 'DESC')->get();
       
        
        $data['categoryData'] = Category::orderBy('category_id', 'asc')->get();
        
        $page_title = "All Report List";
        return view('masters.allReport.allReport',compact('page_title'),$data);
    }
    

    /* Discount Code */
    function ReportDiscount(Request $request)
    {
       
        $data['discount'] = DB::table('report_discount')->where('discount_id',1)->get();
        $page_title = "Report Discount";
       // return "Mahi";
        return view('masters.allReport.discount',compact('page_title'),$data);
    }
    function ReportDiscountSave(Request $request)
    {
        $input = $request->all();
        DB::table('report_discount')->where('discount_id',1)->update($input);
        $request->session()->flash('alert-success','Reports discount has been updated.');
        return Redirect::route('reportDiscount');

    }
    
    /* Search Code Start */
    
    public function allReportSearchPage(Request $request)
    {
        $categoryCode = $request->category_id; 
        $start_date = $request->start_date;
        $end_date = $request->end_date; 

        $data['categoryData'] = Category::all();
        
        if($categoryCode && $start_date && $end_date)
        {
            $data['allReportData'] = AllReport::join('category', 'category.category_id', '=', 'all_reports.category_id')->where('all_reports.category_id', $categoryCode)->where('all_reports.publish_date', '>=', $start_date)->where('all_reports.publish_date', '<=', $end_date)->orderBy('all_reports.all_reports_id', 'DESC')->get();
            
        }
        elseif($categoryCode)
        {
            $data['allReportData'] = AllReport::join('category', 'category.category_id', '=', 'all_reports.category_id')->where('all_reports.category_id', $categoryCode)->orderBy('all_reports.all_reports_id', 'DESC')->get();
        }
        elseif($start_date && $end_date)
        {
            $data['allReportData'] = AllReport::join('category', 'category.category_id', '=', 'all_reports.category_id')->where('all_reports.publish_date', '>=', $start_date)->where('all_reports.publish_date', '<=', $end_date)->orderBy('all_reports.all_reports_id', 'DESC')->get();

        }
        else
        {
            $data['allReportData'] = AllReport::join('category', 'category.category_id', '=', 'all_reports.category_id')->orderBy('all_reports.all_reports_id', 'DESC')->get();
        }
        
        
        $page_title = "All Report List";
        return view('masters.allReport.allReport',compact('page_title','categoryCode', 'start_date', 'end_date'),$data);
    }
    
    /* Search Code End */

    public function treadingStatusUpdateSave(Request $request)
    {
        
        $input = $request->all();
        $all_reports_id = $request->all_reports_id;
        
        
        AllReport::where('all_reports_id',$all_reports_id)->update($input);
        
        unset($input['treading']);
        unset($input['upcoming']);
        
        if($request->treading == "YES")
        {
            $key =  DB::table('trending_report')->where('all_reports_id',$all_reports_id)->value('trending_id');
            if($key == "")
            {
                 DB::table('trending_report')->insert($input);
            }
           
        }
        else
        {
            DB::table('trending_report')->where('all_reports_id',$all_reports_id)->delete();
        }
        $request->session()->flash('alert-success','All Report Status has been sucessfully Updated.');
        return Redirect::route('allReport');
    }
    
    
    
    public function addAllReportPage(Request $request)
    {
        
        $data['categoryData'] = Category::where('parent_id',0)->orderBy('category_id', 'asc')->get();
       $page_title = "Add All Report";
       return view('masters.allReport.addAllReport',compact('page_title'), $data);
    }
    
     public function allReportStore(Request $request)
    {

      
    //      dd( $request->all());
    //    die();
        
        try{
          //return $request;
        $input = $request->all();
    
        $bargraph_x = array();
        $bargraph_y = array();
        $bargraph_color = array();
        $bargraph_fake = array();
        $piechart_x = array();
        $piechart_y = array();
        $piechart_fake = array();
        $piechart_color = array();
        $bargraph=$request->bargraph;
        foreach($bargraph as $row)
        {
            array_push($bargraph_x,$row['xValues']);
            array_push($bargraph_y,$row['yValues']);
            array_push($bargraph_fake,$row['bar_fake']);
            array_push($bargraph_color,$row['barColors']);
        }
        $input['bargraph_x']=implode(',',$bargraph_x);
        $input['bargraph_y']=implode(',',$bargraph_y);
        $input['bargraph_fake']=implode(',',$bargraph_fake);
        $input['bargraph_color']=implode(',',$bargraph_color);
        
        $piechart=$request->piechart;
        foreach($piechart as $row)
        {
            array_push($piechart_x,$row['xValues']);
            array_push($piechart_y,$row['yValues']);
            array_push($piechart_fake,$row['pie_fake']);
            array_push($piechart_color,$row['pieColors']);
        }
        $input['piechart_x']=implode(',',$piechart_x);
        $input['piechart_y']=implode(',',$piechart_y);
        $input['piechart_fake']=implode(',',$piechart_fake);
        $input['piechart_color']=implode(',',$piechart_color);
        $input['bargraph'] = "";
        $input['piechart'] = "";
        $countCate = AllReport::count('category_id');
    
        $n = $countCate+1;
        $increment = str_pad( $n, 3, '0', STR_PAD_LEFT);
        $input['report_id'] = "AA".date('my').$increment;
    
        $input['is_import'] = "NO";
        if($request->file('infographics')!='')
        {
            $file=$request->file('infographics');
            $filename=$file->getClientOriginalName();
            $imgname = $filename;
            
            $input['infographics']= $imgname;       
            $destinationPath=public_path('upload/report/');       
            $request->file('infographics')->move($destinationPath, $imgname);
           
        } 
        if($request->file('image')!='')
        {
            $file=$request->file('image');
            $filename=$file->getClientOriginalName();
            $imgname = $filename;
            
            $input['image']= $imgname;       
            $destinationPath=public_path('upload/report/');       
            $request->file('image')->move($destinationPath, $imgname);
           
        } 
        
        // ss
          AllReport::insert($input);

         $inputs['all_reports_id'] = DB::getPdo()->lastInsertId();
         $inputs['publish_date'] = $request->publish_date;
         $inputs['category_id'] = $request->category_id;

         $input['all_reports_id'] =  $inputs['all_reports_id'];

         AllJapaneseReport::insert($input);

         DB::table('reports_category')->insert($inputs);
         $request->session()->flash('alert-success','All Report has been sucessfully added.');
         return Redirect::route('addAllReport');
       }catch(\Exception $e){
           $result=$e->getMessage();
             $request->session()->flash('alert-danger',$result);
            return Redirect::route('addAllReport');
       }
    }
    
    public function AllReportUpdatePage(Request $request,$all_reports_id)
    {
      $data['allReportDatas'] = AllReport::where('all_reports_id',$all_reports_id)->get();
      
        
      $data['categoryData'] = Category::where('parent_id',0)->orderBy('category_id', 'asc')->get();
      $page_title = "Edit All Report";
      return view('masters.allReport.editAllReport',compact('page_title'),$data);
    }

    public function allJapaneseReportUpdatePage(Request $request,$all_reports_id)
    {
      // $data['allReportDatas'] = AllReport::where('all_reports_id',$all_reports_id)->get();
      $data['allReportDatas'] = AllJapaneseReport::where('all_reports_id',$all_reports_id)->get(); 
        
      $data['categoryData'] = Category::where('parent_id',0)->orderBy('category_id', 'asc')->get();
      $page_title = "Edit All Report";
      return view('masters.allReport.editAllJapReport',compact('page_title'),$data);
    }
    
    public function allReportEditStore(Request $request)
    {
        //return $request;
        $input = $request->all();
       
        $bargraph_x = array();
        $bargraph_y = array();
        $bargraph_color = array();
        $bargraph_fake = array();
        $piechart_x = array();
        $piechart_y = array();
        $piechart_fake = array();
        $piechart_color = array();
        $bargraph=$request->bargraph;
        foreach($bargraph as $row)
        {
            array_push($bargraph_x,$row['xValues']);
            array_push($bargraph_y,$row['yValues']);
            array_push($bargraph_fake,$row['bar_fake']);
            array_push($bargraph_color,$row['barColors']);
        }
        $input['bargraph_x']=implode(',',$bargraph_x);
        $input['bargraph_y']=implode(',',$bargraph_y);
        $input['bargraph_fake']=implode(',',$bargraph_fake);
        $input['bargraph_color']=implode(',',$bargraph_color);
        
        $piechart=$request->piechart;
        foreach($piechart as $row)
        {
            array_push($piechart_x,$row['xValues']);
            array_push($piechart_y,$row['yValues']);
            array_push($piechart_fake,$row['pie_fake']);
            array_push($piechart_color,$row['pieColors']);
        }
        $input['piechart_x']=implode(',',$piechart_x);
        $input['piechart_y']=implode(',',$piechart_y);
        $input['piechart_fake']=implode(',',$piechart_fake);
        $input['piechart_color']=implode(',',$piechart_color);
        $input['bargraph'] = "";
        $input['piechart'] = "";

        $all_reports_id = $request->all_reports_id;
        if($request->file('infographics')!='')
          {
              $file=$request->file('infographics');
              $filename=$file->getClientOriginalName();
              $imgname = $filename;

              $input['infographics']= $imgname;       
              $destinationPath=public_path('upload/report/');       
              $request->file('infographics')->move($destinationPath, $imgname);
           // return "Mahi";

          } 
        if($request->file('image')!='')
          {
              $file=$request->file('image');
              $filename=$file->getClientOriginalName();
              $imgname = $filename;

              $input['image']= $imgname;       
              $destinationPath=public_path('upload/report/');       
              $request->file('image')->move($destinationPath, $imgname);

          } 
          
          if(isset($request->pdf))
          {
              $input['pdf'] = $request->pdf;
          }
          else
          {
              $input['pdf'] = "";
          }

          if(isset($request->update_availiable))
          {
              $input['update_availiable'] = $request->update_availiable;
          }
          else
          {
              $input['update_availiable'] = "0";
          }
          
          if(isset($request->excel))
          {
              $input['excel'] = $request->excel;
          }
          else
          {
              $input['excel'] = "";
          }
          
          if(isset($request->ppt))
          {
              $input['ppt'] = $request->ppt;
          }
          else
          {
              $input['ppt'] = "";
          }
          
          if(isset($request->web_formate))
          {
              $input['web_formate'] = $request->web_formate;
          }
          else
          {
              $input['web_formate'] = "";
          }
          
      
          
        AllReport::where('all_reports_id',$all_reports_id)->update($input);
        //return $input;
          
        $inputs['publish_date'] = $request->publish_date;
        $inputs['category_id'] = $request->category_id;
        
        DB::table('reports_category')->where('all_reports_id',$all_reports_id)->update($inputs);
        $request->session()->flash('alert-success','All Report has been sucessfully updated.');
        return Redirect::route('allReport');
    }

     public function allJapaneseReportEditStore(Request $request)
    {
        $input = $request->except('report_jap_id');
        $all_reports_id = $request->all_reports_id;
        $japanese_report_id = $request->report_jap_id;
        $input['id'] = $request->report_jap_id;
        // if($request->file('infographics')!='')
        //   {
        //       $file=$request->file('infographics');
        //       $filename=$file->getClientOriginalName();
        //       $imgname = $filename;

        //       $input['infographics']= $imgname;       
        //       $destinationPath=public_path('upload/report/');       
        //       $request->file('infographics')->move($destinationPath, $imgname);
        //    // return "Mahi";

        //   } 
        // if($request->file('image')!='')
        //   {
        //       $file=$request->file('image');
        //       $filename=$file->getClientOriginalName();
        //       $imgname = $filename;

        //       $input['image']= $imgname;       
        //       $destinationPath=public_path('upload/report/');       
        //       $request->file('image')->move($destinationPath, $imgname);

        //   } 
          
          if(isset($request->pdf))
          {
              $input['pdf'] = $request->pdf;
          }
          else
          {
              $input['pdf'] = "";
          }

          if(isset($request->update_availiable))
          {
              $input['update_availiable'] = $request->update_availiable;
          }
          else
          {
              $input['update_availiable'] = "0";
          }
          
          if(isset($request->excel))
          {
              $input['excel'] = $request->excel;
          }
          else
          {
              $input['excel'] = "";
          }
          
          if(isset($request->ppt))
          {
              $input['ppt'] = $request->ppt;
          }
          else
          {
              $input['ppt'] = "";
          }
          
          if(isset($request->web_formate))
          {
              $input['web_formate'] = $request->web_formate;
          }
          else
          {
              $input['web_formate'] = "";
          }
          
      
        
           try{
              $updateData =  AllJapaneseReport::where('all_reports_id',$all_reports_id)->where('id',$japanese_report_id)->update($input);
              $inputs['publish_date'] = $request->publish_date;
              $inputs['category_id'] = $request->category_id;
              
              // DB::table('reports_category')->where('all_reports_id',$all_reports_id)->update($inputs);
              $request->session()->flash('alert-success','All Report has been sucessfully updated.');
              return Redirect::route('allReport');
             
            }catch(\Exception $e){
              dd($e->getMessage());
                $request->session()->flash('alert-danger','Something went wrong.');
                return Redirect::route('allReport');
            }
        //return $input;
          
       
    }
    
    public function allReportDeleteFormat(Request $request , $all_reports_id)
    {
         $m1 = AllReport::where('all_reports_id',$all_reports_id)->delete(); 
         
         DB::table('reports_category')->where('all_reports_id',$all_reports_id)->delete();
         $request->session()->flash('alert-success','All Report has been sucessfully deleted.');
         return Redirect::route('allReport'); 
    }
    
    
    /* Import Code Start */
    
    public function importAllReportPage(Request $request)
    {
        $page_title = "Import All Report";
        return view('masters.allReport.importAllReport',compact('page_title'));
    }
    
    public function importAllReportStore(Request $request)
    {
        
        $lastInsertAllReportsId = AllReport::orderBy('all_reports_id', 'desc')->limit(1)->value('all_reports_id');
        
        //Excel::import(new AllReportImport,request()->file('file'));
        
        
        $fileName = $_FILES["file"]["tmp_name"];    
        $count = '101';
        if ($_FILES["file"]["size"] > 0) {        
        $file = fopen($fileName, "r");  
        
            while (($column = fgetcsv($file, 1000000, ",")) !== FALSE) {
                  @$dd = $count++;
      
               $input['report_id'] = $column[0];
               $input['report_code'] = mb_convert_encoding($column[1], 'UTF-8', 'UTF-8');
               $input['category_id'] = (int)$column[2];
               $input['report_title'] = mb_convert_encoding($column[3], 'UTF-8', 'UTF-8');
               $input['report_description'] = mb_convert_encoding($column[4], 'UTF-8', 'UTF-8');
                
               $input['table_content'] = mb_convert_encoding($column[5], 'UTF-8', 'UTF-8');
              
               $input['list_of_tables'] = mb_convert_encoding($column[6], 'UTF-8', 'UTF-8');
                
               $input['list_of_figure'] = mb_convert_encoding($column[7], 'UTF-8', 'UTF-8');
                
              /*return $input['list_of_figure'];*/
              $input['pages'] = $column[8];
               $input['publish_date'] = $column[9];
               $input['format'] = $column[10];
               $input['geography'] = mb_convert_encoding($column[11], 'UTF-8', 'UTF-8');
               $input['key_words'] = mb_convert_encoding($column[12], 'UTF-8', 'UTF-8');
               $input['single_user'] = (int)$column[13];
               $input['multi_user'] = (int)$column[14];
               $input['corporate_user'] = (int)$column[15];
               $input['publisher_code'] = $column[16];
               $input['treading'] = $column[17];
          
          
           
              AllReport::insert($input); 
              $id =  DB::getPdo()->lastInsertId();
              $inputs['all_reports_id'] = $id;
              $inputs['publish_date'] = $column[9];
              $inputs['category_id'] = (int)$column[2];
              
              DB::table('reports_category')->insert($inputs);
        }}
        
        
        
        
        $request->session()->flash('alert-success','All Report Import !!');
        return Redirect::route('allReport');
    }
    
    /* Import Code End */
    
    
    
    /* Export Code Start */
    
    public function export(Request $request) 
    {
        
        
        $visitors = DB::table('temp_all_report')->truncate();
       
        $categoryCode = $request->categoryCode;
        
        $publisherCode = $request->publisherCode;
        
        $start_date = $request->start_date;
        
        $end_date = $request->end_date;
        
        if($publisherCode && $categoryCode && $start_date && $end_date)
        {
           $allReportData = AllReport::where('category_id', $categoryCode)->whereDate('publish_date', '>=', $start_date)->whereDate('publish_date', '<=', $end_date)->get();
           
           foreach($allReportData as $allReport)
            {
                
                $reportId = $allReport->report_id;
                $reportTitle = $allReport->report_title;
                $categoryId = $allReport->category_id;
                
                $categoryTitle = Category::where('category_id', $categoryId)->value('category_title');
                
                $reportUrl = 'https://reportocean.com/industry-verticals/details?report_id='.$reportId.'&cat_title='.$categoryTitle;
                
                $tocUrl =  'https://reportocean.com/toc/'.$reportId;
                
                $sampleRequestUrl = 'https://reportocean.com/industry-verticals/sample-request?report_id='.$reportId;
                
                
                $inputData['report_id'] = $reportId;
                
                $inputData['report_title'] = $reportTitle;
                $inputData['rd_url'] = $reportUrl;
                $inputData['toc_url'] = $tocUrl;
                $inputData['sample_url'] = $sampleRequestUrl;
                
                
                DB::table('temp_all_report')->insert($inputData);
                
            }
        }
        elseif($categoryCode)
        {
            $allReportData = AllReport::where('category_id', $categoryCode)->get();
            
            foreach($allReportData as $allReport)
            {
                
                $reportId = $allReport->report_id;
                
                $reportTitle = $allReport->report_title;
                $categoryId = $allReport->category_id;
                
                $categoryTitle = Category::where('category_id', $categoryId)->value('category_title');
                
                $reportUrl = 'https://reportocean.com/industry-verticals/details?report_id='.$reportId.'&cat_title='.$categoryTitle;
                
                $tocUrl =  'https://reportocean.com/toc/'.$reportId;
                
                $sampleRequestUrl = 'https://reportocean.com/industry-verticals/sample-request?report_id='.$reportId;
                
                
                $inputData['report_id'] = $reportId;
                
                $inputData['report_title'] = $reportTitle;
                $inputData['rd_url'] = $reportUrl;
                $inputData['toc_url'] = $tocUrl;
                $inputData['sample_url'] = $sampleRequestUrl;
                
                
                DB::table('temp_all_report')->insert($inputData);
                
            }
            
            
        }
        elseif($start_date && $end_date)
        {
            $allReportData = AllReport::whereDate('publish_date', '>=', $start_date)->whereDate('publish_date', '<=', $end_date)->get();
            
            foreach($allReportData as $allReport)
            {
                
                $reportId = $allReport->report_id;
               
                $reportTitle = $allReport->report_title;
                $categoryId = $allReport->category_id;
                
                $categoryTitle = Category::where('category_id', $categoryId)->value('category_title');
                
                $reportUrl = 'https://reportocean.com/industry-verticals/details?report_id='.$reportId.'&cat_title='.$categoryTitle;
                
                $tocUrl =  'https://reportocean.com/toc/'.$reportId;
                
                $sampleRequestUrl = 'https://reportocean.com/industry-verticals/sample-request?report_id='.$reportId;
                
                
                $inputData['report_id'] = $reportId;
                
                $inputData['report_title'] = $reportTitle;
                $inputData['rd_url'] = $reportUrl;
                $inputData['toc_url'] = $tocUrl;
                $inputData['sample_url'] = $sampleRequestUrl;
                
                
                DB::table('temp_all_report')->insert($inputData);
                
            }
            
        }
        else
        {
           $allReportData = AllReport::all();
           
           foreach($allReportData as $allReport)
            {
                
                $reportId = $allReport->report_id;
                
                $reportTitle = $allReport->report_title;
                $categoryId = $allReport->category_id;
                
                $categoryTitle = Category::where('category_id', $categoryId)->value('category_title');
                
                $reportUrl = 'https://reportocean.com/industry-verticals/details?report_id='.$reportId.'&cat_title='.$categoryTitle;
                
                $tocUrl =  'https://reportocean.com/toc/'.$reportId;
                
                $sampleRequestUrl = 'https://reportocean.com/industry-verticals/sample-request?report_id='.$reportId;
                
                
                $inputData['report_id'] = $reportId;
               
                $inputData['report_title'] = $reportTitle;
                $inputData['rd_url'] = $reportUrl;
                $inputData['toc_url'] = $tocUrl;
                $inputData['sample_url'] = $sampleRequestUrl;
                
                
                DB::table('temp_all_report')->insert($inputData);
                
            }
        }
        
        return Excel::download(new AllReportExport, 'report.xlsx');
        return Redirect::route('allReport');
        
        /*$publisherCode = "all";
        $categoryCode = "all";
        
        if(isset($request->categoryCode))
        {
            $categoryCode = $request->categoryCode;
        }
        elseif(isset($request->publisherCode))
        {
            $publisherCode = $request->publisherCode;
        }
        return Excel::download(new AllReportExport($publisherCode, $categoryCode), 'report.xlsx');*/
    }
    
    /* Export Code End */
    
    
    
    /* TOC Code Start */
    
    
    public function TOCList(Request $request,$id)
    {
        $data['tocData'] = TOC::where('report_id',$id)->get();
        $page_title = "TOC List";
        $report_id = AllReport::where('all_reports_id',$id)->value('report_id');
        return view('masters.allReport.toc',compact('page_title','report_id','id'),$data);
    }
    
    public function TOC_add(Request $request,$id)
    {
       $page_title = "Add TOC";
       $report_id = AllReport::where('all_reports_id',$id)->value('report_id');
       return view('masters.allReport.add_toc',compact('page_title','report_id','id'));
    }
    
    public function tocStore(Request $request)
    {
      $input = $request->all(); 
      TOC::insert($input);
      $request->session()->flash('alert-success','TOC has been sucessfully added.');
      return Redirect::back();
    }
    
    public function tocUpdatePage(Request $request,$toc_id)
    {
      $data['tocData'] = TOC::where('toc_id',$toc_id)->get();
      $id = TOC::where('toc_id',$toc_id)->value('report_id');
      $report_id = AllReport::where('all_reports_id',$id)->value('report_id');
      $page_title = "Edit TOC";
      return view('masters.allReport.edit_toc',compact('page_title','report_id','id','toc_id'),$data);
    }
    
    public function tocEditStore(Request $request)
    {
        $input = $request->all();
        $toc_id = $request->toc_id;
        $id = TOC::where('toc_id',$toc_id)->value('report_id');
        TOC::where('toc_id',$toc_id)->update($input);
        $request->session()->flash('alert-success','TOC has been sucessfully updated.');
        return Redirect::route('tocList',$id);
    }
    
    public function tocDeleteFormat(Request $request , $toc_id)
    {
     TOC::where('toc_id',$toc_id)->delete(); 
     $request->session()->flash('alert-success','TOC has been sucessfully deleted.');
     return Redirect::back();
    }
    
    /* TOC Code End  */
    
    
    /* FAQ Code Start */
    
    
    public function FAQList(Request $request,$id)
    {
        $data['faqData'] = FAQ::where('report_id',$id)->get();
        $page_title = "FAQ List";
        $report_id = AllReport::where('all_reports_id',$id)->value('report_id');
        return view('masters.allReport.faq',compact('page_title','report_id','id'),$data);
    }

     public function FAQListJapanese(Request $request,$id)
    {
        $data['faqData'] = FAQJapanese::where('report_id',$id)->get();
        $page_title = "FAQ List";
        $report_id = AllReport::where('all_reports_id',$id)->value('report_id');
        return view('masters.allReport.japanese_faq',compact('page_title','report_id','id'),$data);
    }
    
    public function FAQ_add(Request $request,$id)
    {
       $page_title = "Add FAQ";
       $report_id = AllReport::where('all_reports_id',$id)->value('report_id');
       return view('masters.allReport.add_faq',compact('page_title','report_id','id'));
    }
    
    public function faqStore(Request $request)
    {
     try{
       
        if(isset($request->japanese_switch)){
            $input = $request->except('japanese_switch'); 
           FAQJapanese::insert($input);
        }else{
            $input = $request->all(); 
          FAQ::insert($input);
        }
      
        $request->session()->flash('alert-success','FAQ has been sucessfully added.');
        return Redirect::back();
     }catch(\Exception $e){
           dd($e->getMessage());
             $request->session()->flash('alert-danger','Something went wrong.');
            return Redirect::route('addAllReport');
       }
    }
    
    public function faqUpdatePage(Request $request,$faq_id)
    {
      $data['faqData'] = FAQ::where('faq_id',$faq_id)->get();
      $id = FAQ::where('faq_id',$faq_id)->value('report_id');
      $report_id = AllReport::where('all_reports_id',$id)->value('report_id');
      $page_title = "Edit FAQ";
      return view('masters.allReport.edit_faq',compact('page_title','report_id','id','faq_id'),$data);
    }

     public function faqJapaneseUpdatePage(Request $request,$faq_id)
    {
      $data['faqData'] = FAQJapanese::where('faq_id',$faq_id)->get();
      $id = FAQJapanese::where('faq_id',$faq_id)->value('report_id');
      $report_id = AllReport::where('all_reports_id',$id)->value('report_id');
      $page_title = "Edit FAQ";
      return view('masters.allReport.edit_japanese_faq',compact('page_title','report_id','id','faq_id'),$data);
    }
    
    public function faqEditStore(Request $request)
    {
        $input = $request->all();
        $faq_id = $request->faq_id;
        $id = FAQ::where('faq_id',$faq_id)->value('report_id');
        FAQ::where('faq_id',$faq_id)->update($input);
        $request->session()->flash('alert-success','FAQ has been sucessfully updated.');
        return Redirect::route('faqList',$id);
    }

     public function faqJapaneseEditStore(Request $request)
    {
        $input = $request->all();
        $faq_id = $request->faq_id;
        $id = FAQJapanese::where('faq_id',$faq_id)->value('report_id');
        FAQJapanese::where('faq_id',$faq_id)->update($input);
        $request->session()->flash('alert-success','FAQ has been sucessfully updated.');
        return Redirect::route('faqListJapanese',$id);
    }
    
    public function faqDeleteFormat(Request $request , $faq_id)
    {
     FAQ::where('faq_id',$faq_id)->delete(); 
     $request->session()->flash('alert-success','FAQ has been sucessfully deleted.');
     return Redirect::back();
    }

    public function faqJapaneseDeleteFormat(Request $request , $faq_id)
    {
     FAQJapanese::where('faq_id',$faq_id)->delete(); 
     $request->session()->flash('alert-success','FAQ has been sucessfully deleted.');
     return Redirect::back();
    }
    
    /* FAQ Code End  */
    
    
    /* Report Purchase Code Start */
    
    public function reportPurchasePage(Request $request)
    {
        $data['reportPurchaseData'] = Checkout::join('all_reports', 'all_reports.all_reports_id', '=', 'report_checkout.all_report_id')->where('report_checkout.payment_status','Success')->orderBy('report_checkout.checkout_id', 'DESC')->get();
        
        $page_title = "Report Purchase List";
        return view('masters.allReport.reportPurchase',compact('page_title'),$data);
    }
    public function reportPurchaseDeleteFormat(Request $request , $payment_id)
    {
         $m1 = DB::table('payment')->where('payment_id',$payment_id)->delete(); 
         $request->session()->flash('alert-success','Report Purchase has been sucessfully deleted.');
         return Redirect::route('reportPurchase'); 
    }
    
    /* Report Purchase Code End*/
    
    
    /* Request Sample Code Start */
    
    public function requestSamplePage(Request $request)
    {
        $data['requestSampleData'] = DB::table('request_sample')->join('all_reports', 'all_reports.all_reports_id', '=', 'request_sample.all_reports_id')->orderBy('request_sample_id', 'DESC')->limit(1000)->get();
        
        $page_title = "Request Sample List";
        return view('masters.allReport.requestSample',compact('page_title'),$data);
    }
    public function requestJpSamplePage(Request $request)
    {
        //return "Mahi";
        $data['requestSampleData'] = DB::table('request_jp_sample')->orderBy('request_sample_id', 'DESC')->limit(1000)->get();
       // return $data;
        $page_title = "Request Jap Sample List"; 
        return view('masters.allReport.requestJPSample',compact('page_title'),$data);
    }
    public function requestSampleDeleteFormat(Request $request , $request_sample_id)
    {
         $m1 = DB::table('request_sample')->where('request_sample_id',$request_sample_id)->delete(); 
         $request->session()->flash('alert-success','Request Sample has been sucessfully deleted.');
         return Redirect::route('requestSample'); 
    }
    public function requestJPSampleDeleteFormat(Request $request , $request_sample_id) 
    {
         $m1 = DB::table('request_jp_sample')->where('request_sample_id',$request_sample_id)->delete(); 
         $request->session()->flash('alert-success','Request Sample has been sucessfully deleted.');
         return Redirect::route('requestJPSample'); 
    }
    
    /* Request Sample Code End*/
    
    /* Report Request Code Start */
    
    public function reportRequestPage(Request $request)
    {
        $data['reportRequestSampleData'] = DB::table('report_request_sample')->get();
        
        $page_title = " Report Request List";
        return view('masters.allReport.reportRequestSample',compact('page_title'),$data);
    }
    public function reportRequestDeleteFormat(Request $request , $report_request_sample_id)
    {
         $m1 = DB::table('report_request_sample')->where('report_request_sample_id',$report_request_sample_id)->delete(); 
         $request->session()->flash('alert-success','Report Request has been sucessfully deleted.');
         return Redirect::route('reportRequest'); 
    }
    
    /* Report Request Code End*/
}
