<?php

namespace App\Models;

use App\Models\CourseCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $fillable=[
        'cat_id',
        'name',
        'description',
        'status'
    ];
    function category(){
        return $this->belongsTo('\App\Models\CourseCategory','cat_id');
    }
}

