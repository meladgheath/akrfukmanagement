<?php

namespace App\Filament\Resources\CarDepositResource\Pages;

use App\Filament\Resources\CarDepositResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCarDeposits extends ListRecords
{
    protected static string $resource = CarDepositResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
