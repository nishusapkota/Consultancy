<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=[
        'address',
        'phone',
        'toll_free_no',
        'email[0]',
        'email[1]'
    ];
}
