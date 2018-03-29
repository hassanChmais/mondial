<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent;
class Groupe extends \Eloquent
{
    //

                public function round(){
        return $this->belongsTo('App\Round','roundId')->select(['id', 'name']);
    }
            public function groupeteam(){
        return $this->hasMany('App\GroupeTeam','groupId')->select(['id', 'teamId','groupId']);
    }
            public function match(){
    	return $this->hasMany('App\Matche','groupId');
    }

}
