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

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::post('slack-message', 'HomeController@send_slack_message')->name('slack_message_send');

//http://mdo.spacep.space/incoming-notifications

//CCVakjSala0nFaCIsnKjPqLv

Route::post('incoming-notifications', 'HomeController@receive_messages')