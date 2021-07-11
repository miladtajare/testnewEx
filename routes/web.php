<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\ClassRoomController;
use App\Http\Controllers\dashboard\CourseController;
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

Route::get('/', function () {  return view('welcome');  });
Auth::routes();


Route::get('/Panel', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//user
Route::resource('user', UserController::class);

//classRoom
Route::resource('classRoom', ClassRoomController::class);

//course
Route::resource('course', CourseController::class);