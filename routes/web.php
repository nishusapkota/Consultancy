<?php

use App\Models\CourseCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\HomeSlider;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\StudentEnquiryController;

Route::get('/',[SiteController::class, 'index'])->name('index');
Route::get('/courses',[SiteController::class, 'courses'])->name('courses');
Route::get('/course-details/{id}',[SiteController::class, 'courseDetail'])->name('course-detail');
Route::get('/scholarship',[SiteController::class, 'scholarship'])->name('scholarship');

Route::get('/colleges',[SiteController::class, 'colleges'])->name('college');
Route::get('/college-details/{id}',[SiteController::class, 'collegeDetail'])->name('college-detail');

Route::get('/blogs',[SiteController::class, 'blog'])->name('blog');
Route::get('/blog-details/{id}',[SiteController::class, 'blogDetail'])->name('blog-detail');

Route::get('/contacts',[SiteController::class, 'contact'])->name('contact');
Route::get('/apply',[SiteController::class, 'applyNow'])->name('apply');


Auth::routes();

// Route::get('/home', [SiteController::class, 'home'])->name('home')->middleware('auth');

//
Route::prefix('/admin')->middleware('auth','isAdmin')->name('admin.')->group(function(){
    Route::get('/dashboard',function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('/slider/home',HomeSliderController::class);
    Route::resource('/blog',BlogController::class);
    Route::resource('/scholarship',ScholarshipController::class);
    Route::resource('/about',AboutController::class);
    Route::get('/about/edit-image/{id}',[AboutController::class,'edit_image'])->name('about.edit_image');
    Route::post('/update-about-image',[AboutController::class,'update_image'])->name('about.update_image');
    Route::resource('/course-category',CourseCategoryController::class);
    Route::resource('/courses',CourseController::class);
    Route::resource('/level',LevelController::class);
    Route::resource('/university',UniversityController::class);
    Route::resource('/student-enquiry',StudentEnquiryController::class);
    

});



Route::prefix('/university')->middleware('auth','isUniversity')->name('university.')->group(function(){
    Route::get('/home',function () {
        return view('university.home');
    })->name('home');
});



