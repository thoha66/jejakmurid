<?php

Route::group(['middleware' => ['web']], function () {

    //Routes for Menu
    Route::get('/', function () {
        return view('pentadbir.laman_utama_pentadbir');
    });

    Route::get('/laman-utama', function () {
        return view('pentadbir.laman_utama_pentadbir');
    })->name('laman-utama');

    Route::get('/daftar-kelas-subjek', function () {
        return view('pentadbir.daftar_kelas_subjek');
    })->name('daftar-kelas-subjek');

    //Routes for Admins
    Route::resource('admin', 'AdminController');
    Route::resource('news', 'NewsController');
    Route::resource('teacher', 'TeacherController');
    Route::resource('student', 'StudentController');
    Route::resource('subject', 'SubjectController');
    Route::resource('classroom', 'ClassroomController');
    Route::resource('classroomsubject', 'ClassroomSubjectController');
    Route::resource('task', 'TaskController');

    Route::resource('taskmark', 'TaskMarkController');
    Route::get('addmark/{id}',[ 'as' => 'addmark', 'uses' => 'TaskMarkController@addmark']);

    Route::resource('attendance', 'AttendanceController');
    Route::post('addattendance', 'AttendanceController@addattendance'); //Controller addattendance




//    Route::get('news/{id}',[ 'as' => 'delete-news', 'uses' => 'NewsController@destroy']);
//    Route::get('payment-belum-sah', 'PayZakatController@index2'); //Controller Index
//    Route::get('payment-belum-sah', 'PayZakatController@index2'); //Controller Create
//    Route::get('payment-belum-sah', 'PayZakatController@index2'); //Controller Store
//    Route::get('payment-belum-sah', 'PayZakatController@index2'); //Controller Show
//    Route::get('payment-belum-sah', 'PayZakatController@index2'); //Controller Edit
//    Route::get('payment-belum-sah', 'PayZakatController@index2'); //Controller Update
//    Route::get('payment-belum-sah', 'PayZakatController@index2'); //Controller Destroy


});

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

Route::get('/home', 'HomeController@index');
