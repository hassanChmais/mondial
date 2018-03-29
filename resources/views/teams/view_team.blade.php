@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Update Teams</div>

                <div class="panel-body">
<form method="POST" enctype="multipart/form-data" class="well">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <p>
        <input type="text" name="name" placeholder="Name *" class="form-control" value="{{$team->team_name}}">
    </p>
    <p>
        <b>
            Choose a Logo
        </b>
    </p>
    <p>
        <input type="file" name="photo"  class="form-control" multiple/>
    </p>
    <p>
                <div class="col-md-1 ">
    <div class="panel-body" style="height:150px ; background: url('{{asset('uploads/teamlogo/'.$team->team_logo)}}'); background-size: 100px; background-position: center center;background-repeat: no-repeat;">
    </div>
    </div>
    </p>
    <p>
        <input type="submit" value="Update" class="btn btn-primary form-control">
    </p>

    </form>
                </div>
            </div>
        </div>
    </div>
<hr/>
</div>
@endsection