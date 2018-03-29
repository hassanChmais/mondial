@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Add Teams</div>

                <div class="panel-body">
<form method="POST" enctype="multipart/form-data" class="well">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <p>
        <input type="text" name="name" placeholder="Name *" class="form-control" value="">
    </p>
    <p>
        <b>
            Choose a Logo
        </b>
    </p>
    <p>
        <input type="file" name="photo"  class="form-control" multiple/>
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