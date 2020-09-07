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


Route::group(['middleware' => 'localization'], function() {

    Route::post('/lang', 'LangController@postLang')->name('switch_lang');

    Route::resource('tasks', 'TaskController');

    Route::resource('comments', 'CommentController');
});
