<?php

namespace App\Mail;

use App\Models\User;
use App\Models\UserVerify;
use App\Http\Controllers\Auth;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Summary of __construct
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Summary of build
     * @return VerifyEmail
     */
    public function build()
    {
        return $this->subject('Potwierdzenie adresu e-mail')
            ->view('auth.emails.verify');
    }
}