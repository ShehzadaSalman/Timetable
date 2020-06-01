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






Auth::routes();
