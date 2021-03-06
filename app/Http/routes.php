<?php

Route::group(['middleware' => ['web']], function () {

    Route::get('profile', 'UserController@profile');
    Route::post('profile', 'UserController@update_avatar');

    //Routes for Menu

    Route::get('laman-utama-pentadbir', 'AdminController@index');

//    Route::get('laman-utama-guru', function () {
//        return view('guru.laman_utama_guru');
//    });
    Route::get('laman-utama-guru', 'TeacherController@laman_utama');

//    Route::get('laman-utama-pelajar', function () {
//        return view('pelajar.laman_utama_pelajar');
//    });
    Route::get('laman-utama-pelajar', 'StudentController@laman_utama');

//    Route::get('laman-utama-ibubapa', function () {
//        return view('ibubapa.laman_utama_ibubapa');
//    });
    Route::get('laman-utama-ibubapa', 'CaretakerController@index');

//    Route::get('/laman-utama', function () {
//        return view('pentadbir.laman_utama_pentadbir');
//    })->name('laman-utama-pentadbir');

//    Route::get('/daftar-kelas-subjek', function () {
//        return view('pentadbir.daftar_kelas_subjek');
//    })->name('daftar-kelas-subjek');

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
    Route::get('senarai-kedatangan', 'AttendanceController@index2');

    Route::resource('studentoffense', 'StudentOffenseController');
    
    Route::resource('classsubjectexam', 'ClassSubjectExamController');
    Route::post('addexammarks',[ 'as' => 'addexammarks', 'uses' => 'ClassSubjectExamController@store2']);

    Route::resource('CaretakerStudentTask', 'CaretakerStudentTaskController');
    Route::post('StudentTaskAll',[ 'as' => 'StudentTaskAll', 'uses' => 'CaretakerStudentTaskController@index']);
    Route::post('SubjectTaskAll',[ 'as' => 'SubjectTaskAll', 'uses' => 'CaretakerStudentTaskController@index2']);
    Route::get('StudentTaskMark',[ 'as' => 'StudentTaskMark', 'uses' => 'CaretakerStudentTaskController@pilihstudent']);
    Route::post('StudentTaskMarkAll',[ 'as' => 'StudentTaskMarkAll', 'uses' => 'CaretakerStudentTaskController@allstudentmark']);
    Route::post('TaskMarkGraf',[ 'as' => 'TaskMarkGraf', 'uses' => 'CaretakerStudentTaskController@taskGraf']);

    Route::resource('CaretakerStudentDiscipline', 'CaretakerStudentDisciplineController');
    Route::post('StudentDiscipline',[ 'as' => 'StudentDiscipline', 'uses' => 'CaretakerStudentDisciplineController@pelajar']);

    Route::resource('CaretakerStudentAttendance', 'CaretakerStudentAttendanceController');
    Route::post('StudentAttendance',[ 'as' => 'StudentAttendance', 'uses' => 'CaretakerStudentAttendanceController@pelajar']);

    Route::resource('CaretakerStudentNews', 'CaretakerStudentNewsController');

    Route::resource('CaretakerStudentExam', 'CaretakerStudentExamController');
    Route::post('CaretakerStudentExamDetails',[ 'as' => 'CaretakerStudentExamDetails', 'uses' => 'CaretakerStudentExamController@DetailsExam']);

    Route::resource('StudentTaskView', 'StudentTaskViewController');
    Route::post('SubjekTaskMarks',[ 'as' => 'SubjekTaskMarks', 'uses' => 'StudentTaskViewController@SubjekTaskMarks']);

    Route::resource('StudentExamResult', 'StudentExamResultController');
    Route::post('StudentExamResultDetails',[ 'as' => 'StudentExamResultDetails', 'uses' => 'StudentExamResultController@DetailsExam']);

    Route::resource('caretaker', 'CaretakerController');
    Route::get('CaretakerProfil', 'CaretakerController@edit'); //Controller Edit
    Route::get('CaretakerPassword', 'CaretakerController@password'); //Controller Edit
    Route::put('CaretakerPasswordUpdate', 'CaretakerController@updatepassword'); //Controller Edit
//    Route::get('CaretakerPasswordUpdate/{id}',[ 'as' => 'delete-news', 'uses' => 'NewsController@destroy']);

    Route::resource('StudentProfile', 'StudentProfileController');
    Route::get('StudentProfileEdit', 'StudentProfileController@edit');
    Route::get('StudentProfilePassword', 'StudentProfileController@password');
    Route::put('StudentProfilePasswordUpdate', 'StudentProfileController@updatepassword');

    Route::resource('TeacherProfile', 'TeacherProfileController');
    Route::get('TeacherProfileEdit', 'TeacherProfileController@edit');
    Route::get('TeacherProfilePassword', 'TeacherProfileController@password');
    Route::put('TeacherProfilePasswordUpdate', 'TeacherProfileController@updatepassword');

    Route::resource('AdminProfile', 'AdminProfileController');
    Route::get('AdminProfileEdit', 'AdminProfileController@edit');
    //Route::put('AdminProfileUpdate', 'AdminProfileController@update');
    Route::get('AdminProfilePassword', 'AdminProfileController@password');
    Route::put('AdminProfilePasswordUpdate', 'AdminProfileController@updatepassword');









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
