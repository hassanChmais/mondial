@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Add Rounds</div>

                <div class="panel-body">
<form method="POST" enctype="multipart/form-data" class="well">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <p>
        <input type="text" name="name" placeholder="Name *" class="form-control" value="{{$round->name}}">
    </p>
    <p>
        <input type="submit" value="Update" class="btn btn-primary form-control">
    </p>

    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection