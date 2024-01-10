<?php

namespace App\Filament\Pages\Admin;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\IconSize;

class Dashboard extends BaseDashboard
{
    public function getColumns(): int|string|array
    {
        return 3;
    }
}