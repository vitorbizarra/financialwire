<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserWallet extends Pivot
{
    use HasUuids;
}
