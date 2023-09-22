<?php

namespace App\Listeners;

use App\Events\FestivalCreated;
use App\Models\User;
use App\Notifications\NewFestival;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendFestivalCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FestivalCreated $event): void
    {
        foreach (User::whereNot('id', $event->festival->user_id)->cursor() as $user) {
            $user->notify(new NewFestival($event->festival));
        }
    }
}
