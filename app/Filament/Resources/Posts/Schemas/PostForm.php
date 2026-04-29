<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
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
                    Select::make('type')
                        ->label('Tipo')
                        ->options(['post' => 'Texto próprio', 'article' => 'Artigo externo'])
                        ->default('post')
                        ->required()
                        ->live(),
                    TextInput::make('slug')->required()->unique(ignoreRecord: true),
                    DateTimePicker::make('published_at')->label('Data de publicação'),
                    TextInput::make('source_name')->label('Publicação')->placeholder('Observador, Expresso…')
                        ->visible(fn ($get) => $get('type') === 'article'),
                    TextInput::make('external_url')->url()->label('Link original')
                        ->visible(fn ($get) => $get('type') === 'article'),
                    Textarea::make('excerpt')->label('Resumo / Abstract')->columnSpanFull()->rows(3),
                    RichEditor::make('body')->label('Texto completo')->columnSpanFull()
                        ->visible(fn ($get) => $get('type') === 'post'),
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
