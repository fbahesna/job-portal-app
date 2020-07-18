<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __construct()
    {
        $session = Session::get('user_data');
        if($session['user_role'] != 1){
            return "Sorry The Page Is Not Found!";
        }
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function jobs()
    {
        $session = Session::get('user_data');

        $data =['query' => [
                "role" => $session['user_role'],
                "token" => $session['token']
        ]];
        $client = new \GuzzleHttp\Client();
        $url = env('LOCAL') . '/dashboard/job-list';
        $request = $client->post($url , $data);
        $response = $request->getBody()->getContents();
        $result = json_decode($response);

       return view('admin.jobs',compact('result'));

       return response()->json([
           "data" => $view
       ]);
    }

    public function createNewJob(Request $request)
    {
        $session = Session::get('user_data');

        $data =['query' => [
                "role" => $session['user_role'],
                "token" => $session['token'],
                "jobTitle" => $request->job_title,
                "category" => $request->category,
                "level_requirement" => $request->level_requirement,
                "jobdesk" => $request->job_desk,
                "sallary" => $request->job_sallary
        ]];
        $client = new \GuzzleHttp\Client();
        $url = env('LOCAL') . '/dashboard/createJob';
        $request = $client->post($url , $data);
        $response = $request->getBody()->getContents();
        $result = json_decode($response);
   
        if($result->status === 200){
            return response()->json([
                "message" => $result->message
            ]);
        }else{
            return response()->json([
                "message" => "Error , Some data maybe not completed"
            ]);
        }
    }

    public function publishJob(Request $request)
    {
        $session = Session::get('user_data');

        $data =['query' => [
                "role" => $session['user_role'],
                "token" => $session['token'],
                "id" => $request->get('id'),
                "status" => "published"
        ]];
        $client = new \GuzzleHttp\Client();
        $url = env('LOCAL') . '/dashboard/update-job-status';
        $request = $client->post($url , $data);
        $response = $request->getBody()->getContents();
        $result = json_decode($response);
        return response()->json([
            $result
        ]);
    }

    public function showJobSubmit()
    {
        $session = Session::get('user_data');

        $data =['query' => [
                "role" => $session['user_role'],
                "token" => $session['token'],
        ]];
        $client = new \GuzzleHttp\Client();
        $url = env('LOCAL') . '/dashboard/show-job-submit';
        $request = $client->get($url , $data);
        $response = $request->getBody()->getContents();
        $result = json_decode($response);

        return view('admin.job-submited',compact('result'));

    }

    public function showJobSubmited(Request $request)
    {
        $session = Session::get('user_data');

        $data =['query' => [
                "role" => $session['user_role'],
                "token" => $session['token'],
                "role" => $request->role,
                "job_submit_id" => $request->job_submit_id
        ]];
        $client = new \GuzzleHttp\Client();
        $url = env('LOCAL') . '/dashboard/show-job-submited';
        $request = $client->post($url , $data);
        $response = $request->getBody()->getContents();
        $result = json_decode($response);

        return response()->json([
            "data" => $result
        ]);

    }

}
