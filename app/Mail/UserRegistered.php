<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\URL;

class UserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User $user
     * */
    protected $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @return void
     */
    public function __construct(User $user)
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
        $confirmedLink = url('/confirm/'.$this->user->confirmation_hash);
        return $this->from('admin@testtask.loc')
            ->view('emails.confirm-email')
            ->with([
                'userName' => $this->user->name,
                'userEmail' => $this->user->email,
                'confirmedLink' => $confirmedLink
            ]);
    }
}
