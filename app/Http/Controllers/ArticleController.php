<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use App\Model\Commentaire;
use App\Model\Categorie;
use App\Http\Requests;
use Carbon\Carbon;
use Session;


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
        $data['session']=Session::all();
        return view('articles.create',$data);
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
        $article->image=$input['image'];
        $article->fichier=$input['fichier'];
        $article->published_at=$input['published_at'];
        $article->presentation=$input['presentation'];
        $article->cat_id=$input['cat_id'];
        $article->relu=false;
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
        $article = Article::findOrFail($id);
        $data['article']=$article;
        $data['cat']=Categorie::find($data['article']->cat_id);
        $data['page']='show';
        $data['categories']=Categorie::all();
        $data['session']=Session::all();
        $data['actuskes']=ActusKesController::getActus();
        $data['commentaires']=$article->commentaires()->paginate(4);
        return view('articles.show',$data);
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
        $data['cat']=Categorie::find($data['article']->cat_id);
        $data['page']='show';
        $data['categories']=Categorie::all();
        $data['session']=Session::all();
        return view('articles.edit',$data);
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
        $input=$request->all();
        $article=Article::find($id);
        $article->titre=$input['titre'];
        $article->auteur=$input['auteur'];
        $article->contenu=$input['contenu'];
        $article->image=$input['image'];
        $article->presentation=$input['presentation'];
        $article->cat_id=$input['cat_id'];
        $article->relu=false;
        $article->save();
        return redirect("/article/$id")->with('message','Merci d\'avoir édité cet article ! Il sera remis en ligne une fois relu');
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

    public static function getArticles($nombre){
        $articles = Article::where('published_at','>','Carbon::now()')->latest('published_at')->paginate($nombre);
        return $articles;
    }

    public static function ajouterCommentaire(Request $request, $id){
        $input=$request->all();
        $commentaire = New Commentaire;
        $commentaire->auteur=$input['auteur'];
        $commentaire->contenu=$input['contenu'];
        $commentaire->save();
        $article = Article::find($id);
        $article->commentaires()->attach($commentaire);
        return redirect("article/$id");
    }
}
