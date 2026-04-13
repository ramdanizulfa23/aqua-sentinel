<?php

namespace App\Filament\Resources\WaterLogs;

use App\Filament\Resources\WaterLogs\Pages\CreateWaterLog;
use App\Filament\Resources\WaterLogs\Pages\EditWaterLog;
use App\Filament\Resources\WaterLogs\Pages\ListWaterLogs;
use App\Filament\Resources\WaterLogs\Schemas\WaterLogForm;
use App\Filament\Resources\WaterLogs\Tables\WaterLogsTable;
use App\Models\WaterLog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WaterLogResource extends Resource
{
    protected static ?string $model = WaterLog::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'pH';

    public static function form(Schema $schema): Schema
    {
        return WaterLogForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WaterLogsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWaterLogs::route('/'),
            'create' => CreateWaterLog::route('/create'),
            'edit' => EditWaterLog::route('/{record}/edit'),
        ];
    }
}
