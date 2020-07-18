<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class freelanceController extends Controller
{
    public function __construct()
    {
        $session = Session::get('user_data');
        if($session == null){
            return view('welcome');
        }
    }

    public function showJobList()
    {
        $session = Session::get('user_data');
        $data =
        ['query' => [
                "role" => $session['user_role'],
                "token" => $session['token']
            ]];
        $client = new \GuzzleHttp\Client();
        $url = env('LOCAL') . '/freelance/show-job-list';
        $request = $client->post($url , $data);
        $response = $request->getBody()->getContents();
        $result = json_decode($response);

       return view('freelance.jobs',compact('result')); 
    }

    public function jobSubmit(Request $request)
    {
        //if email null will be error
        $session = Session::get('user_data');
        $data =
            ['query' => [
                "email" => $session['data_user']['form_params']['email'],
                "role" => $session['user_role'],
                "token" => $session['token'],
                "job_id" => $request->job_id
            ]];
        $client = new \GuzzleHttp\Client();
        $url = env('LOCAL') . '/freelance/job-submit';
        $request = $client->post($url , $data);
        $response = $request->getBody()->getContents();
        $result = json_decode($response);

        return response()->json([
            "message" => $result->message
        ]);
    }

    public function completeProfile(Request $request)
    {
           $session = Session::get('user_data');
           $data =
               ['query' => [
                   "email" => $session['data_user']['form_params']['email'],
                   "token" => $session['token'],
                   "name" => $request->name,
                   "age" => $request->age,
                   "address" => $request->address,
                   "skills" => $request->skills
               ]];
           $client = new \GuzzleHttp\Client();
           $url = env('LOCAL') . '/user/user-fill-identity';
           $request = $client->post($url , $data);
           $response = $request->getBody()->getContents();
           $result = json_decode($response);
        
           if($result != null){
               return response()->json([
                   "message" => $result->message
               ]);
           }else{
            return response()->json([
                "message" => "Error"
            ]);
        }
    }
}
