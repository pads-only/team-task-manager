<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use App\Models\Invitation;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/team', [TeamController::class, 'index'])->name('team.index');

    Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');

    Route::post('/team', [TeamController::class, 'store'])->name('team.store');

    Route::get('/team/{team:slug}', [TeamController::class, 'show'])->name('team.show');

    Route::get('/team/{team:slug}/invitation/create', [InvitationController::class, 'create'])->name('invitation.create');

    Route::post('/team/{team:slug}/invitation', [InvitationController::class, 'store'])->name('invitation.store');
    Route::get('/invite', [InvitationController::class, 'index'])->name('invitaion.index');

    // Route::get('/team', [InvitationController::class, 'index'])->name('invitaion.index');

    Route::get('/invite/{invitation:token}', [InvitationController::class, 'show'])->name('invitation.show');

    Route::post('/invite/{invitation:token}', [InvitationController::class, 'attachToTeam'])->name('invitation.attach');
});


require __DIR__ . '/auth.php';
