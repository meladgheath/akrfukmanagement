<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExchangeDisbursementResource\Pages;
use App\Filament\Resources\ExchangeDisbursementResource\RelationManagers;
use App\Models\Exchange;
use App\Models\ExchangeDisbursement;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use phpDocumentor\Reflection\Types\Parent_;

class ExchangeDisbursementResource extends Resource
{
    protected static ?string $model = ExchangeDisbursement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('receiver_name')
                ->required(),
                TextInput::make('amount')
                    ->required(),
                Select::make('ExchangeType')
                    ->options(Exchange::all()->pluck('name', 'id'))
                    ->required(),

            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('receiver_name'),
                Tables\Columns\TextColumn::make('exchange.name')
                ->label('exchange'),
                Tables\Columns\TextColumn::make('amount'),
                Tables\Columns\TextColumn::make('created_at'),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListExchangeDisbursements::route('/'),
            'create' => Pages\CreateExchangeDisbursement::route('/create'),
            'edit' => Pages\EditExchangeDisbursement::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder {
        return parent::getEloquentQuery()->with(['exchange']);
    }
}
