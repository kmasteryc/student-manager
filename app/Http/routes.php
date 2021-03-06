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

Route::post('test', 'TestController@test');

Route::get('test', 'TestController@index')->name('test');

Route::auth();

Route::get('/', 'HomeController@index')->name('index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=>['auth','role:4'], 'as'=>'admin::'], function () {

	Route::group(['prefix' => 'scholastic', 'as' => 'scholastic::'], function () {
		Route::get('/', 'ScholasticController@index')->name('index');
		Route::get('{scholastic}/edit', 'ScholasticController@edit')->name('edit');
		Route::put('{scholastic}', 'ScholasticController@update')->name('update');
		Route::delete('{scholastic}', 'ScholasticController@destroy')->name('destroy');
		Route::get('create', 'ScholasticController@create')->name('create');
		Route::post('/', 'ScholasticController@store')->name('store');
	});

	Route::group(['prefix' => 'semester', 'as' => 'semester::'], function () {
		Route::get('/', 'SemesterController@index')->name('index');
		Route::get('{semester}/edit', 'SemesterController@edit')->name('edit');
		Route::put('{semester}', 'SemesterController@update')->name('update');
		Route::delete('{semester}', 'SemesterController@destroy')->name('destroy');
		Route::get('create', 'SemesterController@create')->name('create');
		Route::post('/', 'SemesterController@store')->name('store');
	});

	Route::group(['prefix' => 'grade', 'as' => 'grade::'], function () {
		Route::get('/', 'GradeController@index')->name('index');
		Route::get('{grade}/edit', 'GradeController@edit')->name('edit');
		Route::put('{grade}', 'GradeController@update')->name('update');
		Route::delete('{grade}', 'GradeController@destroy')->name('destroy');
		Route::get('create', 'GradeController@create')->name('create');
		Route::post('/', 'GradeController@store')->name('store');
	});

	Route::group(['prefix' => 'cl4ss', 'as' => 'cl4ss::'], function () {
		Route::get('/', 'Cl4ssController@index')->name('index');
		Route::get('{cl4ss}/edit', 'Cl4ssController@edit')->name('edit');
		Route::put('{cl4ss}', 'Cl4ssController@update')->name('update');
		Route::delete('{cl4ss}', 'Cl4ssController@destroy')->name('destroy');
		Route::get('create', 'Cl4ssController@create')->name('create');
		Route::post('/', 'Cl4ssController@store')->name('store');
		Route::get('{cl4ss}/add-student', 'Cl4ssController@addStudent')->name('add-student');
		Route::put('{cl4ss}/update-student', 'Cl4ssController@updateStudent')->name('update-student');
	});

	Route::group(['prefix' => 'mark_type', 'as' => 'mark_type::'], function () {
		Route::get('/', 'MarkTypeController@index')->name('index');
		Route::get('{mark_type}/edit', 'MarkTypeController@edit')->name('edit');
		Route::put('{mark_type}', 'MarkTypeController@update')->name('update');
		Route::delete('{mark_type}', 'MarkTypeController@destroy')->name('destroy');
		Route::get('create', 'MarkTypeController@create')->name('create');
		Route::post('/', 'MarkTypeController@store')->name('store');
	});

	Route::group(['prefix' => 'teacher', 'as' => 'teacher::'], function () {
		Route::get('/', 'TeacherController@index')->name('index');
		Route::get('{teacher}/edit', 'TeacherController@edit')->name('edit');
		Route::put('{teacher}', 'TeacherController@update')->name('update');
		Route::delete('{teacher}', 'TeacherController@destroy')->name('destroy');
		Route::get('create', 'TeacherController@create')->name('create');
		Route::post('/', 'TeacherController@store')->name('store');
	});

	Route::group(['prefix' => 'parent', 'as' => 'parent::'], function () {
		Route::get('/', 'ParentController@index')->name('index');
		Route::get('{parent}/edit', 'ParentController@edit')->name('edit');
		Route::put('{parent}', 'ParentController@update')->name('update');
		Route::delete('{parent}', 'ParentController@destroy')->name('destroy');
		Route::get('create', 'ParentController@create')->name('create');
		Route::post('/', 'ParentController@store')->name('store');
	});

	Route::group(['prefix' => 'student', 'as' => 'student::'], function () {
		Route::get('/', 'StudentController@index')->name('index');
		Route::get('{student}/edit', 'StudentController@edit')->name('edit');
		Route::put('{student}', 'StudentController@update')->name('update');
		Route::delete('{student}', 'StudentController@destroy')->name('destroy');
		Route::get('create', 'StudentController@create')->name('create');
		Route::post('/', 'StudentController@store')->name('store');
	});
});

Route::group(['prefix'=>'teacher','namespace'=>'Teacher','middleware'=>['auth','role:3,2'],'as'=>'teacher::'], function(){
	Route::group(['prefix'=>'class', 'as'=>'cl4ss::'], function(){
		Route::get('teaching', 'Cl4ssController@cl4ssCurrent')->name('current');
		Route::get('teached', 'Cl4ssController@cl4ssPast')->name('past');
	});
	Route::group(['prefix'=>'subject', 'as'=>'subject::'], function(){
		Route::get('teaching', 'SubjectController@subjectTeaching')->name('teaching');
		Route::get('teached', 'SubjectController@subjectTeached')->name('teached');
	});
	Route::group(['prefix'=>'mark', 'as'=>'mark::'], function(){
		Route::get('create/{cl4ss_subject}', 'MarkController@create')->name('create');
		Route::post('store/{cl4ss_subject}', 'MarkController@store')->name('store');
	});
});

Route::group(['prefix'=>'parent','namespace'=>'Parent','middleware'=>['auth','role:2'],'as'=>'parent::'], function(){
	Route::group(['prefix'=>'student', 'as'=>'student::'], function(){
		Route::get('/', 'StudentController@index')->name('index');
	});
});

Route::group(['prefix'=>'student','namespace'=>'Student','middleware'=>['auth','role:1'],'as'=>'student::'], function(){
	Route::group(['prefix'=>'subject', 'as'=>'subject::'], function(){
		Route::get('/', 'SubjectController@showCurrent')->name('current');
		Route::get('/all', 'SubjectController@showAll')->name('all');
		Route::get('{scholastic}/{semester?}', 'SubjectController@showOther')->name('showOther');
	});
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');