<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Http\Requests;

class ConnectController extends Controller
{
    public function connect(){
    	Session::put('role',$_POST['role']);
    	return "{'message:'success'}";
    }

    public function login(Request $request){
    	$input = $request->all();
    	$user = User::find($input['login']);
    }
}
