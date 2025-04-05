<?php

namespace App\Filament\Resources\ReservationInputsResource\Pages;

use App\Filament\Resources\ReservationInputsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReservationInputs extends EditRecord
{
    protected static string $resource = ReservationInputsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
