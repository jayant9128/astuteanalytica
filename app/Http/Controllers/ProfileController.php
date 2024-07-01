<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Alert;
use Auth,View,Redirect,Response,Hash,Validator,DB;
use App\User;
use App\AllReport;
use App\Category;


class ProfileController extends Controller
{
    
    /* Profile Code Start */
    
    public function profilePage(Request $request)
    {   
        $id = Auth::user()->id;
        $data['userProfileData'] = User::where('id',$id)->get();
        $page_title = "User Profile List";
        return view('front.profile.userProfile',compact('page_title'), $data); 
    }
    
    public function passwordUpdateStore(Request $request)
    {
          $id = Auth::user()->id;
          $old_pass = Auth::user()->password;
          $old_password = $request->oldpassword;

            $this->validate($request , array
             (    
                 'password' =>'min:6',
                 'password_confirmation' => 'required_with:password|same:password'
             ));  
          if((Hash::check($old_password , $old_pass)))
          {

            $input['password']=Hash::make($request['password']);
            $input['auth_key']=$request->password;
             User::where('id','=',$id)->update($input); 

              Auth::logout();
              $request->session()->flash('alert-success','Password has been sucessfully updated. Please login again with new password.'); 
              return redirect('/');
          }
          else
          {

              $request->session()->flash('alert-danger','Old Password does not match !!');
              return Redirect('profile');

          }
    }
    
    /* Profile Code End */
    
    
    /* Report Order Code Start */
    
    public function reportOrderPage(Request $request)
    {   
        
        $user_id = Auth::user()->id;
        
        $data['orderData'] = DB::table('payment')->join('all_reports', 'all_reports.report_id', '=', 'payment.report_id')->join('category', 'category.category_id', '=', 'payment.category_id')->where('payment.user_id', $user_id)->where('payment.payment_status', 'Txn Success')->orderBy('payment.payment_id','desc')->paginate(2);
        

        return view('front.profile.order',compact('page_title'),$data);
       
    }
    
    /* Report Order Code End */
}
