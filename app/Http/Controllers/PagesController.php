<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Categorie;
use App\Http\Requests;

class PagesController extends Controller
{
    public function home(){
    	$data=[];
    	$data['page']='home';
    	$data['session']=\Session::all();
    	$data['categories']=Categorie::all();
    	return view('home',$data);
    }

}
