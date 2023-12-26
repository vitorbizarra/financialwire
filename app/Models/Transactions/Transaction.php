<?php

namespace App\Models\Transactions;

use App\Enums\TransactionType;
use App\Models\Tenancy\Wallet;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'transaction_type',
        'amount',
        'date',
        'finished',
        'description',
        'wallet_id',
        'category_id'
    ];

    protected $casts = [
        'transaction_type' => TransactionType::class
    ];

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
