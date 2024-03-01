<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Support\Facades\DB;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    public function index()
    {
        $agents = User::where('role', 'agent')
            ->leftJoin('user_statuses', 'users.id', '=', 'user_statuses.user_id')
            ->select('users.*', 'user_statuses.status')
            ->get();
    
        $expediteur = Auth::user();
    
        $services = Service::with('notification')
            ->whereHas('notification', function ($query) use ($expediteur) {
                $query->where('user_id', $expediteur->id);
            })
            ->get();
    
        // Utilisez la fonction dd() pour afficher les services et arrêter l'exécution du script
        dd($services);
    
        // Si vous souhaitez poursuivre l'exécution après le dd(), assurez-vous de le placer après le dd()
        return view('home', compact('agents', 'services'));
    }
    

}
