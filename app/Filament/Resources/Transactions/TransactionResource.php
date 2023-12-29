<?php

namespace App\Filament\Resources\Transactions;

use App\Enums\TransactionType;
use App\Filament\Resources\Transactions\TransactionResource\Pages;
use App\Filament\Resources\Transactions\TransactionResource\RelationManagers;
use App\Models\Transactions\Transaction;
use App\Tables\Columns\MoneyColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconPosition;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Leandrocfe\FilamentPtbrFormFields\Money;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-m-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Transaction')
                    ->columns(2)
                    ->schema([
                        Forms\Components\Select::make('account_id')
                            ->relationship('account', 'name')
                            ->native(false)
                            ->required(),
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'name')
                            ->native(false)
                            ->required(),
                        Forms\Components\Select::make('transaction_type')
                            ->required()
                            ->native(false)
                            ->options(TransactionType::class),
                        Money::make('amount')
                            ->required()
                            ->formatStateUsing(fn(?int $state) => number_format($state / 100, 2, ',', '.'))
                            ->dehydrateStateUsing(fn(?string $state): ?int => str($state)->replace(['.', ','], '')->toInteger()),
                        Forms\Components\DatePicker::make('date')
                            ->required(),
                        Forms\Components\TextInput::make('description')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('finished')
                            ->inline(false),

                        Forms\Components\Fieldset::make('Additional Info')
                            ->columnSpanFull()
                            ->hidden(fn(?Transaction $record): bool => $record === null)
                            ->columns(2)
                            ->schema([
                                Forms\Components\Placeholder::make('created_at')
                                    ->content(fn($record) => $record->created_at->format('d/m/Y H:i')),

                                Forms\Components\Placeholder::make('updated_at')
                                    ->content(fn($record) => $record->updated_at->format('d/m/Y H:i')),
                            ])
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('date', 'desc')
            ->columns([
                Tables\Columns\ToggleColumn::make('finished')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('date')
                    ->date('d/m/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->badge()
                    ->icon(fn($record) => $record->category->icon)
                    ->color(fn($record) => Color::hex($record->category->color))
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('transaction_type')
                    ->badge()
                    ->iconPosition(IconPosition::After)
                    ->alignCenter(),
                MoneyColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('account.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('date')
                    ->form([
                        Forms\Components\DatePicker::make('startDate'),
                        Forms\Components\DatePicker::make('endDate'),
                    ])
                    ->query(fn(Builder $query, array $data): Builder => $query->whereBetween('date', [$data['startDate'] ?? now()->startOfMonth(), $data['endDate'] ?? now()->endOfMonth()])),

                Tables\Filters\SelectFilter::make('category_id')
                    ->options(auth()->user()->categories->pluck('name', 'id'))
                    ->multiple()
                    ->preload(),

                Tables\Filters\Filter::make('finished')
                    ->query(fn(Builder $query) => $query->where('finished', true))
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index'  => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'view'   => Pages\ViewTransaction::route('/{record}'),
            'edit'   => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('user_id', auth()->user()->id)->count();
    }
}
