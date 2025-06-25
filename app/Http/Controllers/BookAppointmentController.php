<?php

namespace App\Http\Controllers;
use App\Mail\AppointmentBooked;
use validate;
use Illuminate\Support\Facades\Mail;
use App\Models\BookAppoint;
use Illuminate\Http\Request;

class BookAppointmentController extends Controller
{
    //
   public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => ['required', 'regex:/^[0-9\s\-\+\(\)]{10,20}$/'],
        'doctors' => 'required|string|max:255',
        'services' => 'required|string|max:255',
        'clinics' => 'required|string|max:255',
        'message' => 'nullable|string',
        'appointment_date' => 'required|date',
        'agree' => 'accepted'
    ]);

    $appointment = BookAppoint::create($data);

    Mail::to('support@gemauhealthcareservices.com')->send(new AppointmentBooked($appointment));

    return back()->with('success', 'Appointment booked successfully!');
}

}
