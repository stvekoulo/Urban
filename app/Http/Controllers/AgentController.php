<?php

namespace App\Http\Controllers;

use App\Models\UserStatus;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Service;

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

            $notifications = Notification::where('agent_id', $user->id)->orderBy('created_at', 'desc')->get();

            return view('agent.home')->with('statusText', $statusText)
                                    ->with('user', $user)
                                    ->with('lastUpdated', $lastUpdated)
                                    ->with('notifications', $notifications);
        } else {

            return redirect()->route('welcome')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }

    public function clearNotifications()
    {
        $agentId = auth()->user()->id;
        Notification::where('agent_id', $agentId)->delete();

        return redirect()->back()->with('success', 'Toutes les notifications ont été effacées avec succès');
    }

    public function acceptNotification(Request $request)
    {
        $validatedData = $request->validate([
            'notification_id' => 'required|exists:notifications,id',
            'description' => 'nullable|required_if:service_type,livreur',
            'prix' => 'required|numeric',
        ]);

        // Récupérer l'objet Notification correspondant à l'ID
        $notification = Notification::findOrFail($validatedData['notification_id']);

        // Récupérer l'ID de l'utilisateur qui a envoyé la notification
        $expediteur_id = $notification->user_id;

        // Créer une nouvelle instance de modèle Service
        $service = new Service();

        // Remplir les champs du modèle Service
        $service->agent_id = auth()->id(); // L'ID de l'utilisateur connecté
        $service->expediteur_id = $expediteur_id; // L'ID de l'utilisateur qui a envoyé la notification
        $service->description = $validatedData['description'];
        $service->prix = $validatedData['prix'];

        // Enregistrer le service dans la base de données
        $service->save();

        // Supprimer la notification une fois le service enregistré
        $notification->delete();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Notification acceptée avec succès et service enregistré.');
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
