<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function home(){
    	$data=[];
    	$data['page']='home';
    	return view('home',$data);
    }

}
