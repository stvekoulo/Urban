<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    public function index()
    {
        $expediteur = Auth::user();

        $services = Service::where('expediteur_id', $expediteur->id)->get();

        return view('paiment', compact('services'));
    }
}
