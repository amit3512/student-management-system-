<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::group(['middleware'=>['auth']],function(){
	 Route::get('/', 'LandingController@index');
	  Route::group(['middleware'=>['web']],function(){
        Route::get('/dashboard', 'adminsController@index')->name('admin.dashboard');;
	 });
});


Route::get('/home', 'HomeController@index')->middleware(['web','auth']);
Route::get('/admin-panel', 'adminController@index')->middleware(['web','auth']);

Route::get('/users', 'UsersController@index')->middleware(['web','auth']);
Route::get('/users/create', 'UsersController@create')->middleware(['web','auth']);
Route::post('/users/store', 'UsersController@store')->middleware(['web','auth']);
Route::get('/users/edit/{id}', 'UsersController@edit')->middleware(['web','auth']);
Route::get('/users/{id}', 'UsersController@show')->middleware(['web','auth']);
Route::put('/users/{id}', 'UsersController@update')->middleware(['web','auth']);
Route::delete('/users/{id}', 'UsersController@destroy')->middleware(['web','auth']);

Route::get('/roles', 'RolesController@index')->middleware(['web','auth']);
Route::get('/roles/{id}', 'RolesController@show')->middleware(['web','auth']);
Route::get('/profile', 'ProfileController@show')->middleware(['web','auth']);


// frontEndController for user

Route::get('/front','frontEndController@index')->name('frontEnd.home');
Route::get('/noticeboard/{id}','frontEndController@viewnotice')->name('view.notice');
Route::get('/noticeboard','frontEndController@notice')->name('frontEnd.notice');
Route::get('/teachers','frontEndController@teachers')->name('frontEnd.teachers');
Route::get('/contact','frontEndController@contact')->name('frontEnd.contact');
Route::get('/about','frontEndController@about')->name('frontEnd.about');


// adminsController for admin panel

Route::get('/dashboard', 'adminsController@index')->middleware(['web','auth'])->name('admin.dashboard');
Route::get('/class-Schedule', 'adminsController@classSchedule')->name('admin.classSchedule');
Route::get('/logins', 'adminAuthController@showLogin')->name('admin.login');
Route::post('/logins', 'adminAuthController@login')->name('admin.login');
Route::get('/logouts', 'adminAuthController@logout')->name('admin.logout');




Route::get('/assignment', 'adminsController@assignment')->name('admin.assignment');
Route::get('/examlist', 'adminsController@examlist')->name('admin.examList');


// Student Attendance system

Route::get('/attendance', 'adminsController@attend')->name('admin.attendance');
Route::post('/attendance', 'adminsController@attendList')->name('admin.attendance');
Route::post('/save-attendacne', 'adminsController@saveAttendance')->name('admin.save.attendance');


// adminsController for library 
Route::get('/library', 'adminsController@library')->name('admin.library');
Route::get('/library/add', 'adminsController@libraryAdd')->name('admin.library.add');
Route::post('/library/added', 'adminsController@libraryAdded')->name('admin.library.added');
Route::get('/library/edit/{id}', 'adminsController@libraryEdit')->name('admin.library.edit');
Route::post('/library/update/{id}', 'adminsController@libraryUpdate')->name('admin.library.update');
Route::delete('/library/delete/{id}', 'adminsController@libraryDelete')->name('admin.library.delete');
Route::get('/library/cal', 'adminsController@calLibrary')->name('admin.library.cal');


// adminsController for student 
Route::get('/student', 'adminsController@students')->name('admin.students');
Route::get('/student/add', 'adminsController@studentAdd')->name('admin.student.add');
Route::post('/student/add', 'adminsController@studentAdded')->name('admin.student.add');
Route::get('/student/details/{id}', 'adminsController@studentDetails')->name('admin.student.details');
Route::get('/student/edit/{id}', 'adminsController@studentEdit')->name('admin.student.edit');
Route::post('/student/update/{id}', 'adminsController@studentUpdate')->name('admin.student.update');
Route::delete('/studentr/delete/{id}', 'adminsController@studentDelete')->name('admin.student.delete');

Route::get('/student/cal', 'adminsController@studentCal')->name('admin.student.cal');



// adminsController for teacher 
Route::get('/teacher', 'adminsController@teachers')->name('admin.teachers');
Route::get('/teacher/add', 'adminsController@teacherAdd')->name('admin.teacher.add');
Route::post('/teacher/add', 'adminsController@teacherAdded')->name('admin.teacher.add');
Route::get('/teacher/details/{id}', 'adminsController@teacherDetails')->name('admin.teacher.details');
Route::get('/teacher/edit/{id}', 'adminsController@teacherEdit')->name('admin.teacher.edit');
Route::post('/teacher/update/{id}', 'adminsController@teacherUpdate')->name('admin.teacher.update');
Route::delete('/teacher/delete/{id}', 'adminsController@teacherDelete')->name('admin.teacher.delete');
Route::get('/teacher/cal', 'adminsController@calTeacher')->name('admin.tecacher.cal');


// adminsController for class 
Route::get('/classlist', 'adminsController@classList')->name('admin.class');
Route::get('/class-details/{id}', 'adminsController@classDetails')->name('admin.class.details');
Route::get('/class/add', 'adminsController@classAdd')->name('admin.class.add');
Route::post('/class/add', 'adminsController@classAdded')->name('admin.class.add');
Route::get('/class/edit/{id}', 'adminsController@classEdit')->name('admin.class.edit');
Route::post('/class/update/{id}', 'adminsController@classUpdate')->name('admin.class.update');
Route::delete('/class/delete/{id}','adminsController@classDelete')->name('admin.class.delete');


Route::get('/notice/cal', 'NoticeController@calNotice')->name('notice.cal');


// Resource Controller 

Route::resource('course', 'CourseController');
Route::resources([
    'course' => 'CourseController',
    'notice' => 'NoticeController'
]);

Route::get('{class}', 'ClassController@index')->name('class.list');
Route::get('/student/cals', 'ClassController@studentCal')->name('admin.student.cals');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
