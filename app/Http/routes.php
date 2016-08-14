<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::auth();

Route::group(['prefix'=>'scholastic', 'as'=>'scholastic::'], function(){
    Route::get('/', 'ScholasticController@index')->name('index');

    Route::get('{scholastic}/edit', 'ScholasticController@edit')->name('edit');
    Route::put('{scholastic}', 'ScholasticController@update')->name('update');

    Route::delete('{scholastic}', 'ScholasticController@destroy')->name('destroy');

    Route::get('create', 'ScholasticController@create')->name('create');
    Route::post('/', 'ScholasticController@store')->name('store');
});

Route::group(['prefix'=>'semester', 'as'=>'semester::'], function(){
    Route::get('/', 'SemesterController@index')->name('index');

    Route::get('{semester}/edit', 'SemesterController@edit')->name('edit');
    Route::put('{semester}', 'SemesterController@update')->name('update');

    Route::delete('{semester}', 'SemesterController@destroy')->name('destroy');

    Route::get('create', 'SemesterController@create')->name('create');
    Route::post('/', 'SemesterController@store')->name('store');
});

Route::group(['prefix'=>'grade', 'as'=>'grade::'], function(){
    Route::get('/', 'GradeController@index')->name('index');

    Route::get('{grade}/edit', 'GradeController@edit')->name('edit');
    Route::put('{grade}', 'GradeController@update')->name('update');

    Route::delete('{grade}', 'GradeController@destroy')->name('destroy');

    Route::get('create', 'GradeController@create')->name('create');
    Route::post('/', 'GradeController@store')->name('store');
});

