<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TransactionsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('teste', '1'),
            Stat::make('teste', '2'),
            Stat::make('teste', '3'),
            Stat::make('teste', '4'),
        ];
    }
}
