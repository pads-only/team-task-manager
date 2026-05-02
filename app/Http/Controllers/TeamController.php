<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Services\CreateTeam;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Support\Str;


class TeamController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $teams = $user->teams()->with(['owner', 'users'])->get();

        return view('team.index', compact('teams'));
    }

    public function create(): View
    {
        return view('team.create');
    }

    public function show(Team $team): View
    {
        $memberCount = $team->users()->count();

        return view('team.show', ['team' => $team, 'memberCount' => $memberCount]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|min:3'
        ]);

        app(CreateTeam::class)->handle($data['name']);

        return redirect()->route('team.index');
    }
}
