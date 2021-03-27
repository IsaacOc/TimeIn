<?php

namespace App\Listeners;

use App\Events\Links;
use App\pagehit;

use App\User;

use Illuminate\Support\Facades\URL;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class LinkListener
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
    public function handle(Links $event)
    {
        //save page url and uthenticates user email to pagehit table
        $pagehit = pagehit::create([
               
            'url' => URL::current(),
            'name' => Auth::user()->email,
                         
        ]);

       $user = new User();
       $user->sendsNotificationsclockingIn();

    }
}
