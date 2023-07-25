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

    function destroy($id)  {
        $details=RequestCourse::find($id);
        if (!$details) {
            return redirect()->back()->with('error', 'No Such Request found');
        }

        $details->delete();
        return redirect()->back()->with('success', 'Request Disapproved');
    }
}
