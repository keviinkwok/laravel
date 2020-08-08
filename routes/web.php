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

Route::get('/', 'HomeController@index');
Route::get('/data', 'DataTableController@index');

Route::get('/question','QuestionsController@index');
Route::get('/question/create','QuestionsController@create');
Route::post('/question','QuestionsController@store');
Route::get('/question/{question_id}','QuestionsController@show');
Route::get('/question/{question_id}/edit','QuestionsController@edit');
Route::put('/question/{question_id}','QuestionsController@update');
Route::delete('/question/{question_id}','QuestionsController@destroy');

