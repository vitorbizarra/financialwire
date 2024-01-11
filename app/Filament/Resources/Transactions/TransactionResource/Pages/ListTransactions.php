<?php

namespace App\Filament\Resources\Transactions\TransactionResource\Pages;

use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Hydrat\TableLayoutToggle\Concerns\HasToggleableTable;

class ListTransactions extends ListRecords
{
    use HasToggleableTable;

    protected static string $resource = TransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
