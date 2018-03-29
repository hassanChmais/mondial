@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
<div class="col-md-4 "></div>
            <div class="col-md-4 ">
            <center><div class="card border-success mb-3" style="max-width: 18rem;">
    <div class="card-header bg-transparent border-success"><center><b>{{$round->name}}</b></center></div>
    <div>
        @foreach($groups as $group)
                <p><h5 class="card-title">Groupe:<a href="{{route('searchTeam', $group->id)}}" style="color: #00e676;">{{$group->gr_name}}</a></h5></p>
        @endforeach
    </div>
    <div class="card-footer bg-transparent border-success">Footer</div>
</div>
</center>
        </div>
    </div>
    </div>
@endsection