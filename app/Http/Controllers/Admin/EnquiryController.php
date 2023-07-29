<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Course;
use App\Models\University;
use Illuminate\Http\Request;
use App\Models\ContactEnquiry;
use App\Models\StudentEnquiry;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactEnquiryExport;
use App\Exports\StudentEnquiryExport;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexStudentEnquiry()
    {
        $enquiries = StudentEnquiry::with('level', 'university','course')->get();
        // dd($enquiries);
        return view('admin.enquiry.index',compact('enquiries'));
    }

    public function exportEnquiry(){
        return Excel::download(new StudentEnquiryExport, 'Student Enquiries.xlsx');
    }

    public function exportContactEnquiry(){
        return Excel::download(new ContactEnquiryExport, 'Contact Enquiries.xlsx');
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
