<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make()->columns(2)->schema([
                    TextInput::make('title')->required()->columnSpanFull(),
                    TextInput::make('slug')->required()->unique(ignoreRecord: true),
                    DateTimePicker::make('starts_at')->required()->label('Data e hora'),
                    TextInput::make('location')->label('Local'),
                    TextInput::make('maps_url')->url()->label('Link Google Maps'),
                    Textarea::make('description')->label('Descrição')->columnSpanFull()->rows(4),
                ]),
                \Filament\Schemas\Components\Section::make('Visibilidade')->schema([
                    Toggle::make('is_active')->label('Activo')->inline(false)->default(true),
                ]),
            ]);
    }
}
