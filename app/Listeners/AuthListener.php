<?php

namespace App\Listeners;

use App\Events\UsersActions;
use App\Mail\UserRegistered;
use App\User;
use App\UsersRegistrationsLogs;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
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
        $this->sendMail($event);

        /*
         * Logging registrations of users.
         * */
        UsersRegistrationsLogs::create([
            'user_id' => $event->user->id,
            'registered_at' => $event->user->created_at
        ]);
    }

    /**
     * @param User $user
     * */
    protected function sendMail($user)
    {
        try {
            Mail::to($user->user)->send(new UserRegistered($user->user));
        } catch (\Exception $e) {
            Log::error("can't send confirnation email");
        }
    }
}
