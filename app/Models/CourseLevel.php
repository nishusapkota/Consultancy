<?php

namespace App\Models;

use App\Models\Level;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseLevel extends Model
{
    use HasFactory;
    protected $fillable =[
        'course_id',
        'level_id'
    ];
function  course() {
    return $this->belongsTo(Course::class);
}
function  level() {
    return $this->belongsTo(Level::class);
}

}
