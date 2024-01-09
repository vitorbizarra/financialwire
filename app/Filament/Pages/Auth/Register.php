<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as BasePage;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Rawilk\FilamentPasswordInput\Password;

class Register extends BasePage
{
    public function form(Form $form): Form
    {
        return $form
            ->columns(2)
            ->schema([
                Components\TextInput::make('first_name')
                    ->label(__('First name'))
                    ->required(),
                Components\TextInput::make('last_name')
                    ->label(__('Last name'))
                    ->required(),
                Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->columnSpanFull(),
                Password::make('password')
                    ->label(__('Password'))
                    ->required()
                    ->confirmed()
                    ->columnSpanFull()
                    ->regeneratePassword()
                    ->regeneratePasswordIcon('heroicon-m-arrow-path')
                    ->regeneratePasswordIconColor('gray')
                    ->generatePasswordUsing(fn () => str()->password(length: 12)),
                Components\TextInput::make('password_confirmation')
                    ->label(__('Password confirmation'))
                    ->required()
                    ->password()
                    ->columnSpanFull(),
            ]);
    }
}
