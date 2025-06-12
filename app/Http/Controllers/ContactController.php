<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactSubmit(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => ['required', 'regex:/^[0-9\s\-\+\(\)]{10,20}$/'],
        'email' => 'required|email',
        'message' => 'required|string'
    ]);

    $details = $request->only(['name', 'phone', 'email', 'message']);

    Mail::to('successceejay@gmail.com')->send(new ContactMail($details));

    return back()->with('success', 'Your message has been sent!');
}
}
