<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfilAgentController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('agent.profil')->with('user', $user);
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'phone_number' => 'required|regex:/^\+229\d{8}$/',
                'whatsapp_link' => 'required|regex:/^https:\/\/wa\.link\/[a-zA-Z0-9]{6}$/',
                'national_id' => 'required|regex:/^\d{11}$/',
                'photo' => 'nullable|image|max:3072', // Max size in kilobytes (3072 KB = 3 MB)
            ],
            [
                'phone_number.regex' => 'Le numéro de téléphone doit être au format béninois.',
                'whatsapp_link.regex' => 'Le lien WhatsApp doit être au format wa.link valide.',
                'national_id.regex' => 'Le numéro d\'identification national doit être au format béninois.',
                'photo.max' => 'La taille de la photo ne doit pas dépasser 3 Mo.',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = auth()->user();

        $user->phone_number = $request->phone_number;
        $user->whatsapp_link = $request->whatsapp_link;
        $user->national_id = $request->national_id;
        $user->photo = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $user->photo = $photoPath;
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil mis à jour avec succès.');
    }
}
