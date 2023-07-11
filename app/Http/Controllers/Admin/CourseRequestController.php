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
    function destroy(RequestCourse $course)  {
        $course->delete();
        return view('admin.course-request.index')->with('success','Deleted successfully');
    }
}
