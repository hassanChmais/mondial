@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Update Matche</div>

                <div class="panel-body">
<form method="POST" enctype="multipart/form-data" class="well">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <p><b>Title</b></p>
                <p>
                <input type="text" name="title" class="form-control" autocomplete="off" placeholder="Team VS Team" value="{{$match->title}}">

              </p>
    <p><b> Choose Date</b></p>
                <p>
                <input type="text" name="date" class="form-control" autocomplete="off" value="{{$match->date}}" >

              </p>
                     <p><b> Choose Time</b></p>
    <p>
            <input id="timepicker" type="text" class="form-control input-small" name="time" value="{{$match->time}}"></p>
    <p>
    <p>
        <input type="submit" value="Update" class="btn btn-primary form-control">
    </p>

    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection