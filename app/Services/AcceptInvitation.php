<?php

namespace App\Services;

class AcceptInvitation
{
    public function handle($invitation, $user): void
    {
        if ($invitation->email !== $user->email) {
            abort(400);
        }

        if ($invitation->team->users()->where('email', $user->email)->exists()) {
            abort(400);
        }

        $invitation->team->users()->attach($user->id, [
            'role' => 'member'
        ]);

        $invitation->delete();
    }
}
