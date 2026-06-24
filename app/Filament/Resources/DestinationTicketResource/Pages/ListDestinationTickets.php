<?php

namespace App\Filament\Resources\DestinationTicketResource\Pages;

use App\Filament\Resources\DestinationTicketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDestinationTickets extends ListRecords
{
    protected static string $resource = DestinationTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
