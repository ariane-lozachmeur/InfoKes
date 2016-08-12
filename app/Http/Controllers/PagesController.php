<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Categorie;
use App\Http\Requests;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\NewsKesController;
use Carbon\Carbon ;


class PagesController extends Controller
{
    public function home(){
    	$data=[];
    	$data['page']='home';
    	$data['session']=\Session::all();
    	$data['categories']=Categorie::all();
    	$data['articles']=ArticleController::getArticles(5);
    	$data['actuskes']=ActusKesController::getActus();
    	return view('home',$data);
    }

}
