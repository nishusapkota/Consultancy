<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {
        return view('frontend.home');
    }
    public function courses() {
        return view('frontend.courses');
    }
    public function colleges() {
        return view('frontend.colleges');
    }
    public function blog() {
        return view('frontend.blog');
    }
    public function contact() {
        return view('frontend.contact');
    }
    public function applyNow() {
        return view('frontend.applyNow');
    }
    public function courseDetail() {
        return view('frontend.course-details');
    }

    // public Function home() {
    //     if(auth()->user()->role == 'admin'){
    //     //     // return redirect('/admin');
    //        return view('admin.dashboard');
    //     }
    //     return view('home');
    // }
}
