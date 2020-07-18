<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class loginController extends Controller
{
    
    public function login(Request $request)
    {
        if($request->email === null && $request->password === null){
            return response()->json([
                "message" => "email and password must filled"
            ]);
        }
        
        $data = [
            'form_params' => [
                "email" => $request->email,
                "password" => $request->password
               ]
           ]; 
        $client = new \GuzzleHttp\Client();
        $url = env('LOCAL') . '/login';
        $request = $client->post($url , $data);
        $response = $request->getBody()->getContents();
        $result = json_decode($response);
        Session::put('user_data',[
            "token" => $result->result->token,
            "user_role" => $result->user_role,
            "data_user" => $data
        ]);

        if($result->status === 200 ){
            if($result->user_role != 1){
                return response()->json([
                    "data" => "freelance/show-job-list"
                    ]);    
                }else{
                    return response()->json([
                        "data" => "user/admin"
                ]);
            }
        }
    }

    public function register(Request $request)
    {
        $data = [
            'form_params' => [
                "email" => $request->email,
                "password" => $request->password
               ]
           ]; 
        $client = new \GuzzleHttp\Client();
        $url = env('LOCAL') . '/register';
        $request = $client->post($url , $data);
        $response = $request->getBody()->getContents();
        $result = json_decode($response);
        return response()->json([
            "message" => $result->message
        ]);  
    }

    public function signOut()
    {
        Session::forget('user_data');
        return redirect()->route('index');
    }
}
