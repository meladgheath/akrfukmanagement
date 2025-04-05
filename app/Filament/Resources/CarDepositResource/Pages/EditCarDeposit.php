<?php

namespace App\Filament\Resources\CarDepositResource\Pages;

use App\Filament\Resources\CarDepositResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCarDeposit extends EditRecord
{
    protected static string $resource = CarDepositResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
