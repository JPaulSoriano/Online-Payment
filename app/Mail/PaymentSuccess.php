<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Payment;

class PaymentSuccess extends Mailable
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
        $url = url('/status?status='.$this->student['ref_no']);
        
        return $this->markdown('emails.success', [
            'url' => $url,
        ]);
    }
}
