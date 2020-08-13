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

// Route::get('/question','QuestionsController@index');
// Route::get('/question/create','QuestionsController@create');
// Route::post('/question','QuestionsController@store');
// Route::get('/question/{question_id}','QuestionsController@show');
// Route::get('/question/{question_id}/edit','QuestionsController@edit');
// Route::put('/question/{question_id}','QuestionsController@update');
// Route::delete('/question/{question_id}','QuestionsController@destroy');

Route::resource('question','QuestionsController');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
