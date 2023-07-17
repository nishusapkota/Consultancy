<?php

namespace App\Models;

use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestCourse extends Model
{
    use HasFactory;
    protected $fillable=[
        'cat_id',
        'name',
        'description',
        'image',
        'university_id',
        'level_id'
    ];
    function category(){
        return $this->belongsTo(CourseCategory::class,'cat_id');
    }
    function levels(){
        return $this->belongsTo(Level::class);
    }
    function university(){
        return $this->belongsTo(University::class);
    }
    
}
