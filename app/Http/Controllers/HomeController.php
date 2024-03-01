<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserStatus;
use Illuminate\Support\Facades\DB;
use App\Models\Service;


class HomeController extends Controller
{
    public function index()
    {
        $agents = User::where('role', 'agent')->leftJoin('user_statuses', 'users.id', '=', 'user_statuses.user_id')->select('users.*', 'user_statuses.status')->get();
        
       
        $services = Service::whereIn('user_id', $agents->pluck('id'))->get();

        return view('home', compact('agents', 'services'));
    }
}
