<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BasePage;
use Filament\Support\Enums\Alignment;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class EditProfile extends BasePage
{
    /**
     * @return array<int | string, string | Form>
     */
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        Forms\Components\Section::make('Informações Pessoais')
                            ->description('Seus dados de usuário')
                            ->icon('heroicon-o-user-circle')
                            ->aside()
                            ->schema([
                                $this->getNameFormComponent(),
                                $this->getEmailFormComponent(),
                            ]),

                        Forms\Components\Section::make('Segurança')
                            ->description('Seus dados de segurança')
                            ->icon('heroicon-o-lock-closed')
                            ->aside()
                            ->schema([
                                $this->getPasswordFormComponent(),
                                $this->getPasswordConfirmationFormComponent(),
                            ]),
                    ])
                    ->operation('edit')
                    ->model($this->getUser())
                    ->statePath('data'),
            ),
        ];
    }

    public function getFormActionsAlignment(): string|Alignment
    {
        return Alignment::End;
    }

    public function getTitle(): string|Htmlable
    {
        $title = static::getLabel();

        return new HtmlString("
            <h1 class=\"fi-header-heading text-2xl font-bold tracking-tight text-gray-950 sm:text-3xl dark:text-white\" style=\"margin-top: 1rem; margin-right: auto;\">
                {$title}
            </h1>
        ");
    }
}
