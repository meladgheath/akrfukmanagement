<?php

namespace App\Filament\Resources\DocResResource\Pages;

use App\Filament\Resources\DocResResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDocRes extends ListRecords
{
    protected static string $resource = DocResResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
