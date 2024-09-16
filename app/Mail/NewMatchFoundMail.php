<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewMatchFoundMail extends Mailable
{
    use Queueable, SerializesModels;

    public $matchedUser;
    public $newProfile;

    /**
     * Create a new message instance.
     *
     * @param $matchedUser
     * @param $newProfile
     * @return void
     */
    public function __construct($matchedUser, $newProfile)
    {
        $this->matchedUser = $matchedUser;
        $this->newProfile = $newProfile;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Match Found!')
                    ->view('emails.new_match_found')
                    ->with([
                        'matchedUser' => $this->matchedUser,
                        'newProfile' => $this->newProfile,
                    ]);
    }
}
