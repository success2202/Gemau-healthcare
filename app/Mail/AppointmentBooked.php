<?php

namespace App\Mail;
use App\Models\BookAppoint;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentBooked extends Mailable
{
    use Queueable, SerializesModels;

   public $appointment;

    public function __construct(BookAppoint $appointment)
    {
        $this->appointment = $appointment;
    }

    public function build()
    {
        return $this->subject('New Appointment Booked')
                    ->view('emails.appointment_book');
    }
}
