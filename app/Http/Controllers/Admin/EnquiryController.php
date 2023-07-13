<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Course;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentEnquiry;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStudent()
    {
        $enquiries = StudentEnquiry::with('level', 'university', 'course')->get();
        return view('admin.enquiry.index',compact('enquiries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels=Level::all();
        $universities=University::all();
        $courses=Course::all();
        return view('admin.enquiry.create',compact('levels','universities','courses'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data= $request->validate([
            'name'=>'required',
            'contact'=>'required',
            'email'=>'required',
            'address'=>'required',
            'course_id'=>'required|exists:courses,id',
            'level_id'=>'required|exists:levels,id',
            'university_id'=>'required|exists:universities,id'
        ]);
        StudentEnquiry::create($data);
        return redirect()->route('admin.student-enquiry.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enquiry = StudentEnquiry::with('level', 'university', 'course')->find($id);
        // dd($enquiry->level);
        return view('admin.enquiry.show', compact('enquiry'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentEnquiry $enquiry)
    {
        $enquiry->delete();
        return redirect()->route('admin.student-enquiry.destroy',$enquiry)->with('success','record deleted successfully');
        
    }
}
