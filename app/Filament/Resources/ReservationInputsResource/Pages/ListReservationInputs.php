<?php

namespace App\Filament\Resources\ReservationInputsResource\Pages;

use App\Filament\Resources\ReservationInputsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReservationInputs extends ListRecords
{
    protected static string $resource = ReservationInputsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
