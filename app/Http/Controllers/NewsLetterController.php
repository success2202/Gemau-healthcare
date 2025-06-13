<?php

namespace App\Http\Controllers;

use validate;
use Illuminate\Http\Request;
use App\Models\NewsletterSubscriber;

class NewsLetterController extends Controller
{
    //
    public function subscribe(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:newsletter_subscribers,email',
    ]);

    NewsletterSubscriber::create([
        'email' => $request->email,
        'subscribed_at' => now(),
    ]);

    return back()->with('success', 'You have successfully subscribed!');
}


}
