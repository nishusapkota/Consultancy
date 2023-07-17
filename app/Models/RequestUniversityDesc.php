<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestUniversityDesc extends Model
{
    use HasFactory;
    protected $fillable=[
        'details',
        'university_id'
    ];
    public function university(){
        return $this->belongsTo(University::class);
    }
}
