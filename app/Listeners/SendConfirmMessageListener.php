<?php

namespace App\Listeners;

use App\Events\SendConfirmMessageEvent;
use App\Mail\SendConfirmationMessageMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendConfirmMessageListener
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
     * @param  SendConfirmMessageEvent  $event
     * @return void
     */
    public function handle(SendConfirmMessageEvent $event)
    {
        $user = $event->user;
        $email = $event->email;

        Mail::to($email)->send(new SendConfirmationMessageMail($user));
    }
}
