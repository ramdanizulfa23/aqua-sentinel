<?php

namespace App\Filament\Resources\WaterLogs\Pages;

use App\Filament\Resources\WaterLogs\WaterLogResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWaterLogs extends ListRecords
{
    protected static string $resource = WaterLogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
