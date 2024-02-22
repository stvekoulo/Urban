<?php

namespace App\Http\Controllers;

use App\Models\UserStatus;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;


class AgentDetailController extends Controller
{
    /**
     * Affiche les détails de l'agent sélectionné.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index(Request $request, $id)
    {
        if (Auth::check() && Auth::user()->role === 'expediteur') {

            if ($request->has('serviceType')) {
                $serviceType = $request->input('serviceType');

                $agents = User::where('role', 'agent')
                            ->where(function($query) use ($serviceType) {
                                $query->where('assignment', $serviceType)
                                    ->orWhere('assignment', 'les_deux');
                            })
                            ->leftJoin('user_statuses', 'users.id', '=', 'user_statuses.user_id')
                            ->where('user_statuses.status', 'available')
                            ->select('users.*', 'user_statuses.status')
                            ->get();
            } else {
                $agents = User::where('role', 'agent')
                            ->leftJoin('user_statuses', 'users.id', '=', 'user_statuses.user_id')
                            ->where('user_statuses.status', 'available')
                            ->select('users.*', 'user_statuses.status')
                            ->get();
            }

            $selectedAgent = User::findOrFail($id);

            return view('agentdetail', compact('agents', 'selectedAgent'));
        } else {
            return redirect()->route('welcome')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }

    public function envoyerDemande(Request $request, $agentId): JsonResponse
    {
        // Vérifiez si l'utilisateur est connecté en tant qu'expéditeur
        if (Auth::check() && Auth::user()->role === 'expediteur') {

            // Récupérer le nom de l'utilisateur connecté
            $nomUtilisateur = Auth::user()->name;

            // Votre logique pour envoyer la demande à l'agent...

            // Création d'une nouvelle notification pour l'agent avec le nom de l'utilisateur
            Notification::create([
                'agent_id' => $agentId,
                'message' => "Vous avez reçu une nouvelle demande de service de $nomUtilisateur.",
            ]);

            return response()->json(['success' => true, 'message' => 'Demande envoyée avec succès']);

        } else {
            return response()->json(['success' => false, 'message' => 'Vous n\'êtes pas autorisé à accéder à cette page.'], 403);
        }
}
}
