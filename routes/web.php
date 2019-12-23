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

//Route::get('/', function () {
//    $exams = \App\User::find(3)->subjects()->where('name', 'like', '%o%')->with('exams')->get();
//    return $exams;
//});

// Login
use App\Exam;

Route::get('/', 'AuthController@index');
Route::post('login', 'AuthController@postLogin');
Route::get('register', 'AuthController@registration');
Route::post('register', 'AuthController@postRegistration');
Route::get('logout', 'AuthController@logout');

// Admin exam
Route::get('admin/exams', ['uses' => 'ExamController@index', 'middleware' => 'roles', 'roles' => 'admin']);
Route::post('exams', 'ExamController@store');
Route::get('exams/{id}', 'ExamController@show');
Route::put('exams/{id}/edit', 'ExamController@update');
Route::delete('exams/{id}', 'ExamController@destroy');

// Admin subject
Route::get('admin/subjects', ['uses' => 'SubjectController@index', 'middleware' => 'roles', 'roles' => 'admin']);
Route::post('subjects', 'SubjectController@store');
Route::get('subjects/{id}', 'SubjectController@show');
Route::put('subjects/{id}/edit', 'SubjectController@update');
Route::delete('subjects/{id}', 'SubjectController@destroy');

// Admin user
Route::get('admin/users', ['uses' => 'UserController@index', 'middleware' => 'roles', 'roles' => 'admin']);
Route::post('users', 'UserController@store');
Route::get('users/{id}', 'UserController@show');
Route::put('users/{id}/edit', 'UserController@update');
Route::delete('users/{id}', 'UserController@destroy');

// Admin view
Route::get('admin', ['uses' => 'AdminController@index', 'middleware' => 'roles', 'roles' => 'admin']);

// Register
Route::get('registration', ['uses' => 'RegistrationController@index', 'middleware' => 'roles', 'roles' => 'student']);
Route::post('registration', 'RegistrationController@registration');
Route::get('subject-register', 'RegistrationController@subjectRegister');
Route::delete('registration', 'RegistrationController@registrationDelete');
// Search
Route::post('search', 'RegistrationController@searchResign');
Route::get('check-quantity/{examId}', 'RegistrationController@checkQuantity');

//Export
Route::get('export', 'AppController@export');
Route::get('admin/export', 'AdminController@exportListExam');
Route::get('admin/{examId}/export', 'AdminController@exportExam');
//Route::get('data', function () {
//    $quantity = Exam::find(1)->users()->count();
//    return $quantity;
//});
