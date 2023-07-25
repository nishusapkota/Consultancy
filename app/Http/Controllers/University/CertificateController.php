<?php

namespace App\Http\Controllers\University;

use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\RequestCertificate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index()
    {
        $u_id = Auth::user()->university_id;
        $certificates = Certificate::where('university_id', $u_id)->get();
        return view('university.certificate.index', compact('certificates'));
    }

    public function requestIndex()
    {
        $u_id = Auth::user()->university_id;
        $certificates = RequestCertificate::where('university_id', $u_id)->get();
        return view('university.request-certificate.index', compact('certificates'));
    }

    public function requestCreate()
    {
        return view('university.request-certificate.create');
    }

    public function requestStore(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg'
        ]);
        $img_name = time() . "_" . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('certificate'), $img_name);
        RequestCertificate::create([
            'image' => 'certificate/' . $img_name,
            'university_id' => Auth::user()->university_id
        ]);
        return redirect()->route('university.request-certificate.index')->with('success', 'Certificate created successfully');
    }
    public function requestEdit($id)
    {
        $certificate= RequestCertificate::find($id);
        return view('university.request-certificate.edit', compact('certificate'));
    }
    // public function requestUpdate(Request $request, $id)
    // {
    //     // dd($request->all());
    //     $certificate = RequestCertificate::find($id);
    //     $request->validate([
    //         'image' => 'nullable'
    //     ]);
    //     if ($request->hasFile('image')) {
    //             unlink(public_path($certificate->image));
    //             $image = $request->file('image');
    //             $img_name = time()."_".$image->getClientOriginalName();
    //             $image->move(public_path('certificate'), $img_name);
    //             $certificate->update([
    //                 'image' => 'certificate/' . $img_name
    //             ]);
    //             return redirect()->route('university.request-certificate.index')->with('success', 'Certificate Image updated successfully');
    //         }
    //        return redirect()->back();
    //     }
    
    public function requestUpdate(Request $request, $id)
{
    // dd($certificate->all());
    // $request->validate([
    //     'image' => 'image|mimes:png,jpg'
    // ]);

    // Find the existing certificate record by ID
    $certificate = RequestCertificate::findOrFail($id);
 
    if ($request->hasFile('image')) {
        unlink(public_path($certificate->image));
        // If a new image is uploaded, update the image
        $img_name = time() . "_" . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('certificate'), $img_name);
        $certificate->image = 'certificate/' . $img_name;
    }
    $certificate->save();

    return redirect()->route('university.request-certificate.index')->with('success', 'Certificate updated successfully');
}

    
   public function requestDelete($id) {
    $certificate=RequestCertificate::find($id);
    if ($certificate->image && file_exists(public_path($certificate->image))) {
        unlink(public_path($certificate->image));
    }
    $certificate->delete();
    return redirect()->route('university.request-certificate.index')->with('success', 'Certificate Image deleted successfully');

        
    }

    public function delete($id) {
        $certificate=Certificate::find($id);
        if ($certificate->image && file_exists(public_path($certificate->image))) {
            unlink(public_path($certificate->image));
        }
        $certificate->delete();
        return redirect()->route('university.certificate.index')->with('success', 'Certificate Image deleted successfully');
    
            
        }
    
    

}
