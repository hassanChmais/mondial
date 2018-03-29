@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
<div class="col-md-4 "></div>
            <div class="col-md-4 ">
            <center><div class="card border-success mb-3" style="max-width: 40rem;">
    <div class="card-header bg-transparent border-success"><center><b>Groupe:{{$group->gr_name}}</b></center></div>
    <div>
        @foreach($matches as $t)
                <p><h5 class="card-title">{{$t->title}}<b style="color: red">||</b>{{$t->date}}<b style="color: red">||</b>{{$t->time}}   <a href="{{route('deleteMatch', $t->id)}}"><i class="fa fa-remove" style="font-size:24px;color:red"></i></a>   <a href="{{route('viewmatch', $t->id)}}"><i class="fa fa-edit" style="font-size:24px;color:green"></i></a></h5></p>
        @endforeach 
    </div>
                            <div class="panel-footer text-center">
                <a href="" class="btn btn-danger form-control">View Matches</a>
            </div>
</div>
</center>
        </div>
    </div>
    </div>
@endsection