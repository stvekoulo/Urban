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
                        ->where(function($query) use ($serviceType) {
                            $query->where('assignment', $serviceType)
                                ->orWhere('assignment', 'les deux');
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
    }

}
