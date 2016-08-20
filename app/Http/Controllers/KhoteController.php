<?php

namespace App\Http\Controllers;

use App\Model\Khote;
use Illuminate\Http\Request;
use App\Model\Categorie;
use App\Http\Requests;

class KhoteController extends Controller
{
    public function __construct(){
        $this->middleware('notkessier',['except'=>['create', 'store'] ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['side']=false;
        $data['khotes']=Khote::all();
        return view('khotes.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=PagesController::dataCommune('khotes.create',false);
        return view('khotes.create',$data);
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
        $khote = New Khote();
        $khote->auteur=$input['auteur'];
        $khote->contenu=$input['contenu'];
        $khote->save();
        return redirect('/')->with('message','Merci d\'avoir posté cette khote !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
