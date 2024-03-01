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

            $notifications = Notification::where('agent_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();

            return view('agent.home')->with('statusText', $statusText)->with('user', $user)->with('lastUpdated', $lastUpdated)->with('notifications', $notifications);
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
            'description' => 'nullable',
            'prix' => 'required|numeric',
        ]);

        $notificationId = $validatedData['notification_id'];

        $notification = Notification::findOrFail($notificationId);
        $expediteur_id = $notification->user_id;

        $service = new Service();
        $service->notification_id = $notificationId;
        $service->description = $validatedData['description'];
        $service->prix = $validatedData['prix'];
        $service->save();

        $notification->update(['read' => true]);

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
