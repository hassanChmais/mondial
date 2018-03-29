@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Add News Feed</div>

                <div class="panel-body">
<form method="POST" enctype="multipart/form-data" class="well">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <p>
        <input type="text" name="title" placeholder="Title *" class="form-control" value="{{old('title')}}">
    </p>
    <p>
                    <p>
       <textarea name="description" id="ckview" cols="30" rows="10" class="form-control" >{{old('description')}}</textarea>
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
        <input type="submit" value="Save" class="btn btn-primary form-control">
    </p>

    </form>
                </div>
            </div>
        </div>
    </div>
<hr/>
</div>
@endsection