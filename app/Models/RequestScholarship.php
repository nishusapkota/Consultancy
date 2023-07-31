<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestScholarship extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description',
        'image',
        'university_id',
        'status'
    ];
    function university(){
       return $this->belongsTo(University::class); 
    }
}
