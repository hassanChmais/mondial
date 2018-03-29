@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 50px">
<span style="float: right;font-weight: bold;margin-right: 50%">All Teams</span>
</div>

                <div class="panel-body">

                   
 <div class="row">
                                                            
@foreach($teams as $team)
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
           
                <b>{{$team->team_name}}</b> 
                <span class="pull-right">

                @if($team->team_status == 1)
              <a href="{{route('publishteam', $team->id)}}">   <i class="fa fa-check text-success" title="Active .. press to unpublish"></i></a>
@else              <a href="{{route('publishteam', $team->id)}}">  <i class="fa fa-times-circle" aria-hidden="true" title="Not Active..please publish it on click"></i></a>
@endif
                </span>
            </div>
            <div class="panel-body" style="height:150px ; background: url('{{asset('uploads/teamlogo/'.$team->team_logo)}}'); background-size: cover; background-position: center center;background-repeat: no-repeat;">
                
            </div>
            <div class="panel-footer text-center">
                <a href="{{route('updateteam', $team->id)}}" class="btn btn-primary form-control">More...</a>
            </div>
                        <div class="panel-footer text-center">
                <a href="{{route('deleteteam', $team->id)}}" class="btn btn-danger form-control">Delete</a>
            </div>
        </div>
    </div>

    @endforeach
    </div>
                 {!!$teams->links()!!}
            </div>
        </div>
    </div>
</div></div>
@endsection