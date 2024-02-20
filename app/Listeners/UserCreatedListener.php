<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Models\UserStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UserCreatedListener
{
    public function handle(UserCreated $event)
    {
        if ($event->user->role === 'agent') {
            UserStatus::create([
                'user_id' => $event->user->id,
                'status' => 'not_available',
            ]);
        }
    }
}
