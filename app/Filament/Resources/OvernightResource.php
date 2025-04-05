<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OvernightResource\Pages;
use App\Filament\Resources\OvernightResource\RelationManagers;
use App\Models\Overnight;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Forms\Get ;
use Filament\Forms\Set ;
use Nette\Utils\Html;
use phpDocumentor\Reflection\Types\This;
use Filament\Tables\Filters\Filter;


class OvernightResource extends Resource
{
    protected static ?string $model = Overnight::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Reservations' ;
    protected static ?string $navigationLabel = 'بدل المبيت';
    protected static ?string $label = 'بدل المبيت' ;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('emplyee_id')
                ->required()
                ->reactive()
                    ->label('الرقم الوظيفي')
                ->afterStateUpdated(function (Get $get , Set $set) {
                    $employment = $get('emplyee_id');

                    $id = Overnight::all()
                        ->where('emplyee_id', $employment)
                    ->where('from',  '>=',Carbon::now()->startOfYear() )
                        ->where('to',  '<=',Carbon::now()->endOfYear())
                        ->sum('days');

                    $result = (string) $id;
                    $set('result',  $result ."" ."/60"); ;

                })->debounce(600),

                Forms\Components\TextInput::make('name')
                    ->label('الاسم')
                ->required()
                ->reactive(),
                Forms\Components\TextInput::make('management')
                ->label('الإدارة'),
                Forms\Components\DatePicker::make('from')
                    ->label('من تــــاريــخ')
                ->required(),
                Forms\Components\DatePicker::make('to')
                    ->label('الي تـــاريــخ')
                ->reactive()
                ->afterStateUpdated( function (Get $get, Set $set ){
                    $to = Carbon::parse($get('to'));
//                    $to = Carbon::parse($to)->toDateTimeString();
                    $from = Carbon::parse($get('from'));

//                    $from = Carbon::parse($from)->toDateTimeString();
                    $all = $from->diffInDays($to);
                    $set('days', $all);
                    $set('value', $all * 40);
                }),
                Forms\Components\TextInput::make('hotel')
                ->label('فندق'),
                Forms\Components\TextInput::make('days')
                    ->label('الأيـــام')
                ->required()
                ->reactive()
                ->readOnly()
                ->afterStateUpdated(function (Get $get ,Set $set) {
                    $M = $get('days')  ;
                    if (is_numeric($M))
                        $set('value', $M * 40);
                    else
                        $set('value', '');

                }),
                Forms\Components\TextInput::make('value')
                    ->label('القــيمـة')
                ->required()
                ->readonly(),
                Forms\Components\Radio::make('status')
                ->label('علي حسابه الخاص أو لا ')
                ->options([
                    true => 'نعم',
                    false => 'لا'
                ]),
                TextInput::make('result')
                    ->label('عدد الأيام المتاحة')
                    ->disabled()
                    ->reactive()
                ->visible(fn (Get $get)=> ($get('emplyee_id') !== null && $get('emplyee_id') !== "")),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->selectable()
//            ->paginated(false)
                ->striped()
        ->columns([
                //
                TextColumn::make('emplyee_id')
                ->label('الرقم الوظيفي')
                ->searchable(),
                Tables\Columns\TextColumn::make('name')
                ->label('الإسم')
                ->searchable(),
                TextColumn::make('management')
                ->label('الإدارة'),
                Tables\Columns\TextColumn::make('days')
                ->label('عدد الأيام')
                ->summarize([
                    Tables\Columns\Summarizers\Sum::make()
                ]),
                Tables\Columns\TextColumn::make('value')
                ->label('القيمة')
                ->summarize([
                        Tables\Columns\Summarizers\Sum::make()
                            ->money('lyd'), // Display the total sum in the footer
                    ]),
                TextColumn::make('hotel')
                ->label('الفندق'),
               /* TextColumn::make('status')
                    ->formatStateUsing(
                    function ($state) {
                        return $state = 0 ?  'نعم' : 'لا';
                    }
                )->label('علي حسابه'),*/
                Tables\Columns\IconColumn::make('status')
                    ->boolean()
                ->label('علي حسابه'),
                TextColumn::make('created_at')
                    ->label('تاريخ')
                ->searchable()
            ])
            ->filters([
                //
                SelectFilter::make('status')
                ->options([
                    true => 'yes' ,
                    false => 'no'
                ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('Print')
                    ->requiresConfirmation()
                    ->icon('heroicon-o-printer')
                        ->label('طباعة')
                    ->action(function (Collection $record) {
                            session(['export_data' => $record->toArray()]);
                            return redirect()->route('export.overnight.pdf');
                        })
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
            'index' => Pages\ListOvernights::route('/'),
            'create' => Pages\CreateOvernight::route('/create'),
            'edit' => Pages\EditOvernight::route('/{record}/edit'),
        ];
    }
    public static function calc_days(Get $get , Set $set): void
    {
        $set('value', $get('days') * 40 ) ;
    }

    public static function calc_data(Get $get , Set $set): void
    {
        $set('days', $get('to') - $get('from') );
    }
}
