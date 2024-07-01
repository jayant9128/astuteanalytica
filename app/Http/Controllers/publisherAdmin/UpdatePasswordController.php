<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use Auth,Redirect,View,File,Config,Image,Hash;
use DB;

use App\User;
use Mail;

class UpdatePasswordController extends Controller
{
     public function changePasswordPage(Request $request)
   {
        $users['users_datas'] = DB::table('users')->orderBy('id', 'desc')->get();
        $page_title = "User Panel List";
       return view('masters.user.change_password_list',compact('page_title'),$users);
   }

   public function passwordUpdateForamt(Request $request,$id)
  {
      $users['user_data'] =  DB::table('users')->where('id','=',$id)->get();
      $page_title = "Edit User";
      return view('masters.user.edit_change_password',compact('page_title'),$users);
  }


  public function changePasswordUpdateStore(Request $request)
    {

      $id = $request->id;
      $old_pass = Auth::user()->password;
      $old_password = $request->oldpassword;
      if((Hash::check($old_password , $old_pass)))
      {
          
        $input['password']=Hash::make($request['password']);
         $input['email']=$request->email; 
         DB::table('users')->where('id',$id)->update($input); 
          
          Auth::logout();
          $request->session()->flash('alert-danger','Password Updated Successfully!!'); 
          return Redirect::route('/');
          return redirect('/');
      }
      else
      {
         
          $request->session()->flash('alert-danger','Old Password does not match !!');
          return Redirect::route('changePassword');
          
      }
    }
    
    
    
    public function userStatusUpdateStore(Request $request)
    {
        $id = $request->id;
        
        $input['is_active'] = $request->is_active;
        User::where('id',$id)->update($input);
        $request->session()->flash('alert-success','User Status has been sucessfully updated.');
        return Redirect::route('changePassword');
    }
    
    
    /* ----------------------------------- Forgate Password Email Code Start ----------------------------------- */
    
    public function forgotpasswordStore(Request $request)
    {
        $email = $request->email;
        $check_mail = User::where('email',$email)->value('email');
        $token = User::where('email',$email)->value('remember_token');
        
        if($check_mail==$email)
        {
            $url = WEBSITE_URL."masterAdmin/resetPassword?token=".$token;
            $link = "<a href=$url> Click Here </a>";
            $messageBody = $link;
            $subject = "Reset your Report Ocean account password";
            $data['msg']=$messageBody;
            $data['subject']=$subject;
            $data['email']=$email;
            Mail::send([],[],  function ($message)  use($data) 
            {
                $message->to($data['email'])->subject($data['subject'])
                    ->setBody($data['msg'], 'text/html'); 
            });
            $pagehead = "Forgot Password";
            $user_data['msg'] = "We have just sent a password reset link on your registered email id.<br> Never share your password with anyone for the security of your account.<br><br>For security reasons, password reset link will be valid for only one use and expires in 30 minutes. If you do not receive your email within five minutes check your spam folder. ";
            $request->session()->flash('alert-danger','Send reset password link your email id.'); 
            return view('masters.login.login',compact('user_data','pagehead'));
            
        }
        else
        {
            $request->session()->flash('alert-danger','This email id is not registered with Finance.'); 
            return Redirect::route('/');
        }    
        
    }
    
    public function changePassword(Request $request)
    {
        $old_token = $request->token;
        $email = $request->email;
        return view('masters.notice.changePassword',compact('old_token')); 
    }
    
    public function updatePasswordStore(Request $request)
    {
        $old_token = $request->old_token;
        
        $email_check = User::where('remember_token',$old_token)->value('email');
        $check_mail = User::where('remember_token',$old_token)->value('email');
        $email = User::where('remember_token',$old_token)->value('email');
        if($check_mail != '')
        {
            if($email_check == "")
            {
                $request->session()->flash('alert-success','You Email is not Verified ! Please Check Mail');
                 return view('masters.login.login');
            }    
            else
            {
                $this->validate($request, [
                    'password' => 'min:6',
                    'password_confirmation' => 'required_with:password|same:password'
                ]);

                $input['password'] = Hash::make($request->password);
                $m=User::where('remember_token',$old_token)->update($input);
                
                   
                
                    $fullName = User::where('email',$email)->value('name');
                    $url = WEBSITE_URL."masterAdmin";
                    $messageBody = "<!DOCTYPE html>
                            <html lang='en'>

                            <head>
                                <title>Report Ocean</title>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>

                            </head>

                            <body>

                                <section style='width: 60%; min-height: 300px;padding: 15px;margin: 25px auto; background: rgba(255,255,255,.6);  display: block;border-radius: 2px;'>

                                    <div style='text-align:center;'>
                                        <h1 style='padding-left: 30px; text-align: center; color:#969696; font-size:30px!important;'>PASSWORD RESET SUCCESSFULLY</h1>
                                       
                                        <div style=' text-align: center;font-size: 16px; color:#969696; margin-bottom:5px; padding:0px 10px;'>Your password for Report Ocean account has been successfully changed. Kindly use your new password to continue shopping with us.
.
                                        </div>
                                        <a class='link-btn' href='{$url}' style='padding: 10px 20px;font-size: 18px;line-height: 24px;background: #000000;margin: 30px auto;display: block; width: 150px;text-align: center;color: #fff;text-transform: uppercase;text-decoration: none;'>LOGIN</a>
                                            <div style='font-size: 16px;margin-top:30px; margin-bottom: 5px; color:#969696; text-align: center;'>If you did not request for a password reset, you can ignore this email. Only a person with the access to your email can reset your account password.</div>
                                             <div style='font-size: 16px; margin-top:40px; color:#969696; text-align: left; margin-left:15px;'>
                                                    Thank You,
                                                 </div>
                                                  <div style='font-size: 16px; color:#969696; text-align: left; margin-left:15px;'>
                                                   Report Ocean
                                                 </div>

                                    </div>


                                </section>
                            </body>

                            </html>
                            ";
                
                
                
                    $subject = "Password reset successfully for your Report Ocean ";
                    $data['msg']=$messageBody;
                    $data['subject']=$subject;
                    $data['email']=$email;
                    Mail::send([],[],  function ($message)  use($data) 
                    {
                        $message->to($data['email'])->subject($data['subject'])
                            ->setBody($data['msg'], 'text/html'); 
                    });

                    $request->session()->flash('alert-success','Your password has been successfully updated!'); 
                    return Redirect::route('/');
                  
            }
        }
        else
        {
            $request->session()->flash('alert-success','You Email is not Sure.'); 
            return view('masters.login.login');
        }   
        
        
        
    }
    
    /* ----------------------------------- Forgate Password Email Code End ----------------------------------- */
    
}
