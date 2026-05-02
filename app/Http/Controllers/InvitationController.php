<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvitationRequest;
use App\Models\Invitation;
use App\Models\Team;
use App\Services\AcceptInvitation;
use App\Services\InviteUserToTeam;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class InvitationController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $invitations = Invitation::with('team')->where('email', $user->email)->get();

        return view('invitation.index', compact('invitations'));
    }

    public function create(Team $team): View
    {
        Gate::authorize('invite', $team);

        return view('invitation.create', compact('team'));
    }

    public function show(Invitation $invitation): View
    {
        if ($invitation->team->users->firstWhere('email', Auth::user()->email)) {
            abort(404);
        }

        return view('invitation.show', ['invitation' => $invitation]);
    }

    public function store(StoreInvitationRequest $request, Team $team)
    {

        app(InviteUserToTeam::class)->handle($team, $request->validated('email'));

        return redirect()->route('team.index');
    }

    public function attachToTeam(Invitation $invitation): RedirectResponse
    {
        app(AcceptInvitation::class)->handle($invitation, Auth::user());

        return redirect()->route('team.index');
    }
}
