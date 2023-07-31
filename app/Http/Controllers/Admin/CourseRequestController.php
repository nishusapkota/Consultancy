<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\RequestCourse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CourseRequestController extends Controller
{
    function index()
    {
        $reqCourses = RequestCourse::with('university', 'category')->get();
        // dd($reqCourses);
        return view('admin.course-request.index', compact('reqCourses'));
    }
    public function show($id)
    {
        $course = RequestCourse::with('university', 'category')->find($id);
        //  @dd($course);
        return view('admin.course-request.show', compact('course'));
    }
    public function update($id)
    {
        $details = RequestCourse::find($id);
        $courseData = [
            'name' => $details['name'],
            'description' =>$details['description'],
            'image' => $details['description'],
            'status' => '0' 
        ];

        if (isset($details['cat_id'])) {
            $courseData['cat_id'] = $details['cat_id'];
        }
        $course = Course::create($courseData);
        if (isset($details['university_id'])) {
            $course->universities()->attach($details['university_id']);
        }
        if (isset($details['level_id'])) {
            $course->levels()->attach($details['level_id']);
        }
        $details->delete();
        return redirect()->route('admin.uni-requested-course.index')->with('success', 'Course Request approved successfully.');
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
