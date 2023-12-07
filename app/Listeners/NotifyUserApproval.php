<?php

namespace App\Listeners;

use App\Notifications\ApprovalRequired;

class NotifyUserApproval
{
    public $user;

    /**
     * Create the event listener.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $event->user->notify(new ApprovalRequired($event->user));
    }
}
