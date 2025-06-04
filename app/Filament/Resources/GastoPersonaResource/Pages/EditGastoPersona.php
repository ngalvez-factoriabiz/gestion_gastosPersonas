<?php

namespace App\Filament\Resources\GastoPersonaResource\Pages;

use App\Filament\Resources\GastoPersonaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGastoPersona extends EditRecord
{
    protected static string $resource = GastoPersonaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
