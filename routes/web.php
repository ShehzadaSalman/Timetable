<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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
// Main login page
// Route::get('/', 'HomeController@loginPage');
//
Route::get('/', function(){
  $info = DB::table('siteinfo')->get();
  return view('login',['info' => $info ]);

});

// Thses pages would open after user authentication

// Dashboard Page
Route::get('/home', 'HomeController@Dashboard');

// Manage Admins
Route::get('/manage', 'HomeController@ManageAdmin');

// updating the users
Route::post('/updateuser','AjaxController@updateUser');

Route::post('/logoupload', 'AjaxController@logoUpload');

// routes to handle the time table part


// Managing the instructor
Route::get('/instructor', 'HomeController@getInstructor'); // get 
Route::post('/instructor', 'HomeController@saveInstructor'); // create
Route::post('/editinstructor/{id}', 'HomeController@editInstructor'); // edit
Route::get('deleteinstructor/{id}', 'HomeController@deleteInstructor'); // delete

// Managing the Departments
Route::get('/department', 'HomeController@getDepartment'); // get 
Route::post('/department', 'HomeController@saveDepartment'); // create
Route::post('/editdepartment/{id}', 'HomeController@editDepartment'); // edit
Route::get('deletedepartment/{id}', 'HomeController@deleteDepartment'); // delete

// Managing the rooms
Route::get('/room', 'HomeController@getRoom'); // get 
Route::post('/room', 'HomeController@saveRoom'); // create
Route::post('/editroom/{id}', 'HomeController@editRoom'); // edit
Route::get('deleteroom/{id}', 'HomeController@deleteRoom'); // delete

// Managing the semester
Route::get('/semester', 'HomeController@getSemester'); // get 
Route::post('/semester', 'HomeController@saveSemester'); // create
Route::post('/editsemester/{id}', 'HomeController@editSemester'); // edit
Route::get('deletesemester/{id}', 'HomeController@deleteSemester'); // delete


Auth::routes();
