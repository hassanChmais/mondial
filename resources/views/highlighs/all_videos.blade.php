@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="height: 50px">
<span style="float: right;font-weight: bold;margin-right: 50%">All Highligh</span>
</div>

                <div class="panel-body">

                   
 <div class="row">
                                                            
@foreach($videos as $video)
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
           
                <b>{{$video->title}}</b> 
            </div>
<div align="center" class="embed-responsive embed-responsive-16by9">
    <video controls>
        <source src="{{asset('uploads/videos/'.$video->video)}}" type="video/mp4">
    </video>
</div>
            <div class="panel-footer text-center">
                <a href="{{route('viewvideo', $video->id)}}" class="btn btn-primary form-control">More...</a>
            </div>
            <div class="panel-footer text-center">
                <a href="{{route('deletevideo', $video->id)}}" class="btn btn-danger form-control">Delete</a>
            </div>
        </div>
    </div>

    @endforeach
    </div>
                {!!$videos->links()!!}
            </div>
        </div>
    </div>
</div>
@endsection