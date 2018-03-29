<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Validator;
use paginate;
use\App\Groupe;
use\App\Team;
use\App\GroupeTeam;
use\App\Round;

class GroupeTeamController extends Controller
{
    //
    public function index(){
    	$groups=Groupe::orderBy('id','Desc')->get();
    	$teams=Team::orderBy('team_name','ASC')->where('team_status','=',1)->get();
    	return view('gr_team.index',compact('groups','teams'));
    }
    public function add_GrTeam(Request $r){
    	$group=$r->input('group_id');
    	$teams=$r->input('team_id');
    $data = ['team_id' => $teams ];
   $rules = ['team_id' => 'required'];

   $v = Validator::make($data, $rules);

   if($v->fails()){
    return Redirect::Back()->withErrors($v);
}else{
		foreach ($teams as $team) {

$gr_team = new GroupeTeam();
$gr_team->groupId= $group ;
$gr_team->teamId=$team;
$gr_team->save();
	}
	return Redirect::back()->with('success', 'New Teams&Group successfuly inserted');

}
}//end add_Grteam
public function viewdetails(){
            $groups=Round::join('groupes','rounds.id','=','groupes.roundId')->
            join('groupe_teams','groupes.id','=','groupe_teams.groupId')->
             join('teams','groupe_teams.teamId','teams.id')->
             select('rounds.id','rounds.name','groupe_teams.teamId','groupe_teams.groupId','groupes.gr_name','teams.team_name','teams.team_logo')->orderBy('teams.team_name', 'ASC')->orderBy('rounds.name', 'ASC')
            ->paginate(5);

    $arr=Array('groups'=>$groups);
	return view('gr_team.view_allDetails',$arr);
}
public function search_group($id){
	$round=Round::findOrFail($id);
	$groups=Groupe::orderBy('id','ASC')->where('roundId','=',$id)->get();
	return view('gr_team.search_group',compact('groups','round'));
}
public function search_team($id){
	$group=Groupe::findOrFail($id);
	            $team=GroupeTeam::where('groupe_teams.groupId','=',$id)->
                join('teams','groupe_teams.teamId','teams.id')->
             select('teams.*','groupe_teams.*')
            ->get();
            return view('gr_team.search_team',compact('group','team'));

}
public function delete_teamgroupe($id){
	$team=GroupeTeam::findOrFail($id);
	$team->delete();
	return Redirect::back()->with('success', 'this Team successfuly deleted From Group');
}
}
