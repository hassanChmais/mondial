@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Update VideosStatus</div>

                <div class="panel-body">
<form method="POST" enctype="multipart/form-data" class="well">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <p>
        <input type="text" name="title" lang="ar" placeholder="Title *" class="form-control" value="{{$video->title}}">
    </p>
<p>
        <b>
            Choose a video/s
        </b>
    </p>
    <p>
        <input type="file" name="video"  class="form-control" multiple/>
    </p>
    <p>
    <div align="center" class="embed-responsive embed-responsive-16by9" style="width: 400px">
    <video controls>
        <source src="{{asset('uploads/videos/'.$video->video)}}" type="video/mp4">
    </video>
</div>
    </p>
    <p>
        <input type="submit" value="update" class="btn btn-primary form-control">
    </p>

    </form>
                </div>
            </div>
        </div>
    </div>
   
</div>
@endsection