<?php

namespace App\Filament\Widgets\Admin;

use App\Enums\ContactStatus;
use App\Filament\Resources\Contacts\ContactResource;
use App\Models\Contacts\Contact;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestContacts extends BaseWidget
{
    protected static ?string $heading = 'Últimos contatos recebidos';

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Contact::where('status', ContactStatus::New )
                    ->orderBy('created_at', 'desc')
            )
            ->paginated(false)
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->translateLabel()
                    ->limit(20),
                Tables\Columns\TextColumn::make('email')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Assunto')
                    ->limit(20),
                Tables\Columns\TextColumn::make('message')
                    ->label('Mensagem')
                    ->limit(40),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->since(),
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->label('Ver')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(fn(Contact $record): string => ContactResource::getUrl('view', ['record' => $record])),
            ])
            ->headerActions([
                Tables\Actions\Action::make('all')
                    ->label('Ver Todos')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->url(ContactResource::getUrl('index')),
            ]);
    }
}
