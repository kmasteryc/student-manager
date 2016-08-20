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

Route::post('test1', 'TestController@test1');
Route::post('test2', 'TestController@test2');

Route::get('test','TestController@index');

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

Route::group(['prefix'=>'cl4ss', 'as'=>'cl4ss::'], function(){
    Route::get('/', 'Cl4ssController@index')->name('index');

    Route::get('{cl4ss}/edit', 'Cl4ssController@edit')->name('edit');
    Route::put('{cl4ss}', 'Cl4ssController@update')->name('update');

    Route::delete('{cl4ss}', 'Cl4ssController@destroy')->name('destroy');

    Route::get('create', 'Cl4ssController@create')->name('create');
    Route::post('/', 'Cl4ssController@store')->name('store');

    Route::get('{cl4ss}/add-student', 'Cl4ssController@addStudent')->name('add-student');
    Route::put('{cl4ss}/update-student', 'Cl4ssController@updateStudent')->name('update-student');
});

Route::group(['prefix'=>'mark_type', 'as'=> 'mark_type::'], function(){
    Route::get('/', 'MarkTypeController@index')->name('index');

    Route::get('{mark_type}/edit', 'MarkTypeController@edit')->name('edit');
    Route::put('{mark_type}', 'MarkTypeController@update')->name('update');

    Route::delete('{mark_type}', 'MarkTypeController@destroy')->name('destroy');

    Route::get('create', 'MarkTypeController@create')->name('create');
    Route::post('/', 'MarkTypeController@store')->name('store');
});
