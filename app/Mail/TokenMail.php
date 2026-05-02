<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TokenMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code;
    public $user;

    public function __construct($code, User $user)
    {
        $this->code = $code;
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Your Verification Code')
                    ->view('emails.token-mail')
                    ->with(['code' => $this->code]);
    }
}