<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $signUpLink;
    /**
     * Create a new message instance.
     *
     * @param string $signUpLink
     */
    public function __construct($signUpLink)
    {
        $this->signUpLink = $signUpLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Invitation to Join Our Platform')
            ->view('emails.invite')
            ->with(['signUpLink' => $this->signUpLink]);
    }
}
