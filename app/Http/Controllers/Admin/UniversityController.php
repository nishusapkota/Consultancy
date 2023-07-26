<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Course;
use App\Models\University;
use App\Models\Certificate;
use App\Models\Scholarship;
use Illuminate\Http\Request;
use App\Models\UniversityImage;
use App\Models\CourseUniversity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\RequestUniversityDesc;
use App\Models\StudentEnquiry;

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
        // dd($universities);
        return view('admin.university.index', compact('universities'));
    }

    public function changeStatus( $id)
    {
        $university = University::find($id);
        if ($university->status==1) {
            $university->update([
                'status'=>0
            ]);
        }else {
            $university->update([
                'status'=>1
            ]);
        }
    }

    public function universityDashboard()
    {
        $uid = Auth::user()->university_id;
        $university = University::with('user')->find($uid);

        $course_count=CourseUniversity::where('university_id',$uid)->count();
        $scholarship_count=Scholarship::where('university_id',$uid)->count();
        $certificate_count=Certificate::where('university_id',$uid)->count();
        //  dd($university);
        return view('university.dashboard', compact('university','course_count','scholarship_count','certificate_count'));
    }
    public function universityCreate()
    {
        $uid = Auth::user()->university_id;
        $university = RequestUniversityDesc::where('university_id', $uid)->first();
    //  dd($university);
        return view('university.request-university-details', compact('university','uid'));
    }
    public function universityUpdate(Request $request, $uid)
    {
        // $request->validate([
        //     'details' => 'required',
        //     'address' => 'required',
        //     'uname' => 'required',
        //     'image' => 'nullable',
        //     'email' => 'required|email|unique:users,email,except,$reqUniversity->email',
        // ]);
        // dd($request->all());
        $reqUniversity = RequestUniversityDesc::where('university_id', $uid)->first();
        if ($reqUniversity) {
            if ($request->hasFile('image')) {

                if ($reqUniversity->image && file_exists(public_path($reqUniversity->image))) {
                    unlink(public_path($reqUniversity->image));
                }
                $img_name = time() . "_" . $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('university/'), $img_name);
            }
            $reqUniversity->update([
                'email' => $request->email,
                'address' => $request->address,
                'uname' => $request->uname,
                'details' => $request->details,
                'image' => $request->hasfile('image') ? 'university/' . $img_name : $reqUniversity->image,
                'university_id'=>Auth::user()->university_id

            ]);

            return redirect()->back()->with('success', 'Request for University detail updated');
        }

        else{
            if ($request->hasFile('image')) {
                $img_name = time() . "_" . $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('university/'), $img_name);
            }
            RequestUniversityDesc::create([
                'email' => $request->email,
                'address' => $request->address,
                'uname' => $request->uname,
                'details' => $request->details,
                'image' =>  'university/' . $img_name,
                'university_id'=>Auth::user()->university_id

            ]);

            return redirect()->back()->with('success', 'Request for University detail updated');
        }
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
            'image' => 'required|image|mimes:png,jpg,jpeg',
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
        if ($university->image && file_exists(public_path($university->image))) {
            unlink(public_path($university->image));
        }
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
    //    dd($request->all());
        $request->validate([
            'image' =>'required|mimes:png,jpg,jpeg,mp4,mov,mkv',

        ]);
        $file_name = time()."_".$request->file('image')->getClientOriginalName();
        $ext = $request->file('image')->getClientOriginalExtension();
        if ($ext == 'mp4'||$ext == 'mov'||$ext == 'mkv') {
            $request->file('image')->move(public_path('university/video'), $file_name);
        } else {
            $request->file('image')->move(public_path('university/image'), $file_name);
        }
        UniversityImage::create([
            'image' => ($ext == 'mp4'||$ext == 'mov'||$ext == 'mkv') ? 'university/video/' . $file_name : 'university/image/' . $file_name,
            'ext' => $ext,
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
            'image' => 'nullable|image|mimes:png,jpg,jpeg,mp4,mov,mkv'
        ]);
        if ($request->hasFile('image')) {
            unlink(public_path($uni_image->image));
            $file_name = time() . '_' . $request->file('image')->getClientOriginalName();
            $ext = $request->file('image')->getClientOriginalExtension();
            

        if ($ext == 'mp4'||$ext == 'mov'||$ext == 'mkv') {
            $request->file('image')->move(public_path('university/video'), $file_name);
        } else {
            $request->file('image')->move(public_path('university/image'), $file_name);
        }

            $data=[
                'image' => ($ext == 'mp4'||$ext == 'mov'||$ext == 'mkv')? 'university/video/' . $file_name : 'university/image/' . $file_name,
                'ext' => $ext
            ];
            $uni_image->update($data);
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
        $certificate = Certificate::find($id);
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
    public function changeStatus( $id)
    {
        $university = University::find($id);
        if ($university->status==1) {
            $university->update([
                'status'=>0
            ]);
        }else {
            $university->update([
                'status'=>1
            ]);
        }
    }
}
