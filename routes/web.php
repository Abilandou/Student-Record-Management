<?php
// use Symfony\Component\Routing\Annotation\Route;

// use Illuminate\Support\Facades\Route;

// use Illuminate\Support\Facades\Route;

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
    return view('beforeauth.login');
});

Route::get('teacher-register', 'UserController@register');
Route::get('teacher-login', 'UserController@login');
Route::match(['get', 'post'] ,'/admin', 'AdminController@adminLogin');

//Authentication Routes
// Route::group(['middleware' => ['auth']], function () {
//     Route::get('dashboard', 'UserController@dashboard');
// });

// Route::get('dashboard', 'UserController@dashboard');

//Main Administrator's Route.
Route::group(['middleware' => ['principal']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('dashboard', 'AdminController@dashboard');
        Route::match(['get', 'post'] ,'/register', 'AdminController@adminRegister');

        //Class Routes
        Route::resource('classes', 'StudentClassController');

        //Student Routes
        Route::resource('students', 'StudentController');

        //Administrator logout
        Route::get('/logout', 'AdminController@logout');

        //Display students based on their class
        Route::post('student-class', 'StudentController@class_student_search');

        //Subjects Route
        Route::resource('subjects', 'SubjectController');

        //Teachers Route
        Route::resource('teachers', 'TeacherController');
        Route::post('assign-subject/', 'SubjectTeacherController@assignSubjects');
        Route::post('assign-class/', 'SubjectTeacherController@assignClasses');
        Route::post('class-assign-subject/', 'ClassSubjectController@assignSubjects');
        Route::get('remove-class/{id}', 'SubjectTeacherController@removeClass');
        Route::get('remove-subject/{id}', 'SubjectTeacherController@removeSubject');
        Route::get('class-remove-subject/{id}', 'ClassSubjectController@removeSubject');
        Route::post('student-assign-subject/', 'StudentSubjectController@assignSubjects');
        Route::get('student-remove-subject/{id}', 'StudentSubjectController@removeSubject');
        Route::resource('terms', 'TermController');
        Route::resource('sequences', 'SequenceController');
    });

});

Route::group(['middleware' => ['teacher']], function () {
    Route::get('/mydashboard', 'UserController@userDashboard')->name('mydashboard');

});


// Auth::routes();

