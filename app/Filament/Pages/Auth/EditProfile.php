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
                Components\Section::make(__('Personal Informations'))
                    ->description(__('Your user data'))
                    ->icon('heroicon-o-user-circle')
                    ->aside()
                    ->columns(2)
                    ->schema([
                        Components\TextInput::make('first_name')
                            ->label(__('First name'))
                            ->required()
                            ->maxLength(255)
                            ->autofocus(),
                        Components\TextInput::make('last_name')
                            ->label(__('Last name'))
                            ->required()
                            ->maxLength(255),
                        $this->getEmailFormComponent()
                            ->columnSpanFull(),
                    ]),

                Components\Section::make(__('Security'))
                    ->description(__('Your security data'))
                    ->icon('heroicon-o-lock-closed')
                    ->aside()
                    ->schema([
                        Password::make('password')
                            ->label(__('Password'))
                            ->confirmed()
                            ->columnSpanFull()
                            ->showPasswordText(__('Show password'))
                            ->hidePasswordText(__('Hide password'))
                            ->regeneratePassword()
                            ->regeneratePasswordIcon('heroicon-m-arrow-path')
                            ->regeneratePasswordIconColor('gray')
                            ->regeneratePasswordTooltip(__('Generate new password'))
                            ->generatePasswordUsing(fn () => str()->password(length: 12)),
                        $this->getPasswordConfirmationFormComponent()
                    ]),

                Components\Section::make(__('Danger Zone'))
                    ->description(__('Delete Account'))
                    ->icon('heroicon-o-exclamation-circle')
                    ->aside()
                    ->schema([
                        Components\TextInput::make('deleteAccountConfirmation')
                            ->label(__('Enter your email to be able to delete your account'))
                            ->live()
                            ->placeholder(auth()->user()->email),
                        Components\Actions::make([
                            Components\Actions\Action::make('deleteAccount')
                                ->label(__('Delete Account'))
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
        return __('Profile');
    }

    public function getSubtitle(): string
    {
        return __('Manage Account');
    }
}