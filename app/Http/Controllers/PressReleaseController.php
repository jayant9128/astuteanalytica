<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;
use App\PressRelease;
use App\Category;
use App\Artical;
use App\ReportOceanInside;
use Mail;

class PressReleaseController extends Controller
{

	/* Press Release Code Start */

    public function pressReleasePage(Request $request)
    {
        $page_title = " New and Updates - Astuteanalytica.com";
        $meta_description = "Astute Analytica offers Press Releases, News and Media Latest Market Research News, Industry Analysis Trends News";
        $meta_keyword = "Global Market Research Reports, Growth Strategy, Business Reports, Market Size, Industry Research, Custom Reports, Consulting Services, Press Release";
        
        $data['pressReleaseData'] = PressRelease::orderBy('date', 'desc')->paginate(15);
    	return view('front.pressRelease.press-release',compact('page_title','meta_description','meta_keyword'), $data);
    }

    public function pressReleaseDatilePage(Request $request,$slug)
    {
        $page_title = "Press Release Details";
        $data['pressReleaseDatas'] = PressRelease::where('press_relase_slug', $slug)->get();
        foreach($data['pressReleaseDatas'] as $dt)
        { 
            $page_title = $dt->press_relase_heading;
            $page_title = $dt->meta_title;
            $meta_keyword = $dt->key_words;
            $meta_description = $dt->meta_desc;
        }
    	return view('front.pressRelease.press-single',compact('page_title','meta_keyword','meta_description'), $data);
    }
    function submitEnquiry(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'name' => ['required', 'max:40'],
            'email' => ['required','email', 'max:255'],
            'contact' => 'required|min:7',
            'country' => 'required',
            'job_title' => 'required',
            'company_name' => 'required',
            'press_release_title' => 'required',
            'comment' => 'required',
            

        ]);
        $input = $request->all();
        $input['date'] = date("d/m/Y : h:i:s");

        if($request->name=='zap' || $request->name == 'ZAP' || $request->job_title == 'ZAP'){
            return $request;   
           }
        
        unset($input['_token']);
		unset($input['g-recaptcha-response']);
		$en['type'] = "English";
        $en['_token'] = $request->_token;
        $en['details'] = json_encode($input);
        DB::table('press_release_enquiry')->insert($en);
       
        $message = "<table width='70%' border='2'><tr><th colspan='2'>New Press Release Inquiry</th></tr>";
        foreach($input as $key => $value)
        {
            $message .= "<tr><td>".ucfirst($key)."</td><td>$value</td></tr>";
        }
        $message .= "</table>";
        //return $message ;

        $data['msg']=$message;
        $data['subject']="New Press Release Enquiry from ";
        $data['email']="info@astuteanalytica.com";
        Mail::send([],[],  function ($message)  use($data)
        {
            $message->to($data['email'])->subject($data['subject'])
                ->setBody($data['msg'], 'text/html');
        });
        return redirect(url('thankyou'));
        return $request;
    }
    /* Press Release Code Start */

    /* Articles Code Start */

    public function articlesPage(Request $request)
    {
        $page_title = "Article";
        $data['articalData'] = Artical::orderBy('date', 'desc')->paginate(15);
        $data['categoryData'] = Category::all();
    	return view('front.artical.artical',compact('page_title'), $data);
    }

    public function articlesDatilePage(Request $request, $artical_heading)
    {
        $page_title = "Article Details";
        $data['articalDatas'] = Artical::where('artical_heading', $artical_heading)->get();
        $title = Artical::where('artical_heading', $artical_heading)->value('artical_keyword');
        $data['categoryData'] = Category::all();
    	return view('front.artical.articalDetaile',compact('page_title', 'title'), $data);
    }

    /* Articles Code Start */

    /* Report Ocean Insights Code Start */

    public function reportOceanInsightsPage(Request $request)
    {
        $page_title = "Report Ocean Insights";
        $data['reportOceanInsightsData'] = ReportOceanInside::orderBy('date', 'desc')->paginate(15);
        $data['categoryData'] = Category::all();
    	return view('front.reportOceanInsights.reportOceanInsights',compact('page_title'), $data);
    }

    public function reportOceanInsightsDatilePage(Request $request, $report_ocean_inside_id)
    {
        $page_title = "Report Ocean Insights Details";
        $data['reportOceanInsightsDatas'] = ReportOceanInside::where('report_ocean_inside_id', $report_ocean_inside_id)->get();
        $title = ReportOceanInside::where('report_ocean_inside_id', $report_ocean_inside_id)->value('report_ocean_inside_keyword');
        $data['categoryData'] = Category::all();
    	return view('front.reportOceanInsights.reportOceanInsightsDetaile',compact('page_title', 'title'), $data);
    }

    /* Report Ocean Insights Code Start */


}
