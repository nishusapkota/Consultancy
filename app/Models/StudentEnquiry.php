<?php

namespace App\Models;

use App\Models\Level;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentEnquiry extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'contact',
        'email',
        'address',
        'level_id',
        'university_id',
        'course_id'
    ];
    public function level()
    {
        return $this->belongsTo(\App\Models\Level::class);
    }
    
public function university(){
    return $this->belongsTo('\App\Models\University');
}
public function course(){
    return $this->belongsTo('\App\Models\Course');
}
}