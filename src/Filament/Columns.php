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

    public static function NameColumn()
    {
        return \Filament\Tables\Columns\TextColumn::make('name')
            ->label('Name')
            ->searchable();
    }

    public static function EmailColumn()
    {
        return \Filament\Tables\Columns\TextColumn::make('email')
            ->label('Email')
            ->searchable();
    }

    public static function MobileColumn()
    {
        return \Filament\Tables\Columns\TextColumn::make('mobile')
            ->label('Mobile')
            ->searchable();
    }

    public static function CreatedAtColumn()
    {
        return \Filament\Tables\Columns\TextColumn::make('created_at')
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true);
    }

    public static function UpdatedAtColumn()
    {
        return \Filament\Tables\Columns\TextColumn::make('updated_at')
            ->dateTime()
            ->sortable()
            ->toggleable(isToggledHiddenByDefault: true);
    }
}
