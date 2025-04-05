<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservationInputsResource\Pages;
use App\Filament\Resources\ReservationInputsResource\RelationManagers;
use App\Models\ReservationInputs;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationInputsResource extends Resource
{
    protected static ?string $model = ReservationInputs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')

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
            'index' => Pages\ListReservationInputs::route('/'),
            'create' => Pages\CreateReservationInputs::route('/create'),
            'edit' => Pages\EditReservationInputs::route('/{record}/edit'),
        ];
    }
}
