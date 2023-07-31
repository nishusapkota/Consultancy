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
    

    public function changeStatus( $id)
    {
        $scholarship = Scholarship::find($id);
        if ($scholarship->status==1) {
            $scholarship->update([
                'status'=>0
            ]);
        }else {
            $scholarship->update([
                'status'=>1
            ]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities = University::all();
        return view('admin.scholarship.create', compact('universities'));
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
            'university_id' => 'required|exists:universities,id',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        if ($request->hasFile('image')) {
            $img_name = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('scholarship'), $img_name);
        }

        Scholarship::create([
            'title' => $request->title,
            'image' => 'scholarship/' . $img_name,
            'university_id' => $request->university_id,
            'description' => $request->description
        ]);
        return redirect()->route('admin.scholarship.index')->with('success', 'Scholarship created successfully');
    }

    public function edit($id)
    {
    $scholarship = Scholarship::findOrFail($id);
        $universities = University::all();
       return view('admin.scholarship.edit', compact('scholarship', 'universities'));
 }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scholarship=Scholarship::with('university')->where('id',$id)->first();
        // dd($scholarship);
        return view('admin.scholarship.show', compact('scholarship'));
    }
    

   
    

    
    public function update(Request $request,$id)
    {
       $scholarship=Scholarship::find($id);
       $data = $request->validate([
        'title' => 'required',
        'image' => 'nullable',
        'description' => 'required',
        'university_id'=>'required|exists:universities,id'
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
        'university_id' => $request->university_id,
        'status'=>'0'

    ]);
    return redirect()->route('admin.scholarship.index')->with('success', 'Scholarship updated successfully');

        }

    



    
    public function destroy($id)
    {
        $scholarship=Scholarship::find($id);
        if ($scholarship->image && file_exists(public_path($scholarship->image))) {
            unlink(public_path($scholarship->image));
        }
        $scholarship->delete();
        return redirect()->route('admin.scholarship.index')->with('success', 'Scholarship deleted successfully');
    }
    
}
