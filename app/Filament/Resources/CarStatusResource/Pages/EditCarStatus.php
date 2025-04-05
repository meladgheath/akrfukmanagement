<?php

namespace App\Filament\Resources\CarStatusResource\Pages;

use App\Filament\Resources\CarStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarStatus extends EditRecord
{
    protected static string $resource = CarStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
