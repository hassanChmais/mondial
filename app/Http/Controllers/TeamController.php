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
class TeamController extends Controller
{
    //
    public function index(){
    	return view('teams.index');
    }
     public function add_team(Request $r){
     	$foreign_name = mt_rand(11111111,99999999);
    	$name=$r->input('name');
    	$photo = $r->file('photo');
    $data = ['name' => $name,'photo' => $photo ];
   $rules = ['name' => 'required','photo'=> 'required'];

   $v = Validator::make($data, $rules);

   if($v->fails()){
    return Redirect::Back()->withErrors($v);
}else{
	      	    $destination = 'uploads/teamlogo';
            $photo_name = $foreign_name;
            $photo_name .= '.'.$photo->getClientOriginalExtension();
            $photo->move($destination, $photo_name);

$team = new Team();
$team->team_name = $name ;
$team->team_logo=$photo_name;
$team->team_status = 0 ;
$team->save();
return Redirect::back()->with('success', 'New Team successfuly inserted');
}
    }
    public function all_Teams(){
    	$teams=Team::orderBy('id','Desc')->paginate(12);
    	return view('teams.all_teams',compact('teams'));
    }
    public function delete_team($id){
    	$team=Team::findOrFail($id);
    	  	$team->delete();
  	@unlink("uploads/teamlogo/".$team->team_logo);
  	return Redirect::back()->with('success' , 'Team was Deleted successfuly!!');
    }
    public function publish_team($id){
    	$team=Team::findOrFail($id);
    	     if($team->team_status == '0')
     {
       $team->team_status = '1';
       $team->save();
       return Redirect::Back()->with('success', 'This Team is Published');
     }
     else{
      $team->team_status = '0';
      $team->save();
      return Redirect::Back()->with('success', 'This Team is Unpublished');
    }
    }
    public function view_team($id){
    	$team=Team::findOrFail($id);
    	return view('teams.view_team',compact('team'));

    }
    public function update_team(Request $r,$id){
    	$foreign_name = mt_rand(11111111,99999999);
    	$name=$r->input('name');
    	$photo = $r->file('photo');
    $data = ['name' => $name ];
   $rules = ['name' => 'required'];

   $v = Validator::make($data, $rules);

   if($v->fails()){
    return Redirect::Back()->withErrors($v);
}
else{
	if($photo != "" ){
	      		$destination = 'uploads/teamlogo';
            $photo_name = $foreign_name;
            $photo_name .= '.'.$photo->getClientOriginalExtension();
            $photo->move($destination, $photo_name);
$team=Team::findOrFail($id);
@unlink("uploads/teamlogo/".$team->logo);
$team->team_name=$name;
$team->team_logo=$photo_name;
$team->save();
            return Redirect::back()->with('success' , 'Team was Updated successfuly!!');
        }
        else{
        $team=Team::findOrFail($id);
$team->team_name=$name;
$team->save();
            return Redirect::back()->with('success' , 'Team was Updated successfuly!!');	
        }
}

    }
    public function test(){

/*   	$team = Team::join('groupes', 'teams.groupId', '=', 'groupes.id')
            ->join('rounds', 'groupes.roundId', '=', 'rounds.id')
            ->select('teams.*', 'groupes.name', 'rounds.*')
            ->get(); */
/*         $group = Groupe::join('teams', 'groupes.team_id', '=', 'teams.id')
            ->select( 'groupes.id','groupes.gr_name','teams.team_name','teams.team_logo')
            ->get();*/
//$group= Groupe::with('team')->get();
           // $group=Groupe::select(['gr_name','grstatus'])->where('gr_name','=','A')->get();
            //$group=GroupeTeam::with('groupe')->with('team')->get();
            //$group = GroupeTeam::select( 'teamId','groupId')->with('team')->with('groupe')->get();
            //$group=Groupe::with('round')->get();
/*            $group=Round::join('groupes','rounds.id','=','groupes.roundId')->
            join('groupe_teams','groupes.id','=','groupe_teams.groupId')->
             join('teams','groupe_teams.teamId','teams.id')->
             select('rounds.id','rounds.name','groupe_teams.teamId','groupe_teams.groupId','groupes.gr_name','teams.team_name','teams.team_logo')->
            get();*/
/*            $team=GroupeTeam::where('groupe_teams.groupId','=',1)->
                join('teams','groupe_teams.teamId','teams.id')->
             select('teams.*','groupe_teams.*')
            ->get();*/
         /* $team=GroupeTeam::where('groupe_teams.groupId','=',1)->
                join('teams','groupe_teams.teamId','teams.id')->
             select('teams.*','groupe_teams.*')
            ->get();*/
$match=Matche::with('team')->with('team2')->get();
    	return $match;
    }
}
