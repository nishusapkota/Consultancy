<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\About;
use App\Models\Level;
use App\Models\Course;
use App\Models\Contact;
use App\Models\AboutImage;
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
        $about=About::first();
        $universities=University::all();
        $blogs=Blog::all();
        $images=AboutImage::all();
        $contact=Contact::all();
        $homeSlider=HomeSlider::all();
        return view('frontend.home',compact('universities','images','courses','blogs','homeSlider','about','contact'));
    }
    public function scholarship() {
        return view('frontend.scholarship');
    }
    public function courses() {
        $courses=Course::all();
        $universities=University::get(['id','uname']);
        $levels=Level::get(['id','name']);
        return view('frontend.courses',compact('courses','levels','universities'));
    }
    public function colleges() {
        $universities=University::all();
        
        return view('frontend.colleges',compact('universities'));
    }
    public function blog() {
        $blogs=Blog::all();
        return view('frontend.blog',compact('blogs'));
    }
    public function blogDetail($title) {
        // dd(Crypt::decrypt($id));
        $blog=Blog::where('title',$title)->first();
        // dd($blog);
        return view('frontend.blog-details',compact('blog'));
    }
    
    public function contact() {
        $contact=Contact::first()->get();
        // dd($contact);
        return view('frontend.contact',compact('contact'));
    }
    public function applyNow() {
        return view('frontend.applyNow');
    }
    public function courseDetail($name) {
        $course=Course::where('name',$name)->first();
        $university=University::whereHas('courses',function($q)use($course){
            $q->where('courses.id',$course->id);
        })->get(['id','uname']);
        $levels=Level::get(['id','name']);
        // dd($course);
        return view('frontend.course-details',compact('course','university','levels'));
    }
    
    public function collegeDetail($name) {
        $college=University::where('uname',$name)->first();
        $courses=Course::whereHas('universities',function($q)use($college){
            $q->where('universities.id',$college->id);
        })->get();
        $levels=Level::get(['id','name']);
        return view('frontend.college-details',compact('college','courses','levels'));
    }

    // public Function home() {
    //     if(auth()->user()->role == 'admin'){
    //     //     // return redirect('/admin');
    //        return view('admin.dashboard');
    //     }
    //     return view('home');
    // }
}
