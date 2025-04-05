<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarDepositResource\Pages;
use App\Filament\Resources\CarDepositResource\RelationManagers;
use App\Models\CarDeposit;
use App\Models\Cars;
use App\Models\CarStatus;
use App\Models\Exchange;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarDepositResource extends Resource
{
    protected static ?string $model = CarDeposit::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $navigationGroup = 'Insurance Department';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('depositName'),

                Select::make('carId')
                    ->options(Cars::all()->pluck('number', 'id')),
                Select::make('status')
                ->options(CarStatus::all()->pluck('name', 'id'))
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('depositName'),
                Tables\Columns\TextColumn::make('car.number')
                    ->label('bord number'),
                Tables\Columns\TextColumn::make('carStatus.name')
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
            'index' => Pages\ListCarDeposits::route('/'),
            'create' => Pages\CreateCarDeposit::route('/create'),
            'edit' => Pages\EditCarDeposit::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder {
        return parent::getEloquentQuery()->with(['car' , 'carStatus']);

    }
}
