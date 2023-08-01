<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestUniversityDesc extends Model
{
    use HasFactory;
    protected $fillable=[
        'email',
        'address',
        'uname',
        'image',
        'details',
        'university_id',
        'fee_structure'
    ];
    public function university(){
        return $this->belongsTo(University::class);
    }
}
