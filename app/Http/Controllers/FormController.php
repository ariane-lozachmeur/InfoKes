<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FormController extends Controller
{
    public function postArticle(Resquest $request){
    	ArticleController::create($request);
    	\Session::flash('message','Ton article a bien été posté. Merci pour cette contribution !');
    	redirect({{url('/')}});
    }
}
