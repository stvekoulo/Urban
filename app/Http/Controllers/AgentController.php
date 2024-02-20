<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Redirect;

class AgentController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        $status = $user->status ? $user->status->status : 'Non défini';
        $statusText = '';

        switch ($status) {

            case 'available':
                $statusText = 'Disponible';
                break;
            case 'not_available':
                $statusText = 'Non disponible';
                break;
            default:
                $statusText = 'Statut inconnu';
        }

        $lastUpdated = $user->status ? $user->status->updated_at->diffForHumans() : 'Non disponible';

        return view('agent.home')->with('statusText', $statusText)->with('user', $user)->with('lastUpdated', $lastUpdated);
    }

    public function status()
    {
        $user = auth()->user();
        $status = $user->status ? $user->status->status : 'Non défini';
        $statusText = '';

        switch ($status) {
            case 'available':
                $statusText = 'Disponible';
                break;
            case 'not_available':
                $statusText = 'Non disponible';
                break;
            default:
                $statusText = 'Statut inconnu';
        }
        return view('agent.status')->with('statusText', $statusText)->with('user', $user);
    }

    public function toggleStatus(Request $request)
    {
        // Récupérer l'utilisateur connecté
        $user = auth()->user();

        // Vérifier si les informations du profil sont complètes
        if (!$this->profilIsComplete($user)) {
            // Rediriger l'utilisateur vers la page de complétion du profil
            return redirect()->route('profil.edit')->with('warning', 'Veuillez compléter vos informations de profil avant de changer votre statut.');
        }

        // Changer le statut de l'utilisateur
        $user->status()->updateOrCreate([], ['status' => $user->status->status === 'available' ? 'not_available' : 'available']);

        // Retourner une réponse JSON avec un message de succès
        return response()->json(['success' => 'Statut mis à jour avec succès']);
    }

    private function profilIsComplete($user)
    {
        // Vérifier si toutes les informations du profil sont remplies
        return !empty($user->phone_number) && !empty($user->whatsapp_link) && !empty($user->national_id) && !empty($user->photo);
    }
}
