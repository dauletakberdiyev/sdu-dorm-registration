<?php

namespace App\Listeners;

use App\Mail\ResetPasswordMail;
use Carbon\Carbon;

use App\Events\SendForgotPasswordLinkMailEvent;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;

class SendForgotPasswordLinkMailListener
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
     * @param  SendForgotPasswordLinkMailEvent  $event
     * @return void
     */
    public function handle(SendForgotPasswordLinkMailEvent $event)
    {
        $user = $event->user;

        $encrypting = $user['applicant_email']."$".Carbon::now()->addHour(5)."$".Carbon::now();
        $user['token'] = Crypt::encryptString($encrypting);

        Mail::to($user['applicant_email'])->send(new ResetPasswordMail($user));
    }
}
