<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make()->columns(2)->schema([
                    TextInput::make('title')->required()->columnSpanFull(),
                    TextInput::make('source_name')->required()->label('Fonte'),
                    Select::make('book_id')->relationship('book', 'title')->label('Livro')->searchable()->preload(),
                    Textarea::make('excerpt')->label('Excerto')->columnSpanFull()->rows(4),
                    TextInput::make('external_url')->url()->label('URL externo'),
                    DatePicker::make('published_at')->label('Data de publicação'),
                ]),
                \Filament\Schemas\Components\Section::make('Visibilidade')->columns(3)->schema([
                    Toggle::make('is_active')->label('Activo')->inline(false)->default(true),
                    TextInput::make('sort_order')->numeric()->default(0)->label('Ordem'),
                ]),
            ]);
    }
}
