<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'comment', 'blog_id'];
    protected $table = "comments";

    public function blog()
{
    return $this->belongsTo(Blog::class);
}
}
