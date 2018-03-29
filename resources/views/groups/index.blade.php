@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Add Group</div>

                <div class="panel-body">
<form method="POST" enctype="multipart/form-data" class="well">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <p>
        <input type="text" name="name" placeholder="Name *" class="form-control" value="">
    </p>
    <p>
        <b>Choose Round</b>
    </p>
    <p>
        <select class="form-control" name="round_id" >
        

            @foreach($rounds as $round)
            <option value="{{$round->id}}">{{$round->name}}</option>
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
<hr/>
<p><b>Manage Group</b></p>
<div class="row">
@foreach($groups as $r)
 <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-right">
@if($r->gr_status == 1)
              <a href="{{route('publishgroup', $r->id)}}">   <i class="fa fa-check text-success" title="Active .. press to unpublish"></i></a>
@else              <a href="{{route('publishgroup', $r->id)}}">  <i class="fa fa-times-circle" aria-hidden="true" title="Not Active..please publish it on click"></i></a>
@endif
          
            </div>
            <div class="panel-body" style="text-align: center;">
               <span style="text-align: center;font-weight: 900;color: #3cba54"> {{$r->gr_name}}</span>
            </div>
               <div class="panel-footer text-center">
                <a href="{{route('viewgroup', $r->id)}}" class="btn btn-primary form-control">Edit</a>
               
            </div>
                           <div class="panel-footer text-center">
                <a href="{{route('deletegroup', $r->id)}}" class="btn btn-danger form-control">Delete</a>
               
            </div>
        </div>
    </div>
@endforeach
</div>
</div>
@endsection