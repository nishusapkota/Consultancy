<?php

use App\Models\CourseCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\HomeSlider;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\FooterController;

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\University\ProfileController;
use App\Http\Controllers\Admin\CourseRequestController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\ScholarshipController as AdminScholarshipController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\StudentEnquiryController;
use App\Http\Controllers\University\ScholarshipController;
use App\Http\Controllers\University\RequestCourseController;


Route::get('/',[SiteController::class, 'index'])->name('index');
Route::get('/courses',[SiteController::class, 'courses'])->name('courses');
Route::get('/course-details/{name}',[SiteController::class, 'courseDetail'])->name('course-detail');
Route::get('/course-details-from-univeristy',[SiteController::class, 'courseDetailFromUni'])->name('course-detail-from-uni');
Route::get('/scholarships',[SiteController::class, 'scholarship'])->name('scholarship');
Route::get('/scholarship-details/{title}',[SiteController::class, 'scholarshipDetail'])->name('scholarship-detail');


Route::get('/colleges',[SiteController::class, 'colleges'])->name('college');
Route::get('/college-details/{uname}',[SiteController::class, 'collegeDetail'])->name('college-detail');

Route::get('/blogs',[SiteController::class, 'blog'])->name('blog');
Route::get('/blog-details/{id}',[SiteController::class, 'blogDetail'])->name('blog-detail');

Route::get('/contacts',[SiteController::class, 'contact'])->name('contact');
Route::get('/apply',[SiteController::class, 'applyNow'])->name('apply');
 Route::post('/student-enquiries',[SiteController::class, 'studentEnquiry'])->name('enquiry.post');
 Route::post('/general-enquiries',[SiteController::class, 'generalEnquiry'])->name('general.enquiry.post');


Auth::routes();

// Route::get('/home', [SiteController::class, 'home'])->name('home')->middleware('auth');

//
Route::prefix('/admin')->middleware('auth','isAdmin')->name('admin.')->group(function(){

    Route::get('/dashboard',function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('/slider/home',HomeSliderController::class);
    Route::resource('/blog',BlogController::class);
    Route::resource('/scholarship',AdminScholarshipController::class);
    Route::resource('/about',AboutController::class);
    Route::get('/about/edit-image/{id}',[AboutController::class,'edit_image'])->name('about.edit_image');
    Route::post('/update-about-image',[AboutController::class,'update_image'])->name('about.update_image');
    Route::resource('/course-category',CourseCategoryController::class);
    Route::resource('/courses',CourseController::class);
    Route::resource('/request/course',CourseRequestController::class);
    Route::resource('/level',LevelController::class);
    Route::resource('/university',UniversityController::class);

    Route::get('/university/{id}/image',[UniversityController::class,'index_image'])->name('university.index_image');
    Route::get('/university/{id}/add-image',[UniversityController::class,'create_image'])->name('university.create_image');
    Route::post('/university/{id}/add-image',[UniversityController::class,'store_image'])->name('university.store_image');
    Route::get('/university/edit-image/{id}',[UniversityController::class,'edit_image'])->name('university.edit_image');
    Route::post('/university/edit-image/{id}',[UniversityController::class,'update_image'])->name('university.update_image');
    
    Route::resource('/social-media',SocialMediaController::class);
    
    
    Route::get('/student-enquiry',[EnquiryController::class,'indexStudentEnquiry'])->name('indexStudentEnquiry');
    Route::get('/general-enquiry',[EnquiryController::class,'indexGeneralEnquiry'])->name('generalEnquiry');
    Route::delete('/delete-student-enquiry/{id}',[EnquiryController::class,'deleteindexGeneralEnquiry'])->name('delete.studentEnquiry');
    Route::delete('/delete-general-enquiry/{id}',[EnquiryController::class,'deleteGeneralEnquiry'])->name('delete.generalEnquiry');
    

    // Route::resource('/contact',ContactController::class);
    Route::get('/footer-edit',[FooterController::class,'edit'])->name('footer.edit');
    Route::post('/footer-update',[FooterController::class,'store'])->name('footer.update');
    Route::get('/footer-edit-logo',[FooterController::class,'editLogo'])->name('footer.edit-logo');
    Route::post('/footer-update-logo',[FooterController::class,'storeLogo'])->name('footer.update-logo');
    Route::get('/contact-edit',[ContactController::class,'edit'])->name('contact.edit');
    Route::post('/contact-update',[ContactController::class,'store'])->name('contact.update');
});



Route::prefix('/university')->middleware('auth','isUniversity')->name('university.')->group(function(){ 
    Route::get('/home',[UniversityController::class,'universityDashboard'])->name('home');  
    Route::post('/home/{university}',[UniversityController::class,'universityUpdate'])->name('university.update');  
    Route::resource('/courses',RequestCourseController::class);
    Route::resource('/scholarship',ScholarshipController::class);    
});


Route::get('get-level-list',[FilterController::class,'levels'])->name('level.lists');
Route::get('get-university-list',[FilterController::class,'universitys'])->name('university.lists');
Route::get('get-course-list',[FilterController::class,'courses'])->name('course.lists');
Route::get('migrate246820',function(){
    \Artisan::call('migrate');
    return 'migrated successfully';
});




