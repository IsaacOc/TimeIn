<?php

namespace App\Listeners;

use App\Events\TimeIn;

use App\User;

use Illuminate\Support\Facades\URL;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class TimeInListener
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
     * @param  Event  $event
     * @return void
     */
    public function handle(TimeIn $event)
    {
        //call to User modal
        //creating instance then access method to send time_In notification to user email
       $user = Auth::User();
       $user->sendsNotificationsclockingIn();

    }
}
