<?php

namespace App\Policies;

use App\Models\User;

class AgentPolicy
{
    public function viewDashboardagen(User $user)
    {
        return $user->role === 'agent';
    }
}
