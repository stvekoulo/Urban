<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $agents = User::where('role', 'agent')
                    ->leftJoin('user_statuses', 'users.id', '=', 'user_statuses.user_id')
                    ->select('users.*', 'user_statuses.status')
                    ->get();
        return view('searchagent', compact('agents'));
    }
}
