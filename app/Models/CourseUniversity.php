<?php

namespace App\Models;

use App\Models\Course;
use App\Models\University;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseUniversity extends Model
{
    use HasFactory;
    protected $fillable=[
        'course_id',
        'university_id'
    ];
    function course(){
        return $this->belongsTo(Course::class);
    }
    function university(){
        return $this->belongsTo(University::class);
    }
}
