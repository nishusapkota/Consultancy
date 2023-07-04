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
Route::get('/courses',[SiteController::class, 'courses'])->name('courses');
Route::get('/course-details',[SiteController::class, 'courseDetail'])->name('course-detail');

Route::get('/colleges',[SiteController::class, 'colleges'])->name('college');
Route::get('/college-details',[SiteController::class, 'collegeDetail'])->name('college-detail');

Route::get('/blogs',[SiteController::class, 'blog'])->name('blog');
Route::get('/blog-details',[SiteController::class, 'blogDetail'])->name('blog-detail');

Route::get('/contacts',[SiteController::class, 'contact'])->name('contact');
Route::get('/apply',[SiteController::class, 'applyNow'])->name('apply');


Auth::routes();

// Route::get('/home', [SiteController::class, 'home'])->name('home')->middleware('auth');

//->middleware('auth','isAdmin')
Route::prefix('/admin')->name('admin.')->group(function(){
    Route::get('/dashboard',function () {
        
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('/blog',BlogController::class);
    Route::resource('/course-category',CourseCategoryController::class);
    Route::resource('/courses',CourseController::class);
    Route::resource('/level',LevelController::class);
    Route::resource('/university',UniversityController::class);
    Route::resource('/student-enquiry',StudentEnquiryController::class);
    Route::resource('/user',UserController::class);

});




