<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExchangesResource\Pages;
use App\Filament\Resources\ExchangesResource\RelationManagers;
use App\Models\Exchanges;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class ExchangesResource extends Resource
{
    protected static ?string $model = Exchanges::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';
    protected static ?string $navigationGroup = "Reservations" ;
    protected static ?string $navigationLabel = 'المصــــاريــــف';
    protected static ?string $label = 'المصــــاريــــف' ;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->label('اسم المستفيد'),
                TextInput::make('payment_method')
                ->label('طريقة الدفع'),
                TextInput::make('amount')
                ->label('القيــمة'),
                DatePicker::make('Date_txn')
                ->label('تــاريخ العملية'),
                Textarea::make('description')
                    ->label('وصف العملية')
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->label('اسم المستفيد'),
                Tables\Columns\TextColumn::make('payment_method')
            ->label('طريقة الدفع'),
                Tables\Columns\TextColumn::make('amount')
                    ->label('القيــمة'),
                Tables\Columns\TextColumn::make('Date_txn')
                    ->label('تــاريخ العملية'),
                Tables\Columns\TextColumn::make('description')
                    ->label('وصف العملية')
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
            'index' => Pages\ListExchanges::route('/'),
            'create' => Pages\CreateExchanges::route('/create'),
            'edit' => Pages\EditExchanges::route('/{record}/edit'),
        ];
    }
}
