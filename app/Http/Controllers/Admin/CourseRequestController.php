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
    //    @dd($details);
        // $data = $request->validate([
        //     'name' => 'required|unique:courses,name',
        //     'cat_id' => 'nullable|exists:course_categories,id',
        //     'description' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,gif',
        //     'status' => 'boolean|nullable',
        //     'university_id' => 'required|exists:universities,id',
        //     'level_id' => 'nullable|exists:levels,id',

        // ]);

        // if ($request->hasFile('image')) {
        //     $img_name = time() . '_' . $request->file('image')->getClientOriginalName();
        //     $request->file('image')->move(public_path('course'), $img_name);
        // }

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


    public function destroy($id)
    {
        $course = RequestCourse::find($id);
        $course->delete();
        return redirect()->back()->with('success', 'Request Disapproved');
    }
}
