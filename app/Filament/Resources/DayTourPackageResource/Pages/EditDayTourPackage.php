<?php

namespace App\Filament\Resources\DayTourPackageResource\Pages;

use App\Filament\Resources\DayTourPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDayTourPackage extends EditRecord
{
    protected static string $resource = DayTourPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
