<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent;

class Neww extends \Eloquent
{
    //
    public $table="newws";
    public function gallery(){
    	return $this->hasMany('App\Galery');
    }
}
