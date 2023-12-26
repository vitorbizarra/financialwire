<?php

namespace App\Models\Tenancy;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserAccount extends Pivot
{
    use HasUuids;
}
