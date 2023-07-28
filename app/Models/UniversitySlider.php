<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversitySlider extends Model
{
    use HasFactory;
    protected $fillable=[
        'image',
        'university_id',
        'ext'
    ];

    public function university(){
        return $this->belongsTo(University::class);
    }
}
