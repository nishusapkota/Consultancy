<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\SiteController;

Route::get('/',[SiteController::class, 'index'])->name('index');
Auth::routes();
Route::get('/home', [SiteController::class, 'home'])->name('home')->middleware('auth');


Route::prefix('/admin')->name('admin.')->middleware('auth','isAdmin')->group(function(){
    Route::get('/',function () {
        return view('admin.dashboard');
    });
    Route::resource('/blog',BlogController::class);
});




