<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookAppoint;
use App\Mail\AppointmentBooked;
use Illuminate\Support\Facades\Mail;
class AppointmentController extends Controller
{
    //
     public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'appointment_date' => 'required|date',
            'message' => 'nullable|string',
        ]);

        $appointment = BookAppoint::create($data);

        // Send email to admin
        Mail::to('successceejay@gmail.com')->send(new AppointmentBooked($appointment));

        return back()->with('success', 'Appointment booked and admin notified!');
    }
}
