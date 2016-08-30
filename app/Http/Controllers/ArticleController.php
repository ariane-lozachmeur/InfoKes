<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\ArticleRequest;
use App\Model\Article;
use App\Model\Commentaire;
use App\Model\Categorie;
use App\Http\Requests;
use Carbon\Carbon;
use Session;
use App\Model\IK;


class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('notik',['except'=>['show','create','like','comment']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=PagesController::dataCommune('articles',false);
        $data['articles']=ArticleController::nonRelu(9);
        $data['actuskes']=ActusKesController::getActus();
        return view('articles.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=PagesController::dataCommune('article.create',false);
        return view('articles.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(ArticleRequest $request)
    {
        $article = New Article;
        $input=$request->all();
        $article->titre=$input['titre'];
        $article->auteur=$input['auteur'];
        $article->contenu=$input['contenu'];
        $article->published_at=$input['published_at'];
        $article->presentation=$input['presentation'];
        $article->cat_id=$input['cat_id'];
        $article->relu=false;
        $article->save();

        $article->image = Article::saveFile($request,'image',"Image_$article->id");
        $article->fichier=Article::saveFile($request,'fichier',"Article_$article->id");
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
        $article = Article::findOrFail($id);

        $data=PagesController::dataCommune('article.show',true);
        $data['article']=$article;
        $data['cat']=Categorie::find($data['article']->cat_id);
        $data['actuskes']=ActusKesController::getActus();
        $data['linkedArticles']=ArticleController::getLinkedArticle($data['cat']->id,5,$article->id);
        $data['commentaires']=$article->commentaires()->paginate(4);
        if(Request::ajax()){
            return $data['commentaires'];
        }
        else { 
            return view('articles.show',$data); 
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=PagesController::dataCommune('article.edit',false);
        $data['article']=Article::findOrFail($id);
        $data['cat']=Categorie::find($data['article']->cat_id);
        return view('articles.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $input=$request->all();
        $article=Article::find($id);
        $article->titre=$input['titre'];
        $article->auteur=$input['auteur'];
        $article->contenu=$input['contenu'];
        $article->presentation=$input['presentation'];
        $article->cat_id=$input['cat_id'];
        $article->relu=false;
        if(isset($input['image'])){
            $article->image = Article::saveFile($request,'image',"Image_$id");
        }
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
        Article::find($id)->delete();
        return '{"message" : "Success"}';
    }

    public function valider($id)
    {
        $article = Article::find($id);
        $article->relu=true;
        $article->ik_numero=$_POST['numero'];
        $article->save();
        return '{"message" : "success"}';
    }

    public function like($id){
        $article = Article::find($id);
        $article->like++;
        if (Session::has('liked')){
            $liked = Session::get('liked');
            $liked = array($id);
            $liked = array_collapse([$liked, array($id)]);
        } else { 
            $liked = array($id);
        }
        Session::put('liked',$liked);
        $article->save();
        return '{"like":' +"$article->like"+'}';
    }

    public static function getArticlesOfWeek($nombre){
        $articles = Article::whereBetween('published_at', array(Carbon::now()->subWeek(), Carbon::now()))
                            ->where('relu',true)
                            ->latest('like')
                            ->paginate($nombre);
        return $articles;
    }

    public static function nonRelu($nombre){
        return Article::where('relu',false)->paginate($nombre);
    }

    public static function relu(){
        return Article::where('relu',true)->get();
    }

    public static function comment(Request $request, $id){
        $commentaire = New Commentaire;
        $commentaire->auteur=$_POST['auteur'];
        $commentaire->contenu=$_POST['contenu'];
        $commentaire->save();
        $article = Article::find($id);
        $article->commentaires()->attach($commentaire);
        return '{"message":"success"}';
    }

    public static function getLinkedArticle($cat_id, $number,$article_id){
        return Article::where('id','!=',$article_id)
                        ->whereBetween('published_at', array(Carbon::now()->subWeeks(1), Carbon::now()))
                        ->where('relu',true)
                        ->latest('published_at')
                        ->get();
    }   

    public static function getArticleByCat($id,$nombre){
        return Article::where('cat_id',$id)
                        ->where('relu',true)
                        ->latest('published_at')
                        ->paginate($nombre);
    }

    public static function getFromIK($numero){
        return IK::find($numero)->articles()->get();
    }
}
