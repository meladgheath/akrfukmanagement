<?php

namespace App\Filament\Resources\ExchangeDisbursementResource\Pages;

use App\Filament\Resources\ExchangeDisbursementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExchangeDisbursement extends EditRecord
{
    protected static string $resource = ExchangeDisbursementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
