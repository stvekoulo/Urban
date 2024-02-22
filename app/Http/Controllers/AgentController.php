<?php

namespace App\Http\Controllers;

use App\Models\UserStatus;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AgentController extends Controller
{
    public function home()
{
    if (Auth::check() && Auth::user()->role === 'agent') {

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

        // Récupérez les notifications pour l'agent connecté
        $notifications = Notification::where('agent_id', $user->id)->orderBy('created_at', 'desc')->get();

        // Passer les notifications à la vue
        return view('agent.home')->with('statusText', $statusText)
                                  ->with('user', $user)
                                  ->with('lastUpdated', $lastUpdated)
                                  ->with('notifications', $notifications);
    } else {

        return redirect()->route('welcome')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
    }
}

    public function status()
    {

        if (Auth::check() && Auth::user()->role === 'agent') {

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
        } else {

            return redirect()->route('welcome')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }

    public function toggleStatus(Request $request)
    {

        if (Auth::check() && Auth::user()->role === 'agent') {

            $user = auth()->user();

            if (!$this->profilIsComplete($user)) {
                return redirect()->route('profil.edit')->with('warning', 'Veuillez compléter vos informations de profil avant de changer votre statut.');
            }

            $user->status()->updateOrCreate([], ['status' => $user->status->status === 'available' ? 'not_available' : 'available']);

            return response()->json(['success' => 'Statut mis à jour avec succès']);
        } else {

            return response()->json(['error' => 'Vous n\'êtes pas autorisé à effectuer cette action.'], 403);
        }
    }

    private function profilIsComplete($user)
    {
        return !empty($user->phone_number) && !empty($user->whatsapp_link) && !empty($user->national_id) && !empty($user->photo);
    }
}
