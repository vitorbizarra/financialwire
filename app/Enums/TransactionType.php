<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TransactionType: string implements HasLabel, HasIcon
{
    case Expense = 'expense';
    case Income = 'income';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Expense => 'Despesa',
            self::Income => 'Receita'
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Expense => 'heroicon-m-arrow-trending-down',
            self::Income => 'heroicon-m-arrow-trending-up'
        };
    }
}