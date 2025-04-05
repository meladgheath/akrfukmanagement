<?php

namespace App\Filament\Resources\OvernightResource\Pages;

use App\Filament\Resources\OvernightResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOvernight extends EditRecord
{
    protected static string $resource = OvernightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
