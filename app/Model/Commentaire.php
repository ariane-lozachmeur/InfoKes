<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Article;
use App\Model\User;

class Commentaire extends Model
{
    public function article()
    {
        return $this->belongsToMany('App\Model\Article');
    }

    public function user(){
    	return $this->belongsToMany('App\User');
    }

}
