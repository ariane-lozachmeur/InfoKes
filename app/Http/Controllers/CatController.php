<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Categorie;
use Session;


class CatController extends Controller
{
    public function __construct(){
        $this->middleware('notik',['except'=>'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=PagesController::dataCommune('cat',false);
        return view('cat.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=PagesController::dataCommune('cat.create',false);;
        return view('cat.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        $categorie = New Categorie;
        $categorie->name=$input['name'];
        $categorie->couleur=$input['couleur'];
        $categorie->couleur_police=$input['couleur_police'];
        $categorie->save();
        return redirect('/categorie')->with('message','La catégorie a bien été crée');
    }

    /**
     * Display the specified resou
    {
rce.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $data=PagesController::dataCommune('cat.show',true);
        $data['cat']=Categorie::findOrFail($id);
        $data['articles']=ArticleController::getArticleByCat($id,9);
        $data['actuskes']=ActusKesController::getActus();
        return view('cat.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=PagesController::dataCommune('cat.edit',false);
        $data['categorie']=Categorie::find($id);
        return view('cat.edit',$data);

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
        $categorie = Categorie::find($id);
        $categorie->name=$input['name'];
        $categorie->couleur=$input['couleur'];
        $categorie->couleur_police=$input['couleur_police'];
        $categorie->save();
        return redirect('/categorie')->with('message','La catégorie a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorie::find($id)->delete();
        return '{"message" : "Success"}';
    }
}
