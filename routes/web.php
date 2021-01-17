<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('events', 'EventController');

Route::get('meet/{meetCode}','EventController@meet')->name('meet');

Route::middleware('auth')->group(function () {
	Route::resource('positions', 'Employees\PositionController');
	Route::resource('departments', 'Employees\DepartmentController');
	Route::resource('users', 'Employees\UserController');
  
	Route::resource('news', 'NewsController');
	Route::resource('news_categories', 'NewsCategoriesController')->except('show');
	Route::get('new-slack-messages', 'SlackNotificationsController@check_messages')->name('check_slack_messages');
	Route::get('read-new-slack-messages', 'SlackNotificationsController@read_new_messages')->name('read_new_messages');
});

