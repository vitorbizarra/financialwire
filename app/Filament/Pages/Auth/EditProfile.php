<?php

namespace App\Filament\Pages\Auth;

use Filament\Facades\Filament;
use Filament\Forms\Components;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Auth\EditProfile as BasePáge;
use Filament\Support\Enums\VerticalAlignment;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Rawilk\FilamentPasswordInput\Password;

class EditProfile extends BasePáge
{
    protected static string $layout = 'filament-panels::components.layout.index';

    protected static string $view = 'filament.pages.auth.edit-profile';

    public static function getSlug(): string
    {
        return static::$slug ?? 'profile';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Components\Section::make('Personal Informations')
                    ->description('Your user data')
                    ->icon('heroicon-o-user-circle')
                    ->aside()
                    ->columns(2)
                    ->schema([
                        Components\TextInput::make('first_name')
                            ->required()
                            ->maxLength(255)
                            ->autofocus(),
                        Components\TextInput::make('last_name')
                            ->required()
                            ->maxLength(255),
                        $this->getEmailFormComponent()
                            ->columnSpanFull(),
                    ]),

                Components\Section::make('Security')
                    ->description('Your security data')
                    ->icon('heroicon-o-lock-closed')
                    ->aside()
                    ->schema([
                        Password::make('password')
                            ->required()
                            ->confirmed()
                            ->columnSpanFull()
                            ->regeneratePassword()
                            ->regeneratePasswordIcon('heroicon-m-arrow-path')
                            ->regeneratePasswordIconColor('gray')
                            ->generatePasswordUsing(fn () => str()->password(length: 12)),
                        $this->getPasswordConfirmationFormComponent()
                    ]),

                Components\Section::make('Danger zone')
                    ->description('Delete account')
                    ->icon('heroicon-o-exclamation-circle')
                    ->aside()
                    ->schema([
                        Components\TextInput::make('deleteAccountConfirmation')
                            ->label('Type your email to unlock the button:')
                            ->live()
                            ->placeholder(auth()->user()->email),
                        Components\Actions::make([
                            Components\Actions\Action::make('deleteAccount')
                                ->icon('heroicon-m-trash')
                                ->color('danger')
                                ->disabled(fn (Get $get) => $get('deleteAccountConfirmation') != auth()->user()->email)
                                ->action(function () {
                                    $user = auth()->user();
                                    auth()->logout();
                                    if ($user->delete()) {
                                        return redirect(Filament::getLoginUrl());
                                    }
                                })
                        ])->alignEnd()->verticalAlignment(VerticalAlignment::End)
                    ]),
            ]);
    }

    protected function hasFullWidthFormActions(): bool
    {
        return false;
    }

    public function getTitle(): string
    {
        return "My Profile";
    }

    public function getSubtitle(): string
    {
        return "Manage your account information";
    }
}