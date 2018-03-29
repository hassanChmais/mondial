<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Validator;
use\App\Neww;
use\App\Galery;

class NewsController extends Controller
{
    //
    public function index(){
    	return view('newsFeed.index');
    }
    public function add_news(Request $r){
    	$title=$r->input('title');
    	$desc=$r->input('description');
    	$files = $r->file('attachments');

    	      $data = ['title' => $title,'description'=> $desc,'attachments' => $files];

      $rules = ['title' => 'required' ,'description' => 'required','attachments'=> 'required'];

      $v = Validator::make($data, $rules);

      if($v->fails()){
        return Redirect::Back()->withErrors($v)->withInput();
      }
      else{
      	       if ($files[0] != '') {
        $image_name = array();
        foreach($files as $file) {
         $ran = mt_rand(111111,999999);
         $destinationPath = 'uploads/news';
         $filename = $file->getClientOriginalExtension();
         $filename_r =$ran.'.'.$filename;
         $image_name[] = $filename_r;
         $file->move($destinationPath, $filename_r);
       }
     }//end if
     $news = new Neww();
     $news->title = $title;
     $news->description = $desc ;
     $news->image_url_original =  $image_name[0];
     $news->image_http = " ";
     $news->status = 0 ;
     $news->save();
      for($i=0;$i<count($image_name);$i++){
      $gallery = new Galery();
      $gallery->news_id= $news->id;
      $gallery->img_name = $image_name[$i];
      $gallery->save();
    }

    return Redirect::back()->with('success', 'New News successfuly created');

    }
    }//end add news

    public function all_news(){
    	$news = Neww::orderBy('id','Desc')->paginate(12);
    	return view('newsFeed.all_news',compact('news'));
    }
    public function delete_news($id){
    	  	    $news = Neww::findOrFail($id);
    	  	    $gallery=Galery::where('news_id','=',$id)->get();
    	  	    $news->delete();
    	  	            	foreach ($gallery as $g) {

        		@unlink("uploads/news/".$g->img_name);
        	}
/*        Neww::deleting(function($news){
        	//$news->gallery()->detach();
});*/
    return Redirect::back()->with('success' , 'News was Deleted successfuly!!');
    }

        public function publish_news($id)
    {

     $news = Neww::findOrFail($id);
     if($news->status == '0')
     {
       $news->status = '1';
       $news->save();
       return Redirect::Back()->with('success', 'This News Feed is Published');
     }
     else{
      $news->status = '0';
      $news->save();
      return Redirect::Back()->with('success', 'This News Feed is Unpublished');
    }
  }

  public function view_news($id){
  	$news = Neww::findOrFail($id);
  	$gallery=Galery::where('news_id','=',$id)->get();
  	return view('newsFeed.view_news',compact('news','gallery'));
  }
  public function update_news(Request $r,$id){
  	    	$title=$r->input('title');
    	$desc=$r->input('description');
    	$files = $r->file('attachments');
    $data = ['title' => $title,'description'=> $desc];

     $rules = ['title' => 'required' ,'description' => 'required'];

      $v = Validator::make($data, $rules);

      if($v->fails()){
        return Redirect::Back()->withErrors($v)->withInput();
      }else{

      	      	       if ($files[0] != '') {
        $image_name = array();
        foreach($files as $file) {
         $ran = mt_rand(111111,999999);
         $destinationPath = 'uploads/news';
         $filename = $file->getClientOriginalExtension();
         $filename_r =$ran.'.'.$filename;
         $image_name[] = $filename_r;
         $file->move($destinationPath, $filename_r);
       }
     $news=Neww::findOrFail($id);
     $news->title = $title;
     $news->description = $desc ;
     $news->image_url_original =  $image_name[0];
     $news->image_http = " ";
     $news->status = 0 ;
     $news->save();
      for($i=0;$i<count($image_name);$i++){
      $gallery = new Galery();
      $gallery->news_id= $news->id;
      $gallery->img_name = $image_name[$i];
      $gallery->save();
     }//end for
    }//end if
else{
	  $count_gallery=Galery::where('news_id','=',$id)->count();
  if($count_gallery == 0){
  	return Redirect::back()->withErrors('You must enter images!!');
  }else{
	     $news=Neww::findOrFail($id);
     $news->title = $title;
     $news->description = $desc ;
     $news->save();}
}
    return Redirect::back()->with('success', 'News successfuly updated');

      }
  }
  public function delete_image($id){
  	$gallery=Galery::findOrFail($id);
  	$gallery->delete();
  	@unlink("uploads/news/".$gallery->img_name);
  	return Redirect::back()->with('success' , 'Image was Deleted successfuly!!');
  }
}
