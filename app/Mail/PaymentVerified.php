<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Payment;

class PaymentVerified extends Mailable
{
    use Queueable, SerializesModels;

    public Payment $student;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Payment $student)
    {
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.verified')->subject('Payment Verified');
    }
}
