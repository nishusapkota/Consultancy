<?php

use App\Models\CourseCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\StudentEnquiryController;

Route::get('/',[SiteController::class, 'index'])->name('index');
Auth::routes();
Route::get('/home', [SiteController::class, 'home'])->name('home')->middleware('auth');

//->middleware('auth','isAdmin')
Route::prefix('/admin')->name('admin.')->group(function(){
    Route::get('/',function () {
        return view('admin.dashboard');
    });
    Route::resource('/blog',BlogController::class);
    Route::resource('/course-category',CourseCategoryController::class);
    Route::resource('/course',CourseController::class);
    Route::resource('/level',LevelController::class);
    Route::resource('/university',UniversityController::class);
    Route::resource('/student-enquiry',StudentEnquiryController::class);
    Route::resource('/user',UserController::class);

});




