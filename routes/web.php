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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/studenthome', 'StudentHomeController@index')->name('student_home');
Route::get('/student/login', 'Auth\StudentLoginController@showLoginForm')->name('student_login');
Route::post('/student/login', 'Auth\StudentLoginController@login')->name('student_login');


Route::get('/shift','ShiftController@index'); 
Route::post('/shift','ShiftController@store'); 
Route::delete('/shift/{id}','ShiftController@destroy'); 


Route::get('/section','SectionController@index'); 
Route::post('/section','SectionController@store'); 
Route::delete('/section/{id}','SectionController@destroy'); 


Route::get('/class','ClassController@index'); 
Route::post('/class','ClassController@storee'); 
 Route::delete('/class/{class}','ClassController@destroy');

 Route::get('/student','StudentController@index'); 
Route::post('/student','StudentController@store'); 
Route::get('/student/{student}','StudentController@show'); 
Route::get('/student/{student}/{class}','StudentController@class_student');


 Route::delete('/student/{student}','StudentController@destroy');

  Route::get('/subject/{subject}','SubjectController@index'); 
Route::post('/subject','SubjectController@store'); 
Route::delete('/subject/{subject}','SubjectController@destroy'); 
 

Route::get('/test',function(){
	return view('test');
});

Route::get('/search','StudentController@index');




 Route::get('/exam','ExamController@index'); 
 Route::post('/exam','ExamController@store'); 
  Route::get('/exam/{exam}','ExamController@marks_sheet'); 
 Route::get('/exam/{exam}/{class}','ExamController@show');
Route::post('/marks/{class}','ExamController@mark');
Route::post('/marks','ExamController@student_marks');
 Route::post('/exam/{exam}/{student}','ExamController@student_mark'); 
 Route::get('/view_result/{exam}/{student}','ExamController@view_result');
