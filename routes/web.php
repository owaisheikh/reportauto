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

Route::get('/learn', function () {
    return view('learnjquery');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/get-user-reports/{id}', 'ReportController@get_user_reports');

Route::post('/profiless', 'ProfileController@update_avatar');

Route::get('/profiles/settings', 'ProfileController@settings');

Route::get('/search' , 'ReportController@search_person');


Route::resource('/profiles', 'ProfileController');
Route::resource('/reports' , 'ReportController');

