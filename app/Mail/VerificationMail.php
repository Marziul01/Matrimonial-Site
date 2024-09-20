<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $verificationCode; // Make this public to access it in the view

    /**
     * Create a new message instance.
     *
     * @param string $verificationCode
     * @return void
     */
    public function __construct($verificationCode)
    {
        $this->verificationCode = $verificationCode; // Assign the code to the class property
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.verification') // Ensure this points to your Blade template
                    ->with([
                        'verificationCode' => $this->verificationCode, // Pass the code to the view
                    ]);
    }
}
