<?php

use App\Models\CourseCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\LevelController;

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

});




