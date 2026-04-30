<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TeamController extends Controller
{
    // protected int $user = Auth::id();

    public function index(): View
    {
        $user = Auth::user();

        // $teams = Team::with(['users', 'owner'])->latest()->paginate();
        $teams = $user->teams()->with(['owner', 'users'])->get();

        return view('team.index', compact('teams'));
    }

    public function create(): View
    {
        return view('team.create');
    }

    public function store(Request $request): RedirectResponse
    {

        $validateAttribute = $request->validate([
            'name' => 'required|string|min:3'
        ]);

        $team = Team::create([
            'name' => $validateAttribute['name'],
            'owner_id' => Auth::id()
        ]);

        $team->users()->attach(Auth::id(), [
            'role' => 'owner'
        ]);


        return redirect()->route('team.index');
    }
}
