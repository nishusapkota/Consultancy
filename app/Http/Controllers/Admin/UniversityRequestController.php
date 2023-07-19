<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequestUniversityDesc;
use App\Models\University;
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

    public function show($id){
        $reqUniversity=RequestUniversityDesc::find($id);
        return view('admin.university-request.show',compact('reqUniversity'));
    }
    public function update(Request $request,$id){
        
    //         $reqUniversity=RequestUniversityDesc::find($id);
    //         $request->validate([
    //             'email'=>'required|email|unique:users,email,except,',
    //         ]);
    //         if($request->hasFile('image')){
               
    //     if ($reqUniversity->image && file_exists(public_path($reqUniversity->image))) {
    //         unlink(public_path($reqUniversity->image));
    //    }
    //             $img_name=time()."_".$request->file('image')->getClientOriginalName();
    //             $request->file('image')->move(public_path('university/'),$img_name);
    //         }
    //         $reqUniversity->update([
    //             'email'=>$request->email,
    //             'address'=>$request->address,
    //             'uname'=>$request->uname,
    //             'details'=>$request->details,
    //             'image' => $request->hasfile('image') ? 'university/' . $img_name : $reqUniversity->image,

    //         ]);
          
    //         return redirect()->back()->with('success','Request for University detail submitted');
    //     }      
            DB::beginTransaction();
        try {
            $details=RequestUniversityDesc::find($id);
            $university=University::where('id',$details->university_id)->first();
            $university->update([
                'address'=>$details->address,
                'details'=>$details->details,
                'uname'=>$details->uname,
                'image'=>$details->image
            ]);
            $university->user->update([
                'email'=>$details->email
            ]);
            $details->delete();
            DB::commit();
            return redirect()->route('admin.uni-requested-university.index')->with('success','Request approved');
        } catch (\Illuminate\Database\QueryException $qe) {
            DB::rollBack();
            return redirect()->route('admin.uni-requested-university.index')->with('error','Something Went Wrong.Please Try agian.');       
         } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.uni-requested-university.index')->with('error','Something Went Wrong.Please Try agian');        }
        
        
         }

    public function destroy(RequestUniversityDesc $reqChange)
    {
        $reqChange->delete();
        return view('admin.university-request.index')->with('success', 'Request Disapproved');
    }

}