<?php

namespace App\Models;

use App\Models\Course;
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
}
