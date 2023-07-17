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
        $reqChanges = RequestUniversityDesc::with('university')->get();
        //  dd($reqChanges->university->uname);
        return view('admin.university-request.index', compact('reqChanges'));
    }

    public function update(Request $request,$id){
        
        DB::beginTransaction();
        try {

            $details=RequestUniversityDesc::find($id);
            $university=University::where('id',$details->university_id)->first();
            $university->update([
                'details'=>$details->details
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
