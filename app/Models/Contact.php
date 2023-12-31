<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'short_description',
        'address',
        'phone_primary',
        'phone_secondary',
        'email_primary',
        'email_secondary'
    ];
}
