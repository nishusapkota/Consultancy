<?php

namespace App\Http\Controllers\University;

use App\Models\Level;
use App\Models\University;
use Illuminate\Http\Request;
use App\Models\RequestCourse;
use App\Models\CourseCategory;
use App\Http\Controllers\Controller;
use App\Models\RequestCourseCategory;

class RequestCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = RequestCourse::all();
        return view('university.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CourseCategory::all();
        $levels=Level::all();
        return view('university.course.create', compact('categories','levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'cat_id' => 'required|exists:course_categories,id',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,gif',
            'level_id' => 'nullable|array',
            'level_id.*' => 'exists:levels,id'
        ]);

        if ($request->hasFile('image')) {
            $img_name = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('course'), $img_name);
        }

        $course = RequestCourse::create([
            'name' => $data['name'],
            'cat_id' => $data['cat_id'],
            'description' => $data['description'],
            'image' => isset($img_name) ? 'course/' . $img_name : null,
            'university_id' => auth()->user()->university_id,

        ]);
       
        if (isset($data['level_id'])) {
            $course->levels()->attach($data['level_id']);
        }
        return redirect()->route('university.courses.index')->with('success', 'Course created successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RequestCourse $course)
    {
        return view('university.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $course=RequestCourse::with('universities')->find($id);
        $categories = RequestCourseCategory::all();
        $universities = University::all();
        $levels=Level::all();
        // $selectedUni=collect($course->universities)->map(function($uni){
        //     return $uni->id;
        // });
        // dd($selectedUni);
        return view('university.course.edit', compact('course', 'categories', 'universities','levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestCourse $course)
    {
        $data = $request->validate([
            'name' => 'required',
            'cat_id' => 'required|exists:course_categories,id',
            'image' => 'nullable',
            'description' => 'required',
            'university_id' => 'array',
            'university_id.*' => 'exists:universities,id',
            'level_id' => 'nullable|array',
            'level_id.*' => 'exists:levels,id'
        ]);
        if ($request->hasFile('image')) {
            unlink(public_path($course->image));
            $image = $request->file('image');
            $img_name = $image->getClientOriginalName();
            $image->move(public_path('course'), $img_name);
        }
        $course->update([
            'name' => $request->name,
            'cat_id' => $request->cat_id,
            'image' => $request->hasfile('image') ? 'course/' . $img_name : $course->image,
            'description' => $request->description,
           
        ]);
        $course->universities()->sync($request->university_id);
        $course->levels()->sync($request->course_id);
        return redirect()->route('university.courses.index')->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestCourse $course)
    {
        if ($course->image && file_exists(public_path($course->image))) {
            unlink(public_path($course->image));
        }
        $course->universities()->detach();
        $course->levels()->detach();
        $course->delete();
        return redirect()->route('university.courses.index')->with('success', 'Course deleted successfully');
    }
}