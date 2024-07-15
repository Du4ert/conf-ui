<?php

// app/Listeners/SendAdminNotification.php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Events\Verified;
use App\Notifications\NewUserRegisteredNotification;
use App\Models\User;

class SendAdminNotification
{
    use InteractsWithQueue;

    public function handle(Verified $event)
    {
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            $admin->notify(new NewUserRegisteredNotification($event->user));
        }
    }
}