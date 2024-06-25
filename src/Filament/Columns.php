<?php

namespace ScaleXY\Tools\Filament;

class Columns
{
    public static function UUIDColumn()
    {
        return \Filament\Tables\Columns\TextColumn::make('uuid')
            ->label('UUID')
            ->searchable()
            ->formatStateUsing(fn (string $state) => substr($state, -12))
            ->copyable()
            ->copyMessage('Copied!')
            ->copyableState(fn (string $state) => $state);
    }
}
