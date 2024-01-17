<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ContactStatus: string implements HasLabel, HasIcon, HasColor
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

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Answered => 'heroicon-o-check-circle',
            self::New => 'heroicon-o-clock',
        };
    }
    
    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Answered => Color::Lime,
            self::New => Color::Orange,
        };
    }
}