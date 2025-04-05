<?php

namespace App\Filament\Resources\ExchangeDisbursementResource\Pages;

use App\Filament\Resources\ExchangeDisbursementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExchangeDisbursements extends ListRecords
{
    protected static string $resource = ExchangeDisbursementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
