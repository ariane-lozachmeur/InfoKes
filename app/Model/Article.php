<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\ArticleRequest;
use App\Model\Commentaire;
use App\Model\User;

class Article extends Model
{
    protected $fillable = ['titre','contenu','user_id','image','auteur'];

	public function auteur() 
	{
		return $this->belongsTo('App\User');
	}	

	public function commentaires()
    {
        return $this->belongsToMany('App\Model\Commentaire');
    }

    public function ik(){
        return $this->belongsTo('App\Model\IK');
    }

    public static function saveFile($request,$type,$name){
    	if($request->hasFile($type) ) {
            $file = $request->file($type);
            if($file->isValid()){
            $chemin = config("$type.path");
            $extension = $file->getClientOriginalExtension();
            if (!file_exists($chemin . '/' . $name . '.' . $extension)){
                $nom = $name . '.' . $extension;
            } else {
                $i=2;
                do {
                $nom = $name.'_'.$i . '.' . $extension;
                $i++;
                } while(file_exists($chemin . '/' . $nom));
            } 
            $file->move($chemin, $nom);    
            return $chemin.'/'.$nom;
            }
        }
    }
}
