<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Models\UserStatus;
use Illuminate\Support\Facades\DB;


class AgentDetailController extends Controller
{
    public function index(Request $request)
    {
        // Vérifier si le formulaire a été soumis avec le type de service
        if ($request->has('serviceType')) {
            $serviceType = $request->input('serviceType');

            // Filtrer les agents en fonction du type de service choisi
            $agents = User::where('role', 'agent')
                        ->where(function($query) use ($serviceType) {
                            $query->where('assignment', $serviceType)
                                ->orWhere('assignment', 'les_deux');
                        })
                        ->leftJoin('user_statuses', 'users.id', '=', 'user_statuses.user_id')
                        ->where('user_statuses.status', 'disponible') // Ajouter la condition de disponibilité
                        ->select('users.*', 'user_statuses.status')
                        ->get();
        } else {
            // Si aucun type de service n'a été choisi, afficher tous les agents disponibles
            $agents = User::where('role', 'agent')
                        ->leftJoin('user_statuses', 'users.id', '=', 'user_statuses.user_id')
                        ->where('user_statuses.status', 'available') // Ajouter la condition de disponibilité
                        ->select('users.*', 'user_statuses.status')
                        ->get();
        }

        return view('agentdetail', compact('agents'));
    }

}
