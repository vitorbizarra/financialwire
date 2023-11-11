<?php

namespace App\Filament\Pages\Tenancy;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\EditTenantProfile;
use Illuminate\Database\Eloquent\Model;

class EditWalletProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Team profile';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('cover')
                    ->label('Imagem')
                    ->image()
                    ->imageEditor()
                    ->imageEditorMode(2)
                    ->imageCropAspectRatio('1:1')
                    ->directory('wallets'),
            ]);
    }
}
