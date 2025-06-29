<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'views', 'content', 'image'];
    protected $table = "blogs";

    public function comments()
{
    return $this->hasMany(Comment::class);
}
}
