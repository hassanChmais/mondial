@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
<div class="col-md-4 "></div>
            <div class="col-md-4 ">
            <center><div class="card border-success mb-3" style="max-width: 18rem;">
    <div class="card-header bg-transparent border-success"><center><b>Groupe:{{$group->gr_name}}</b></center></div>
    <div>
        @foreach($team as $t)
                <p><h5 class="card-title">Team:{{$t->team_name}}   <a href="{{route('deleteTeamGroupe', $t->id)}}"><i class="fa fa-remove" style="font-size:24px;color:red"></i></a></h5></p>
        @endforeach 
    </div>

                            <div class="panel-footer text-center">
                <a href="{{ route('viewmatches',$group->id) }}" class="btn btn-danger form-control">View Matches</a>
            </div>
</div>
</center>
        </div>
    </div>
    </div>
@endsection