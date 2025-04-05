<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HotelReservationResource\Pages;
use App\Filament\Resources\HotelReservationResource\RelationManagers;
use App\Models\HotelReservation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HotelReservationResource extends Resource
{
    protected static ?string $model = HotelReservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Reservations';
    protected static ?string $navigationLabel = 'حجز فندقي' ;
    protected static ?string $label = 'حجز فندقي' ;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('الســـيـــد')
                ->required(),
                Forms\Components\TextInput::make('city')
                ->label('المـــديـــنـة'),
                Forms\Components\TextInput::make('reservationsDate')
                ->label('تـــاريـــخ الحـــجــز')
                ->required(),
                Forms\Components\TextInput::make('reservationsNumber')
                ->label('رقـــم الحـــجــز')
                ->required(),
                Forms\Components\TextInput::make('EmploymentName')
                    ->label('اســم الموظـــف')
                ->required(),
                Forms\Components\TextInput::make('phone')
                ->label('رقم الهاتف'),
                Forms\Components\TextInput::make('EmploymentManagement')
                    ->label('الإدارة')
                ->required(),
                Forms\Components\DatePicker::make('from')
                ->label('مــن تـــاريــخ'),
                Forms\Components\DatePicker::make('to')
                ->label('إلـــي تـــاريـــخ'),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('الاسم'),
                Tables\Columns\TextColumn::make('city')
                ->label('المدينة'),
                Tables\Columns\TextColumn::make('reservationsDate')
                ->label('تــاريخ الحــجــز'),
                Tables\Columns\TextColumn::make('reservationsNumber')
                ->label('رقم الحـــجـز'),
                Tables\Columns\TextColumn::make('EmploymentName')
                ->label('اســـم المـــوظـــف'),
                Tables\Columns\TextColumn::make('EmploymentManagement')
                ->label('الإدارة'),
                Tables\Columns\TextColumn::make('from')
                ->label('من تــــاريـــخ'),
                Tables\Columns\TextColumn::make('to')
                ->label('إلـــي تــــاريـــخ'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('print')
                    ->icon('heroicon-o-printer')
                    ->url(function ($record) {
                        return route('export.hotelRes.pdf', ['id'=> $record->id]);
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHotelReservations::route('/'),
            'create' => Pages\CreateHotelReservation::route('/create'),
            'edit' => Pages\EditHotelReservation::route('/{record}/edit'),
        ];
    }
}
