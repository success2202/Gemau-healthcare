<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;
    protected $table = "testimonials";
     protected $fillable = [
        'name', 'title', 'content', 'image_path'
    ];


}
