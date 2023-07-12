<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Course;
use App\Models\University;
use Illuminate\Http\Request;
use App\Models\CourseCategory;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CourseCategory::all();
        $universities = University::all();
        $levels=Level::all();
        return view('admin.course.create', compact('categories', 'universities','levels'));
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
            'name' => 'required|unique:courses,name' ,
            'cat_id' => 'nullable|exists:course_categories,id',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,gif',
            'status' => 'boolean|nullable',
            'university_id' => 'nullable|array',
            'university_id.*' => 'exists:universities,id',
            'level_id' => 'nullable|array',
            'level_id.*' => 'exists:levels,id'
        ]);

        if ($request->hasFile('image')) {
            $img_name = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('course'),$img_name);
        }

        $courseData = [
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => 'course/' . $img_name ?: 'null',
            'status' => isset($data['status']) ? '1' : '0',
        ];
    
        if (isset($data['cat_id'])) {
            $courseData['cat_id'] = $data['cat_id'];
        }
    
        $course = Course::create($courseData);
       
        if (isset($data['university_id'])) {
            $course->universities()->attach($data['university_id']);
        }
        if (isset($data['level_id'])) {
            $course->levels()->attach($data['level_id']);
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
        return view('admin.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $course=Course::with('universities')->find($id);
        $categories = CourseCategory::all();
        $universities = University::all();
        $levels=Level::all();
        // $selectedUni=collect($course->universities)->map(function($uni){
        //     return $uni->id;
        // });
        // dd($selectedUni);
        return view('admin.course.edit', compact('course', 'categories', 'universities','levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Course $course)
    // {
    //     $data = $request->validate([
    //         'name' => 'required|unique:courses,name,' . $course->id,
    //         'cat_id' => 'nullable|exists:course_categories,id',
    //         'image' => 'nullable|image|mimes:jpeg,png,gif',
    //         'description' => 'required',
    //         'status' => 'nullable|boolean',
    //         'university_id' => 'array',
    //         'university_id.*' => 'exists:universities,id',
    //         'level_id' => 'nullable|array',
    //         'level_id.*' => 'exists:levels,id'
    //     ]);
    //     // dd($request->hasfile('image') ? 1 : 0,$request->all());
    //     if ($request->hasFile('image')) {
    //         unlink(public_path($course->image));
    //         $image = $request->file('image');
    //         $img_name = $image->getClientOriginalName();
    //         $image->move(public_path('course'), $img_name);
    //     }
    //     $course->update([
    //         'name' => $request->name,
    //         'cat_id' => isset($request->cat_id) ? $request->cat_id : '',
    //         'image' => $request->hasfile('image') ? 'course/' . $img_name : $course->image,
    //         'description' => $request->description,
    //         'status' => $request->status ? '1' : '0',
    //     ]);
    //     $course->universities()->sync($request->university_id);
    //     $course->levels()->sync($request->course_id);
    //     return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully');
    // }

    public function update(Request $request, $id)
{
    $data = $request->validate([
        'name' => 'required|unique:courses,name,' . $id,
        'cat_id' => 'nullable|exists:course_categories,id',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,gif',
        'status' => 'boolean|nullable',
        'university_id' => 'nullable|array',
        'university_id.*' => 'exists:universities,id',
        'level_id' => 'nullable|array',
        'level_id.*' => 'exists:levels,id'
    ]);

    $course = Course::findOrFail($id);
    
    $img_name = $course->image;

    if ($request->hasFile('image')) {
        if ($course->image && file_exists(public_path($course->image))) {
            unlink(public_path($course->image));
            
        }  
        $image = $request->file('image');
            $img_name = $image->getClientOriginalName();
           $image->move(public_path('course'), $img_name);     
         }
    $courseData = [
        'name' => $data['name'],
        'description' => $data['description'],
        'image' => $request->hasfile('image') ? 'course/' . $img_name : $course->image,
        'status' => isset($data['status']) ? '1' : '0',
    ];

    if (isset($data['cat_id'])) {
        $courseData['cat_id'] = $data['cat_id'];
    }

    $course->update($courseData);

    if (isset($data['university_id'])) {
        $course->universities()->sync($data['university_id']);
    } 

    if (isset($data['level_id'])) {
        $course->levels()->sync($data['level_id']);
    } 

    return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
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
        $course->levels()->detach();
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully');
    }
}
