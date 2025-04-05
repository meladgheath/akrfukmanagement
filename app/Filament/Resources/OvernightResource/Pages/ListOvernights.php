<?php

namespace App\Filament\Resources\OvernightResource\Pages;

use App\Filament\Resources\OvernightResource;
use App\Models\Overnight;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\Exports\Models\Export;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;


class ListOvernights extends ListRecords
{
    protected static string $resource = OvernightResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
//            Action::make('print')
//            ->url(route('export.overnight.pdf', Overnight::all() )),
//                ->action(function (Collection $selectedRecords) {
                    // Get the IDs of the selected records
//                    $selectedIds = $this->getMountedTableActionRecord() ;
//                    $row = $selectedIds->toarray();
//                    dd($selectedIds);

//                }),

        ];
    }

}
