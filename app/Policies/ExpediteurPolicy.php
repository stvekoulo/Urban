<?php

namespace App\Policies;

use App\Models\User;

class ExpediteurPolicy
{
    public function viewDashboard(User $user)
    {
        return $user->role === 'expediteur';
    }
}
