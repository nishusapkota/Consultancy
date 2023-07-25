<?php

namespace App\Http\Controllers\Admin;


use App\Models\University;
use App\Models\Scholarship;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        $scholarships = Scholarship::all();
        return view('admin.scholarship.index', compact('scholarships'));
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $universities = University::all();
    //     return view('admin.scholarship.create', compact('universities'));
    // }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //dd($request->all());
    //     $data = $request->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'university_id' => 'required|exists:universities,id',
    //         'image' => 'required|image|mimes:jpeg,png,jpg',
    //     ]);
    //     if ($request->hasFile('image')) {
    //         $img_name = time() . '_' . $request->file('image')->getClientOriginalName();
    //         $request->file('image')->move(public_path('scholarship'), $img_name);
    //     }

    //     Scholarship::create([
    //         'title' => $request->title,
    //         'image' => 'scholarship/' . $img_name,
    //         'university_id' => $request->university_id,
    //         'description' => $request->description
    //     ]);
    //     return redirect()->route('admin.scholarship.index')->with('success', 'Scholarship created successfully');
    // }

    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Scholarship $scholarship)
    {
        return view('admin.scholarship.show', compact('scholarship'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $scholarship = Scholarship::findOrFail($id);
    //     $universities = University::all();
    //     return view('admin.scholarship.edit', compact('scholarship', 'universities'));
    // }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
       $scholarship=Scholarship::find($id);
        $scholarship->update([
            'status' => '1',
        ]);
        return redirect()->route('admin.scholarship.index')->with('success', 'Scholarship updated successfully');
    }

    



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scholarship $scholarship)
    {
        if ($scholarship->image && file_exists(public_path($scholarship->image))) {
            unlink(public_path($scholarship->image));
        }
        $scholarship->delete();
        return redirect()->route('admin.scholarship.index')->with('success', 'Scholarship deleted successfully');
    }
    
}
