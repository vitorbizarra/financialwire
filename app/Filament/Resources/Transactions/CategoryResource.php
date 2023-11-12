<?php

namespace App\Filament\Resources\Transactions;

use App\Filament\Resources\Transactions\CategoryResource\Pages;
use App\Filament\Resources\Transactions\CategoryResource\RelationManagers;
use App\Models\Transactions\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-m-bookmark';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('wallet_id')
                            ->relationship('wallet', 'name')
                            ->required()
                            ->native(false),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        IconPicker::make('icon')
                            ->required()
                            ->columns(3),
                        Forms\Components\ColorPicker::make('color')
                            ->required(),

                        Forms\Components\Fieldset::make()
                            ->columns(3)
                            ->hidden(fn(?Category $record): bool => $record === null)
                            ->schema([
                                Forms\Components\Placeholder::make('created_at')
                                    ->content(fn(Category $record): string => $record->created_at ?? '--'),
                                Forms\Components\Placeholder::make('updated_at')
                                    ->content(fn(Category $record): string => $record->updated_at ?? '--'),
                                Forms\Components\Placeholder::make('deleted_at')
                                    ->content(fn(Category $record): string => $record->deleted_at ?? '--'),
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('wallet.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('icon'),
                Tables\Columns\ColorColumn::make('color')
                    ->searchable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
