<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOtp extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Welcome to Wan Lanka')
                    ->html('<p>You have successfully registered with Wan Lanka.</p>');
    }
}