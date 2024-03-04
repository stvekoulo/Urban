<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\UserStatus;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AgentController extends Controller
{
    public function home(Request $request)
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

            $services = Service::whereHas('notification', function ($query) use ($user) {
                $query->where('agent_id', $user->id);
            })->get();

            $servicesPayes = Service::whereHas('notification', function ($query) use ($user) {
                $query->where('agent_id', $user->id);
            })
                ->where('payer', 1)
                ->sum('prix');

            $servicesPayesToday = Service::whereDate('created_at', Carbon::today())->where('payer', 1)->sum('prix');

            $servicesPayesYesterday = Service::whereDate('created_at', Carbon::yesterday())->where('payer', 1)->sum('prix');

            $date_debut = $request->input('date_debut');
            $date_fin = $request->input('date_fin');

            $date_debut = Carbon::parse($date_debut)->startOfDay();
            $date_fin = Carbon::parse($date_fin)->endOfDay();

            $serviceintervalle = Service::whereBetween('created_at', [$date_debut, $date_fin])
                ->with('notification')
                ->get();

            return view('agent.home')->with('statusText', $statusText)->with('user', $user)->with('lastUpdated', $lastUpdated)->with('notifications', $notifications)->with('services', $services)->with('serviceintervalle', $serviceintervalle)->with('servicesPayes', $servicesPayes)->with('servicesPayesToday', $servicesPayesToday)->with('servicesPayesYesterday', $servicesPayesYesterday)->with('date_debut', $date_debut)->with('date_fin', $date_fin);
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

    public function interval(Request $request)
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

        $notifications = Notification::where('agent_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $services = Service::whereHas('notification', function ($query) use ($user) {
            $query->where('agent_id', $user->id);
        })->get();

        $servicesPayes = Service::whereHas('notification', function ($query) use ($user) {
            $query->where('agent_id', $user->id);
        })
            ->where('payer', 1)
            ->sum('prix');

        $servicesPayesToday = Service::whereDate('created_at', Carbon::today())->where('payer', 1)->sum('prix');

        $servicesPayesYesterday = Service::whereDate('created_at', Carbon::yesterday())->where('payer', 1)->sum('prix');

        $date_debut = $request->input('date_debut');
        $date_fin = $request->input('date_fin');

        $date_debut = Carbon::parse($date_debut)->startOfDay();
        $date_fin = Carbon::parse($date_fin)->endOfDay();

        $serviceintervalle = Service::whereBetween('created_at', [$date_debut, $date_fin])
            ->with('notification')
            ->get();

        return view('agent.home')->with('statusText', $statusText)->with('user', $user)->with('lastUpdated', $lastUpdated)->with('notifications', $notifications)->with('services', $services)->with('serviceintervalle', $serviceintervalle)->with('servicesPayes', $servicesPayes)->with('servicesPayesToday', $servicesPayesToday)->with('servicesPayesYesterday', $servicesPayesYesterday)->with('date_debut', $date_debut)->with('date_fin', $date_fin);
    }
}
