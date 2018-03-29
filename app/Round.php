<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent;
class Round extends \Eloquent
{
    //
        public function groupe(){
        return $this->hasMany('App\Groupe','roundId')->select(['id', 'gr_name','roundId']);
    }
}
