<?php

namespace App\Models;

use App\Models\User;
use App\Models\StudentEnquiry;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class University extends Model
{
    use HasFactory;
    protected $fillable=[
        'uname',
        'address',
        'image',
        'details',
        'status'
    ];
    function courses(){
        return $this->belongsToMany(Course::class,'course_universities','university_id','course_id');
    }
    function enquiries(){
        return $this->hasMany(StudentEnquiry::class);
    }
    function user(){
        return $this->hasOne(User::class);
    }
    function scholarship(){
        return $this->hasOne(Scholarship::class);
    }
    function universityImages(){
        return $this->hasMany(UniversityImage::class);
    }
    function certificates(){
        return $this->hasMany(Certificate::class);
    }
    function requestUniversity(){
        return $this->hasOne(RequestUniversityDesc::class);
    }
    function req_courses(){
        return $this->hasMany(RequestCourse::class);
    }

}
