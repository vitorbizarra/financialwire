<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Tenancy\Wallet;
use Filament\Pages\Page;
use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Forms;
use Filament\Forms\Form;

class RegisterWallet extends RegisterTenant
{
    protected static string $view = 'filament.pages.tenancy.register-wallet';

    protected static string $layout = 'filament.layouts.tenancy.register-wallet-layout';

    public static function getLabel(): string
    {
        return 'Cadastrar nova carteira';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label('Nome')
                ->required()
                ->maxLength(255),
                Forms\Components\FileUpload::make('cover')
                    ->label('Imagem')
                    ->image()
                    ->imageEditor()
                    ->imageEditorMode(2)
                    ->imageCropAspectRatio('1:1')
                    ->directory('wallets'),
            ]);
    }

    protected function handleRegistration(array $data): Wallet
    {
        $data['slug'] = str($data['name'])->slug();
        
        $wallet = Wallet::create($data);

        $wallet->users()->attach(auth()->user());

        return $wallet;
    }

    public function backAction(): \Filament\Actions\Action
    {
        return \Filament\Actions\Action::make('back')
            ->link()
            ->label(ucfirst(__('filament-panels::pages/auth/edit-profile.actions.cancel.label')))
            ->icon(match (__('filament-panels::layout.direction')) {
                'rtl' => 'heroicon-m-arrow-right',
                default => 'heroicon-m-arrow-left',
            })
            ->url(filament()->getUrl());
    }

    protected function hasFullWidthFormActions(): bool
    {
        return false;
    }

    public function getRegisterFormAction(): \Filament\Actions\Action
    {
        return parent::getRegisterFormAction()
            ->label('Cadastrar');
    }
}
