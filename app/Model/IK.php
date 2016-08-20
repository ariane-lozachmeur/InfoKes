<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class IK extends Model
{
	protected $table ='ik';

    protected $primaryKey = 'numero';

    public function saveIK($request,$numero,$titre){
        if($request->hasFile('pdf') ) {
            $file = $request->file('pdf');
            if($file->isValid()){
            $chemin = config("pdf.path");
            $extension = $file->getClientOriginalExtension();
            $nom = 'IK_'.$numero.'.' . $extension; 
            if (file_exists($nom)){
                $i=2;
                do {
                $nom = 'IK_'.$numero.'_'.$i.'.' . $extension;
                $i++;
                } while(file_exists($chemin . '/' . $nom));
            } 
            $file->move($chemin, $nom);    
            $this->pdf = $chemin.'/'.$nom;
            }
        }
        if ($request->hasFile('une')){
            $une = $request->file('une');
            if($une->isValid()){
            $chemin = config("pdf.path").'/unes';
            $extension = $une->getClientOriginalExtension();
            if (!file_exists($chemin . '/IK_' . $numero . '.' . $extension)){
                $nom = 'IK_'.$numero . '.' . $extension;
            } else {
                $i=2;
                do {
                $nom = 'IK_'.$numero.'_'.$i . '.' . $extension;
                $i++;
                } while(file_exists($chemin . '/' . $nom));
            } 
            $une->move($chemin, $nom);    
            $this->une = $chemin.'/'.$nom;
            }
        }
    }
}
