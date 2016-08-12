<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ActusKes;
use App\Model\Categorie;
use App\Http\Requests;
use Carbon\Carbon ;


class ActusKesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=[];
        $data['page']='actuskes';
        $data['categories']=Categorie::all();
        $data['session']=\Session::all();
        $data['actuskes']=ActusKesController::getActus();
        return view('actuskes.index',$data);

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
        $data['postes']=['IK','Relex','Specto','Trézo','SecGen','Archi','Inter','Binet','Mili','Sport','Com','Ens'];
        return view('actuskes.create',$data);
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
        $actuskes = New Actuskes;
        $actuskes->poste=$input['poste'];
        $actuskes->titre=$input['titre'];
        $actuskes->contenu=$input['contenu'];
        $actuskes->user_id=null;
        $actuskes->published_at=$input['published_at'];
        $actuskes->published_until=$input['published_until'];
        $actuskes->relu=false;
        $actuskes->save();
        return redirect('/')->with('message','Ta news Kès a bien été postée ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ActusKes::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public static function getActus(){
        return Actuskes::where('published_at','<=',Carbon::now())
                        ->where('published_until','>',Carbon::now())
                        ->get();
    }
}
