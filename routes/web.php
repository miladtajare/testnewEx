<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\ClassRoomController;
use App\Http\Controllers\dashboard\CourseController;
use App\Http\Controllers\dashboard\StudentController;
use App\Http\Controllers\dashboard\ScoreController;

use App\Http\Controllers\MainController;


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
Auth::routes();


Route::resource('/', MainController::class );


Route::group( [ 'middleware' => ['auth','can:show-teacher-manager'] ] ,function(){

    //Panel
    Route::get('/Panel', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //user
    Route::resource('user', UserController::class);

    //classRoom
    Route::resource('classRoom', ClassRoomController::class);

    //course
    Route::resource('course', CourseController::class);

    //course
    Route::resource('score', ScoreController::class);

    //register_student_to_class
    Route::post('/register_student_to_class',[StudentController::class , 'register_student_to_class'])->withoutMiddleware('can:show-teacher-manager');

});


