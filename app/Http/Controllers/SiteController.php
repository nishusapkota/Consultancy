<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\About;
use App\Models\Level;
use App\Models\Course;
use App\Models\Contact;
use App\Models\AboutImage;
use App\Models\HomeSlider;
use App\Models\StudentEnquiry;
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
    public function courses(Request $request) {
    
        $reData=$request->all();
        $courses=Course::
                    when($request->exists('university_id')&&!is_null($request->university_id),function($q)use($request){
                        $q->whereHas('universities',function($query)use($request){
                            $query->whereIn('universities.id',$request->university_id);
                        });
                    })
                    ->when($request->exists('level_id')&&!is_null($request->level_id),function($q)use($request){
                        $q->whereHas('levels',function($query)use($request){
                            $query->whereIn('levels.id',$request->level_id);
                        });
                    })
                    ->get();
        $universities=University::get(['id','uname']);
        $levels=Level::get(['id','name']);
        if ( empty($reData)) {
            $inputs=[
                'university_id'=>[],
                'level_id'=>[],
            ];
        }else {
            $inputs=[
                'university_id'=>$request->university_id?$request->university_id:[],
                'level_id'=>$request->level_id?$request->level_id:[],
            ];
        }
        // dd($inputs);
        return view('frontend.courses',compact('courses','levels','universities','inputs'));
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
        $contact=Contact::first();
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
    public function studentEnquiry(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'email'=>'required|email',
            'address' => 'required',
            'level_id' => 'required|exists:levels,id',
            'course_id' => 'required|exists:courses,id',
            'university_id' => 'required|exists:universities,id',
            'message' => 'nullable|string'
        ]);

        StudentEnquiry::create([
            'name' => $request->name,
            'contact' => $request->contact,
            'email'=>$request->email,
            'address' => $request->address,
            'level_id' => $request->level_id,
            'course_id' => $request->course_id,
            'university_id' => $request->university_id,
            'message' => $request->message,
        ]);
        return redirect()->back()->with('success','Your Enquiry Has Been  Submitted Successfully');
    }
}
