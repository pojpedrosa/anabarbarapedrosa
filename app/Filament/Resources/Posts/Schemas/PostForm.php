<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->columns(2)->schema([
                    TextInput::make('title')->required()->columnSpanFull(),
                    TextInput::make('slug')->required()->unique(ignoreRecord: true),
                    DateTimePicker::make('published_at')->label('Data de publicação'),
                    Textarea::make('excerpt')->label('Resumo')->columnSpanFull()->rows(3),
                    RichEditor::make('body')->label('Corpo')->columnSpanFull(),
                ]),
                Section::make('Imagem de capa')->schema([
                    SpatieMediaLibraryFileUpload::make('cover')
                        ->collection('cover')
                        ->image()
                        ->imageEditor(),
                ]),
                Section::make('Visibilidade')->schema([
                    Toggle::make('is_active')->label('Activo')->inline(false)->default(true),
                ]),
            ]);
    }
}
