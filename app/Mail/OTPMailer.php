<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OTPMailer extends Mailable
{
    use Queueable, SerializesModels;
    private $token, $email, $host;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
        $this->host = config('app.url');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('One Time Pasword');
        return $this->view('mail.one-time-password', ['token' => $this->token, 'email' => $this->email, 'host' => $this->host]);
    }
}
