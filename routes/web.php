<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
	//Rounds
Route::get('/addRound', 'RoundController@index')->name('AddRound');
Route::post('/addRound','RoundController@add_round')->name('addRound');
Route::get('/publishRound/{id}','RoundController@publish_round')->name('publishRound');
Route::get('/editround/{id}','RoundController@edit_round')->name('editround');
Route::post('/editround/{id}','RoundController@update_round')->name('updateround');
Route::get('/deleteround/{id}','RoundController@delete_round')->name('deleteround');
//News
Route::get('/addNews','NewsController@index')->name('AddNews');
Route::post('/addNews','NewsController@add_news')->name('addNews');
Route::get('/allNews','NewsController@all_news')->name('allNews');
Route::get('/deletenews/{id}','NewsController@delete_news')->name('deletenews');
Route::get('/deleteimage/{id}','NewsController@delete_image')->name('deleteimage');
Route::get('/publishnews/{id}','NewsController@publish_news')->name('publishnews');
Route::get('/viewnews/{id}','NewsController@view_news')->name('viewnews');
Route::post('/viewnews/{id}','NewsController@update_news')->name('viewNews');
//Groupes
Route::get('/addGroup','GroupeController@index')->name('addgroup');
Route::post('/addGroup','GroupeController@add_group')->name('AddGroup');
Route::get('/viewgroup/{id}','GroupeController@view_group')->name('viewgroup');
Route::post('/viewgroup/{id}','GroupeController@update_group')->name('updategroup');
Route::get('/deletegroup/{id}','GroupeController@delete_group')->name('deletegroup');
Route::get('/publishgroup/{id}','GroupeController@publish_group')->name('publishgroup');
//Teams
Route::get('/addTeam','TeamController@index')->name('addteam');
Route::post('/addTeam','TeamController@add_team')->name('AddTeam');
Route::get('/allTeams','TeamController@all_Teams')->name('allTeams');
Route::get('/deleteteam/{id}','TeamController@delete_team')->name('deleteteam');
Route::get('/publishteam/{id}','TeamController@publish_team')->name('publishteam');
Route::get('/viewteam/{id}','TeamController@view_team')->name('updateteam');
Route::post('/viewteam/{id}','TeamController@update_team')->name('updateTeam');
Route::get('/test','TeamController@test')->name('test');
//GroupesTeams
Route::get('/addGrTeam','GroupeTeamController@index')->name('addGrTeam');
Route::post('/addGrTeam','GroupeTeamController@add_GrTeam')->name('AddGrTeam');
Route::get('/viewdetails','GroupeTeamController@viewdetails')->name('viewdetails');
Route::get('/searchGroupe/{id}','GroupeTeamController@search_group')->name('searchGroupe');
Route::get('/searchTeam/{id}','GroupeTeamController@search_team')->name('searchTeam');
Route::get('/deleteTeamGroupe/{id}','GroupeTeamController@delete_teamgroupe')->name('deleteTeamGroupe');
//Matches
Route::get('/addMatch','MatchController@index')->name('addmatch');
Route::post('/showTeams','MatchController@show_teams')->name('show_teams');
Route::post('/addMatch','MatchController@add_match')->name('Addmatch');
Route::get('/viewmatches/{id}','MatchController@view_matches')->name('viewmatches');
Route::get('/deleteMatch/{id}','MatchController@delete_match')->name('deleteMatch');
Route::get('/viewmatch/{id}','MatchController@view_match')->name('viewmatch');
Route::post('/viewmatch/{id}','MatchController@update_match')->name('Viewmatch');
//highligh
Route::get('/addvideo','HighlighController@index')->name('addvideo');
Route::post('/addvideo', 'HighlighController@videos_save')->name('AddVideo');
Route::get('/allvideos','HighlighController@all_videos')->name('allvideos');
Route::get('/viewvideo/{id}','HighlighController@view_video')->name('viewvideo');
Route::post('/viewvideo/{id}','HighlighController@update_video')->name('viewVideo');
Route::get('/deletevideo/{id}','HighlighController@delete_video')->name('deletevideo');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
