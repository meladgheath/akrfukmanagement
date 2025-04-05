<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarsResource\Pages;
use App\Filament\Resources\CarsResource\RelationManagers;
use App\Models\Cars;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class CarsResource extends Resource
{
    protected static ?string $model = Cars::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Insurance Department';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('brand')->required(),
                TextInput::make('model')->required(),
                TextInput::make('year')->required(),
                TextInput::make('color')->required(),
                TextInput::make('price')->required(),
                TextInput::make('fuel')->required(),
                TextInput::make('engine')->required(),
                TextInput::make('numberOfSeats')->required(),
                TextInput::make('number')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('brand'),
                Tables\Columns\TextColumn::make('model'),
                Tables\Columns\TextColumn::make('year'),
                Tables\Columns\TextColumn::make('color'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('fuel'),
                Tables\Columns\TextColumn::make('engine'),
                Tables\Columns\TextColumn::make('numberOfSeats'),
                Tables\Columns\TextColumn::make('number'),
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
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCars::route('/create'),
            'edit' => Pages\EditCars::route('/{record}/edit'),
        ];
    }
}
