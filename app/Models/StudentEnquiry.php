<?php

namespace App\Models;

use App\Models\Level;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentEnquiry extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'level_id',
        'message',
        'course_id',
        'university_id',
    ];
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
