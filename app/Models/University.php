<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'address',
        'image',
        'details',
        'status'
    ];
    function courses(){
        return $this->belongsToMany(Course::class,'course_universities','university_id','course_id');
    }
}
