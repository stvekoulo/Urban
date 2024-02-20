<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('serviceType')) {
            $serviceType = $request->input('serviceType');

            $agents = User::where('role', 'agent')
                        ->where('assignment', $serviceType)
                        ->leftJoin('user_statuses', 'users.id', '=', 'user_statuses.user_id')
                        ->select('users.*', 'user_statuses.status')
                        ->get();
        } else {
            $agents = User::where('role', 'agent')
                        ->leftJoin('user_statuses', 'users.id', '=', 'user_statuses.user_id')
                        ->select('users.*', 'user_statuses.status')
                        ->get();
        }
        $agents = User::where('role', 'agent')
    ->leftJoin('user_statuses', 'users.id', '=', 'user_statuses.user_id')
    ->where('user_statuses.status', 'available') // Filtrer les agents disponibles
    ->select('users.*', 'user_statuses.status')
    ->get();

        return view('searchagent', compact('agents'));
    }

}
