<?php

namespace App\Filament\Resources\DocResResource\Pages;

use App\Filament\Resources\DocResResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDocRes extends EditRecord
{
    protected static string $resource = DocResResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
