<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=CourseCategory::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate(['name'=>'required|unique:course_categories,name']);
        CourseCategory::create($data);
        return redirect()->route('admin.course-category.index')->with('success','Category creatd successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CourseCategory $course_category)
    {
        return view('admin.category.show',compact('course_category'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseCategory $course_category)
    {
        return view('admin.category.edit', compact('course_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,CourseCategory $course_category)
    {
        $data=$request->validate([
            'name'=>'required|unique:course_categories,name,except,id'
        ]);
        $course_category->update($data);
        return redirect()->route('admin.course-category.index')->with('success','Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseCategory $course_category)
    {
        $course_category->delete();
        return redirect()->route('admin.course-category.index')->with('success','Category deleted successfully');

    }
}
