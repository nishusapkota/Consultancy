<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use App\Models\University;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function levels(Request $request)
    {
        $levels=Level::when($request->exists('university_id')&&!is_null($request->university_id),function($q)use($request){
            $q->whereHas('courses.universities',function($query)use($request){
                $query->whereIn('universities.id',$request->university_id);
            });
        })
        ->when($request->exists('course_id')&&!is_null($request->course_id),function($q)use($request){
            $q->whereHas('courses',function($query)use($request){
                $query->whereIn('courses.id',$request->course_id);
            });
        })
        ->get(['id','name']);
        return json($levels,200);
    }
    public function courses(Request $request)
    {
        $courses=Course::
                    when($request->exists('university_id')&&!is_null($request->university_id),function($q)use($request){
                        $q->whereHas('universities',function($query)use($request){
                            $query->whereIn('universities.id',$request->university_id);
                        });
                    })
                    ->when($request->exists('level_id')&&!is_null($request->level_id),function($q)use($request){
                        $q->whereHas('levels',function($query)use($request){
                            $query->whereIn('levels.id',$request->level_id);
                        });
                    })
                    ->get();
        return json($courses,200);
    }
    public function universitys(Request $request)
    {
        $courses=University::
        when($request->exists('level_id')&&!is_null($request->level_id),function($q)use($request){
            $q->whereHas('courses.levels',function($query)use($request){
                $query->whereIn('levels.id',$request->level_id);
            });
        })
        ->when($request->exists('course_id')&&!is_null($request->course_id),function($q)use($request){
            $q->whereHas('courses',function($query)use($request){
                $query->whereIn('courses.id',$request->course_id);
            });
        })
                    ->get();
        return json($courses,200);
    }
}
