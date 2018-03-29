<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Eloquent;
class Team extends \Eloquent
{
    //
                public function groupeteam(){
        return $this->hasMany('App\GroupeTeam','teamId')->select(['id', 'teamId','groupId']);
    }
}
