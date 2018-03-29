@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">Add Matchess</div>

                <div class="panel-body">
<form method="POST" enctype="multipart/form-data" class="well">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <p>
        <b>Choose Group</b>
    </p>
    <p>
        <select class="form-control" name="group_id" onchange="show_teams(this);" >
        
            @foreach($groups as $group)
            <option value="{{$group->id}}">{{$group->gr_name}}</option>
            @endforeach
        </select>
    </p> 
<p>
        <b>Choose Teams<p> <span id="loading" style="color: red;font-weight: 900;display: none;">LOADING...</span></p></b>
    </p>
    <p>
        <select class="form-control" name="team_id[]" id="team_id" multiple="multiple">
         
        </select>
    </p>
        <p><b>Title</b></p>
                <p>
                <input type="text" name="title" class="form-control" autocomplete="off" placeholder="Team VS Team">

              </p>
    <p><b> Choose Date</b></p>
                <p>
                <input type="text" name="date" class="form-control" autocomplete="off" >

              </p>
             <p><b> Choose Time</b></p>
    <p>
            <input id="timepicker" type="text" class="form-control input-small" name="time"></p>
    <p>
    <p>
        <input type="submit" value="Save" class="btn btn-primary form-control">
    </p>

    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">

function show_teams(id){
    var id_sub = id.value;
//window.alert(id.value);
    $.ajax({
      url: '{{ route('show_teams') }}',
      type: 'POST',
      data:{
        _token: '{{ csrf_token() }}',
        id_sub:id_sub
      },
      cache: false,
      datatype: 'JSON',
      success: function(response){
        $('#loading').show();
        $('#team_id').html('');
    var i;
    var count = Object.keys(response).length;
    if(count == 0)
    {
        var option=$('<option></option>');
        option.attr('value',-1);
    option.text('--No Teams--');
    $('#team_id').append(option);
    }
    var JSONObject = JSON.parse(JSON.stringify(response));
    for(i=0;i<count;i++)
    {
     var option=$('<option></option>');
    option.attr('value',JSONObject[i]["teamId"]);
    option.text(JSONObject[i]["team_name"]);
    $('#team_id').append(option);
    }
   $('#loading').hide();

     },error:function(){
alert('Somthing Went Wrong');
$('#loading').hide();

     }
   });

  }</script>
@endsection