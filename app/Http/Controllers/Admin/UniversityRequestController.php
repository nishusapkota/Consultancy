<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequestUniversityDesc;
use App\Models\University;
use App\Models\UniversityImage;
use App\Models\UniversitySlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UniversityRequestController extends Controller
{
    public function index()
    {
        $reqChanges = RequestUniversityDesc::all();
        //  dd($reqChanges);
        return view('admin.university-request.index', compact('reqChanges'));
    }

    public function show($id)
    {
        $reqUniversity = RequestUniversityDesc::find($id);
        return view('admin.university-request.show', compact('reqUniversity'));
    }
    public function update(Request $request, $id)
    {
            
        DB::beginTransaction();
        
        try {
            $details = RequestUniversityDesc::find($id);
            $university = University::with('user')->where('id', $details->university_id)->first();
            $university->update([
                'address' => $details->address,
                'details' => $details->details,
                'uname' => $details->uname,
                'image' => $details->image
                 
            ]);
            
            $university->user->update([
                'email' => $details->email
            ]);
            
            $details->delete();
            DB::commit();
            return redirect()->route('admin.uni-requested-university.index')->with('success', 'Request approved');
        } catch (\Illuminate\Database\QueryException $qe) {
            DB::rollBack();
            return redirect()->route('admin.uni-requested-university.index')->with('error', 'Something Went Wrong.Please Try agian.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.uni-requested-university.index')->with('error', 'Something Went Wrong.Please Try agian');
        }
    }

    public function destroy($id)
    {

        $details = RequestUniversityDesc::find($id);
        if (!$details) {
            return redirect()->back()->with('error', 'No Such Request foud');
        }
        $details->delete();
        return redirect()->back()->with('success', 'Request Disapproved');
        // return view('admin.university-request.index')->with('success', 'Request Disapproved');
    }



    public function indexSlider(){
        $sliders=UniversitySlider::all();
        return view('admin.slider-request.index',compact('sliders'));
    }


    public function updateSlider($id){
        $slider=UniversitySlider::find($id);
        UniversityImage::create([
            'image'=>$slider->image,
            'ext'=>$slider->ext,
            'university_id'=>$slider->university_id
        ]);
        $slider->delete();
        return redirect()->back()->with('success','slider request approved');
    }


    public function destroySlider($id){
        $slider=UniversitySlider::find($id);
        if ($slider->image && file_exists(public_path($slider->image))) {
            unlink(public_path($slider->image));
        }
        $slider->delete();
        return redirect()->route('admin.uni-requested-slider.index')->with('success','slider image disapproved');
        
        
    }
}
