<?php

namespace App\Filament\Resources\Contacts;

use App\Enums\ContactStatus;
use App\Filament\Resources\Contacts\ContactResource\Pages;
use App\Filament\Resources\Contacts\ContactResource\RelationManagers;
use App\Models\Contacts\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Contato';

    protected static ?string $modelLabel = 'contato';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->columns(2)
                    ->schema([
                        Forms\Components\Placeholder::make('name')
                            ->label('Nome:')
                            ->content(fn(string $state): string => $state),
                        Forms\Components\Placeholder::make('email')
                            ->label('Email:')
                            ->content(fn(string $state): string => $state),
                        Forms\Components\Placeholder::make('subject')
                            ->label('Assunto:')
                            ->content(fn(string $state): string => $state),
                        Forms\Components\ToggleButtons::make('status')
                            ->label('Status:')
                            ->required()
                            ->options(ContactStatus::class)
                            ->inline(),
                        Forms\Components\Placeholder::make('message')
                            ->label('Mensagem:')
                            ->content(fn(string $state): string => $state)
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make()
                    ->columns(2)
                    ->schema([
                        Infolists\Components\TextEntry::make('name')
                            ->label('Nome:'),
                        Infolists\Components\TextEntry::make('email')
                            ->label('Email:'),
                        Infolists\Components\TextEntry::make('subject')
                            ->label('Assunto:'),
                        Infolists\Components\TextEntry::make('status')
                            ->label('Status:')
                            ->badge(),
                        Infolists\Components\TextEntry::make('message')
                            ->label('Mensagem:')
                            ->columnSpanFull(),

                        Infolists\Components\Fieldset::make('Informações Adicionais')
                            ->columns(3)
                            ->schema([
                                Infolists\Components\TextEntry::make('created_at')
                                    ->label('Criado em:')
                                    ->dateTime('d/m/Y H:i')
                                    ->placeholder('Nunca'),
                                Infolists\Components\TextEntry::make('updated_at')
                                    ->label('Atualizado em:')
                                    ->dateTime('d/m/Y H:i')
                                    ->placeholder('Nunca'),
                                Infolists\Components\TextEntry::make('deleted_at')
                                    ->label('Excluído em:')
                                    ->dateTime('d/m/Y H:i')
                                    ->placeholder('Nunca'),
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->translateLabel()
                    ->searchable()
                    ->limit(20),
                Tables\Columns\TextColumn::make('email')
                    ->translateLabel()
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->label('Assunto')
                    ->searchable()
                    ->limit(20),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->badge()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime('d/m/Y H:i')
                    ->badge()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Excluído em')
                    ->dateTime('d/m/Y H:i')
                    ->badge()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label(' '),
                Tables\Actions\EditAction::make()
                    ->label(' '),
                Tables\Actions\DeleteAction::make()
                    ->label(' '),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'view' => Pages\ViewContact::route('/{record}'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
