<?php

namespace App\Models;

use App\Models\Course;
use App\Models\StudentEnquiry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;
    protected $fillable=[
        'status',
        'name'
    ];
    function courses(){
        return $this->belongsToMany(Course::class,'course_levels','level_id','course_id');
    }
    function enquiries(){
        return $this->hasMany(StudentEnquiry::class);
    }
    
    function reqCourses(){
        return $this->belongsToMany(RequestCourse::class,'level_request_courses','level_id','request_course_id');
    }
}

