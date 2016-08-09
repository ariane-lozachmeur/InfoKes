<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Categorie;
use App\Http\Requests;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=[];
        $data['page']='create';
        $data['categories']=Categorie::all();
        $data['session']=\Session::all();
        return view('create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        $input=$request->all();
        $article = New Article;
        $article->titre=$input['titre'];
        $article->auteur=$input['auteur'];
        $article->contenu=$input['contenu'];
        $article->published_at=$input['published_at'];
        $article->presentation=$input['presentation'];
        $article->cat_id=$input['cat_id'];
        $article->relu=false;
        //$article->image=$input['image'];
        $article->fichier=$input['fichier'];
        $article->save();
        return redirect('/')->with('message','Merci d\'avoir publié cet article ! Il sera mis en ligne au plus tôt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=[];
        $data['article']=Article::findOrFail($id);
        $data['page']='show';
        $data['session']=\Session::all();
        return view('show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[];
        $data['article']=Article::findOrFail($id);
        $data['page']='edit';
        return view('edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
