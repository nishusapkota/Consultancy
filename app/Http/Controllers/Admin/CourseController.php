<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Http\Controllers\Controller;
use App\Models\University;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses=Course::all();
        return view('admin.course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=CourseCategory::all();
        $universities=University::all();
        return view('admin.course.create',compact('categories','universities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name' =>'required',
            'cat_id' =>'required|exists:course_categories,id',
            'description' =>'required',
         'status' => 'nullable|boolean'
        ]);

        Course::create($data);
        return redirect()->route('admin.courses.index')->with('success','course created successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
    $categories=CourseCategory::all();
       return view('admin.courses.edit', compact('course','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Course $course)
    {
        $data=$request->validate([
            'name' =>'required',
            'cat_id' =>'required|exists:course_categories,id',
            'description' =>'required',
         'status' => 'nullable|boolean'
        ]);
        $course->update($data);
        return redirect()->route('admin.courses.index')->with('success','Course updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success','Course deleted successfully');
    }
}
