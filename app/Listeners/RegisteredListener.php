<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class RegisteredListener
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {

       
        if($event->user->type == 1) {
            return Mail::to($event->user)->send(new \App\Mail\RegisterMail($event->user));
        } else {
             return Mail::to($event->user)->send(new \App\Mail\UploadMail($event->user));
        }
        
    }
}