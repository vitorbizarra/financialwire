<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ContactStatus: string implements HasLabel
{
    case Answered = 'answered';
    case New = 'new';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Answered => 'Respondido',
            self::New => 'Novo',
        };
    }

    public function getPluralLabel(): ?string
    {
        return match ($this) {
            self::Answered => 'Respondidos',
            self::New => 'Novos',
        };
    }
}