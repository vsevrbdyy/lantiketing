<?php

namespace App\Filament\Resources\PaketDestinasiResource\Pages;

use App\Filament\Resources\PaketDestinasiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaketDestinasis extends ListRecords
{
    protected static string $resource = PaketDestinasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
