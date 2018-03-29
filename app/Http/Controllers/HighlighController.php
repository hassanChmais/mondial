<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Validator;
use paginate;
use\App\Highligh;



class HighlighController extends Controller
{
    //
    public function index(){
    	return view('highlighs.index');
    }
    public function videos_save(Request $r){
    	         $foreign_name = mt_rand(11111111,99999999);
      $title = $r->input('title');
      $video = $r->file('video');

        $data = ['title' => $title,'video' => $video];

      $rules = ['title' => 'required' ,'video'=> 'required|mimes:mp4,avi,asf,mov,qt,avchd,flv,swf,mpg,mpeg,mpeg-4,wmv,divx,3gp|max:6000'];

      $v = Validator::make($data, $rules);

      if($v->fails()){
        return Redirect::Back()->withErrors($v);
      }else
      {

            $destination = 'uploads/videos';
            $video_name = $foreign_name;
            $video_name .= '.'.$video->getClientOriginalExtension();
            $video->move($destination, $video_name);

     $video = new Highligh();
     $video->title = $title;
     $video->video = $video_name;  
     $video->video_http="";
    $video->save();
        return Redirect::back()->with('success', 'New Highligh successfuly created');

      }
    }
        public function all_videos(){
    	$videos=Highligh::orderBy('id','Desc')->paginate(8);
    	return view('highlighs.all_videos',compact('videos'));

    }
    public function view_video($id){
    	  	$video = Highligh::findOrFail($id);
    return view('highlighs.view_video',compact('video'));
    }
    public function delete_video($id){
    	$video = Highligh::findOrFail($id);
    	$video->delete();
    	return Redirect::back()->with('success', 'this Highligh successfuly deleted');
    }
        public function update_video(Request $r, $id)
    {
    $foreign_name = mt_rand(11111,99999);
      $title = $r->input('title');
      $video = $r->file('video');
if($video != ''){
      $data = ['title' => $title,'video' => $video];

      $rules = ['title' => 'required','video'=> 'required|mimes:mp4,avi,asf,mov,qt,avchd,flv,swf,mpg,mpeg,mpeg-4,wmv,divx,3gp|max:6000'];
$v = Validator::make($data, $rules);
  }

      else{
      $data = ['title' => $title];

      $rules = ['title' => 'required'];
      $v = Validator::make($data, $rules);
      }

      if($v->fails()){
        return Redirect::Back()->withErrors($v);
      }else
      {
        if ($video != '') {
            $destination = 'uploads/videos';
            $video_name = $foreign_name;
            $video_name .= '.'.$video->getClientOriginalExtension();
            $video->move($destination, $video_name);

     $video =Highligh::findOrFail($id);
     $video->title = $title;
     $video->video= $video_name;  
    $video->save();
    return Redirect::back()->with('success' , 'Highligh was Updated successfuly!!');
}
else{
     $video =Highligh::findOrFail($id);
     $video->title = $title;
    $video->save();
	return Redirect::back()->with('success' , 'Highligh was Updated successfuly!!');
}


      }
  
  }
}
