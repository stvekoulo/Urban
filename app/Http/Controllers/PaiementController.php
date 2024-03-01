<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use FedaPay\FedaPay;
use FedaPay\Transaction;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    const LIVE_SECRET = "sk_live_Oi1-RaFztCYT-yZS9wz_T_DQ";
    const SANDBOX_SECRET = "sk_sandbox_ZzsodjrfZ6k4HtFGtjwrE-_Z";


    const FEDA_LIVE = "live";
    const FEDA_SANDBOX = "sandbox";

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
        $fedaPay::setApiKey(self::LIVE_SECRET);
        $fedaPay::setEnvironment(self::FEDA_LIVE);

        $service = Service::where('id', $id)->get();
        // dd($service);

        $pay = $transaction::retrieve(96362358);
        $pay->sendNow('mtn');
        dd($pay);
        die;
        $achat = $transaction::create([
            "description" => "Article 2309ART",
            "amount" => 1000,
            "currency" => ["code" => 952],
            "callback_url" => "http://e-shop.com/payment/callback.php",
            "customer" => [
                // "firstname" => "John",
                // "lastname" => "Doe",
                "email" => "john.doe@gmail.com",
                // "phone" => "+22997940850",
                // "phone_number" =>  [
                //     "nuumber" => "+22997940850",
                //     "country" => "bj",
                // ]
            ]
        ]);

        // $token = $transaction->generateToken()->token;

        $achat->sendNow('mtn');

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