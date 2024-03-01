<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    public function index()
    {
        $expediteur = Auth::user();

        $services = Service::where('expediteur_id', $expediteur->id)->get();

        return view('paiment', compact('services')) ;
    }

    public function payMyFeda($id) {
        $fedaPay = new FedaPay();
        $transaction = new Transaction();
        // dd(10);
        $fedaPay::setApiKey('sk_sandbox_ZzsodjrfZ6k4HtFGtjwrE-_Z');
        $fedaPay::setEnvironment('sanbox');

        $service = Service::where('id', $id)->get();
        // dd($service);



        $achat = $transaction::create([
            "description" => "Article 2309ART",
            "amount" => 1000,
            "currency" => ["code" => 952],
            "callback_url" => "http://e-shop.com/payment/callback.php",
            "customer" => [
                "firstname" => "John",
                "lastname" => "Doe",
                "email" => "john.doe@gmail.com",
                "phone" => "+22997940850",
                // "phone_number" =>  [
                //     "nuumber" => "+22997940850",
                //     "country" => "bj",
                // ]
            ]
        ]);
        $token = $achat->generateToken()->token;

        $achat->sendNowWithToken('mtn', $token);

        dd($achat);
        /*
         * Générer un lien sécurisé de paiement
         * {
         *   "token": "SECURED_TOKEN",
         *   "url": "https://process.fedapay.com/SECURED_TOKEN"
         * }
         */
        ;



        return redirect()->back();
    }
}