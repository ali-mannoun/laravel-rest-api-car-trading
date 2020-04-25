<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $user; //Laravel injects automatically this public attribute inside the view . So we don't need to pass the value of the user explicitly.

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    /**
     * Build the message.
     * This method executed automatically by laravel when we send an instance.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email_welcome');
    }
}
