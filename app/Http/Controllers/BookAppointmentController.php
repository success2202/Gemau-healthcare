<?php

namespace App\Http\Controllers;

use validate;

use App\Models\BookAppoint;
use Illuminate\Http\Request;

class BookAppointmentController extends Controller
{
    //
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => ['required', 'regex:/^[0-9\s\-\+\(\)]{10,20}$/'],
        'doctors' => 'required|string|max:255',
        'services' => 'required|string|max:255',
        'clinics' => 'required|string|max:255',
        'message' => 'nullable|string',
        'appointment_date' => 'required|date',
    ]);

    BookAppoint::create($request->only([
        'name', 'email', 'phone', 'doctors', 'clinics', 'message', 'appointment_date'
    ]));

    return back()->with('success', 'Appointment booked successfully!');
}

}
