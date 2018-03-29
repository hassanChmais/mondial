@extends('layouts.app')

@section('content')
<div class="container">
             <div class="row">
                    <b>Images</b>
        @foreach($gallery as $g)
        <div class="col-md-1 ">
    <div class="panel-body" style="height:150px ; background: url('{{asset('uploads/news/'.$g->img_name)}}'); background-size: 100px; background-position: center center;background-repeat: no-repeat;">
    <a href="{{route('deleteimage', $g->id)}}">  <i class="fa fa-times-circle" aria-hidden="true" title="Not Active..please publish it on click"></i></a>
    </div>
    </div>
    @endforeach
</div>
     <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Add News Feed</div>
                <div class="panel-body">
<form method="POST" enctype="multipart/form-data" class="well">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <p>
        <input type="text" name="title" placeholder="Title *" class="form-control" value="{{$news->title}}">
    </p>
    <p>
                    <p>
       <textarea name="description" id="ckview" cols="30" rows="10" class="form-control" >{{$news->description}}</textarea>
    </p>
    </p>
    <p>
        <b>
            Choose a photo/s
        </b>
    </p>
    <p>
        <input type="file" name="attachments[]"  class="form-control" multiple/>
    </p>
            <p>
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