<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class mainController extends Controller
{

    public function index()
    {
        //validate when still have user session data
        $session = Session::get('user_data');
        if($session != null){
            if($session['user_role'] === 1){    
                return view('admin.dashboard');
            }else{
                echo "kamu user";
            }
        }else{
            return view('welcome');
        }
    }
}
