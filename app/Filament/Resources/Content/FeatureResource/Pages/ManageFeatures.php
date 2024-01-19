<?php

namespace App\Filament\Resources\Content\FeatureResource\Pages;

use App\Filament\Resources\Content\FeatureResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageFeatures extends ManageRecords
{
    protected static string $resource = FeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
