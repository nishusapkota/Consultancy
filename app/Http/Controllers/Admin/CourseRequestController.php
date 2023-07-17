<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\RequestCourse;
use App\Http\Controllers\Controller;

class CourseRequestController extends Controller
{
    function index() {
        $reqCourses=RequestCourse::with('university','category')->get();
        //  dd($reqCourses);
        return view('admin.course-request.index',compact('reqCourses'));
    }
public function show($id)  {

    $course=RequestCourse::find($id);
        return view('admin.course-request.show',compact('course'));
    }

    function destroy(RequestCourse $course)  {
        $course->delete();
        return view('admin.course-request.index')->with('success','Deleted successfully');
    }
}
