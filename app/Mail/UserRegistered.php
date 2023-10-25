<?php
// app/Mail/UserRegistered.php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.userregistered')
            ->subject('Registrasi Berhasil - Informasi Akun')
            ->with([
                'name' => $this->user->name,
                'email' => $this->user->email,
            ]);
    }
}
