<?php

namespace App\Filament\Pages;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Support\Enums\ActionSize;

class Dashboard extends BaseDashboard
{
    use HasFiltersForm;

    protected static ?string $navigationIcon = 'heroicon-m-home';

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Filters')
                    ->columns(3)
                    ->schema([
                        Forms\Components\DatePicker::make('startDate'),
                        Forms\Components\DatePicker::make('endDate'),
                        Forms\Components\Select::make('preview')
                            ->boolean(),
                    ])
                    ->headerActions($this->getFiltersFormHeaderActions()),
            ]);
    }

    private function getFiltersFormHeaderActions(): array
    {
        return [
            Forms\Components\Actions\Action::make('clearFilters')
                ->label('Clear Filters')
                ->icon('heroicon-m-x-circle')
                ->size(ActionSize::ExtraSmall)
                ->hidden(fn(Forms\Get $get) => ($get('startDate') == null) && ($get('endDate') == null) && ($get('preview') == null))
                ->action(function (Forms\Set $set) {
                    $set('startDate', null);
                    $set('endDate', null);
                    $set('preview', false);

                    Notification::make()
                        ->title('Filters cleared!')
                        ->success()
                        ->send();
                })
        ];
    }
}