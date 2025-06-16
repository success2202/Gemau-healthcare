<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAppoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'service', 'message', 'doctors', 'clinics', 'appointment_date', 'approve'
    ];

   
}
