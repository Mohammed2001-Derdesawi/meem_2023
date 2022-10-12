<?php
use Illuminate\Support\Facades\Route;
use Modules\Course\Http\Controllers\Category\CategoryController;
use Modules\Student\Entities\Student\Student;
use Modules\Student\Http\Controllers\Authentication\AuthController;
use Modules\Student\Http\Controllers\Cart\CartController;
use Modules\Student\Http\Controllers\Student\StudentController;

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



Route::prefix('student')->name('student.')->group(function () {
    
    // Begin::Routes with Authentication
    Route::middleware('student')->group(function () {

        // Begin::Routes Cart
        Route::get('add-to-cart/{id}' , [CartController::class , 'store'])->name('AddToCart');
        Route::get('delete-from-cart/{id}' , [CartController::class , 'delete'])->name('DeleteFromCart');
        // End::Routes Cart

        // Begin::Routes Student
        Route::get('get_Mycourses' , [StudentController::class , 'getMyCourses'])->name('getMyCourses');
        // End::Routes Student

        // Begin::Routes Categories
        Route::get('categories' , [CategoryController::class , 'categories'])->name('categories');
        Route::get('category/{id}/courses' , [CategoryController::class , 'getCourses'])->name('getCourses');
        // End::Routes Categories
        
    });
    // End::Routes with Authentication



    // *****************************************************************************************



    // Begin::Routes without Authentication
    
    Route::get('login', [AuthController::class , 'ShowLogin'])->name('ShowLogin');
    Route::post('login', [AuthController::class , 'login'])->name('login');
    Route::get('register', [AuthController::class , 'ShowRegister'])->name('ShowRegister');
    Route::post('register', [AuthController::class , 'register'])->name('register');
    Route::post('logout', [AuthController::class , 'logout'])->name('logout');

    // End::Routes without Authentication

    Route::get('cart' , [CartController::class , 'show'])->name('showCart');

});
