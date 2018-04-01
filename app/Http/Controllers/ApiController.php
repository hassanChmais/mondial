<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Groupe;
use App\GroupeTeam;
use App\Round;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_teams()
    {
        //
        $teams = Team::orderBy('team_name','ASC')->get();
        return $teams;
    }
public function get_all_groups(){
    $groups = Groupe::orderBy('gr_name','ASC')->get();
    return $groups;
}
public function get_all_teamGr($id){
    $team=GroupeTeam::where('groupe_teams.groupId','=',$id)->
                join('teams','groupe_teams.teamId','teams.id')->
             select('teams.*','groupe_teams.*')
            ->get();
            return $team;
}
public function add_round(Request $r){
    $name = $r->input('round_name');
    $round = new Round();
    $round->name = $name;
    $round->status = 0 ;
    $round->save();
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
