<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Redirect,View,File,Config,Image,Session;
use Validator;
use DB;

use App\Contact;
use App\SiteInformation;
use App\HowCanHelp;
use App\Subscribe;
use App\BecomePartner;
use Mail;

class ContactController extends Controller
{
    
    /* ------------------------------------- How Can Help Code Start ------------------------------------- */
    
    public function howCanHelpPage(Request $request)
    {
       $page_title = "How Can Help Page";

       $data['howCanHelpData'] = HowCanHelp::all();
       return view('masters.contact.howCanHelp',compact('page_title'), $data);
    }
    
    public function howCanHelpDeleteFormat(Request $request, $how_can_help_id)
    {     
      HowCanHelp::where('how_can_help_id',$how_can_help_id)->delete();
      $request->session()->flash('alert-success','How Can Help has been deleted Successfully!!');
      return Redirect::route('howCanHelp');   
    }
    
    /* ------------------------------------- How Can Help Code End ------------------------------------- */
    
    
    /* ------------------------------------- How Can Help Code Start ------------------------------------- */
    
    public function subscribePage(Request $request)
    {
       $page_title = "Subscribe Page";

       $data['subscribeData'] = Subscribe::orderBy('subscribe_id', 'DESC')->get();
       return view('masters.contact.subscribe',compact('page_title'), $data);
    }
    
    public function subscribeDeleteFormat(Request $request, $subscribe_id)
    {     
      Subscribe::where('subscribe_id',$subscribe_id)->delete();
      $request->session()->flash('alert-success','Subscribe has been deleted Successfully!!');
      return Redirect::route('subscribe');   
    }
    
    /* ------------------------------------- How Can Help Code End ------------------------------------- */
    
    
    /* ------------------------------------- Contact Information Code Start ------------------------------------- */
    
    public function contactPage(Request $request)
    {
       $page_title = "Contact Page";

       $data['contactData'] = Contact::orderBy('contact_id', 'DESC')->get();
       return view('masters.contact.contact',compact('page_title'), $data);
    }
    
    public function contactDeleteFormat(Request $request, $contact_id)
    {     
      Contact::where('contact_id',$contact_id)->delete();
      $request->session()->flash('alert-success','Contact has been deleted Successfully!!');
      return Redirect::route('contact');   
    }
    
     public function contactReplayPage(Request $request, $contact_id)
    {     
      $data['contactDatas'] = Contact::where('contact_id',$contact_id)->get();
      return view('masters.contact.contactReplay',compact('page_title'), $data); 
    }
    
    
    public function contactReplayStore(Request $request)
    {   
        $input = $request->all();
        $email = $request->email;
        $contact_id = $request->contact_id;
        $message = $request->replay_message;
        
        Contact::where('contact_id',$contact_id)->update($input);
        
        $messageBody = $message;
        $subject = "Replay of Message";
        $data['msg']=$messageBody;
        $data['subject']=$subject;
        $data['email']=$email;
        Mail::send([],[],  function ($message)  use($data) 
        {
            $message->to($data['email'])->subject($data['subject'])
                ->setBody($data['msg'], 'text/html'); 
        });
        $request->session()->flash('alert-success','Message has been successfully send!!');
        return Redirect::route('contact');
            
            
            
    } 
    
    
    /* ------------------------------------- Contact Information Code End ------------------------------------- */
    
    /* -------------------------------------------- Site Code Start -------------------------------------------- */
    
    public function siteInformationPage(Request $request)
    {
       $page_title = "Site Information Page";

       $data['siteData'] = SiteInformation::all();
       return view('masters.site.siteinformatio_list',compact('page_title'), $data);
    }
    
    public function siteInformationEditStore(Request $request)
    {
        $input = $request->all();
        SiteInformation::where('site_id', 1)->update($input);
        $request->session()->flash('alert-success','Site Information has been successfull updated.');
        return Redirect::route('siteInformation');
    }
    
    /* -------------------------------------------- Site Code End -------------------------------------------- */


    /* ------------------------------------- Become Partner Information Code Start ------------------------------------- */
    
    public function becomePartnerPage(Request $request)
    {
       $page_title = "Become Partner Page";

       $data['contactData'] = BecomePartner::orderBy('date', 'DESC')->get();
       return view('masters.contact.becomePartner',compact('page_title'), $data);
    }
    
    public function becomePartnerDeleteFormat(Request $request, $become_partner_id)
    {    
      $data=BecomePartner::where('become_partner_id',$become_partner_id)->value('image');
      $fullpath=public_path('upload/becomePartner/').$data;
      File::delete($fullpath);

      BecomePartner::where('become_partner_id',$become_partner_id)->delete();
      $request->session()->flash('alert-success','Become Partner has been deleted Successfully!!');
      return Redirect::route('becomePartner');   
    }
    
    /* ------------------------------------- Become Partner Information Code End ------------------------------------- */

    

}
