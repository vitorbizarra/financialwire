<?php

namespace App\Filament\App\Resources\Transactions\CategoryResource\Pages;

use App\Filament\App\Resources\Transactions\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
