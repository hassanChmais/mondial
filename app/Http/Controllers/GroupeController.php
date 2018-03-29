<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Validator;
use\App\Groupe;
use\App\Team;
use\App\Round;


class GroupeController extends Controller
{
    public function index(){
    	$rounds = Round::orderBy('id','Desc')->where('status',1)->get();
    	$groups = Groupe::orderBy('id','Desc')->get();
    	return view('groups.index',compact('rounds','groups'));
    }
    public function add_group(Request $r){
    	$name=$r->input('name');
    	$rounds=$r->input('round_id');
    $data = ['name' => $name,'round_id' => $rounds ];
   $rules = ['name' => 'required','round_id' => 'required'];

   $v = Validator::make($data, $rules);

   if($v->fails()){
    return Redirect::Back()->withErrors($v);
}else{

	$group = new Groupe();
$group->gr_name = $name ;
$group->roundId=$rounds;
$group->gr_status = 0 ;
$group->save();

/*	foreach ($teams as $team) {
$group = new Groupe();
$group->gr_name = $name ;
$group->team_id=$team;
$group->grstatus = 0 ;
$group->save();
	}*/
return Redirect::back()->with('success', 'New Group successfuly inserted');
}
    }
    public function delete_group($id){
    	$group=Groupe::findOrFail($id);
    	$group->delete();
    	return Redirect::back()->with('success', 'Group successfuly Deleted');

    }
            public function publish_group($id)
    {

     $group = Groupe::findOrFail($id);
     if($group->gr_status == '0')
     {
       $group->gr_status = '1';
       $group->save();
       return Redirect::Back()->with('success', 'This Group is Published');
     }
     else{
      $group->gr_status = '0';
      $group->save();
      return Redirect::Back()->with('success', 'This Group is Unpublished');
    }
  }
  public function view_group($id){
  	$group = Groupe::findOrFail($id);
  	$rounds=Round::orderBy('id','Desc')->where('status',1)->get();
  	return view('groups.view_group',compact('group','rounds'));
  }
  public function update_group(Request $r,$id){
  	    	$name=$r->input('name');
    	$round=$r->input('round_id');
    $data = ['name' => $name ];
   $rules = ['name' => 'required'];
      $v = Validator::make($data, $rules);

   if($v->fails()){
    return Redirect::Back()->withErrors($v);
}else{
	$group=Groupe::findOrFail($id);
	$group->gr_name=$name;
	$group->roundId=$round;
	$group->save();
	return Redirect::back()->with('success','This Group Updated');

}
  }
}
