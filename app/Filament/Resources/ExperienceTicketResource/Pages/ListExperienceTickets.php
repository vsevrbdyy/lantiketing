<?php

namespace App\Filament\Resources\ExperienceTicketResource\Pages;

use App\Filament\Resources\ExperienceTicketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExperienceTickets extends ListRecords
{
    protected static string $resource = ExperienceTicketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
