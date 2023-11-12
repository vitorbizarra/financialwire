<?php

namespace App\Filament\Resources\Transactions\CategoryResource\Pages;

use App\Filament\Resources\Transactions\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['wallet_id'] = filament()->getTenant()->id;
        $data['slug'] = str($data['name'])->slug();
        return $data;
    }
}
