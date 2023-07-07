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
        'name',
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
    function users(){
        return $this->hasMany(User::class);
    }
}
