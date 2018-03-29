<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent;
class Galery extends \Eloquent
{
    //
            public $table="galeries";
        public function news(){
    	return $this->belongsTo('App\Neww');
}
}
