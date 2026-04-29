<?php

namespace App\Filament\Resources\Books\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columns(2)->schema([
                    TextInput::make('title')->required()->columnSpanFull(),
                    Select::make('type')
                        ->label('Tipo')
                        ->options([
                            'Romance'  => 'Romance',
                            'Viagens'  => 'Viagens',
                            'Crónicas' => 'Crónicas',
                            'Contos'   => 'Contos',
                            'Poesia'   => 'Poesia',
                            'Ensaio'   => 'Ensaio',
                            'Outro'    => 'Outro',
                        ])
                        ->searchable(),
                    TextInput::make('slug')->required()->unique(ignoreRecord: true),
                    TextInput::make('publisher'),
                    TextInput::make('isbn'),
                    TextInput::make('year')->numeric(),
                    TextInput::make('pages')->numeric(),
                    Textarea::make('synopsis')->columnSpanFull()->rows(5),
                ]),

                Section::make('Capa')->schema([
                    SpatieMediaLibraryFileUpload::make('cover')
                        ->collection('cover')
                        ->disk('public')
                        ->image()
                        ->imageEditor(),
                ]),

                Section::make('Onde comprar')->schema([
                    Repeater::make('buy_links')
                        ->schema([
                            TextInput::make('label')->required()->placeholder('Bertrand'),
                            TextInput::make('url')->required()->url()->placeholder('https://...'),
                        ])
                        ->columns(2)
                        ->addActionLabel('Adicionar link'),
                ]),

                Section::make('Visibilidade')->columns(3)->schema([
                    Toggle::make('is_featured')->label('Destaque')->inline(false),
                    Toggle::make('is_active')->label('Activo')->inline(false)->default(true),
                    TextInput::make('sort_order')->numeric()->default(0)->label('Ordem'),
                ]),
            ]);
    }
}
