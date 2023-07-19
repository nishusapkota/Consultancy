<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\RequestCertificate;
use App\Http\Controllers\Controller;

class CertificateRequestController extends Controller
{
   public function index(){
        $certificates=RequestCertificate::all();
        return view('admin.certificate-request.index',compact('certificates'));
    }
    public function update($id){
        $reqCertificate=RequestCertificate::find($id);
        Certificate::create([
            'image'=>$reqCertificate->image,
            'university_id'=>$reqCertificate->university_id
        ]);
        $reqCertificate->delete();
        return redirect()->back()->with('success','Certificate request approved');
    }
    public function destroy($id){
        $certificate=RequestCertificate::find($id);
        if ($certificate->image && file_exists(public_path($certificate->image))) {
            unlink(public_path($certificate->image));
        }
        $certificate->delete();
        return redirect()->route('admin.uni-requested-certificate.index')->with('success','certificate image disapproved');
        
        
    }
}
