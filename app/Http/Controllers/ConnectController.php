<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Model\User;
use App\Http\Controller\UserController;
use Cas;

use App\Http\Requests;

class ConnectController extends Controller
{
    public function connect(){ //TODO remove
    	Session::put('role',$_POST['role']);
    	return "{'message:'success'}";
    }

    public function casLogin(){
        Cas::authenticate();
        $user = Cas::getCurrentUser();
    	Session::put('user',$user);
    	Session::put('role',1);
    	return redirect()->back()->with('message', "Tu es maintenant connecté en tant que $user");
    }

    public function login(Request $request){
    	$input = $request->all();
    	$user = User::where('name',$input['login'])->first();
    	if ($user!= null && $user->password = $input['password']){
    		Session::put('user',$user);
    		Session::put('role',$user->role);
    		return redirect()->back()->with('message', "Tu es maintenant connecté en tant que $user->name");
    	}
    	else{
    		return redirect()->back()->with('message', "Erreur de connection");
    	}
    }

    public function logout(Request $request){
    	Session::flush();
    	return redirect()->back()->with('message', "Tu as bien été déconnecté.");
    }
}
