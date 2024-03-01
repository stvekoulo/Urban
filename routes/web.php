<?php

use App\Policies\AgentPolicy;
use App\Policies\ExpediteurPolicy;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgentDetailController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ProfilAgentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('contactus', function () {
    return view('contactus');
})->name('contactus');

Route::get('aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('searchagent', [SearchController::class, 'index'])->name('searchagent');//->middleware('can:viewDashboard,' . ExpediteurPolicy::class);

Route::get('agentdetail/{id}', [AgentDetailController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('agentdetail');

Route::get('/agent/home', [AgentController::class, 'home'])->middleware(['auth', 'verified'])->name('agent.home');//->middleware('can:viewDashboard,' . AgentPolicy::class);

Route::get('/agent/status', [AgentController::class, 'status'])->name('agent.status');
Route::post('/agent/status/update', [StatusController::class, 'update'])->name('status.update');
Route::post('/status/toggle', [AgentController::class, 'toggleStatus'])->name('status.toggle');
Route::get('/agent/profil', [ProfilAgentController::class, 'edit'])->name('profil.edit');
Route::post('/agent/profil', [ProfilAgentController::class, 'update'])->name('profil.update');

Route::post('/envoyer-demande/{agentId}', [AgentDetailController::class, 'envoyerDemande'])->name('envoyer.demande');
Route::get('/notifications/clear', [AgentController::class, 'clearNotifications'])->name('notifications.clear');
Route::post('/accept-notification', [AgentController::class, 'acceptNotification'])->name('accept.notification');

Route::get('/paiement', [PaiementController::class, 'index'])->name('paiement');


Route::get('/dashboard', function () {
    return view('dashboard');
})
->middleware(['auth', 'verified', 'can:viewDashboard,' . AgentPolicy::class])
->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('can:viewDashboard,' . ExpediteurPolicy::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
