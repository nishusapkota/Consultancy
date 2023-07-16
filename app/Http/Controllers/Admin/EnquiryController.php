<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Course;
use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactEnquiry;
use App\Models\StudentEnquiry;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStudentEnquiry()
    {
        $enquiries = StudentEnquiry::with('level', 'university', 'course')->get();
        return view('admin.enquiry.index',compact('enquiries'));
    }

    public function indexGeneralEnquiry()
    {
        $enquiries = ContactEnquiry::get();
        return view('admin.enquiry.contactEnquiry',compact('enquiries'));
    }
    public function deleteGeneralEnquiry($id)
    {
        $enquiries = ContactEnquiry::find($id);
            $enquiries->delete();
            return redirect()->back()->with('success','Deleted successfully');
    }
    function deleteindexGeneralEnquiry($id)  {
        $enquiries = StudentEnquiry::find($id);
        $enquiries->delete();
        return redirect()->back()->with('success','Deleted successfully');
    }
    
    
}
