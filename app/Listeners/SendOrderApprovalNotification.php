<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\User;
use App\Notifications\OrderApprovalNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOrderApprovalNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     */
    public function handle(OrderCreated $event)
    {
        $order = $event->order;

        if ( $order->needsApproval() ) {
            $admins = User::where('role', 'supervisor')->get();

            foreach ($admins as $admin) {
                $admin->notify( new OrderApprovalNotification( $order ) );
            }
        }
    }
}
