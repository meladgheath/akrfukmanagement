<?php

namespace App\Filament\Resources\HotelReservationResource\Pages;

use App\Filament\Resources\HotelReservationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHotelReservations extends ListRecords
{
    protected static string $resource = HotelReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
