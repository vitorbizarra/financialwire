<?php

namespace App\Filament\Resources\Transactions\TransactionResource\Pages;

use App\Enums\TransactionType;
use App\Filament\Resources\Transactions\TransactionResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Hydrat\TableLayoutToggle\Concerns\HasToggleableTable;
use Illuminate\Database\Eloquent\Builder;

class ListTransactions extends ListRecords
{
    use HasToggleableTable;

    protected static string $resource = TransactionResource::class;

    public function getTabs(): array
    {
        $tabs = ['all' => Tab::make()->label('Todos')];

        $cases = TransactionType::cases();

        rsort($cases);

        foreach ($cases as $transactionType) {
            $tabs[$transactionType->value] = Tab::make()
                ->label($transactionType->getPluralLabel())
                ->icon($transactionType->getIcon())
                ->modifyQueryUsing(fn(Builder $query) => $query->where('transaction_type', $transactionType));
        }

        return $tabs;
    }

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
