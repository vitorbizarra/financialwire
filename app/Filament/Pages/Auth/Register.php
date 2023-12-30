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
                    ->required(),
                Components\TextInput::make('last_name')
                    ->required(),
                Components\TextInput::make('email')
                    ->required()
                    ->email()
                    ->columnSpanFull(),
                Password::make('password')
                    ->required()
                    ->confirmed()
                    ->columnSpanFull()
                    ->copyable()
                    ->regeneratePassword()
                    ->generatePasswordUsing(fn() => str()->password(length: 12)),
                Components\TextInput::make('password_confirmation')
                    ->required()
                    ->password()
                    ->columnSpanFull(),
            ]);
    }
}
