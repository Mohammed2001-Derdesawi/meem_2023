<?php

use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\Course\CourseController;

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


Route::prefix('course')->name('course.')->group(function () {
    
    Route::get('free' , [CourseController::class , 'getFreeCourses'])->name('free');

});
