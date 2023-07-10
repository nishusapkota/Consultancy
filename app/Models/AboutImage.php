<?php

namespace App\Models;

use App\Models\About;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutImage extends Model
{
    use HasFactory;
    protected $fillable=[
        'image','about_id'
    ];
    public function about(){
        return $this->belongsTo(About::class);
    }
}
