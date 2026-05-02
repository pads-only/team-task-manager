<?php

namespace App\Services;

use App\Models\Invitation;
use App\Models\Team;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class InviteUserToTeam
{

    public function handle(Team $team, string $email): void
    {
        // already member?
        if ($team->users()->where('email', $email)->exists()) {
            throw ValidationException::withMessages([
                'email' => "$email is already a member."
            ]);
        }

        // already invited?
        if (Invitation::where('email', $email)
            ->where('team_id', $team->id)
            ->exists()
        ) {

            throw ValidationException::withMessages([
                'email' => "Invitation already sent to $email."
            ]);
        }

        Invitation::create([
            'email' => $email,
            'role' => 'member',
            'team_id' => $team->id,
            'token' => Str::random(60),
        ]);
    }
}
