<?php

namespace App\Filament\Resources\GastoPersonaResource\Pages;

use App\Filament\Resources\GastoPersonaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGastoPersonas extends ListRecords
{
    protected static string $resource = GastoPersonaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
