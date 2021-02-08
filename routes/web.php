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
})->name('index'); //Nacin imenovanja route-a

Route::get('/about', 'App\Http\Controllers\PageController@about')->name('about');

Route::get('/contact', 'App\Http\Controllers\PageController@contact')->name('contact');

Route::get('/contact', 'App\Http\Controllers\PageController@submitContact');

Route::resource('questions', 'App\Http\Controllers\QuestionController');

Route::resource('answers', 'App\Http\Controllers\AnswerController', ['except'=>['index', 'create','show']]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
