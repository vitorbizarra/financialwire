<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Components;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as BasePage;

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
                $this->getPasswordFormComponent()
                    ->columnSpanFull(),
                $this->getPasswordConfirmationFormComponent()
                    ->columnSpanFull()
            ]);
    }
}
