<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

/**
     * Create a new message instance.
     *
     * @return void
     */

protected $user;

public function __construct(\App\User $user)
    {
        $this->user = $user;
    }

/**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.RegisterMail')->with([
            'link'=>route('activating-account',$this->user->token_register)
        ]);
    }
}