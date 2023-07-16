<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\About;
use App\Models\Level;
use App\Models\Course;
use App\Models\Footer;
use App\Models\Contact;
use App\Models\AboutImage;
use App\Models\HomeSlider;
use App\Models\University;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use App\Models\StudentEnquiry;
use Illuminate\Support\Facades\Crypt;

class SiteController extends Controller
{
    public function index() {
        // $courses=Course::with(['category','levels'=>function($q){
        //     $q->limit(3);
        // }])->get();
        
        $courses=Course::with('category','levels')->where('status','1')->get();
        $scholarships=Scholarship::with('university')->get();
        $about=About::first();
        $universities=University::where('status','1')->get();
        // dd($universities);
        $blogs=Blog::where('status','1')->get();
        $images=AboutImage::all();
        $contact=Contact::all();
        $homeSlider=HomeSlider::all();
        return view('frontend.home',compact('universities','images','courses','blogs','homeSlider','about','contact','scholarships'));
    }
    public function scholarship() {
        $scholarships=Scholarship::all();
        return view('frontend.scholarship',compact('scholarships'));
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
        $universities=University::where('status','1')->get(['id','uname']);
        $levels=Level::where('status','1')->get(['id','name']);
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
        $universities=University::where('status','1')->get();
        // dd($universities);
        return view('frontend.colleges',compact('universities'));
    }
    public function blog() {
        $blogs=Blog::where('status','1')->get();
        return view('frontend.blog',compact('blogs'));
    }
    public function blogDetail($title) {
        // dd(Crypt::decrypt($id));
        $blog=Blog::where('title',$title)->where('status','1')->first();
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
        $course=Course::where('name',$name)->where('status','1')->first();
        $university=University::whereHas('courses',function($q)use($course){
            $q->where('courses.id',$course->id)->where('status','1');
        })->get(['id','uname']);
        $levels=Level::where('status','1')->get(['id','name']);
        // dd($course);
        return view('frontend.course-details',compact('course','university','levels'));
    }

    public function scholarshipDetail($title) {
        $scholarship=Scholarship::where('title',$title)->first();
        $courses=Course::whereHas('universities',function($q)use($scholarship){
            $q->where('universities.id',$scholarship->university_id)->where('status','1');
        })->get();
        $levels=Level::where('status','1')->get(['id','name']);
        return view('frontend.scholarship-details',compact('scholarship','courses','levels'));
    }

    
    public function collegeDetail($name) {
        $college=University::where('uname',$name)->where('status','1')->first();
        $courses=Course::whereHas('universities',function($q)use($college){
            $q->where('universities.id',$college->id)->where('status','1');
        })->get();
        $levels=Level::where('status','1')->get(['id','name']);
        $scholarships=Scholarship::where('university_id',$college->id)->get();
        return view('frontend.college-details',compact('college','courses','levels','scholarships'));
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
        
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email'=>'required|email',
            'level_id' => 'nullable|exists:levels,id',
            'course_id' => 'nullable|exists:courses,id',
            'university_id' => 'nullable|exists:universities,id',
            'message' => 'required|string'
        ]);
        // dd($request->all());
        StudentEnquiry::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email'=>$request->email,
            'level_id' => isset($request->level_id) ? $request->level_id :'null',
            'course_id' => isset($request->course_id) ? $request->course_id :'null',
            'university_id' => isset($request->university_id) ? $request->university_id :'null',
            'message' => $request->message,
        ]);
        return redirect()->back()->with('success','Your Enquiry Has Been  Submitted Successfully');
    }
}
