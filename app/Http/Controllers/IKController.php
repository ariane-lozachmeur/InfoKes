<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\IK;
use App\Http\Requests;
use App\Http\Requests\IKRequest;

class IKController extends Controller
{

     public function __construct(){
        $this->middleware('notik',['except'=>['index','getByDate','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=PagesController::dataCommune('ik.create',false);
        $data['iks'] = IKController::getIKs(6); 
        return view('ik.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=PagesController::dataCommune('ik.create',false);
        return view('ik.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IKRequest $request)
    {
        $input=$request->all();        
        $ik = new IK();
        $ik->titre=$input['titre'];
        $ik->numero=$input['numero'];
        $ik->published_at=$input['published_at'];
        $ik->saveIK( $request , $input['numero'], $input['titre']);
        $ik->save();
        return redirect('ik');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($numero)
    {
        $ik = IK::findOrFail($numero);
        $data=PagesController::dataCommune('ik.show',false);
        $data['thisik']=$ik;
        $data['articles']=ArticleController::getFromIK($numero);
        return view('ik.show',$data);
    }

    public function getByDate(){
        $date = $_POST['date'];
        $ik = IK::where('published_at',"$date 00:00:00")->first();
        if($ik==null){
            return '{"message":"pas dIK"}';
        } else {
        return $ik;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($numero)
    {
        $data=PagesController::dataCommune('ik.edit',false);
        $data['thisik']=IK::where('numero',$numero)->first();
        return view('ik.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IKControllerRequest $request, $numero)
    {
        $ik = IK::where('numero',$numero)->first();
        $input = $request->all();
        $ik->titre=$input['titre'];
        $ik->saveIK( $request , $numero, $input['titre']);
        $ik->save();
        return redirect("/ik")->with('message','L\'IK a bien été updaté.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($numero)
    {
        IK::where('numero',$numero)->first()->delete();
        return '{"message" : "Success"}';
    }

    public function getIKs($nombre){
        return IK::orderBy('numero','desc')
                   ->paginate($nombre);
    }

    public static function getLatest(){
        return IK::orderBy('numero','desc')->first();
    }
}
