<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\UserStatus;
use Carbon\Carbon;
use Exception;

class StatusController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'status' => 'required|in:available,not_available',
        ]);

        if ($user->status) {
            $user->status->delete();
        }

        $userStatus = $user->status()->create([
            'status' => $request->status,
        ]);

        $lastUpdated = $userStatus->updated_at->diffForHumans();

        return redirect()->back()->with('success', 'Statut mis à jour avec succès.');
    }
}
