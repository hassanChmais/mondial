<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent;
class Matche extends \Eloquent
{
    //
        public function team(){
    	return $this->belongsTo('App\Team','teamId1');
    }
            public function team2(){
    	return $this->belongsTo('App\Team','teamId2');
    }
            public function groupe(){
        return $this->belongsTo('App\Groupe','groupId')->select(['id', 'gr_name','roundId']);
    }
}
