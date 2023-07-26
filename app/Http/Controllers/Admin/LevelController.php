<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels=Level::with('courses')->get();
        return view('admin.level.index',compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        return view('admin.level.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:levels,name',
            'status'=> 'boolean|nullable',
            'course_id' => 'array',
        'course_id.*' => 'exists:courses,id'
        ]);
       $level= Level::create([
            'name' => $request->name,
            'status' => $request->status ? '1' :'0'                                                                                                                                                                                                                 
        ]);
        
        $level->courses()->attach($request->course_id);
       return redirect()->route('admin.level.index')->with('success','level created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $level=Level::with('courses')->first();
        return view('admin.level.show',compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level = Level::findOrFail($id);
        $courses = Course::all();
        return view('admin.level.edit', compact('level', 'courses'));
    }

    public function changeStatus( $id)
    {
        $level = Level::find($id);
        if ($level->status==1) {
            $level->update([
                'status'=>0
            ]);
        }else {
            $level->update([
                'status'=>1
            ]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => 'required|unique:levels,name,' . $level->id,
            'status' => 'boolean|nullable',
            'course_id' => 'array',
            'course_id.*' => 'exists:courses,id'
        ]);
    
        $level->update([
            'name' => $request->name,
            'status' => $request->has('status') ? $request->input('status') : 0,
        ]);
    
        $level->courses()->sync($request->course_id);
    
        return redirect()->route('admin.level.index')->with('success', 'Level updated successfully');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level=Level::find($id);
        $level->delete();
        return redirect()->route('admin.level.index')->with('success','Level deleted successfully');
    }
}
