<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invitation extends Model
{
    protected $fillable = ['email', 'team_id', 'role', 'token'];

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
