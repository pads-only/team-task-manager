<?php

namespace App\Services;

use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreateTeam
{
    public function handle(string $name): void
    {
        $current_user_id = Auth::id();

        $slug = Str::slug($name, '-') . '-' . Str::random(32);

        $team = Team::create([
            'name' => $name,
            'owner_id' => $current_user_id,
            'slug' => $slug
        ]);

        $team->users()->attach($current_user_id, [
            'role' => 'owner'
        ]);
    }
}
