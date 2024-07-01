<?php

namespace App\Http\Controllers\publisherAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth,Redirect,route,Session,View,Validator,Config,Hash;
use DB;

use App\User;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;

class UserController extends Controller
{
    public function login(Request $request)
    {
                if(Auth::check()){
            if(Auth::user()->user_role=='PUBLISHER') {
              //  return $request;
               return  Redirect::to('user/dashboard');
            }
           // dd($request);
        }
        if($request->isMethod('post'))
        {
           
            $userdata = array(
                'email' 		=> 	$request->get('email'),
                'password' 		=> 	$request->get('password'),
                'user_role' 	=> 	'PUBLISHER',
                'is_active' 	=> 	'ACTIVE',
                
            );
          
            if (Auth::attempt($userdata)){
               // return $userdata;
               return  Redirect::to('user/dashboard');
                return redirect(route('dashboard'));
            }else{
                //return $userdata;
                $request->session()->flash('alert-danger','Invaild Id and Password !!');
                return Redirect::back() ->withInput();
            }
        }
        else
        {
         //dd($request);
            return view('publisher.login.login');
        }
        
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flash('alert-danger','You are Logout !!');
        return Redirect::to('login');
    }
}
