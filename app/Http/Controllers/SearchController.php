<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    /**
     * Affiche la liste des agents disponibles.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
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

            return view('searchagent', compact('agents'));
        } else {
            return redirect()->route('agent.home')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }
}
