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

    public static function dataCommune($page,$side){
        $data=[];
        $data['page']=$page;
        $data['session']=\Session::all();
        $data['categories']=Categorie::all();
        $data['latestik']=IKController::getLatest();
        $data['side']=$side;
        return $data;
    }
    public function home(){
    	$data=PagesController::dataCommune('home',true);
    	$data['articles']=ArticleController::getArticlesOfWeek(6);
        if (count($data['articles'])<6){
            $data['articles'] = ArticleController::getLatestArticles(6);
        }
    	$data['actuskes']=ActusKesController::getActus();
    	return view('home',$data);
    }

    public function jeux(){
        return '';
    }
}
