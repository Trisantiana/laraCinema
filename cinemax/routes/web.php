<?php

use App\User;

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



Auth::routes();


Route::group(['middleware' => 'web', 'auth'], function() {
	Route::get('/', function () {
    return view('welcome');
	});
	
	Route::get('/home', function(){
		if(Auth::user()->role == 'user') {
			return view('home');
		} else {
			$users = User::all();
			return view('admin');
		}
	});
});

Route::post('/search', 'ScheduleController@search')->name('search');
Route::get('/user', 'ScheduleController@user')->name('user');
Route::resource('/branch', 'BranchController');
Route::get('/branch', 'BranchController@index')->name('branch.branch');
Route::get('/branch/add', 'BranchController@create')->name('branch.add');
Route::resource('/movie', 'MovieController');
Route::get('/movie', 'MovieController@index')->name('movie.movie');
Route::resource('/schedule', 'ScheduleController');
Route::get('/schedule', 'ScheduleController@index')->name('schedule.schedule');
Route::resource('/studio', 'StudioController');
Route::get('/studio', 'StudioController@index')->name('studio.studio');

