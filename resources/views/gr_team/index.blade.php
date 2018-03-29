@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Add Teams-Group</div>

                <div class="panel-body">
<form method="POST" enctype="multipart/form-data" class="well">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <p>
        <b>Choose Group</b>
    </p>
    <p>
        <select class="form-control" name="group_id" >
        

            @foreach($groups as $group)
            <option value="{{$group->id}}">{{$group->gr_name}}</option>
            @endforeach
        </select>
    </p> 
        <p>
        <b>Choose Teams</b>
    </p>
    <p>
        <select class="form-control" name="team_id[]" multiple="multiple" >
        

            @foreach($teams as $team)
            <option value="{{$team->id}}">{{$team->team_name}}</option>
            @endforeach
        </select>
    </p> 
    <p>
        <input type="submit" value="Save" class="btn btn-primary form-control">
    </p>

    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection