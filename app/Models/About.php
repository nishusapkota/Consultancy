<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'description'
    ];
    public function images(){
        return $this->hasMany(AboutImage::class,'about_id');
    }
}
