<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use App\TOC;
use App\AllReport;
use App\AllReportJa;
use App\Category;
use App\Publisher;
use App\ReportOceanInside;
use App\OurClient;
use App\Testominal;
use App\Region;
use App\FAQ;
use App\FAQJapanese;
use Response;
use Mail;
use Softon\Indipay\Facades\Indipay;

class ReportController extends Controller
{
    
        public function industriesPage(Request $request)
        {
            $page_title = "industries";
            $meta_keyword = "industries";
            $meta_description = "industries";
            $data['cate_data'] = Category::where('parent_id',0)->get();
            $data['ourClientData'] = OurClient::orderBy('our_client_id', 'asc')->get();
            return view('front.report.industry',compact('page_title', 'meta_keyword','meta_description'), $data); 

        }
        public function categoryPage(Request $request, $category_slug)
        { 
           $data['categ'] = Category::where('slug',$category_slug)->get();
            
            foreach($data['categ'] as $data1)
            {
                $cate_id = $data1->category_id;
                $page_title = $data1->meta_title;
                $meta_keyword = $data1->meta_keyword;
                $meta_description = $data1->description;
            }
            
            //return $cate_id;
            $child_data = Category::where('parent_id',$cate_id)->pluck('category_id')->toArray();
            if(empty($child_data))
            {
               
                $child_data[] = $cate_id;
                $data['reportData'] = AllReport::whereIn('category_id',$child_data)->orderby('all_reports_id','desc')->paginate(10);

                return view('front.report.category',compact('page_title', 'meta_keyword','meta_description'), $data);
            }
            else
            {
                
                $data['cur_data'] = Category::where('category_id',$cate_id)->get();
                $child_data[] = $cate_id;
                $data['reportData'] = AllReport::whereIn('category_id',$child_data)->orderby('all_reports_id','desc')->paginate(10);
                $data['cate_data'] = Category::where('parent_id',$cate_id)->get();
                $data['ourClientData'] = OurClient::orderBy('our_client_id', 'asc')->get();
                return view('front.report.subCategory',compact('page_title', 'meta_keyword','meta_description'), $data); 
            }
            
            
           
        }
    
        public function is_trending(Request $request)
        {
             
                $page_title = "Trending Report";
                $meta_keyword = "Trending Report";;
                $meta_description = "Trending Report";;
          
            $data['reportData'] = AllReport::where('treading',"YES")->orderby('publish_date','desc')->paginate(10);
            
            return view('front.report.trending',compact('page_title', 'meta_keyword','meta_description'), $data);
           
        }
        public function is_latest(Request $request)
        {
             
                $page_title = "Latest Report";
                $meta_keyword = "Latest Report";;
                $meta_description = "Latest Report";;
          
                $data['reportData'] = AllReport::orderby('publish_date','desc')->paginate(10);
            
            return view('front.report.trending',compact('page_title', 'meta_keyword','meta_description'), $data);
           
        }
    
        /* Category Filter Code Start */
        
        
        public function reportDescription(Request $request,$slug)
        {
            $data['report_data'] = AllReport :: where('report_slug',$slug)->get();
            $currentDate = date("Y-m-d");
            $discount_data = DB::table('report_discount')->where('is_active','ACTIVE')->where('start_date', '<=', $currentDate)
        ->where('end_date', '>=', $currentDate)->get();
        //dd(DB::getQueryLog());
        //echo "<pre>";
        //print_r($discount_data);
        //echo $discount_data[0]->single_user;
       // die;
            foreach($data['report_data'] as $data1)
            {
                $cate_id = $data1->category_id;
                $cate_title = Category::where('category_id',$data1->category_id)->value('title');
                $cate_slug = Category::where('category_id',$data1->category_id)->value('slug');
                $page_title = $data1->meta_title;
                $meta_keyword = $data1->key_words;
                $meta_description = $data1->meta_desc;
                $report_id = $data1->all_reports_id;
                
                
                $action_slug1 = request()->segment(count(request()->segments())-1);
                if($action_slug1 == "infographic")
                {
                    if($data1->info_title != "")
                    {
                        $page_title = $data1->info_title;
                        $meta_description = $data1->info_desc;
                       
                    }
                    
                    $meta_keyword = "NO";
                    
                }
                
                
            }
            $data['relReportData'] = AllReport::where('category_id', $cate_id)->where('all_reports.all_reports_id','!=' ,$report_id)->orderBy('publish_date', 'DESC')->limit(5)->get();
            $data['toc_data'] = TOC::where('report_id',$report_id)->get();
            $data['faq_data'] = FAQ::where('report_id',$report_id)->get();
            $data['discount_data'] = $discount_data;
            
            $data['ourClientData'] = OurClient::where('category_id',$cate_id)->orderBy('our_client_id', 'asc')->limit(10)->get();
           
            return view('front.report.report',compact('page_title', 'meta_keyword','meta_description','cate_title','cate_slug'), $data);
        }
        
        /* Category Filter Code End*/

    
    public function reportDescriptionJa(Request $request,$slug)
        {
            $data['report_data'] = AllReportJa :: where('report_slug',$slug)->get();
            $currentDate = date("Y-m-d");
            foreach($data['report_data'] as $data1)
            {
                $cate_id = $data1->category_id;
                $cate_title = Category::where('category_id',$data1->category_id)->value('title');
                $cate_slug = Category::where('category_id',$data1->category_id)->value('slug');
                $page_title = $data1->meta_title;
                $meta_keyword = $data1->key_words;
                $meta_description = $data1->meta_desc;
                $report_id = $data1->all_reports_id;
                
                
                $action_slug1 = request()->segment(count(request()->segments())-1);
                if($action_slug1 == "infographic")
                {
                    if($data1->info_title != "")
                    {
                        $page_title = $data1->info_title;
                        $meta_description = $data1->info_desc;
                       
                    }
                    
                    $meta_keyword = "NO";
                    
                }
                
                
            }
            $data['relReportData'] = AllReportJa::where('category_id', $cate_id)->where('japanese_reports.all_reports_id','!=' ,$report_id)->orderBy('publish_date', 'DESC')->limit(5)->get();
            $data['toc_data'] = TOC::where('report_id',$report_id)->get();
            $data['faq_data'] = FAQJapanese::where('report_id',$report_id)->get();
            
            $data['ourClientData'] = OurClient::where('category_id',$cate_id)->orderBy('our_client_id', 'asc')->limit(10)->get();
           
            return view('front.report.report',compact('page_title', 'meta_keyword','meta_description','cate_title','cate_slug'), $data);
        }
    
    
    public function reportAction(Request $request, $slug)
    {
        
        $action = request()->segment(count(request()->segments())-1);
        if($action == "request-sample")
        {
            $act_bar = "Request Sample";
        }
        elseif($action == "ask-for-discount")
        {
            $act_bar = "Ask For Discount";
        }
        elseif($action == "inquire-before-purchase")
        {
            $act_bar = "inquire-before-purchase";
        }
        
        elseif($action == "ask-for-customization")
        {
            $act_bar = "Ask For Customization";
        }
        
        elseif($action == "request-toc")
        {
            $act_bar = "Request for Table of content";
        }
        elseif($action == "speak-analyst")
        {
            $act_bar = "Speak to Analyst";
        }
        elseif($action == "request-methodology")
        {
            $act_bar = "Request for Methodology";
        }
        $currentDate = date("Y-m-d");
        $data['report_data'] = AllReport :: where('report_slug',$slug)->get();
        foreach($data['report_data'] as $data1)
        {
            $cate_id = $data1->category_id;
            $cate_title = Category::where('category_id',$data1->category_id)->value('title');
            $page_title = $data1->meta_title;
            $meta_keyword = $data1->key_words;
            $meta_description = $data1->meta_desc;
             $report_id = $data1->all_reports_id;

        }
        $discount_data = DB::table('report_discount')->where('is_active','ACTIVE')->where('start_date', '<=', $currentDate)
        ->where('end_date', '>=', $currentDate)->get();
        $data['discount_data'] = $discount_data;
        $data['relReportData'] = AllReport::where('category_id', $cate_id)->where('all_reports.report_id','!=' ,$report_id)->where('publish_date', '<=', $currentDate)->orderBy('publish_date', 'DESC')->limit(5)->get();
        $data['ourClientData'] = OurClient::where('category_id',$cate_id)->orderBy('our_client_id', 'asc')->limit(10)->get();
        $data['allClientData'] = OurClient::orderBy('our_client_id', 'asc')->get();
        return view('front.report.reportAction',compact('page_title', 'meta_keyword','meta_description','cate_title','action','act_bar'), $data);
    }
    
    
    
    public function requestQueryStore(Request $request)
    {
       
        // return $request;

        $this->validate($request, [
            'name' => ['required', 'max:40'],
            'email' => ['required','email', 'max:255'],
            'phone' => 'required|min:7',
            'country' => 'required',
            'job_title' => 'required',
            'report_id' => 'required',
            'all_reports_id' => 'required',
            'request_action' => 'required',
        ]);
        $date= date("d/M/Y");

        $all_reports_id=$request->all_reports_id;
        $report_title = AllReport::where('all_reports_id', $all_reports_id)->value('report_title');
        $report_slug = AllReport::where('all_reports_id', $all_reports_id)->value('report_slug');

        $name=$request->name;
        if($name=='zap' || $name == 'ZAP' || $request->job_title =='ZAP'){
            return $request;   
           }
        $email=$request->email;
        $request_sample_type=$request->request_sample_type;
        $subject=$request->request_sample_type;
        $report_title=$report_title;
        $phone=$request->phone;
        $job_title=$request->job_title;
        $message=$request->message;
        $company=$request->company;
        $country=$request->country;
        $report_code = $request->report_code;
        $date=$date;
        $url = "https://astuteanalytica.com/industry-report/" .$report_slug; 
        $input['name'] = $name;
        $input['email'] = $email;
        $input['request_sample_type'] = $request_sample_type;
        $input['all_reports_id'] = $request->all_reports_id;
        $input['phone'] = $phone;
        $input['job_title'] = $job_title;
        $input['message'] = $message;
        $input['company'] = $company;
        $input['country'] = $country;
        $input['date'] = $date;
        $input['_token'] = $request->_token;


        DB::table('request_sample')->insert($input);

         $messageBody = "<!DOCTYPE html>
                        <html>
                            <head>
                                <title> </title>

                            </head>
                            <body>
                                <h1>{$request_sample_type}</h1>

                                <table border='0px'>
                                    <tr>
                                        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Name</th>
                                        <td style='padding:10px;border:1px solid black;'>{$name}</td>
                                    </tr>
                                    <tr>
                                        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Email</th>
                                        <td style='padding:10px;border:1px solid black;'>{$email}</td>
                                    </tr>
                                    <tr>
                                        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Report Title</th>
                                        <td style='padding:10px;border:1px solid black;'>{$report_title}</td>    
                                    </tr>
                                    <tr>
                                        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Phone</th>
                                        <td style='padding:10px;border:1px solid black;'>{$phone}</td>    
                                    </tr>
                                    <tr>
                                        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Job Title</th>
                                        <td style='padding:10px;border:1px solid black;'>{$job_title}</td>    
                                    </tr>

                                
                                    <tr>
                                    <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Link</th>
                                    <td style='padding:10px;border:1px solid black;'><a href='{$url}'>{$url}</a></td>

                                    </tr>



                                    <tr>
                                        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Company</th>
                                        <td style='padding:10px;border:1px solid black;'>{$company}</td>
                                    </tr>

                                    <tr>
                                        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Country</th>
                                        <td style='padding:10px;border:1px solid black;'>{$country}</td>
                                    </tr>

                                    <tr>
                                        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Date</th>
                                        <td style='padding:10px;border:1px solid black;'>{$date}</td>
                                    </tr>

                                    <tr>
                                    <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Message</th>
                                    <td style='padding:10px;border:1px solid black;'>{$message}</td>

                                    </tr>

                                </table>
                            </body>
                        </html>
                        ";
                    /*return $messageBody;*/
                    $subject = $request_sample_type;
                    $data['msg']=$messageBody;
                    $data['subject']=$subject;
                    $data['email']="info@astuteanalytica.com";
                     Mail::send([],[],  function ($message)  use($data) 
                     {
                        $message->to($data['email'])->subject($data['subject'])
                            ->setBody($data['msg'], 'text/html'); 

                     });

                     $customermessageBody = '<!doctype html>
                     <html>
                     
                     <head>
                         <meta name="viewport" content="width=device-width, initial-scale=1.0">
                         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                         <title>Smaple Request</title>
                     
                     </head>
                     
                     <body style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                         <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">This is preheader text. Some clients will show this text as a preview.</span>
                     
                     
                         <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;" width="100%" bgcolor="#f6f6f6">
                             <tr>
                                 <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
                                 <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;" width="580" valign="top">
                                     <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">
                                         <table role="presentation" class="main" style=" margin-bottom:15px;background:#ffffff;border-radius: 3px; width:100%;" width="100%">
                                             <tr>
                                                 <td style="text-align:center;font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                                                     <center><img src="https://www.astuteanalytica.com/public/front/images/logo/logo-2.png" width="100px"></center>
                                                 </td>
                                             </tr>
                                         </table>
                     
                                         <table role="presentation" class="main" style="background: #02185a; border-radius: 3px; width: 100%;" width="100%">
                                             <tr>
                                                 <td style="color:#fff; font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 10px 20px;">
                                                     <h3>Hello '.$name.',</h3>
                                                 </td>
                                             </tr>
                                         </table>
                     
                                      
                                         <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;" width="100%">
                     
                                           
                                             <tr>
                                                 <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
                                                     <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;" width="100%">
                                                         <tr>
                                                             <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">
                                                            
                                                                 <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">We appreciate you contacting us about our research report on '.$report_title.'. </p>
                                                                 
                                                                 <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;"> We will be sending you the sample copy of the report shortly. Meanwhile, if you have any specific research requirement then please let us know.
                                                                 </p>
                                                                 <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                                                 If your inquiry is urgent, please use the telephone number listed below to talk to one of our staff members.
                                                                 </p>
                                                                 
                                                                 <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                                                                 Thank You Again! </p>
                     
                                                                 
                                                             </td>
                                                         </tr>
                                                     </table>
                                                 </td>
                                             </tr>
                     
                                             
                                         </table>
                     
                                         <table role="presentation" class="main" style=" border: 0px; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-radius: 3px; width: 100%;" width="100%">
                                             <tr style="border:0px">
                                                 <td style="color:#fff;background: #02185a; width: 100px; border: 0px;   font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 10px 20px;">
                                                     <a href="https://www.facebook.com/profile.php?id=100063974055852"><img src="https://www.astuteanalytica.com/public/front/images/facebook.png" width="30px"></a>
                                                     <a href="https://www.linkedin.com/company/astute-analytica/"> <img src="https://www.astuteanalytica.com/public/front/images/linkedin.png" width="30px"></a>
                                                 </td>
                     
                     
                                                 <td style=" padding-left: 15px; border: 0px; color:#fff;background-color: #c30c17;">
                                                     <h4>The Corporate Sales Team </h4>
                                                     <p>Astute Analytica</p>
                                                     <p> Email : <a style="color: #fff;" href="mailto:sales@astuteanalytica.com">sales@astuteanalytica.com</a></p>
                                                     <p> Phone : <a style="color: #fff;" href="tel: +1 888 429 6757"> +1 888 429 6757</a></p>
                                                 </td>
                     
                     
                     
                                             </tr>
                                             </table>
                                             <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;" width="100%">
                     
                                                 <!-- START MAIN CONTENT AREA -->
                                                 <tr>
                                                     <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;" valign="top">
                                                         
                                                             
                                                                  
                                                                     <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">At Astute Analytica we strive to provide our customers with updated information on innovative technologies, high growth markets, emerging business environments and latest business-centric applications, thereby helping them always make informed decisions and leverage new opportunities.</p>
                                                                     <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;"> We sent you this email because of your interest in Astute Analytica.</p>
                     
                                                                    
                                                                 
                                                        
                                                     </td>
                                                 </tr>
                     
                                                 <!-- END MAIN CONTENT AREA -->
                                             </table>
                             </tr>
                             </table>
                             <!-- END CENTERED WHITE CONTAINER -->
                     
                     
                     
                             </div>
                             </td>
                             <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;" valign="top">&nbsp;</td>
                             </tr>
                         </table>
                     </body>
                     
                     </html>'
                        ;
                    /*return $messageBody;*/
                    $subject = 'Thank You for Requesting the Sample on '.$report_title;
                    $data['msg']=$customermessageBody;
                    $data['subject']=$subject;
                    $data['email']=$email;
                     Mail::send([],[],  function ($message)  use($data) 
                     {
                        $message->from('sales@astuteanalytica.com', 'Astute Analytica');
                        $message->to($data['email'])->subject($data['subject'])
                            ->setBody($data['msg'], 'text/html'); 

                     });

                    $post = [
                        'source_id' => 2,
                        'name' => $name,
                        'email'   => $email,
                        'title' => $report_title,
                        'phone' => $phone,
                        'job_title'   => $job_title,
                        'link' => $url,
                        'company' => $company,
                        'country'   => $country,
                        'sample_date' => $date,
                        'message' => $message,
                        'reason'   => "",
                    ];

                    $ch = curl_init('https://crm.reportocean.com/secure_access_only_crm/create-lead-api');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

                    // execute!
                    $response = curl_exec($ch); 

                    $request_action = $request->request_action;
                    // print_r($request_action);
                    // die;
                    if($request_action == "request-sample")
                    {
                        return Redirect('sample-request-thank-you');
                    }
                    elseif($request_action == "ask-for-discount")
                    {
                        return Redirect('discount-request-thank-you');
                    }
                    else
                    {
                        return Redirect('thankyou');
                    }   
            
    }
    public function thankyouPage(Request $requet)
    {
        $request_action = request()->segment(count(request()->segments()));
        if($request_action == "request-sample")
        {
            $act_bar = "Request Smple";
        }
        elseif($request_action == "ask-for-discount")
        {
            $act_bar = "Ask For Discount";
        }
        else
        {
            $act_bar = "Report Question";
        }  
        $data['testominalData'] = Testominal::orderBy('testominal_id', 'asc')->get();
        $data['ourClientData'] = OurClient::orderBy('our_client_id', 'asc')->get();
        $page_title = "Thankyou";
        return view('front.report.thankyou',compact('page_title','act_bar'),$data);
        
    }



   
    

}
