<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function submitComment(Request $request , Blog $blog)
{
    $request->validate([
        'name' => 'required|string|max:255',
       
        'email' => 'required|email',
        'comment' => 'required|string'
    ]);

     $blog->comments()->create([
        'name' => $request->name,
        'email' => $request->email,
        'comment' => $request->comment
        
    ]);

    return back()->with('success', 'sent!');

    
}
}
