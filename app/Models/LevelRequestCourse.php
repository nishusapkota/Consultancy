<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelRequestCourse extends Model
{
    use HasFactory;
    protected $fillable=[
        'request_course_id',
        'level_id'
    ];
    function requestCourse(){
        return $this->belongsTo(RequestCourse::class);
    }
    function level(){
        return $this->belongsTo(Level::class);
    }
}
