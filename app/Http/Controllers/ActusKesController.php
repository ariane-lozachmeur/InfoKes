<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ActusKesRequest;
use App\Model\ActusKes;
use App\Model\Categorie;
use App\Http\Requests;
use Carbon\Carbon ;


class ActusKesController extends Controller
{
    public function __construct(){
        $this->middleware('notkessier',['except'=>'index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data=PagesController::dataCommune('actuskes',false);
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
        $data=PagesController::dataCommune('actuskes.create',false);
        $data['postes']=['IK','Relex','Specto','Trézo','SecGen','Archi','Inter','Binet','Mili','Sport','Com','Ens'];
        return view('actuskes.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActusKesRequest $request)
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
        return redirect('/actuskes')->with('message','Ta news Kès a bien été postée ');
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
        $data=PagesController::dataCommune('actuskes.edit',false);
        $data['actuskes']=ActusKesController::getActus();
        $data['actu']=ActusKes::find($id);
        return view('actuskes.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActusKesRequest $request, $id)
    {
        $input=$request->all();
        $actuskes = Actuskes::find($id);
        $actuskes->titre=$input['titre'];
        $actuskes->contenu=$input['contenu'];
        $actuskes->user_id=null;
        $actuskes->published_at=$input['published_at'];
        $actuskes->published_until=$input['published_until'];
        $actuskes->relu=false;
        $actuskes->save();
        return redirect('actuskes')->with('message','Ta news Kès a bien été modifiée ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ActusKes::find($id)->delete();
        return '{"message" : "Success"}';
    }

    public static function getActus(){
        return Actuskes::where('published_at','<=',Carbon::now())
                        ->where('published_until','>',Carbon::now())
                        ->latest('published_at')
                        ->get();
    }
}
