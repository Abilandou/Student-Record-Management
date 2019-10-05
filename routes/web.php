<?php
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
    });

});

Route::group(['middleware' => ['teacher']], function () {
    Route::get('/mydashboard', 'UserController@userDashboard')->name('mydashboard');

});


// Auth::routes();

