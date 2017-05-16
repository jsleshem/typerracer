<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function sayHello(){
      return "Hello, World!";
    }

    public function new_user(Request $req){
    	$username = $req->input('username');
    	$password = $req->input('password');

    	$login_data = array('username'=>$username, 'password'=>$password);
    	DB::table('users')->insert();
    	echo "success";
    }
}
