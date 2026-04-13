<?php

namespace App\Filament\Resources\WaterLogs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class WaterLogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('ph')
                    ->required()
                    ->numeric(),
                TextInput::make('temp')
                    ->required()
                    ->numeric(),
                TextInput::make('turbidity')
                    ->required()
                    ->numeric(),
                TextInput::make('status')
                    ->required(),
            ]);
    }
}
