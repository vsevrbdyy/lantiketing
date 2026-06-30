<?php

namespace App\Filament\Resources\PaketDestinasiResource\Pages;

use App\Filament\Resources\PaketDestinasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaketDestinasi extends EditRecord
{
    protected static string $resource = PaketDestinasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
