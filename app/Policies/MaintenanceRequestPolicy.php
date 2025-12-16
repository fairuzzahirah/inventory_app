<?php

namespace App\Policies;

use App\Models\MaintenanceRequest;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MaintenanceRequestPolicy
{
    public function create(User $user)
    {
        return $user->role === 'pelapor';
    }

    public function assign(User $user)
    {
        return $user->role === 'admin';
    }

    public function updateStatus(User $user, MaintenanceRequest $request)
    {
        if ($user->role === 'admin') {
            return true;
        }

        return $request->technicians->contains($user->id);
    }
}

