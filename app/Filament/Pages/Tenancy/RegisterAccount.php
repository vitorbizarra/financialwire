<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Tenancy\Account;
use Filament\Pages\Page;
use Filament\Pages\Tenancy\RegisterTenant;
use Filament\Forms;
use Filament\Forms\Form;

class RegisterAccount extends RegisterTenant
{
    protected static string $view = 'filament.pages.tenancy.register-account';

    protected static string $layout = 'filament.layouts.tenancy.register-account-layout';

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
                    ->directory('accounts'),
            ]);
    }

    protected function handleRegistration(array $data): Account
    {
        $data['slug'] = str($data['name'])->slug();
        
        $account = Account::create($data);

        $account->users()->attach(auth()->user());

        return $account;
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
