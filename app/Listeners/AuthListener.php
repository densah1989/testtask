<?php

namespace App\Listeners;

use App\Events\UsersActions;
use App\Mail\UserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class AuthListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UsersActions  $event
     * @return void
     */
    public function handle(UsersActions $event)
    {
        Mail::to($event->user)->send(new UserRegistered($event->user));
    }
}
