<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Validator;
use\App\Groupe;
use\App\Team;
use\App\Round;
use\App\GroupeTeam;
use\App\Matche;
class MatchController extends Controller
{
    //
    public function index(){
    	$groups=Groupe::orderBy('id','Desc')->get();
    	return view('matches.index',compact('groups'));
    }
    public function show_teams(Request $r){
    $id = $r->input('id_sub');
	            $team=GroupeTeam::where('groupe_teams.groupId','=',$id)->
                join('teams','groupe_teams.teamId','teams.id')->
             select('teams.*','groupe_teams.*')
            ->get();
      $response = json_decode($team, true);
      
      return $response;
    }
    public  function add_match(Request $r){
    	$group=$r->input('group_id');
    	$teams=$r->input('team_id');
    	$date=$r->input('date');
    	$time=$r->input('time');
    	$title=$r->input('title');
    $data = ['team_id' => $teams,'date' => $date,'time' =>$time,'title' => $title ];
   $rules = ['team_id' => 'required','date' =>'required','time' =>'required','title'=>'required'];

   $v = Validator::make($data, $rules);

   if($v->fails()){
    return Redirect::Back()->withErrors($v);
}else{
	$count=1;
	$match = new Matche();
$match->groupId= $group ;
		foreach ($teams as $team) {
if($count == 1){
	$match->teamId1 =$team;
	$count++;
}	
else if ($count == 2 ){
$match->teamId2 =$team;
}
else{
	break;
}
	}
	$match->title=$title;
	$match->date=$date;
	$match->time=$time;
$match->save();
	return Redirect::back()->with('success', 'New Match successfuly inserted');

}
    }
    public function view_matches($id){
    	$group=Groupe::findOrFail($id);
    	$matches=Matche::where('groupId','=',$id)->get();
    	return view('gr_team.view_matches',compact('matches','group'));
    }
    public function delete_match($id){
    	$match=Matche::findOrFail($id);
    	$match->delete();
    	return Redirect::back()->with('success', 'this Match successfuly deleted');
    }
    public function view_match($id){
    	$match=Matche::findOrFail($id);
    	return view('matches.view_match',compact('match'));
    }
    public function update_match(Request $r,$id){
    	$title=$r->input('title');
    	$date=$r->input('date');
    	$time=$r->input('time');

   $data = ['date' => $date,'time' =>$time,'title' => $title ];
   $rules = ['date' =>'required','time' =>'required','title'=>'required'];

   $v = Validator::make($data, $rules);

   if($v->fails()){
    return Redirect::Back()->withErrors($v);
}else{
	$match = Matche::findOrFail($id);
	$match->title = $title;
	$match->date =$date;
	$match->time=$time;
	$match->save();
	return Redirect::back()->with('success', 'this Match successfuly Updated'); 
    }
}
}
