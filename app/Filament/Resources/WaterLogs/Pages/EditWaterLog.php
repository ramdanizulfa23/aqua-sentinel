<?php

namespace App\Filament\Resources\WaterLogs\Pages;

use App\Filament\Resources\WaterLogs\WaterLogResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditWaterLog extends EditRecord
{
    protected static string $resource = WaterLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
