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

Route::get('/', 'QuestionsController@index')->name('questions.index');

Route::get('/questions/{id}/{any?}', 'QuestionsController@show')->name('questions.show')->where('any', '.*');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/new', 'QuestionsController@new')->name('questions.new');

    Route::post('/questions/{id}/delete', 'QuestionsController@destroy')->name('questions.delete');

    Route::post('/questions/new', 'QuestionsController@create')->name('questions.create');

    Route::get('/mypage', 'QuestionsController@mypage')->name('mypage');
});
