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
    $data = $request->validate([
        'name' => 'required',
        'cat_id' => 'required|exists:course_categories,id',
        'description' => 'required',
        'image' => 'required|image|mimes:jpeg,png,gif',
        'status' => 'boolean',
        'university_id' => 'nullable|array',
        'university_id.*' => 'exists:universities,id'
    ]);

    if ($request->hasFile('image')) {
        $img_name = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('course'), $img_name);
    }

    $course = Course::create([
        'name' => $data['name'],
        'cat_id' => $data['cat_id'],
        'description' => $data['description'],
        'image' => isset($img_name) ? 'course/'.$img_name : null,
        'status' => $data['status']  ? 1 :0
    ]);

    if (isset($data['university_id'])) {
        $course->universities()->attach($data['university_id']);
    }
    return redirect()->route('admin.courses.index')->with('success', 'Course created successfully.');
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('admin.course.show',compact('course'));
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
    $universities=University::all();
       return view('admin.course.edit', compact('course','categories','universities'));
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
            'image' =>'nullable',
            'description' =>'required',
         'status' => 'nullable|boolean',
         'university_id' => 'array',
            'university_id.*' => 'exists:universities,id'
        ]);
        if($request->hasFile('image')){
            unlink(public_path($course->image));
             $image = $request->file('image');
            $img_name = $image->getClientOriginalName();
            $image->move(public_path('course'), $img_name);
            
            }
        $course->update([
            'name'=>$request->name,
            'cat_id'=>$request->cat_id,
            'image'=>$request->hasfile('image') ? 'course/'.$img_name : $course->image,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);
        $course->universities()->sync($request->university_id);
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
        if ($course->image && file_exists(public_path($course->image))) {
            unlink(public_path($course->image));
        } 
        $course->universities()->detach();
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success','Course deleted successfully');
    }
}
