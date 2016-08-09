<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     protected $fillable = ['titre','contenu','user_id','image','auteur'];

	public function auteur() 
	{
		return $this->belongsTo('App\User');
}

}
