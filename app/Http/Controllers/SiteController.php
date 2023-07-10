<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Level;
use App\Models\Course;
use App\Models\HomeSlider;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiteController extends Controller
{
    public function index() {
        // $courses=Course::with(['category','levels'=>function($q){
        //     $q->limit(3);
        // }])->get();
    $courses=Course::with('category','levels')->get();
        $universities=University::all();
        $blogs=Blog::all();
        $homeSlider=HomeSlider::all();
        return view('frontend.home',compact('universities','courses','blogs','homeSlider'));
    }
    public function scholarship() {
        return view('frontend.scholarship');
    }
    public function courses() {
        $courses=Course::all();
    
        $levels=Level::with('courses')->get();
        return view('frontend.courses',compact('courses','levels'));
    }
    public function colleges() {
        $universities=University::all();
        
        return view('frontend.colleges',compact('universities'));
    }
    public function blog() {
        return view('frontend.blog');
    }
    public function blogDetail($id) {
        $blog=Blog::find(Crypt::decrypt($id));
        return view('frontend.blog-details',compact('blog'));
    }
    
    public function contact() {
        return view('frontend.contact');
    }
    public function applyNow() {
        return view('frontend.applyNow');
    }
    public function courseDetail($id) {
        $courses=Course::all();
        $levels=Level::with('courses')->get();
        $course=Course::find(Crypt::decrypt($id));
        // dd($course);
        return view('frontend.course-details',compact('course','courses','levels'));
    }
    public function collegeDetail($id) {
       
        $college=University::find(Crypt::decrypt($id));
        return view('frontend.college-details',compact('college'));
    }

    // public Function home() {
    //     if(auth()->user()->role == 'admin'){
    //     //     // return redirect('/admin');
    //        return view('admin.dashboard');
    //     }
    //     return view('home');
    // }
}
