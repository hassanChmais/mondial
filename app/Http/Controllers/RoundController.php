<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Validator;
use\App\Round;
use paginate;

class RoundController extends Controller
{
    //
public function index(){
	$round=Round::orderBy('id','Desc')->paginate(1);

	return view('rounds.index',compact('round'));
}
public function add_round(Request $r){
	$name = $r->input('name');
	      $exist = Round::where('name',$name)->count();
      if($exist == 1)
      {
       return Redirect::Back()->withErrors('This Round Allready Exist!!');

   }

   $data = ['name' => $name];
   $rules = ['name' => 'required'];

   $v = Validator::make($data, $rules);

   if($v->fails()){
    return Redirect::Back()->withErrors($v);
}else{
	$round = new Round();
	$round->name = $name;
	$round->status = 0 ;
	$round->save();
	 return Redirect::back()->with('success', 'New Round successfuly inserted');
}
}
public function publish_round($id){
	     $round = Round::findOrFail($id);
     if($round->status == '0')
     {
       $round->status = '1';
       $round->save();
       return Redirect::Back()->with('success', 'This Round is Published');
     }
     else{
      $round->status = '0';
      $round->save();
      return Redirect::Back()->with('success', 'This Round is Unpublished');
    }
}
public function edit_round($id){
	$round=Round::findOrFail($id);
	return view('rounds.edit_round',compact('round'));
}
public function delete_round($id){
$round=Round::findOrFail($id);
$round->delete();
return Redirect::back()->with('success' , 'Round was Deleted successfuly!!');
}
public function update_round($id,Request $r){
	$name = $r->input('name');
	      $exist = Round::where('name',$name)->count();
      if($exist == 1)
      {
       return Redirect::Back()->withErrors('This Round Allready Exist!!');

   }

   $data = ['name' => $name];
   $rules = ['name' => 'required'];

   $v = Validator::make($data, $rules);

   if($v->fails()){
    return Redirect::Back()->withErrors($v);
}else{
	$round=Round::findOrFail($id);
	$round->name = $name;
	$round->save();
	 return Redirect::back()->with('success', 'Round successfuly Updated');
}
}
}
