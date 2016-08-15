<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
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

}
