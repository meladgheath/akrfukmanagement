<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DocumentsResource\Pages;
use App\Filament\Resources\DocumentsResource\RelationManagers;
use App\Models\Documents;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentsResource extends Resource
{
    protected static ?string $model = Documents::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationGroup = 'Insurance Department';

//    protected static ?string $navigationLabel = 'وثيقة تأمين';
    protected static ?string $label = 'وثيقة تأمين' ;
    protected static ?string $pluralLabel = 'وثيقة تأمين' ;
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
                Tables\Columns\TextColumn::make('name')->label('الاسم'),
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
            'index' => Pages\ListDocuments::route('/'),
            'create' => Pages\CreateDocuments::route('/create'),
            'edit' => Pages\EditDocuments::route('/{record}/edit'),
        ];
    }
}
