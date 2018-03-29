<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupeTeam extends Model
{
    //
            public function team(){
        return $this->belongsTo('App\Team','teamId')->select(['id', 'team_name','team_logo']);
    }
            public function groupe(){
        return $this->belongsTo('App\Groupe','groupId')->select(['id', 'gr_name','roundId']);
    }
}
