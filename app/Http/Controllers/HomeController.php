<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;



use Auth,Redirect,View,File,Config,Image,Session;

use Validator;

use DB;

use App\Slider;

use App\ExpressPoint;

use App\Category;

use App\PressRelease;

use App\WhyAstute;

use App\Testominal;

use App\OurClient;

use App\Subscribe;

use App\AllReport;

use App\Artical;

use App\Service;
use App\AstuteInside;

use App\ReportOceanInside;

use Mail;



class HomeController extends Controller

{

    public function index(Request $request)

    {

        $currentDate = date("Y/m/d");

        $data['slidereData'] = Slider::where('is_active', 'ACTIVE')->get();

        $data['cateData'] = Category::where('is_show', 'SHOW')->get();

        $data['expressData'] = ExpressPoint::orderBy('express_point_id', 'asc')->get();

        $data['pressReleaseData'] = PressRelease::orderBy('date', 'desc')->limit(10)->get();

        $data['whyAstute1'] = WhyAstute::orderBy('why_astute_id', 'asc')->get();

        $data['services'] = Service::get();

        $data['testominalData'] = Testominal::orderBy('testominal_id', 'asc')->get();

        $data['ourClientData'] = OurClient::orderBy('our_client_id', 'asc')->get();



        $da = DB::table('trending_report')->pluck('all_reports_id')->toArray();





        $data['allReportTreadingData'] = AllReport::orderBy('all_reports_id', 'DESC')->where('treading','YES')->limit(5)->get();



        $data['allReportLatestData'] = AllReport::orderBy('publish_date', 'DESC')->limit(5)->get();


        //return $data;
    	return view('front.index', $data);

    }



    public function subscribeStore(Request $request)

    {

        $input = $request->all();

        Subscribe::insert($input);

        $request->session()->flash('alert-success','Your request has been successfull send.');

        return Redirect::back();

    }

    public function test_pages(Request $request){
    	    $search_string = "hello";

            $data['slidereData'] = Slider::where('is_active', 'ACTIVE')->get();
$data['allReportTreadingData'] = AllReport::orderBy('all_reports_id', 'DESC')->where('treading','YES')->limit(6)->get();
        $aa = DB::select("SELECT * FROM all_reports WHERE MATCH(report_title) AGAINST('$search_string' IN NATURAL LANGUAGE MODE)");

        $data['reportData'] = AllReport::join('category', 'category.category_id', '=', 'all_reports.category_id')->where('all_reports.report_title','LIKE','%'.$search_string.'%')->get();



        if($data['reportData']->isEmpty())

        {

            $page_title = "404 Page Not Found";

            $page_head = "Searched Report";

    	     return view('front.notice.errorPage',compact('page_title', 'page_head','search_string'), $data);

        }

        else

        {

            $page_title = "Searched Report";

            $page_head = "Searched Report";



            return view('front.notice.errorPage',compact('page_title', 'page_head'), $data);

        }
    }





    /* CMS Code Start */



    public function cmspages(Request $request)

    {

      $slug =  $request->path();


        $data['cms_data'] = DB::table('cms')->where('slug',$slug)->get();



            $meta_description = DB::table('cms')->where('slug',$slug)->value('meta_description');

            $meta_keyword = DB::table('cms')->where('slug',$slug)->value('meta_keywords');

            $page_title = DB::table('cms')->where('slug',$slug)->value('meta_title');





        return view('front.cms.cms',compact('page_title', 'meta_description', 'meta_keyword'),$data);

    }



    /* CMS Code End */





    /* Seaarch Record Code Start */



    public function show_search_data(Request $request)

    {

        $search_string = $request->searchData;

        $aa = DB::select("SELECT * FROM all_reports WHERE MATCH(report_title) AGAINST('$search_string' IN NATURAL LANGUAGE MODE)");

        $data['reportData'] = AllReport::join('category', 'category.category_id', '=', 'all_reports.category_id')->where('all_reports.report_title','LIKE','%'.$search_string.'%')->get();



        if($data['reportData']->isEmpty())

        {

            $page_title = "No Result Found";

            $page_head = "Searched Report";

    	     return view('front.report.search',compact('page_title', 'page_head','search_string'), $data);

        }

        else

        {

            $page_title = "Searched Report";

            $page_head = "Searched Report";



            return view('front.report.search',compact('page_title', 'page_head'), $data);

        }





    }



    public function searchNotFoundResult(Request $request)

    {



        $date= date("d/M/Y");

        $name=$request->name;

        $email=$request->email;

        $phone=$request->phone;

        $job_title=$request->job_title;

        $message=$request->message;

        $company=$request->company;

        $country=$request->country;

        $date=$date;

        $input['name'] = $name;

        $input['email'] = $email;

        $input['phone'] = $phone;

        $input['job_title'] = $job_title;

        $input['message'] = $message;

        $input['company'] = $company;

        $input['country'] = $country;

        $input['date'] = $date;

        $input['_token'] = $request->_token;



        die;

    /*    DB::table('request_sample')->insert($input);*/



         $messageBody = "<!DOCTYPE html>

                        <html>

                            <head>

                                <title> </title>



                            </head>

                            <body>

                                <h1>Search Record Enquiry</h1>



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

                                        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Phone</th>

                                        <td style='padding:10px;border:1px solid black;'>{$phone}</td>

                                    </tr>

                                    <tr>

                                        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Job Title</th>

                                        <td style='padding:10px;border:1px solid black;'>{$job_title}</td>

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

                    $subject = "Search Enquiry";

                    $data['msg']=$messageBody;

                    $data['subject']=$subject;

                    $data['email']="info@astuteanalytica.com";

                    Mail::send([],[],  function ($message)  use($data)

                    {

                        $message->to($data['email'])->subject($data['subject'])

                            ->setBody($data['msg'], 'text/html');



                    });





                    return Redirect('thankyou');







    }



    /* Search Record Code End */





    /* Thank You Code Start */



    public function thankyouPage(Request $request)

    {

        $page_title = "Thank You";



        $message = "Thank you for your request, it has been received successfully. Our executive will contact you soon. If you are looking for a specific report feel free to contact our representative @ +1 888 212 3539 (US) / +91 999 711 2116 (REST OF WORLD)";



    	return view('front.notice.thankYou',compact('page_title', 'message'));

    }



    /* Thank You Code Start */







    /* ------------------------------------ Request Sample Code Start ------------------------------------ */



    public function requestSample(Request $request)

    {

        $page_title = "Request Sample";

        $pageHead = "Request Sample";

        $data['categoryData'] = Category::all();

    	return view('front.requestSample.requestSample',compact('page_title', 'pageHead'), $data);

    }





    public function requestSampleStore(Request $request)

    {

        $one_number=$request->one_number;

        $total_number=$request->total_number;



        $countNumber = $one_number;



        if($countNumber == $total_number)

        {



            $date= date("d/m/Y");





            $name=$request->name;

            $email=$request->email;

            $phone=$request->phone;

            $job_title=$request->job_title;

            $message=$request->message;

            $company=$request->company;

            $country=$request->country;

            $date=$date;

die;

            $input['name'] = $name;

            $input['email'] = $email;

            $input['phone'] = $phone;

            $input['job_title'] = $job_title;

            $input['message'] = $message;

            $input['company'] = $company;

            $input['country'] = $country;

            $input['date'] = $date;

            $input['_token'] = $request->_token;





            DB::table('report_request_sample')->insert($input);



            $messageBody = "<!DOCTYPE html>

                            <html>

                            	<head>

                            		<title> </title>



                            	</head>

                            	<body>

                            		<h1> New Enquiry Generate</h1>



                            		<table border='0px' width='100%'>

                            		    <tr>

                            		        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Name</th>

                            		        <td style='padding:10px;border:1px solid black;'>{$name}</td>

                            		    </tr>

                            		    <tr>

                            		        <th style='padding:10px;border:1px solid black;width:30%;text-align:left;'>Email</th>

                            		        <td style='padding:10px;border:1px solid black;'>{$email}</td>

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



                        $subject = "New Report Request";

                        $data['msg']=$messageBody;

                        $data['subject']=$subject;

                        $data['email']="reportocean@gmail.com";

                        Mail::send([],[],  function ($message)  use($data)

                        {

                            $message->to($data['email'])->subject($data['subject'])

                                ->setBody($data['msg'], 'text/html');

                        });

            return Redirect('sample-request-thank-you');



            /*$homeMessage = "Become Partner";

         return redirect('thankyou/'.$homeMessage); */

        }

        else

        {

            $request->session()->flash('alert-danger','captcha invalid.');

            return Redirect::back();

        }





    }

    function notification_token_store(Request $request)
    {
        if(DB::table('noti_token')->where('token', $request->token)->first() != null){

        }
        else
        {
            $in['token'] = $request->token;
            DB::table('noti_token')->insert($in);
        }


    }


    function noti()
    {
        $token = "cfaY_-mZTOQ:APA91bGtvH-uO-0bP0kA6Kq8Blel1WRlrTtIs9UwVtoKJKkpN4sfmwTkoAEYhnAxVkK97JpdPyTjOUjU5wlcuIlCF7UUp3vJr5qhn2QXySyv0c0lN45ow0Bv7wxb2zdoZKVaM9jV2mdk";
        $from = "AAAACcxF6nU:APA91bGKX-yN4zh-IGB_L0NzKjTStruY6yErsy8_oW1kb_ErAN9-EP-mRUt_NiiOgw9NysxCeLWFKjlUzpnvb-nuZgsyJ4gqk6AeZLDdbxB5_0cj5x7_vox4dwdr1YmThooxqk7_hqi9";
        $msg = array
              (
                'body'  => "This is proftcode",
                'title' => "Hi, From Raj",
                'receiver' =>"User",
                'click_action'=>"https://www.astuteanalytica.com/",
                'icon'  => "https://www.astuteanalytica.com/public/front/images/logo/logo-2.png",/*Default Icon*/
                'sound' => 'mySound'/*Default sound*/
              );

        $fields = array
                (
                    'to'        => $token,
                    'notification'  => $msg
                );

        $headers = array
                (
                    'Authorization: key=' . $from,
                    'Content-Type: application/json'
                );
        //#Send Reponse To FireBase Server
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        dd($result);
        curl_close( $ch );
    }

    function SearchText(Request $request, $str)
    {
        $str = (string)$str;
        $report = AllReport::where('report_title','LIKE','%'.$str.'%')->limit(10)->pluck("report_title","report_slug");
        $press_release = PressRelease::where('press_relase_heading','LIKE','%'.$str.'%')->limit(10)->pluck("press_relase_heading","press_relase_slug");
        $data['report'] = $report;
        $data['prs_count'] = $press_release->count();
        $data['press'] = $press_release;
        return $data;
    }
    /* ------------------------------------ Request Sample Code End ------------------------------------ */

    function xmlSitemapNow(Request $request)
    {
        Config::set('app.debug', true);
        Config::set('APP_TIMEZONE', 'UTC');
        $data['category'] = category::select('slug')->get();
        $data['report'] = AllReport::select('report_slug')->get();
        $data['press'] = PressRelease::select('press_relase_slug')->get();
        $data['inside'] = AstuteInside::select('astute_inside_slug')->get();



       // return view('sitemap');
        return response()->view('sitemap',$data)->header('Content-Type', 'text/xml');
        return date('Y-m-d : h:i:s');   

        return "Hello Mahi, How are you , let me test";
    }
    function childXmlSitemapNow(Request $request,$slug,$slug1)
    {
        Config::set('app.debug', true);
        Config::set('APP_TIMEZONE', 'UTC');
        $data['category'] = category::select('slug')->get();
        $data['report'] = AllReport::select('report_slug')->get();
        $data['press'] = PressRelease::select('press_relase_slug')->get();
        $data['inside'] = AstuteInside::select('astute_inside_slug')->get();



       // return view('sitemap');
        return response()->view('sitemap',$data)->header('Content-Type', 'text/xml');
        return date('Y-m-d : h:i:s');   

        return "Hello Mahi, How are you , let me test";
    }



}
