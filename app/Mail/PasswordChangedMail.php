<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        return $this->subject('Wan Lanka Password Changed')
                    ->html('<p>Your Wan Lanka password was successfully changed. If you did not perform this action, please contact support immediately.</p>');
    }
}
