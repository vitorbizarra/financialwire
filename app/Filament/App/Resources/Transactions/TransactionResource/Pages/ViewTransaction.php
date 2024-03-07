<?php

namespace App\Filament\App\Resources\Transactions\TransactionResource\Pages;

use App\Filament\App\Resources\Transactions\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTransaction extends ViewRecord
{
    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
