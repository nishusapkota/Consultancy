<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\University;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\UniversityImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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

    public function universityDashboard()
    {
        $uid = Auth::user()->university_id;
        $university = University::with('user')->find($uid);
        // $courses=Course::all();
        //  dd($university);
        return view('university.home', compact('university'));
    }
    public function universityUpdate(Request $request, University $university)
    {
        // dd($request->details);
        // dd($university);
        $request->validate([
            'details' => 'required',
        ]);
        $university->update([
            'details' => $request->details,
        ]);
        return redirect()->route('university.home')->with('success', 'university updated successfully');
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
        $data = $request->validate([
            'uname' => 'required|unique:universities,uname',
            'address' => 'required',

            'details' => 'required',
            'status' => 'boolean|nullable',
            'course_id' => 'nullable|array',
            'course_id.*' => 'exists:courses,id',

            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'nullable',
            'password' => 'required|confirmed',

        ]);
        $img_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('university'), $img_name);
        // $img_name = $request->file('image')->getClientOriginalName();
        // $request->file('image')->move(public_path('university'), $img_name);
        // 'image' => 'university/' . $img_name,
        $university = University::create([
            'uname' => $request->uname,
            'address' => $request->address,
            'image' => 'university/' . $img_name,
            'details' => $request->details,
            'status' => $request->status ? '1' : '0'
        ]);

        if (isset($data['course_id'])) {
            $university->courses()->attach($request->course_id);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username ?: "null",
            'password' => Hash::make($request->password),
            'role' => 'university',
            'university_id' => $university->id
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
        $courses = Course::all();
        return view('admin.university.edit', compact('courses', 'university',));
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

            'details' => 'required',
            'status' => 'boolean|nullable',
            'course_id' => 'array',
            'course_id.*' => 'exists:courses,id',

            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $university->user->id,
            'username' => 'nullable',
            'password' => 'confirmed',
        ]);
        if ($request->hasFile('image')) {
            if ($university->image) {
                unlink(public_path($university->image));
            }
            $image = $request->file('image');
            $img_name = $image->getClientOriginalName();
            $image->move(public_path('university'), $img_name);
        }
        $university->update([
            'uname' => $request->uname,
            'address' => $request->address,
            'image' => $request->hasfile('image') ? 'university/' . $img_name : $university->image,
            'details' => $request->details,
            'status' => $request->status ? '1' : '0'
        ]);
        $university->user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username ?: "null",
            'password' => Hash::make($request->password),
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
        // if ($university->image && file_exists(public_path($university->image))) {
        //     unlink(public_path($university->image));
        // }
        $university->delete();
        return redirect()->route('admin.university.index')->with('success', 'record deleted successfully');
    }

    public function index_image($id)
    {
        $university = University::with('universityImages')->find($id);
        $images = $university->universityImages;
        return view('admin.university.image-index', compact('images', 'university'));
    }
    public function create_image($id)
    {
        $university = University::find($id);
        return view('admin.university.create_image', compact('university'));
    }
    public function store_image($id, Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg'
        ]);
        $img_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('university'), $img_name);
        UniversityImage::create([
            'image' => 'university/' . $img_name,
            'university_id' => $id
        ]);
        return redirect()->route('admin.university.index_image', $id)->with('success', 'Image created successfully');
    }
    public function edit_image($id)
    {
        $uni_image = UniversityImage::find($id);
        return view('admin.university.edit_image', compact('uni_image'));
    }
    public function update_image(Request $request, $id)
    {
        $uni_image = UniversityImage::find($id);
        $request->validate([
            'image' => 'nullable|image|mimes:png,jpg'
        ]);
        if ($request->hasFile('image')) {
            if ($uni_image->image && file_exists(public_path($uni_image->image))) {
                unlink(public_path($uni_image->image));
            }
            $image = $request->file('image');
            $img_name = $image->getClientOriginalName();
            $image->move(public_path('university'), $img_name);
            $uni_image->update([
                'image' => 'university/' . $img_name
            ]);
            return redirect()->route('admin.university.index_image', $uni_image->university->id)->with('success', 'Image updated successfully');
        }
    }

    




    //certificate
    public function index_certificate($id)
    {
        $university = University::with('certificates')->find($id);
        $certificates = $university->certificates;
        return view('admin.university.index_certificate', compact('certificates', 'university'));
    }
    public function create_certificate($id)
    {
        $university = University::find($id);
        return view('admin.university.create_certificate', compact('university'));
    }
    public function store_certificate($id, Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg'
        ]);
        $img_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('certificate'), $img_name);
        Certificate::create([
            'image' => 'certificate/' . $img_name,
            'university_id' => $id
        ]);
        return redirect()->route('admin.university.index_certificate', $id)->with('success', 'Certificate created successfully');
    }
    public function edit_certificate($id)
    {
        $certificate= Certificate::find($id);
        return view('admin.university.edit_certificate', compact('certificate'));
    }
    public function update_certificate(Request $request, $id)
    {
        $certificate = Certificate::find($id);
        $request->validate([
            'image' => 'nullable|image|mimes:png,jpg'
        ]);
        if ($request->hasFile('image')) {
            if ($certificate->image && file_exists(public_path($certificate->image))) {
                unlink(public_path($certificate->image));
            }
            $image = $request->file('image');
            $img_name = $image->getClientOriginalName();
            $image->move(public_path('certificate'), $img_name);
            $certificate->update([
                'image' => 'certificate/' . $img_name
            ]);
            return redirect()->route('admin.university.index_certificate', $certificate->university->id)->with('success', 'Certificate Image updated successfully');
        }
    }


}
