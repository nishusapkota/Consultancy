<?php

namespace App\Http\Controllers\Admin;

use App\Models\Scholarship;
use Illuminate\Http\Request;
use App\Models\RequestScholarship;
use App\Http\Controllers\Controller;

class RequestScholarshipController extends Controller
{
    public function index()
    {
        $scholarships = RequestScholarship::all();
        return view('admin.request-scholarship.index', compact('scholarships'));
    }
    public function changeStatus( $id)
    {
        $scholarship = RequestScholarship::find($id);
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

    public function update($id){
        $details = RequestScholarship::find($id);
        $data = [
            'title' => $details['title'],
            'description' =>$details['description'],
            'image' => $details['image'],
            'university_id'=>$details['university_id'],
            'status' => '0' 
        ];    
        $scholarship = Scholarship::create($data);
        $details->delete();
        return redirect()->route('admin.uni-requested-scholarship.index')->with('success', 'Course Request approved successfully.');
    
    }

    public function destroy($id){
        $details = RequestScholarship::find($id);
        if (!$details) {
            return redirect()->back()->with('error', 'No Such Request foud');
        }
        else{
            if ($details->image && file_exists(public_path($details->image))) {
                unlink(public_path($details->image));
            }
            $details->delete();
            return redirect()->back()->with('success', 'Request Disapproved');
            
        }
        
    }


}
