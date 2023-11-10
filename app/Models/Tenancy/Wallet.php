<?php

namespace App\Models\Tenancy;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Wallet extends Model
{
    use HasFactory, HasUuids;

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
