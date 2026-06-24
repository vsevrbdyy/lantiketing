<?php

namespace App\Filament\Resources\DayTourPackageResource\Pages;

use App\Filament\Resources\DayTourPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDayTourPackages extends ListRecords
{
    protected static string $resource = DayTourPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
