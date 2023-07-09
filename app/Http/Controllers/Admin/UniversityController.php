<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::with('courses')->get();
        return view('admin.university.index', compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.university.create', compact('courses'));
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
            'uname' => 'required|unique:universities,uname',
            'address' => 'required',
            'image' => 'required|image|mimes:png,jpg',
            'details' => 'required',
            'status' => 'boolean|nullable',
            'course_id' => 'nullable|array',
            'course_id.*' => 'exists:courses,id',
            
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required',
            'password' => 'required|confirmed',
            
        ]);
       
        $img_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('university'), $img_name);
        $university = University::create([
            'uname' => $request->uname,
            'address' => $request->address,
            'image' => 'university/' . $img_name,
            'details' => $request->details,
            'status' => $request->status ? 1 : 0
        ]);

        if (isset($data['course_id'])) {
            $university->courses()->attach($request->course_id);
        }

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'role'=>'university',
            'university_id'=>$university->id
        ]);


        return redirect()->route('admin.university.index')->with('success', 'university created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        return view('admin.university.show', compact('university'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $university = University::with('courses')->find($id);
        $courses=Course::all();
        return view('admin.university.edit', compact('courses','university',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {
        $request->validate([
            'uname' => 'required|unique:universities,uname,' . $university->id,
            'address' => 'required',
            'image' => 'image|mimes:png,jpg',
            'details' => 'required',
            'status' => 'boolean|nullable',
            'course_id' => 'array',
            'course_id.*' => 'exists:courses,id',
        
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $university->user->id,
            'username' => 'required',
            'password' => 'confirmed',
        ]);
        if ($request->hasFile('image')) {
            unlink(public_path($university->image));
            $image = $request->file('image');
            $img_name = $image->getClientOriginalName();
            $image->move(public_path('university'), $img_name);
        }
        $university->update([
            'uname' => $request->uname,
            'address' => $request->address,
            'image' => $request->hasfile('image') ? 'university/' . $img_name : $university->image,
            'details' => $request->details,
            'status' => $request->status ? '1' :'0'
        ]);
        $university->user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
        ]);
        $university->courses()->sync($request->course_id);
        return redirect()->route('admin.university.index')->with('success', 'university updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        if ($university->image && file_exists(public_path($university->image))) {
            unlink(public_path($university->image));
        }
        $university->delete();
        return redirect()->route('admin.university.index')->with('success', 'record deleted successfully');
    }
}
