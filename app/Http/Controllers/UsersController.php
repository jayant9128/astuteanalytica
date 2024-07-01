<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Alert;
use Auth,View,Redirect,Response,Hash,Validator,DB;
use App\User;
use App\SiteInformation;
use Mail;

class UsersController extends Controller
{
    
    public function signUpSave(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'email' => ['required','email', 'max:255', 'unique:users'],
            'password' => 'required|min:6',
            'contact' => 'required',
            'password_confirmation' => 'required_with:password|same:password'
        ]);
        
            $input['name'] = $request->name;
            $input['email'] = $request->email;
            $input['password'] = Hash::make($request->password);
            $input['auth_key'] = $request->password;
            $input['contact'] = $request->_contact;
            $input['remember_token'] = $request->_token;
            $input['user_role'] = 'FRONT';
        
        User::insert($input);
        
        $userdata = array(
                'email' 		=> 	$request->get('email'),
                'password' 		=> 	$request->get('password'),
                'user_role' 	=> 	'FRONT',
                
            );
        if(Auth::attempt($userdata))
        {
            if(Auth::user()->is_active == 'ACTIVE')
            {
                $request->session()->flash('alert-success','Your login successfully.');
                return Redirect::back();
            }
        }
        
        $request->session()->flash('alert-success','Hurray! Your Report Ocean account has been successfully created. Please sign in to continue.');
        return Redirect::back();
    }
                  
            
        
        
    public function login(Request $request)
    {
     if($request->isMethod('post'))
     {
        $userdata = array(
                'email' 		=> 	$request->get('email'),
                'password' 		=> 	$request->get('password'),
                'user_role' 	=> 	'FRONT',
                
            );
        if(Auth::attempt($userdata))
        {
            if(Auth::user()->is_active == 'ACTIVE')
            {
                $request->session()->flash('alert-success','Your login successfully.');
                return Redirect::back();
            }
            else
            {
                Auth::logout();
                $request->session()->flash('alert-danger','Your account has been blocked deactivated by admin.');
                return Redirect::back();
            }
        }
        {
            Auth::logout();
            $request->session()->flash('alert-danger','It seems you have entered an invalid id or password. Please try with a valid id and password.');
            return Redirect::back();
            
        }
    }
        
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flash('alert-danger','Your are logout.');
        return redirect('/');
    }
    
    
    /* -------------------------- Password Forget Code Start -------------------------- */
    
    public function forgotpasswordPage(Request $request)
    {
        $email = $request->email;
        $check_mail = User::where('email',$email)->value('email');
        $token = User::where('email',$email)->value('remember_token');
        if($check_mail==$email)
        {
            $url = WEBSITE_URL."resetPassword?token=".$token;
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
            $request->session()->flash('alert-success','We have just sent a password reset link on your registered email id. Never share your password with anyone for the security of your account. For security reasons, password reset link will be valid for only one use and expires in 30 minutes. If you do not receive your email within five minutes check your spam folder. '); 
            return Redirect::back();
        }
        else
        {
            $request->session()->flash('alert-danger','This email id is not registered with Finance.'); 
            return Redirect::back();
        }    
    }
    
    public function resetPasswordPage(Request $request)
    {
        $old_token = $request->token;
        $page_title = SiteInformation::where('site_id', 1)->value('meta_title');
        $meta_keyword = SiteInformation::where('site_id', 1)->value('meta_keyword');
        $meta_description = SiteInformation::where('site_id', 1)->value('meta_description');
        $email = $request->email;
        return view('front.notice.changePassword',compact('old_token', 'page_title', 'meta_keyword', 'meta_description')); 
    }
    
    public function updatePassStore(Request $request)
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
                return redirect('/'); 
            }    
            else
            {
                $this->validate($request, [
                    'password' => 'min:6',
                    'password_confirmation' => 'required_with:password|same:password'
                ]);

                $input['password'] = Hash::make($request->password);
                $input['auth_key'] = $request->password;
                $m=User::where('remember_token',$old_token)->update($input);
                
                   
                
                    $fullName = User::where('email',$email)->value('name');
                    $url = WEBSITE_URL;
                    $messageBody = "<!DOCTYPE html>
                            <html lang='en'>

                            <head>
                                <title>The Zouple</title>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>

                            </head>

                            <body>

                                <section style='width: 60%; min-height: 300px;padding: 15px;margin: 25px auto; background: rgba(255,255,255,.6);  display: block;border-radius: 2px;'>

                                    <div style='text-align:center;'>
                                        <h1 style='padding-left: 30px; text-align: center; color:#969696; font-size:30px!important;'>PASSWORD RESET SUCCESSFULLY</h1>
                                       
                                        <div style=' text-align: center;font-size: 16px; color:#969696; margin-bottom:5px; padding:0px 10px;'>Your password for The Zouple account has been successfully changed. Kindly use your new password to continue shopping with us.
.
                                        </div>
                                        <a class='link-btn' href='{$url}' style='padding: 10px 20px;font-size: 18px;line-height: 24px;background: #000000;margin: 30px auto;display: block; width: 150px;text-align: center;color: #fff;text-transform: uppercase;text-decoration: none;'>Click Here</a>
                                            <div style='font-size: 16px;margin-top:30px; margin-bottom: 5px; color:#969696; text-align: center;'>If you did not request for a password reset, you can ignore this email. Only a person with the access to your email can reset your account password.</div>
                                             <div style='font-size: 16px; margin-top:40px; color:#969696; text-align: left; margin-left:15px;'>
                                                    Thank You,
                                                 </div>
                                                  <div style='font-size: 16px; color:#969696; text-align: left; margin-left:15px;'>
                                                   CA ON Click
                                                 </div>

                                    </div>


                                </section>
                            </body>

                            </html>
                            ";
                
                
                
                    $subject = "Password reset successfully for your CA ON Click ";
                    $data['msg']=$messageBody;
                    $data['subject']=$subject;
                    $data['email']=$email;
                    Mail::send([],[],  function ($message)  use($data) 
                    {
                        $message->to($data['email'])->subject($data['subject'])
                            ->setBody($data['msg'], 'text/html'); 
                    });

                    $request->session()->flash('alert-success','Your password has been successfully updated!'); 
                    return redirect('/'); 
                  
            }
        }
        else
        {
            $request->session()->flash('alert-success','You Email is not Sure.'); 
            return redirect('/'); 
        } 
    }
        
    
    /* -------------------------- Password Forget Code End -------------------------- */
    
}
