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

        if (!$this->profilIsComplete($user)) {
            return redirect()->route('profil.edit')->with('warning', 'Veuillez compléter vos informations de profil avant de changer votre statut.');
        }

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

    private function profilIsComplete($user)
    {
        return !empty($user->phone_number) && !empty($user->whatsapp_link) && !empty($user->national_id) && !empty($user->photo);
    }
}
