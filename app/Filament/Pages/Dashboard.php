<?php

namespace App\Filament\Pages;

use Filament\Forms\Components;
use Filament\Forms\Form;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
 
class Dashboard extends BaseDashboard
{
    use HasFiltersForm;
 
    protected static ?string $navigationIcon = 'heroicon-m-home';

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Components\Section::make()
                    ->schema([
                        Components\DatePicker::make('startDate'),
                        Components\DatePicker::make('endDate'),
                        Components\Toggle::make('finished'),
                    ])
                    ->columns(3),
            ]);
    }
}