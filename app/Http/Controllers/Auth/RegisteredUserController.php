<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use GuzzleHttp\Client;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', Rule::in(['expediteur', 'agent'])],
        ]);

        if (isset($data['results']) && !empty($data['results'])) {

            $latitude = $data['results'][0]['geometry']['location']['lat'];
            $longitude = $data['results'][0]['geometry']['location']['lng'];

            $assignment = null;
            if ($request->role === 'agent') {
                $assignment = $request->input('role_option');
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'assignment' => $assignment,
            ]);
        } else {

            $latitude = 0;
            $longitude = 0;

            $assignment = null;
            if ($request->role === 'agent') {
                $assignment = $request->input('role_option');
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'assignment' => $assignment,
            ]);
        }


        event(new UserCreated($user));

        Auth::login($user);

        if ($user->role === 'expediteur') {
            return redirect()->route('welcome');
        } elseif ($user->role === 'agent') {
            return redirect()->route('agent.home');
        }
    }
}
