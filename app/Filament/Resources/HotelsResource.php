<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HotelsResource\Pages;
use App\Filament\Resources\HotelsResource\RelationManagers;
use App\Models\Hotels;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HotelsResource extends Resource
{
    protected static ?string $model = Hotels::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';
//    protected static ?string $navigationGroup = 'Reservations' ;
//    protected static ?string $navigationLabel = 'فنادق' ;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->label('الفندق'),
                Forms\Components\TextInput::make('address')
                ->label('العنوان'),
                Forms\Components\TextInput::make('city')
                ->label('المدينة'),
                Forms\Components\TextInput::make('bills')
                ->required()
                ->label('الفاتورة'),
                TextInput::make('price')->required()
                ->label('القيمة'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
                Tables\Columns\TextColumn::make('address')
                ->searchable(),
                Tables\Columns\TextColumn::make('city')
                ->searchable(),
                Tables\Columns\TextColumn::make('bills'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('created_at'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('print')
                ->icon('heroicon-o-printer')
                ->url(function ($record) {
                    return route('export.hotel.pdf', ['id'=> $record->id]);
                }),
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
            'index' => Pages\ListHotels::route('/'),
            'create' => Pages\CreateHotels::route('/create'),
            'edit' => Pages\EditHotels::route('/{record}/edit'),
        ];
    }
}
