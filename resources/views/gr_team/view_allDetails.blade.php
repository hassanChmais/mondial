@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
            @foreach($groups as $group)
            <div class="col-md-4 ">
            <div class="card border-success mb-3" style="max-width: 18rem;">
    <div class="card-header bg-transparent border-success"><div class="panel-heading text-right"><i class="fa fa-search-minus"></i></div><center><b>{{$group->team_name}}</b></center></div>
    <div>
                <h5 class="card-title">Round:<a href="{{route('searchGroupe', $group->id)}}" style="color: #00e676;">{{$group->name}}</a></h5>
                <p></p>
        <h5 class="card-title">Groupe:<a href="{{route('searchTeam', $group->groupId)}}" style="color: #00e676;">{{$group->gr_name}}</a></h5>
    </div>
    <div class="card-footer bg-transparent border-success">Footer</div>
</div>

        </div>
            @endforeach
    </div>
    <center>{!! $groups->links()!!}</center>
    </div>
@endsection