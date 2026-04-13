<?php

namespace App\Filament\Resources\WaterLogs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Schemas\Components\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WaterLogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ph')
                    ->numeric()
                    ->badge()
                    ->color(fn($state) => $state < 6.5 || $state > 8.5 ? 'danger' : 'success'),
                TextColumn::make('temp')
                    ->label('Suhu (°C)')
                    ->numeric(1)
                    ->suffix(' °C'),
                TextColumn::make('turbidity')
                    ->numeric(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Bahaya' => 'danger',
                        'Waspada' => 'warning',
                        default => 'success',
                    }),
                TextColumn::make('created_at')
                    ->label('Waktu Monitoring')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                ViewAction::make()
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
