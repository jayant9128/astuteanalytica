<?php

namespace App\Http\Controllers\masterAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Session;
use Auth, Redirect, View, File, Config, Image, Hash;
use DB;

class DashboardController extends Controller {
    public function showdashboard( Request $request ) {

        return view( 'masters.dashboard.dashboard' );
    }

    public function logout() {
        Auth::logout();
        Session::flash( 'flash_notice', trans( "messages.Login.logout" ) );
        return redirect( route( 'login' ) );
    }

    function send_now_notifi() {
        return View( 'masters.dashboard.notification' );
    }

    function SendNowFirebase( Request $request ) {
        $daa = DB::table( 'noti_token' )->get();
        foreach ( $daa as $data ) {
            $token = $data->token;

            $from = "AAAACcxF6nU:APA91bGKX-yN4zh-IGB_L0NzKjTStruY6yErsy8_oW1kb_ErAN9-EP-mRUt_NiiOgw9NysxCeLWFKjlUzpnvb-nuZgsyJ4gqk6AeZLDdbxB5_0cj5x7_vox4dwdr1YmThooxqk7_hqi9";
            $msg = array
            (
                'body'  => $request->description,
                'title' => $request->title,
                'receiver' =>"User",
                'click_action'=>$request->slug,
                'icon'  => "https://www.astuteanalytica.com/public/front/images/logo/logo-2.png", /*Default Icon*/
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
            curl_setopt( $ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt( $ch, CURLOPT_POST, true );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
            $result = curl_exec( $ch );
            /*dd( $result );*/
            curl_close( $ch );
        }
        $request->session()->flash('alert-success','Notification Send!!');
      return Redirect::route('notification');   

    }
}
