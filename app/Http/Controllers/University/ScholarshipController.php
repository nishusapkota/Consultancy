<?php

namespace App\Http\Controllers\University;

use App\Models\University;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use App\Models\RequestScholarship;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scholarships = RequestScholarship::all();
        return view('university.scholarship.index', compact('scholarships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('university.scholarship.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        if ($request->hasFile('image')) {
            $img_name = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('scholarship'), $img_name);
        }

        RequestScholarship::create([
            'title' => $request->title,
            'image' => 'scholarship/' . $img_name,
            'university_id' => Auth::user()->university_id,
            'description' => $request->description,
            'status'=>'0'
        ]);
        return redirect()->route('university.scholarship.index')->with('success', 'Scholarship created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RequestScholarship $scholarship)
    {
        return view('university.scholarship.show', compact('scholarship'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestScholarship $scholarship)
    {
        return view('university.scholarship.edit', compact('scholarship'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,RequestScholarship $scholarship)
    {
        $data = $request->validate([
            'title' => 'required',
            'image' => 'nullable',
            'description' => 'required'
        ]);
        if ($request->hasFile('image')) {
            unlink(public_path($scholarship->image));
            $image = $request->file('image');
            $img_name = $image->getClientOriginalName();
            $image->move(public_path('scholarship'), $img_name);
        }
        $scholarship->update([
            'title' => $request->title,
            'image' => $request->hasfile('image') ? 'scholarship/' . $img_name : $scholarship->image,
            'description' => $request->description,
            'university_id' => Auth::user()->university_id,
            'status'=>'0'

        ]);
        return redirect()->route('university.scholarship.index')->with('success', 'Scholarship updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestScholarship $scholarship)
    {
        if ($scholarship->image && file_exists(public_path($scholarship->image))) {
            unlink(public_path($scholarship->image));
        }
        $scholarship->delete();
        return redirect()->route('university.scholarship.index')->with('success', 'Scholarship deleted successfully');
    }
}
